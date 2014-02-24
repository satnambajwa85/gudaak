<?php
/* @var $this CareerOptionsController */
/* @var $model CareerOptions */
$this->breadcrumbs=array('States'=>array('/admin/states/admin'),'Cities'=>array('/admin/cities/adminView','id'=>$model->states_id));
$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));




$this->menu=array(
	array('label'=>'List Cities', 'url'=>array('index')),
	array('label'=>'Create Cities', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cities-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cities</h1>


<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/cities/create','id'=>$id),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cities-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'Country',
            'value'=>'$data->states->countries->title'
        ),
		array(
            'name'=>'State',
            'value'=>'$data->states->title'
        ),
		'title',
		'alias',
		'description',
		'image',
			array(
		'type'=>'raw',
		'name'=>'Add Records',
		'value'=>'CHtml::link("Data",array("/admin/schools/adminView","id"=>$data->id))',
		),
		//'add_date',
		/*
		'published',
		'status',
		'states_id',
		'institutes_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
