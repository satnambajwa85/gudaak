<?php
//CVarDumper::dump($profile->standard_pitch,10,1);
//die;
?>

<!-- START Template Container -->
<section class="container-fluid">
	<!-- Page header -->
	<div class="page-header page-header-block">
		<div class="page-header-section">
			<h4 class="title semibold">Sample Pitch you want to show to your client</h4>
		</div>
	</div>
	<!--/ Page header -->



	<!-- START row -->
	<div class="row">
		<div class="col-md-12">
			<!-- START panel -->
			
				<!-- panel heading/header -->
				<div class="panel-heading">
					<h3 class="panel-title">Option 3</h3>
				</div>
				<!--/ panel heading/header -->
				<!-- panel body -->
				<div class="panel-body">
					<?php $form=$this->beginWidget('CActiveForm', array('id'=>'sample-pitch-supplier','action'=>Yii::app()->createUrl('/supplier/profile'), 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate'))); ?>
				
					<div class="form-group">
						<label class="col-sm-5 control-label">Please upload the standard pitch deck that you use?
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-4" id="standardPitch">
							<div class="input-group">
								<input type="text" readonly class="form-control" value="<?php echo $profile->standard_pitch; ?>">
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span>Browse
								 <?php echo $form->hiddenField($profile,'standard_pitch',array('placeholder'=>"",'class'=>'form-control')); ?>
									</div>
								</span>
								
							</div>
						</div>
						<span class="input-group-btn">
									
										<?php if(!empty($profile->standard_pitch)){ ?>
							<div class="btn btn-primary btn-file">
										<a href="<?php 
echo $profile->standard_pitch; ?>" target="_blank" style="color:white">View</a>
								</div>
										<?php }?>
										
									</span>
					</div>

					<div class="form-group">
						<label class="col-sm-5 control-label">Currently, how many of your employees are available to work full time on a project i.e. not engaged in other projects?
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-4 pt5">
								<?php echo $form->textField($profile,'total_available_employees',array('placeholder'=>"",'class'=>'form-control','required'=>'required')); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-5 control-label">Can you give us a copy of the standard services agreement that you use with clients? If you have different services contracts for different engagements, choose the one you have used more often.
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-4 mt15 mb15 pt10" id="service_agreement">
							<div class="input-group">
								<input type="text" readonly class="form-control" value="<?php echo  $profile->standard_service_agreement; ?>">
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span>Browse
										 <?php echo $form->hiddenField($profile,'standard_service_agreement',array('placeholder'=>"",'class'=>'form-control')); ?>
									</div>
								</span>
							</div>
								
						</div>
						<span class="input-group-btn">
									
										<?php if(!empty($profile->standard_service_agreement)){ ?>
							<div class="btn btn-primary btn-file">
										<a href="<?php 
echo $profile->standard_service_agreement; ?>" target="_blank" style="color:white">View</a>
								</div>
										<?php }?>
										
						</span>
					</div>




					<div class="form-group">
						<label class="col-sm-5 control-label">If none are available, when is the earliest that you will be able to accept a new project?
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-4 pt10">
								<?php echo $form->textField($profile,'accept_new_project_date',array('placeholder'=>"",'class'=>'form-control','required'=>'required',"data-mask"=>"99/99/9999")); ?>
						</div>
					</div>



					<div class="panel-footer">
						<div class="form-group no-border">
							<label class="col-sm-5 control-label"></label>
							<div class="col-sm-4">
								 <?php echo CHtml::submitButton( 'Save',array('id'=>'signupButSat','class'=>'btn btn-primary')); ?>

							</div>
						</div>
					</div>
				<?php $this->endWidget(); ?>
				</div>

				<!--/ panel body -->
			
			<!-- END panel -->
		</div>
	</div>
	<!--/ END row -->
	
</section>
<!--/ END Template Container -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#standardPitch,#service_agreement').click(function(){
			var el= $(this);
			console.log("clicked");
			filepicker.setKey("<?php echo $this->filpickerKey; ?>");
			filepicker.pick({
    			mimetypes: ['image/*','text/plain','application/pdf']
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
</script>