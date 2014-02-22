<?php
/* @var $this SubjectsController */
/* @var $model Subjects */

$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Subjects', 'url'=>array('index')),
	array('label'=>'Create Subjects', 'url'=>array('create')),
	array('label'=>'Update Subjects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Subjects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subjects', 'url'=>array('admin')),
);
?>

<h1>View Subjects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		 array(
            'name'=>'image',
            'type'=>'raw',
             'value' => '<img src="'.Yii::app()->baseUrl.'/uploads/subjects/small/'.$model->image.'"/>'

        ),
		'add_date',
		'published',
		'status',
	),
)); ?>
