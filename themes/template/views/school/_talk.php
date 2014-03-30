<div class="profile_tab1_left_new">
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'tickets-form','enableAjaxValidation'=>false,)); ?>
<div class="talk_popup_outer">
   	  <div class="div_position"> 
    	<h1><i class="glyphicon glyphicon-transfer"></i> Talk to Gudaak</h1>
        <div class="p_div_left">
        	<?php echo $form->textField($model,'title'); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
        <div class="p_div_right">
        	<?php	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
													'model'=>$model, 
                									'attribute'=>'available',
													'options'=>array('dateFormat'=>'yy-mm-dd',
																	'altFormat'=>'yy-mm-dd',
																	'changeMonth'=>'true',
																	'changeYear'=>'true',
																	),
													));?>
        </div>
        <div class="clear"></div>
    	<div class="">
			<?php echo $form->textArea($model,'problem',array('rows'=>3)); ?>
			<?php echo $form->error($model,'problem'); ?>
		</div>
     </div>
    <div class="div_position"> 
    	<div class="p_div_left">Your preferred mode of interaction with Gudaak?
        	<div class="div_position">
            	<?php echo CHtml::radioButtonList('Tickets[mode]','',array('Phone'=>'Phone','Online Chat'=>'Online Chat','Email'=>'Email'),array('template'=>"{input} {label}", 'separator'=>' '));?>
            </div>
        </div>
        <div class="p_mid"></div>
        <div class="p_div_right">
        	Your preferred language?
			<div class="div_position">
				<?php echo CHtml::radioButtonList('Tickets[language]','',array('Hindi'=>'Hindi','English'=>'English'),array('template'=>"{input} {label}", 'separator'=>' '));?>
            </div>
        </div>
    </div>
    <div class="div_position"> 
         <div class="row">
			<?php echo CHtml::submitButton('Save',array('class'=>'btn',"style"=>'float:right;margin-right:50px;margin-top:10px;')); ?>
        </div> 
    </div>
   </div>
<?php $this->endWidget(); ?>


</div><!-- form -->