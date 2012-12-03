<div class="row">
	<div class="span4 offset2">
		<?php echo $this->Html->image('Pallet_Town.png', array('alt' => 'Pallet Town'));?>
	</div>
	<div class="span5">
		<h3>Pallet Town</h3>
		<p>A fairly new and quiet town. It's a small and pretty place.</p>
		<p>Please select the following action:</p>
		<?php echo $this->Html->link(__('Map'), '#', array('class'=>'btn default')); ?>
		<?php echo $this->Html->link(__('Pokemon'), '#', array('class'=>'btn default')); ?>
		<?php echo $this->Html->link(__('Go to Prof Oak\'s lab'), '#', array('data_target' => 'oak_lab','destination_id'=>'modal_container', 'request-type' => 'modal', 'class'=>'btn default request')); ?>
		<?php echo $this->Html->link(__('Inventory'), '#', array('class'=>'btn default')); ?>
	</div>
</div>

<div id="modal_container">
	<?php echo $this->element('Games/Modal/pokemon_info');?>
</div>