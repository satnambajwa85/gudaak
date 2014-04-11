<?php
$form=$this->beginWidget('CActiveForm', array(
									'id'=>'user-register',
									'enableAjaxValidation'=>false,
									'htmlOptions'=>array('enctype'=>'multipart/form-data'),
						));
echo '<i class="icon-key orange pull-left"></i>';
echo '<h4 class="form-signin-heading pd4">Create your Account</h4>';
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
		'class'=>'available pull-right',
        'name'=>'ajaxSubmit'
     )); 

echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Email address','autofocus'=>true));
echo $form->error($model,'username');
echo '<div class="pd4"></div>';
echo '<div class="available" id="searchResult" style="display:none;"></div>';
echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password','autofocus'=>true));
echo '<div class="pd4"></div>';
echo $form->passwordField($model,'confirmpass',array('class'=>'form-control','placeholder'=>'Confirmpass','autofocus'=>true));
echo '<div class="pd4"></div>';
/*echo $form->textField($model,'class',array('class'=>'form-control'));*/
echo $form->error($model,'class',array('class'=>'form-control'));
echo $form->dropDownlist($model,'cities_id',CHtml::listData(Cities::model()->findAll(),'id','title'),array('class'=>'form-control'));
echo $form->error($model,'cities_id',array('class'=>'span4 pull-left'));
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
 
echo '<div class="pd4"></div>';
echo '<div class="pd4"></div>';
echo CHtml::submitButton('Sign up',array('class'=>'btn btn-warning'));
$this->endWidget();
?>
<div class="spacer40"></div>
