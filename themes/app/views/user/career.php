	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left middle-format-left">
				<h1>Interest Test</h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>
				<?php echo CHtml::ajaxLink('Konw more about Career Library',array(''));?>
			</div>
			
		</div>
		<div class="clear"></div>
		<div class="row educationbot  fl">
 <?php $this->widget('zii.widgets.CListView', array(
											'dataProvider'=>$fech_result,
											'itemView'=>'_career_library',
											'id'=>'careerLibrary', 
											'ajaxUpdate'=>true, 
											'summaryText'=>false,
											'pager' => array(
														'header' => '',
														'cssFile' =>'',
														'firstPageLabel'=>'',
														'lastPageLabel'=>'',
														'prevPageLabel'=>'<img border="0" src="'.Yii::app()->theme->baseUrl.'/images/paging_left_arrow.gif">',
														'nextPageLabel'=>'<img border="0" src="'.Yii::app()->theme->baseUrl.'/images/paging_right_arrow.gif">',
														),)); ?>
	</div>
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			