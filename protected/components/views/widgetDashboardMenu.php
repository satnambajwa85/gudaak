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
					<li><a class="slidebg" title=""><i class="glyphicon glyphicon-record"></i>Acess</a>
						<ul>
							<li><?php echo CHtml::link('Interest Test',array('user/tests','view'=>'Interest'))?></li>
							<li><?php echo CHtml::link('Personality Test',array('user/tests','view'=>'personality'))?></li>
							<li><a title="" href="#">Detailed Report</a></li>
						</ul>					
					</li>
					<li><a class="slidebg" title=""><i class="glyphicon glyphicon-eye-open"></i>Explore</a>
						<ul>
							<li><?php echo CHtml::link('Career library',array('user/career'))?></li>
							<li><?php echo CHtml::link('Online Chat',array('user/liveChat'))?>
							<li><a title="" href="#">Video Clips</a></li>
							<li><a title="" href="#">Articles</a></li>
							
						</ul>
					</li>
					<li><a class="slidebg" title=""><i class="glyphicon glyphicon-thumbs-up"></i>Stream Preference </a>
						<ul>
							<li><a title="" href="cart.html"> Cart Page</a></li>
							<li><a title="" href="billing.html"> Billing Page</a></li>
							<li><a title="" href="order-recieved.html"> Order Recieved</a></li>
						</ul>					
					</li>
					<li><a class="slidebg" title=""><i class="glyphicon glyphicon-flag"></i>Finalized Stream </a>
						<ul>
							<li><a title="" href="cart.html"> Cart Page</a></li>
							<li><a title="" href="billing.html"> Billing Page</a></li>
							<li><a title="" href="order-recieved.html"> Order Recieved</a></li>
						</ul>					
					</li>
					<li><a class="slidebg" title=""><i class="icon-anchor"></i>Suggested Stream </a>
						<ul>
							<li><a title="" href="cart.html"> Cart Page</a></li>
							<li><a title="" href="billing.html"> Billing Page</a></li>
							<?php echo CHtml::ajaxLink('<span>|</span>',array('user/editProfile'));?>
						
							<li><a title="" href="order-recieved.html"> Order Recieved</a></li>
						</ul>					
					</li>
					
					
				</ul>
			</div>
		
		
	</header>
	