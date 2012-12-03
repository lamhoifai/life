<div class="row">
	<div class="span12">
		<h3>Welcome to Pokemon Life. Please enter the name to start the game.</h3>
		<?php echo $this->BootstrapForm->create('Trainer', array('action' => 'create', 'class'=>'form-horizontal')); ?>
		<?php echo $this->BootstrapForm->input('Trainer.name'); ?>
		<div class="form-actions">
			<?php echo $this->BootstrapForm->button(__('Create'),array('class'=>'btn btn-primary')); ?>
		</div>
		<?php echo $this->BootstrapForm->end(); ?>
	</div>
	
</div>
