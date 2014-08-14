<section class="col-lg-12">
<!-- START row -->
<div class="row">
<div class="col-lg-12 text-center mt15 pt15">
    <h3 class="title light text-grey5 mtb22">Reset Password</h3>
</div>
</div>
<!--/ END row -->
</section>

<section class="col-lg-12">
<!-- START row -->
<div class="row">
<div class="col-md-4 col-lg-offset-4">
    <div class="col-sm-12">
        <div class="col-sm-12 text-center">
           
        </div>
                                                    
       
        
        <!-- Login form -->
        <div class="col-sm-12 ">
            <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false,)); ?>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert-box success"><span>success: </span><?php echo Yii::app()->user->getFlash('success'); ?></div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="alert-box error"> <span>error: </span><?php echo Yii::app()->user->getFlash('error'); ?></div>
<?php endif; ?>
                <div class="form-group mb10">
                    <div class="row">
                        <div class="col-sm-6 mb5">
                            <label class="control-label">New password <span class="text-danger">*</span></label>
                            <div class="has-icon pull-right">
                                <?php echo $form->passwordField($model,'new_password',array('placeholder'=>"New Password",  'class'=>"form-control input-white")); ?>
<?php echo $form->error($model,'new_password'); ?>
                                <i class="ico-lock4 form-control-icon icon-top"></i>
                            </div>
                         </div>
                        <div class="col-sm-6 mb5">
                            <label class="control-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="has-icon pull-right">
                               <?php echo $form->passwordField($model,'confirm_password',array('placeholder'=>"Confirm Password",  'class'=>"form-control input-white")); ?>
<?php echo $form->error($model,'confirm_password'); ?>
                                <i class="ico-lock4 form-control-icon icon-top"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb10">
                    <div class="row">
                        <div class="col-xs-6 text-left">
                           
                        </div>
                      
                    </div>
                </div>
                <div class="form-group mb10">
                <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-block btn-success btn-social btn-signin col-lg-offset-4 w30')); ?>
                </div>
               
           <?php $this->endWidget(); ?>
        </div>
        <!--/ Login form -->
    </div>
</div>



</div>
<!--/ END row -->

</section>

