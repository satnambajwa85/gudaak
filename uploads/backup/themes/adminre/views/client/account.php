<section id="main" role="main">
            <!-- START Template Container -->
            <section class="container-fluid">
                <!-- Page header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">My Account</h4>
                    </div>
                </div>
                <!--/ Page header -->
                  <!-- START row -->
				<?php if(Yii::app()->user->hasFlash('success')):?>
                        <div class="alert alert-dismissable alert-success">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(Yii::app()->user->hasFlash('pass_success')):?>
                        <div class="alert alert-dismissable alert-success">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo Yii::app()->user->getFlash('pass_success'); ?>
                        </div>
                        <?php endif; ?>


                <div class="row">
                    <div class="col-md-12">


                        
                        
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="<?php echo (!$password)?'active':'';?>"><a href="#tabone2" data-toggle="tab">Basic Information</a></li>
                            <li class="<?php echo ($password)?'active':'';?>"><a href="#tabtwo2" data-toggle="tab">Change Password</a></li>
                          
                        </ul>
                        
                        <div class="tab-content panel">
                        

<?php 
$imag		=	(Yii::app()->user->role=='client')?$profile->image:((!empty($profile->logo))?$profile->logo:'');
if(isset($imag)){$profilePic	=	Yii::app()->baseUrl.'/uploads/client/small/'.$imag;}
else{$profilePic	=	Yii::app()->baseUrl.'/uploads/client/small/avatar.png';}
if(strlen($imag)>20){$profilePic	=	$imag;}

?>   


                            <div class="tab-pane pa0 <?php echo (!$password)?'active':'';?>" id="tabone2"  style="padding:0;" >
                            <?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>"panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Enter your name <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <div class="row ">
                                    <div class="col-sm-6 ">
                                       <?php echo $form->textField($profile,'first_name',array('placeholder'=>"",'class'=>'form-control','required'=>'required','data-parsley-minlength'=>'2')); ?>
                                    </div>
                                    
                                    <!--<div class="col-sm-6 ">
                                        <?php echo $form->textField($profile,'last_name',array('placeholder'=>"",'class'=>'form-control','required'=>'required','data-parsley-minlength'=>'2')); ?> 
                                        </div>-->
                                   
                                </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Enter your Company name and link <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <div class="row ">
                                    <div class="col-sm-6 ">
                                       <?php echo $form->textField($profile,'company_name',array('placeholder'=>"Company Name",'class'=>'form-control','required'=>'required','data-parsley-minlength'=>'2')); ?>
                                    </div>
                                    
                                    <div class="col-sm-6 ">
                                        <?php echo $form->textField($profile,'company_link',array('placeholder'=>"Company Link",'class'=>'form-control','required'=>'required','data-parsley-minlength'=>'2')); ?> 
                                        </div>
                                   
                                </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Image <span class="text-danger"></span></label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="text" readonly class="form-control">
                                            <span class="input-group-btn">
                                                <div class="btn btn-primary btn-file">
                                                    <span class="icon iconmoon-file-3"></span> <a href="javascript:void();" style="color:#FFF;" id="openBrow">Browse</a>
                                                    <?php echo $form->hiddenField($profile,'image',array('id'=>"profilePicUser")); ?>
                                                </div>
                                            </span>
                                        </div>
                                     
                                    <ul id="ClientProjects_mockup">
                                    <?php 
                                        if(isset($profile->image)){?>
                                                <li><img src="<?php echo $profile->image.'/convert?w=150&h=115&fit=crop';?>" /></li>
                                   <?php }?>
                                    </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">E-mail <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
										<?php echo $form->textField($profile,'email',array('placeholder'=>"",'class'=>'form-control','readonly'=>"readonly",'required'=>'required','data-parsley-type'=>"email"));?>
									</div>
								</div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Phone Number <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <?php echo $form->textField($profile,'phone_number',array('placeholder'=>"",'class'=>'form-control','required'=>'required','data-parsley-type'=>'number')); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Address <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <?php echo $form->textArea($profile,'address1',array('placeholder'=>"",'class'=>'form-control','row'=>'3','required'=>'required'));?>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Location <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                    <div class="row ">
                                    <div class="col-sm-4 ">
                                        <?php echo CHtml::dropDownList('country',$profile->cities->states_id,CHtml::listData(States::model()->findAllByAttributes(array('status'=>1),array('order'=>'name ASC')),'id', 'name'),array('class'=>"form-control",'disabled'=>"disabled",'id'=>"selectize-customselect",'ajax'=>array(
                                'type'=>'POST',
                                'url' => CController::createUrl('/site/dynamicCity'),
                                'data'=> array('country'=>'js:this.value'),
                                'update'=>'#satnam',
                                )
                                ));?>
                                       
                                    </div>
                                    <div class="col-sm-4 ">
                                       <?php echo CHtml::dropDownList('cities_id','',CHtml::listData(Cities::model()->findAllByAttributes(array('id'=>$profile->cities_id)),'id', 'name'),array('class'=>"form-control required",'required'=>'required','id'=>"satnam",'disabled'=>"disabled"));?>
                                    </div>
                                </div>
                                
                                
                                    </div>
                                </div>
                                
                                 
                                <div class="panel-footer">
                                        <div class="form-group no-border">
                                            <label class="col-sm-4 control-label"></label>
                                            <div class="col-sm-8">
                                                <button type="submit" class="btn btn-teal pull-right">Save</button> 
                                                
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    
                                
                            </div>
                            
                            <?php $this->endWidget(); ?>
                            
                            </div>
                            
                            
                             <div class="tab-pane <?php echo ($password)?'active':'';?>" id="tabtwo2" style="padding:0; ">
                             <?php $form=$this->beginWidget('CActiveForm', array('id'=>'change-form', 'enableClientValidation'=>false,'clientOptions'=>array('validateOnSubmit'=>false,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>"panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
                             	<div class="panel-body">


                                
                                
                                  <div class="form-group">
                                        <label class="col-sm-5 control-label">Enter your current password <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                           <?php echo $form->passwordField($changePassword,'current_password',array('placeholder'=>"",'class'=>'form-control','required'=>'required')); ?>
                                          <?php if(Yii::app()->user->hasFlash('error')):?><div class="errorMessage"><?php echo Yii::app()->user->getFlash('error'); ?></div><?php endif; ?>
                                           </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Enter your new password <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                        <?php echo $form->passwordField($changePassword,'new_password',array('placeholder'=>"",'class'=>'form-control','required'=>'required','id'=>'newPassword','data-parsley-minlength'=>"6")); ?>
                                        <?php echo $form->error($changePassword,'new_password'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Enter your confirm password<span class="text-danger">*</span></label>
                                        <div class="col-sm-4" id="pss">
                                            <?php echo $form->passwordField($changePassword,'confirm_password',array('placeholder'=>"",'class'=>'form-control','required'=>'required','id'=>'confirmPassword','data-parsley-minlength'=>"6")); ?>
                                            <?php echo $form->error($changePassword,'confirm_password'); ?>
                                        </div>
                                    </div>
                                    
                                  
                                    
                                 
                                <div class="panel-footer">
                                        <div class="form-group no-border">
                                            <label class="col-sm-4 control-label"></label>
                                            <div class="col-sm-8">
                                                <button type="submit" class="btn btn-teal pull-right" >Save Password</button>
                                                
                                            </div>
                                        </div> 
                                    </div>
                                    
                                   
                            </div>
                            <?php $this->endWidget(); ?>
                            
                        </div>
                        
                        
                        
                        </div>
                        
                      </div>
                      
                      
                      </div>  
                       
                <!--/ END row -->
                
            </section>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/page1.js"></script>
<script type="text/javascript"> 
(function(){
	$("#satnam").selectize();
	$("#sandeep").selectize();
})();
</script>

<script type="text/javascript">
$('#confirmPassword').on('focusout',function(){
	validate();
});
$('#openBrow').click(function(){
	filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
	filepicker.pickMultiple({mimetypes: ['image/*', 'text/plain', 'application/pdf'],container: 'window'},
		function(InkBlob){
			for(i in InkBlob){
				$('#profilePicUser').val(InkBlob[i].url);
				$('#ClientProjects_mockup').html('<li><img src="'+InkBlob[i].url+'/convert?w=150&h=115&fit=crop" /></li>');
			}
		},
		function(FPError){
			console.log(FPError.toString());
		}
	);});

function validate(){
	if($('#confirmPassword').val() !=$('#newPassword').val()){
		$('#pss ul.parsley-errors-list').css('display','block');
		$('#pss ul.parsley-errors-list').html('');
		$('#pss ul.parsley-errors-list').append('<li id="satPas">Confirm password must be repeated exactly.</li>');
		return false;
	}
	else{
		$('#satPas').html('');
		return true;
	}
	
}
</script>
