<div class="profile_tab1_left_new">
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'tickets-form','enableAjaxValidation'=>false,)); ?>
<div class="talk_popup_outer">
   	  <div class="div_position"> 
    	<h1><i class="glyphicon glyphicon-transfer"></i> Talk to Counselor</h1>
        <div>
        	<?php echo $form->textField($model,'title',array('placeholder'=>'Please enter title','maxlength'=>'50','style'=>'width:96%;margin-left: 10px;')); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
        <div class="clear"></div>
    	<div class="">
			<?php echo $form->textArea($model,'problem',array('rows'=>3,'placeholder'=>'Type your question here','maxlength'=>'360')); ?>
			<?php echo $form->error($model,'problem'); ?>
		</div>
        <div class="clear"></div>
    	<div class="">
			<?php echo $form->textArea($model,'solution',array('rows'=>3,'placeholder'=>'Type your solution here','maxlength'=>'360')); ?>
			<?php echo $form->error($model,'solution'); ?>
		</div>
        
     </div>
    <div class="div_position"> 
    	<div>
        	Your preferred language?
			<div class="div_position">
				<?php echo CHtml::radioButtonList('Tickets[language]',$model->language,array('Hindi'=>'Hindi','English'=>'English'),array('template'=>"{input} {label}", 'separator'=>' '));?>
            </div>
        </div>
    </div>
    <div class="div_position"> 
         <div class="row">
			<?php echo CHtml::submitButton('Submit',array('class'=>'btn',"style"=>'float:right;margin-right:50px;margin-top:10px;')); ?>
        </div> 
    </div>
   </div>
<?php $this->endWidget(); ?>


</div><!-- form -->