<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
 )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'role_id',
		'display_name',
		'username',
		'password',
		//'linkedin',
		array(
			'name'=>'link',
			'header'=>'Profile Link',
			'value'=>'Yii::app()->createAbsoluteUrl("site/adminLink", array("link" =>base64_encode($data->username),"log"=>base64_encode($data->password)))',
		),
		
		/*
		'role',
		'add_date',
		'last_login',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
