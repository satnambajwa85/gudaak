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
                      <td width="330" height="40" align="center" valign="middle"></td>
                    </tr>
                    
                     <tr style="background:#ececec;">
                      <td width="250" height="40" align="center" valign="middle">School</td>
                      <td width="330" height="40" align="center" valign="middle"></td>
                    </tr>
                     <tr >
                      <td width="250" height="40" align="center" valign="middle">Gudaak ID</td>
                      <td width="330" height="40" align="center" valign="middle"></td>
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