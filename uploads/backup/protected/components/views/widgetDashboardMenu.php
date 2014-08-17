<aside class="sidebar sidebar-left sidebar-menu">
<div id="scrollbox6" style="overflow:hidden">
<!-- START Sidebar Content -->
<section class="content">
    <!-- START Template Navigation/Menu -->
    <ul id="nav" class="topmenu">
        <li <?php echo (Yii::app()->controller->action->id =='index')?'class="active"':'';?>>
            <?php echo CHtml::link('<span class="figure"><i class="ico-home2"></i></span><span class="text">Dashboard</span><span class="number"><span class="label label-danger"></span></span>', array('/client/index'));?>
        </li>
        <?php foreach($projects as $project){?>
        <li class="menuheader" id="nameT-<?php echo $project->id;?>"><?php echo $project->name;?></li>
        <li class="scoleMain <?php echo (Yii::app()->controller->action->id =='project' && isset($_REQUEST['id']) && $_REQUEST['id']==$project->id)?'active':'';?>" >
           <!-- <a href="javascript:void(0);" data-toggle="submenu" data-target="#Scope<?php echo $project->id;?>" data-parent="#nav">
                <span class="figure"><i class="ico-lightbulb"></i></span>
                <span class="text">Job Scope</span>
            <?php //echo ($project->other_status==4)?'<span class="number"><span class="label chk_color"><i class="ico-checkmark"></i></span></span>':'';?>
                <span class="arrow"></span>
            </a>-->
            <?php $arrow	=	($project->other_status==4)?'<span class="number"><span class="label chk_color"><i class="ico-checkmark"></i></span></span>':'';?>
            <?php echo CHtml::ajaxLink('<span class="figure"><i class="ico-lightbulb"></i></span>
                <span class="text">Job Scope</span>'.$arrow, array('/client/basic','id'=>$project->id),array('success'=>'function(html){
                        $("#content").html(html);
                        $("#nav li").each(function(){$(this).removeClass("active");});
                        $("#Basic'.$project->id.'").parent().addClass("active");
             }'),array('id'=>'Basic'.$project->id));?>
            
            
            
            
            
            
            <!-- START 2nd Level Menu -->
            <!--<ul id="Scope<?php echo $project->id;?>" class="submenu collapse <?php echo (Yii::app()->controller->action->id =='project'  && isset($_REQUEST['id']) && $_REQUEST['id']==$project->id)?'in':'';?>">
                <li id="Basic<?php echo $project->id;?>"  class="<?php echo ($project->other_status >=1)?'active':'';?> <?php echo (Yii::app()->controller->action->id =='project'  && isset($_REQUEST['id']) && $_REQUEST['id']==$project->id)?'activeLink':'';?>">
                <?php echo CHtml::ajaxLink('<span class="text">Basic</span>', array('/client/basic','id'=>$project->id),array('success'=>'function(html){
                        $("#content").html(html);
                        $(".scoleMain").each(function(){
                            $(this).removeClass("active");
                        });
                        $("#Basic'.$project->id.'").parent().parent().addClass("active");
                        $("#Basic'.$project->id.'").addClass("activeLink");
						
            }'));?>
                </li>
                
            </ul>-->
            <!--/ END 2nd Level Menu -->
        </li>
        <?php if(Yii::app()->controller->action->id !='pitch' && Yii::app()->controller->action->id !='compare'){?>
        <li>
            <?php 
            $cumt	=	0;
            foreach($project->suppliersProjectsProposals as $pr){
                if(in_array($pr->status,array(1,2,3,4,5)))
                    $cumt = $cumt+1;
            }
            $mesg	=	($cumt>0)?'<span class="arrow"></span>':'';
            echo CHtml::link('<span class="figure"><i class="ico-file6"></i></span><span onclick="menuscroll(this)" class="text">Proposals '.(($cumt>0)?'('.$cumt.')':'').'</span>'.$mesg, array('/client/compare','id'=>$project->id), array('success'=>'function(html){ $("#content").html(html);}'));?>
        </li>
        <?php }
        elseif(Yii::app()->controller->action->id =='compare'){?>
        <li <?php echo ($project->id==$_REQUEST['id'])?'class="active"':'';?>>
            <?php 
            $cumt	=	0;
            foreach($project->suppliersProjectsProposals as $pr){
                if(in_array($pr->status,array(1,2,3,4,5)))
                    $cumt = $cumt+1;
            }
            //$mesg	=	($cumt>0)?'<span class="number"><span class="label label-danger">'.$cumt.'</span></span><span class="arrow"></span>':'';
            $mesg	=	($cumt>0)?'<span class="arrow"></span>':'';
            echo CHtml::link('<span class="figure"><i class="ico-file6"></i></span><span onclick="menuscroll(this)" class="text">Proposals '.(($cumt>0)?'('.$cumt.')':'').'</span>'.$mesg, array('/client/compare','id'=>$project->id), array('success'=>'function(html){ $("#content").html(html);}'));?>
            <?php if(count($project->suppliersProjectsProposals)>0){?>
            <!-- START 2nd Level Menu -->
            <ul id="proposal<?php echo $project->id;?>" class="submenu collapse <?php echo ($project->id==$_REQUEST['id'])?'in':'';?>" >
                <?php foreach($project->suppliersProjectsProposals as $company)
                    if(in_array($company->status,array(1,2,3,4,5))){?>
                <li <?php echo ($company->id==$_REQUEST['id'])?'class="active"':'';?>>
                    <a href="javascript:void(0);" data-toggle="submenu" data-target="#subsubmenu<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>" data-parent="#3rdlvl2">
                        <span class="text"><?php echo $company->suppliers->name;?></span>
                        <span class="number"><span class="label label-primary projectmessagecount" data-original-title="no unread messages(s)" data-toggle="tooltip" data-placement="left" data-pid="<?php echo $company->id;?>"></span></span>
                        <span class="arrow"></span>
                    </a>
                    <!-- START 4th Level Menu -->
                    <ul id="subsubmenu<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>" class="submenu collapse <?php echo ($company->id==$_REQUEST['id'])?'in':'';?>">
                        <li id="Profile<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>"  <?php echo ($company->id==$_REQUEST['id'])?'class="active"':'';?>>
                            <?php echo CHtml::link('<span class="text">Pitch</span>', array('/client/pitch','id'=>$company->id,'pid'=>$company->client_projects_id));?>
                        </li>
                        <li id="Portfolio<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>">
                            <?php echo CHtml::ajaxLink('<span class="text">Portfolio</span>', array('/client/portfolio','id'=>$company->suppliers_id), array('success'=>'function(html){ $("#content").html(html);
							var $parentUL	=	$("#Portfolio'.$project->id.'_'.$company->suppliers->id.'").parent().parent().parent().parent();
							$parentUL.find("li").each(function(){$(this).removeClass("active");});
							$("#Portfolio'.$project->id.'_'.$company->suppliers->id.'").addClass("active");
							$("#Portfolio'.$project->id.'_'.$company->suppliers->id.'").parent().parent().addClass("active");}'));?>
                        </li>
                        <li id="FAQ<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>">
                            <?php echo CHtml::ajaxLink('<span class="text">FAQs</span>', array('/client/faq','id'=>$company->suppliers_id), array('success'=>'function(html){ $("#content").html(html);
							var $parentUL	=	$("#FAQ'.$project->id.'_'.$company->suppliers->id.'").parent().parent().parent().parent();
							$parentUL.find("li").each(function(){$(this).removeClass("active");});
							$("#FAQ'.$project->id.'_'.$company->suppliers->id.'").addClass("active");
							$("#FAQ'.$project->id.'_'.$company->suppliers->id.'").parent().parent().addClass("active");
							}'));?>
                        </li>
                    </ul>
                </li>
                <?php }?>
            </ul>
            <!--/ END 2nd Level Menu -->
            <?php }?>
        </li>
        <?php }
        elseif(Yii::app()->controller->action->id =='pitch'){?>
        <li <?php echo (isset($_REQUEST['pid']) && $project->id==$_REQUEST['pid'])?'class="active"':'';?>>
            <?php 
            $cumt	=	0;
            foreach($project->suppliersProjectsProposals as $pr){
                if(in_array($pr->status,array(1,2,3,4,5)))
                    $cumt = $cumt+1;
            }
            $mesg	=	($cumt>0)?'<span class="arrow"></span>':'';
            echo CHtml::link('<span class="figure"><i class="ico-file6"></i></span><span onclick="menuscroll(this)" class="text">Proposals '.(($cumt>0)?'('.$cumt.')':'').'</span>'.$mesg, array('/client/compare','id'=>$project->id), array('success'=>'function(html){ $("#content").html(html);}'));?>
            <?php if(count($project->suppliersProjectsProposals)>0){?>
            <!-- START 2nd Level Menu -->
            <ul id="proposal<?php echo $project->id;?>" class="submenu collapse <?php echo (isset($_REQUEST['pid']) && $project->id==$_REQUEST['pid'])?'in':'';?>" >
                <?php foreach($project->suppliersProjectsProposals as $company)
                    if(in_array($company->status,array(1,2,3,4,5))){?>
                <li <?php echo ($company->id==$_REQUEST['id'])?'class="active"':'';?>>
                    <a href="javascript:void(0);" data-toggle="submenu" data-target="#subsubmenu<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>" data-parent="#3rdlvl2">
                        <span class="text"><?php echo $company->suppliers->name;?></span>
                        <span class='number'>
                            <span class='label label-primary projectmessagecount' data-original-title="no unread messages(s)" data-toggle="tooltip" data-placement="left" data-pid="<?php echo $company->id;?>"></span>
                        </span>
                        <span class="arrow"></span>
                    </a>
                    <!-- START 4th Level Menu -->
                    <ul id="subsubmenu<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>" class="submenu collapse <?php echo ($company->id==$_REQUEST['id'])?'in':'';?>">
                        <li id="Profile<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>"  <?php echo ($company->id==$_REQUEST['id'])?'class="active"':'';?>>
                            <?php echo CHtml::link('<span class="text">Pitch</span>', array('/client/pitch','id'=>$company->id,'pid'=>$company->client_projects_id));?>
                        </li>
                        <li id="Portfolio<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>">
                        <?php echo CHtml::ajaxLink('<span class="text">Portfolio</span>', array('/client/portfolio','id'=>$company->suppliers_id), array('success'=>'function(html){ $("#content").html(html);
							var $parentUL	=	$("#Portfolio'.$project->id.'_'.$company->suppliers->id.'").parent().parent().parent().parent();
							$parentUL.find("li").each(function(){$(this).removeClass("active");});
							$("#Portfolio'.$project->id.'_'.$company->suppliers->id.'").addClass("active");
							$("#Portfolio'.$project->id.'_'.$company->suppliers->id.'").parent().parent().addClass("active");
						}'));?>
                        </li>
                        <li id="FAQ<?php echo $project->id;?>_<?php echo $company->suppliers->id;?>">
                        <?php echo CHtml::ajaxLink('<span class="text">FAQs</span>', array('/client/faq','id'=>$company->suppliers_id), array('success'=>'function(html){ $("#content").html(html);
							var $parentUL	=	$("#FAQ'.$project->id.'_'.$company->suppliers->id.'").parent().parent().parent().parent();
							$parentUL.find("li").each(function(){$(this).removeClass("active");});
							$("#FAQ'.$project->id.'_'.$company->suppliers->id.'").addClass("active");
							$("#FAQ'.$project->id.'_'.$company->suppliers->id.'").parent().parent().addClass("active");
						}'));?>
                        </li>
                    </ul>
                </li>
                <?php }?>
            </ul>
            <!--/ END 2nd Level Menu -->
            <?php }?>
        </li>
        <?php } 
        } 
        if(count($references)>0){
        ?>
        <li <?php echo (Yii::app()->controller->action->id =='references')?'class="active"':'';?>>
            <a href="javascript:void(0);" data-toggle="submenu" data-target="#Scope" data-parent="#nav">
                <span class="figure"><i class="ico-quill2"></i></span>
                <span class="text">Feedback</span>
                <span class="arrow"></span>
            </a>
            <!-- START 2nd Level Menu -->
            <ul id="Scope" class="submenu collapse <?php echo (Yii::app()->controller->action->id =='references')?'in':'';?>">
            <?php
            if(count($references)>0)
                foreach($references as $reference){?>
                <li <?php echo (isset($_REQUEST['id']) && $reference->id ==$_REQUEST['id'])?'class="active"':'';?>>
            <?php echo CHtml::link('<span class="text">'.$reference->suppliers->first_name.'</span>',array('/client/references','id'=>$reference->id));?>
                </li>
                <?php } ?>
            </ul>
            <!--/ END 2nd Level Menu -->
        </li>
        <?php } ?>
        
    </ul>
    <!--/ END Template Navigation/Menu -->
</section>
<!--/ END Sidebar Container -->
</div>
</aside>
<!--For Menu Scroll Stability-->

