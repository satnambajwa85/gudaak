<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDF Design</title>
<style>
body{ margin:0; padding:0; }
#main_outer{ float:left; width:100%;}
.wrapper{ margin:0 auto; width:720px;}
</style>

</head>

<body>
    <div class="wrapper">
    <!--Page NO. 1-->
  <div style=" float:left; width:680px; margin-left:40px; border:1px solid #333333;">
        <div style="float:left; width:100%; margin-top:5%; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "></div>                    
        
        <div style="margin-top: 110px;margin-left: 100px;"><img alt="" src="./image/logo_large.png" /></div>
        
        
        <div style="margin-top: 100px;margin-bottom: 50px;margin-left: 40px;width:580;">
        <table width="600" border="1" bordercolor="#333333" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; ">
                    <tr style="background:#ececec;" >
                      <td width="250" height="40" align="center" valign="middle">Name</td>
                      <td width="330" height="40" align="center" valign="middle"><?php echo $profile->first_name.' '.$profile->last_name;?></td>
                    </tr>
                     <tr >
                      <td width="250" height="40" align="center" valign="middle">Class</td>
                      <td width="330" height="40" align="center" valign="middle"> 4<?php //echo $profile->userClass->title;?></td>
                    </tr>
                    
                     <tr style="background:#ececec;">
                      <td width="250" height="40" align="center" valign="middle">School</td>
                      <td width="330" height="40" align="center" valign="middle"> ds<?php //echo $profile->generateGudaakIds->schools->name;?></td>
                    </tr>
                     <tr >
                      <td width="250" height="40" align="center" valign="middle">Gudaak ID</td>
                      <td width="330" height="40" align="center" valign="middle"> 434<?php //echo $profile->generateGudaakIds->gudaak_id;?> </td>
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
    
    <div style=" float:left; width:680px; margin-left:40px; border:1px solid #333333; height:1050px;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="margin-top: 100px;margin-bottom: 50px;margin-left: 20px;width:620;">
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
								<li>• A personalized personality profile</li><br/>
								<li>• An interest profile</li><br/>
								<li>• Career Recommendations</li>
								</ul>
						</div>
                    </div>	
        </div>
        <div style="float:left; width:100%; background:url(image/img_icon.jpg) no-repeat;height:129px; background-position:center; margin-top:8%; margin-bottom:8%;" ></div>    
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:50px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-2</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 2 End-->
	<?php 	$listArr	=	array();
			foreach($reports as $report){
				if($report['id']==2){?>
     <!--Page NO. 3 Start-->
    <div style=" float:left; width:680px; margin-left:40px; border:1px solid #333333; height:1050px;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:100px;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="margin-top: 100px;margin-bottom: 50px;margin-left: 20px;width:620; height:800px;">
        <div style="float:left; width:640px; font-size:18px; color:#21C4C1; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
                    	Your Personality Mapping
                    </div>
                	<div style="float:left; width:640px; font-size:14px; color:#000; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
                    	<p>
There has been much research on how people describe themselves and others based on their disposition, and five major dimensions of human personality have been found. They are often referred to as the OCEAN model of personality, because of the acronym from the names of the five dimensions. See the following descriptions to understand your results in a better way:

<br/>
                        </p>
                      <p style="margin-top:10px; font-size:14px; font-weight:bold;">BIG 5 PERSONALITY FACTORS: OCEAN</p>


					<div style=" color:#333; font-size:12px; margin-left:13px; margin-top: 20px;font-family:Arial, Helvetica, sans-serif; ">
					  <table width="640" border="0" cellspacing="2" cellpadding="10">
					    <tr style="background:#cccccc;">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Openness to Change</strong> </td>
					      <td width="400" height="40" align="center" valign="middle">How open minded, curious, creative, imaginative and innovative you are?</td>
				        </tr>
					    <tr style="background:#eeeeee">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Conscientiousness</strong></td>
					      <td width="400" height="40" align="center" valign="middle">How ambitious, persevering, responsible, resourceful, and well organized you are?</td>
				        </tr>
					    <tr style="background:#cccccc;">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Extraversion</strong></td>
					      <td width="400" height="40" align="center" valign="middle">How friendly, gregarious, energetic, adventurous and cheerful you are?</td>
				        </tr>
					    <tr style="background:#eeeeee">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Agreeableness</strong></td>
					      <td width="400" height="40" align="center" valign="middle">How trusting, straightforward, considerate, helpful and modest you are?</td>
				        </tr>
					    <tr style="background:#cccccc;">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Emotional Stability</strong></td>
					      <td width="400" height="40" align="center" valign="middle">How relaxed, calm, patient, easy going, contented and self assured you are?</td>
				        </tr>
				      </table>
					  <br/>
								
					  </div>
                      
                      <p>
                      <strong>Based on your scores obtained on the Personality Test, this section of the report will show you how you stack up on 5 major dimensions of personality:</strong>

                      </p>
                    </div>	
        </div>
       
        <div style="float:left; width:680px; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:300px !important; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-3</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 3 End-->
     
     <div style=" float:left; width:680px; margin-left:40px; border:1px solid #333333; height:1050px;">
        <div style="float:left; width:680px; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:100px;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
         <div style="margin-top: 40px;height:810px; margin-left: 10px;width:620px; height:880px;">
        
        Take a look at your results obtained on the Big Five Personality Factors i.e. OCEAN to get to know your <br />self even better.
        <?php $counter	=	0;
	foreach($report['results'] as $result){
		
		$listArr[]	=	$result['descr'];
				
		?>
		<img  style="width:300px; height:250px; margin-top:10px;  <?php echo ($counter)?'margin-left:20px':'float:left';?>  " alt="" src="./image/<?php echo $result['image'];?>">
        <?php echo ($counter)?'<div style="clear:both;"></div>':'';?>
        &nbsp;
<?php	$counter	=	abs($counter-1);
	}?>
                		
        </div>
       
        <div style="float:left; width:680px; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:40px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-4</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <?php }else{ ?>
     
     <!--Page NO. 4 -->
     <div style=" float:left; width:650px; margin-left:40px; border:1px solid #333333; height:1050px;">
        <div style="float:left; width:680px; margin-top:0px; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="margin-top: 50px; height:750px;margin-bottom: 50px;margin-left: 20px;width:620;">
        <div style="float:left; width:650px; font-size:18px; color:#21C4C1; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
                    	Your Interest Profile
                    </div>
                	<div style="float:left; width:650px; font-size:14px; color:#000; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
                    	<p>Interests in a layman language can be "What you like to do?" <br />
The Interest Test you have taken maps you on the six types popularly known as Holland's <br />Codes often referred with the acronym RIASEC. 
<br/>
                        </p>
					<div style=" color:#333; font-size:14px;margin-top:20px;font-family:Arial, Helvetica, sans-serif; "><strong>Take A Look at the description given below to understand your results in a better way:</strong><br/>
								
					  </div>
                      
                      <div style=" color:#333; font-size:12px; margin-left:5px; margin-top: 20px;font-family:Arial, Helvetica, sans-serif; ">
                      <table width="630" border="0" bordercolor="#333333" cellspacing="0" cellpadding="0" >
                  <tr style="background:#eeeeee">
                    <td width="230" height="60" align="center" valign="middle"><strong>Realistic</strong></td>
                    <td width="400" height="60" align="center" valign="middle">People who have atheletic or mechanical ability, prefer to work with objects, machines, tools, plants or to be outdoors.</td>
                  </tr>
                  <tr style="background:#cccccc;">
                    <td width="230" height="60" align="center" valign="middle"><strong>Investigative</strong></td>
                    <td width="400" height="60" align="center" valign="middle">People who like to observe, learn, investigate, analyze, evaluate or solve problems.</td>
                  </tr>
                  <tr style="background:#eeeeee">
                    <td width="230" height="60" align="center" valign="middle"><strong>Artistic</strong></td>
                    <td width="400" height="60" align="center" valign="middle">People who have artistic, innovating, intuitional abilities and like to work in unstructured situations using their imagination and creativity.</td>
                  </tr>
                  <tr style="background:#cccccc;">
                    <td width="230" height="60" align="center" valign="middle"><strong>Social</strong></td>
                    <td width="400" height="60" align="center" valign="middle">People who like to work with people to provide direct services or helping opportunities like teaching, coaching or counseling and are drawn to social or humanistic causes.</td>
                  </tr>
                  <tr style="background:#eeeeee">
                    <td width="230" height="60" align="center" valign="middle"><strong>Enterprising</strong></td>
                    <td width="400" height="60" align="center" valign="middle">People who like to work with people, influencing, persuading, performing, leading or managing for organizational goals or economic gains.</td>
                  </tr>
                  <tr style="background:#cccccc">
                    <td width="230" height="60" align="center" valign="middle"><strong>Conventional</strong></td>
                    <td width="400" height="60" align="center" valign="middle">People who like to work with data, have clerical or numeraical ability, carry out tasks in detail or follow though on others' instructions</td>
                  </tr>
                </table>
                      
                      </div>
                    </div>	
        </div>
       
        <div style="float:left; width:680px; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:120px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-5</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 4 End-->
     
     
     <div style=" float:left; width:650px !important; margin-left:40px; border:1px solid #333333; height:1050px;">
        <div style="float:left; width:680px; margin-top:0px; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:100px;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="height:800px; margin-left: 20px;width:620px; padding-top: 75px;">
        <strong>Bar Diagram Showing the Scores obtained</strong>
        
        
        <table width="650" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e4e4e4; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:18px; margin-top:10px; ">
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
										<div style="width:<?php echo ($result['score']/0.4);?>%;background: none repeat scroll 0 0 #<?php echo $color;?>;float: left;height: 25px; padding-left:50px;color:#FFF;"><?php echo $result['value'];?></div>                 
									</div>
									</td>
								 </tr>
							<?php  }?>
							   </table>
                               
       <div style="margin-top: 40px;">
       <p>
       <strong>What Does it Mean? Take a look</strong>
       </p>
         <?php $counter	=	0;
	foreach($report['results'] as $result){
		$listArr[]	=	$result['descr'];
		
		?>
		<img  style="width:300px; height:250px; margin-top:10px;  <?php echo ($counter)?'margin-left:20px':'float:left';?>  " alt="" src="./image/<?php echo $result['image'];?>">
        <?php echo ($counter)?'<div style="clear:both;"></div>':'';?>
        &nbsp;
<?php	$counter	=	abs($counter-1);
	}?>
             </div>   		
        </div>
       
        <div style="float:left; width:680px; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:100px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-6</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
   
    <?php 
	 }
	} ?>
    
    
    
      <!--Page NO. 5-->
     <div style=" float:left; width:650px; margin-left:40px; border:1px solid #333333 !important;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
       
        <div style="margin-top: 20px;margin-bottom: 30px;margin-left: 20px;width:620; height:850px;">
        <div style="float:left; width:100%; font-size:18px; color:#21C4C1; margin-top:10px;   font-family:Arial, Helvetica, sans-serif; ">
                    	Conclusion:
                    </div>
                	<div style="float:left; width:100%; font-size:14px; color:#000; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
                    	<p>
Now that you have gone through the results obtained on the two tests, you must be wondering, what do <br />
you actually do with the information? How can you use the test results to make a well-informed career <br />
decision, in short how do you make sense of the data?<br />
Well, we are here to make it simple and easy! <br />

We have summed up the recommendations for work profile and career choice that best matches your <br />
personality and interest. You can use insights from this model to better understand yourself and <br />
the type of role that you are most likely to enjoy. 
<br />
Based on your personality and interest you can explore the right type of role in the careers <br />that are characterized by the following features:
                </p>
			    </div>
            <ul style="width:650px;margin-top:15px;">
                  <?php foreach($listArr as $rec){?>
					  <li style="color:#88AB45 !important;height:20px !important;">
					<strong><?php  echo  wordwrap($rec, 110, "<br />\n");?></strong>
                    </li><br />
				<?php  }?>
            </ul>
            <div style="width:680px;padding-top:10px;">
            <div style="float:left; width:670px; font-size:18px; color:#21C4C1; margin-top:5px;   font-family:Arial, Helvetica, sans-serif; ">
                    	Career Recommendations:
                    </div>
                	<div style="float:left; width:670px; margin-bottom:5px; font-size:14px; color:#000; text-align:justify; line-height:20px; font-family:, Helvetica, sans-serif;  ">
                    	<p>
            
            BASED ON YOUR OBTAINED RESULTS, YOU ARE RECOMMENDED TO EXPLORE THE FOLLOWING CAREERS FOR PREFERRED CHOICE! 
            </p>
            </div> 
            <table width="670" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:18px; ">
	<tr>
    
    <?php
	$listArr	=	array();
	$counter=1;
	foreach($report['results'] as $result){
	if($report['id']==3){
		$listCar	=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
		foreach($listCar as $data){		?>
		<td width="210" height="90">
			<div style="color: #666666;font-size: 12px;width:200px;float:left !important;text-align:left;">
				<img src="./uploads/career/small/<?php echo file_exists('./uploads/career/small/'.$data->image)?$data->image:'noimage.jpg';?>" width="200" />
			</div>
			 <div style="color: #666666;font-size: 12px;  width:200px;height:30px;float:left !important;text-align:left;">
				<?php echo $data->title;?><br/>
				<div style="border-bottom:1px solid #cccccc; padding-top:5px; padding-bottom:10px;">
				<?php echo $data->description;?>
					</div>
            </div>
		</td>      
	 <?php if($counter%3==0){?>
	 <tr>
	</tr>
	 <?php } $counter++;  }
	 
		}}?>
    
		 
	</tr>	
	</table>
            </div>
            <p>WE WISH YOU ALL THE BEST FOR YOUR FUTURE ENDEAVORS!</p>
            </div>
            
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-7</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>
     </div>
     <!--Page NO. 5 End-->    
    </div>    
</body>
</html>