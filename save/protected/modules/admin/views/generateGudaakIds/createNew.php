<?php
if(Yii::app()->controller->action->id=='admin'){

}else{
$this->breadcrumbs=array('States'=>array('/admin/states/admin'),'Cities'=>array('/admin/cities/adminView','id'=>$school->cities->states_id),
'Schools'=>array('/admin/schools/adminView','id'=>$school->cities->id),
'Back to Gudaak id view'=>array('/admin/generateGudaakIds/adminView','id'=>$_REQUEST['id']));
$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));

}
$this->menu=array(
	array('label'=>'List GenerateGudaakIds', 'url'=>array('index')),
	array('label'=>'Manage GenerateGudaakIds', 'url'=>array('admin')),
);
?>

<h1><?php echo $school->cities->states->countries->title.'/'.$school->cities->states->title.'/'.$school->cities->title.'/'.$school->name;?> </h1>

    <div class="span11">
    <?php
	$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Text fields",
		));
		
	?>
<?php if(Yii::app()->user->hasFlash('error')): ?>
	<div class="alert alert-success">
	  <button data-dismiss="alert" class="close" type="button">×</button>
	  <strong><?php echo Yii::app()->user->getFlash('error'); ?></strong>
	</div>
		 
<?php endif; ?>	
   <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'generate-gudaak-ids-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>false,)	
)); 
	echo $form->errorSummary($model);
	echo $form->hiddenField($model,'gudaak_id',array('value'=>'GDK'));
	echo $form->hiddenField($model,'cities_id',array('value'=>''.$school->cities_id.''));
	echo $form->hiddenField($model,'schools_id',array('value'=>''.$school->id.''));
	echo $form->labelEx($model,'user_role_id');
	echo $form->dropDownlist($model,'user_role_id',array('2'=>'Stream','3'=>'Career'),array('empty'=>'Please Select','class'=>'form-control'));
	//echo $form->labelEx($model,'user_class_id');
	//echo $form->dropDownlist($model,'user_class_id',CHtml::listData(UserClass::model()->findAll(),'id','title'),array('empty'=>'Please Select','class'=>'form-control'));
	echo $form->labelEx($model,'number_of_user_Ids');
	echo $form->textField($model,'number_of_user_Ids');
	echo $form->error($model,'number_of_user_Ids');
	echo $form->labelEx($model,'activation');
	echo $form->radioButtonlist($model,'activation',array('1'=>'Yes','0'=>'No'),array('separator'=>''));
	echo $form->error($model,'activation');
	echo '<br><br>';
	echo $form->labelEx($model,'status');
	echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>''));
	echo $form->error($model,'status');
	echo '<br><br>';
	echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-s-md btn-success'));
	 $this->endWidget(); ?>
    <?php $this->endWidget();?>
    </div>
	