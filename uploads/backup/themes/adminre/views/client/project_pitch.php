<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/page1.js"></script>
<!-- START Template Main -->
<div>
	<!-- Page Header -->
     <div class="page-header page-header-block pb0 pt0 mb15">
        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
				<li class="text-info">Proposal</li>
                <li class="active">Pitch</li>
            </ol>
        </div>
    </div>
   <!--/ Page Header -->
    <!-- START Template Container -->
    <div class="container-fluid">
    	<div class="page-header page-header-block bgcolor-white">
            <div class="page-header-section pl15">
                <ul class="list-table">
                    <li class="text-left" style="width:90px;">
                        <img width="80px" height="80px" class="img-circle circle_border mt10" src="<?php echo (empty($project->suppliers->logo)?Yii::app()->baseUrl.'/uploads/client/small/avatar.png':$project->suppliers->logo); ?>" alt="<?php echo $project->suppliers->name; ?>">
                    </li>
                    <li class="text-left">
                        <h4 class="semibold ellipsis nm pb5">
                            <?php echo $project->suppliers->name; ?></h4>
                        <p class="ellipsis text-default nm">
                            <i class="ico-users mr5"></i>
                            <?php echo $project->suppliers->number_of_employee; ?> Employees</p>
                        <p class="ellipsis text-default nm">
                            <i class="ico-calendar mr5"></i> Founded in
                            <?php echo date( "Y",strtotime($project->suppliers->add_date)); ?></p>
                        <p class="ellipsis text-default nm">
                            <i class="ico-location mr5"></i> Based in
                            <?php echo $project->suppliers->cities->name; ?></p>
                        <p class="ellipsis text-default nm">
                            <i class="ico-code mr5"></i>
                            <?php $skillset = array();
                            foreach($project->suppliers->suppliersHasSkills as $skill)
                                $skillset[]= $skill->skills->name;
                            echo implode(',',$skillset); ?>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar clearfix">
                    <div class="col-xs-12">
                   		<?php
						if($project->status == 2){?>
						<button style="margin-bottom:5px;" class="btn btn-danger ml10 pull-right" id="basicRejectP" type="button"><i class="ico-user-cancel"></i><span >Archive</span></button>
                        <button style="margin-bottom:5px;" class="btn btn-green ml10 pull-right hide"  id="basicCompleteP"  type="button"><i class="ico-checkmark3"></i> <span>Complete</span></button>
                        <button style="margin-bottom:5px;" class="btn btn-green pull-right hide"  id="basicCompleteD" type="button"><i class="ico-checkmark3"></i> <span>Completed</span></button>
                        <button style="margin-bottom:5px;" class="btn btn-success pull-right hide" id="basicProject1" type="button"><i class="ico-checkmark3"></i> <span>Awarded</span> </button>
						<button style="margin-bottom:5px;" class="btn btn-success pull-right" id="basicProject" type="button"><i class="ico-checkmark3"></i><span >Award Project</span> </button>                        
						<?php }if($project->status ==4){?>
						<button style="margin-bottom:5px;" class="btn btn-green ml10 pull-right"  id="basicCompleteP"  type="button"><i class="ico-checkmark3"></i> <span>Complete</span> </button>
                        <button style="margin-bottom:5px;" class="btn btn-green pull-right hide"  id="basicCompleteD" type="button"><i class="ico-checkmark3"></i> <span>Completed</span></button>
                        <button style="margin-bottom:5px;" class="btn btn-success pull-right" id="basicProject1" type="button"><i class="ico-checkmark3"></i> <span>Awarded</span> </button>
                        
						<?php }
						if($project->status ==5){
							echo '<button style="margin-bottom:5px;" class="btn btn-green pull-right" type="button"><i class="ico-checkmark3"></i> <span>Completed</span></button>';
						}
						if($project->status ==6){
						echo '<button style="margin-bottom:5px;" class="btn btn-danger pull-right" type="button"><i class="ico-user-cancel"></i> <span>Archived</span></button>';	
						}
						?>                         
                    </div>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- START Table Layout -->
        <div class="row mb30">
        	
            <?php if($project->status == 1){?>
            <div class="col-md-8 pull-right">
                <div class="alert alert-danger">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <p><strong> The service provider is seeking clarification before making an offical pitch.</strong> Please chat with the service provider to answer their questions.</p>
                </div>
            </div>
            <?php } ?>
        	<!--   chatting -->
			<div class="col-md-4">
				<!-- Chating panel -->
                
                <audio id="pop">
                    <source src="<?php echo Yii::app()->theme->baseUrl; ?>/files/pop.mp3" type="audio/mpeg">
                    <source src="<?php echo Yii::app()->theme->baseUrl; ?>/files/pop.ogg" type="audio/ogg">
            	</audio>
		    	<div class="col-sm-12 pl0 pr0" >
         <div id="chat-box" class="table-layout" <?php echo (empty($project->chat_room_id)?'style="display:none"':"data-room=$project->chat_room_id"); ?>>
            <div class="col-lg-5 valign-top panel panel-default">
                <!-- panel heading -->
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <i class="ico-circle text-default mr5"></i>
                        <span class="name"><?php echo $project->suppliers->first_name." ".$project->suppliers->last_name; ?></span>
                        <span class="badge pull-right"></span>
                    </h5>
                </div>
                <div class="panel-body np" id="scrollbox7">
                	<div class="loadchat text-center"><!--Loading screen while chat initialises-->
                    	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/greenloader.gif">
                	</div>
                    <!-- message list -->
                    <ul class="media-list media-list-bubble clearfix" id="chattingscroll"></ul>
                    <!--/ message list -->
                    <div class="status text-center text-default">
                        <i><?php  echo $project->suppliers->first_name." ".$project->suppliers->last_name; ?> is offline</i>
                    </div>                    
                </div>

                <div class="panel-footer">
                    <!--write box-->
                    <div class="panel-toolbar-wrapper">
                        <div class="panel-toolbar">
                            <div class="input-group" style="width:100%;">
                                <textarea type="text" class="form-control message" placeholder="Type your message"  style="height:50px; resize:none;"></textarea>
								<span style="vertical-align: top !important;" class="input-group-btn">
									<button type="button" class="btn btn-primary send pt15 pb15">
										<i class="ico-paper-plane"></i>
										<span class="semibold">Send</span>
									</button>
								</span>
                            </div>
                        </div>
                    </div>
                    <hr class="mt10 mb10"><!-- horizontal line -->

                    <div class="panel-toolbar-wrapper">
                        <div class="panel-toolbar">
                            <div class="btn-group">
                                <!--<button type="button" class="btn btn-default"><i class="ico-facetime-video"></i></button>-->
                            </div>
                        </div>

                        <div class="panel-toolbar text-right">
                            <a href="javascript:void(0);" class="btn btn-default" id="attachfileformessage"><i class="ico-attachment"></i> Attach files</a>
                        </div>
                    </div>
                </div>
                <!-- panel footer -->
            </div>
        </div>
    </div>
    			<!--/ Chating panel -->
			</div>
			<!--/ chatting -->
        
        <!-- Starts Price top container  with Question attachment and user team section-->
			<div class="col-md-8">
				<!-- User preference  -->
				<div class="row">

					<div class="col-md-12">
						<div class="table-layout ">
							<div class="panel col-xs-8">
								<div class="panel-body text-center">
									<!-- Price top display 4 section  -->
									<ul class="nav nav-section nav-justified">

										<li>
											<div class="section">
                                            <?php if($project->status == 1){?>
                                            	<h4 class="bold text-primary mt0 mb5" style="font-size:14px;" id="budget">
                                                	- - -   - - -</h4>
												<p class="nm text-muted">
													<span class="semibold" style="font-size:12x;"> Price </span>
												</p>
											<?php }else{?>
												<h4 class="bold text-primary mt0 mb5" style="font-size:14px;" id="budget">
                                                	$ <?php echo $project->min_price; ?> - $<?php echo $project->max_price; ?></h4>
												<p class="nm text-muted <?php echo ($project->status == 1)?'blur_text':'';?>">
													<span id="time_view"> <?php echo $project->time_material; ?></span> | Billing: <span class="semibold" style="font-size:12x;" id="budget_type"><?php echo $project->billing_schedule; ?> </span>
													<i class="ico-info-sign hide" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Enter Text for Budget details" style="cursor:pointer;"></i>
												</p>
                                            <?php }?>
											</div>
										</li>
										<li>
											<div class="section">
												<h4 class="bold text-success mt0 mb5 " style="font-size:14px;" id="sartdateview">
                                                    <?php echo ($project->status == 1)?'- - -':((!empty($project->start_date))?date("d-M-Y",strtotime($project->start_date)):'----'); ?></h4>
												<p class="nm text-muted">
													<span class="semibold">Start Date</span>
												</p>
											</div>
										</li>
                                        <?php if(!empty($project->time_estimation)){?>
										<li>
											<div class="section">
												<h4 class="bold text-warning mt0 mb5" style="font-size:14px;" id="time_estimation"><?php echo ($project->status == 1)?'- - -':((!empty($project->time_estimation))?$project->time_estimation:'-- ').' Days'; ?> </h4>
												<p class="nm text-muted">
													<span class="semibold">Timeline</span>
												</p>
											</div>
										</li>
                                        <?php }
										if(!empty($project->trial_period)){?>
										<li>
											<div class="section">
												<h4 class="bold text-danger mt0 mb5 " style="font-size:14px;" id="trialview">
                                                    <?php echo ($project->status == 1)?'- - -':((!empty($project->trial_period))?$project->trial_period:'-').' Days'; ?></h4>
												<p class="nm text-muted">
													<span class="semibold">Trial</span>
												</p>
											</div>
										</li>
                                        <?php } ?>
									</ul>
									<!--/ Price top display 4 section  -->
								</div>

							</div>
						</div>
					</div>
				</div>
				<!--/  User preference -->
                
				<!-- Starts Questions, User team and attachment section -->
				<div class="row">
					<!-- pitch default question, User Team and attachement Section -->
					<div class="col-lg-6">
						<div class="panel panel-default">
							<!-- Starts panel header -->
							<div class="panel-heading">
								<h3 class="panel-title">Proposal</h3>
								<!-- Check if project is not awarded or in clarification then show edit  -->								
							</div>
							<!--/ Ends panel header -->
							<!-- Starts Questions and Attachement container -->
							<div class="panel-body pl0 pr0 pt0 pb0" style="border:none">
								<!-- Starts Default question container -->
								<div class="col-sm-12 pl0 pr0">
									<!-- Starts Left side of the default  questions -->
									<div class="col-lg-12 pl0 pr0">

										<!-- Questions  list -->
										<div class="panel-group" id="accordion" style="border:none;">
											<!-- Default question 1-->
											<div class="panel panel-default mt0" style="border:none; border-bottom:1px solid #ccc; border-radius: 0px!important;">
												<!-- question -->
												<div class="panel-heading" style="border-radius:0px;">
													<h5 class="panel-title ">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#c1" class="text-primary" style="font-size:12px;">
                                                            <span class="plus mr5 plus_new"></span>About the company
                                                        </a>
                                                    </h5>
												</div>
												<!--/ question -->
												<!-- Answer -->
												<div id="c1" class="panel-collapse collapse in ">
													<div class="panel-body " style="font-size:11px;  ">
														<?php echo ((empty($project->default_q1_ans)?((empty($project->suppliers->about_company))?"Awaiting response":$project->suppliers->about_company):$project->default_q1_ans)); ?>
													</div>
												</div>
												<!-- Answer-->
												<!-- question -->
												<div class="panel-heading" style="border-radius:0px;">
													<h5 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#c2" class="text-primary" style="font-size:12px;">
                                                            <span class="plus mr5 plus_new"></span>Why us?
                                                            <span class="ml15"></span>
                                                        </a>
                                                    </h5>
												</div>
												<!--/ question  -->
												<!-- answer -->
												<div id="c2" class="panel-collapse collapse in">
													<div class="panel-body" style="font-size:11px;">
														<?php echo ((empty($project->default_q2_ans)?"Awaiting response":$project->default_q2_ans)); ?>
													</div>
												</div>
												<!--/ answer -->
											</div>
											<!--/ Default question 1-->
												
										</div>
										<!--/ Questions list -->


									</div>

									<!--/ Ends Left side of the default  questions -->



								</div>
								<!--/ Ends Default question container -->

								<!--attachment sa-->
								<div class="content-attachment pa10">
									<h5 class="semibold mt0 mb15">Attachment's (<?php echo count($project->supplierDocuments);?>)
                                        <span class="text-muted"></span>
                                    </h5>
									<table class="table-striped" id="attachmentView">
										<tr></tr>
										<?php if(!empty($project->supplierDocuments)){ ?>
										<?php foreach($project->supplierDocuments as $doc){ ?>
										<tr class="doc_<?php echo $doc->id ?>">
											<td>
												<span class="label label-success">
                                                        <?php echo $doc->extension; ?></span>
												<?php echo (empty($doc->name)?"No-Name":$doc->name); ?>
											</td>
											<td width="6%">
											<a href="javascript:OpenFile('<?php echo $doc->path; ?>',500,600)" class="btn btn-link " title="Download">View</a>
											</td>
										</tr>
										<?php } ?>
										<tr></tr>

										<?php }else{ ?>

										<div class="col-md-12 pl0">
										</div>
										<?php } ?>

									</table>
								</div>
								<!--attachment sa-->

							</div>
							<!--/ Ends Questions and Attachement container -->
						</div>
                        <!-- User team  -->
						
						<?php 
						if(!empty($project->suppliersProjectTeams) || !empty($project->suppliers->supplierTeams)){ 
						?>
						<div class="panel panel-default">
							<!-- Pitch team -->
							<div class="panel-heading">
								<h3 class="panel-title">The Team</h3>
								<!-- Check if project is awarded or in clarification then show edit  -->
								
							</div>
							<!-- List of project team Member -->
                        	<ul class="media-list" id="teamcontainer">
								<li></li>
                                
                                <?php 
								if(!empty($project->suppliers->supplierTeams)){
								foreach($project->suppliers->supplierTeams as $item){ ?>
								<li class="media border-dotted">
									<a class="pull-left" href="javascript:void(0);">
                                        <img alt="" class="media-object img-circle" src="<?php echo (!empty($item->image))?$item->image.'/convert?w=150&h=150&fit=crop':Yii::app()->baseUrl.'/uploads/client/small/avatar.png'; ?>">
                                    </a>
									<div class="media-body">
										<p class="media-heading">
											<?php echo ($project->status == 1)?'- - -':($item->first_name.' '.$item->last_name); ?></p>
										<p class="media-text">
											<?php echo ($project->status == 1)?'- - -':($item->experiance); ?></p>
									</div>
								</li>
								<?php }}
								if(!empty($project->suppliersProjectTeams)){
								foreach($project->suppliersProjectTeams as $item){ ?>
								<li class="media border-dotted" id="teammember_<?php echo $item->id; ?>">
									<a class="pull-left" href="javascript:void(0);">
                                        <img alt="" class="media-object img-circle" src="<?php echo (!empty($item->image))?$item->image.'/convert?w=150&h=150&fit=crop':Yii::app()->baseUrl.'/uploads/client/small/avatar.png'; ?>">
                                    </a>
									<div class="media-body">
										<p class="media-heading">
											<?php echo ($project->status == 1)?'- - -':($item->name); ?></p>
										<p class="media-text">
											<?php echo ($project->status == 1)?'- - -':($item->description); ?></p>
									</div>
								</li>
								<?php } } ?>
							</ul>
							<!--/ List of project team Member -->
						</div>
                        <!--/ User team  -->
							<?php } ?>
					</div>
					<!--/ pitch default question, User Team and attachement Section -->

					<!-- ratings and custom question -->
					<div class="col-lg-6">
                        <!-- Rating / review -->
						<div class="pannel">
						
						<ul class="nav nav-tabs nav-justified">
							<li class="active">
								<a class="semibold" data-toggle="tab" href="#popular">Ratings</a>
							</li>
							<li class="">
								<a class="semibold" data-toggle="tab" href="#comments">Reviews</a>
							</li>
						</ul>
						<div class="tab-content panel">
							<!-- commulative ratings  -->
							<div id="popular" class="tab-pane active" style="min-height:70px;">
								<?php if(empty($sumref[ "average"])){ ?>
								<div class="col-md-12 pl0 pb10 ml10">
									<div class="alert alert-dismissable alert-danger">
										No Ratings found yet!!
									</div>
								</div>

								<?php }else{ ?>
								<!-- Media list -->
								<div class="media-list">
									<div class="media-body">
										<h1 class="media-heading text-center mb0 rating-text">
											<?php echo $sumref[ "average"]; ?>
                                        </h1>
										<div style="margin: 0px auto; width: 25%;" class="text-center">
											<div class="progress progress-xs nm col-sm-12 pl0 pr0">
												<div class="progress-bar progress-bar-success" style="width: <?php echo (($sumref["average"]*100)/5); ?>%" title="<?php echo (($sumref["average"]*100)/5); ?>">
													<span class="sr-only">
                                                        <?php echo (($sumref[ "average"]*100)/5);?>% Complete</span>
												</div>
											</div>
										</div>
										<div class="text-center" style="margin: 0px auto; width: 100%; display: inline-block;">
											<p class="media-heading f_s12 text-muted pb5 pt5">(<?php echo ($sumref["average"]==0)?0:$sumref["totalratings"]; ?> Ratings)
											</p>
										</div>
									</div>

									<ul class="media-list media-list-new mb5">
										<li class="media border-dotted pl0 pr0">
											<div class="media-object pull-left ml-5" style="height: 40px;">
												<i style="font-size: 18px;" class="ico-comments mt5"></i>
											</div>
											<div class="media-body">
												<h5 class="semibold text-muted mt5">Communication</h5>
												<div class="col-sm-12 pl0 pr0">
													<div class="progress progress-xs nm col-sm-9 pl0 pr0">
														<div class="progress-bar progress-bar-success" style="width: <?php echo (($sumref["q1"]*100)/5); ?>%"></div>
													</div>
													<h5 class="media-heading text-center text-default col-sm-3 mt-5 pl0 pr0 tm5">
														<?php echo ($sumref[ "q1"]);?>
													</h5>
												</div>
											</div>
										</li>

										<li class="media border-dotted pl0 pr0">
											<div class="media-object pull-left ml-5" style="height: 40px;">
												<i style="font-size: 18px;" class="ico-cogs2 mt5"></i>
											</div>
											<div class="media-body">
												<h5 class="semibold text-muted mt5 ">Technical skill</h5>
												<div class="col-sm-12  pl0 pr0">
													<div class="progress progress-xs nm col-sm-9 pl0 pr0">
														<div class="progress-bar progress-bar-success" style="width: <?php echo (($sumref["q2"]*100)/5);?>%"></div>
													</div>
													<h5 class="media-heading text-center text-default col-sm-3 mt-5 pl0 pr0 tm5">
														<?php echo $sumref[ "q2"];?>
													</h5>
												</div>
											</div>

										</li>

										<li class="media border-dotted pl0 pr0">
											<div class="media-object pull-left ml-5" style="height: 40px;">
												<i style="font-size: 18px;" class="ico-time mt5"></i>
											</div>
											<div class="media-body">
												<h5 class="semibold text-muted mt5 ">Adherence to timelines</h5>
												<div class="col-sm-12 pl0 pr0">
													<div class="progress progress-xs nm col-sm-9 pl0 pr0">
														<div class="progress-bar progress-bar-success" style="width: <?php echo (($sumref["q3"]*100)/5);?>%"></div>
													</div>
													<h5 class="media-heading text-center text-default col-sm-3 mt-5 pl0 pr0 tm5">
														<?php echo $sumref[ "q3"];?>
													</h5>
												</div>
											</div>
										</li>

										<li class="media border-dotted pl0 pr0 pb0">
											<div class="media-object pull-left ml-5" style="">
												<i style="font-size: 18px;" class="ico-user mt5"></i>
											</div>
											<div class="media-body">
												<h5 class="semibold text-muted mt5 ">Design thinking</h5>
												<div class="col-sm-12 pl0 pr0">
													<div class="progress progress-xs nm pl0 pr0 col-sm-9">
														<div class="progress-bar progress-bar-success" style="width: <?php echo (($sumref["q4"]*100)/5);?>%"></div>
													</div>
													<h5 class="media-heading text-center text-default col-sm-3 mt-5 pl0 pr0 tm5">
														<?php echo $sumref[ "q4"];?>
													</h5>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<!--/ Message list -->
								<?php } ?>
							</div>
							<!--/ commulative ratings  -->

							<!-- Individual Review and  ratings  -->
							<div id="comments" class="tab-pane" style="padding:0; padding-bottom: 10px; min-height: 360px;">
								<div id="scrollbox8" style="min-height: 360px;">
									<?php if(!empty($allref)){ ?>
									<?php foreach($allref as $ref){?>
									<!-- Starts Review bar -->
									<div class="media-list mt15 mb15 ml15 mr15">
										<div class="media-body">
											<div class="text-center">
												<img width="45px" height="45px" alt="Image" src="<?php echo (empty($ref->client->image)?(Yii::app()->baseUrl."/uploads/client/small/avatar.png"):($ref->client->image)); ?>" class="img-circle">
											</div>
											<div class="text-center">
												<h6 class="semibold nm mt10" style="color:#00B6AD; font-size:13px"> 
													<?php echo $ref->client_first_name.' '.$ref->client_last_name;?>
													<span style="font-weight:normal;" class="text-default f_s11">
														<?php echo $ref->company_name;?>
													</span>
												</h6>
											</div>
											<div class="text-center" style="margin: 0px auto; width: 26%;">
												<div class="progress progress-xs nm col-sm-12 pl0 pr0 mt10">
													<?php $total=( (int)$ref->q1_communication_rating + (int)$ref->q2_skill_rating +(int)$ref->q3_timelines_ratings +(int)$ref->q4_independence_rating ) ; ?>
													<div class="progress-bar progress-bar-success" style="width: <?php echo (($total*100)/(20)); ?>%"></div>
												</div>
											</div>
											<div class="text-center" style="margin: 0px auto; width: 50%;">
												<p class="text-muted nm mt10 pt10" style="font-size: 10px;">
													<?php echo isset($ref->client->add_date)?date( "m/d/Y",strtotime($ref->client->add_date)):''; ?>
												</p>
											</div>
										</div>
									</div>
									<!--/ Starts Review bar -->
									<!-- Start Comments -->
									<div class="media-list ml-15 mr-15">
										<div id="accordion<?php echo $ref->id; ?>" class="panel-group panel-group-compact mb-5">
											<!-- Quesion 1 -->
											<div class="panel panel-white border-none" style="border-top:1px solid #eee;">
												<div class="panel-heading">
													<h5 class="panel-title pl15 pr15">
                                                        <a style="font-size:11px;" class="collapsed" href="#collapseOne1<?php echo $ref->id; ?>" data-parent="#accordion<?php echo $ref->id; ?>" data-toggle="collapse">
                                                            Ques. What did the service provider do well?
                                                        </a>
                                                    </h5>
												</div>
												<div class="panel-collapse collapse in" id="collapseOne1<?php echo $ref->id; ?>">
													<div style="font-size:11px; border-top:1px solid #eee;" class="panel-body ml15 mr15">
														<?php echo empty($ref->provider_do_well) ?"Client didn't answer for this question.":$ref->provider_do_well ; ?>

													</div>
												</div>
											</div>
											<!--/ Quesion 1 -->

											<!-- Quesion 2 -->
											<div class="panel panel-white border-none" style="border-top:1px solid #eee;">
												<div class="panel-heading">
													<h5 class="panel-title pl15 pr15">
                                                        <a style="font-size:11px;" class="collapsed" href="#collapseTwo<?php echo $ref->id; ?>" data-parent="#accordion<?php echo $ref->id; ?>" data-toggle="collapse">
                                                            Ques. Where could the service provider improve?
                                                        </a>
                                                    </h5>
												</div>
												<div class="panel-collapse collapse" id="collapseTwo<?php echo $ref->id; ?>">
													<div style="font-size:11px; border-top:1px solid #eee;" class="panel-body ml15 mr15">
														<?php echo empty($ref->provider_improve) ?"Client didn't answer for this question.":$ref->provider_improve ; ?>

													</div>
												</div>
											</div>
											<!--/ Quesion 2 -->
											<!-- Quesion 3 -->
											<div class="panel panel-white border-none" style="border-top:1px solid #eee;">
												<div class="panel-heading">
													<h5 class="panel-title pl15 pr15">
                                                        <a style="font-size:11px;" class="collapsed" href="#collapseThree<?php echo $ref->id; ?>" data-parent="#accordion<?php echo $ref->id; ?>" data-toggle="collapse">
                                                            Ques. How did they handle problems and issues that came up during development?
                                                        </a>
                                                    </h5>
												</div>
												<div class="panel-collapse collapse" id="collapseThree<?php echo $ref->id; ?>">
													<div style="font-size:11px; border-top:1px solid #eee;" class="panel-body ml15 mr15">
														<?php echo empty($ref->problems_during_development) ?"Client didn't answer for this question.":$ref->problems_during_development ; ?>
													</div>
												</div>
											</div>
											<!--/ Quesion 3 -->
											<!-- Quesion 4 -->
											<div class="panel panel-white border-none" style="border-top:1px solid #eee; border-bottom: 1px solid #eee;">
												<div class="panel-heading">
													<h5 class="panel-title pl15 pr15">
                                                        <a style="font-size:11px;" class="collapsed" href="#collapseFour<?php echo $ref->id; ?>" data-parent="#accordion<?php echo $ref->id; ?>" data-toggle="collapse">
                                                            Ques. What did the service provider build or do for you? What was your project?
                                                        </a>
                                                    </h5>
												</div>
												<div class="panel-collapse collapse" id="collapseFour<?php echo $ref->id; ?>">
													<div style="font-size:11px; border-top:1px solid #eee;" class="panel-body ml15 mr15">
														<?php echo empty($ref->client_project_description) ?"Client didn't answer for this question.":$ref->client_project_description ; ?>
													</div>
												</div>
											</div>
											<!--/ Quesion 4 -->
											<div style="margin: 0px auto; width: 85%;">
												<hr>
											</div>
										</div>

									</div>
									<!--/ Ends Comments -->



									<!-- End of first  -->
									<?php } ?>
									<?php }else{ ?>
									<div class="col-md-12 pa15">

										<div class="alert alert-dismissable alert-danger ml10">
											No References found yet!!
										</div>
									</div>

									<?php } ?>


								</div>
							</div>
							<!--/ Individual Review and  ratings  -->
						</div>
						
					</div>
                        <!--/ Rating / Review -->
                        
									<?php
                                    $customQuestion="" ;
                                    $cqLeft="" ;
                                    $cqRight="";
                                    $cqAll="" ; 
                                    
									if(!empty($project->clientProjects->clientProjectsQuestions)){?>
									<!-- Custome Question Section -->
                        <div class="panel panel-default">
							<!-- Starts panel header -->
							<div class="panel-heading">
								<h3 class="panel-title">Custom Question</h3>
								<!-- Check if project is awarded or in clarification then show edit  -->
								
							</div>
							<!--/ Ends panel header -->
							<div class="panel-body pl0 pr0 pt0 pb0" style="border:none">
								<!-- Starts Default question container -->
								<div class="col-sm-12 pl0 pr0">
									
									<?php 
									$index=0 ;
									$borderCount=0;
                                    foreach($project->clientProjects->clientProjectsQuestions as $question){
									$borderCount++;
                                    $cq='
									<div class="panel panel-default" style="border:none; '.((count($project->clientProjects->clientProjectsQuestions)==$borderCount)?" border-bottom:0px solid #ccc; ":"border-bottom:1px solid #ccc; ").'">
										<!-- question -->
										<div class="panel-heading">
											<h5 class="panel-title ">
                                              <a data-toggle="collapse" data-parent="#accordion4" href="#d'.$question->id.'" class="text-primary" style="font-size:12px;">
                                                <span class="plus mr5 plus_new"></span>'.$question->question.'
                                               </a>
                                            </h5>
										</div>
										<!--/ question -->
										<!-- Answer -->
										<div id="d'.$question->id.'" class="panel-collapse collapse in ">
											<div class="panel-body" style="font-size:11px;  ">'.(($project->status == 1)?'The service provider has a few question before they will make an official pitch.':(isset($ans_list[$question->id])?$ans_list[$question->id]:"Supplier didn't answer this question yet!")).'
											</div>
										</div>
										<!-- Answer-->

									</div>';
								        $cqAll	.= $cq;																				   if($index%2==0 ){
                                                $cqLeft.=$cq;
                                            }else{
                                                $cqRight.=$cq;
                                            }
                                                                                                                                        $index++;
                                                                                                                                        } ?>



									<!-- Starts Left side of the default  questions -->
									<div class="col-lg-12 pl0 pr0 ">

										<div class="panel-group panel-group-compact mb0" id="accordion4" style="border:none;">
											<?php echo $cqAll; ?>
										</div>

									</div>

									<!--/ Ends Left side of the default  questions -->



								</div>

							</div>

						</div>
                        <!--/ Custome Question Section -->									
									
									<?php } ?>


					</div>
                    <!--/ ratings and custom question -->
					

				</div>
				<!--/ Ends Questions, User Team  and attachment section -->
				
                
				
				
			</div>
			<!--/ Price top container  with Question attachment and user team section-->

        </div>
        <!--/ END Table Layout -->
    </div>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
        <i class="ico-angle-up"></i>
    </a>
    <!--/ END To Top Scroller -->
</div>
<!--/ END Template Main -->

<script type="text/javascript">

$("#basicProject").on("click", function (event) {
	 var el= $(this);
	 bootbox.confirm("Are you sure you want to award this project?", function (result) {
		 if(result){
				$.ajax({
					type:'POST',
					url:"<?php echo CController::createUrl("/client/pitchUp",array('id'=>$project->id));?>",
					success:function(data){
						if(data==1){
							$('#basicProject span').html('Awarded');
							$('#basicProject').addClass('pull-right');
							$('#basicRejectP').hide();
							$('#basicProject').hide();
							$('#basicCompleteP').removeClass('hide');
							$('#basicProject1').removeClass('hide');
						}
					}
				}); 
			return true;
		 }
			// callback
	 }).find("div.modal-body").addClass("bgcolor-teal");;
	return false;
	event.preventDefault();
});

$("#basicCompleteP").on("click", function (event) {
	 var el= $(this);
	 bootbox.confirm("Are you sure you want to complete this project?", function (result) {
		 if(result){
				$.ajax({
					type:'POST',
					url:"<?php echo CController::createUrl("/client/pitchUp",array('id'=>$project->id));?>",
					data : 'action=complete',
					success:function(data){
						if(data==1){
							$('#basicProject1').hide();
							$('#basicCompleteP').hide();
							$('#basicCompleteD').removeClass('hide');
							
						}
					}
				}); 
			return true;
		 }
			// callback
	 }).find("div.modal-body").addClass("bgcolor-teal");;
	return false;
	event.preventDefault();
});



$("#basicRejectP").on("click", function (event) {
	 var el= $(this);
	 bootbox.confirm("Are you sure you want to reject this project?", function (result) {
		 if(result){
				$.ajax({
					type:'POST',
					url:"<?php echo CController::createUrl("/client/pitchUp",array('id'=>$project->id));?>",
					data : 'action=reject',
					success:function(data){
						if(data==1){
							$('#basicRejectP span').html('Rejected');
							$('#basicRejectP').addClass('pull-right');
							$('#basicProject').hide();
						}
					}
				}); 
			return true;
		 }
			// callback
	 }).find("div.modal-body").addClass("bgcolor-teal");;
	return false;
	event.preventDefault();
});
var other_image	=	"<?php echo $project->suppliers->logo?>";

</script>
<?php if(!empty($project->chat_room_id)){?>
<script type="text/javascript">
$(document).ready(function(){
	$('#attachfileformessage').on('click',function(){
            console.log("clicked");
    		filepicker.setKey("<?php echo $this->filpickerKey; ?>");
    		filepicker.pick({
    				mimetypes: ['image/*','text/plain','application/pdf']
    				},
    				function(InkBlob){
    					$(".message").val(InkBlob.url);
						$(".send").trigger("click");
    					console.log("fil : " + JSON.stringify(InkBlob));
    				},
    				function(FPError){
    					//alert("Error Uploading Files : " + FPError.toString());
    					console.log(FPError.toString());
    				}
    		);

        });
	});
var other = {
	id: "<?php echo (isset($project->suppliers->users->id))?$project->suppliers->users->id:'0'; ?>",
	name: "<?php echo $project->suppliers->first_name.' '.$project->suppliers->last_name; ?>"
};
var other_notification = {
	id: "<?php echo (isset($project->suppliers->users->id))?$project->suppliers->users->id:'0'; ?>",
	name: "<?php echo $project->suppliers->first_name.' '.$project->suppliers->last_name; ?>"
};
</script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/cchat.js"></script>
<?php } ?>
