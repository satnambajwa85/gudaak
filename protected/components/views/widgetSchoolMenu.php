<?php $path	=	Yii::app()->theme->baseUrl;?>
<!-- Static navbar -->
		 <section class="navbar navbar-default mr0 pd0 backskyblue ">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		         
		        </div>
		        <div class="pd0 navbar-collapse collapse">
					<!-- Logo -->
		          	<div class="logo2 col-md-2">
	
						<?php echo CHtml::link('<img alt="" src="'.$path.'/images/dashboard-logo.png">',array('/site'));?>
					</div><!-- Logo -->
					<!-- start Navigation -->
					<div class="col-md-10  pull-left">
						<div class="col-md-12 fl pd0">
							<div class="col-md-4 pd0 pull-left">
								<h1 class="crumb-title">School Admin-
										<?php if(isset($this->breadcrumbs)):?>
											<?php $this->widget('zii.widgets.CBreadcrumbs', array(
												'links'=>$this->breadcrumbs,
											)); ?><!-- breadcrumbs -->
										<?php endif?>
								</h1>
							</div>
							<div class="pd0 col-md-8 pull-left top-nav-section">
								<ul class="nav pull-left ">
									<li class="<?php echo (Yii::app()->controller->action->id=='studentDetail' || Yii::app()->controller->action->id=='studentDetails')?'pull-left active-link':'pull-left'?>">
										<i class="pull-left mar-top10 icon-microphone icon-top"></i>
											<?php echo CHtml::link('Student Details',array('school/studentDetails'),array('class'=>'pull-left'));?>
											
									</li>
									<li class="<?php echo (Yii::app()->controller->action->id=='profile')?'pull-left active-link':'pull-left'?>">
										<i class="pull-left mar-top10 icon-microphone icon-top"></i>
										<?php echo CHtml::link('School Profile',array('school/profile'),array('class'=>'pull-left'));?>
											
										
											
									</li>
								</ul>
								<div class="pd0 pull-left col-md-6 ">
											<div class="pd0 col-md-12 pull-left">
												<div class="welcome-school  col-md-9">
											<?php 
													$filename = ''.$schoolInfo->images 	.'';
													 $path=Yii::getPathOfAlias('webroot.uploads.user.small') . '/';
													$file=$path.$filename;
													if (file_exists($file)){ ?>
														<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/user/small/noimage.jpg"/>',array('school/'),array('class'=>'userImage pull-left'));?>
												
												 <?php 	}else{ ?>
													<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/user/small/noimage.jpg"/>',array('school/'),array('class'=>'userImage pull-left'));?>
												
											<?php } ?>
														
												
													<span>Welcome</span>
													<h3><?php echo $schoolInfo->name;?></h3>
												</div>
												
											 
												<div class="pd0 br-left col-md-3  pull-left">
																	
												<?php echo CHtml::link('Logout',array('site/logout'),array('class'=>'schoo-bt-color btn pull-right'));?>
												</div>
											
											</div>
											
								</div>
							</div>
						</div>
					</div>
				   <!-- end Navigation -->
		         
				 
		        </div><!--/.nav-collapse -->
		 
		</section>
	