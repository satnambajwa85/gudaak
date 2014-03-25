<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDF Report</title>
</head>
<body>
   <table width="800px" border="0" cellspacing="0" cellpadding="0" style=" font-family:Arial, Helvetica, sans-serif; color:#666; font-size:18px; ">
	<tr>
		<td>
			<div style="float:left; width:100%; margin-top:17px; margin-bottom:50px; background:#1acccc; height:39px; padding-top:14px; text-align:right; font-size:18px; color:#fff; padding-right:10%; font-family:Arial, Helvetica, sans-serif;">
			Profile Summary&nbsp;
				<div style=" position:absolute; width:200px; height:139px; top:0; left:15%;">
					<img alt="" src="./image/small.jpg">
				</div>                    
			</div>
		</td>
	</tr>
	</table>

		<table width="800px" border="0" cellspacing="0" cellpadding="0" style=" font-family:Arial, Helvetica, sans-serif; color:#666; font-size:18px; ">
	<tr>
    <td colspan="2">
    	<div style="margin-top: 140px;margin-bottom: 100px;margin-left: 150px;"><img alt="" src="./image/logo_large.png" /></div>
    </td>
    </tr>
  <tr>
    <td width="200px" align="left" valign="left" style="border-left:1px solid #fff;font-size:12px; background-color:#F5F5F5; border-top:1px solid #fff; border-bottom:1px solid #fff; ">
   <div style="width:200px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#fff; ">
    Name
    </div>
	 <div style="width:200px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#F5F5F5; ">
     Class
     </div> 
	  <div style="width:200px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#fff; ">
   School
     </div> 
	  <div style="width:200px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#F5F5F5; ">
	Gudaak ID
	 </div> 
	  <div style="width:200px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#fff; ">
	Test Completed On
	 </div> 
	 </td>
    <td width="200px" align="left" valign="left" style="font-size:12px; background-color:#F5F5F5;border-right:1px solid #fff; border-bottom:1px solid #fff; border-top:1px solid #fff;"> 
	<div style="width:510px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#fff; ">
	<?php echo $profile->first_name.' '.$profile->last_name;?>
   </div> 
   <div style="width:510px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#F5F5F5; ">
    <?php echo $profile->userClass->title;?>
     </div> 
	 <div style="width:510px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#fff; ">
    <?php echo $profile->generateGudaakIds->schools->name;?>
	 </div> 
      <div style="width:510px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#F5F5F5; ">
    <?php echo $profile->generateGudaakIds->gudaak_id;?> 
	 </div> 
	 <div style="width:510px;text-align:left; height:20px;margin:0px;padding:10px;background-color:#fff; ">
	<?php echo date('d M,Y',strtotime($userTestDate->add_date));?>
	 </div> 
	</td>
    </tr>
 </table>
  <table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><div style="padding:10px;"></div></td>
	</tr>
  </table>
   <table width="800px" border="0" cellspacing="0" cellpadding="0" style=" font-family:Arial, Helvetica, sans-serif; color:#666; font-size:18px; ">
	<tr>
		<td>
                	<div style="float:left; width:97%; font-size:18px; color:#21C4C1; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
                    	Gudaak IPC Report
                    </div>
                	<div style="float:left; width:97%; font-size:14px; color:#666; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
                    	<p>Welcome to the world of Designing Career Path with Gudaak! The test you have taken just now is one of the numerous “Interest-Personality “Tests available online and offline but our uniqueness lies in the interpretation. We at Gudaak believe in the holistic approach towards life and careers. This report has been prepared with utmost care, keeping in mind the various factors that come into play when you are making a decision for life.<br/><br/>
Any suitable career can only be predicted with a combination of client’s academic assessments, interests, personality, values and attitudes when assessed in congenial environment. So, to succeed in life- Keep reading the literature on career and explore the possibilities that can help you reach your dreams and goals.<br/><br/>
The career recommendations made here are based on how genuinely you have answered the test. We hope that this report will lead to a greater understanding of yourself and at every step we are there to guide you.<br/><br/>
Remember! “There are no such things as limits to growth, because there are no limits on the human capacity for intelligence, imagination and wonder."<br/><br/>
Wishing you all the best in all your future endeavours!
<br/>
                        </p>
					<div style=" color:#333; font-size:18px;margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">This report contains the following:<br/>
								<ul style="list-style:none;font-size:14px; color:#666; text-align:justify; line-height:22px; ">
								<li>• A personalized personality profile</li>
								<li>• An interest profile</li>
								<li>• Career Recommendations</li>
								</ul>
						</div>
                    </div>	
		</td>
	</tr>
	<tr>
		<td>
               <div style="float:left; width:95%; background:url(./image/img_icon.jpg) no-repeat;height:129px; background-position:center; margin-top:80px; margin-bottom:10px;"></div>
        </td>
	</tr>
	</table>
	                  <?php foreach($reports as $report){?>
						<?php if($report['id']==2){ ?>
						<div style="float:left; width:100%; min-height:700px; " >
						<div style="float:left; width:98%; margin-top:5%;margin-bottom:10px;background:#1acccc; height:40px; padding-top:14px; text-align:right; font-size:18px; color:#fff; padding-right:10%; font-family:Arial, Helvetica, sans-serif;">
							Personality Test Summary &nbsp;
						</div>
							<div style="float:left; width:95%; padding-left:3%; font-size:18px; color:#21C4C1; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
								Your Personality Mapping
							</div>
							<div style="float:left; width:95%; padding-left:3%; font-size:14px; color:#666; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
								<p style="font-weight:bold;">Personality:  What a dynamic "Personality" she has! You have often heard people saying this. Is it possible to assess the personality of a human being just by looking at him/her? Actually, the answer could be both-Yes and No. Yes, because outward appearance comes from the confidence, self-esteem and emotional stability you have and No because people might fake it.
								</p>
								<p>Personality as defined by researchers is a dynamic and organized set of characteristics possessed by a person that uniquely influences his or her cognitions, emotions, motivations, and behaviours in various situations. It also refers to the pattern of thoughts, feelings, social adjustments, and behaviours consistently exhibited over time that strongly influences one's expectations, self-perceptions, values, and attitudes. It also predicts human reactions to other people, problems, and stress.			</p>
								<p style="font-size:18px;color:#666;padding:0;margin:0;">
									This section of the report will show you how you stack up on 5 major dimensions of personality:
								</p>
								
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
								<div style="float:left; width:100%; min-height:700px; " >
								<div style="float:left; width:98%; margin-top:5%;margin-bottom:10px;background:#1acccc; height:40px; padding-top:14px; text-align:right; font-size:18px; color:#fff; padding-right:10%; font-family:Arial, Helvetica, sans-serif;">
							Interest Test Summary &nbsp;
						</div>
							<div style="float:left; width:95%; padding-left:3%; font-size:18px; color:#21C4C1; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
								Your Interest Profile
							</div>
							<div style="float:left; width:95%; padding-left:3%; font-size:14px; color:#666; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
								<p style="font-weight:bold;">
								 Interests in a layman language can be “What you like to do?” You might like swimming, reading or travelling and may not like fishing, meeting people etc. It refers to things or activities that a person is curious or concerned about. They are subjects or qualities that evoke his attention. They can be things that someone does as a pastime or a leisure activity or those that he wants to have an occupation in. There are various interests that a person might be enthusiastic about.  Do not worry if the results here are not what you thought of. Our idea is to let you know your real self!
								</p>
								<p>The Interest Test you have taken maps you on the five traits. Read out in details here:<br/><br/><br/></p>
							</div>	
					   </div>
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e4e4e4; font-family:Arial, Helvetica, sans-serif; color:#666; font-size:18px; ">
								<?php foreach($report['results1'] as $result){?>
								<tr>
									<td width="20%" height="40" style="color:#21C4C1;" ><?php echo $result['title'];?></td>
									<td width="20%" height="40" ></td>
									<td width="80%" height="40" >
										<?php 
												if($result['id']==13){
													$color='88AB45';
												}
												if($result['id']==12){
													$color='C468DE';
												}
												if($result['id']==11){
													$color='EC9C34';
												}
												if($result['id']==10){
													$color='1A8FCC';
												}
												if($result['id']==8){
													$color='1ACCCC';
												}
												if($result['id']==9){
													$color='1acca4';
												}
												?>
										<div style="background: none repeat scroll 0 0 #FFFFFF;border: 1px solid #CCCCCC;float: left;height: 25px; margin-bottom: 10px;width: 85%;">
										<div style="width:<?php echo ($result['score']/0.4);?>%;background: none repeat scroll 0 0 #<?php echo $color;?>;float: left;height: 25px;">									                    
										</div>                   
									</div>
									</td>
								 </tr>
							<?php  }?>
							   </table>
							</div>
                        <?php } ?>
 <?php foreach($report['results'] as $result){?>
		     <div style="float:left; color: #666;width:95%; padding-left:3%; font-size:18px;  margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
				<?php echo ($report['id']==3)?'<h4>'.$result['title'].'</h4>':'<h4>'.$result['title2'].'</h4>';?>
			</div>
			<div style="float:left; width:100%; padding-left:3%; font-size:14px; color:#666; text-align:justify; line-height:22px; font-family:Arial, Helvetica, sans-serif;  ">
			<p><?php echo $result['description'];?></p>
			
			</div>	
		
		<p class="description-content"></p>
    	<div class="border_b"></div>
	 
    <?php 
	} ?><div style="width:100%;">
	   <table width="700px" border="0" cellspacing="0" cellpadding="0" style=" font-family:Arial, Helvetica, sans-serif; color:#666; font-size:18px; ">
	<tr>
    <?php
	$listArr	=	array();
	$counter=1;
	foreach($report['results'] as $result){
	if($report['id']==3){?>
	 <?php
		$listCar	=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
		foreach($listCar as $data){		?>
		<td width="200px">
			<div style="color: #666666;font-size: 12px;width:200px;float:left !important;text-align:left;">
				<img src="./uploads/career/small/<?php echo $data->image;?>" />
			</div>
			 <div style="color: #666666;font-size: 12px;width:200px;float:left !important;text-align:left;">
				<?php echo $data->title;?><br/>
				<?php echo $data->description;?>
			</div>
		</td>      
	 <?php if($counter%3==0){?>
	 <tr>
	</tr>
	 <?php } ?>
	<?php	$counter++;  }?>
    
    
    <?php 
		}}?>
    
		 
	</tr>
	
	</table>  
        </div>
        
<?php } ?>
			 
     <div class="wrapper">
      
			 	<div style="float:left; width:100%; min-height:700px; " >
                <div style="float:left; width:100%; margin:5% 0 15% 0;">
                	<div style=" float:left; width:212px; height:159px;"><!--<img src="images/img_whitebg.jpg" alt="" />--></div>
                    <div style="float:left; width:100%; height:159px; background:#1acccc; padding-right:8px; text-align:right; vertical-align:middle;  "  >
                    	<div style="text-align:center; width:50%; margin-right:2%; color:#fff; font-size:17px; line-height:22px; font-family:Arial, Helvetica, sans-serif; margin-top:7%;">
                        	
                        Call: +91 8786 76545, +91 7654 763592 <br/>
                        Email: info@gudaak.com &nbsp;&nbsp; Website: www.gudaak.com 
                        </div>
                    
                    </div>
                </div>  
                </div>
</body>
</html>