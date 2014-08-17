<?php
/* @var $this SuppliersHasSkillsController */
/* @var $model SuppliersHasSkills */

$this->breadcrumbs=array(
	'Suppliers Has Skills'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersHasSkills', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasSkills', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-has-skills-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Search Supplier By Skills</h1>
<?php  $this->Widget('WidgetPageSize'); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-has-skills-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'suppliers_id',
		array(            
            'name'=>'suppliers_id',
			'type'=>'raw',
            'value'=>'CHtml::link($data->suppliers->first_name." ".$data->suppliers->last_name,array("/admin/suppliers/view","id"=>$data->suppliers_id))',
			 
			'filter'=>CHtml::activeDropDownList($model, 'suppliers_id',
        CHtml::listData(Suppliers::model()->findAll(),'id', 'name'),
        array('empty'=>'Select Supplier')),),
		//'skills_id',
		array(            
            'name'=>'skills_id',
            'value'=>'$data->skills->name',
			'filter'=>CHtml::activeDropDownList($model, 'skills_id',
        CHtml::listData(Skills::model()->findAll('Skillscol!=0'),'id', 'name'),
        array('empty'=>'Select Skill')),
             ),
		//'status',
		//'add_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
