<h3 class="text-center">Congraturation! You got a <?php echo $name;?>!</h3>
<div class="row text-center">
	<div class="span1 offset1">
    	<?php echo $this->Html->image('gary.gif');?>
    </div>
    <div class="span3">
    	<?php echo __('Gary would like to give you a tutorial about Battle. Would you like to battle with him?'); ?>
    	<?php echo $this->Html->link(__('Yes'), '#', array('class'=>'btn btn-mini request', 'request-type' => 'battle', 'data_target'=>'tutorial')); ?>
    	<?php echo $this->Html->link(__('No'), '#', array('class'=>'btn btn-mini', 'data-dismiss'=>"modal", 'aria-hidden'=>"true")); ?>
    </div>
</div>