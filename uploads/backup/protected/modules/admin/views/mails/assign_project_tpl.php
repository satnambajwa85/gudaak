


	<style>	
.grey{
	background-color:#999;
}
/*.mail_set{
	padding:30px 30px 50px 30px;
	width:635px;
	background:#ccc;
	border:1px solid #ebebeb;
	font-size:24px;
	font-weight:normal;
	color:#000;
	font-family: 'MyriadProRegular';
	margin-top:45px; 
}
.mail_logo{
	background:#ccc;	
}
.mail_logo i
\mg{
	width:100px;
	height:42px;
}
.mail_set span{
	color:#656565;
	font-style:italic;
}
.font_size
{
   font-size: 13px!important;   
}
.border_right
{
    border-right: 1px solid #C0CDD1;
 
}
.scope_class
{
    width: 99%;
    padding: 5px;
    border: 1px solid #CFD9DB;
    margin-top:10px;
    text-align: justify;
    
}
.languages_div
{
    padding: 2px;
    margin: 2px;
    background-color:#91C854 ;
    float:left;
}*/
</style>

<div class="grey">
    <table cellpadding="0" cellspacing="0" border="0" class="mail_set font_size" style="background:#fff; color:#333;width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; " >

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Hi <?php echo $name; ?>, <br />
		</td>	
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px; color:#000 !important;">
         
		 We have a possible project in our pipeline that we believe will be a good fit for you based upon your proven capabilities and skill set. 
         Please <a href="<?php echo Yii::app()->createAbsoluteUrl('supplier/rfp',array('render'=>'full','projectid'=>$id,'stat'=>$stat));?>">click here</a> to review the RFP,
         and please respond within the next 24 hours. You may accept the project right away, seek some clarification from the client or archive the project.  
        
        <?php 
        if(true)
        {
        ?>
         <table cellpadding="0" cellspacing="0" style="width: 100%;border: 1px solid #C0CDD1;margin-top: 10px;margin-bottom: 10px;" class="font_size">
            <tr style="background-color: #f5f5f5; font-size:13px;" >
                <td style="text-align: center;padding:8px 4px 8px 4px; color:#000;"><b>Request For Proposal</b></td>
            </tr>
         </table>
        <table cellpadding="8"  style="background-color: #f5f5f5; font-size:13px; width:100%;">
             <tr>
             <?php
             if(false)
             {
              ?>
                <td>
                    <?php
                    if($project->clientProjects->clientProfiles->image!="")
                    {
                        ?>
                        <img src="<?php echo $project->clientProjects->clientProfiles->image; ?>" width="150" />
                        <?php
                    }else{
                        ?>
                        <img src="http://venturepact.com/themes/adminre/main/style/images/logo@2x.png" width="150" />    
                        <?php
                    }
                     ?>
                    
                </td>
                <?php
                }
                 ?>
                
                <td>
                    
                    <b>Project : </b><?php echo $project->clientProjects->name; ?><br />
                    <b>Client : </b> <?php echo $project->clientProjects->clientProfiles->first_name." ".(isset($project->clientProjects->clientProfiles->last_name)?$project->clientProjects->clientProfiles->last_name:''); ?> <?php echo (!empty($project->clientProjects->clientProfiles->company_name)?" - ".$project->clientProjects->clientProfiles->company_name:''); ?><br />
                    <!--<b>Team Size :</b> <?php //echo (empty($project->clientProjects->clientProfiles->team_size)?"0":$project->clientProjects->clientProfiles->team_size); ?> Employees<br />-->
                    <b>Based in : </b><?php echo $project->clientProjects->clientProfiles->cities->name; ?>
        
                </td>
             </tr>
        </table>
        
         
         <hr />
         

         
         <table cellpadding="5" style="width: 100%;border: 1px solid #C0CDD1; font-size:13px;">
            <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff;">
                 <td class="border_right" style="padding-left:8px;">Requirement</td>
                 <?php if(count($project->clientProjects->clientProjectsHasServices) > 0) { ?>
                    <td align="center" class="border_right">Service Type</td>
                 <?php } ?>
                  <?php if(count($project->clientProjects->clientProjectsHasIndustries) > 0) { ?>
              <td align="center" class="border_right">Category</td>
                 <?php } ?>
                  <?php if(!empty($project->clientProjects->min_budget)){ ?>
              <td align="center" class="border_right">Budget</td>
                 <?php } ?>
                   <?php if(!empty($project->clientProjects->start_date)) { ?>
              <td align="center">Start Date</td>
                 <?php } ?>

            </tr>
            <tr style="background-color: #f8f8f8;">
                 <td class="border_right" style="padding-left:8px;" >	
                   <?php if(count($project_status) > 0){ ?>
                        	<?php
                        	foreach($project_status as $key=>$item)
        					{
        						if($key == "CS"){
        							foreach($item as $p){
        							?>
        						<?php echo $p;
									}
                                }
                             }
					 ?>


            <?php
            }
             ?>
                    
                 </td>
                 <?php
                 if(count($project->clientProjects->clientProjectsHasServices) > 0)
                 {
                  ?>
                     <td align="center" class="border_right">
                     	<?php
                            $totalServices = array();
                            foreach($project->clientProjects->clientProjectsHasServices as $service){
        
                                $totalServices []= " ".$service->services->name;
                             }
                            echo implode(',',$totalServices);
                        ?>
                     
                     </td>
                 <?php
                 }
                  ?>
                  <?php
                  if(count($project->clientProjects->clientProjectsHasIndustries) > 0)
                  {
                   ?>
                     <td align="center" class="border_right">
                         <?php 
                         
                         foreach($project->clientProjects->clientProjectsHasIndustries as $industry){ ?>
        					<?php echo $industry->industries->name.","; ?>
        				<?php } ?>
                     
                     </td>
                 <?php
                 }
                  ?>
                  <?php
                  if(!empty($project->clientProjects->min_budget))
                  {
                   ?>
                     <td align="center" class="border_right">
                        <?php echo "$".$project->clientProjects->min_budget." - $".$project->clientProjects->max_budget ; ?>
                     </td>
                 <?php
                 }
                  ?>
                  <?php
                  if(!empty($project->clientProjects->start_date))
                  {
                   ?>
                     <td align="center">
                        <?php echo date( "d-M-Y",strtotime($project->clientProjects->start_date)); ?>
                     </td>
                 <?php
                 }
                  ?>
            </tr>
         </table>        
         
         <table cellpadding="5"  style="width: 100%;border: 1px solid #C0CDD1;margin-top: 10px;margin-bottom:10px; font-size:13px">
            <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff; font-size:13px;">
                 <td style="padding-left:8px;">Scope</td>                 
            </tr>
           
              <tr style="background-color: #fff; font-size:13px;"  >
              	<td>
                	<?php echo $project->clientProjects->description; ?>
                </td>
              </tr> 
            
                    <?php 
					if(count($project->clientProjects->clientProjectFlows)>0){
					   ?>
                       <tr style="background-color: #fff; font-size:13px;"  >
                         <td>
                            <b>Flow</b><br />
                       <?php
                            foreach($project->clientProjects->clientProjectFlows as $step){ 
                                echo "Step".((int)$step->step + 1).":";                                     
                                echo $step->description; ?><br />                                        
                            <?php } ?>
                            </td>
                        </tr>
			         <?php }?>
            
           
                      	<?php if(!empty($project->clientProjects->clientProjectsHasSkills))
                          { ?>
                            <tr style="background-color: #f8f8f8; font-size:13px; " >
                                 <td>
                                      <b>Language Preferences</b><br />
                                 <?php
                                  $languages = "";
                            	   foreach($project->clientProjects->clientProjectsHasSkills as $skill){ 
                                       $languages .= ",".$skill->skills->name;
                                   }
                                   echo substr($languages,1,strlen($languages)) ;
                                  ?>
                                 </td>
                             </tr>     
                           <?php
                    	}?>
           
          
                     <?php if(count($project->clientProjects->projectReferences)>0){ 
                        ?>
                          <tr style="background-color: #fff; font-size:13px;  " >
                             <td>
                                <b>References</b><br /> 
                        <?php $refCount=1;foreach($project->clientProjects->projectReferences as $reference){ ?>
                            <a class="text-muted" target="_blank" href="//<?php echo $reference->details; ?>"><?php echo $reference->details ?></a> <?php echo (($refCount != count($project->clientProjects->projectReferences)?",":'')); ?>
                            <?php $refCount++; } ?>
                            
                              </td>
                           </tr>
                            
                        <?php
                        
                      }?>

             <?php
             
             //CVarDumper::Dump($project->clientProjects->clientProjectsQuestions,10,1);
             //echo $project->clientProjects->clientProjectDocuments[0]->path;
             if(count($project->clientProjects->clientProjectDocuments) > 0)
             {
              
              ?>
             <tr style="background-color: #fff;" >
                   
                    <td>
                    <b>Attachment</b><br />
                    <?php
                        for($i=0;$i < count($project->clientProjects->clientProjectDocuments);$i++){
                        ?>
                            <a href="<?php echo $project->clientProjects->clientProjectDocuments[$i]->path; ?>" class="btn btn-link <?php echo ($project->clientProjects->clientProjectDocuments[$i]->extension=='image/jpeg'?'magnific':'');?>" title="View" target="_blank"> <?php echo (empty($project->clientProjects->clientProjectDocuments[$i]->name)?"No-Name":$project->clientProjects->clientProjectDocuments[$i]->name); ?></a><br />
                          <?php
                         
                          }
                   ?>
                    </td>
                </tr>
            <?php
            }
             ?>
             
             
             <?php
             if(count($project->clientProjects->clientProjectsQuestions) > 0)
             {
                ?>
                <tr>
                    <td>
                        <b>Custom Questions</b><br />
                        <?php
                        for($j=0;$j<count($project->clientProjects->clientProjectsQuestions);$j++)
                        {
                            echo ($j+1).")".$project->clientProjects->clientProjectsQuestions[$j]->question."<br>";
                         
                        }
                         ?>
                    </td>
                </tr>
                <?php
             }
              ?>
             
             
             <?php 
             if(!empty($project->note))
             {
                ?>
                <tr style="background-color: #f8f8f8;" >
                     <td>
                        <b>Admin Note</b><br />
                        
                        <?php  
                            echo $project->note; 
                        
                         ?>
                     </td>
                </tr>
            <?php
            }
             ?>
         </table>   
         <?php
         }
          ?>
         <br />
		<br />
            Feel free to <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">schedule a call</a> if you would like to speak to us to answer and clarify any possible questions regarding the process, the project, or the client. 
		<br /><br />
       
		</td>	
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
        	All the best! <br />
        	VenturePact Team <br />
    		
        </td>	
	</tr>
</table>
</div>
