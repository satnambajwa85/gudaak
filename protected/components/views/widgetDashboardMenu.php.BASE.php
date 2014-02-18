<?php $path	=	Yii::app()->theme->baseUrl;?>
	<header>
		<div class="logo">
			<?php echo CHtml::link('<img alt="" src="'.$path.'/images/logo.png">',array('/site'));?>
		</div><!-- Logo -->
		<div class="welcome-user">
			<?php echo CHtml::link('<img alt="'.$userinfo->display_name.'" src="'.Yii::app()->baseUrl.'/uploads/user/small/'.$userinfo->image.'">',array('user/'),array('class'=>'userImage'));?>
			<p>Welcome</p>
			<?php echo CHtml::link('<span>'.$userinfo->display_name.'</span>',array('user/'));?>
			<div class="clear"></div>
			<div class="progress">
			  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
				<span class="sr-only">40% Complete (success)</span>
			  </div>
			</div>
			
		</div>
			<div class="clearfix"></div>
			<div class="user-nav">
				<ul>
					<li>
						<?php echo CHtml::Link('<i class="glyphicon glyphicon-user"></i>Profile<span>|</span>',array('user/editProfile'));?>
						
					</li>
					<li><?php echo CHtml::Link('<i class="glyphicon glyphicon-cog"></i>Setting<span>|</span>',array('user/editProfile'));?>
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
if(isset($_REQUEST['id'])){
$getId=$_REQUEST['id'];
}
else{
$getId='';
}
$active='';
$displayCss='';
$activeExplore='';
$activeExploreDisplay='';
$careerActive='';
if($action	==	'tests'||'test'){
	$active ='slidebg';
	$displayCss='style="display:block;"';
	}
if($action	==	'career'||'careerList'||'careerDetails'){
	$active ='';
	$displayCss='style="display:none;"';
	$careerActive='currentLink';
	$activeExplore ='slidebg';
	$activeExploreDisplay='style="display:block;"';
	}
if($action	==	'stream'||'streamList'){
	$active ='';
	$displayCss='';
	$careerActive='';
	$activeExplore ='';
	$activeExploreDisplay='';
	$streamActive='currentLink';
	$stream ='slidebg';
	$StreamDisplay='style="display:block;"';
	
	}


/*if($action	==	'')
	$accActive ='slidebg';
if($action	==	'')
	$accActive ='slidebg';
	if($action	==	'')
	$accActive ='slidebg';*/
		 
?>
					<li><a class="<?php echo $active;?>" title=""><i class="glyphicon glyphicon-record"></i>Acess</a>
						<ul <?php echo $displayCss;?>>
							<?php foreach($tests as $testList){ ?>
							<li><?php echo CHtml::link(''.$testList->title.'',array('user/tests','id'=>$testList->id),array('class'=>($getId==$testList->id)?'currentLink':''))?></li>
							<?php }?>
							<li><a title="" href="#">Detailed Report</a></li>
						</ul>					
					</li>
					<li><a class="<?php echo $activeExplore;?>" title=""><i class="glyphicon glyphicon-eye-open"></i>Explore</a>
						<ul <?php echo $activeExploreDisplay;?>>
							<li><?php echo CHtml::link('Career library',array('user/career'),array('class'=>''.$careerActive.''))?></li>
							<li><?php echo CHtml::link('Online Chat',array('user/liveChat'))?>
							<li><a title="" href="#">Video Clips</a></li>
							<li><a title="" href="#">Articles</a></li>
							
						</ul>
					</li>
					<li><a class="<?php echo $stream;?>" title=""><i class="glyphicon glyphicon-thumbs-up"></i>Stream Preference </a>
						<ul <?php echo $StreamDisplay;?>>
							<li><?php echo CHtml::link('Stream',array('user/stream'),array('class'=>''.$streamActive.''))?></li>
							
						</ul>					
					</li>
					<li><a class="" title=""><i class="glyphicon glyphicon-flag"></i>Finalized Stream </a>
						<ul>
							 
						</ul>					
					</li>
					<li><a class="" title=""><i class="icon-anchor"></i>Suggested Stream </a>
						<ul>
							
						</ul>					
					</li>
					
					
				</ul>
			</div>
		
		
	</header>
	