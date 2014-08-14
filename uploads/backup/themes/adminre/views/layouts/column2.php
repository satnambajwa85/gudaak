<!DOCTYPE html>
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>VenturePact</title>
        <meta name="description" content="Adminre admin dashboard">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon.png">
        <!--/ END META SECTION -->
        <!-- START STYLESHEETS -->
        <!-- Library stylesheet : mandatory -->
        
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/css/selectize.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/css/jquery-ui.min.css">
        <!--/ Library stylesheet -->
        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/uielement.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/custom_sa.css">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->
        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/library/modernizr/js/modernizr.min.js"></script>
        <script src="http://brianreavis.github.io/selectize.js/js/selectize.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->
    <body data-page="form-wizard">
        <!-- START Template Header -->
        <?php  $this->Widget('WidgetDashboardTop'); ?>
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
         <?php  $this->Widget('WidgetDashboardMenu'); ?>
       
        <!--/ END Template Sidebar (Left) -->
		<aside class="sidebar sidebar-left sidebar-menu" style="height:611px; background-color:#2a2a2a">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <!-- START Template Navigation/Menu -->
                <ul id="nav" class="topmenu">
                   <!-- <li class="menuheader">MAIN MENU</li>-->
                  
                                    <li <?php if(Yii::app()->controller->id=='admin') {?> class="active" <?php } ?>>
                            <?php echo CHtml::link('<span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Project Details</span>', array('/admin'));
                            
                            ?>    
                        
                    </li> 
                    
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment_1" data-parent="#nav">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">User Management</span>
                            <span class="arrow"></span>
                        </a>
                        <?php if(Yii::app()->controller->id=='users' && (Yii::app()->controller->action->id=='create' || Yii::app()->controller->action->id=='admin'))
						{ ?>
                         
                            <ul id="payment_1" class="submenu collapse in">
                            <?php }else {?>
                             <ul id="payment_1" class="submenu collapse">
					<?php	}?>
                        <!-- START 2nd Level Menu -->
                        
                         <li <?php if(Yii::app()->controller->id=='users' && Yii::app()->controller->action->id=='create') {?> class="active" <?php } ?>>
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Users</span>', array('/admin/users/create'));
                            
                            ?></li>
                        <li <?php if(Yii::app()->controller->id=='users' && Yii::app()->controller->action->id=='admin') {?>  class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Users</span>', array('/admin/users/admin'));
                            
                            ?>
                          </li>
                              
                         </ul>
                      
                        
                        <!--/ END 2nd Level Menu -->
                    </li>
                    
                    
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment" data-parent="#nav">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Client</span>
                            <span class="arrow"></span>
                        </a>
                        <?php if($_GET['r']=='admin/clientProfiles/admin'||$_GET['r']=='admin/clientProjects/admin'||$_GET['r']=='admin/developerTypes/admin'||$_GET['r']=='admin/clientProfiles/create'||$_GET['r']=='admin/clientProjects/create')
						{ ?>
                         
                            <ul id="payment" class="submenu collapse in">
                            <?php }else {?>
                             <ul id="payment" class="submenu collapse">
					<?php	}?>
                              <li>
                            
                             <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-1-2" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Client Profiles</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                        <?php 
						
						if(Yii::app()->controller->id=='clientProfiles' && in_array(Yii::app()->controller->action->id,array('admin','create'))){?>
                        <ul id="payment-1-2" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-1-2" class="submenu collapse">
                        <?php } ?>	
                        	
                          <li <?php if(Yii::app()->controller->id=='clientProfiles' && in_array(Yii::app()->controller->action->id,array('admin'))) {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Client Profiles</span>', array('/admin/clientProfiles/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->                            
                            </li>
                            
                              <li>
                              <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-1-3" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Client Projects</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                        <?php if(Yii::app()->controller->id=='clientProfiles' && in_array(Yii::app()->controller->action->id,array('admin'))) {?>
                        <ul id="payment-1-3" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-1-3" class="submenu collapse">
                        <?php } ?>	
                        
                          <li <?php if(Yii::app()->controller->id=='clientProfiles' && in_array(Yii::app()->controller->action->id,array('admin'))) {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Projects</span>', array('/admin/clientProjects/admin'));
                            
                            ?>
                          </li>
                           <li <?php if(Yii::app()->controller->id=='clientProfiles' && in_array(Yii::app()->controller->action->id,array('create'))) {?> class="" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Projects</span>', array('/admin/clientProjects/create'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
 
                            
                            
                            </li>
                            
                              
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                
                
                
                <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment1" data-parent="#nav">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Suppliers</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
   <?php if($_GET['r']=='admin/SuppliersHasReferences/create'||$_GET['r']=='admin/SuppliersHasReferences/admin'||$_GET['r']=='admin/SuppliersHasPortfolio/create'||$_GET['r']=='admin/SuppliersHasPortfolio/admin'||$_GET['r']=='admin/suppliers/admin'||$_GET['r']=='admin/suppliersProjectsProposals/admin'||$_GET['r']=='admin/developerTypes/admin'||$_GET['r']=='admin/suppliers/create'||$_GET['r']=='admin/suppliersProjectsProposals/create'||$_GET['r']=='admin/developerTypes/create' ||$_GET['r']=='admin/SuppliersHasSkills/admin')
						{ ?>
                        <ul id="payment1" class="submenu collapse in">
                        <?php } else {?>
                        <ul id="payment1" class="submenu collapse">
                        <?php }?>
                            <li>
                            
                             <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-2-1" data-parent="#payment1">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Management</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                       <?php if($_GET['r']=='admin/suppliers/admin'||$_GET['r']=='admin/suppliers/create'||$_GET['r']=='admin/SuppliersHasSkills/admin') {?>
                        <ul id="payment-2-1" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-2-1" class="submenu collapse">
                        <?php } ?>	
                        
                        	<!--<li <?php if($_GET['r']=='admin/suppliers/create') {?> class="active" <?php } ?>>
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Suppliers</span>', array('/admin/suppliers/create'));
                            
                            ?></li> -->
                          <li <?php if($_GET['r']=='admin/suppliers/admin') {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Suppliers</span>', array('/admin/suppliers/admin'));
                            
                            ?>
                          </li>
                           <li <?php if($_GET['r']=='admin/SuppliersHasSkills/admin') {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Suppliers By Skills</span>', array('/admin/SuppliersHasSkills/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                              </li>
                            
                            
                            </li>
                            
                              <li>
                            
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-2-2" data-parent="#payment1">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Suppliers Proposals</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                       <?php if($_GET['r']=='admin/suppliersProjectsProposals/admin'||$_GET['r']=='admin/suppliersProjectsProposals/create') {?>
                        <ul id="payment-2-2" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-2-2" class="submenu collapse">
                        <?php } ?>	
                         <li <?php if($_GET['r']=='admin/suppliersProjectsProposals/create') {?> class="active" <?php } ?>>
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Proposals</span>', array('/admin/suppliersProjectsProposals/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/suppliersProjectsProposals/admin') {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Proposals</span>', array('/admin/suppliersProjectsProposals/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                              </li>
                            </li>
                            
                             <li>
                            
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-2-3" data-parent="#payment1">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">FAQ Answers</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                       <?php if($_GET['r']=='admin/SuppliersFaqAnswers/admin'||$_GET['r']=='admin/SuppliersFaqAnswers/create') {?>
                        <ul id="payment-2-3" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-2-3" class="submenu collapse">
                        <?php } ?>	
                         <li <?php if($_GET['r']=='admin/SuppliersFaqAnswers/create') {?> class="active" <?php } ?>>
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create FAQ Answers</span>', array('/admin/SuppliersFaqAnswers/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/SuppliersFaqAnswers/admin') {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage FAQ Answers</span>', array('/admin/SuppliersFaqAnswers/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                              </li>
                            </li>
                            
                            <li>
                            
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-2-33" data-parent="#payment1">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Supplier References</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                       <?php if($_GET['r']=='admin/SuppliersHasReferences/admin'||$_GET['r']=='admin/SuppliersHasReferences/create') {?>
                        <ul id="payment-2-33" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-2-33" class="submenu collapse">
                        <?php } ?>	
                         <li <?php if($_GET['r']=='admin/SuppliersHasReferences/create') {?> class="active" <?php } ?>>
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Reference</span>', array('/admin/SuppliersHasReferences/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/SuppliersHasReferences/admin') {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage References</span>', array('/admin/SuppliersHasReferences/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                              </li>

                              <li>

                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-2-66" data-parent="#payment1">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Supplier Portfolios</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                       <?php if($_GET['r']=='admin/SuppliersHasPortfolio/admin'||$_GET['r']=='admin/SuppliersHasPortfolio/create') {?>
                        <ul id="payment-2-66" class="submenu collapse in">
			         	<?php } else {?>
                        <ul id="payment-2-66" class="submenu collapse">
                        <?php } ?>
                         <li <?php if($_GET['r']=='admin/SuppliersHasPortfolio/create') {?> class="active" <?php } ?>>
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Portfolio</span>', array('/admin/SuppliersHasPortfolio/create'));

                            ?></li>
                          <li <?php if($_GET['r']=='admin/SuppliersHasPortfolio/admin') {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Portfolio</span>', array('/admin/SuppliersHasPortfolio/admin'));

                            ?>
                          </li>

                         </ul>
                         <!--END 3rd Level Menu -->
                              </li>
                            
                            <!--<li>
                            
                               <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-2-4" data-parent="#payment1">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Developer Types</span>
                            <span class="arrow"></span>
                        </a>
                      
                        <?php if($_GET['r']=='admin/developerTypes/admin'||$_GET['r']=='admin/developerTypes/create') {?>
                        <ul id="payment-2-4" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-2-4" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/developerTypes/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Developers</span>', array('/admin/developerTypes/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/developerTypes/admin') {?> class="active" <?php } ?>>
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Developers</span>', array('/admin/developerTypes/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                
                              </li>-->
                            </li>
                        </ul>
                        
                    </li>
				<!--	 <li> 
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment2" data-parent="#nav">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Projects</span>
                            <span class="arrow"></span>
                        </a>
                       
      <?php if($_GET['r']=='admin/requestsCategory/admin'||$_GET['r']=='admin/currentStatus/admin'||$_GET['r']=='admin/status/admin'||$_GET['r']=='admin/requestsCategory/create'||$_GET['r']=='admin/currentStatus/create'||$_GET['r']=='admin/status/create')
						{ ?>
                        <ul id="payment2" class="submenu collapse in">
                        <?php } else {?>
                        <ul id="payment2" class="submenu collapse">
                        <?php }?>
                          
                            <li>
                            	
                          <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-3-1" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Request Category</span>
                            <span class="arrow"></span>
                        </a>
                    
                         <?php if($_GET['r']=='admin/requestsCategory/admin'||$_GET['r']=='admin/requestsCategory/create') {?>
                        <ul id="payment-3-1" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-3-1" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/requestsCategory/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Category</span>', array('/admin/requestsCategory/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/requestsCategory/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Category</span>', array('/admin/requestsCategory/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         
                              
                              
                    </li>
                    <li>
                      <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-3-2" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Project Process</span>
                            <span class="arrow"></span>
                        </a>
                        
                         <?php if($_GET['r']=='admin/currentStatus/admin'||$_GET['r']=='admin/currentStatus/create') {?>
                        <ul id="payment-3-2" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-3-2" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/currentStatus/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Process</span>', array('/admin/currentStatus/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/currentStatus/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Process</span>', array('/admin/currentStatus/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                      
                    </li>
                     <li>
                      <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-3-3" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Status</span>
                            <span class="arrow"></span>
                        </a>
                      
                         <?php if($_GET['r']=='admin/status/admin'||$_GET['r']=='admin/status/create') {?>
                        <ul id="payment-3-3" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-3-3" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/status/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Status</span>', array('/admin/status/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/status/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Status</span>', array('/admin/status/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                              
                              
                    </li>
               
                   </ul> -->
                     <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment3" data-parent="#nav">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Zones</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        
      <?php if($_GET['r']=='admin/zones/admin'||$_GET['r']=='admin/ZonesHasDeveloperPrice/admin'||$_GET['r']=='admin/countries/admin'||$_GET['r']=='admin/states/admin'||$_GET['r']=='admin/cities/admin'||$_GET['r']=='admin/zones/create'||$_GET['r']=='admin/ZonesHasDeveloperPrice/create'||$_GET['r']=='admin/countries/create'||$_GET['r']=='admin/states/create'||$_GET['r']=='admin/cities/create')
						{ ?>
                        <ul id="payment3" class="submenu collapse in">
                        <?php } else {?>
                        <ul id="payment3" class="submenu collapse">
                        <?php }?>
                        
                            <li>
                            
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-4-1" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Price Zone</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                        <?php if($_GET['r']=='admin/priceZone/admin'||$_GET['r']=='admin/priceZone/create') {?>
                        <ul id="payment-4-1" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-4-1" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/priceZone/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Zones</span>', array('/admin/priceZone/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/priceZone/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Zones</span>', array('/admin/priceZone/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                              
                            
                            </li>
                            
                              <li>
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-4-2" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Price Tier</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php if($_GET['r']=='admin/priceTier/admin'||$_GET['r']=='admin/priceTier/create') {?>
                        <ul id="payment-4-2" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-4-2" class="submenu collapse">
                        <?php } ?>	
                        
                        	<!--<li <?php if($_GET['r']=='admin/priceTier/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Dev Price</span>', array('/admin/priceTier/create'));
                            
                            ?></li>-->
                          <li <?php if($_GET['r']=='admin/priceTier/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Dev Price</span>', array('/admin/priceTier/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                           
                            </li>
                            
                            
                            <li>
                  <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-4-4" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Regions</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php if($_GET['r']=='admin/countries/admin'||$_GET['r']=='admin/countries/create') {?>
                        <ul id="payment-4-4" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-4-4" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/countries/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Region</span>', array('/admin/countries/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/countries/admin') {?> class="active" <?php } ?> >
                            <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Regions</span>', array('/admin/countries/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                           
                            </li>
                            
                            <li>
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-4-5" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Countries</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php if($_GET['r']=='admin/states/admin'||$_GET['r']=='admin/states/create') {?>
                        <ul id="payment-4-5" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-4-5" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/states/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Country</span>', array('/admin/states/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/states/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Countries</span>', array('/admin/states/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                           
                            </li>
                            
                            
                            <li>
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-4-6" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Cities</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php if($_GET['r']=='admin/cities/admin'||$_GET['r']=='admin/cities/create') {?>
                        <ul id="payment-4-6" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-4-6" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/cities/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Cities</span>', array('/admin/cities/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/cities/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Cities</span>', array('/admin/cities/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                           
                            </li>
                              
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>

                 <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment4" data-parent="#nav">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Others</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                         <?php if($_GET['r']=='admin/updateLogs/admin'||$_GET['r']=='admin/emailLogs/admin'||$_GET['r']=='admin/adminLogs/admin'||$_GET['r']=='admin/errorlogs/admin'||$_GET['r']=='admin/callSchedules/admin'||$_GET['r']=='admin/faq/admin'||$_GET['r']=='admin/industries/admin'||$_GET['r']=='admin/log/admin'||$_GET['r']=='admin/notifications/admin'||$_GET['r']=='admin/role/admin'||$_GET['r']=='admin/services/admin'||$_GET['r']=='admin/skills/admin'||$_GET['r']=='admin/callSchedules/create'||$_GET['r']=='admin/faq/create'||$_GET['r']=='admin/industries/create'||$_GET['r']=='admin/log/create'||$_GET['r']=='admin/notifications/create'||$_GET['r']=='admin/role/create'||$_GET['r']=='admin/services/create'||$_GET['r']=='admin/skills/create'||$_GET['r']=='admin/currentStatus/admin'||$_GET['r']=='admin/currentStatus/create')
						{ ?>
                        <ul id="payment4" class="submenu collapse in">
                        <?php } else {?>
                        <ul id="payment4" class="submenu collapse">
                        <?php }?>
     
                            <li>
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-1" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Call Schedules</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php if($_GET['r']=='admin/callSchedules/admin'||$_GET['r']=='admin/callSchedules/create') {?>
                        <ul id="payment-5-1" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-1" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/callSchedules/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Schedules</span>', array('/admin/callSchedules/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/callSchedules/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Schedules</span>', array('/admin/callSchedules/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->    
                              
                            
                            
                            </li>
                             <li>
                      <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-3-2" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Project Process</span>
                            <span class="arrow"></span>
                        </a>
                        
                         <?php if($_GET['r']=='admin/currentStatus/admin'||$_GET['r']=='admin/currentStatus/create') {?>
                        <ul id="payment-3-2" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-3-2" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/currentStatus/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Process</span>', array('/admin/currentStatus/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/currentStatus/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Process</span>', array('/admin/currentStatus/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                      
                    </li>

                              <li>
                            	
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-2" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">FAQ</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php if($_GET['r']=='admin/faq/admin'||$_GET['r']=='admin/faq/create') {?>
                        <ul id="payment-5-2" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-2" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/faq/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create FAQ</span>', array('/admin/faq/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/faq/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage FAQ</span>', array('/admin/faq/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->  
                            </li>
                            
                              <li>
                            	
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-3" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Industries</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                        <?php if($_GET['r']=='admin/industries/admin'||$_GET['r']=='admin/industries/create') {?>
                        <ul id="payment-5-3" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-3" class="submenu collapse">
                        <?php } ?>	
                        	<li <?php if($_GET['r']=='admin/industries/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Industries</span>', array('/admin/industries/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/industries/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Industries</span>', array('/admin/industries/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->  
                            </li>
                            
                            <li>
                            	
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-4" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Log</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php if($_GET['r']=='admin/log/admin'||$_GET['r']=='admin/log/create') {?>
                        <ul id="payment-5-4" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-4" class="submenu collapse">
                        <?php } ?>	
                        	<li <?php if($_GET['r']=='admin/log/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create log</span>', array('/admin/log/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/log/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage log</span>', array('/admin/log/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->  
                            </li>
                      <li>
                      <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-55" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Admin Logs</span>
                            <span class="arrow"></span>
                        </a>
                        
                         <?php if($_GET['r']=='admin/adminLogs/admin') {?>
                        <ul id="payment-5-55" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-55" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/adminLogs/admin') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage AdminLogs</span>', array('/admin/adminLogs/admin'));
                            
                            ?></li>
                              
                         </ul> 
                      
                    </li>
                    <li>
                      <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-75" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Email Logs</span>
                            <span class="arrow"></span>
                        </a>
                        
                         <?php if($_GET['r']=='admin/emaillogs/admin') {?>
                        <ul id="payment-5-75" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-75" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/emaillogs/admin') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage MailLogs</span>', array('/admin/emaillogs/admin'));
                            
                            ?></li>
                              
                         </ul> 
                      
                    </li>
                   <li>
                      <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-76" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Admin Update Logs</span>
                            <span class="arrow"></span>
                        </a>
                        
                         <?php if($_GET['r']=='admin/updatelogs/admin') {?>
                        <ul id="payment-5-76" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-76" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/updatelogs/admin') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage UpdateLogs</span>', array('/admin/updatelogs/admin'));
                            
                            ?></li>
                              
                         </ul> 
                      
                    </li>
                    <li>
                      <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-66" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Error Logs</span>
                            <span class="arrow"></span>
                        </a>
                        
                         <?php if($_GET['r']=='admin/errorLogs/admin') {?>
                        <ul id="payment-5-66" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-66" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/errorLogs/admin') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage ErrorLogs</span>', array('/admin/errorLogs/admin'));
                            
                            ?></li>
                              
                         </ul> 
                      
                    </li>
                        <!--    <li>
                            	
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-5" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Notifications</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php //if($_GET['r']=='admin/notifications/admin'||$_GET['r']=='admin/notifications/create') {?>
                        <!-- <ul id="payment-5-5" class="submenu collapse in">
			         	<?php //} else {?>   
                        <ul id="payment-5-5" class="submenu collapse">
                        <?php //} ?>	
                        	
                          <li <?php //if($_GET['r']=='admin/notifications/admin') {?> class="active" <?php //} ?> >
                          <?php //echo CHtml::link('<span class="figure"></span>
                            // <span class="text">Manage Notifications</span>', array('/admin/notifications/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->  
                           <!-- </li>
                            -->
                            
                        <!--  Roles Disabled  <li>
                            
                     	       <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-6" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Role</span>
                            <span class="arrow"></span>
                        </a>
                        
                      		   <?php if($_GET['r']=='admin/role/admin'||$_GET['r']=='admin/role/create') {?>
                        			<ul id="payment-5-6" class="submenu collapse in">
			         	    	<?php } else {?>   
                       			 <ul id="payment-5-6" class="submenu collapse">
                        <?php } ?>	
                        
                         <li <?php if($_GET['r']=='admin/role/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Role</span>', array('/admin/role/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/role/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Role</span>', array('/admin/role/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                      
                            </li>-->
                            
                            <li>
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-7" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Services</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                         <?php if($_GET['r']=='admin/services/admin'||$_GET['r']=='admin/services/create') {?>
                        <ul id="payment-5-7" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-7" class="submenu collapse">
                        <?php } ?>	
                        	<li <?php if($_GET['r']=='admin/services/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Services</span>', array('/admin/services/create'));
                            ?></li>
                          <li <?php if($_GET['r']=='admin/services/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Services</span>', array('/admin/services/admin'));
                            
                            ?>
                          </li>
                         </ul> 
                         <!--END 3rd Level Menu -->  
                            </li>
                            
                            <li>
                            	
                            <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment-5-8" data-parent="#payment">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Skills</span>
                            <span class="arrow"></span>
                        </a>
                         <!-- START 3rd Level Menu -->
                        <?php if($_GET['r']=='admin/skills/admin'||$_GET['r']=='admin/skills/create') {?>
                        <ul id="payment-5-8" class="submenu collapse in">
			         	<?php } else {?>   
                        <ul id="payment-5-8" class="submenu collapse">
                        <?php } ?>	
                        
                        	<li <?php if($_GET['r']=='admin/skills/create') {?> class="active" <?php } ?> >
                            	<?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Create Skills</span>', array('/admin/skills/create'));
                            
                            ?></li>
                          <li <?php if($_GET['r']=='admin/skills/admin') {?> class="active" <?php } ?> >
                          <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Manage Skills</span>', array('/admin/skills/admin'));
                            
                            ?>
                          </li>
                              
                         </ul> 
                         <!--END 3rd Level Menu -->  
                            </li>
                              
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                
                	 <?php if(!(Yii::app()->user->isGuest)){ ?>
                            	<li>
                                	<a href="javascript:void(0);" data-toggle="submenu" data-parent="#nav">
                           <?php echo CHtml::link('<span class="figure"></span>
                            <span class="text">Log Out</span>', array('/site/logout'));?>
                        </a>
                        
                                </li>
                        	  <?php } ?>
                </ul>
                
                <!--/ END Template Navigation/Menu -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>
        <!-- START Template Main -->
        <section id="main" role="main" style="margin-left:30px;">
        <?php echo $content;?>
        <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
        <aside class="sidebar sidebar-right">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <!-- START Sidebar Profile -->
                <!-- START Panel -->
                <div class="panel">
                    <!-- thumbnail -->
                    <div class="thumbnail">
                        <!-- media -->
                        <div class="media">
                            <!-- meta -->
                            <span class="meta text-center">
                                <h5 class="semibold mb0">Erich Reyes</h5>
                                <p class="nm"><i class="ico-user7 mr5"></i>Administrator</p>
                            </span>
                            <!-- meta -->
                            <!-- indicator -->
                            <div class="indicator"><span class="spinner"></span></div>
                            <!--/ indicator -->
                            <img data-toggle="unveil" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/background/400x250/placeholder.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/image/background/400x250/background3.jpg" alt="Cover" width="100%">
                        </div>
                        <!--/ media -->
                    </div>
                    <!--/ thumbnail -->
                    <!-- panel body -->
                    <div class="panel-body" style="margin-top:-55px;z-index:2;">
                        <ul class="list-unstyled">
                            <li class="text-center">
                                <img class="img-circle" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar7.jpg" alt="" width="75px" height="75px">
                                <br>
                                <!-- dropdown -->
                                <div class="btn-group mt10">
                                    <button type="button" class="btn btn-default"><span class="hasnotification hasnotification-success mr5"></span>Online</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Away</a></li>
                                        <li><a href="#">Offline</a></li>
                                        <li><a href="#">Busy</a></li>
                                    </ul>
                                </div>
                                <!--/ dropdown -->
                            </li>
                        </ul>
                    </div>
                    <!--/ panel body -->
                </div>
                <!--/ END Panel -->
                <!--/ END Sidebar Profile -->

                <!-- START Sidebar contact -->
                <div class="media-list media-list-contact">
                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar1.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Autumn Barker</span>
                            <span class="media-meta ellipsis">Malaysia</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar2.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Giselle Horn</span>
                            <span class="media-meta ellipsis">Bolivia</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Austin Shields</span>
                            <span class="media-meta ellipsis">Timor-Leste</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Caryn Gibson</span>
                            <span class="media-meta ellipsis">Libya</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar3.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Nash Evans</span>
                            <span class="media-meta ellipsis">Honduras</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar4.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Josiah Johnson</span>
                            <span class="media-meta ellipsis">Belgium</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Philip Hewitt</span>
                            <span class="media-meta ellipsis">Bahrain</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar5.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Wilma Hunt</span>
                            <span class="media-meta ellipsis">Dominica</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar6.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Noah Gill</span>
                            <span class="media-meta ellipsis">Guatemala</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar8.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> David Fisher</span>
                            <span class="media-meta ellipsis">French Guiana</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar9.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Samantha Avery</span>
                            <span class="media-meta ellipsis">Jersey</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Madaline Medina</span>
                            <span class="media-meta ellipsis">Finland</span>
                        </span>
                    </a>
                </div>
                <!--/ END Sidebar contact -->
            </section>
            <!--/ END Sidebar Content -->
        </aside>
        <!--/ END Template Sidebar (right) -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui-touch.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/core/js/core.min.js"></script>
        <!--/ Library script -->
       
        <!-- 3rd party plugin script : optional(per use) -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/parsley/js/parsley.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/steps/js/jquery.steps.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/inputmask/js/inputmask.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/scroller.js"></script>
        
        
        <!--/ 3rd party plugin script -->
       
        <!-- app init script -->
        <script type="text/javascript">
            (function($){
                $("html").Core({ "console": false });
				$('.client_dashboard_scoller').enscroll({
					showOnHover: true,
					verticalTrackClass: 'track3',
					verticalHandleClass: 'handle3'
				}); 
            })(jQuery);
        </script>

<script type="text/javascript" defer>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35066643-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
        <!--/ app init script -->
       
        <!--/ END JAVASCRIPT SECTION -->
    </body>
</html>
