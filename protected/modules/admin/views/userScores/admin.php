<?php
$this->breadcrumbs=array(
	'User Scores'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserScores', 'url'=>array('index')),
	array('label'=>'Create UserScores', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-scores-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Scores</h1>


<?php echo (isset($_REQUEST['user_profiles_id']))?CHtml::link('Back to User list',array('/admin/userProfiles/admin'),array('class'=>'pull-right btn btn-s-md btn-danger ui-slider')):''?>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-scores-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'User',
            'value'=>'$data->userProfiles->first_name." ".$data->userProfiles->last_name'
        ),
		//'user_profiles_id',
		array(
            'name'=>'Test Type',
            'value'=>'($data->test_category==2)?"Personality Test":"Interest Test"'
        ),
		array(
            'name'=>'User',
            'value'=>'$data->careerCategories->title'
        ),
		//'career_categories_id',
		'score',
		'add_date',
		/*
		'published',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
