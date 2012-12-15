<?php echo $pokemon;?>
<div class="popover fade right in" style="top: 120.5px; left: 111px; display: block;">
	<div class="arrow"></div>
	<div class="popover-inner">
		<h3 class="popover-title">A Title</h3>
		<div class="popover-content">
			<ul class="nav nav-tabs layout-no-margin-bottom">
				<li class="active"><a href="#status" data-toggle="tab">Status</a></li>
				<li><a href="#skill" data-toggle="tab">Skills</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="status">
					<div class="row">
				  		<div class="span3">
						    <h3>Bulbasaur	Lv 5</h3>
						    <div class="hp_bar progress">
								<div class="bar bar-success" style="width: 35%;"></div>
								<div class="bar bar-warning" style="width: 20%;"></div>
								<div class="bar bar-danger" style="width: 10%;"></div>
							</div>
							<div class="row">
								<div class="span2 stat_label">HP:</div>
								<div class="span1 layout-no-margin-left text-right">30/30</div>
							</div>
							<div class="row">
								<div class="span2 stat_label">Exp:</div>
								<div class="span1 layout-no-margin-left text-right">0/30</div>
							</div>
							<div class="hp_bar progress">
								<div class="bar" style="width: 35%;"></div>
							</div>
							<div class="stat_block stat_border">
							    <div class="row">
									<div class="span2 stat_label">
										Attack
									</div>
									<div class="span1 layout-no-margin-left text-right">
										3012
									</div>
							    </div>
							    <div class="row">
									<div class="span2 stat_label">
										Defense
									</div>
									<div class="span1 layout-no-margin-left text-right">
										30
									</div>
							    </div>
							    <div class="row">
									<div class="span2 stat_label">
										Special Attack
									</div>
									<div class="span1 layout-no-margin-left text-right">
										30
									</div>
							    </div>
							    <div class="row">
									<div class="span2 stat_label">
										Special Defense
									</div>
									<div class="span1 layout-no-margin-left text-right">
										30
									</div>
							    </div>
							    <div class="row">
									<div class="span2 stat_label">
										Speed
									</div>
									<div class="span1 layout-no-margin-left text-right">
										30
									</div>
							    </div>
							</div>
						</div>
						<div class="span2">
							<div class="stat_pokemon_block stat_border text-center">
								<?php echo $this->Html->image('Pokemon/Bulbasaur.png', array('class'=>'pokedex_image','alt' => 'Bulbasaur'));?>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="skill">...</div>
			</div>
		</div>
	</div>
</div>

