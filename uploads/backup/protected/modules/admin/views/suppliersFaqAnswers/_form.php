<?php
/* @var $this SuppliersFaqAnswersController */
/* @var $model SuppliersFaqAnswers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-faq-answers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_id'); ?>
		<?php 



                $list_data	=    array();
				if($model->isNewRecord)
                {
                    foreach( Suppliers::model()->findAll() as $list)
                    {
                        if(count($list->suppliersFaqAnswers)==0)
                        $list_data[]=$list;

                    }
                     $listData = CHtml::listData($list_data,'id', 'name');
			         echo $form->dropDownList($model,'suppliers_id',$listData,array('empty'=>'Select a User'));
                 }
                 else
                 {
                    $list_data =Suppliers::model()->findAll();
                    $listData = CHtml::listData($list_data,'id', 'name');
                    echo $form->dropDownList($model,'suppliers_id',$listData,array('empty'=>'Select a User','disabled'=>'disabled'));
                 }

		?>
        <?php //echo $form->error($model,'suppliers_id'); ?>
	</div>



    <?php
    if(false)
    {
     ?>
	<div class="row">
		<?php echo $form->labelEx($model,'faq_id'); ?>
			<?php 
                 
                 $list_data	= Faq::model()->findAll();
			     $listData = CHtml::listData($list_data,'id', 'question');
                 
                 if($model->isNewRecord)
                 {
            
                    
    				echo $form->dropDownList($model,'faq_id',$listData,array('empty'=>'Select a Question','style'=>'width:500px;'));
                }else{
                    echo $form->dropDownList($model,'faq_id',$listData,array('empty'=>'Select a Question','style'=>'width:500px;','disabled'=>'disabled'));
                }
                
                ?>

		<?php echo $form->error($model,'faq_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answers'); ?>
		<?php echo $form->textArea($model,'answers',array('rows'=>5,'cols'=>50)); ?>
		<?php echo $form->error($model,'answers'); ?>
	</div>
     <?php
     }
      ?>
  <div class="Row">
        <b>Questions are : </b>
  </div>



  <?php

  $i = 0;
  if($model->isNewRecord)
  {
      foreach($allQuestions as $que)
      {
         ?>

        <div class="row">
            <b><?php echo ($i + 1).") ".$que->question; ?></b>
        </div>

    	<div class="row">
            <?php echo $form->hiddenField($model,'hidden_questions[]',array('value'=>$que->id)); ?>
    		<?php echo $form->labelEx($model,'answers'); ?>
    		<?php echo $form->textArea($model,'answers[]',array('rows'=>5,'cols'=>50)); ?>
    		<?php echo $form->error($model,'answers'); ?>
    	</div>

         <?php
          $i++;
      }
  }else{
        for($i=0;$i<count($allQuestions);$i++)
        {
            ?>
            <div class="row">
                <b><?php echo ($i + 1).") ".Faq::model()->findByPK($allQuestions[$i]['faq_id'])->question; ?></b>
            </div>

        	<div class="row">
                <?php echo $form->hiddenField($model,'hidden_questions[]',array('value'=>$allQuestions[$i]['faq_id'])); ?>
        		<?php echo $form->labelEx($model,'answers'); ?>
        		<?php echo $form->textArea($model,'answers[]',array('rows'=>5,'cols'=>50,"value"=>$allQuestions[$i]['answers'])); ?>
        		<?php echo $form->error($model,'answers'); ?>
        	</div>
            <?php
        }
  }
   ?>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'status'); ?>
		<?php //echo $form->textField($model,'status'); ?>
		<?php //echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'publish'); ?>
		<?php //echo $form->textField($model,'publish'); ?>
		<?php //echo $form->error($model,'publish'); ?>
	</div>
--!>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
