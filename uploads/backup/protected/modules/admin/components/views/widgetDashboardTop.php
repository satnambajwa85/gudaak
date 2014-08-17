<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/firebase.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/firechat.js"></script>
<script type="text/javascript">var token 		= "<?php echo $token; ?>";</script>
<header id="header" class="navbar navbar-fixed-top" > 
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <?php echo CHtml::link('<span class="template-logo"></span>', array('/admin/users/admin'),array('class'=>"navbar-brand"));?>
                <!--/ Brand -->
            </div>
            <!--/ END navbar header -->

            <!-- START Toolbar -->
            <div class="navbar-toolbar clearfix">
                <!-- START Left nav -->
                <ul class="nav navbar-nav navbar-left">
                    <li class="navbar-main hidden-lg hidden-md">
                        <a href="javascript:void(0);" data-toggle="offcanvas" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-left3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas left -->

                    <!-- Message dropdown -->
                    <li class="dropdown custom">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bubbles2"></i></span>
                            </span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Messages</span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- Message list -->
                                <div class="media-list" id="chatmessages">
                                	
									<?php 
									if(count($messages)>0){
									foreach($messages as $message){?>
                                    <a href="page-message-rich.html" class="media border-dotted">
                                        <!--<span class="pull-left">
                                            <img src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar6.jpg" class="media-object img-circle" alt="">
                                        </span>-->
                                        <span class="media-body">
                                            <span class="media-heading">Arthur Abbott </span>
                                            <span class="media-text ellipsis nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-star6"></i></span>
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">2m</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>
                                    <?php }
									}else{?>
										<div class="col-md-11" style="margin-left:3%; margin-top:39%;">
											<div class="alert alert-dismissable alert-danger">
												<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
												You have no message yet. Add a new job to get in touch with service providers. 
											</div>
										</div>
									<?php }?>

                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Message dropdown -->

                    <!-- Notification dropdown -->
                    
                   
                </ul>
                <!--/ END Left nav -->

                <!-- START navbar form -->
                <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                        <div class="has-icon">
                            <input type="text" class="form-control" placeholder="Search application...">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                </div>
                <!-- START navbar form -->
                <!-- START Right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Profile dropdown -->
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="text hidden-xs hidden-sm">Need Help? Call Us</span>
                            </span>
                        </a>
                        <ul role="menu" class="dropdown-menu" style="min-width:170px">
                            <li>
                            	


                        <div class="col-sm-12 pa5">
                            <div style="" class="media-object col-sm-3 pl0 pr0 ">
                                                        <img width="35px;" height="35px;" src="https://pbs.twimg.com/profile_images/440736745680674816/d-eZyq7M_400x400.jpeg" class="img-circle" alt="">
                                                    </div>
                            
                            <div class="media-body col-sm-9 pl0 pr0" style="">
                                                        <span class="media-heading semibold">Saket</span><br>
                                                        <span class="media-meta ellipsis text-default f_s11 semibold">Client Success Team</span><br>
<!--                                                        <span class="media-meta ellipsis text-primary f_s11 semibold"  href="/index.php?r=site/login">Schedule a Call</span><br>-->

                                <script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
<div style="display:none;"><script id="hideScript">var hideButton = new timelyButton('vp', { buttonId: 'hideScript' });</script></div>
<a href="#" onclick="hideButton.start();">Schedule a Call</a>
                                
<!--                                <span class="media-meta ellipsis text-primary f_s11 semibold"  href="#" onclick="hideButton.start();">Book now</span><br>-->
                                
                                                        <span class="media-meta ellipsis text-default f_s11 semibold">or Call Us: 949.791.7659</span><br>
                                                    </div>
                            </div>
                            </li>
                            

                            <!--<li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>-->
                        </ul> 
                    </li>
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
							<?php
							
							$imag	=	Yii::app()->baseUrl.'/uploads/client/small/avatar.png';?>
							
                            <span class="avatar">
								<img src="<?php echo (strpos($imag,'avatar.png'))?$imag:$imag;?>" class="img-circle" alt="" height= "35px" width="150px" />
							</span>
                            <span class="text hidden-xs hidden-sm"><?php echo ((isset($profile->first_name))?$profile->first_name:'').' '.((isset($profile->last_name))?$profile->last_name:'');?></span>
                                <span class="arrow"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?php echo CHtml::link('<span class="icon"><i class="ico-user-plus2"></i></span>My Account', array('account'));?></li>
                            <li class="divider"></li>
                            <li><?php echo CHtml::link('<span class="icon"><i class="ico-exit"></i></span> Sign Out', array('/site/logout'));?></li>
                            <!--<li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>-->
                        </ul>
                    </li>
                    <!--/ Profile dropdown -->
                </ul>
                 
                <!--/ END Right nav -->
            </div>
           
            <!--/ END Toolbar / link -->
        </header>


