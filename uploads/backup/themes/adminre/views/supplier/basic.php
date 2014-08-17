

<!-- START Template Main -->
<section id="main" role="main">
	<!-- START Template Container -->
	<section class="container-fluid">
		<!-- Page header -->
		<div class="page-header page-header-block">
			<div class="page-header-section">
				<h4 class="title semibold">Profile</h4>
			</div>
		</div>
		<!--/ Page header -->

		<!-- START row -->
		<div class="row">
			<div class="col-md-12">
                
                
                 
                
				<!-- START panel -->
				<?php $form=$this->beginWidget('CActiveForm', array('id'=>'profile-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>"panel-default form-horizontal form-bordered"))); ?>

                <!-- Starts Basic Section -->
                
                
				<div id="basic" class="profileSection mb50">
					<!-- panel heading/header -->
					<div class="panel-heading">
						<h3 class="panel-title">Basic Information</h3>
					</div>
					<!--/ panel heading/header -->
					<!-- panel body -->
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
							<label class="col-sm-4 control-label">E-mail
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control " name="required" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Skype ID
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control " name="required" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Phone Number
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control " name="required" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Company website
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control " name="required" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Please upload your company logo
								<span class="text-danger"></span>
							</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" readonly class="form-control">
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
											<span class="icon iconmoon-file-3"></span>Browse
											<input type="file">
										</div>
									</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Please upload your profile cover image
								<span class="text-danger"></span>
							</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" readonly class="form-control">
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
											<span class="icon iconmoon-file-3"></span>Browse
											<input type="file">
										</div>
									</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Year founded
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Date" data-mask="99/99/9999">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Number of employees
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control " name="required" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Q. Who is in the management team? Please provide past work experience and background.
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-4 pb5">
										<input type="text" class="form-control" placeholder="Name" name="c_name" required>
									</div>
									<div class="col-sm-6 pb5">
										<textarea class="form-control" rows="1" placeholder="work experience and background" required></textarea>
									</div>
									<div class="col-sm-2 mt5">
										<button type="submit" class="btn btn-teal">Add +</button>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Q. Who is in the management team? Please provide past work experience and background.
								<span class="text-danger">*</span>
							</label>
							<div class="col-sm-8">
								<textarea class="form-control" rows="3" required></textarea>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-4 control-label">Q. What specific tools, languages, frameworks does your company specialize in? How many resources do you have in each of these?</label>
							<div class="col-sm-8 mt15">
								<select id="selectize-selectmultiple" class="form-control" placeholder="Select state..." multiple>
									<option value="">Select a framework...</option>
									<option value="PH">PHP</option>
									<option value="DO">.NET</option>
									<option value="RU">RUBY</option>
									<option value="JA">JAVASCRIPT</option>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Q. What kind of project will you be open to working on?</label>
							<div class="col-sm-8">
								<div class="row ">
									<div class="col-sm-4">
										<span class="checkbox custom-checkbox ">
											<input type="checkbox" name="customcheckbox1" id="customcheckbox1" />
											<label for="customcheckbox1">&nbsp;&nbsp;Pure frontend.</label>
										</span>
										<span class="checkbox custom-checkbox">
											<input type="checkbox" name="customcheckbox2" id="customcheckbox2" />
											<label for="customcheckbox2">&nbsp;&nbsp;Pure backend.</label>
										</span>
										<span class="checkbox custom-checkbox">
											<input type="checkbox" name="customcheckbox3" id="customcheckbox3" />
											<label for="customcheckbox3">&nbsp;&nbsp;Pure Design.</label>
										</span>
									</div>
									<div class="col-sm-7">
										<span class="checkbox custom-checkbox ">
											<input type="checkbox" name="customcheckbox4" id="customcheckbox4" />
											<label for="customcheckbox4">&nbsp;&nbsp;Frontend and backend.</label>
										</span>
										<span class="checkbox custom-checkbox">
											<input type="checkbox" name="customcheckbox5" id="customcheckbox5" />
											<label for="customcheckbox5">&nbsp;&nbsp;End to End product ( design, frontend and backend )</label>
										</span>
										<span class="checkbox custom-checkbox">
											<input type="checkbox" name="customcheckbox6" id="customcheckbox6" />
											<label for="customcheckbox6">&nbsp;&nbsp;Data Analytics.</label>
										</span>
									</div>


								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="form-group no-border pt0 pb0">
								<label class="col-sm-4 control-label"></label>
								<div class="col-sm-8">
									<button type="submit" class="btn btn-lg btn-teal pull-right f_s13">Save & Next</button>
								</div>
							</div>
						</div>

					</div>

					<!--/ panel body -->
				</div>
				<!-- Ends Baisc Section -->
				<div id="portfolio" class="profileSection">
					<!-- panel heading/header -->
					<div class="panel-heading">
						<h3 class="panel-title">Portfolio</h3>
					</div>
					<!--/ panel heading/header -->
					<!-- panel body -->
					<div class="panel-body">
						<div class="col-md-4 mix filter_creative filter_nature" data-cat="background1.jpg">
							<!-- thumbnail -->
							<div class="thumbnail thumbnail-album ">
								<!-- media -->
								<div class="media ">
									<!-- indicator -->
									<div class="indicator">
										<span class="spinner"></span>
									</div>
									<!--/ indicator -->
									<!-- toolbar overlay -->
									<div class="overlay ">
										<div class="toolbar ">

											<a title="add images" class="btn btn-success" href="#" data-toggle="modal" data-target="#bs-modal">
												<i class="ico-plus"></i>
											</a>
											<!--<a href="#" class="btn btn-default" title="love this picture"><i class="ico-heart6"></i></a>-->
										</div>
									</div>
									<!--/ toolbar overlay -->
									<img width="100%" alt="Cover" data-src="image/background/400x250/placeholder.jpg" data-toggle="unveil" class="unveiled">
								</div>
								<!--/ media -->
								<div class="caption">
									<h5 class="semibold mt0 mb5">Rail station</h5>
									<p class="text-muted mb5 ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
									<p class="tag ellipsis">
										<a href="#">#Railstation</a>&nbsp;
										<a href="#">#Rail</a>&nbsp;
										<a href="#">#Train</a>
									</p>
								</div>
								<hr class="mt5 mb5">
								<ul class="meta">
									<li>
										<div class="img-group img-group-stack">
											<img alt="" class="img-circle" src="image/avatar/avatar7.jpg">
											<img alt="" class="img-circle" src="image/avatar/avatar2.jpg">
											<span class="more img-circle">2+</span>
										</div>
									</li>
									<li>
										<p class="nm">
											<a class="semibold" href="#">4 people</a>love this</p>
									</li>
								</ul>
							</div>
							<!--/ thumbnail -->
						</div>
						
						<div id="bs-modal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <div class=" ico-user-plus2 mb15 mt15" style="font-size:36px;"></div>
                                <h3 class="semibold modal-title text-danger">Add your portfolio</h3>
                            </div>
                            <form class="panel-default form-horizontal" data-parsley-validate="" action="" novalidate>
                                <br/>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label class="col-sm-4 control-label">Upload screenshots: <span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" readonly class="form-control" data-parsley-id="4011"><ul class="parsley-errors-list" id="parsley-id-4011"></ul>
                                            <span class="input-group-btn">
                                            <div class="btn btn-primary btn-file">
                                                <span class="icon iconmoon-file-3"></span> Browse 
                                                <input type="file" data-parsley-id="6400"><ul class="parsley-errors-list" id="parsley-id-6400"></ul>
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                            <label class="col-sm-4 control-label">Name of the project<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required name="required" class="form-control " data-parsley-id="9793"><ul class="parsley-errors-list" id="parsley-id-9793"></ul>
                            </div>
                        </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-4 control-label">Link to the project<span class="text-danger">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" required name="required" class="form-control " data-parsley-id="9793"><ul class="parsley-errors-list" id="parsley-id-9793"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-4 control-label">Description<span class="text-danger">*</span></label>
                                        <div class="col-sm-7">
                                            <textarea required rows="3" class="form-control" data-parsley-id="9568"></textarea>
                                            <ul class="parsley-errors-list" id="parsley-id-9793"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-4 control-label">Industry<span class="text-danger">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" required name="required" class="form-control " data-parsley-id="9793"><ul class="parsley-errors-list" id="parsley-id-9793"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-4 control-label">Client name<span class="text-danger">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" required name="required" class="form-control " data-parsley-id="9793"><ul class="parsley-errors-list" id="parsley-id-9793"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-4 control-label">Year done<span class="text-danger">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" required name="required" class="form-control " data-parsley-id="9793" data-mask="99/99/9999"><ul class="parsley-errors-list" id="parsley-id-9793"></ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-teal">Save changes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

					</div>

					<!--/ panel body -->


				</div>
				
				<?php $this->endWidget(); ?>
				<!-- END panel -->
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

<script type="text/javascript">
$(document).ready(function(){
	$(".profileSection").hide().first().show();
	
	$("#profile-form").on('submit',function(){
		console.log("submitting form");
		$(".profileSection").hide();
		$(this).show();
	})

});
</script>
