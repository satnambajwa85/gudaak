<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasReferences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasReferences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasReferences', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasReferences #<?php echo $model->id; ?></h1>
<a href="<?php echo $this->createUrl('SuppliersHasReferences/update',array('id'=>$model->id));?>" class="btn btn-info pull-right">Edit References</a>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_id',
		'client_first_name',
		'client_last_name',
		array(
          'label' => 'Supplier',
		  'type'	=>'raw',
          'value' => $model->suppliers->name,
        ),

		'project_name',
		'client_email',
		'company_name',
		'year_engagement',
		array(
          'label' => 'Industry',
		  'type'	=>'raw',
          'value' => $model->industry->name,
        ),

		'q1_communication_rating',
		'q2_skill_rating',
		'q3_timelines_ratings',
		'q4_independence_rating',
		'provider_do_well',
		'provider_improve',
		'problems_during_development',
		'client_project_description',
		array(
          'label' => 'status',
          'value' => isset($model->status)?($model->status==0)?'Awating Review':'Verified':'',
        ),
		'created',
		'modified',
	),
)); ?>
