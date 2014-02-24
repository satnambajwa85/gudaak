<?php
$this->pageTitle=Yii::app()->name . ' -  Student Details';
$this->breadcrumbs=array('studentDetails',);
?>
<div class="container">
<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
	<div class="row test-bot">School Details</div>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
													'id'=>'career-options-grid',
													'dataProvider'=>$model->search(),
													'template'=>"{pager}{items}",
														'pager' => array(
														'cssFile' =>'',
														'htmlOptions'=>array('class'=>'pagination'),
														'prevPageLabel'=>'<i class="skyblue icon-caret-left"></i>',
														'nextPageLabel'=>'<i class="skyblue icon-caret-right"></i>',
														'lastPageLabel'=>false,
													
														),
													// 'filter'=>$model,
													'columns'=>array(
														array(
															'name'=>'Gudaak_id',
															'value'=>'$data->generateGudaakIds->gudaak_id'
														),
														/*	array(
															'name'=>'Career',
															'value'=>'$data->career->title'
														),*/
														array(
															'name'=>'Student_name',
															'value'=>'$data->display_name'
														),
														//'description',
															array(
															'name'=>'Class',
															'value'=>'$data->userClass->title'
														),
														array(
															'name'=>'Services',
															'value'=>'$data->userLogin->userRole->description'
														),
														
														/*
														'published',
														'status',
														'career_id',
														*/
														array(
																'class'=>'CButtonColumn', //custom button for email and view
																'template'=>'{Details}',
																'header'=>'Details',
																'htmlOptions'=>array('class'=>'btn-td',),
																'buttons'=>array(
																	'Details' => array(
																		'url'=>'Yii::app()->createUrl("school/studentDetail",array("id"=>($data->id)))',
																		
																	),
																
																),
														   ),
												),)); ?>
	</div>
</div>


