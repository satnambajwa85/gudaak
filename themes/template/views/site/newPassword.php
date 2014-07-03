<?php $this->pageTitle=Yii::app()->name . ' - Login';?>
<div class="clear"></div>
<div class="col-md-6 mt60 mb58 col-md-offset-3 white border-layer mr-top116">
			<?php echo CHtml::link('<div class="site-logo"></div>',array('site/'));?>
			<div class="col-md-12 white  pd13">
            Reset Password
			<div class="hide-overflow"></div>
				<?php if(Yii::app()->user->hasFlash('login')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('login'); ?></strong>
						</div>
							 
					<?php endif; ?>	
				<div  class="col-md-6 col-lg-offset-3 login-box pull-left ">
					<div class="col-sm-12 ">
            <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false,)); ?>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert-box success"><span>success: </span><?php echo Yii::app()->user->getFlash('success'); ?></div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="alert-box error"> <span>error: </span><?php echo Yii::app()->user->getFlash('error'); ?></div>
<?php endif; ?>
                <div class="form-group marginset  mb10">
                    <div class="row">
                        <div class=" mb5">
                          <label class="control-label">New password <span class="text-danger">*</span></label>
                          <div class="has-icon">
                          <?php echo $form->passwordField($model,'new_password',array('placeholder'=>"New Password",  'class'=>"form-control input-white textfield_width ")); ?>
                          <?php echo $form->error($model,'new_password'); ?>
                          <i class="ico-lock4 form-control-icon icon-top"></i>
                          </div>
                        </div>
                        
                        <div class=" mb5">
                            <label class="control-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="has-icon">
                               <?php echo $form->passwordField($model,'confirm_password',array('placeholder'=>"Confirm Password",  'class'=>"form-control input-white textfield_width")); ?>
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
                <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-success save_bt')); ?>
                </div>
               
           <?php $this->endWidget(); ?>
        </div>
				<?php echo CHtml::link('Back to home',array('/site'),array('class'=>'btn btn-info back-bt_cpwd'));?>
				</div>
			 
				
			</div>
	   </div>
	   

