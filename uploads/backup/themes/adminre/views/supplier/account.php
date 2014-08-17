
<section >
	<!-- START Template Container -->
	<section class="container-fluid">
		<!-- Page Header -->
    <div class="page-header page-header-block pb0 pt15">
        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li><?php echo CHtml::link('Dashboard', array('/supplier/profile'));?></li>
				<li class="text-info">My Account</li>
                <li class="active">Basic</li>

            </ol>

        </div>
    </div>


		<!--/ Page header -->
		<!-- START row -->
		<div class="row">
			<div class="col-md-12">


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
                              
                                                                

				<ul class="nav nav-tabs nav-justified ">
					<li class="<?php echo (!$password)?'active':'';?>">
						<a href="#tabone2" data-toggle="tab">Basic Information</a>
					</li>
					<li class="<?php echo ($password)?'active':'';?>">
						<a href="#tabtwo3" data-toggle="tab">Change Password</a>
					</li>

				</ul>


				<div class="tab-content panel">


					<!-- Basic Profile starts -->
					
					<div class="tab-pane <?php echo (!$password)?'active':'';?>" id="tabone2" style="padding: 0;">
						<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>"panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>
						<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-4 control-label">Name of the company
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<?php echo $form->textField($profile,'name',array('placeholder'=>"",'class'=>'form-control','required'=>'required')); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">First Name
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<?php echo $form->textField($profile,'first_name',array('placeholder'=>"First Name",'class'=>'form-control','required'=>'required')); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Last Name
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<?php echo $form->textField($profile,'last_name',array('placeholder'=>"Last Name",'class'=>'form-control','required'=>'required')); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Alternate E-mail
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<?php echo $form->textField($profile,'email',array('placeholder'=>"Email","class"=>"form-control",'required'=>'required')); ?>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Skype ID
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<?php echo $form->textField($profile,'skype_id',array('placeholder'=>"Skype Id","class"=>"form-control",'required'=>'required')); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Phone Number
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<?php echo $form->textField($profile,'phone_number',array('placeholder'=>"#Phone","class"=>"form-control",'required'=>'required')); ?>
							</div>
						</div>

						<div class="form-group" >
							<label class="col-sm-4 control-label">Company website
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<?php echo $form->textField($profile,'website',array('placeholder'=>"Comany Website","class"=>"form-control",'required'=>'required')); ?>
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
					

                                                            
					<!-- Basic Profile Ends -->

					<!-- Forgot password starts  -->
					<div class="tab-pane <?php echo ($password)?'active':'';?>" id="tabtwo3" style="padding: 0;">
                        <?php $form=$this->beginWidget('CActiveForm',array('id'=>'Forgot-Password-form-New','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate'))); ?>

						<div class="panel-body">




							<div class="form-group">
								<label class="col-sm-5 control-label">Enter your current password
									<span class="text-danger">*</span>
								</label>
								<div class="col-sm-4">
									<?php echo $form->passwordField($changePassword,'current_password',array('placeholder'=>"",'class'=>'form-control','required'=>'required',"id"=>"currentPassword")); ?>
									<?php if(Yii::app()->user->hasFlash('error')):?>
									<div class="errorMessage">
										<?php echo Yii::app()->user->getFlash('error'); ?></div>
									<?php endif; ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Enter your new password
									<span class="text-danger">*</span>
								</label>
								<div class="col-sm-4">
									<?php echo $form->passwordField($changePassword,'new_password',array('placeholder'=>"",'class'=>'form-control','required'=>'required','id'=>'newPassword',"data-notEqual"=>"#currentPassword","data-parsley-minlength"=>"6")); ?>
									<?php //echo $form->error($changePassword,'new_password'); ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Enter your confirm password
									<span class="text-danger">*</span>
								</label>
								<div class="col-sm-4" id="pss">
									<?php echo $form->passwordField($changePassword,'confirm_password',array('placeholder'=>"",'class'=>'form-control','required'=>'required','id'=>'confirmPassword',"data-parsley-equalto"=>"#newPassword")); ?>
									<?php //echo $form->error($changePassword,'confirm_password'); ?>
								</div>
							</div>




							<div class="panel-footer">
								<div class="form-group no-border">
									<label class="col-sm-4 control-label"></label>
									<div class="col-sm-8">
										<button type="submit" class="btn btn-teal pull-right">Save Password</button>

									</div>
								</div>
							</div>


						</div>
						<?php $this->endWidget(); ?>

					</div>
					<!-- Forgot password Ends -->


				</div>

			</div>


		</div>

		<!--/ END row -->

	</section>
	<!--/ END Template Container -->

	<!-- START To Top Scroller -->
	<a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
		<i class="ico-angle-up"></i>
	</a>
	<!--/ END To Top Scroller -->
</section>
<script type="text/javascript">

	function validate(){

		if($('#confirmPassword').val() !=$('#newPassword').val()){
			$('#pss ul.parsley-errors-list').css('display','block');
			$('#pss ul.parsley-errors-list').html('');
			$('#pss ul.parsley-errors-list').append('<li>Confirm password must be repeated exactly.</li>');
			return false;
		}
		else
			return true;
		
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
        $("#Forgot-Password-form-New").parsley( {
            validators: {
                notEqual: function ( val, elem ) {
                    return val !== $(elem).val();
                }
            },
            messages: {
                notEqual: "This value should not be the same."
            },

        });
		$('#coverphoto,#logoimage').click(function(){
			var el= $(this);
			console.log("clicked");
			filepicker.setKey("<?php echo $this->filpickerKey; ?>");
			filepicker.pick({
    			mimetypes: ['image/*']
				},
				function(InkBlob){
					el.find(":input[type=text],:input[type=hidden]").val(InkBlob.url);
			  		console.log(InkBlob.url);
				},
				function(FPError){
					alert("Error Uploading Files : " + FPError.toString());
    				console.log(FPError.toString());
  				}
			);
			
		});
	});
    $("#Forgot-Password-form-New").on("submit",function(){
        console.log("submitting form");
        if($("#currentPassword").val() == $("#newPassword").val()){
            var errId= $("#newPassword").data("parsley-id");
            console.log(errId);
            $("#parsley-id-"+errId).html('<li class="parsley-equalto">This value should not be the same as current password.</li>');
            $("#parsley-id-"+errId).addClass("filled");

            return false;
        }else
        {
            var errId= $("#newPassword").data("parsley-id");
            console.log(errId);
            $("#parsley-id-"+errId).html('');
            $("#parsley-id-"+errId).removeClass("filled");
        }

    });
</script>

