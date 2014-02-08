<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    /**
     * Models
     *
     * @var array
     */
    public $uses = array(
        'User',
    );

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Filter.Filter');

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = array('Filter.Filter');

    /**
     * Filters
     *
     * @var array
     */
    public $filters = array(
		'admin_index' => array(
			'User' => array(
                'User.callcenter_id' => array(
                    'type' => 'select',
                    'label' => 'Callcenter',
                    'selector' => 'getCallcenterList'
                ),
                'User.name' => array(
                    'label' => 'Name'
                ),
                'User.lastname' => array(
                    'label' => 'Lastname'
                ),
                'User.username' => array(
                    'label' => 'Username'
                ),
                'User.email' => array(
                    'label' => 'Email'
                ),
                'User.role_id' => array(
                    'type' => 'select',
                    'label' => 'Role',
                    'selector' => 'getRoleList'
                ),
			)
		),
	);

    /**
     * beforeFilter
     */
    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login','admin_add');
	}

    /**
     * home method
     *
     * @return void
     */
    public function admin_home()  {
        switch ($this->Session->read('Auth.User.role_id')) {
            case Configure::read('Role.master'):
                break;
            case Configure::read('Role.admin'):
            case Configure::read('Role.callcenter'):
            case Configure::read('Role.agent'):
                break;
            default:
                $this->redirect(array('action'=>'login'));
                throw new MethodNotAllowedException();
                break;
        }
    }

    /**
     * profile method
     *
     * @return void
     */
    public function admin_profile()  {
        $id = $this->Session->read('Auth.User.id');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid admin'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
        $this->paginate = array(
            'User' => array(
                'contain' => array('Role'),
            )
        );
        $users = $this->paginate('User');
		$this->set(compact('users'));
	}

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
	public function admin_view($id = null) {
        $this->User->recursive = 2;
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add($role_id = null) {
		if ($this->request->is('post')) {
			$this->request->data['User']['is_active'] = 1;
            if ($this->request->data['User']['role_id']==Configure::read('Role.master')) unset($this->request->data['User']['role_id']);
            $this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'Flash/error');
			}
        } else {
            $this->request->data['User']['role_id'] = $role_id;
        }
        $callcenters = $this->User->Callcenter->find('list');
		$roles = $this->User->Role->find('list',array('conditions'=>array('id !='=>Configure::read('Role.master'))));
		$this->set(compact('roles','callcenters'));
	}


    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'Flash/error');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
        $callcenters = $this->User->Callcenter->find('list');
        $roles = $this->User->Role->find('list',array('conditions'=>array('id !='=>Configure::read('Role.master'))));
        $this->set(compact('roles','callcenters'));
	}

    /**
     * delete method
     *
     * @param string $id
     * @return void
     *
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'),'Flash/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'),'Flash/error');
		$this->redirect(array('action' => 'index'));
	}
     */
    /**
     * admin_deactivate method
     *
     * @param string $id
     * @return void
     */
	public function admin_deactivate($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->updateAll(array('is_active'=>0),array('User.id'=>$id))) {
			$this->Session->setFlash(__('User deactivated'),'Flash/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deactivated'),'Flash/error');
		$this->redirect(array('action' => 'index'));
	}

    /**
     * admin_activate method
     *
     * @param string $id
     * @return void
     */
	public function admin_activate($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->updateAll(array('is_active'=>1),array('User.id'=>$id))) {
			$this->Session->setFlash(__('User activated'),'Flash/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not activated'),'Flash/error');
		$this->redirect(array('action' => 'index'));
	}

	/**
	 * admin_login method
	 *
	 * @return void
	 */
	public function admin_login() {
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash(__('You are logged in!'),'Flash/info');
			$this->redirect('/', null, false);
		}
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
                if ($this->Session->read('Auth.User.is_active')) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash(__('This account is inactive. Contact your administrator.'),'Flash/error');
                    $this->redirect($this->Auth->logout());
                }
			} else {
				$this->Session->setFlash(__('Your username or password was incorrect.'),'Flash/error');
			}
		}
	}

	/**
	 * admin_logout method
	 *
	 * @return void
	 */
	public function admin_logout() {
		$this->Session->setFlash(__('Good bye!'),'Flash/info');
		$this->redirect($this->Auth->logout());
	}
}
