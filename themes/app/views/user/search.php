<?php $path	=	Yii::app()->baseUrl.'/uploads/SchoolsProfile/sthumb/';?> 
<div class="border">
		<ol class="breadcrumb">
		  <li><a href="#">Assessment</a></li>
		 
		</ol>
</div>
<div class="row col-md-9 mar0">
  <?php $this->widget('zii.widgets.CListView', array(
													'dataProvider'=>$fech_result,
													'itemView'=>'_searchResult',
													'id'=>'search-result', 
													'ajaxUpdate'=>true, 
													'summaryText'=>false,
													'pager' => array(
																	'header' => '',
														'cssFile' =>'',
														'firstPageLabel'=>'First',
														'lastPageLabel'=>'Last',
														'prevPageLabel'=>'« Prev',
														'nextPageLabel'=>'Next »',
													),
												)); ?>
</div>
<div class="col-md-3 pd0 pull-left">
	<?php  $this->Widget('WidgetNews'); ?>
</div>
