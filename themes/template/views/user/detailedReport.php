<?php $this->pageTitle=Yii::app()->name . ' - Detailed Report';
$this->breadcrumbs=array('Detailed Report'=>array('/user/detailedReport'));?>
<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Detailed Report </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			<?php if(isset($reports)){?>
					<?php echo CHtml::link('Download PDF',array('user/DetailedReport&download=1'),array('target'=>'_blank','class'=>'btn btn-info2 center-bt fr'))?>
			<?php }else{
			
			} ?>
			</div>
		<div class="col-md-12 pull-left br-all inner-padding">
			<div id="scrollBar" style="max-height:490px;width:97%;">
			<div class="wrapper">
			<div class="summary-report-title1">Profile Summary&nbsp;
				<div class="report-log-img"><img alt="" src="./image/small.jpg"></div>                    
			</div>
			
    				<div class="w100" >
					<div class="user-report-info col-md-12 pull-left report-border pd0">
						<div class="col-md-6  pull-left left-section pd0">
							<ul>
								<li>Name</li>
								<li>Class</li>
								<li>School</li>
								<li>Gudaak ID</li>
                                <?php if(isset($userTestDate->add_date)){?>
								<li class="lastRow">Test Completed On</li>
								<?php } ?>
							</ul>
						</div>	
						<div class="col-md-6  pull-left right-section pd0">
							<ul>
								<li><?php echo $profile->first_name.' '.$profile->last_name;?></li>
								<li><?php echo $profile->userClass->title;?></li>
								<li><?php echo $profile->generateGudaakIds->schools->name;?></li>
								<li><?php echo $profile->generateGudaakIds->gudaak_id;?></li>
                                <?php if(isset($userTestDate->add_date)){?>
								<li class="lastRow"><?php echo date('d M,Y',strtotime($userTestDate->add_date));?></li>
                                <?php } ?>
							</ul>
						</div>
						<div class="col-md-6  pull-left">
						</div>
					</div>
                	<div class="report-title1">
                    	Gudaak IPC Report
                    </div>
                	<div style="float:left; width:100%; font-size:14px; color:#666; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
                    	<p>Welcome to the world of Designing Career Path with Gudaak! The test you have taken just now is one of the numerous “Interest-Personality “Tests available online and offline but our uniqueness lies in the interpretation. We at Gudaak believe in the holistic approach towards life and careers. This report has been prepared with utmost care, keeping in mind the various factors that come into play when you are making a decision for life.<br/><br/>
Any suitable career can only be predicted with a combination of client’s academic assessments, interests, personality, values and attitudes when assessed in congenial environment. So, to succeed in life- Keep reading the literature on career and explore the possibilities that can help you reach your dreams and goals.<br/><br/>
The career recommendations made here are based on how genuinely you have answered the test. We hope that this report will lead to a greater understanding of yourself and at every step we are there to guide you.<br/><br/>
Remember! “There are no such things as limits to growth, because there are no limits on the human capacity for intelligence, imagination and wonder."<br/><br/>

Wishing you all the best in all your future endeavours!
<br/>
                        </p>
						<div class="def-title">This report contains the following:<br/>
								<ul class="def-list">
								<li>• A personalized personality profile</li>
								<li>• An interest profile</li>
								<li>• Career Recommendations</li>
								</ul>

						</div>
                    </div>	
               <!--<div style="float:left; width:90%; background:url(./image/img_icon.jpg) no-repeat;height:129px; background-position:center; margin-top:8%; margin-bottom:8%;"></div>-->
                
                
                </div>	

 	
        
 <div style="float:left; width:100%; min-height:700px; " >

 
              
                <div style="float:left; width:100%;" >
				
	                  <?php foreach($reports as $report){?>
						<?php if($report['id']==2){ ?>
						<div class="w100" >
						<div class="summary-report-title">
							Personality Test Summary 
						</div>
							
							<h1 class="report-title2">
								Your Personality Mapping
							</h1>
							<div class="clear"></div>
							<div class="r-description">
								<p style="font-weight:bold;">Personality:  What a dynamic "Personality" she has! You have often heard people saying this. Is it possible to assess the personality of a human being just by looking at him/her? Actually, the answer could be both-Yes and No. Yes, because outward appearance comes from the confidence, self-esteem and emotional stability you have and No because people might fake it.

								</p>
								<p>Personality as defined by researchers is a dynamic and organized set of characteristics possessed by a person that uniquely influences his or her cognitions, emotions, motivations, and behaviours in various situations. It also refers to the pattern of thoughts, feelings, social adjustments, and behaviours consistently exhibited over time that strongly influences one's expectations, self-perceptions, values, and attitudes. It also predicts human reactions to other people, problems, and stress.			</p>
								<p style="font-size:18px;color:#666;padding:0;margin:0;">
									This section of the report will show you how you stack up on 5 major dimensions of personality:
								</p>
								<br/>
								<br/>
								<p>
									•	<span style="font-weight:bold;">Openness to Experience -</span> How much do you enjoy abstract ideas and artistic expression?<br/><br/>
									•	<span style="font-weight:bold;">Conscientiousness -</span> How much do you put off immediate gratification in order to achieve long-term goals?<br/><br/>
									•	<span style="font-weight:bold;">Extraversion -</span> How much do you turn to the outside world for stimulation and excitement?<br/><br/>
									•	<span style="font-weight:bold;">Agreeableness -</span> How much do you put others ahead of yourself?<br/><br/>
									•	<span style="font-weight:bold;">Neuroticism - </span>How likely are you to bounce back from stressful events?<br/><br/>


								</p>
							</div>	
					   
						
						
						</div>
						<?php } ?>
					
					 
                        <?php if($report['id']==3){?>
						   
							<div style="margin-top:50px;">
								<div style="w100" >
									<div class="summary-report-title">
										Interest Test Summary 
									</div>
									<h1 class="report-title2">
										Your Personality Mapping
									</h1>
									<div class="clear"></div>
									<div class="r-description">
										<p style="font-weight:bold;">
										 Interests in a layman language can be “What you like to do?” You might like swimming, reading or travelling and may not like fishing, meeting people etc. It refers to things or activities that a person is curious or concerned about. They are subjects or qualities that evoke his attention. They can be things that someone does as a pastime or a leisure activity or those that he wants to have an occupation in. There are various interests that a person might be enthusiastic about.  Do not worry if the results here are not what you thought of. Our idea is to let you know your real self!

										</p>
										<p>The Interest Test you have taken maps you on the five traits. Read out in details here:<br/><br/><br/></p>
										 
										
							
									</div>	
							   
								
								
								</div>
						 <div class="user-report-info" >
							<?php foreach($report['results1'] as $result){?>
								     <div >
										<div class="w20 fl process-title"><?php echo $result['title'];?></div>
										<div class="w80 progress<?php echo $result['id'];?>"><span style="width:<?php echo ($result['score']/0.4);?>%"></span></div>
									</div>
															 
							 <?php  }?>
							  </div >
							  
							</div>

                        <?php } ?>
                        
 <?php foreach($report['results'] as $result){?>
		     <div class="cat-align">
				<?php echo ($report['id']==3)?'<h3 class="process-title">'.$result['title'].'</h3>':'<h3 class="process-title">'.$result['title2'].'</h3>';?>
			</div>
			<div class="cat-def">
			<p><?php echo $result['description'];?></p>
			
			</div>	
		
		<p class="description-content"></p>
    	<div class="border_b"></div>
	 
    <?php 
	} ?><div>
    <?php
	$listArr	=	array();
	foreach($report['results'] as $result){
		if($report['id']==3){?>
	<div class="col-md-12 pd0  fl">
	<?php
		$listCar	=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
		foreach($listCar as $data){		?>
<div class="col-md-4 pdleft career-lib">
	<?php 
			$filename = ''.$data->image.'';
			 $path=Yii::getPathOfAlias('webroot.uploads.career.small') . '/';
			$file=$path.$filename;
			if (file_exists($file)){ ?>
			<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/career/small/'.$data->image.'"/>',array('user/careerList','id'=>''.$data->id.''),array('class'=>'fl'));?>
	<?php 	}else{ ?>
			<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/career/small/noimage.jpg"/>',array('user/careerList','id'=>''.$data->id.''),array('class'=>'fl'));?>
		
	<?php } ?>
	<div class="clear"></div>
	<?php echo CHtml::link('<h1>'.substr($data->title,0,20).'..</h1>',array('user/careerList','id'=>''.$data->id.''),array('title'=>$data->title));?>
	<p><?php echo substr($data->description,0,70);?></p>
	<div class="col-md-12 career-hot-links">
	<?php echo CHtml::link('Read more..',array('user/readFull','id'=>''.$data->id.''),array('class'=>'pull-left','title'=>'Read Full.'));?>
		<span class="pull-right"><i class="icon-eye-open"></i></span>
	</div>
</div>


	<?php	}?>
    
    </div>
    <?php 
		}
		
		}?>
        
        </div>
        <div class="clear"></div>
<?php } ?>
				</div>    
                </div>
 
 			 
     
    <!--Page NO. 1 End-->
    </div>
 
      <div class="wrapper">
      
			       <div style="float:left; width:100%; margin:5% 0 15% 0;">
                	<div style=" float:left; width:212px; height:159px;"><img alt="" src="./image/img_whitebg.jpg"></div>
                    <div style="float:left; width:75%; height:159px; background:#1acccc; padding-right:8px; text-align:right; vertical-align:middle;  ">
                    	<div style="float:right; width:80%; margin-right:2%; color:#fff; font-size:17px; line-height:22px; font-family:Arial, Helvetica, sans-serif; margin-top:7%;">
                        	
                        Call: +91 8786 76545, <span class="skype_c2c_print_container">+91 7654 763592</span><span skype_menu_props="{&quot;numberToCall&quot;:&quot;+917654763592&quot;,&quot;isFreecall&quot;:false,&quot;isMobile&quot;:false,&quot;isRtl&quot;:false}" onmouseout="SkypeClick2Call.MenuInjectionHandler.hideMenu(event)" onmouseover="SkypeClick2Call.MenuInjectionHandler.showMenu(this, event)" tabindex="-1" dir="ltr" class="skype_c2c_container"><span skypeaction="skype_dropdown" dir="ltr" class="skype_c2c_highlighting_inactive_common"><span class="skype_c2c_textarea_span"><img src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" class="skype_c2c_logo_img"><span class="skype_c2c_text_span">+91 7654 763592</span><span class="skype_c2c_free_text_span"></span></span></span></span> <br>
                        Email: info@gudaak.com &nbsp;&nbsp; Website: www.gudaak.com 
                        </div>
                    
                    </div>
               
     
				<!--Page NO. 1 End-->
				</div>
    
		
			</div>
					
			</div>
		
		</div>
		</div>
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			