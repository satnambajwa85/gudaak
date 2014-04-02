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
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="margin-top: 110px;margin-left: 100px;"><img alt="" src="./image/logo_large.png" /></div>
        
        
        <div style="margin-top: 100px;margin-bottom: 50px;margin-left: 40px;width:580;">
        <table width="600" border="1" bordercolor="#333333" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; ">
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
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:100px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-2</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 2 End-->
     
     <!--Page NO. 3 Start-->
    <div style=" float:left; width:680px; margin-left:40px; border:1px solid #333333; height:1050px;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="margin-top: 100px;margin-bottom: 50px;margin-left: 20px;width:620;">
        <div style="float:left; width:640px; font-size:18px; color:#21C4C1; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
                    	Your Personality Mapping
                    </div>
                	<div style="float:left; width:640px; font-size:14px; color:#000; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
                    	<p><strong>Personality: What a dynamic "Personality" she has! You have often heard people saying
this. Is it possible to assess the personality of a human being just by looking at him/her?
Actually, the answer could be both-Yes and No. Yes, because outward appearance comes
from the confidence, self-esteem and emotional stability you have and No because people
might fake it.</strong><br/><br/>
Personality as defined by researchers is a dynamic and organized set of characteristics possessed
by a person that uniquely influences his or her cognitions, emotions, motivations, and behaviours in
various situations.It also refers to the pattern of thoughts, feelings, social adjustments, and
behaviours consistently exhibited over time that strongly influences one's expectations,
self-perceptions, values, and attitudes. It also predicts human reactions to other people, problems,
and stress
<br/>
                        </p>
                      <p style="margin-top:10px; font-size:14px; font-weight:bold;">This section of the report will show you how you stack up on 5 major dimensions of
personality:</p>


					<div style=" color:#333; font-size:12px; margin-left:13px; margin-top: 20px;font-family:Arial, Helvetica, sans-serif; ">
					  <table width="640" border="0" cellspacing="2" cellpadding="10">
					    <tr style="background:#cccccc;">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Openness to Experience</strong> </td>
					      <td width="400" height="40" align="center" valign="middle">How much do you enjoy abstract ideas and artistic expression?</td>
				        </tr>
					    <tr style="background:#eeeeee">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Conscientiousness</strong></td>
					      <td width="400" height="40" align="center" valign="middle"> How much do you put off immediate gratification in order to achieve
long-term goals?</td>
				        </tr>
					    <tr style="background:#cccccc;">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Extraversion</strong></td>
					      <td width="400" height="40" align="center" valign="middle">How much do you turn to the outside world for stimulation and excitement?</td>
				        </tr>
					    <tr style="background:#eeeeee">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Agreeableness</strong></td>
					      <td width="400" height="40" align="center" valign="middle"> How much do you put others ahead of yourself?</td>
				        </tr>
					    <tr style="background:#cccccc;">
					      <td width="200" height="40" align="center" valign="middle"><strong>&nbsp;&nbsp;Neuroticism</strong></td>
					      <td width="400" height="40" align="center" valign="middle">How likely are you to bounce back from stressful events?</td>
				        </tr>
				      </table>
					  <br/>
								
					  </div>
                    </div>	
        </div>
       
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:205px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-3</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 3 End-->
     <!--Page NO. 4 -->
     <div style=" float:left; width:680px; margin-left:40px; border:1px solid #333333; height:1050px;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="margin-top: 100px;margin-bottom: 50px;margin-left: 20px;width:620;">
        <div style="float:left; width:100%; font-size:18px; color:#21C4C1; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">
                    	Your Interest Profile
                    </div>
                	<div style="float:left; width:100%; font-size:14px; color:#000; text-align:justify; line-height:22px; font-family:, Helvetica, sans-serif;  ">
                    	<p>Interests in a layman language can be "What you like to do?" You might like swimming,
reading or travelling and may not like fishing, meeting people etc. It refers to things or
activities that a person is curious or concerned about. They are subjects or qualities that
evoke his attention. They can be things that someone does as a pastime or a leisure activity
or those that he wants to have an occupation in. There are various interests that a person
might be enthusiastic about. Do not worry if the results here are not what you thought of.
Our idea is to let you know your real self!
<br/>
                        </p>
					<div style=" color:#333; font-size:14px;margin-top:20px;font-family:Arial, Helvetica, sans-serif; "><strong>The Interest Test you have taken maps you on the five traits. Read out in details here:</strong><br/>
								
					  </div>
                      
                      <div style=" color:#333; font-size:12px; margin-left:13px; margin-top: 20px;font-family:Arial, Helvetica, sans-serif; ">
                      <table width="600" border="0" bordercolor="#333333" cellspacing="0" cellpadding="0" >
                  <tr style="background:#eeeeee">
                    <td width="290" height="60" align="center" valign="middle"><strong>Realistic</strong></td>
                    <td width="290" height="60" align="center" valign="middle">People who

have atheletic 

or mechanical

ability, prefer 

to work 

with objects, 

machines,

tools, plants 

or to be 

outdoors.</td>
                  </tr>
                  <tr style="background:#cccccc;">
                    <td width="290" height="60" align="center" valign="middle"><strong>Investigative</strong></td>
                    <td width="290" height="60" align="center" valign="middle">People who like

to observe, learn, 

investigate, analyze, 

evaluate or solve 

problems.</td>
                  </tr>
                  <tr style="background:#eeeeee">
                    <td width="290" height="60" align="center" valign="middle"><strong>Artistic</strong></td>
                    <td width="290" height="60" align="center" valign="middle">People who

have artistic, 

innovating,

intuitional

abilities

and like 

to work in 

unstructure

d situations

using their

imagination

and 

creativity.</td>
                  </tr>
                  <tr style="background:#cccccc;">
                    <td width="290" height="60" align="center" valign="middle"><strong>Social</strong></td>
                    <td width="290" height="60" align="center" valign="middle">People who 

like to work 

with people 

to provide 

direct

services 

or helping 

opportun

ities like 

teaching,

coaching or 

counseling

and are 

drawn to 

social or 

humanistic

causes.</td>
                  </tr>
                  <tr style="background:#eeeeee">
                    <td width="290" height="60" align="center" valign="middle"><strong>ENTERPRISING</strong></td>
                    <td width="290" height="60" align="center" valign="middle">People who like

to work with 

people, influencing, 

persuading,

performing, leading 

or managing for 

organizational

goals or economic 

gains.</td>
                  </tr>
                  <tr style="background:#cccccc">
                    <td width="290" height="60" align="center" valign="middle"><strong>Conventional</strong></td>
                    <td width="290" height="60" align="center" valign="middle">People who like to 

work with data, have 

clerical or numeraical 

ability, carry out tasks 

in detail or follow 

though on others' 

instructions</td>
                  </tr>
                </table>
                      
                      </div>
                    </div>	
        </div>
       
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; margin-top:100px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-4</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 4 End-->
     <!--Page NO. 5-->
     <div style=" float:left; width:680px; margin-left:40px; border:1px solid #333333;">
        <div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:38px; padding-top:14px; text-align:right; font-size:18px; color:#fff;  font-family:Arial, Helvetica, sans-serif;">Profile Summary &nbsp;&nbsp;&nbsp;</div>
        <div style=" position:absolute; width:200px; height:139px; top:-17px; left:20%;  "><img src="./image/small.jpg" alt=""  /></div>                    
        
        <div style="float:left; width:100%; height:950px; " >
                <div style="float:left; width:95%; padding-left:10px; margin-bottom:30px; font-size:18px; color:#999; margin-top:100px;   font-family:Arial, Helvetica, sans-serif; ">
                    Dear Ragaav Arjun,
                </div>
                <div style="float:left; width:95%; padding-left:15px; font-size:14px; color:#999; text-align:justify; line-height:22px; font-family:Arial, Helvetica, sans-serif; margin-bottom:250px;   ">
                    <table width="580" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; ">
                    <tr >
                      <td width="145" height="40" align="center" valign="middle">&nbsp;</td>
                      <td width="145" height="40" align="center" valign="middle"><strong>High</strong></td>
                      <td width="145" height="40" align="center" valign="middle"><strong>Moderate</strong></td>
                      <td width="145" height="40" align="center" valign="middle"><strong>Low</strong></td>
                    </tr>
                    <tr style="background:#ececec;">
                      <td width="145" align="center" valign="middle"><p>Openness to
                      Experience</p></td>
                      <td width="145" align="center" valign="middle"><p>Creative &amp;
                        
                      Learning Oriented</p></td>
                      <td width="145" align="center" valign="middle"><p>Occasional 
                          
                          Opportunity for
                          
                          learning new
                          
                      things</p></td>
                      <td width="145" align="center" valign="middle"><p>Structured and set
                          
                      routine job</p></td>
                    </tr>
                    <tr>
                      <td width="145" align="center" valign="middle"><p>Conscientiousness</p></td>
                      <td width="145" align="center" valign="middle"><p>High level of
                          
                      responsibility</p></td>
                      <td width="145" align="center" valign="middle"><p>Average level of
                          
                      responsibility</p></td>
                      <td width="145" align="center" valign="middle"><p>No crucial
                          
                      responsibility role</p></td>
                    </tr>
                    <tr style="background:#ececec;">
                      <td width="145" align="center" valign="middle"><p>Extraversion</p></td>
                      <td width="145" align="center" valign="middle"><p>Team Work</p></td>
                      <td width="145" align="center" valign="middle"><p>Moderate
                          
                          involvement team
                          
                      work</p></td>
                      <td width="145" align="center" valign="middle"><p>Work 
                          
                          independently
                          
                      Quiet environment</p></td>
                    </tr>
                    <tr>
                      <td width="145" align="center" valign="middle"><p>Agreeableness</p></td>
                      <td width="145" align="center" valign="middle"><p>Highly cordial
                        
                        cooperative &amp; trustful 
                        
                      environment</p></td>
                      <td width="145" align="center" valign="middle"><p>Environment of 
                          
                      Cooperation and Trust</p></td>
                      <td width="145" align="center" valign="middle"><p>Competitive &amp;
                        
                      Target oriented</p></td>
                    </tr>
                    <tr style="background:#ececec;">
                      <td width="145" height="60" align="center" valign="middle">Neuroticism</td>
                      <td width="145" height="60" align="center" valign="middle">Less demanding &amp;
                        
                        Easy Going Job</td>
                      <td width="145" height="60" align="center" valign="middle">Average level
                        
                        of stress and
                        
                        pressure</td>
                      <td width="145" height="60" align="center" valign="middle">Demanding &amp; High
                        
                        Pressure Job</td>
                    </tr>
                  </table>
                
                </div>	
            
            </div>
        <div style="float:left; width:100%; background:#1acccc; color:#fff; padding-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;   text-align:right; height:25px; ">Note: This Report is confidential and is only indicative of preferred careers for you.      
<strong style="margin-left:10px;">P-5</strong> &nbsp;&nbsp;&nbsp;&nbsp;</div>	
     </div>
     <!--Page NO. 5 End-->
    
    </div>
    
</body>
</html>