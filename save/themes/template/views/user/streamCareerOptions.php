<div class="streem-tabs pull-left">
		<div class="mr0 col-md-12">
			<div class="mr0  pull-left middle-format-left">
				<h1><?php echo $steamData->name;?></h1>
				<p><?php echo $steamData-> description;?></p>
				<?php echo CHtml::ajaxLink('Konw more about Career Library',array(''));?>
			</div>
			<div class="col-md-12 pd0 pull-left subjects-left-area">
				<ul id="tabs">
					 <li class="tabs-style"><a href="#subjects">Subjects</a></li>
					<li><a href="#careerOptions">Career Options</a></li>
				
					
				</ul>
				<div id="subjects" class="tab-section">
					<div class="col-md-3 pd0 pull-left preferred-career">
						<h2>Subjects</h2>
							<ul>
								<?php	foreach($stream as $strm){?>
											<?php $subjects	=	CareerOptionsHasSubjects::model()->findAllByAttributes(array('career_options_id'=>$strm->career_options_id));?>
											<?php 	foreach($subjects	as $list){?>
												<li><?php echo CHtml::ajaxlink($list->subjects->title,array('user/careerOptionsAjax','id'=>$list->id),array('update'=>'#careerOptions'))?></li>
											<?php }	?>
										<?php }	?>
								
								
							</ul>
					</div>
				</div>
				<div id="careerOptions" class=" tab-section">
					
				</div>
				
				
			</div>
			
		</div>
		<div class="clear"></div>
		<div class="row educationbot  fl">

	</div>
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			