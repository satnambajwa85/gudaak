<?php //CVarDumper::dump($project->suppliers->suppliersHasSkills,10,1);die; ?>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>

<!-- START Template Main -->
<section>
    <div class="page-header page-header-block pb0 pt0">
        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li>
                    <?php echo CHtml::link( 'Dashboard', array( '/supplier/index'));?>
                </li>
                <li class="text-info">Leads</li>
                <li class="text-info">Pitch</li>
                <li class="active">
                    <?php echo $project->clientProjects->name; ?></li>
            </ol>
        </div>
    </div>

    <input type="hidden" name="page" value="pitch" id="hiddenpage" />

    <?php if(Yii::app()->user->hasFlash('errors')):?>;

        <script type="text/javascript">
            $(document).ready(function(){
                var projectid="<?php echo $project->id; ?>";
                $("#p_"+projectid +" li:first").removeClass("active2");
                $("#p_"+projectid +" li:last").addClass("active2");
                var boottext = "<?php echo Yii::app()->user->getFlash('errors'); ?>";
                if(boottext=="")
                    boottext="Something went wrong!";
                callerrorbox(boottext)
            });
        </script>

        <?php endif; ?>
    <!-- START Template Container -->
    <section class="container-fluid">
        <!-- START Table Layout -->
        <div class="row">
            <!-- START Upper header -->
             <?php if(Yii::app()->user->hasFlash('errors')):?>
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<?php echo Yii::app()->user->getFlash('errors'); ?>
			</div>
		</div>
        <?php endif; ?>
            <div class="jumbotron jumbotron120 mb0 mt5" style="border-bottom:1px solid #DAE2E4">
                <!-- info -->
                <div class="indicator hide">
                    <span class="spinner"></span>
                </div>
                <div class="info bottom">
                    <!-- Supplier Detials -->
                    <div class="col-md-6">
                        <ul class="list-table">
                            <li class="text-left" style="width:90px;">
                                <img width="80px" height="80px" class="img-circle circle_border mt10" src="<?php echo (empty($project->suppliers->logo)?Yii::app()->baseUrl.'/uploads/client/small/avatar.png':$project->suppliers->logo); ?>" alt="<?php echo $project->suppliers->name; ?>">
                            </li>
                            <li class="text-left">
                                <h4 class="semibold  nm pb5">
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
                                    <?php $skillset=array(); foreach($project->suppliers->suppliersHasSkills as $skill) $skillset[]= $skill->skills->name; ?>
                                    <?php echo implode( ',',$skillset); ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!--/ Supplier Detials -->

                    <!-- Submit project buttons -->

                    <div class="col-md-2 pull-right">
                        <br />
                        <!-- Check if project is awarded or in clarification then show edit  -->
                        <?php if($project->status == 0 || $project->status==1){ ?>
                        <div class="col-md-12 mt10 pull-right pr0">
                            <a class="btn btn-success pull-right" data-status="1" id="btnsubmitproject" href="<?php echo CController::createUrl('/supplier/projectStatusHandler&stat=2&projectid='.$project->id); ?>" onclick="return false;">
                                <i class="ico-checkmark3 mr5"></i> Submit Pitch</a>
                            <input type="hidden" id="profileStatus" value="<?php echo $project->suppliers->is_application_submit; ?>" />
                        </div>

                        <?php }else{ ?>
                        <div class="col-md-12 mt10 pull-right pr0">
                            <button class="btn btn-success pull-right" type="button">
                                <i class="ico-checkmark3"></i>
                                <?php echo $this->projectStatus[$project->status]["supplier"]; ?>
                            </button>

                        </div>
                        <?php } ?>

                    </div>
                    <!--/ Submit project buttons -->
                </div>
                <!--/ info -->
                <!--<div class="media">
                    <img class="unveiled" data-toggle="unveil" src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/background/background18.jpg" data-src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/background/background18.jpg" alt="Cover photo">
                </div>-->
                <!--<div class="media">
                    <div class="unveiled bg-img"></div>-->
            </div>
        </div>
        <!--/ END Upper header -->
        <!--   chatting -->
        <div class="col-md-4">
            <audio id="pop">
                <source src="<?php echo Yii::app()->theme->baseUrl; ?>/files/pop.mp3" type="audio/mpeg">
                    <source src="<?php echo Yii::app()->theme->baseUrl; ?>/files/pop.ogg" type="audio/ogg">
            </audio>
            <div class="col-md-12 pl0 pr0">
                <?php echo $this->renderPartial("_chat_partial",array('project'=>$project)); ?>
            </div>
            
         <div class="col-md-12 mt10 pl0  pr0">
         	     <!-- User team  -->
                    <div class="panel panel-default">
                        <!-- Pitch team -->
                        <div class="panel-heading">
                            <h3 class="panel-title">The Team</h3>
                            <!-- Check if project is awarded or in clarification then show edit  -->
                            <?php if($project->status == 0 || $project->status==1){ ?>

                            <a style="margin-top: -28px;" class="pull-right text-primary" href="" data-target="#edit_team" data-toggle="modal" title="Edit" data-backdrop="static">
                                <i class="ico-edit" style="font-size:16px;  "></i>
                            </a>
                            <?php } ?>
                        </div>
                        <!--LIst of Management team  -->
                        <ul class="media-list mb0" id="mgmtTeamcontainer">
                            <?php foreach($profile->supplierTeams as $item){ ?>
                            <li class="media border-dotted" style="border-bottom: 1px dotted #DDE4E6;" id="mgmtTeammember_<?php echo $item->id; ?>">
                                <a class="pull-left" href="javascript:void(0);">
									<img alt="" class="media-object img-circle" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png">
								</a>
                                <div class="media-body">
                                    <p class="media-heading">
                                        <?php echo $item->first_name." ".$item->last_name; ?></p>
                                    <p class="media-text">
                                        <?php echo $item->experiance; ?></p>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <!--/ LIst of Management team  -->


                        <!-- List of project team Member -->
                        <?php if(empty($project->suppliersProjectTeams)){ ?>
                        <?php if($project->status == 0 || $project->status==1){ ?>
                        <ul class="media-list mb0" id="teamcontainer">
                            <li class="media border-dotted">
                                <div class="col-md-12 pl0 pr0 pt5" id="teamstatus">
                                    <div class="alert alert-dismissable alert-danger mb5">
                                        Add Team members who will be deputed for the project.
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php } ?>

                        <?php }else{ ?>
                        <ul class="media-list" id="teamcontainer">
                            <li></li>
                            <?php foreach($project->suppliersProjectTeams as $item){ ?>
                            <li class="media border-dotted mt0" id="teammember_<?php echo $item->id; ?>">
                                <a class="pull-left" href="javascript:void(0);">
                                        <img alt="" class="media-object img-circle" src="<?php echo $item->image; ?>/convert?w=150&h=150&fit=crop">
                                    </a>
                                <div class="media-body">
                                    <p class="media-heading">
                                        <?php echo $item->name ?></p>
                                    <p class="media-text">
                                        <?php echo $item->description; ?></p>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                        <!--/ List of project team Member -->
                    </div> 
                    <!--/ User team  -->
        
         </div>
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
                                <!-- Check if project is awarded or in clarification then show edit  -->
                                <?php if($project->status == 0 || $project->status==1){ ?>
                                <a data-target="#pricetop" data-toggle="modal" class="pull-right text-primary pr10 pt5" href="" title="Edit" data-backdrop="static">
                                    <i class="ico-edit" style="font-size:16px;  "></i>
                                </a>
                                <?php } ?>
                                <!-- Price top display 4 section  -->
                                <ul class="nav nav-section nav-justified">

                                    <li>
                                        <div class="section">
                                            <h4 class="bold text-primary mt0 mb5" style="font-size:14px;" id="budget"> $<?php echo $project->min_price; ?> -  $<?php echo $project->max_price; ?></h4>
                                            <?php if(empty($project->time_material)){ ?>
                                            <p class="nm text-muted semibold">
                                                <span id="time_view">Price </span> | Billing:
                                                <span class="semibold" style="font-size:12x;" id="budget_type"></span>
                                            </p>
                                            <?php }else{ ?>
                                            <p class="nm text-muted">
                                                <span id="time_view"> <?php echo $project->time_material; ?></span> | Billing: <span class="semibold" style="font-size:12x;" id="budget_type"><?php echo $project->billing_schedule; ?> </span>
                                                <i class="ico-info-sign hide" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Enter Text for Budget details" style="cursor:pointer;"></i>
                                            </p>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section">
                                            <h4 class="bold text-success mt0 mb5" style="font-size:14px;" id="sartdateview">
                                                    <?php echo (empty($project->start_date)?"-":date( "d-M-Y",strtotime($project->start_date))); ?></h4>
                                            <p class="nm text-muted">
                                                <span class="semibold">Start Date</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section">
                                            <h4 class="bold text-warning mt0 mb5" style="font-size:14px;" id="time_estimation"><?php echo (empty($project->time_estimation)?"-":$project->time_estimation." Days"); ?> </h4>
                                            <p class="nm text-muted">
                                                <span class="semibold">Timeline</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section">
                                            <h4 class="bold text-danger mt0 mb5" style="font-size:14px;" id="trialview">
                                                    <?php echo (empty($project->trial_period)?"-":$project->trial_period." Days"); ?> </h4>
                                            <p class="nm text-muted">
                                                <span class="semibold">Trial</span>
                                            </p>
                                        </div>
                                    </li>
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
                            <?php if($project->status == 0 || $project->status==1){ ?>
                            <a title="Edit" href="" class="pull-right text-primary" style="margin-top: -28px;" data-toggle="modal" data-target="#edit_box1" data-backdrop="static">
                                <i class="ico-edit" style="font-size:16px;"></i>
                            </a>
                            <?php } ?>
                        </div>
                        <!--/ Ends panel header -->
                        <!-- Starts Questions and Attachement container -->
                        <div class="panel-body pl0 pr0 pt0 pb0 " style="border:none">
                            <!-- Starts Default question container -->
                            <div class="col-sm-12 pl0 pr0">

                                <div class="col-lg-12 pl0 pr0 ">
                                    <!-- Questions  list -->
                                    <div class="panel-group" id="accordion" style="border:none; ">
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
                                                <div class="panel-body" style="font-size:11px;  "><?php echo (empty($project->default_q1_ans)?$project->suppliers->about_company:$project->default_q1_ans ); ?>
                                                </div>
                                            </div>
                                            <!-- Answer-->
                                            <!-- question -->
                                            <div class="panel-heading" style="border-radius:0px;">
											<h5 class="panel-title ">
													<a data-toggle="collapse" data-parent="#accordion1" href="#c2" class="text-primary" style="font-size:12px;">
														<span class="plus mr5 plus_new"></span>Why us?
													</a>
												</h5>
                                            </div>
                                            <!--/ question -->
                                            <!-- Answer -->
                                            <div id="c2" class="panel-collapse collapse in ">
                                                <div class="panel-body" style="font-size:11px;  ">
                                                    <?php echo (empty($project->default_q2_ans)?"Service Provider hasn't answered this question yet.":$project->default_q2_ans ); ?>
                                                </div>
                                            </div>
                                            <!-- Answer-->


                                        </div>
                                        <!--/ Default question 1-->

                                    </div>
                                    <!--/ Questions list -->


                                </div>





                            </div>
                            <!--/ Ends Default question container -->

                            <!--attachment sa-->
                            <div class="content-attachment pa10">
                                <h5 class="semibold mt0 mb15">Attachment
                                        <span class="text-muted"></span>
                                    </h5>
                                <table class="table-striped" id="attachmentView">
                                    <tr></tr>
                                    <?php if(!empty($project->supplierDocuments)){ ?>
                                    <?php foreach($project->supplierDocuments as $doc){ ?>
                                    <tr class="doc_<?php echo $doc->id ?>">
                                        <td class="attach_width">
                                            <span class="label label-success">
                                                        <?php echo $doc->extension; ?></span>
                                            <?php echo (empty($doc->name)?"No-Name":$doc->name); ?>
                                        </td>
                                        <td width="6%">
                                            <a href="<?php echo $doc->path; ?>" class="btn btn-link <?php echo ($doc->extension=='image/jpeg'?'magnific':'');?>" title="View" target="_blank">View</a>

                                        </td>
                                        <?php if($project->status != 2 ){ ?>
                                        <td>
                                            <?php //echo $project->status; ?>
                                            <a href="javascript:void(0)" onclick="removedoc(<?php echo $doc->id; ?>)" class="btn btn-link " title="Remove">
                                                <i class="ico-remove5 removeref"></i>
                                            </a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                                    <tr></tr>

                                    <?php }else{ ?>

                                    <div class="col-md-12 pl5 pr5">
                                        <div class="alert alert-dismissable alert-danger mb15">
                                            No files attached.
                                        </div>
                                    </div>
                                    <?php } ?>

                                </table>
                            </div>
                            <!--attachment sa-->

                        </div>
                        <!--/ Ends Questions and Attachement container -->
                    </div>
                    
                </div>
                <!--/ pitch default question, User Team and attachement Section -->

                <!-- ratings and custom question -->
                <div class="col-lg-6">
                    <!-- Rating / review -->
                    <div class="pannel mb50">

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
                                <div class="col-md-12 pl0 pr0 pb10">
                                    <div class="alert alert-dismissable alert-danger">
                                        No ratings given yet.
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
                                            <p class="media-heading f_s12 text-muted pb5 pt5">(
                                                <?php echo $sumref[ "totalratings"]; ?>Ratings)
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
                                                <h5 class="semibold text-muted mt5 ">Product thinking</h5>
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
                            <div id="comments" class="tab-pane" style="padding:0; padding-bottom: 10px; <?php echo (empty($allref)?'min-height: 70px;':'min-height: 360px;'); ?>">

                                <?php if(!empty($allref)){ ?>
                                <div id="scrollbox4" style="min-height: 360px;">
                                    <?php foreach($allref as $ref){ ?>
                                    <!-- Starts Review bar -->
                                    <div class="media-list mt15 mb15 ml15 mr15">
                                        <div class="media-body">
                                            <div class="text-center">
												<?php $client_img = ClientProfiles::model()->findByPk($ref->client_id); ?>
                                                <img width="45px" height="45px" alt="" src="<?php echo (empty($client_img->image)?(Yii::app()->theme->baseUrl."/image/avatar/avatar.png "):($client_img->image)); ?>" class="img-circle">
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
                                                    <?php echo (isset($ref->client->add_date) ? date( "m/d/Y",strtotime($ref->client->add_date)):''); ?>
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
                                                        <?php echo empty($ref->provider_do_well) ?"Client hasn't answered this question.":$ref->provider_do_well ; ?>

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
                                                        <?php echo empty($ref->provider_improve) ?"Client hasn't answered this question.":$ref->provider_improve ; ?>

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
                                                        <?php echo empty($ref->problems_during_development) ?"Client hasn't answered this question.":$ref->problems_during_development ; ?>
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
                                                        <?php echo empty($ref->client_project_description) ?"Client hasn't answered this question.":$ref->client_project_description ; ?>
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
                                </div>
                                <?php }else{ ?>
                                <div class="col-md-12 pa15 pb0">

                                    <div class="alert alert-dismissable alert-danger mb0">
                                        No reviews given yet.
                                    </div>
                                </div>

                                <?php } ?>



                            </div>
                            <!--/ Individual Review and  ratings  -->
                        </div>

                    </div>
                    <!--/ Rating / Review -->
                    <!-- Custome Question Section -->


                    <?php if(empty($project->clientProjects->clientProjectsQuestions)){ ?>

                    <div class="col-md-12 mt15 mb15 hide">
                        <div class="alert alert-dismissable alert-danger mb0">
                            Client has not asked any custom questions.
                        </div>
                    </div>

                    <?php }else{ ?>

                    <div class="panel panel-default hide">
                        <!-- Starts panel header -->
                        <div class="panel-heading" style="">
                            <h3 class="panel-title">Custom Question</h3>
                            <!-- Check if project is awarded or in clarification then show edit  -->
                            <?php if($project->status == 0 || $project->status==1){ ?>
                            <a title="Edit" href="" class="pull-right text-primary" style="margin-top: -28px;" data-toggle="modal" data-target="#edit_box1" data-backdrop="static">
                                <i class="ico-edit" style="font-size:16px;  "></i>
                            </a>
                            <?php } ?>
                        </div>
                        <!--/ Ends panel header -->
                        <div class="panel-body pl0 pr0 pt0 pb0" style="border:none">
                            <!-- Starts Default question container -->
                            <div class="col-sm-12 pl0 pr0">
                                <?php $customQuestion="" ; $cqLeft="" ; $cqRight="" ; $cqAll="" ; //CVarDumper::dump($project->clientProjects->clientProjectsQuestions,10,1); ?>

                                <?php $index=0 ;$borderCount=0; foreach($project->clientProjects->clientProjectsQuestions as $question){ $borderCount++; $cq='
                                <div class="panel panel-default" style="border:none; '.((count($project->clientProjects->clientProjectsQuestions)==$borderCount)?" border-bottom:0px solid #ccc; ":"border-bottom:1px solid #ccc; ").'">
                                    <!-- question -->
                                    <div class="panel-heading">
                                        <h5 class="panel-title ">
                                              <a data-toggle="collapse" data-parent="#accordion4" href="#d'.$question->id.'" class="text-primary" style="font-size:12px;"> <span class="plus mr5 plus_new"></span>'.$question->question.'
                                               </a>
                                            </h5>
                                    </div>
                                    <!--/ question -->
                                    <!-- Answer -->
                                    <div id="d'.$question->id.'" class="panel-collapse collapse in ">
                                        <div class="panel-body" style="font-size:11px;  ">'.(isset($ans_list[$question->id])?$ans_list[$question->id]:"Supplier didn't answer this question yet!").'
                                        </div>
                                    </div>
                                    <!-- Answer-->

                                </div>'; $cqAll.= $cq; if($index%2==0 ){ $cqLeft.=$cq; }else{ $cqRight.=$cq; } $index++; } ?>
                                <!-- Starts Left side of the default  questions -->
                                <div class="col-lg-12 pl0 pr0 ">

                                    <div class="panel-group panel-group-compact mb0" id="accordion5" style="border:none;">
                                        <?php echo $cqAll; ?>
                                    </div>

                                </div>

                                <!--/ Ends Left side of the default  questions -->
                            </div>

                        </div>

                    </div>

                    <?php } ?>







                    <!--/ Custome Question Section -->
                </div>
                <!--/ ratings and custom question -->


            </div>
            <!--/ Ends Questions, User Team  and attachment section -->




        </div>
        <!--/ Price top container  with Question attachment and user team section-->


        <!--/ END Table Layout -->

    </section>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
        <i class="ico-angle-up"></i>
    </a>
    <!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->

<!-- Model popup  -->
<!-- User team -->
<div id="edit_team" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bgcolor-teal border-radius">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="pull-left ico-edit mr15 mt5" style="font-size:16px;"></div>
                <h4 class="semibold modal-title">Edit Team</h4>
            </div>
            <div class="col-md-12 mt15">
                <div class="alert alert-dismissable alert-danger signup_error_container">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                    <div class="signup_errors"></div>
                </div>
            </div>
            <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/pitch'),'id'=>'pitch-team-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate'))); ?>

            <div class="form-group work_experince">
                <br />
                <div class="col-sm-12 ml15" id="dynamicTeam">

                    <!-- Starts Displaying all Team member -->
                    <?php if(count($project->suppliersProjectTeams) > 0){ ?>
                    <?php foreach($project->suppliersProjectTeams as $item){ ?>
                    <?php //CVarDumper::dump($item->attributes["id"] ,10,1); ?>

                    <div class="row mb15" id="member_<?php echo $item->attributes['id']; ?>">
                        <div class="col-sm-3 pt5 pb5">

                            <?php echo $form->textField($item,'name',array('placeholder'=>"Name","class"=>"form-control")); ?>

                        </div>
                        <div class="col-sm-4 ">
                            <?php echo $form->textArea($item,'description',array('placeholder'=>"Work Experince and background","class"=>"form-control")); ?>

                        </div>
                        <div class="col-sm-3 mt5 inkfile">

                            <div class="input-group">
                                <input type="text" readonly class="form-control" value="<?php echo  $item->image; ?>">
                                <span class="input-group-btn">
                                    <div class="btn btn-primary btn-file">
                                        <span class="icon iconmoon-file-3"></span>Browse
                                <?php echo $form->hiddenField($item,'image',array('placeholder'=>"",'class'=>'form-control')); ?>
                            </div>

                            </span>
                        </div>
                        <div class="col-sm-12 mt5 pl0 pr0">
                            <small class="help-block">Upload a thumbnail</small>
                        </div>
                    </div>

                    <div class="col-sm-2 mt5 pt5">
                        <button type="button" class="bg-border-none" onclick="removeTeamMember('member_<?php echo $item->attributes['id']; ?>')"><i class="ico-minus2 text-default"></i>
                        </button>
                    </div>
                    <!--<div class="col-sm-1 mt5 pt5 pl0"><a href="javascript::void();" onclick="$(this).parent().parent().hide();"><i class="ico-minus2 text-default"></i></a></div>-->
                </div>
                <?php }// End For loop ?>
                <!-- Adding a blank column Starts -->
                <div class="row" id="member_0">
                    <div class="col-sm-3 pt5 pb5">


                        <?php echo $form->textField($supplierTeam,'name',array('placeholder'=>"Name","class"=>"form-control")); ?>

                    </div>
                    <div class="col-sm-4 ">
                        <?php echo $form->textArea($supplierTeam,'description',array('placeholder'=>"Work Experience and background","class"=>"form-control")); ?>

                    </div>
                    <div class="col-sm-3 mt5 inkfile">

                        <div class="input-group">
                            <input type="text" readonly class="form-control" value="<?php echo  $supplierTeam->image; ?>">
                            <span class="input-group-btn">
                                    <div class="btn btn-primary btn-file">
                                        <span class="icon iconmoon-file-3"></span>Browse
                            <?php echo $form->hiddenField($supplierTeam,'image',array('placeholder'=>"",'class'=>'form-control')); ?>
                        </div>
                        </span>
                    </div>
                    <div class="col-sm-12 mt5 pl0 pr0">
                        <small class="help-block">Upload a thumbnail image</small>
                    </div>



                </div>
                <div class="col-sm-2 mt5 ">

                    <button type="button" class="btn btn-teal" onclick="addNewMember('member_0')">Add +</button>
                </div>
            </div>
            <!-- Adding a blank column Ends -->

            <?php }else{ ?>
            <!-- If there is no data in suppliers table  -->
            <div class="row" id="member_0">
                <div class="col-sm-3 pt5 pb5">


                    <?php echo $form->textField($supplierTeam,'name',array('placeholder'=>"Name","class"=>"form-control")); ?>

                </div>
                <div class="col-sm-4 ">
                    <?php echo $form->textArea($supplierTeam,'description',array('placeholder'=>"Work Experience and background","class"=>"form-control")); ?>

                </div>
                <div class="col-sm-3 mt5 inkfile">

                    <div class="input-group">
                        <input type="text" readonly class="form-control" value="<?php echo  $supplierTeam->image; ?>">
                        <span class="input-group-btn">
                                    <div class="btn btn-primary btn-file">
                                        <span class="icon iconmoon-file-3"></span>Browse
                        <?php echo $form->hiddenField($supplierTeam,'image',array('placeholder'=>"",'class'=>'form-control')); ?>
                    </div>
                    </span>
                </div>
                <div class="col-sm-12 mt5 pl0 pr0">
                    <small class="help-block">Upload a thumbnail image</small>
                </div>



            </div>
            <div class="col-sm-2 mt5 ">

                <button type="button" class="btn btn-teal" onclick="addNewMember('member_0')">Add +</button>
            </div>
        </div>
        <?php } // End If Else ?>
        <!-- Ends Displaying all Team member -->
    </div>
</div>

<div class="panel-footer">
    <!--<button type="submit" class="btn btn-teal pull-right ml10">Done</button>-->
    <button type="button" class="btn btn-teal pull-right" data-dismiss="modal">Done</button>
</div>

<?php $this->endWidget(); ?>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--/ User team -->

<!-- Cusomt Questions  -->
<div id="edit_box1" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header bgcolor-teal border-radius">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="pull-left ico-edit mr15 mt5" style="font-size:16px;"></div>
                <h4 class="semibold modal-title">Edit Pitch</h4>
            </div>
            <!-- error and success display -->
            <div class="col-md-12">
                <div class="alert alert-dismissable alert-danger signup_error_container">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                    <div class="signup_errors"></div>
                </div>
            </div>
            <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/pitch'),'id'=>'pitch-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate'))); ?>

            <?php echo $form->hiddenField($project,'id',array('placeholder'=>"",'class'=>'form-control')); ?>
            <br/>
            <!-- Default questions container -->
            <div class="form-group">
                <!-- Question row 1 -->
                <div class="col-sm-12">
                    <div class="col-sm-12 mb15">
                        <label class="col-sm-4 control-label">About the company
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <textarea name="SuppliersProjectsProposals[default_q1_ans]" id="SuppliersProjectsProposals_default_q1_ans" value="<?php echo (empty($project->default_q1_ans)?$project->suppliers->about_company:$project->default_q1_ans) ?>" row="3" class="required form-control"><?php echo (empty($project->default_q1_ans)?$project->suppliers->about_company:$project->default_q1_ans) ?></textarea>

                            <?php //echo $form->textArea($project,'default_q1_ans',array('placeholder'=>"",'class'=>'form-control','required'=>'required','row'=>"3")); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Why Us?
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">

                            <?php echo $form->textArea($project,'default_q2_ans',array('placeholder'=>"",'class'=>'form-control','required'=>'required','row'=>"3")); ?>
                        </div>
                    </div>
                </div>


            </div>

            <!-- File uploads  -->
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Attach Files
                            <span class="text-danger"></span>
                        </label>
                        <div class="col-sm-8">
                            <div class="input-group" id="pitchAttachement">
                                <input type="text" readonly class="form-control" data-parsley-id="4011">
                                <ul class="parsley-errors-list" id="parsley-id-4011"></ul>
                                <span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span>Browse
                                <ul class="parsley-errors-list" id="parsley-id-6400"></ul>
                            </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="form-group">
        	<div class="col-sm-12">
            	<div class="col-sm-12">
                	<label class="col-sm-4 control-label"></label>
                    <div class="col-sm-8 pt15">
                        <table class="table table-striped" id="uploadedfiles">
                            <tr></tr>
        
                            <?php if(empty($project->supplierDocuments)){ ?>
                            <!--
                            <div class="col-md-12 pl0">
                                <div class="alert alert-dismissable alert-danger">
        
                                    <strong>Oh snap!</strong>No files attached.
                                </div>
                            </div>
        -->
                            <tbody>
                                <?php }else{ ?>
                                <?php foreach($project->supplierDocuments as $doc){ ?>
                                <tr class="doc_<?php echo $doc->id; ?>">
                                    <td class="attach_width_inner">
                                        <span class="label label-success">
                                                <?php echo $doc->extension; ?></span>
                                        <?php echo $doc->name; ?>
                                    </td>
                                    <td width="6%">
                                     <a href="<?php echo $doc->path; ?>" class="btn btn-link <?php echo ($doc->extension=='image/jpeg'?'magnific':'');?>" title="View" target="_blank">View</a>
                                        </td>
                                    <td >
                                        <a href="javascript:void(0)" onclick="removedoc(<?php echo $doc->id; ?>)" class="btn btn-link " title="Remove">
                                            <i class="ico-remove5 removeref"></i>
                                        </a>
        
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr></tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ File uploads  -->

        <!-- Custom question -->
        <div class="form-group hide">
            <div class="col-md-12 pl20">
                <div class="panel panel-default border-none">
                    <div class="panel-heading" style="border-radius:0px; margin:0;">
                        <h4 class="panel-title">Custom Questions</h4>
                    </div>
                </div>
            </div>
            <?php if(empty($project->clientProjects->clientProjectsQuestions)){ ?>
            <div class="col-md-12 pl20">
                <div class="alert alert-dismissable alert-danger ml15 mr15">Client has not asked any custom questions.
                </div>
            </div>
            <?php }else{ ?>
            <?php foreach($project->clientProjects->clientProjectsQuestions as $question){ ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 mb10">
                    <label class="col-sm-4 control-label">Ques.
                        <?php echo $question->question ; ?><span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-8">

                <textarea name="answer[<?php echo $question->id; ?>]" row="3" class="form-control required" id="cq_<?php echo $question->id;?>" ><?php echo (isset($ans_list[$question->id])?$ans_list[$question->id]:'');?></textarea>
                    </div>
                </div>

            </div>
            <?php } ?>
            <?php } ?>
        </div>





        <div class="panel-footer">
            <button type="submit" class="btn btn-teal pull-right ml10">Save Changes</button>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
        </div>
        <!--/ Custom question -->

        <?php $this->endWidget(); ?>


    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--/ Cusomt Questions  -->

<!-- Price and prefrence  -->
<div id="pricetop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bgcolor-teal border-radius">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="pull-left ico-edit mr15 mt5" style="font-size:16px;"></div>
                <h4 class="semibold modal-title">Edit Pricing and Timeline Estimates </h4>
            </div>
            <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/pitch'),'id'=>'price-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate')));?>
            <?php echo $form->hiddenField($project,'id',array('placeholder'=>"Write custom billing schedule",'class'=>'form-control')); ?>
            <br/>

            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-sm-4 control-label">Pricing Method
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-8">
                        <span class="radio-inline custom-radio custom-radio-primary">
                            <input type="radio" name="SuppliersProjectsProposals[time_material]" id="customradio1" value="Time & Material" required <?php echo ($project->time_material=="Time & Material"?"checked" : ""); ?>  >
                            <label for="customradio1">&nbsp;&nbsp;Time &amp; Material</label>
                        </span>
                        <span class="radio-inline custom-radio custom-radio-primary">

                            <input type="radio" name="SuppliersProjectsProposals[time_material]" id="customradio3" value="Fixed Price" <?php echo ($project->time_material=="Fixed Price"?"checked" : ""); ?> <?php echo (empty($project->time_material)?"checked" : ""); ?> >
                            <label for="customradio3">&nbsp;&nbsp;Fixed Price</label>
                        </span>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-sm-4 control-label">Billing Schedule
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-8">
                        <?php $billing_schedule = ["Monthly","Weekly","Biweekly"]; ?>
                        <span class="radio-inline custom-radio custom-radio-primary price_input">

                            <input type="radio" name="SuppliersProjectsProposals[billing_schedule]" id="SuppliersProjectsProposals_billing_schedule_01" value="<?php echo $billing_schedule[0]; ?>" <?php echo ($project->billing_schedule==$billing_schedule[0]?"checked" : ""); ?> required>

                            <label for="SuppliersProjectsProposals_billing_schedule_01">&nbsp;&nbsp;Monthly</label>
                        </span>
                        <span class="radio-inline custom-radio custom-radio-primary price_input">
                            <input type="radio" name="SuppliersProjectsProposals[billing_schedule]" id="SuppliersProjectsProposals_billing_schedule_Weekly" value="<?php echo $billing_schedule[1]; ?>" <?php echo ($project->billing_schedule==$billing_schedule[1]?"checked" : ""); ?> >
                            <label for="SuppliersProjectsProposals_billing_schedule_Weekly">&nbsp;&nbsp;Weekly</label>
                        </span>
                        <span class="radio-inline custom-radio custom-radio-primary price_input">
                            <input type="radio" name="SuppliersProjectsProposals[billing_schedule]" id="SuppliersProjectsProposals_billing_schedule_Biweekly" value="<?php echo $billing_schedule[2]; ?>" <?php echo ($project->billing_schedule==$billing_schedule[2]?"checked" : ""); ?> >
                            <label for="SuppliersProjectsProposals_billing_schedule_Biweekly">&nbsp;&nbsp;Biweekly</label>
                        </span>
                        <ul id="parsley-id-multiple-a" class="parsley-errors-list price_input">
                        </ul>
                        <span class="radio-inline custom-radio custom-radio-primary">
                            <input type="radio" name="SuppliersProjectsProposals[billing_schedule]" id="SuppliersProjectsProposals_billing_schedule_custom" value="custom" <?php echo (in_array($project->billing_schedule,$billing_schedule)?'' : "checked"); ?> >
                            <label for="SuppliersProjectsProposals_billing_schedule_custom">&nbsp;&nbsp;Custom</label>
                        </span>
                        <div class="col-sm-12 mt10 pl0 pr0" id="sahil_input" <?php echo (in_array($project->billing_schedule,$billing_schedule)?"style='display:none'" : ""); ?>>
                            <?php echo $form->textField($project,'billing_schedule',array('placeholder'=>"20% upfront, 30% halfway, 50% on final delivery",'class'=>'form-control required')); ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-sm-4 control-label">Price Range
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <?php //echo $form->textField($project,'min_price',array('placeholder'=>"From","class"=>"form-control",'required'=>'required',"data-parsley-type"=>"number","data-parsley-maxlength"=>"10")); ?>
                            <?php echo $form->textField($project,'min_price',array('placeholder'=>"From","class"=>"form-control c_required c_integer","data-parsley-id-custom"=>"93336")); ?>
                        </div>
                        <ul class="parsley-errors-list" id="parsley-id-custom-93336"></ul>


                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <?php //echo $form->textField($project,'max_price',array('placeholder'=>"To","class"=>"form-control",'required'=>'required','data-parsley-type'=>'number','data-parsley-maxlength'=>"10")); ?>
                            <?php echo $form->textField($project,'max_price',array('placeholder'=>"To","class"=>"form-control c_required c_integer","data-parsley-id-custom"=>"93335")); ?>
                        </div>
                        <ul class="parsley-errors-list " id="parsley-id-custom-93335"></ul>
                    </div>
                    <div class="col-sm-8 pull-right">
                    <small class="help-block">Please include the VenturePact fee in the price estimates you provide to the client.</small>
                        </div>
                </div>
            </div>

            <div class="form-group">
        <div class="col-sm-12">
            <label class="col-sm-4 control-label">Start Date
                <span class="text-danger">*</span>
            </label>
            <div class="col-sm-8">
                <?php echo $form->textField($project,'start_date',array('value'=>(isset($project->start_date))?date('m/d/Y',strtotime($project->start_date)):'','placeholder'=>"Select a date","class"=>"form-control ",'required'=>'required','id'=>'datepicker_start_date')); ?>
            </div>

        </div>
    </div>
            <div class="form-group">
        <div class="col-sm-12">
            <label class="col-sm-4 control-label">Trial Period
                <span class="text-danger">*</span>
            </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">Days</span>
                    <?php //echo $form->textField($project,'trial_period',array('placeholder'=>"Tiral Period in days","class"=>"form-control",'required'=>'required',"data-parsley-type"=>"integer")); ?>
                    <?php echo $form->textField($project,'trial_period',array('placeholder'=>"Tiral Period in days","class"=>"form-control c_required_not c_integer" ,"data-parsley-id-custom"=>"93334")); ?>
                </div>
                <ul class="parsley-errors-list filled" id="parsley-id-custom-93334"></ul>
                <small class="help-block">For larger projects, a trial period will give clients a lot of confidence in your firm. It may range from a few days to a few weeks, depending on the timeline estimate.</small>
            </div>

        </div>
    </div>
            <div class="form-group">
        <div class="col-sm-12">
            <label class="col-sm-4 control-label">Estimated Timeline
                <span class="text-danger">*</span>
            </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">Days</span>
                    <?php //echo $form->textField($project,'time_estimation',array('placeholder'=>"Time Estimation in days","class"=>"form-control",'required'=>'required',"data-parsley-type"=>"integer")); ?>
                    <?php echo $form->textField($project,'time_estimation',array('placeholder'=>"Time Estimation in days","class"=>"form-control c_required_not ","data-parsley-id-custom"=>"93333")); ?>
                </div>
                <ul class="parsley-errors-list" id="parsley-id-custom-93333"></ul>
                <small class="help-block">Provide an estimate that is neither too ambitious nor too conservative.</small>
            </div>

        </div>
    </div>

    <div class="modal-footer panel-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="SUBMIT" class="btn btn-teal" id="btnpriceedit">Save</button>
    </div>
    <?php $this->endWidget(); ?>
</div>
<!-- /.modal-content -->
</div>

</div>
<!-- Price and prefrence  -->



<!--/ Model popup  -->

<script type="text/javascript">
    $(document).ready(function() {
        // display month & year
        var allowedMimeTypeList = ['image/*', 'text/plain', 'application/pdf', 'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'];


        var price_validation = $("#price-form").parsley();
        var pitch_validation = $("#pitch-form").parsley();
        console.log("sa " + pitch_validation);
        console.log("as " + price_validation);

        $("#datepicker_start_date").datepicker({
            changeMonth: true,
            changeYear: true
        });

        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        $("#SuppliersProjectsProposals_billing_schedule_custom").on('click', function() {
            $('#sahil_input').slideDown();
        });
        $(".price_input").on('click', function() {
            $('#sahil_input').slideUp();
        });

        //price form submittion
        $("#price-form").on("submit", function(e) {
            console.log("submitting form" + price_validation.isValid());
            e.preventDefault();
            if(!custom_validate($(this)))
            {
                return false;
            }
            if (price_validation.isValid()) {
                $("#btnpriceedit").text("Saving..").attr("disabled");
                var priceform = $("#price-form");
                console.log(priceform.serialize());
                $.ajax({
                    type: 'POST',
                    data: priceform.serialize(),
                    url: "<?php echo CController::createUrl('/supplier/pitch/'); ?>",
                    datatype: "json",
                    success: function(data) {
                        console.log("data received +" + data);
                        $("#btnpriceedit").text("Save Changes").removeAttr("disabled");
                        var pricerange = "$" + priceform.find("[id=SuppliersProjectsProposals_min_price]").val() + " - $" + priceform.find("[id=SuppliersProjectsProposals_max_price]").val();
                        var startdateview = new Date(priceform.find("[id=datepicker_start_date]").val())
                        console.log(startdateview.getDate());
                        $("#budget").text(pricerange);
                        $("#sartdateview").text(startdateview.getDate() + "-" + monthNames[startdateview.getMonth()] + "-" + startdateview.getFullYear());

                        $("#trialview").text(priceform.find("[id=SuppliersProjectsProposals_trial_period]").val() + " Days");
                        $("#budget_type").text(priceform.find("[id=SuppliersProjectsProposals_billing_schedule]").val());
                        $("#time_view").text(priceform.find("[id^=customradio]:checked").val());
                        $("#time_estimation").text(priceform.find("[id=SuppliersProjectsProposals_time_estimation]").val() + " Days");
                        $("#pricetop").modal("hide");
                        return false;
                    },
                    error: function(a, b, c) {
                        console.log("Errors : " + JSON.stringify(a) + " | " + JSON.stringify(b) + " | " + JSON.stringify(c));
                    }
                });
                return false;
            }
            price_validation = $("#price-form").parsley();
            return false;
        });
        $('.signup_error_container').hide();

        //Attachement handler
        // Function save attachement and dynamicaly add to interface
        $('#pitchAttachement').click(function() {
            var el = $(this);
            var pid = $("#pitch-form").find("#SuppliersProjectsProposals_id").val();
            console.log("clicked" + pid);
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: allowedMimeTypeList
                },
                function(InkBlob) {
                    //console.log("file : " + JSON.stringify(InkBlob));
                    $.ajax({
                        type: 'POST',
                        datatype: "json",
                        url: "<?php echo CController::createUrl('/supplier/pitch'); ?>",
                        data: "req=ajax&action=savedoc&path=" + InkBlob.url + "&pid=" + pid + "&name=" + InkBlob.filename + "&size=" + InkBlob.size + "&extension=" + InkBlob.mimetype,
                        success: function(data) {
                            data = JSON.parse(data);
                            console.log(data.iserror);

                            $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                            var messageData = data.success;
                            var htm = "";
                            if (data.iserror) {
                                //rendering error
                                console.log("error found ");
                                messageData = data.errors[0].msg;
                                $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                            } else {
                                console.log(JSON.stringify(messageData));
                                messageData = data.success[0].msg;


                                var newtr = "<tr class='doc_" + data.success[0].lastInsertedId + "'><td class='attach_width_inner'><span class='label label-success'>" + InkBlob.mimetype + "</span>" + InkBlob.filename + "</td>";
                                newtr +='<td width="6%">';
                                newtr +='<a target="_blank" title="View" class="btn btn-link magnific" href="'+InkBlob.url+'">View</a></td>';
                                newtr += "<td>";
                                newtr += '<a href="javascript:void(0)" onclick="removedoc(' + data.success[0].lastInsertedId + ')" class="btn btn-link " title="Remove"><i class="ico-remove5 removeref"></i></a></td></tr>';
                                console.log(newtr);
                                $("#uploadedfiles tr:first, #attachmentView tr:first").after(newtr).hide().show('blind', {}, 500);;
                                $("#uploadedfiles").prev().find('.alert').hide();
                                $(".content-attachment").find(".alert").hide()
                                // setting up dynamic tr


                            }

                            //Genrating message
                            console.log("message data : " + JSON.stringify(messageData));
                            /*for(var i = 0 ; i<messageData.length ; i++ )
    								{*/
                            console.log(typeof messageData);

                            htm += messageData.toString() + "<br />";
                            //}
                            $("#pitch-form").find(".signup_errors").html(htm);
                            $("#pitch-form").find('.signup_error_container').show('blind', {}, 500)

                            console.log("finsishes all tasks");
                        },
                        error: function(a, b, c) {

                        }
                    });
                    hideNotification();
                    console.log(InkBlob.url);
                },
                function(FPError) {
                    console.log("Error Uploading Files : " + FPError.toString());
                    //console.log(FPError.toString());
                }
            );

        });

        //Pitch form handler
        $("#pitch-form").on("submit", function(e) {
            console.log("Submitting form ");
            if (pitch_validation.isValid()) {
                var thisform = $(this);
                thisform.find(":submit").attr("disabled", "disabled").val("Please Wait .. ").text("Please Wait .. ");
                $.ajax({
                    type: 'POST',
                    datatype: "json",
                    url: "<?php echo CController::createUrl('/supplier/pitch'); ?>",
                    data: thisform.serialize(),
                    success: function(data) {
                        data = JSON.parse(data);
                        console.log(data.iserror);

                        $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                        var messageData = data.success;
                        var htm = "";
                        if (data.iserror) {
                            //rendering error
                            console.log("error found ");
                            messageData = data.errors[0].msg;
                            $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                        } else {
                            console.log(JSON.stringify(messageData));
                            messageData = data.success[0].msg;
                            $("#c1").find(".panel-body").html($("#SuppliersProjectsProposals_default_q1_ans").val());
                            $("#c2").find(".panel-body").html($("#SuppliersProjectsProposals_default_q2_ans").val());
                            $("#c3").find(".panel-body").html($("#SuppliersProjectsProposals_default_q3_ans").val());
                            $("#c4").find(".panel-body").html($("#SuppliersProjectsProposals_default_q4_ans").val());
                            $("#c5").find(".panel-body").html($("#SuppliersProjectsProposals_default_q5_ans").val());
                            $("#c6").find(".panel-body").html($("#SuppliersProjectsProposals_default_q6_ans").val());
                            $("[id^=cq_]").each(function() {
                                var cq = $(this);
                                var aid = cq.attr('id').split('_');
                                //console.log("custom " +cq.val());
                                $("#d" + aid[1]).find(".panel-body").html(cq.val());
                            });
                        }

                        console.log(typeof messageData);

                        htm += messageData.toString() + "<br />";

                        $("#pitch-form").find(".signup_errors").html(htm);
                        $("#pitch-form").find('.signup_error_container').show('blind', {}, 500);
                        thisform.find(":submit").removeAttr("disabled").val("Save ").text("Save");
                        console.log("finsishes all tasks");
                        $("#edit_box1").modal("hide");
                        hideNotification();


                    },
                    error: function(a, b, c) {

                    }
                });
                hideNotification();
            }
            //e.
            return false;
        });

        $("[id^=SuppliersProjectsProposals_billing_schedule_]").click(function() {
            var thisid = $(this).attr("id");
            if(thisid =="SuppliersProjectsProposals_billing_schedule_custom")
                $("#SuppliersProjectsProposals_billing_schedule").val('');
            else
                $("#SuppliersProjectsProposals_billing_schedule").val($(this).val());
        });
    });
</script>
<!-- app init script -->

<!--/ app init script -->


<!-- Add remove member -->
<script type="text/javascript">

    function price_custom_valid()
    {
        console.log("Inside custome valid");
        var ret = true;
        if(!custom_validate("SuppliersProjectsProposals_min_price"))
            ret = false;
        if(!custom_validate("SuppliersProjectsProposals_max_price"))
            ret =false

         if(!custom_validate("SuppliersProjectsProposals_trial_period"))
            ret =false

        if(!custom_validate("SuppliersProjectsProposals_time_estimation"))
            ret =false

        if(!custom_validate("SuppliersProjectsProposals_billing_schedule"))
            ret =false

        return ret;
    }
    /*
    function custom_validate(elid){
        if($("#"+elid).val()==""){
            var errId = $("#"+elid).data("parsley-id-custom");
            console.log("errId");
            $("#parsley-id-custom-"+errId).html('<li class="parsley-required">This value is required.</li>').addClass("filled");
            return false;
        }else{
            var errId = $("#"+elid).data("parsley-id-custom");
            $("#parsley-id-custom-"+errId).removeClass("filled").html();
            return true;
        }
    }*/
    function addNewMember(member) {
        console.log(member);
        var el = $("#" + member);
        var memberName = el.find("#SuppliersProjectTeam_name").val();
        var memberExper = el.find("#SuppliersProjectTeam_description ").val();
        var memberimage = el.find(":input[type=hidden]").val();
        $('.signup_error_container').hide();
        //Check if fields are not empty
        //console.log(memberimage);
        if (memberName.trim() !== "" && memberExper.trim() !== "" && memberimage.trim() !== "") {

            $.ajax({
                type: 'POST',
                data: 'memberid=0&action=addprojectteam&name=' + memberName + "&description=" + memberExper + "&memberimage=" + memberimage + "&pid=" + <?php echo $project->id; ?> ,
                url: "<?php echo CController::createUrl('/supplier/ajaxProfile'); ?>",
                success: function(data) {
                    var data = JSON.parse(data);
                    console.log(JSON.stringify(data));
                    $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                    var messageData = data.Success;
                    var htm = "";
                    if (data.iserror) {
                        //rendering error
                        console.log("error found ");
                        messageData = data.errors[0].msg;
                        $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                    } else {
                        messageData = data.success[0].msg;

                        // setting up clone div
                        var cloneDiv = el.clone();
                        cloneDiv.find("[type=button]").html("Add +");
                        cloneDiv.find("#SuppliersProjectTeam_name").val("");
                        cloneDiv.find("#SuppliersProjectTeam_description").val("");
                        cloneDiv.find(":input[type=text],:input[type=hidden]").val("");
                        cloneDiv.appendTo(dynamicTeam);

                        //add new team member to main area
                        var teammem = '<li class="media border-dotted" id="teammember_' + data.success[0].lastInsertedId + '"><a class="pull-left" href="javascript:void(0);"><img alt="" class="media-object img-circle" src="' + memberimage + '"></a><div class="media-body"><p class="media-heading">' + memberName + '</p><p class="media-text">' + memberExper + '</p></div></li>';
                        $("#teamcontainer li:first").after(teammem).hide().show('blind', {}, 500);

                        // convert add to remove
                        el.attr("id", "member_" + data.success[0].lastInsertedId);
                        el.find("[type=button]").html('<i class="ico-minus2 text-default"></i>').attr("onclick", "removeTeamMember('member_" + data.success[0].lastInsertedId + "')");
                        el.find("[type=button]").removeClass("btn btn-teal").addClass("bg-border-none");

                    }

                    //Genrating message
                    console.log("message data : " + JSON.stringify(messageData));
                    htm += messageData + "<br />";
                    $(".signup_errors").html(htm);
                    $('.signup_error_container').show('blind', {}, 500);
                    $("#teamstatus").hide();
                    console.log("finsishes all tasks");


                },
                error: function(a, b, c) {
                    console.log("Errors found : " + JSON.stringify(a) + " | " + JSON.stringify(b) + " | " + JSON.stringify(c));
                },
            });

        } else {
            $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
            $(".signup_errors").html("Please enter team information first");
            $('.signup_error_container').show('blind', {}, 500)
        }
        hideNotification();

    }

    function removeTeamMember(member) {
        console.log("remove memeber : " + member)
        var el = $("#" + member.trim());
        var memberid = member.toString().split('_');
        console.log("member id : " + el.html());
        $.ajax({
            type: 'POST',
            data: 'memberid=' + memberid[1] + "&action=removeprojectteam",
            url: "<?php echo CController::createUrl('/supplier/ajaxProfile');?>",
            success: function(data) {
                var data = JSON.parse(data);
                console.log(JSON.stringify(data));
                $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                var messageData = data.Success;
                var htm = "";
                if (data.iserror) {
                    //rendering error
                    console.log("error found ");
                    messageData = data.errors[0].msg;
                    $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                } else {
                    // success
                    $("#dynamicTeam").find("[id=" + member.trim() + "]").hide('blind', {}, 300);
                    $("#teamcontainer").find("[id=teammember_" + memberid[1] + "]").hide('blind', {}, 300);
                    el.hide(300);
                    messageData = data.success[0].msg;
                }

                //Genrating message
                console.log("message data : " + JSON.stringify(messageData));

                htm += messageData + "<br />";
                $(".signup_errors").html(htm);
                $('.signup_error_container').show('blind', {}, 500)
                console.log("finsishes all tasks");

            },
            error: function(a, b, c) {
                console.log("Errors found : " + a + " | " + b + " | " + c);
            }
        });
        el.hide();
        hideNotification();
        //console.log(el.html());
    }

    function removedoc(docId) {
        console.log(docId);
        $.ajax({
            type: 'POST',
            url: "<?php echo CController::createUrl('/supplier/pitch'); ?>",
            data: "path=1&req=ajax&action=removedoc&pid=" + docId,
            datatype: 'json',
            success: function(data) {
                var data = JSON.parse(data);
                console.log(JSON.stringify(data));
                $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                var messageData = data.Success;
                var htm = "";
                if (data.iserror) {
                    //rendering error
                    console.log("error found ");
                    messageData = data.errors[0].msg;
                    $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                } else {
                    // success
                    $(".doc_" + docId).hide(300);
                    messageData = data.success[0].msg;
                }

                //Genrating message
                console.log("message data : " + JSON.stringify(messageData));

                htm += messageData + "<br />";
                $(".signup_errors").html(htm);
                $('.signup_error_container').show('blind', {}, 500);
                console.log("finsishes all tasks");

            },
            error: function(a, b, c) {
                console.log("Errors found : " + JSON.stringify(a) + " | " + JSON.stringify(b) + " | " + JSON.stringify(c));
            }
        });

        hideNotification();
        //console.log(el.html());

    }
</script>
<!--/ Add remove member -->

<!-- Inc File picker  -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#scrollbox6').enscroll({
            showOnHover: true,
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
        });
        $('#scrollbox7, #scrollbox4,#scrollbox3').enscroll({
            showOnHover: true,
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
        });


        $('#dynamicTeam').delegate('.inkfile', 'click', function() {
            var el = $(this);
            console.log("clicked");
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: ['image/*']
                },
                function(InkBlob) {
                    el.find(":input[type=text],:input[type=hidden]").val(InkBlob.url);
                    console.log("fil : " + JSON.stringify(InkBlob));
                },
                function(FPError) {
                    //alert("Error Uploading Files : " + FPError.toString());
                    console.log(FPError.toString());
                }
            );

        });


        $('.jumbotron').delegate('#btnsubmitproject','click',function(e)
        {
            e.preventDefault();
            console.log("#submit project clicked");
            var el= $(this);
            if(checkBeforeSubmit()){

                if(!submitmodalcount)
                {
                    submitmodalcount++;
                    bootbox.confirm("<h4>Are you sure you want to submit this pitch?<h4>", function (result)
                    {
                        if(result)
                        {

                            console.log("submit project");
                            if($('#chat-box').data('room'))
                            {
                                // console.log("ye chla ");
                                window.location.href=$('#btnsubmitproject').attr('href');
                                return false;
                            }else{
                                // $('#chat-box .info').hide();
                                // createRoom(user,1);
                                window.location.href=$('#btnsubmitproject').attr('href');
                            }
                            return false;
                        }
                        else
                        {
                            submitmodalcount--;
                        }
                                        // callback
                    }).find("div.modal-body").addClass("bgcolor-teal");;

                }
            }
            return false;
            e.preventDefault();
    });

    });
    function checkBeforeSubmit()
    {
        console.log("start checking ,,");
        var returndata = true;
        var msg="",i=1;
        //check profile status
        if($("#profileStatus").val()==0){
            returndata = false;
            msg += i +". Please complete & submit your profile including the Basics & FAQs.<br>" ;
            i++;
        }
        //check pricing and timelinedetails
        if($("#SuppliersProjectsProposals_min_price").val().trim()=="" ||                  $("#SuppliersProjectsProposals_min_price").val().trim() == "" || $("#datepicker_start_date").val().trim()=="" ){
            returndata = false;
            msg += i +". Please complete the price and timeline estimates.<br>";
            i++;
        }
        if(checkCustomQuestion()){
            returndata = false;
            msg += i + ". Please complete the proposal question 'Why us'.<br> ";
            i++;

        }
        if(!returndata){
            callerrorbox(msg);
        }
        console.log("check  " + returndata);
        return returndata;
    }
	function checkCustomQuestion(){
		var returndata = false;
		$("#pitch-form textarea").each(function(){
			if($(this).val().trim() == "")
				returndata=true;
		});

		return returndata;
	}
    function callerrorbox(boottext){
          // If pitch is not completed
           bootbox.dialog({
                    message: boottext,
                    title: "Incomplete Pitch!",
                    buttons: {
                        success: {
                            label: "OK",
                            className: "btn-danger",
                            callback: function () {
                                // callback
                            }
                        }
                    }
                });
    }
</script>
<!--/ Inc File picker  -->



<style>
.bootbox-body{font-size: 13px; }
table {
    border-collapse:inherit !important;
    border-spacing: 0;
}
</style>
