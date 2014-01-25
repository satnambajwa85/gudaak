	<div class="border">
					<ol class="breadcrumb">
					  <li><a href="#">Assessment</a></li>
					 
					</ol>
				</div>
				<div class="row col-md-9 mar0">
					 <div class="mr0  pull-left middle-format-left">
						<h1><?php echo $testContent->title;?></h1>
						<?php echo $testContent->description ;?>
					</div>
					<div class="col-md-12 pull-left mt50" id="take-test">
						<div class="col-md-6 pull-left test-description-bot">
							<?php echo $testContent->test_features ;?>
						</div>
						<div class="col-md-6 pull-left border-box">
							<div align="center">
							<?php echo CHtml::link('Take '.$testContent->title.'',array('user/test','id'=>$testContent->id),array('class'=>'btn btn-info center-bt'));?>
								
							</div>
							<?php echo $testContent-> test_faqs ;?>
							<a href="#" class="more-faqs">More FAQs</a>
							<div align="center" class="mar-bottom">
						 
								<?php echo CHtml::link('Take Test',array('user/test','id'=>$testContent->id),array('class'=>'btn btn-warning'));?>
						  	</div>
						</div>
					</div>
				</div>
					<div class="col-md-3 pd0 pull-left">
					<?php  $this->Widget('WidgetNews'); ?>
				</div>
			