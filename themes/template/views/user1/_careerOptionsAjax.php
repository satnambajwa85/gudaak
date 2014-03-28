<div class="col-md-3 pd0 pull-left preferred-career">
						<h2>Preferred Careers</h2>
						<ul>
							<?php foreach($resultList as $list){ ?> 
							<li><?php echo CHtml::ajaxLink($list->careerOptions->title,array(''), array('update'=>'#dialogWrapper'));?></li>
							<?php } ?>
						</ul>
					</div>
					<div class="col-md-9   pull-left preferred-career-info">
						<h2>Preferred Careers</h2>
						<ul id="career-description-tabs">
							 <li><a href="#tab1">Overview</a></li>
							 <li><a href="#tab2">Job Nature</a></li>
							 <li><a href="#tab3">The Payoff</a></li>
							 <li><a href="#tab4">Skills/Traits</a></li>
							 <li><a href="#tab5">Getting there</a></li>
							 <li><a href="#tab6">Opportunities</a></li>
							 <li><a href="#tab7">Hall of Fame </a></li>
							 <li><a href="#tab8">Pros and Cons</a></li>
						 
						</ul>
						<div class="clear"></div>
						<div id="tab1" class="tab-visible">
							hiii
						</div>	
						<div id="tab2" class="tab-visible">
							wwwwwwwwwwwww
						</div>
						
</div>