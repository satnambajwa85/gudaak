<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#schools-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="container">



<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
	<div class="row test-bot">Manage Schools</div>
    <div class="wide form">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schools-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
            'name'=>'cities_id',
            'value'=>'$data->cities->title'
        ),
		'name',
		//'description',
		//'display_name',
		'email',
		array(
            'name'=>'images',
            'type'=>'raw',
             'value' => 'CHtml::image(Yii::app()->baseUrl."/uploads/schools/small/".$data->images,"",array("width"=>100))'

        ),
		array(
		'type'=>'raw',
		'name'=>'Students',
		'value'=>'CHtml::link("students",array("/counsellor/studentDetails","id"=>$data->id))',
		),
		'mobile_no',
		
	),
)); ?>
	</div>
</div>