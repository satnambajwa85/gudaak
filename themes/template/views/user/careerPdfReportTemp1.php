<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDF Design</title>
<style>
body{ margin:0; padding:0; }
#main_outer{ float:left; width:100%;}
.wrapper{ margin:0 auto; width:700px;}
</style>

</head>

<body>
    <div class="wrapper">
    <!--Page NO. 1-->
  <div style=" float:left; width:650px; margin-left:50px; border:1px solid #333333;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="margin-top: 110px;margin-left: 100px;"><img alt="" src="./image/logo_large.png" /></div>
        
        
        <div style="margin-top: 100px;margin-bottom: 50px;margin-left: 25px;width:580;">
        <table width="580" border="1" bordercolor="#333333" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; ">
                    <tr style="background:#ececec;" >
                      <td width="250" height="40" align="center" valign="middle">Name</td>
                      <td width="330" height="40" align="center" valign="middle"><?php echo $profile->first_name.' '.$profile->last_name;?></td>
                    </tr>
                     <tr >
                      <td width="250" height="40" align="center" valign="middle">Class</td>
                      <td width="330" height="40" align="center" valign="middle"><?php echo $profile->userClass->title;?></td>
                    </tr>
                    
                     <tr style="background:#ececec;">
                      <td width="250" height="40" align="center" valign="middle">School</td>
                      <td width="330" height="40" align="center" valign="middle"><?php echo $profile->generateGudaakIds->schools->name;?></td>
                    </tr>
                     <tr >
                      <td width="250" height="40" align="center" valign="middle">Gudaak ID</td>
                      <td width="330" height="40" align="center" valign="middle"><?php echo $profile->generateGudaakIds->gudaak_id;?> </td>
                    </tr>
                     <tr style="background:#ececec;" >
                      <td width="250" height="40" align="center" valign="middle">Test Completed On</td>
                      <td width="330" height="40" align="center" valign="middle"><?php echo date('d M,Y',strtotime($userTestDate->add_date));?></td>
                    </tr>
                    
          </table>
        
     
        </div>
        
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-1</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
    <!--Page NO. 1 End-->
    
    <!--Page NO. 2 -->
    
   <div style=" float:left; width:650px; margin-left:50px; border:1px solid #333333;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                   
        
        <div style="margin-top: 100px;margin-bottom: 50px;margin-left: 35px;width:580;">
        <div style="float:left; width:100%; font-size:18px; color:#21C4C1; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
                    	Gudaak IPC Report
                    </div>
                	<div style="float:left; width:100%; font-size:14px; color:#000; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
                    	<p>Welcome to the world of Designing Career Path with Gudaak! The test you have taken just now is one of the numerous "Interest-Personality "Tests available online and offline but our uniqueness lies in the interpretation. We at Gudaak believe in the holistic approach towards life and careers. This report has been prepared with utmost care, keeping in mind the various factors that come into play when you are making a decision for life.<br/><br/>
Any suitable career can only be predicted with a combination of client's academic assessments, interests, personality, values and attitudes when assessed in congenial environment. So, to succeed in life- Keep reading the literature on career and explore the possibilities that can help you reach your dreams and goals.<br/><br/>
The career recommendations made here are based on how genuinely you have answered the test. We hope that this report will lead to a greater understanding of yourself and at every step we are there to guide you.<br/><br/>
Remember! "There are no such things as limits to growth, because there are no limits on the human capacity for intelligence, imagination and wonder."<br/><br/>
Wishing you all the best in all your future endeavours!
<br/>
                        </p>
					<div style=" color:#333; font-size:18px;margin-top:20px;font-family:Arial, Helvetica, sans-serif; ">This report contains the following:<br/>
								<ul style="list-style:none;font-size:14px; color:#000; text-align:justify; line-height:16px; ">
								<li>• A personalized personality profile</li>
								<li>• An interest profile</li>
								<li>• Career Recommendations</li>
								</ul>
						</div>
                    </div>	
        </div>
        <div style="float:left; width:100%; background:url(image/img_icon.jpg) no-repeat;height:129px; background-position:center; margin-top:8%; margin-bottom:8%;" ></div>    
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:100px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-2</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 2 End-->
 <?php foreach($reports as $report){
	 		if($report['id']==2){ ?>
        <div style=" float:left; width:650px; margin-left:50px; border:1px solid #333333;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        <div style="float:left; width:100%; height:950px; " >
        
        
               <div style="float:left; width:650px;" >
						<div style="float:left;width:95%;margin-left:30px;font-size:18px;color:#21C4C1;margin-top:50px;font-family:Arial, Helvetica, sans-serif; ">
								Your Personality Mapping
							</div>
							<div style="float:left;font-size:14px; color:#000; text-align:justify; line-height:20px; font-family:, Helvetica, sans-serif;  ">
								<p style="font-weight:bold;">Personality:  What a dynamic "Personality" she has! You have often heard people saying this. Is it possible to assess the personality of a human being just by looking at him/her? Actually, the answer could be both-Yes and No. Yes, because outward appearance comes from the confidence, self-esteem and emotional stability you have and No because people might fake it.
								</p>
								<p>Personality as defined by researchers is a dynamic and organized set of characteristics possessed by a person that uniquely influences his or her cognitions, emotions, motivations, and behaviours in various situations. It also refers to the pattern of thoughts, feelings, social adjustments, and behaviours consistently exhibited over time that strongly influences one's expectations, self-perceptions, values, and attitudes. It also predicts human reactions to other people, problems, and stress.			</p>
								<p style="font-size:16px;color:#000;padding:0;margin:0;">
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
      </div>
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-3</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 3 End-->                 
	
     <!--Page NO. 3 Start-->
     <div style=" float:left; width:650px; margin-left:50px; border:1px solid #333333;">
        <div style="float:left; width:650px; margin-top:30px; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:100px;  "><img src="./image/small.jpg" alt=""  /></div>
        
        <div style="float:left; width:650px; height:950px; " >
        	<div style="float:left; margin-top:30px; width:650px;" >                    
	<?php $counter	=	0;
	foreach($report['results'] as $result){?>
		<img  style="width:320px; <?php //if($counter==1){margin-left:10px<?php }; ?> "alt="" src="./image/<?php echo $result['image'];?>">
        <?php if($counter==1){?><div style="clear:both;"></div><?php } ?>
	<?php $counter	=	abs($counter-1);}?>
        
        </div>
        </div>
        
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-4</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 3 End-->
    
    
    
    
    					<?php } 
			if($report['id']==3){?>
           
     <!--Page NO. 3 Start-->
    <div style="  he width:650px; margin-left:50px; border:1px solid #333333;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        <div style="float:left; width:100%; height:950px; " >                  
                        
                        <div style="float:left; width:100%;" >
							<div style="float:left; width:95%; padding-left:3%; font-size:18px; color:#21C4C1;font-family:Arial, Helvetica, sans-serif; ">
								Your Interest Profile
							</div>
							<div style="float:left; width:95%; padding-left:3%; font-size:14px; color:#000; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
								<p style="font-weight:bold;">
								 Interests in a layman language can be "What you like to do?" You might like swimming, reading or travelling and may not like fishing, meeting people etc. It refers to things or activities that a person is curious or concerned about. They are subjects or qualities that evoke his attention. They can be things that someone does as a pastime or a leisure activity or those that he wants to have an occupation in. There are various interests that a person might be enthusiastic about.  Do not worry if the results here are not what you thought of. Our idea is to let you know your real self!
								</p>
								<p>The Interest Test you have taken maps you on the five traits. Read out in details here:</p>
							</div>	
					   </div>
                       
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e4e4e4; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:18px; margin-top:10px; ">
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
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-2</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 3 End-->
                               
       <!--Page NO. 3 Start-->
    <div style="  he width:650px; margin-left:50px; border:1px solid #333333;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
	<?php $counter	=	0;
	foreach($report['results'] as $result){?>
		<img  style="width:290px; <?php if($counter==1){?>margin-left:10px<?php } ?> "alt="" src="./image/<?php echo $result['image'];?>">
	<?php $counter	=	abs($counter-1);}?>
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-2</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 3 End-->                         
                               <?php } 
 }?>
                        
       
    
    </div>
    
</body>
</html>