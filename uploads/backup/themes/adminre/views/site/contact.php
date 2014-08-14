<div class="light-wrapper page-title">
<div class="container inner">
<h1>Get In Touch</h1>
</div>
</div>
<div class="dark-wrapper">
<div class="container inner">
<div class="row">
<div class="col-sm-8">
  <h1 class="post-title">Feel Free to Drop Us a Line</h1>
  <div class="divide20"></div>
  <div class="form-container">
  
<div class="response alert alert-success"> 
<?php if(Yii::app()->user->hasFlash('success')): ?>
	<?php echo Yii::app()->user->getFlash('success'); ?>
<?php endif; ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'contact-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>'forms'),)); ?>
      <fieldset>
        <ol>
          <li class="form-row text-input-row name-field">
            <?php echo $form->textField($model,'name',array('class'=>"text-input defaultText required",'title'=>"Name (Required)")); ?>

          </li>
          <li class="form-row text-input-row email-field">
          <?php echo $form->textField($model,'email',array('class'=>"text-input defaultText required email",'title'=>"Email (Required)")); ?>
          </li>
          <li class="form-row text-input-row subject-field">
          <?php echo $form->textField($model,'subject',array('class'=>"text-input defaultText",'title'=>"Subject")); ?>
          </li>
          <li class="form-row text-area-row">
          	<?php echo $form->textArea($model,'body',array('class'=>"text-area required")); ?>
          </li>
          <li class="button-row">
          	<?php echo CHtml::submitButton('Submit',array('class'=>"btn btn-submit bm0")); ?>
          </li>
        </ol>
      </fieldset>
    <?php $this->endWidget(); ?>
    <!--</form>-->
  </div>
  <!-- /.form-container --> 
</div>
<!-- /.span8 -->
<aside class="col-sm-4 sidebar lp20">
  <div class="sidebox widget">
    <h3>Address</h3>
    <p>We are located in New York and Philadelphia.</p>
    <address>
    <strong>VenturePact, LLC.</strong><br>
    WeWork - Fulton Street,<br>
    222 Broadway,<br>
    New York, NY 10038<br>
    <abbr title="Phone">P:</abbr> 949-791-7659 <br>
    <abbr title="Email">E:</abbr> <a href="mailto:#">Questions@VenturePact.com</a>
    </address>
    <address>
    <strong>VenturePact, LLC.</strong><br>
    The Franklin Building<br>
    834 Chestnut Street,<br>
    Philadelphia, PA 19107<br>
    <abbr title="Phone">P:</abbr> 949-791-7659 <br>
    <abbr title="Email">E:</abbr> <a href="mailto:#">Questions@VenturePact.com</a>
    </address>
  </div>
  <!-- /.widget --> 
</aside>
<!-- /.span4 --> 
</div>
<!-- /.row --> 

</div>
<!-- /.container --> 
</div>