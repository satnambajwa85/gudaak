<section role="main">
<section class="col-lg-12 bg-teal">
	<!-- START row -->
	
	<!--/ END row -->
</section>

<section class="col-lg-12">
	<!-- START row -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3 class="title light text-grey5 mtb28">To connect you with the right service providers, we will need some more detail.</h3>
		</div>
	</div>
	<!--/ END row -->
</section>

<section class="col-lg-12">
	<!-- START row -->
	<div class="row">
		<div class="col-lg-4 col-lg-offset-2 text-center">
			<div class="col-sm-12">
				<h4 class="title light text-grey9 text-size16 mb20">If you prefer to write out the requirements, access our self-service platform. It will take 5-10 minutes.</h4>
			</div>

			<!-- Social button -->
			<div class="col-sm-12">
				<button class="btn btn-social btn-block btn-linkedin" type="button">
					<i class="ico-linkedin2 mr15"></i>Sign Up with LinkedIn</button>
			</div>
			<!-- Social button -->

			<div class="col-sm-12">
				<h6 class="title light text-grey9 text-size13 mb20"><?php echo CHtml::link( 'Login Page Here', array( '/site/login'),array( 'class'=>'text-teal-new','id'=>'show'));?></h6>
			</div>

			<!-- Login form -->


		</div>

		<div class="col-lg-1 col-lg-offset-0 text-center border_design">
			<div class="center_border"></div>
			<div class="center_text">Or</div>
			<div class="center_border"></div>
		</div>
		<div class="col-lg-2 col-lg-offset-1 text-center">
			<button class="btn btn-social btn-block btn-call btn-mt80 ml15" type="button">Schedule a call</button>
		</div>
	</div>
	<!--/ END row -->

	<!-- START modal -->
	<div id="bs-modal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<!--<div class=" ico-gun-ban mb15 mt15" style="font-size:36px;"></div>-->
					<h3 class="semibold modal-title text-danger">Sign Up Form</h3>
					<!--<p class="text-muted">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>-->
				</div>
				<div class="modal-body">
					<form class="" action="">
						<div class="form-group mb10">
							<div class="row">
								<div class="col-sm-6 mb5">
									<div class="has-icon pull-right">
										<input type="text" class="form-control input-white" name="fname" placeholder="First Name">
										<!--<i class="ico-user2  form-control-icon icon-top"></i>-->
									</div>
								</div>
								<div class="col-sm-6 mb5">
									<div class="has-icon pull-right">
										<input type="text" class="form-control input-white " name="lname" placeholder="Last Name">
										<!--<i class="ico-lock2 form-control-icon icon-top"></i>-->
									</div>
								</div>
							</div>
						</div>
						<div class="form-group mb10">
							<div class="row">
								<div class="col-sm-6 mb5">
									<div class="has-icon pull-right">
										<input type="text" placeholder="Username / email" name="username" class="form-control input-white">

									</div>
								</div>
								<div class="col-sm-6 mb5">
									<div class="has-icon pull-right">
										<input type="password" placeholder="Password" name="password" class="form-control input-white ">

									</div>
								</div>
							</div>
						</div>

						<div class="form-group mb10">
							<button class="btn btn-block btn-info btn-social btn-signin col-lg-offset-4" type="submit">Sign Up</button>
						</div>
					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<!--<button type="button" class="btn btn-primary">Save changes</button>-->
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!--/ END modal -->
</section>
