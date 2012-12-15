<div class="row">
	<div class="span4 offset2">
		<?php echo $this->Html->image($data['Map']['image'], array('alt' => $data['Map']['name']));?>
	</div>
	<div class="span5">
		<h3><?php echo $data['Map']['name'];?></h3>
		<p><?php echo $data['Map']['description'];?></p>
		<p>Please select the following action:</p>
		<?php 
			foreach($data['Map']['Action'] as $action) {
				echo $this->Html->link($action['name'], '#', array('data_target' => $action['rel'], 'class'=>'btn default request', 'request-type' => 'modal', 'destination_id'=>'modal_container'));
			}
		?>
	</div>
</div>

<div id="modal_container">
</div>