<?php
/* @var $this CareerController */
/* @var $model Career */
$this->breadcrumbs=array(
	'Careers'=>array('index'),
	'Manage',
);


$this->breadcrumbs=array('Careers Categories'=>array('/admin/careerCategories/admin'),'Manage Careers Interest ',);
$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));



$this->menu=array(
	array('label'=>'List Career', 'url'=>array('index')),
	array('label'=>'Create Career', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#career-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Careers Interest</h1>
<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo (!isset($id))?CHtml::link('Create',array('/admin/career/create'),array('class'=>'pull-right btn btn-s-md btn-success')):CHtml::link('Create',array('/admin/career/createNew','id'=>$id),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'career-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'Career Categories ',
            'value'=>'$data->careerCategories->title'
        ),
		'title',
		//'description',
		'image',
		'add_date',
		'modification_date',
		/*
		'published',
		'status',
		'career_categories_id',
		*/
		array(
			'type'=>'raw',
			'name'=>'Add Records',
            'value'=>'CHtml::link("Data",array("/admin/careerOptions/adminView","id"=>$data->id))',
            ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>