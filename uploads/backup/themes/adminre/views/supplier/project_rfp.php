<?php //CVarDumper::dump($project->clientProjects->clientProjectsHasSkills->skills->name,10,1);die; ?>
<!-- START Template Main -->
<section>
    <div class="page-header page-header-block pb0 pt0">
        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li>
                    <?php echo CHtml::link( 'Dashboard', array( '/supplier/index'));?>
                </li>
                <li class="text-info">Leads</li>
                <li class="text-info">Project Info</li>
                <li class="active">
                    <?php echo $project->clientProjects->name; ?></li>
            </ol>
        </div>
    </div>

    <input type="hidden" name="page" value="pitch" id="hiddenpage" />

    <!-- START Template Container  -->
    <section class="container-fluid">
        <div class="page-header page-header-block bgcolor-white">
            <div class="page-header-section pl15">
                <h4 class="semibold ellipsis nm pb5 "><?php echo $project->clientProjects->name; ?></h4>
                <p class="ellipsis nm text-default">
                    <i class="ico-user mr5"></i> Client:
                    <?php echo $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name; ?>
                    <?php echo (!empty($project->clientProjects->clientProfiles->company_name)?" - ".$project->clientProjects->clientProfiles->company_name:''); ?></p>
                <?php if(!empty($project->clientProjects->clientProfiles->team_size)){ ?>
                <p class="ellipsis nm text-default">
                    <i class="ico-users mr5"></i>
                    <?php echo $project->clientProjects->clientProfiles->team_size; ?> Employees</p>
                <?php } ?>
                <p class="ellipsis nm text-default">
                    <i class="ico-location mr5"></i> Based in
                    <?php echo $project->clientProjects->clientProfiles->cities->name; ?>
                </p>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar clearfix clarification_container">
                    <div class="col-xs-12">
                        <?php if($project->status == 0 || $project->status==1){ ?>

                        <a type="button" class="btn btn-danger ml5 pull-right" style="margin-top:13px;" id="btnarchive" href="<?php echo CController::createUrl('/supplier/projectStatusHandler&stat=6&projectid='.$project->id); ?>">
                            <i class="ico-question mr5"></i> Archive
                        </a>
                        <a type="button" class="btn btn-success pull-right" style="margin-top:13px;" href="javascript:void(0);" id="btnpitch">
                            <i class="ico-checkmark3 mr5"></i> Pitch
                        </a>
                        <a class="btn btn-info clarification mr5 pull-right" style="margin-top:13px; margin-left:2px; <?php echo (!empty($project->chat_room_id)?'display:none': ''); ?>">
                            <i class="ico-eye mr5"></i> Seek Clarification
                        </a>

                        <!-- <a type="button" class="btn btn-success" style="margin-top:15px;" href="<?php //echo CController::createUrl('/supplier/pitch&render=1&projectid='.$project->id."&stat=".$project->status); ?>" id="btnpitch">
                            <i class="ico-checkmark3" ></i>Pitch</a> -->

                        <?php }else{ ?>
                        <button type="button" class="btn btn-success ml10 pull-right" style="margin-top: 0px;">
                            <i class="ico-checkmark3"></i>
                            <?php echo $this->projectStatus[$project->status]["supplier"]; ?></button>
                        <?php } ?>

                    </div>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- START Table Layout -->
        <div class="row">
            <?php if(Yii::app()->user->hasFlash('success')):?>
            <div class="col-md-12 mb10">
                <div class="alert alert-dismissable alert-success mb5">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if(Yii::app()->user->hasFlash('errors')):?>
            <div class="col-md-12">
                <div class="alert alert-dismissable alert-danger">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo Yii::app()->user->getFlash('errors'); ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-md-12 hide">
                <div class="panel">
                    <div class="pa15">
                        <ul class="nav nav-section nav-justified">
                            <!-- Software development section -->
                            <?php if(count($project_status)>0){ ?>
                            <li style="width:3%">

                                <div class="section">
                                    <h4 class="semibold text-success mt0 mb5" style="font-size:12px;">
										<?php 
											foreach($project_status as $key=>$item)
											{
												if($key!= "CS")
													echo implode(',',$item);
											}
											
										?></h4>
                                    <p class="nm text-muted">
                                        <span class="" style="font-size:12px;">Requirement</span>
                                    </p>
                                </div>
                            </li>
                            <?php } ?>
                            <!--/ Software development section -->
                            <!-- Services section (Need  -->

                            <?php if(empty($project->clientProjects->clientProjectsHasServices)){ ?>
                            <!-- NO services! -->
                            <?php }else{ ?>
                            <li>

                                <div class="section">
                                    <h4 class="semibold text-success mt0 mb5" style="font-size:12px;">
										<?php
                                        $totalServices = array();
                                        foreach($project->clientProjects->clientProjectsHasServices as $service){

                                            $totalServices []= " ".$service->services->name;
                                         }
                                        echo implode(',',$totalServices);
                                        ?>
                                        </h4>
                                    <p class="nm text-muted">
                                        <span class="" style="font-size:12px;">Service type</span>
                                    </p>
                                </div>

                            </li>
                            <?php } ?>

                            <!--/ Services section (Need  -->

                            <!-- Industries section   -->
                            <?php if(empty($project->clientProjects->clientProjectsHasIndustries)){ ?>
                            <!-- NO Indutries! -->
                            <?php }else{ ?>
                            <li>
                                <div class="section">
                                    <h4 class="semibold text-warning mt0 mb5" style="font-size:12px;">
										<?php foreach($project->clientProjects->clientProjectsHasIndustries as $industry){ ?>
											<?php echo $industry->industries->name.","; ?>
										<?php } ?>
                                        </h4>
                                    <p class="nm text-muted">
                                        <span class="" style="font-size:12px;">Category</span>
                                    </p>
                                </div>
                            </li>
                            <?php } ?>

                            <!--/ Industries section   -->

                            <!-- price section   -->
                            <?php if(!empty($project->clientProjects->min_budget) && !empty($project->clientProjects->max_budget) ){ ?>
                            <li>
                                <div class="section">
                                    <h4 class="semibold text-primary mt0 mb5" style="font-size:12px;"><?php echo "$".$project->clientProjects->min_budget." - $".$project->clientProjects->max_budget ; ?></h4>
                                    <p class="nm text-muted">
                                        <span class="" style="font-size:12px;">Budget
											<i class="ico-info-sign hide" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Enter Text for Budget details" style="cursor:pointer;"></i>
										</span>
                                </div>
                            </li>
                            <?php } ?>
                            <!--/ price section   -->

                            <!-- Timeline section   -->
                            <?php if(isset($project->clientProjects->start_date)){ ?>
                            <li>
                                <div class="section">
                                    <h4 class="semibold text-danger mt0 mb5" style="font-size:12px;"><?php echo date( "d-M-Y",strtotime($project->clientProjects->start_date)); ?></h4>
                                    <p class="nm text-muted">
                                        <span class="" style="font-size:12px;">Start Date</span>
                                    </p>
                                </div>
                            </li>
                            <?php } ?>
                            <!--/ Timeline section   -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <!-- Flow section  -->
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Scope</h3>
                            </div>
                            <hr class="nm">
                            <div class="panel-body">
                                <p class="text-default">
                                    <?php echo $project->clientProjects->description; ?>
                                </p>


                                <?php if(count($project->clientProjects->clientProjectFlows)>0){ ?>
                                <h5 class="text-success semibold pt10 pb10">Flow </h5>
                                <div class="widget-notes block">
                                    <div class="scrollbox_bar slimscroll" id="flowscroll">
                                        <div class="paper pt0">
                                            <ul class="list-table">
                                                <li class="text-left">
                                                    <?php foreach($project->clientProjects->clientProjectFlows as $step){ ?>
                                                    <div class="col-sm-12 mb0 pl0 pr0">
                                                        <div class="col-sm-2 pl0">
                                                            <label class="control-label add_new" style="padding-top:8px;">
                                                                <?php echo "Step".((int)$step->step + 1).":"; ?></label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <p class="text-default add_new mt5 pt5 mb0">
                                                                <?php echo $step->description; ?></p>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <li class="text-center hide">
                                    Client has not submitted a flow.
                                </li>

                                <?php } ?>
								  <!-- Requirement section -->

                                <h5 class="text-success semibold mb15 mt15">Requirement</h5>
                                <ul class="list-group">
                                    <li class="list-group-item np" style="border:none;">
                                        <div class="form-wizard">
                                            <!-- Requirement display -->
                                            <div class="col-sm-12 pl0 pr0 mb10">

                                                <?php foreach($project_status as $key=>$item) { if($key == "CS"){ foreach($item as $p){ ?>
                                                <p class="text-default"><?php echo $p; ?></p>
                                                <?php } } } ?>


                                            </div>
                                            <!--/ Requirement display -->
                                        </div>
                                    </li>
                                </ul>

                                <!--/ Requirement section -->


                                <!-- Timeline section   -->
                                <?php if(isset($project->clientProjects->start_date)){ ?>
                                <h5 class="text-success semibold mb15 mt15">Start Date</h5>

                                <p class="text-default"><?php echo date( "d-M-Y",strtotime($project->clientProjects->start_date)); ?></p>



                                <?php } ?>
                                <!--/ Timeline section  >
								<!-- Services section (Need  -->

                                <?php if(!empty($project->clientProjects->clientProjectsHasServices)){ ?>
                                <h5 class="text-success semibold mb15 mt15">Service type</h5>


                                <p class="text-default">
                                    <?php $totalServices=array(); foreach($project->clientProjects->clientProjectsHasServices as $service){ $totalServices[]= " ".$service->services->name; } echo implode(',',$totalServices); ?>

                                </p>


                                <?php } ?>


                                <!--/ Services section (Need  -->
                                <!-- price section   -->
                                <?php if(!empty($project->clientProjects->min_budget) && !empty($project->clientProjects->max_budget) ){ ?>
                                <h5 class="text-success semibold mb15 mt15">Budget</h5>

                                <p class="text-default">
                                    <?php echo "$".$project->clientProjects->min_budget." - $".$project->clientProjects->max_budget ; ?></p>

                                <?php } ?>
                                <!--/ price section   -->

                                <h5 class="text-success semibold pt10 pb10">Language Preferences</h5>
                                <?php if(empty($project->clientProjects->clientProjectsHasSkills)){ ?>
                                <div class="col-md-12">
                                    <div class="alert alert-dismissable alert-danger">

                                        <strong></strong> No Language preference added!
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <?php foreach($project->clientProjects->clientProjectsHasSkills as $skill){ ?>
                                <span class="label label-success mb5"><?php echo $skill->skills->name ?></span>

                                <?php } ?>
                                <?php } ?>


                                <br>

                                <?php if(count($project->clientProjects->projectReferences)>0){ ?>
                                <h5 class="text-success semibold pt10 pb0">References</h5>
                                <p class="pb0">
                                    <?php echo $project->clientProjects->unique_features ?>
                                </p>
                                <div class="border-dashed">
                                    <!-- DIsplay reference  links -->
                                    <ul class="list-group mb0">
                                        <li class="list-group-item np" style="border:none;">
                                            <?php $refCount=1;foreach($project->clientProjects->projectReferences as $reference){ ?>
                                            <a class="text-muted" target="_blank" href="//<?php echo $reference->details; ?>">
                                                <?php echo $reference->details ?></a>
                                            <?php echo (($refCount != count($project->clientProjects->projectReferences)?",":'')); ?>
                                            <?php $refCount++; } ?>
                                        </li>
                                    </ul>
                                    <!--/ DIsplay reference  links -->
                                </div>
                                <?php }else{ ?>

                                <?php } ?>





                                <!-- Admin Notes Section  -->
                                <?php if(!empty($project->note)){ ?>
                                <h5 class="text-success semibold mb15 mt15">Admin Notes</h5>
                                <p class="text-default">
                                    <?php echo $project->note; ?>
                                </p>
                                <?php } ?>
                                <!--/ Admin Notes Section  -->
                                <div class="panel-footer">
                                    <h5 class="semibold mt0 mb5" style="font-size:12px">
                                            <i class="ico-attachment mr5"></i>Attachment
                                            <span class="text-muted" style="font-size:10px;">(<?php echo count($project->clientProjects->clientProjectDocuments); ?> attachment)</span>
                                        </h5>
                                    <table class="table table-striped mb0">
                                        <tbody>

                                            <!-- Documents Displaying -->
                                            <?php if(count($project->clientProjects->clientProjectDocuments)>0){ ?>
                                            <?php foreach($project->clientProjects->clientProjectDocuments as $doc){ ?>
                                            <tr>
                                                <td style="border:none;padding-left:0px; background:none;">
                                                    <span class="label label-success">HTML</span>
                                                    <?php echo $doc->name ;?>
                                                </td>
                                                <td width="6%" style="border:none; background:none; "><a href="javascript:void(0)" onclick='SaveToDisk("<?php echo $doc->path ?>","")'>Download</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php }else{ ?>
                                            <div class="col-md-12">
                                                <div class="alert alert-dismissable alert-danger hide">

                                                    <strong></strong> No attachments provided.
                                                </div>
                                            </div>

                                            <?php } ?>
                                            <!--/ Documents Displaying -->
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--/ Flow section  -->
                    <!-- Refrences Block -->
                    <div class="col-lg-6 hide">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">References</h3>
                            </div>
                            <hr class="nm">
                            <div class="text-default panel-body">
                                <p class="pb5">
                                    <?php echo $project->clientProjects->unique_features ?>
                                </p>
                                <div class="border-dashed">
                                    <!-- DIsplay reference  links -->
                                    <ul class="list-group mb0">
                                        <li class="list-group-item text-center np" style="border:none;">
                                            <?php if(count($project->clientProjects->projectReferences)>0){ ?>
                                            <?php foreach($project->clientProjects->projectReferences as $reference){ ?>
                                            <a class="text-muted" target="_blank" href="//<?php echo $reference->details; ?>">
                                                <?php echo $reference->details ?></a>,
                                            <?php } ?>
                                            <?php }else{ ?>No references are provided.
                                            <?php } ?>
                                        </li>
                                    </ul>
                                    <!--/ DIsplay reference  links -->
                                </div>

                                <!-- Progress section -->

                                <h5 class="text-success semibold mb15 mt15">Progress</h5>
                                <ul class="list-group">
                                    <li class="list-group-item np" style="border:none;">
                                        <div class="form-wizard">
                                            <!-- Progess display -->
                                            <div class="col-sm-12 pl0 pr0 mb10">

                                                <?php foreach($project_status as $key=>$item) { if($key == "CS"){ foreach($item as $p){ ?>
                                                <span class="checkbox custom-checkbox pb10">
                                                            <input type="checkbox" checked="" disabled="" id="customcheckbox1" name="customcheckbox1" data-parsley-multiple="customcheckbox1" data-parsley-id="1063">
                                                            <label title="" for="customcheckbox1">&nbsp;&nbsp;<?php echo $p; ?></label>
                                                        </span>
                                                <?php } } } ?>


                                            </div>
                                            <!--/ Progess display -->
                                        </div>
                                    </li>
                                </ul>

                                <!--/ Progress section -->
                            </div>
                            <div class="panel-footer ">
                                <h5 class="semibold mt0 mb5" style="font-size:12px">
                                            <i class="ico-attachment mr5"></i>Attachment 
                                            <span class="text-muted" style="font-size:10px;">(<?php echo count($project->clientProjects->clientProjectDocuments); ?> attachment)</span>
                                        </h5>
                                <table class="table table-striped mb0">
                                    <tbody>

                                        <!-- Documents Displaying -->
                                        <?php if(count($project->clientProjects->clientProjectDocuments)>0){ ?>
                                        <?php foreach($project->clientProjects->clientProjectDocuments as $doc){ ?>
                                        <tr>
                                            <td style="border:none;padding-left:0px; background:none;">
                                                <span class="label label-success">HTML</span>
                                                <?php echo $doc->name ;?>
                                            </td>
                                            <td width="6%" style="border:none; background:none; "><a href="javascript:void(0)" onclick='SaveToDisk("<?php echo $doc->path ?>","")'>Download</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php }else{ ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-dismissable alert-danger hide">

                                                <strong></strong> No Documents Found !
                                            </div>
                                        </div>

                                        <?php } ?>
                                        <!--/ Documents Displaying -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/ Refrences Block -->
                </div>
            </div>
            <!--/ Left Side / Top side -->

            <!-- Right Side / Bottom side  Chatting panel -->
            <audio id="pop">
                <source src="<?php echo Yii::app()->theme->baseUrl; ?>/files/pop.mp3" type="audio/mpeg">
                    <source src="<?php echo Yii::app()->theme->baseUrl; ?>/files/pop.ogg" type="audio/ogg">
            </audio>
            <div class="col-md-6">
                <?php echo $this->renderPartial("_chat_partial",array('project'=>$project)); ?>
            </div>
        </div>
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

<script type="text/javascript">
    (function($) {

        $("html").Core({
            "console": false
        });

        $('#flowscroll').enscroll({
            showOnHover: true,
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
        });



    })(jQuery);
</script>


<script type="text/javascript">
    $(document).ready(function() {
        console.log("loading chat");
        //init();
        //attachfileformessage
        $("#btnpitch").on('click', function() {
            //Boot box added to confirm
            var boottext = "Please only click OK below if you have complete clarity on the project. If you have any question, please click on \"Seek Clarification\". ";
            bootbox.dialog({
                message: boottext,
                title: "Are you sure you want to pitch?",
                buttons: {

                    danger: {
                        label: "Cancel",
                        className: "btn-danger ",
                        callback: function() {

                            // callback
                        }
                    },
                    success: {
                        label: "OK!",
                        className: "btn-success",
                        callback: function() {
                            var projectid = "<?php echo $project->id; ?>";
                            $("#p_" + projectid + " li:first").removeClass("active2");
                            $("#p_" + projectid + " li:last a").trigger("click");

                        }
                    }

                }
            });
        });

        $("#btnarchive").on("click", function(event) {
            var el = $(this);
            bootbox.confirm("<h4> Are you sure you want to archive this project?</h4>", function(result) {
                if (result) {
                    window.location.href = el.attr("href");
                    return true;
                }
                // callback
            }).find("div.modal-body").addClass("bgcolor-teal");;
            return false;
            event.preventDefault();
        });
        $('#scrollbox7').enscroll({
            showOnHover: true,
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
        });


    });
</script>
<style>
    .media-list > .media .media-object > img {
        width: 100%;
        height: 100%;
    }
</style>
