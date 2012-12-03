<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <h3 id="myModalLabel"><?php echo __('Prof Oak\'s lab');?></h3>
  </div>
  <div class="modal-body">
    <p>Prof Oak would like to give one of his best pokemon to you. Choose one of the following Pokemon.</p>
    <div class="row text-center">
    	<div class="span1_5 offset1">
	    	<?php echo $this->Html->image('Pokemon/Bulbasaur.png', array('class'=>'pokedex_image','alt' => 'Bulbasaur'));?>
	    	<?php echo $this->Html->link(__('Status'), '#', array('destination_id'=>'info_container', 'params'=>'pokemon=1', 'data_target'=>'pokemon_info', 'class'=>'btn btn-mini request')); ?>
	    	<?php echo $this->Html->link(__('Choose'), '#', array('class'=>'btn btn-mini inital_pokemon','value'=>'Bulbasaur')); ?>
	    </div>
	    <div class="span1_5">
	    	<?php echo $this->Html->image('Pokemon/Charmander.png', array('class'=>'pokedex_image','alt' => 'Charmander'));?>
	    	<?php echo $this->Html->link(__('Status'), '#', array('class'=>'btn btn-mini')); ?>
	    	<?php echo $this->Html->link(__('Choose'), '#', array('class'=>'btn btn-mini inital_pokemon','value'=>'Charmander')); ?>
	    </div>
	    <div class="span1_5">
	    	<?php echo $this->Html->image('Pokemon/Squirtle.png', array('class'=>'pokedex_image','alt' => 'Squirtle'));?>
	    	<?php echo $this->Html->link(__('Status'), '#', array('class'=>'btn btn-mini')); ?>
	    	<?php echo $this->Html->link(__('Choose'), '#', array('class'=>'btn btn-mini inital_pokemon','value'=>'Squirtle')); ?>
	    </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Back to Town</button>
  </div>
</div>

<div id="info_container">
	
</div>
