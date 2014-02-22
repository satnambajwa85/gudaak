<?php $path	=	Yii::app()->theme->baseUrl;?>
	<header>
		<div class="logo">
			<?php echo CHtml::link('<img alt="" src="'.$path.'/images/dashboard-logo.png">',array('/site'));?>
		</div><!-- Logo -->
		<div class="welcome-user">
			<?php echo CHtml::link('<img alt="'.$userinfo->first_name.' '.$userinfo->last_name.'" src="'.Yii::app()->baseUrl.'/uploads/user/small/'.$userinfo->image.'">',array('user/'),array('class'=>'userImage'));?>
			<p>Welcome</p>
			<?php echo CHtml::link('<span>'.$userinfo->first_name.' '.$userinfo->last_name.'</span>',array('user/'));?>
			<div class="clear"></div>
			<div class="progress fl ">
			  <div style="width:<?php echo $completeProfile;?> !important;" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			  </div>
			  <span class="sr-only"> <span>
			
			</div>
			  <span class="tolal-process"><?php echo $completeProfile;?> </span>
			<span class="progress-title">Profile Completion</span>
			
		</div>
			<div class="clearfix"></div>
			<div class="user-nav">
				<ul>
					<li class="border-right">
						<?php echo CHtml::Link('<i class="glyphicon glyphicon-user"></i>Profile','javaScript:void(0);',array('class'=>'profile-details'));?>
						
					</li>
					<li class="border-right"><?php echo CHtml::Link('<i class="glyphicon glyphicon-cog"></i>Setting',array('user/changePassword'));?>
				 	</li>
					<li><?php echo CHtml::Link('<i class="glyphicon glyphicon-off"></i>Logout',array('site/logout'));?>
					 
					</li>
				</ul>
			</div>
			<div class="side-navigation">
				<h4>My Progress</h4>
				<ul>
					<?php
$action	=	Yii::app()->controller->action->id;
$getId='';
if(isset($_REQUEST['id'])){
$getId=$_REQUEST['id'];
}
		 
?>
					<li><?php echo CHtml::link('<i class="icon-desktop"></i>Orientation Tour',array('user/index'),array('title'=>'Acess','class'=>''.($action=='index')?'slidebg':''.''))?>
					</li>
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-record"></i>Acess',array('user/tests'),array('title'=>'Acess','class'=>''.($action=='tests')?'slidebg':''.''))?>
				
				
						<ul style="<?php echo ($action=='tests'||$action=='DetailedReport')?'display:block':'';?>">
							 
						<!--<li><?php //echo CHtml::link('Tests',array('user/tests'),array('class'=>''.($action=='tests')?'currentLink':''.''))?></li>-->
							 
							<li><?php echo CHtml::link('Detailed Report',array('user/DetailedReport'))?></li>
						</ul>					
					</li>
					<?php if(Yii::app()->user->id && Yii::app()->user->userType=='upper11th'){?>
					<li><?php  echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>Explore',array('user/explore'),array('title'=>'Explore','class'=>''.($action=='career'|| $action == 'liveChat' || $action == 'careerList' || $action == 'explore' || $action =='articlesList')?'slidebg':''.''))?>
					
					
						<ul style="<?php echo ($action=='career'||$action=='liveChat' || $action=='explore' || $action=='careerList' || $action=='articlesList')?'display:block':'';?>">
							<li><?php echo CHtml::link('Career library',array('user/career'),array('class'=>''.($action == 'career' || $action ==  'careerList' || $action ==  'careerDetails')?'currentLink':''.''))?></li>
							<!--<li><?php //echo CHtml::link('Online Chat',array('user/liveChat'),array('class'=>''.($action=='liveChat')?'currentLink':''.''));?></li>--> 	
							<li><?php echo CHtml::link('Articles',array('user/articlesList'),array('class'=>''.($action=='articlesList')?'currentLink':''.''));?></li>
							
							
						</ul>
					</li>
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-thumbs-up"></i>Career Preference',array('user/careerPreference'),array('title'=>'Career Preference','class'=>''.($action=='careerPreference')?'slidebg':''.''))?>
						 					
					</li>
					<?php } else { ?>
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>Explore',array('user/streamExplore'),array('title'=>'Explore','class'=>''.($action=='streamList'|| $action=='streamExplore'|| $action == 'stream' || $action =='articlesList')?'slidebg':''.''))?>
					
					
						<ul style="<?php echo ($action=='streamList'|| $action == 'stream' || $action == 'streamPreference' || $action =='articlesList')?'display:block':'';?>">
							<li><?php echo CHtml::link('Stream Library',array('user/streamList'),array('class'=>''.($action == 'streamList' || $action ==  'stream' )?'currentLink':''.''))?></li>
							<li><?php echo CHtml::link('Articles',array('user/articlesList'),array('class'=>''.($action=='articlesList')?'currentLink':''.''));?></li>
							
							
						</ul>
					</li>
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-thumbs-up"></i>Stream Preference',array('user/streamPreference'),array('title'=>'Career Preference','class'=>''.($action=='streamPreference')?'slidebg':''.''))?>
						 					
					</li>
					<?php } ?>
					
				
					<?php if(Yii::app()->user->id && Yii::app()->user->userType=='upper11th'){?>
					<li>
						<?php echo CHtml::link('<i class="glyphicon glyphicon-flag"></i>Finalized Career',array('user/finalizedCareer'),array('class'=>''.($action=='finalizedCareer')?'slidebg':''.''));?>
					
					</li>
							<li><?php echo CHtml::link('<i class="icon-location-arrow"></i>Approach',array('user/exploreColleges'),array('class'=>''.($action=='exploreColleges' ||$action=='shortListedColleges'||$action=='application')?'slidebg':''.''));?>
					
						
						<ul style="<?php echo ($action=='shortListedColleges'||$action=='exploreColleges' || $action=='application')?'display:block':'';?>">
						
							<li><?php echo CHtml::link('Shortlisted Colleges',array('user/shortListedColleges'));?></li>
							<li><?php echo CHtml::link('Application Progress',array('user/application'));?></li>
						</ul>
					</li>
					<?php }else{ ?>
					<li>
						<?php echo CHtml::link('<i class="glyphicon glyphicon-flag"></i>Finalized Stream',array('user/finalizedStream'),array('class'=>''.($action=='finalizedStream')?'slidebg':''.''));?>
					
					</li>
					<?php } ?>
					
				</ul>
			</div>
		
		
	</header>
	