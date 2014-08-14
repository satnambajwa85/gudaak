<!-- START Template Container -->
<section class="container-fluid">

	  <!-- Page header -->
		<div class="page-header page-header-block pb0 pt15">
			<div class="page-header-section pt5 ">
				<ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
					<li><?php echo CHtml::link('Dashboard', array('/supplier/index'));?></li>
					<li class="text-info">Profile</li>
					<li class="active">Past Clients</li>
				</ol>
			</div>
		</div>
	<!--/ Page header -->


	<!-- START row -->
	<div class="row">
		<!-- error and success display -->
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger signup_error_container">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
				<div id="signup_errors"></div>
			</div>
		</div>
		<!-- Starts Form to add new references  -->
		<div class="col-md-12">
        <div class="alert alert-dismissable alert-info">
                    <strong>How will client information be used?</strong>
                    <br>It will purely be used by us to collect reviews from your past clients. We do this so that new clients don't have to reach out to your past clients each time. Contact information provided here will NOT be shared publicly on your profile.</div></div>

        
        <div class="col-lg-6">
			<!-- START panel -->

			<?php $form=$this->beginWidget('CActiveForm', array('id'=>'past-client-supplier', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>

                    
			<!-- panel heading/header -->
			<div class="panel-heading">
				<h3 class="panel-title">Request Client Reviews</h3>
			</div>
			<!--/ panel heading/header -->
			<!-- panel body -->
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-4 control-label">Client Name
						<span class="text-danger">*</span>
					</label>
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-6">
								<input type="hidden" name="SuppliersHasReferences[action]" value="add"  />
								<?php echo $form->textField($SupplierReferences,'client_first_name',array('placeholder'=>"First Name",'class'=>'form-control','required'=>'required','data-parsley-minlength'=>'2')); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $form->textField($SupplierReferences,'client_last_name',array('placeholder'=>"Last Name",'class'=>'form-control','required'=>'required')); ?>

							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Client company
						<span class="text-danger">*</span>
					</label>
					<div class="col-sm-8">
						<?php echo $form->textField($SupplierReferences,'company_name',array('placeholder'=>"Company Name",'class'=>'form-control','required'=>'required')); ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Year of Engagement
						<span class="text-danger">*</span>
					</label>
					<div class="col-sm-8">
						<?php echo $form->textField($SupplierReferences,'year_engagement',array('placeholder'=>"xxxx",'class'=>'form-control','required'=>'required',"data-mask"=>"9999")); ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Client E-mail
						<span class="text-danger">*</span>
					</label>
					<div class="col-sm-8">
						<?php echo $form->emailField($SupplierReferences,'client_email',array('placeholder'=>"jon@xyz.com",'class'=>'form-control','required'=>'required')); ?>
<!--
					<small class="help-block">Note:<ul>
                        <li class="bullets">Contact information provided here will not shared publicly on your profile.</li>
                        <li class="bullets">It will purely be used by us to collect reviews from your past clients.</li></ul>
                        We do this so that new clients DONT have to reach out to your past clients each time.</li>
                        </small>
-->
                    </div>
				</div>
				<div class="panel-footer">
					<div class="form-group no-border pt0 pb0">

						<div class="col-sm-12  ">
							<button type="submit" class="btn btn-lg btn-default pull-right f_s13" id="btnAddReference">Add +</button>

						</div>

					</div>
				</div>

			</div>

			<!--/ panel body -->
			<?php $this->endWidget(); ?>
			<!-- END panel -->
		</div>
		<!-- Ends Form to add new references  -->


		<!-- Starts Grid to show all references -->
		<div class="col-lg-6">
			<!-- START panel -->
			<div class="panel panel-default mb50">
				<!-- panel heading/header -->
				<div class="panel-heading">
					<h3 class="panel-title">Track Reviews</h3>

				</div>
				<!--/ panel heading/header -->


				<!-- panel body with collapse capabale -->
				<div class="table-responsive panel-collapse pull out" id="pastscroll">
					<table class="table table-bordered table-hover" id="dynamictr">
						<thead>
							<tr>
								<th width="14%">Name</th>
								<th width="24%">Company</th>
								<th width="14%">Email</th>
								<th>Status</th>
								<th width="26%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($allReferences)){ ?>

							<?php foreach($allReferences as $reference){ ?>

							<tr class="<?php echo $reference->status==0 ? '' :  'active'; ?> border_bottom" id="ref_<?php echo $reference->id; ?>">

								<td width="14%">
									<?php echo $reference->client_first_name." ".$reference->client_last_name; ?></td>
								<td width="24%" >
									<?php echo $reference->company_name; ?></td>
								<td width="" class="email_width">
									<?php echo $reference->client_email; ?></td>

								<td width="22%">
									<?php echo $reference->status==0 ? 'Awaiting Review' : 'Review Received'; ?></td>

								<td class="text-center" width="26%">
									<!-- button toolbar -->
									<div class="toolbar">
										<div class="btn-group">
											<?php if($reference->status == 0 ) { ?>
											<a href="javascript:void(0);" class="btn btn-link " title="Send a Follow up" onclick="sendFollowup('<?php echo $reference->id ?>')">
												<i class="ico-mail"></i>
											</a>
											<?php }else{ ?>
											<?php $img= (isset($reference->client->image)?$reference->client->image:'');
													if(empty($img)){$img=Yii::app()->baseUrl.'/uploads/client/small/avatar.png';} ?>
											<a title="View Recommendation" class="btn btn-link text-success" href="#" data-toggle="modal" id="editportfolio"><i class="ico-search" onclick='viewRecomendation(<?php echo htmlspecialchars(json_encode($reference->attributes),ENT_QUOTES); ?>,<?php echo json_encode($img); ?>)'></i></a>
											
											<?php } ?>
											<a href="javascript:void(0)" class="btn btn-link text-default" title="Delete" onclick="removeReference('<?php echo $reference->id ?>')">
												<i class="ico-remove5"></i>
											</a>

										</div>
									</div>
									<!--/ button toolbar -->
								</td>
							</tr>

							<?php } }else{ ?>
							<div id="">
								No data found!!
							</div>
							<?php } ?>

						</tbody>
					</table>
				</div>
                <div class="panel-footer">
					<div class="form-group no-border">

						<div class="col-sm-12  pr0">
							<button type="submit" class="btn btn-lg btn-teal pull-right f_s13" id="btnPastNext">Next</button>

						</div>

					</div>
				</div>
				<!--/ panel body with collapse capabale -->
			</div>
            
		</div>
		<!-- Ends Grid to show all references -->
                
	</div>
	<!--/ END row -->
		
    


<!-- START modal  Viewing Recommendation-->
	<div id="bs-modal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="col-lg-12">
					<div class="pannel">
						<!-- tab content -->
						<div class="tab-content panel">
							<div id="popular" class="tab-pane active">
								<!-- Media list -->
								<div class="media-list">
									<div class="media-body">
										<button class="close" data-dismiss="modal" type="button">×</button>

										<div class="col-lg-12 pl0 mt10 ml10 ">
											<ul class="list-table">
												<li style="width:50px;">
													<img width="35px" height="35px" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle img-bordered-primary" id="riewers_image">
												</li>
												<li class="text-left">
													<h5 class="semibold ellipsis nm" id="reviewr_name">Riewers Name</h5>
													<p class="text-muted nm" id="reviewr_company"> Facebook</p>
												</li>
											</ul>
											<br/>

										</div>
									</div>
									<table class="table">
										<thead></thead>
										<tbody>
											<tr>
												<td>
													<p class="media-text">Communication</p>
													<div class="progress progress-xs nm">
														<div class="progress-bar progress-bar-warning" style="width: 60%" id="q1"></div>
													</div>
												</td>
												<td>
													<p class="media-text">Skills</p>
													<div class="progress progress-xs nm">
														<div class="progress-bar progress-bar-warning" style="width: 90%" id="q2"></div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<p class="media-text">Timelines</p>
													<div class="progress progress-xs nm">
														<div class="progress-bar progress-bar-warning" style="width: 40%" id="q3"></div>
													</div>
												</td>
												<td>
													<p class="media-text">Independent</p>
													<div class="progress progress-xs nm">
														<div class="progress-bar progress-bar-warning" style="width: 90%" id="q4"></div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>

									<div id="comments" class="tab-pane">
										
											<!-- Message list -->
											<div class="media-list mt10 ml5">

												<hr class="mt0">
												<div id="accordion2" class="panel-group panel-group-compact">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h5 class="panel-title">
																<a style="font-size:10px;" class="collapsed" href="#collapseOne1" data-parent="#accordion2" data-toggle="collapse">
																	Ques. What did the service provider do well? 
																</a>
															</h5>
														</div>
														<div class="panel-collapse collapse in" id="collapseOne1">
															<div style="font-size:10px;" class="panel-body" id="ans1">
																Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h5 class="panel-title">


																<a style="font-size:10px;" class="collapsed" href="#collapseTwo2" data-parent="#accordion2" data-toggle="collapse">
																	Ques. Where could the service provider improve?
																</a>
															</h5>
														</div>
														<div class="panel-collapse collapse" id="collapseTwo2">
															<div style="font-size:10px;" class="panel-body" id="ans2">
																Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h5 class="panel-title">
																<a style="font-size:10px;" class="collapsed" href="#collapseThree3" data-parent="#accordion2" data-toggle="collapse">
																	Ques. How did they handle problems and issues that came up during development?
																</a>
															</h5>
														</div>
														<div class="panel-collapse collapse" id="collapseThree3">
															<div style="font-size:10px;" class="panel-body" id="ans3">
																Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h5 class="panel-title">
																<a style="font-size:10px;" class="collapsed" href="#collapseThree4" data-parent="#accordion2" data-toggle="collapse">
																	Ques. What did the service provider build or do for you? What was your project?
																</a>
															</h5>
														</div>
														<div class="panel-collapse collapse" id="collapseThree4">
															<div style="font-size:10px;" class="panel-body" id="ans4">
																Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
															</div>
														</div>
													</div>
												</div>



											</div>

											<!--/ Message list -->
										
									</div>
								</div>
								<!--/ Message list -->
							</div>

						</div>
						<!--/ tab content -->
					</div>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!--/ END modal -->

</section>
<!--/ END Template Container -->


<script type="text/javascript">
	$(document).ready(function(ev){
		//ev.stopPropagation();
		var fobj=$('#past-client-supplier').parsley();
		$('.signup_error_container').hide();
        //Next functionality
        $("#btnPastNext").on("click",function(){
            var id = $("#components li:last a").attr("id");
			console.log("finsishes all tasks" +id);
			$("#"+id).trigger("click");

        });
		$("#past-client-supplier").on("submit",function(e){
			console.log("submitting");
			return false;
		});
		$("#btnAddReference").on("click",function(e){
			if(fobj.isValid()){
				console.log("valid");

			var thisform= $("#past-client-supplier");
			if(fobj.isValid()== false){
				console.log("form invalid");
				return false;
			}
			thisform.find(":submit").attr("disabled","disabled").val("Please Wait .. ").text("Please Wait .. ");
			console.log("submitting form " + thisform.serialize());
            //$("#past-client-supplier").unbind("submit");
			var xhr = $.ajax({
				type:'POST',
				url:"<?php echo CController::createUrl('/supplier/ajaxSaveReferences'); ?>",
				data: thisform.serialize(),
				success: function(data){
						var data= JSON.parse(data);
						console.log(JSON.stringify(data));
						data = data.res;
						$('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
						var messageData = data.Success ;
						var htm="";
						if(data.iserror){
							//rendering error
							console.log("error found ");
								messageData = data.errors[0].msg;
								$('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
						}
						else
						{
							messageData = data.success[0].msg;
							var pastcount = parseInt($(".pastclientcount").text());
                            pastcount++;
                            $(".pastclientcount").html(pastcount);
                           $(".pastclientcount").data("original-title",(pastcount)+" Past Clients Added");
                            if(pastcount == 1)
                            {
                                $(".pastclientcount").closest("li").addClass("active");
                            }
                            else if( pastcount == 0)
                            {
                                $(".pastclientcount").closest("li").removeClass("active");
                            }
	
							// setting up dynamic tr
							var newtr= "<tr id='ref_"+data.success[0].lastInsertedId+"'>";
							newtr+="<td>"+$("#SuppliersHasReferences_client_first_name").val()+ " "+$("#SuppliersHasReferences_client_last_name").val() +"</td>";
							newtr+="<td>"+$("#SuppliersHasReferences_company_name").val()+"</td>";
							newtr+="<td>"+$("#SuppliersHasReferences_client_email").val()+"</td>";
							newtr+="<td>Reference Awaited</td>";
							newtr+= "<td class='text-center'><div class='toolbar'><div class='btn-group'>";
							
							newtr+="<a href='javascript:void(0)' onclick='sendFollowup("+data.success[0].lastInsertedId+")' class='btn btn-link ' title='Send a Follow up'><i class='ico-mail'></i></a>";
						
							newtr+= '<a href="javascript:void(0)" onclick="removeReference('+data.success[0].lastInsertedId +')" class="btn btn-link text-default" title="Delete"><i class="ico-remove5 removeref"></i></a>';
							newtr+='</div></div></td>';
							newtr+="</tr>"
							$("#dynamictr tr:first").after(newtr).hide().show('blind', {}, 500);
	
	
						}
	
						//Genrating message 
						console.log("message data : " + JSON.stringify(messageData) );
						/*for(var i = 0 ; i<messageData.length ; i++ )
						{*/
						console.log(typeof messageData);
						
						htm+=messageData.toString() + "<br />";
						//}
						$("#signup_errors").html(htm);	
						$('.signup_error_container').show('blind', {}, 500)
						thisform.find(":submit").removeAttr("disabled").val("Add +").text("Add +");
                        thisform.find("input[type=text],input[type=email], textarea").val("");; 
						console.log("finsishes all tasks");
                    hideNotification();
				},
				error : function(a,b,c){
					
				}
			});
			hideNotification();
            e.stopPropagation();
            //$("#past-client-supplier").unbind("submit");
			//xhr.abort()
			return false;
			
			}else
			{
				console.log("Invalid");
			}
			console.log("click");
			hideNotification();
		});
	
	});
		function hideNotification()
		{
			//Hide the notification div after 2 second 
			
			setTimeout(function() {
				$(".signup_error_container ").hide('blind', {}, 500); }, 5000);
		}
		
		//Remove the reference and hide the content on the go ..
		function removeReference(referenceId){
			console.log("remove id " +  referenceId);
			$.ajax({
				type:'POST',
				url:"<?php echo CController::createUrl('/supplier/ajaxSaveReferences'); ?>",
				data: "referenceId="+referenceId+"&action=remove",
				success: function(data){
						var data= JSON.parse(data);
						console.log(JSON.stringify(data));
						data = data.res;
						$('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
						var messageData = data.Success ;
						var htm="";
						if(data.iserror){
							//rendering error
							console.log("error found ");
								messageData = data.errors[0].msg;
								$('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
						}
						else
						{
							messageData = data.success[0].msg;
							$("#ref_"+referenceId).hide('blind', {}, 500);
                            var pastcount = parseInt($(".pastclientcount").text());
                            pastcount--;
                            $(".pastclientcount").html(pastcount);
                            $(".pastclientcount").data("original-title",(pastcount)+" Past Clients Added");
                            if( pastcount == 0)
                            {
                                $(".pastclientcount").closest("li").removeClass("active");
                            }
						}
	
						//Genrating message 
						console.log("message data : " + JSON.stringify(messageData) );
						htm+=messageData.toString() + "<br />";
						$("#signup_errors").html(htm);	
						$('.signup_error_container').show('blind', {}, 500)
						console.log("finsishes all tasks");
				},
				error : function(a,b,c){
					
				}
			});
			hideNotification();
			return false;
			
		}
		
		function sendFollowup(referenceId){
			console.log("send foolow up" +referenceId);
			$.ajax({
				type:'POST',
				url:"<?php echo CController::createUrl('/supplier/ajaxSaveReferences'); ?>",
				data: "referenceId="+referenceId+"&action=follow",
				success: function(data){
						console.log(JSON.stringify(data));
						var data= JSON.parse(data);
						
						data = data.res;
						$('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
						var messageData = data.Success ;
						var htm="";
						if(data.iserror){
							//rendering error
							console.log("error found ");
								messageData = data.errors[0].msg;
								$('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
						}
						else
						{
							messageData = data.success[0].msg;
						}
	
						//Genrating message 
						console.log("message data : " + JSON.stringify(messageData) );
						htm+=messageData.toString() + "<br />";
						$("#signup_errors").html(htm);	
						$('.signup_error_container').show('blind', {}, 500)
						console.log("finsishes all tasks");
						
				},
				error : function(a,b,c){
					
				}
			});
			hideNotification();
			return false;
		}
	
	
	    function viewRecomendation(data,img){
		
		console.log("data recieved" + JSON.stringify(data));
		if(img !== null)
			$("#riewers_image").attr("src",img);
            $("#reviewr_name").html(data.client_first_name + " " + data.client_last_name  );
            $("#reviewr_company").html("" +(data.company_name  == null?"Not Mentioned":data.company_name ) );
            $("#q1").css("width",((data.q1_communication_rating*100)/5)+"%");
            $("#q2").css("width",((data.q2_skill_rating *100)/5)+"%");
            $("#q3").css("width",((data.q3_timelines_ratings *100)/5)+"%");
            $("#q4").css("width",((data.q4_independence_rating *100)/5)+"%");
            $("#ans1").html(data.provider_do_well );
            $("#ans2").html(data.provider_improve  );
            $("#ans3").html(data.problems_during_development);
            $("#ans4").html(data.client_project_description  );
		var options = {
				"backdrop" : "static"
			}
			$("#bs-modal").modal(options);
	}
</script>

<script type="text/javascript"> 
 		  (function($){ 
 		                    
 				$('#pastscroll').enscroll({ 
 						showOnHover: true, 
 						verticalTrackClass: 'track3', 
 					verticalHandleClass: 'handle3' 
 				}); 
 				 
		})(jQuery);
    </script>
<style>
.border_bottom{border-bottom:1px solid #CFD9DB;}
.help-block .bullets {list-style: disc outside none !important;}
.email_width{ border: medium none!important;min-height: 57px; display: block;width: 150px !important;word-wrap: break-word;}
</style>
