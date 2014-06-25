<?php
$this->pageTitle=Yii::app()->name . ' -  Student Details';
$this->breadcrumbs=array('studentDetails',);
?>
<div class="container">
<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
<div class="row test-bot">Students Queries</div>
<div class="clear"></div>
<div class="mt50"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tickets-grid-r',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$modelR->search(),
	'summaryText' => '',
	'columns'=>array(
		'title',
		'problem',
		'solution',
		array(
			'type'=>'raw',
			'name'=>'Status',
			'value'=>'CHtml::link((($data->status==1)?"Pending":"Answers"),array("/counsellor/studentQuery","id"=>$data->id),array("class"=>(($data->status==1)?"red":"green")))',
		),
		array(
            'name'=>'add_date',
            'value'=>'date("M d,Y",strtotime($data->add_date))'
		),
		array(
			'type'=>'raw',
			'name'=>'Profile',
			'value'=>'CHtml::link("Link",array("/counsellor/studentDetail","id"=>$data->sender_id))',
		),
		
	),
)); ?>

	</div>
</div>
