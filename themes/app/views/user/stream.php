<div class="col-xs-12 col-sm-6 col-md-5 pull-left dashboard-logo white">
					<div class="dashboard-logo  pull-left">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/dashboard-logo.png">
					</div>
					<div>
						<h1>Stream Explore</h1>
						<span>It is long established fact a reader will be It is long established fact a reader will be
								It is long established fact a reader will be 
						</span>
						
						<a href="#">Konw more about stream explore</a>
					</div>
</div>
<div class="row col-xs-12 col-sm-6 col-md-7 pull-right banner">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/banner.png">
				</div>
<div class="clearfix"></div>
<div class="border">
		<ol class="breadcrumb">
		  <li><a href="#">Explore</a></li>
		 
		</ol>
	</div>
	<div class="col-md-9 pull-left">
		<div class="mr0 col-md-12">
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
											'itemView'=>'_stream_library',
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
			