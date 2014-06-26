<?php
/* @var $this UserProfilesController */
/* @var $model UserProfiles */

$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserProfiles', 'url'=>array('index')),
	array('label'=>'Create UserProfiles', 'url'=>array('create')),
	array('label'=>'Update UserProfiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserProfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserProfiles', 'url'=>array('admin')),
);
?>

<h1>View UserProfiles #<?php echo $model->id; ?></h1>
<?php echo CHtml::link('Back to User list',array('/admin/userProfiles/admin'),array('class'=>'pull-right btn btn-danger ui-slider'));?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'display_name',
		'first_name',
		'last_name',
		//'class',
		array(
			'name'=>'City',
			'value'=>(isset($model->generateGudaakIds->cities->title))?$model->generateGudaakIds->cities->title:'Not Set',
		),
		array(
			'name'=>'State',
			'value'=>(isset($model->generateGudaakIds->cities->states->title))?$model->generateGudaakIds->cities->states->title:'Not Set',
		),
		'email',
		'gender',
		'date_of_birth',
		array(
			'type'=>'raw',
			'name'=>'Image',
			'value'=>CHtml::image(Yii::app()->baseUrl."/uploads/user/small/".$model->image),
		),
		'mobile_no',
		'address',
		'postcode',
		//'user_info',
		'add_date',
		//'semd_mail',
		'status',
		'user_login_id',
		'userLogin.username'		 
	),
)); ?>

 <div class="tab2_form_box">
<h4>What are your current Interest?</h4>
<div class="col-xs-12">
<?php

$Interests		=	Interests::model()->findAll();
$selInter		=	array();
foreach($model->userProfilesHasInterests as $ind)
	$selInter[]	=	$ind->interests_id;

foreach($Interests as $interest){?>
<div class="col-xs-3">
<input type="checkbox" <?php echo (in_array($interest->id,$selInter))?'checked="checked"':'';?> disabled="disabled" value="<?php echo $interest->id; ?>" name="interest[]" /><?php echo $interest->title; ?>
</div>
<?php
}?>
</div>   
</div>
