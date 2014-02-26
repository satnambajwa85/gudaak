<?php

if(Yii::app()->controller->action->id=='admin'){

}else{
$this->breadcrumbs=array('States'=>array('/admin/states/admin'),'Cities'=>array('/admin/cities/adminView','id'=>$model->schools->cities->states_id),'Schools'=>array('/admin/schools/adminView','id'=>$model->schools->cities->id));
$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));

}



$this->menu=array(
	array('label'=>'List GenerateGudaakIds', 'url'=>array('index')),
	array('label'=>'Create GenerateGudaakIds', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#generate-gudaak-ids-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage <?php echo $school->name;?>  Gudaak Ids</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/generateGudaakIds/createNew','id'=>$id),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'generate-gudaak-ids-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'gudaak_id',
		array(
            'name'=>'Cities',
            'value'=>'$data->cities->title'
        ),
		array(
            'name'=>'Schools',
            'value'=>'$data->schools->name'
        ),
		array(
            'name'=>'User Role Id',
            'value'=>'$data->userRole->description'
        ),
		'add_date',
		'activation',
		/*
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
