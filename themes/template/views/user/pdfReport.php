<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDF Design</title>
<style>
body{ margin:0; padding:0; }
#main_outer{ float:left; width:100%;}
.wrapper{ margin:0 auto; width:100%;}
</style>
</head>
<body>
	<div class="wrapper">
		<div style="float:left; width:100%; min-height:700px; " >
			<table width="800px" border="0" cellspacing="0" cellpadding="0" style=" font-family:Arial, Helvetica, sans-serif; color:#666; font-size:18px; ">
            	<tr>
                	<td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    Name
                    </td>
                   <td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    <?php echo $profile->first_name.' '.$profile->last_name;?>
					</td>
                </tr> 
                <tr>
                	<td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    Gender
                    </td>
                   <td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    <?php echo $profile->gender;?>
					</td>
                </tr> 
                <tr>
                	<td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    Date of birth
                    </td>
                   <td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    <?php echo $profile->date_of_birth;?>
					</td>
                </tr> 
                
                
                
                    <tr>
                	<td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    Class
                    </td>
                   <td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                   <?php echo $profile->userClass->title;?> 
					</td>
                </tr> 
                 <tr>
                	<td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    School
                    </td>
                   <td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                   <?php echo $profile->generateGudaakIds->schools->name;?>
					</td>
                </tr> 
                 <tr>
                	<td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                    Email
                    </td>
                   <td width="25%" align="center" valign="middle" style="border-left:1px solid #21C4C1; border-right:1px solid #21C4C1; border-top:1px solid #21C4C1; border-bottom:1px solid #21C4C1; ">
                   <?php echo $profile->email;?>	
					</td>
              </tr> 
           </table>
			<div style="float:left; width:95.50%; height:438px; margin:20% 20%; " >
           <?php foreach($reports as $report){?>
           		<div style="float:left; color: #21C4C1;width:95%; padding-left:3%; font-size:18px;  margin-top:10%;   font-family:Arial, Helvetica, sans-serif; "><?php echo $report['name'];?></div>
                <div style="float:left; width:95%; padding-left:3%; font-size:14px; color:#999; text-align:justify; line-height:22px; font-family:Arial, Helvetica, sans-serif;  "><?php echo $report['description'];?></div>
                <?php if($report['id']==3){?>
                	<div style="margin-top:50px;">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e4e4e4; font-family:Arial, Helvetica, sans-serif; color:#666; font-size:18px; ">
                        	<?php foreach($report['results1'] as $result){?>
                            <tr>
                            	<td width="20%" height="40" style="color:#999;" ><?php echo $result['title'];?></td>
                                <td width="20%" height="40" ></td>
                                <td width="80%" height="40" >
                                <?php 	if($result['id']==13){$color='88AB45';}
										if($result['id']==12){$color='C468DE';}
										if($result['id']==10){$color='1A8FCC';}
										if($result['id']==8){$color='1ACCCC';}
										if($result['id']==9){$color='1acca4';}?>
                                    <div style="background: none repeat scroll 0 0 #FFFFFF;border: 1px solid #CCCCCC;float: left;height: 25px; margin-bottom: 10px;width: 85%;">
                                    	<div style="width:<?php echo ($result['score']/0.4);?>%;background: none repeat scroll 0 0 #<?php echo $color;?>;float: left;height: 25px;"></div>
                                    </div>
								</td>
							</tr>
                            <?php  }?>
                          </table>
                      </div>
                      <?php } ?>
                <?php foreach($report['results'] as $result){?>
                	<div style="float:left; color: #999;width:95%; padding-left:3%; font-size:18px;  margin-top:10%;   font-family:Arial, Helvetica, sans-serif; "><?php echo ($report['id']==3)?$result['title']:$result['title2'];?></div>
                    <div style="float:left; width:100%; padding-left:3%; font-size:14px; color:#999; text-align:justify; line-height:22px; font-family:Arial, Helvetica, sans-serif;  "><?php echo $result['description'];?></div>
                    <hr />
				<?php } ?>
                <div>
                <?php	$listArr	=	array();
					foreach($report['results'] as $result){
						if($report['id']==3){
							$listCar	=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
							$streams	=	array();
							foreach($listCar as $subCat){
								$subCa		=	StreamHasCareer::model()->findAllByAttributes(array('career_id'=>$subCat->id));
								foreach($subCa as $subjects){
									$streams[]=$subjects->stream_id;
								}
							}
							$streamList		=	Stream::model()->findAllByAttributes(array('id'=>$streams));
							foreach($streamList as $streamRec){
								if(!in_array($streamRec->id,$listArr)){
									$listArr[]=$streamRec->id;?>
                                    <div class="col-md-4 pd0  fl">
                                    	<div class="col-md-12 pdleft fl career-lib">
                                        <?php	$filename = ''.$streamRec->image.'';
												$path=Yii::getPathOfAlias('webroot.uploads.stream.small') . '/';
												$file=$path.$filename;
												if (file_exists($file)){
													echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/stream/small/'.$streamRec->image.'"/>',array('user/stream','id'=>''.$streamRec->id.''),array('class'=>'fl'));
												}else{
													echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/stream/small/noimage.jpg"/>',array('user/stream','id'=>''.$streamRec->id.''),array('class'=>'fl'));
												} ?>
                                                <div class="clear"></div>
                                                <?php echo CHtml::link('<h1>'.substr($streamRec->name,0,20).'..</h1>',array('user/stream','id'=>''.$streamRec->id.''),array('title'=>$streamRec->name));?>
                                                <div><?php echo substr($streamRec->description,0,70);?></div>
											</div>
                                       </div>
								<?php }
							}
						}
					}?>
                </div>
                <div class="clear"></div>
            <?php } ?>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div style="float:left; width:100%; margin-top:5%; background:#1acccc; height:40px; padding-top:14px; text-align:right; font-size:18px; color:#fff; padding-right:10%; font-family:Arial, Helvetica, sans-serif;">Profile Summary&nbsp;
			<div style=" position:absolute; width:200px; height:139px; top:14px; left:15%;"><!--<img src="images/small.jpg" alt=""  />--></div>
        </div>
        <div style="float:left; width:100%; min-height:700px; " >
        	<div style="float:left; width:95%; padding-left:3%; font-size:18px; color:#666; margin-top:10%;   font-family:Arial, Helvetica, sans-serif; ">Dear Ragaav Arjun,</div>
            <div style="float:left; width:95%; padding-left:3%; font-size:14px; color:#999; text-align:justify; line-height:22px; font-family:Arial, Helvetica, sans-serif;  ">
            	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            </div>	
            <div style="float:left; width:100%; margin:5% 3%; " >
            	<table width="800px" border="0" cellspacing="0" cellpadding="0" style=" font-family:Arial, Helvetica, sans-serif; color:#666; font-size:18px; ">
                	<tr>
                    	<td width="50%" height="40" align="center" valign="middle" bgcolor="#1acccc" style=" -webkit-border-top-left-radius: 5px;-moz-border-radius-topleft: 5px;border-top-left-radius: 5px; border-right:1px solid #e4e4e4; color:#fff; ">Interest</td>
                        <td width="50%" height="40" align="center" valign="middle" bgcolor="#1acccc" style="border-right:1px solid #e4e4e4;  color:#fff;">Personality</td>
                        <td width="2000px" height="40" align="center" valign="middle" bgcolor="#1acccc" style="border-right:1px solid #e4e4e4;  color:#fff; ">Skills</td>
                    </tr>
                    <tr>
                    	<td width="25%" align="center" valign="middle" style="border-left:1px solid #e4e4e4; border-right:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4; ">Artistic</td>
                        <td width="20%" align="center" valign="middle" style="border-right:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4;">Imaginative</td>
                    </tr>
                    <tr>
                    	<td width="25%" align="center" valign="middle" style="border-left:1px solid #e4e4e4; border-right:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4; ">Social</td>
                        <td width="20%" align="center" valign="middle" style="border-right:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4;">Deliberate</td>
                    </tr>
                    <tr>
                    	<td width="25%" align="center" valign="middle" style="border-left:1px solid #e4e4e4; border-right:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4; ">Conventional</td>
                        <td width="20%" align="center" valign="middle" style="border-right:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4;">Passive</td>
                  	</tr>
               </table>
           </div>  
            <div style="float:left; width:100%; margin:5% 0 15% 0;">
            	<div style=" float:left; width:212px; height:159px;"><!--<img src="images/img_whitebg.jpg" alt="" />--></div>
                <div style="float:left; width:100%; height:159px; background:#1acccc; padding-right:8px; text-align:right; vertical-align:middle;">
                	<div style="text-align:center; width:50%; margin-right:2%; color:#fff; font-size:17px; line-height:22px; font-family:Arial, Helvetica, sans-serif; margin-top:7%;">
                    Call: +91 8786 76545, +91 7654 763592 <br/>
                    Email: info@gudaak.com &nbsp;&nbsp; Website: www.gudaak.com 
                	</div>
            	</div>
        	</div>
        </div>
    	<div style="float:left; width:100%; background:#1acccc; height:30px;"></div>
    </div>    
</body>
</html>
