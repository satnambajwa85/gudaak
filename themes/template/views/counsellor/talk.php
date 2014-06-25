<?php
$this->pageTitle=Yii::app()->name . ' -  Student Details';
$this->breadcrumbs=array('studentDetails',);
?>
<div class="container">



<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
	<div class="row test-bot">School Details</div>
   
	<?php 
	//echo CHtml::link('Add New','#',array('onclick'=>'$("#create-form").show();')); ?>
<h4> Your Queries</h4>
	<div id="create-form" <?php //echo (isset($_POST['Tickets']))?'':'style="display:none"';?>>
		<?php $this->renderPartial('_talk',array('model'=>$model,)); ?>
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
            'name'=>'status',
            'value'=>'($data->status==1)?"Pending":"Answers"'
		),
		array(
            'name'=>'add_date',
            'value'=>'date("M d,Y",strtotime($data->add_date))'
		),
	),
)); ?>


	</div>
</div>
