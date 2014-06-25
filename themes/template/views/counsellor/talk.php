<?php
$this->pageTitle=Yii::app()->name . ' -  Student Details';
$this->breadcrumbs=array('studentDetails',);
?>
<div class="container">



<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
	<div class="row test-bot">School Details</div>
   <h4> Your Queries</h4>
<div class="col-md-12">
	<div id="create-form" class="col-md-6">
		<?php $this->renderPartial('_talk',array('model'=>$model,)); ?>
	</div>
    <div class="col-md-6 pull-left summaryDetails pd0">
    <div id="resultSummery"></div>				
    </div>
</div>    
<div class="clear"></div>
<div class="mt50"></div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tickets-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	'summaryText' => '',
	'columns'=>array(
		'title',
		'problem',
		array(
			'type'=>'raw',
            'name'=>'status',
            'value'=>'CHtml::ajaxLink(($data->status==1)?"Pending":"Answers",array("summaryData","id"=>$data->id),array("type"=>"POST","sucess"=>\'function(data){$("#resultSummery").html(data);}\'),array("class"=>"summery-left-btn"))'
		),
		array(
            'name'=>'add_date',
            'value'=>'date("M d,Y",strtotime($data->add_date))'
		),
	),
)); ?>
                                                
	</div>
</div>
