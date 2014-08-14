<!-- START Template Main -->
<section id="main" role="main">
	<!-- START Template Container -->
	<section class="container-fluid">
		<!-- Page header -->
		<div class="page-header page-header-block">
			<div class="page-header-section">
				<h4 class="title semibold">Form validation</h4>
			</div>
		</div>
		<!--/ Page header -->

		<!-- START row -->
		<div class="row">
			<div class="col-md-6">
				 <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/profile'),'id'=>'profile-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate')));?>
				<!-- <form class="panel panel-default" action="" data-parsley-validate> -->
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="ico-tshirt mr5"></i>T-shirt order sample</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label">Which one do you want?
										<span class="text-danger">*</span>
									</label>
									<select name="type" class="form-control" required>
										<option value="">Select</option>
										<option value="1">Ninja shirt</option>
										<option value="2">Pirate shirt</option>
										<option value="3">Bobo shirt</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label">Size
										<span class="text-danger">*</span>
									</label>
									<select name="size" class="form-control" required>
										<option value="">Select</option>
										<option value="1">S</option>
										<option value="2">M</option>
										<option value="3">L</option>
										<option value="3">XL</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="control-label">Color
										<span class="text-danger">*</span>
									</label>
									<select name="color" class="form-control" required>
										<option value="">Select</option>
										<option value="1">Red</option>
										<option value="2">Green</option>
										<option value="3">Yellow</option>
										<option value="3">Purple</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label">Name
										<span class="text-danger">*</span>
									</label>
									<?php echo $form->textField($p,'first_name',array('placeholder'=>"",'class'=>'form-control','required'=>'required','data-parsley-type'=>"alphanum")); ?>
									<input name="name" type="text" class="form-control" required data-parsley-type="number">
								</div>
								<div class="col-sm-6">
									<label class="control-label">Email
										<span class="text-danger">*</span>
									</label>
									<input name="email" type="text" class="form-control" data-parsley-trigger="change" data-parsley-type="email" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label class="control-label">Address</label>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 mb10">
									<input name="street" type="text" class="form-control" placeholder="Street Address">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 mb10">
									<input name="addressline" type="text" class="form-control" placeholder="Address Line 2">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 mb10">
									<input name="city" type="text" class="form-control" placeholder="City">
								</div>
								<div class="col-sm-6 mb10">
									<input name="state" type="text" class="form-control" placeholder="State / Province / Region">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox custom-checkbox">
								<input type="checkbox" name="gift" id="giftcheckbox" value="1" data-parsley-mincheck="1" required>
								<label for="giftcheckbox">&nbsp;&nbsp;Send as a gift</label>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button type="submit" class="btn btn-primary">Proceed</button>
						<button type="reset" class="btn btn-inverse">Reset</button>
					</div>
				 <?php $this->endWidget(); ?>
				<!--  </form> -->
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
<!--/ END Template Main -->
