	<div class="row col-md-10 margint mar0">
		<div class="mr0  col-md-12 color-light-green">
			<div class="mr0  pull-left middle-format-left">
				<h1 class="pull-left" style="color:#fff;"><i class="icon-comment-alt">&nbsp;</i>Online Chat</h1>
			</div>
			<form class="pull-right">
					<input type="text" placeholder="Search here.." class="search-box">
					<input type="submit" class="search-submit pull-left" value="" >
			</form>
			
		</div>
		<div class="clear"></div>
		<div class="gray  border fl">
			<div class="col-md-3 pull-left chat-left-area">
				<ul id="tabs">
					 <li><a href="#all">All</a></li>
					<li><a href="#online">Online</a></li>
					<li><a href="#offline">Offline</a></li>
					
				</ul>
				<div id="all" class="row tab-section">
					
					<div class="mt10 fl all-bot-link">
						<aside>
							<i class="glyphicon glyphicon-comment pull-left orange"></i>
							<h2 class="recent-hedding pull-left recent">Recent</h2>
							<ul id="recent-activity">
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
							</ul>
						</aside>
						
						<aside>
							<i class="glyphicon glyphicon-book pull-left orange"></i>
							<h2 class="recent-hedding pull-left contacts">contacts</h2>
							<ul id="contact-list">
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
							</ul>
						</aside>
						<aside>
							<i class="icon-time pull-left orange"></i>
							<h2 class="	recent-hedding pull-left history">history</h2>
							<ul id="recent-history">
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
							</ul>
						</aside>
					</div>
					<div class="clear"></div>
					
				</div>
				<div id="online" class="tab-section">
					<aside>
							
							<ul id="online-activity">
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left active-user"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
							</ul>
						</aside>
				</div>
				<div id="offline" class="tab-section">
					<aside>
							
							<ul id="online-activity">
								<li>
									<i class="icon-circle pull-left deactive"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left deactive"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
								<li>
									<i class="icon-circle pull-left deactive"></i>
									<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/></a>
									<a href="">Jagraj Singh</a>
								</li>
							</ul>
						</aside>
				</div>
			</div>
			
			<div class="col-md-9 pull-right chat-right-area">
				<div class="row">
					<div class="col-md-6 live-chat">
						<a href="#" class="pull-left">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.png"/>
						</a>
						<a href="#"><h3>Demo Name</h3></a>
						<span>19 years old India</span><br/>
						<i class="icon-circle active"></i>
						Online
					</div>
					<div class="col-md-6">
						<span class="pull-right add-heading">Add you friends and career experts</span>
						<?php echo CHtml::ajaxButton('Add to Contacts',array(''),array('update'=>''),array('class'=>'btn btn-warning pull-right'));?>
					</div>
				</div>
				<div class="row bg-white pdt10">
					<div class="col-md-12">
						<h1 class="user-name">Demo Name</h1>
						<p class="user-message pull-left pdt10">hiiiiiiiiii</p>
						<time class="time pull-right">21-Dec-2013-6:45PM</time>
						<div class="clear"></div>
						<p class="user-message pdt10 pull-left">hiiiiiiiiii</p>
						<time class="time pull-right">6:45PM</time>
					</div>
					
				</div>
				<div class="row bg-brown pdt10">
					<div class="col-md-12">
						<h1 class="user-name2">Demo Name</h1>
						<p class="user-message pdt10 pull-left">hiiiiiiiiii</p>
						<time class="time pull-right">6:45PM</time>
						<div class="clear"></div>
						<p class="user-message pdt10 pull-left">hiiiiiiiiii</p>
						<time class="time pull-right">6:45PM</time>
					</div>
				
					
				</div>
				<div class="row bg-white pdt10">
					<div class="col-md-12">
						
					</div>
					
				</div>
				<div class="row text-form">
					
						<textarea placeholder="Enter your message here..." class="mess-text">
							
						</textarea> 
						<?php echo CHtml::ajaxButton('Send',array(''),array('update'=>''),array('class'=>'btmar btn btn-warning pull-right'));?>
						
				</div>
			</div>
			
		</div>
		
	</div>
	
					<div class="news pd0 pull-right">
					<?php  $this->Widget('WidgetNews'); ?>
				</div>
			