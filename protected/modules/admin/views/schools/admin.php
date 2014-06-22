<?php
$this->breadcrumbs=array('States'=>array('/admin/states/admin'),'Cities'=>array('/admin/cities/adminView','id'=>$model->cities->states_id),'Schools'=>array('/admin/schools/adminView','id'=>$model->cities_id));
$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));





$this->menu=array(
	array('label'=>'List Schools', 'url'=>array('index')),
	array('label'=>'Create Schools', 'url'=>array('create')),
);

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

<h1>Manage Schools</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/schools/create','id'=>$id),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schools-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'cities_id',
            'value'=>'$data->cities->title'
        ),
		'name',
		//'description',
		'display_name',
		'email',
		array(
            'name'=>'images',
            'type'=>'raw',
             'value' => 'CHtml::image(Yii::app()->baseUrl . "/uploads/schools/small/" . $data->images)'

        ),
		array(
		'type'=>'raw',
		'name'=>'student_list',
		'value'=>'CHtml::link("Student",array("/admin/generateGudaakIds/adminView","id"=>$data->id))',
		),
		'mobile_no',
		/*
		'fax',
		'address',
		'address2',
		'postcode',
		'activation',
		'telephone_no',
		'images',
		'website',
		'modification_date',
		'add_date',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
