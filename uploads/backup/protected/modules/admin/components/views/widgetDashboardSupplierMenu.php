<?php //echo "printing";CVarDumper::dump($this->projectStatus,10,1);die; 
	$newProjectCount=0;
	$clarificationCount=0;
	$pitchedCount=0;
	$startedCount=0;
	$completedCount=0;
	$rejectedCount=0;
    // OBJECT TO HOLD DYNAMIC LINKS AND THEIR COLLAPSE ON THE BASIS OF STAT VARIABLE 
	$awarded="<ul class='submenu collapse ".((isset($_REQUEST['stat']) && $_REQUEST['stat']==0)?'in':'')."' id='projectnew'>";

	$clarification="<ul class='submenu collapse ".(( isset($_REQUEST['stat']) && $_REQUEST['stat']==1)?'in':'')."' id='projectclarification'>";
	$pitched="<ul class='submenu collapse ".(( isset($_REQUEST['stat']) && $_REQUEST['stat']==2)?'in':'')."' id='projectpitched'>";
	$accepted="<ul class='submenu collapse ".(( isset($_REQUEST['stat']) && $_REQUEST['stat']==3)?'in':'')."' id='projectaccepted'>";//Change id below if accepted or started, one will not used 
	$started="<ul class='submenu collapse ".(( isset($_REQUEST['stat']) && $_REQUEST['stat']==4)?'in':'')."' id='projectstarted'>";
	$completed="<ul class='submenu collapse ".(( isset($_REQUEST['stat']) && $_REQUEST['stat']==5)?'in':'')."' id='projectcompleted'>";
	$rejected="<ul class='submenu collapse ".(( isset($_REQUEST['stat']) && $_REQUEST['stat']==6)?'in':'')."' id='projectrejected'>";

	foreach($projects as $project){
		$links = "  <span class='text'>".$project->clientProjects->name."</span>
                    <span class='number'>
                        <span class='label label-primary projectmessagecount text-white' data-original-title='Unread 0 Messages(s)' data-toggle='tooltip' data-placement='left'></span>
                    </span>
                    <span class='arrow'></span>
                    </a>
				<ul id='p_".$project->id."' class='submenu collapse ".(( isset($_REQUEST['projectid']) && $_REQUEST['projectid']==$project->id)?'in':'')."'>
				    <li class='active2'>".CHtml::ajaxLink( '<span class="text">Project Info.</span>', array( '/supplier/rfp',"projectid"=>$project->id), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html).removeClass("loadingcontent");}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'))."
				    <li>".CHtml::ajaxLink( '<span class="text">Pitch</span>', array( '/supplier/pitch',"projectid"=>$project->id), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html).removeClass("loadingcontent");}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'))."</li>
                </ul>
                </li>";
		switch($project->status)
		{
			case '0' :
				$awarded.="<li class=".(( isset($_REQUEST['projectid']) && $_REQUEST['projectid']==$project->id)?"active2":'').">
						<a href='javascript:void(0);' data-toggle='submenu' data-target='#p_".$project->id."' data-parent='#projectnew'>".$links;
				$newProjectCount++;
			break;
            case '1' :
				$clarification.="<li class=".(( isset($_REQUEST['projectid']) && $_REQUEST['projectid']==$project->id)?"active2":'').">
						<a href='javascript:void(0);' data-toggle='submenu' data-target='#p_".$project->id."' data-parent='#projectclarification'>".$links;
                $clarificationCount++;
			break;
			case '2' :
				$pitched.="<li class=".(( isset($_REQUEST['projectid']) && $_REQUEST['projectid']==$project->id)?"active2":'').">
						<a href='javascript:void(0);' data-toggle='submenu' data-target='#p_".$project->id."' data-parent='#projectpitched'>".$links;
            $pitchedCount++;
			break;
			case '3' :
				$accepted.="<li class=".(( isset($_REQUEST['projectid']) && $_REQUEST['projectid']==$project->id)?"active2":'').">
						<a href='javascript:void(0);' data-toggle='submenu' data-target='#p_".$project->id."' data-parent='#projectaccepted'>".$links;
			break;
			case '4' :
				$started.="<li class=".(( isset($_REQUEST['projectid']) && $_REQUEST['projectid']==$project->id)?"active2":'').">
						<a href='javascript:void(0);' data-toggle='submenu' data-target='#p_".$project->id."' data-parent='#projectstarted'>".$links;
            $startedCount++;
			break;
			case '5' :
				$completed.="<li class=".(( isset($_REQUEST['projectid']) && $_REQUEST['projectid']==$project->id)?"active2":'').">
						<a href='javascript:void(0);' data-toggle='submenu' data-target='#p_".$project->id."' data-parent='#projectcompleted'>".$links;
            $completedCount++;
			break;
			case '6' :
				$rejected.="<li class=".(( isset($_REQUEST['projectid']) && $_REQUEST['projectid']==$project->id)?"active2":'').">
						<a href='javascript:void(0);' data-toggle='submenu' data-target='#p_".$project->id."' data-parent='#projectrejected'>".$links;
            $rejectedCount++;
			default : 
			
		}
	}
	$awarded.="</ul>";
	$clarification.="</ul>";
	$pitched.="</ul>";
	$accepted.="</ul>";
	$started.="</ul>";
	$completed.="</ul>";
	$rejected.="</ul>";
	$linkArray= array('rfp','pitch','projectStatusHandler');

?> 

<!-- START Template Sidebar (Left) -->
        <aside class="sidebar sidebar-left sidebar-menu">
			<div id="scrollbox6">
            <!-- START Sidebar Content -->
            <section class="content">
                <!-- START Template Navigation/Menu -->
                <ul id="nav" class="topmenu">
                    <!-- <li class="menuheader">MAIN MENU</li> -->
                    <li class="<?php echo (Yii::app()->controller->action->id =='index')?'active':'';?>" >
                        <?php echo CHtml::link( '<span class="figure"><i class="ico-home2"></i></span>
                            <span class="text">Dashboard</span><span class="number"><span class="label label-danger" data-original-title="'.$newProjectCount.' proposal(s)" data-toggle="tooltip" data-placement="left" >'.$newProjectCount.'</span></span>', array( '/supplier/index&stat'));?>
                    </li>
                    <?php //echo $project->suppliers->is_profile_complete;die; ?>

                   <li>
						 <?php //echo CHtml::link( '<span class="figure"><i class="ico-screwdriver"></i></span><span class="text">Profile</span><span class="arrow"></span>', array( '/supplier/profile'));?>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#components" data-parent="#nav">

							<span class="figure"><i class="ico-screwdriver"></i></span><span class="text">Profile</span> <?php echo (($profile->is_application_submit ==1)?'<span class="number"><span class="label chk_color"><i class="ico-checkmark"></i></span></span>':''); ?>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level  Profile Menu -->
                        <ul id="components" class="submenu collapse <?php echo (Yii::app()->controller->action->id =='profile' || Yii::app()->controller->action->id =='faq')?'in':'';?> ">
							<li  class="<?php echo (($profile->is_profile_complete ==1)?'active':'');?>" >
                                <?php echo CHtml::ajaxLink( '<span class="text">Basic</span>'.(($profile->is_profile_complete ==1)?'<span class="number"><span class="label chk_color"><i class="ico-checkmark"></i></span></span>':''), array( '/supplier/profile',"show"=>"basic"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
                            </li>
                            <li class="<?php echo ((count($profile->suppliersHasPortfolios)>0)?'active ':'');  ?> <?php echo (Yii::app()->controller->action->id=='profile')?'activeLink':'';  ?>" >

								<?php echo CHtml::ajaxLink( '<span class="text">Portfolio</span><span class="number"><span class="label text-white label-success portfoliocount" data-original-title="'.(count($profile->suppliersHasPortfolios)).' Projects Added"  data-toggle="tooltip" data-placement="left">'.(count($profile->suppliersHasPortfolios)).'</span></span>', array( '/supplier/profile',"show"=>"portfolio"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>

								
                                
                            </li>

                            <li class="<?php echo ((count($profile->suppliersHasReferences)>0)?'active':'');  ?>">
                                <?php echo CHtml::ajaxLink( '<span class="text">Past Clients</span><span class="number" ><span class="label label-success  text-white pastclientcount" data-original-title="'.(count($profile->suppliersHasReferences)).' Past Clients Added" data-toggle="tooltip" data-placement="left">'.(count($profile->suppliersHasReferences)).'</span></span>', array( '/supplier/profile',"show"=>"past"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);$("#submenu li").removeClass("active");$(this).addClass("active");}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
                            </li>
                            
                            
                            <li >
								<!-- Hide sample pitch on requirement basis  - Changes by Pratham  -->
                               <?php //echo CHtml::ajaxLink( '<span class="text">Sample Pitch</span>', array( '/supplier/profile',"show"=>"pitch"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("").addClass("loadingcontent");}','success'=>'function(html){ $("#content").html(html).removeClass("loadingcontent");$("#submenu li").removeClass("active");$(this).addClass("active");}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
                            </li>
                            <li >
                                 <?php //echo CHtml::ajaxLink( '<span class="text">Estimate</span>', array( '/supplier/profile',"show"=>"estimate"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);$("#submenu li").removeClass("active");$(this).addClass("active");}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
                            </li>
							<!-- FAQs implementations  -->
							<li class="<?php echo (($profile->is_faq_complete == 1 )?'active':'');?>" >
								<?php echo CHtml::ajaxLink( '<span class="text">FAQ\'s</span>'.(($profile->is_faq_complete ==1)?'<span class="number"><span class="label chk_color"><i class="ico-checkmark"></i></span></span>':''), array( '/supplier/faq',"show"=>"all"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
                                 <!--
							 <a href="javascript:void(0);" data-toggle="submenu" data-target="#faq" data-parent="#components">
                                    <span class="text">FAQs</span>
									<span class="arrow"></span>
                                </a>
                               Hidden on requirement change
								<ul id="faq" class="submenu collapse ">
									<li class="active">
										<?php echo CHtml::ajaxLink( '<span class="text">About</span>', array( '/supplier/faq',"show"=>"about"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
									</li>
									<li >
										<?php echo CHtml::ajaxLink( '<span class="text">Development</span>', array( '/supplier/faq',"show"=>"development"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
									</li>
									<li >
										<?php echo CHtml::ajaxLink( '<span class="text">Terms</span>', array( '/supplier/faq',"show"=>"terms"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
									</li>
									<li>
										<?php echo CHtml::ajaxLink( '<span class="text">Payment</span>', array( '/supplier/faq',"show"=>"payment"), array( 'beforeSend'=>'function(){console.log("sending request");$("#content").html("");}','success'=>'function(html){ $("#content").html(html);}','error'=>'function(a,b,c){$("#content").html("Error Loading url:"+a +" | " + b + " | " +c);}'));?>
									</li>
								   
								</ul>
                                -->

							</li>
							<!-- FAQs implementations  -->
                           
                        </ul>
                        <!--/ END 2nd Level Profile Menu -->
                    </li>
                     
                   
					<!-- Starts RFP section -->
				    <li class="<?php echo (in_array(Yii::app()->controller->action->id,$linkArray)?'active':'');?>">
                        <?php //echo CHtml::link( '<span class="figure"><i class="ico-dollar"></i></span><span class="text">Leads</span><span class="arrow"></span>', array('/supplier/index'));?>
                       <a data-parent="#nav" data-target="#rfps" data-toggle="submenu" href="javascript:void(0);">
									<span class="figure"><i class="ico-dollar"></i></span><span class="text">Leads</span><span class="arrow"></span>
						</a>
                            
                        
                        <!-- START 2nd Level Menu -->
                        <ul id="rfps" class="submenu collapse <?php echo (in_array(Yii::app()->controller->action->id,$linkArray)?'in':'');?>">
                            <li class="<?php echo ((isset($_REQUEST['stat']) && $_REQUEST['stat']==0)?'active':'') ?>">
								<a data-parent="#rfps" data-target="#projectnew" data-toggle="submenu" href="javascript:void(0);">
									<span class="text">New Leads (<?php echo $newProjectCount; ?>)</span>
                                    <!--<span class="number"><span class="label label-danger" data-original-title="<?php //echo $newProjectCount; ?> proposal(s)" data-toggle="tooltip" data-placement="left"><?php //echo $newProjectCount; ?></span></span>-->
                                    <?php echo ($newProjectCount!=0?'<span class="arrow"></span>':''); ?>
                                    
                                   
									
								</a>
								<?php echo $awarded; ?>
                            </li> 
                            <li class="<?php echo (( isset($_REQUEST['stat']) && $_REQUEST['stat']==1)?'active':'') ?>">
								<a data-parent="#rfps" data-target="#projectclarification" data-toggle="submenu" href="javascript:void(0);">
									<span class="text">Seeking Clarification (<?php echo $clarificationCount; ?>)</span>
                                    <!--<span class="number"><span class="label label-danger" data-original-title="<?php //echo $clarificationCount; ?> proposal(s)" data-toggle="tooltip" data-placement="left"><?php //echo $clarificationCount; ?></span></span>-->
                                    <?php echo (($clarificationCount!=0)?'<span class="arrow"></span>':''); ?>
                                    
									
								</a>
								<?php echo $clarification; ?>
                            </li>
							<li class="<?php echo (( isset($_REQUEST['stat']) && $_REQUEST['stat']==2)?'active':'') ?>">
								<a data-parent="#rfps" data-target="#projectpitched" data-toggle="submenu" href="javascript:void(0);">
									<span class="text">Submitted (<?php echo $pitchedCount; ?>)</span>
                                   <!-- <span class="number"><span class="label label-danger" data-original-title="<?php //echo $pitchedCount; ?> proposal(s)" data-toggle="tooltip" data-placement="left"><?php //echo $pitchedCount; ?></span></span>-->
                                    <?php echo (($pitchedCount!=0)?'<span class="arrow"></span>':''); ?>
                                    
									
                                    
								</a>
							<?php echo $pitched ; ?>
	
                            </li>
							<li class="<?php echo (( isset($_REQUEST['stat']) && $_REQUEST['stat']==4)?'active':'') ?>">
								<a data-parent="#rfps" data-target="#projectstarted" data-toggle="submenu" href="javascript:void(0);">
									<span class="text">Accepted (<?php echo $startedCount; ?>)</span>
                                    <!--<span class="number"><span class="label label-danger" data-original-title="<?php //echo $startedCount; ?> proposal(s)" data-toggle="tooltip" data-placement="left"><?php //echo $startedCount; ?></span></span>-->
                                    <?php echo (($startedCount!=0)?'<span class="arrow"></span>':''); ?>
                                    
									
								</a>
								<?php echo $started; ?>
                            </li>
							<li class="<?php echo (( isset($_REQUEST['stat']) && $_REQUEST['stat']==5)?'active':'') ?>">
								<a data-parent="#rfps" data-target="#projectcompleted" data-toggle="submenu" href="javascript:void(0);">
									<span class="text">Jobs Completed (<?php echo $completedCount; ?>)</span>
                                     <!--<span class="number"><span class="label label-danger" data-original-title="<?php //echo $completedCount; ?> proposal(s)" data-toggle="tooltip" data-placement="left"><?php //echo $completedCount; ?></span></span>-->
                                    <?php echo (($completedCount!=0)?'<span class="arrow"></span>':''); ?>
                                   
									
								</a>
								<?php echo $completed; ?>
								
                            </li>
							<li class="<?php echo (( isset($_REQUEST['stat']) && $_REQUEST['stat']==6)?'active':'') ?>">
								<a data-parent="#rfps" data-target="#projectrejected" data-toggle="submenu" href="javascript:void(0);">
									<span class="text">Jobs Archived (<?php echo $rejectedCount; ?>)</span>
                                    <!-- <span class="number"><span class="label label-danger" data-original-title="<?php //echo $rejectedCount; ?> proposal(s)" data-toggle="tooltip" data-placement="left"><?php //echo $rejectedCount; ?></span></span>-->
                                    <?php echo (($rejectedCount!=0)?'<span class="arrow"></span>':''); ?>
                                   
									
								</a>
								
								<?php echo $rejected; ?>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>  
					<!--/ RFP section -->
					
                </ul>
                <!--/ END Template Navigation/Menu -->
            </section>
            <!--/ END Sidebar Container -->
			</div> 
        </aside>
 <!--/ END Template Sidebar (Left) -->
<!--For Menu Scroll Stability-->
