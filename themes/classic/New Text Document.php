<?php
$form=$this->beginWidget('CActiveForm', array(
									'id'=>'user-register',
									'enableAjaxValidation'=>false,
									'htmlOptions'=>array('enctype'=>'multipart/form-data'),
						));
echo $form->labelEx($model,'first_name',array('class'=>'span4 pull-left'));
echo $form->textField($model,'first_name',array('class'=>'pull-left'));
echo $form->error($model,'first_name');

echo $form->labelEx($model,'last_name',array('class'=>'span4 pull-left'));
echo $form->textField($model,'last_name',array('class'=>'pull-left'));
echo $form->error($model,'last_name');

echo $form->labelEx($model,'date_of_birth',array('class'=>'span4 pull-left'));
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'model'=>$model,
									'attribute'=>'date_of_birth',
									'options'=>array('dateFormat'=>'yy-mm-dd',
													'changeMonth'=>'true',
													'changeYear'=>'true',
									
									),
									
									));
echo $form->error($model,'date_of_birth');
echo '<div class="clearfix"></div>';
echo $form->labelEx($model,'gender',array('class'=>'span4 pull-left'));
echo $form->radioButtonlist($model,'gender',array('Male'=>'Male','Female'=>'Female'),array('separator'=>'','class'=>'pull-left'));
echo $form->error($model,'gender');
echo '<div class="clearfix"></div>';
echo $form->labelEx($model,'class',array('class'=>'span4 pull-left'));
echo $form->textField($model,'class');
echo $form->error($model,'class',array('class'=>'span4 pull-left'));

echo $form->labelEx($model,'school',array('class'=>'span4 pull-left'));
echo $form->textField($model,'school');
echo $form->error($model,'school',array('class'=>'span4 pull-left'));

echo $form->labelEx($model,'Place/ City',array('class'=>'span4 pull-left'));
echo $form->dropDownlist($model,'cities_id',CHtml::listData(Cities::model()->findAll(),'id','title'),array('class'=>'form-control'));
echo $form->error($model,'cities_id',array('class'=>'span4 pull-left'));

echo '<div class="clearfix"></div>';
echo $form->labelEx($model,'email',array('class'=>'span4 pull-left'));
echo $form->textField($model,'email');
echo $form->error($model,'email',array('class'=>'span4 pull-left'));

echo $form->labelEx($model,'mobile_no',array('class'=>'span4 pull-left'));
echo $form->textField($model,'mobile_no');
echo $form->error($model,'mobile_no',array('class'=>'span4 pull-left'));
echo $form->labelEx($model,'username',array('class'=>'span4 pull-left'));
/*echo $form->labelEx($model,'username',array('class'=>'span4 pull-left'));
 $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'username',
	'value'=>'',
	'source'=>CController::createUrl("/site/CheckUser"),// <- path to controller which returns dynamic data

	// additional javascript options for the autocomplete plugin
	'options'=>array(
		'minLength'=>'1', // min chars to start search
		'select'=>'js:function(event, ui) { $("#availability").val(ui.item.name); }'
	),
	'htmlOptions'=>array(
		'id'=>'username',
		'rel'=>'val',
		'class'=>'txtField',
	),
));*/
 echo $form->textField($model,'username');


echo CHtml::ajaxLink('Check User', CHtml::normalizeUrl(array('site/CheckUser')), 
     array(
       'data'=>'js:jQuery(this).parents("form").serialize()+"&isAjaxRequest=1"',               
       'success'=>
                  'function(data){
                        $("#searchResult").html(data);
                        $("#searchResult").fadeIn();
                        return false;
                   }'    
 
     ), 
     array(
        'id'=>'ajaxSubmit',
		'class'=>'btn btn-primary pull-right',
        'name'=>'ajaxSubmit'
     )); 

echo '<div class="span4 pull-right alert alert-info" id="searchResult" style="display:none;"></div>';
echo $form->error($model,'username',array('class'=>'span4 pull-left'));
echo '<div class="clearfix"></div>';
echo $form->labelEx($model,'password',array('class'=>'span4 pull-left'));
echo $form->passwordField($model,'password');
echo $form->error($model,'password',array('class'=>'span4 pull-left'));

echo $form->labelEx($model,'Retype_the_Password',array('class'=>'span4 pull-left'));
echo $form->passwordField($model,'confirmpass');
echo $form->error($model,'confirmpass',array('class'=>'span4 pull-left'));
echo '<div class="clearfix"></div>';
echo CHtml::submitButton('Sign up',array('class'=>'btn btn-primary pull-right'));
$this->endWidget();
?>

