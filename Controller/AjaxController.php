<?php
App::import('Vendor','Shift8', array('file'=>'Shift8/library/Shift8.php'));
/**
 * Created by JetBrains PhpStorm.
 * User: netors
 * Date: 2/4/12
 * Time: 2:43 PM
 * To change this template use File | Settings | File Templates.
 */
class AjaxController extends AppController {

	public $components = array('AjaxHandler');
	public $uses = array('Customer');
	public $asterisk;
	public $currentUser;

	public function beforeFilter() {
		parent::beforeFilter();
		$this->AjaxHandler->handle('*');
		$this->currentUser = parent::getCurrentUser();
		if(count($this->currentUser) == 0) {
			$this->currentUser = false;
		}
		// allow all the following methods to access
		$this->Auth->allow('*');
		// Or individual actions
		//$this->AjaxHandler->handle('login', 'logout', 'postComment');
	}

	/**
     * asterisk_login method
     *
     * Connect to the asterisk server
     *
     * @return mixed
     */
	protected function __asterisk_login() {
		$ajam = Configure::read('Asterisk.ajam');
		$manager = Configure::read('Asterisk.manager');
		$secret = Configure::read('Asterisk.secret');
		$listener = false;
		$this->asterisk = new Shift8($ajam, $manager, $secret, $listener, false);
		return $this->asterisk->login();
	}

	/**
     * admin_originate method
     *
     * Originate a call to agent toward to the conference
     *
     * @return mixed
     */
    public function admin_originate() {
    	$response = array('success' => false, 'data' => array());
		//if the current user is not loggin, return null
		header('Content-Type: application/json');
		if(!$this->currentUser){
			$response['data']['message'] = __('User is not logged in');
			$response['success'] = false;
			return $this->AjaxHandler->respond('json', $response);
		}
		$channel = 'SIP/'.$this->currentUser['User']['extension'];;
		$context = 'from-internal';
		$exten = $this->currentUser['User']['conference_extension'];
		$priority = '1';
		$application = false;
		$data = false;
		$timeout = 30000;
		$callerID = Configure::read('Callcenter.name');
		$variable = false;
		$account = Configure::read('Callcenter.name');
		$async = true;
		$codecs = false;

		if (!$this->__asterisk_login()) {
			$response['data']['message'] = __('Connection failed to the Asterisk');
			$response['success'] = false;
        }
		if ($this->asterisk->originate($channel, $context, $exten, $priority, $application, $data, $timeout, $callerID, $variable, $account, $async, $codecs)) {
			$response['success'] = true;
		} else {
			$response['data']['message'] = __('There is problem to originate');
			$response['success'] = false;
		}
		return $this->AjaxHandler->respond('json', $response);
	}

	/**
	 * admin_get_active_channels method
	 *
	 * Uses the Asterisk API to get the Active Channels
	 * and categorize into active call list and queue
	 *
	 * @param null $id
	 * @return mixed
	 */
    public function admin_get_active_channels() {
		$response = array(
			'success' => false,
			'data' => array(
  				'status' => __('Disconnected'),
  				'queue' => array(),
  				'active_call' => array(),
  				'hold' => array(),
			),
		);
		if (!$this->__asterisk_login()) {
		    $response['data'] = __('Could not connect to Asterisk');
		    $response['code'] = -1;
		} else {
			$activeChannels = $this->asterisk->getActiveChannels();
			foreach ($activeChannels as $key=>$activeChannel) {
				//determine the internal call is ringing or up
				if(isset($activeChannel->variables['calleridnum']) && $activeChannel->variables['calleridnum'] == $this->currentUser['User']['extension']) {
					if ($activeChannel->variables['channelstate'] == Configure::read('Asterisk.channelstate.Ringing')) {
						unset($activeChannels[$key]);
						$response['data']['status'] = __('Ringing');
					}
					else if ($activeChannel->variables['channelstate'] == Configure::read('Asterisk.channelstate.Up')) {
						unset($activeChannels[$key]);
						$response['data']['status'] = __('Connected');
					}
				//determine the call is in queue or active call
				//if the User is not login, we will not showing anything
				} else if ($this->currentUser && isset($activeChannel->variables['applicationdata']) && $activeChannel->variables['applicationdata'] == $this->currentUser['User']['conference_extension'].",,") {
					array_push($response['data']['active_call'], $activeChannel);
				}
				if ($this->currentUser && isset($activeChannel->variables['application']) && $activeChannel->variables['application'] == Configure::read('Asterisk.application.park')) {
					array_push($response['data']['hold'], $activeChannel);
                }
				if ($this->currentUser && isset($activeChannel->variables['application']) && $activeChannel->variables['application'] == Configure::read('Asterisk.application.queue')) {
					array_push($response['data']['queue'], $activeChannel);
                }
				if ($activeChannel->variables['event'] == "CoreShowChannelsComplete") {
                    unset($activeChannels[$key]);
                }
            }

            $response['data']['channels'] = $activeChannels;
            $response['success'] = true;
        }
        header('Content-Type: application/json');

		return $this->AjaxHandler->respond('json', $response);
	}

	/**
     * admin_hold
     *
     * Hold the on call User to parking ext
     *
     * @param null $id
     * @return mixed
     */
    public function admin_hold() {
		$response = array('success' => false, 'data' => array());
		header('Content-Type: application/json');
		if(!$this->currentUser){
			$response['data']['message'] = __('User is not logged in');
            $response['success'] = false;
			return $this->AjaxHandler->respond('json', $response);
		}
		if (!$this->__asterisk_login()) {
		    $response['data']['message'] = __('Could not connect to Asterisk');
		    $response['code'] = -1;
		} else {
			$channel = $this->request->data['channel'];
			$ext = $this->request->data['ext'];
			//check if the call is still in queue
			$activeChannels = $this->asterisk->getActiveChannels();
			foreach ($activeChannels as $key=>$activeChannel) {
				//check if the current is in conference
				if(isset($activeChannel->variables['calleridnum']) && $activeChannel->variables['calleridnum'] == $this->currentUser['User']['extension']) {
					if (isset($activeChannel->variables['application']) && $activeChannel->variables['application'] != Configure::read('Asterisk.application.conference')) {
						$response['data']['message'] = __('You are not in conference yet. Please reconnect!');
						$response['success'] = false;
						return $this->AjaxHandler->respond('json', $response);
					}
				}
            }

			//transfer to the conference room according to the database
			$result = $this->asterisk->transfer($channel, false, $ext, 'from-internal', '1');
			$response['data']['result'] = $result;
			$response['success'] = $result;
		}

		return $this->AjaxHandler->respond('json', $response);
    }

    /**
     * admin_get_active_channels method
     *
     * Uses the Asterisk API to get the Active Channels
     *
     * @param null $id
     * @return mixed
     */
    public function admin_transfer() {
		$response = array('success' => false, 'data' => array());
		header('Content-Type: application/json');
		if(!$this->currentUser){
			$response['data']['message'] = __('User is not logged in');
            $response['success'] = false;
			return $this->AjaxHandler->respond('json', $response);
		}
		if (!$this->__asterisk_login()) {
		    $response['data']['message'] = __('Could not connect to Asterisk');
		    $response['code'] = -1;
		} else {
			$channel = $this->request->data['channel'];
			$ext = $this->request->data['ext'];
			//check if the call is still in queue
			$activeChannels = $this->asterisk->getActiveChannels();
			foreach ($activeChannels as $key=>$activeChannel) {
				//check if the current is in conference
				if(isset($activeChannel->variables['calleridnum']) && $activeChannel->variables['calleridnum'] == $this->currentUser['User']['extension']) {
					if (isset($activeChannel->variables['application']) && $activeChannel->variables['application'] != Configure::read('Asterisk.application.conference')) {
						$response['data']['message'] = __('You are not in conference yet. Please reconnect!');
						$response['success'] = false;
						return $this->AjaxHandler->respond('json', $response);
					}
				}
				//determine the internal call is ringing or up
				if(isset($activeChannel->variables['channel']) && $activeChannel->variables['channel'] == $channel) {
					// if the customer is already in the conference
					if (isset($activeChannel->variables['application']) && $activeChannel->variables['application'] == Configure::read('Asterisk.application.conference')) {
						$response['data']['message'] = __('The customer is in call');
						$response['success'] = false;
						return $this->AjaxHandler->respond('json', $response);
					}
				}
            }

			//transfer to the conference room according to the database
			$result = $this->asterisk->transfer($channel, false, $ext, 'from-internal', '1');
			$response['data']['result'] = $result;
			$response['success'] = $result;
		}

		return $this->AjaxHandler->respond('json', $response);
    }
}