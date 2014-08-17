<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'project-form','enctype' => 'multipart/form-data','class'=>"",'data-parsley-validate'=>'data-parsley-validate'))); ?>
<!-- START Basic Template Container -->
<section class="container-fluid" >
	<!-- Page Header -->
    
    <div class="page-header page-header-block pb0 pt15">
        <div class="page-header-section pt5">
            <ol class="breadcrumb" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
				<li class="text-info">Job Scope</li>
                <li class="active">The Basics</li>
            </ol>
        </div>
    </div>
    <!--/ Page Header -->
    <!-- START row -->
    <div class="row">

<div class="col-md-12">
<div class="alert alert-dismissable alert-info">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
<strong>Thanks for posting the job scope.</strong> You can see the service providers proposals <a href="<?php echo CController::createUrl("/client/compare",array('id'=>$project->id));?>"><strong>Here</strong></a></div>
</div>
    
    
        <div class="col-md-12">
         <div class="panel panel-default form-horizontal form-bordered mb50">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">The Basics</h3>
                </div>
                <!--/ panel heading/header -->
                <!-- panel body -->
                <div class="panel-body pb0" id="basicProject">
                    <div class="form-group">
                        <label class="col-sm-4 control-label bm15">Q. What are you looking for? <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                        <?php foreach($currentStatus as $data){?>
                            <span class="radio-inline custom-radio custom-radio-primary">
                            <input type="radio" name="current_status" id="customService<?php echo $data->id;?>" value="<?php echo $data->id;?>" <?php echo ($project->current_status==$data->id)?'checked':'';?> class="testSatnam" >
                            <label for="customService<?php echo $data->id;?>">&nbsp;&nbsp;<?php echo $data->name;?></label>
                            </span>
                        <?php }?> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                            <label class="col-sm-4 control-label">Q. Please give your job a title. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <?php echo $form->textField($project,'name',array('placeholder'=>"",'class'=>'form-control required','disabled'=>'disabled','required'=>'required')); ?>
                            </div>
                        </div>
					
                        

					<!-- new design -->
					<div class="form-group <?php echo ($project->current_status==1)?'hide':'';?>" id="teamPart">
						<label class="col-sm-4 control-label bm15">Q. Please choose a category (Select one). <span class="text-danger">*</span></label>
						<div class="col-sm-8 groupMain">
                            <select id="satnam-services" class="form-control required" placeholder="Select Service.." multiple name="Services[]" disabled="disabled">
                            <?php foreach($services as $service){?>
                            <option value=" <?php echo $service->id;?>" <?php echo (in_array($service->id,$selecetedServices))?'selected="selected"':'';?>>
								<?php echo $service->name;?>
                            </option>
                            <?php } ?>
                            </select>	
                        	</div>
                        </div>
                    <!-- new design --> 
                        
                     <div class="form-group border-top">
                            <label class="col-sm-4 control-label">Q. Language or skill preference. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">

								<select id="satnam-start" class="form-control required" placeholder="Select Languages..." multiple name="Skills[]" data-parsley-id='126' disabled="disabled">
									<?php foreach($skills as $skill){
										if($skill->skillscol !=0 ||  (in_array($skill->id,$selecetedSkills))){?>
									<option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
										<?php echo $skill->name;?>
                                    </option>
									<?php }} ?>
								</select>
                                <div><ul class="parsley-errors-list" id="parsley-id-126"></ul>
                                <small class="help-block">If the job requires work on an existing application, select the language its built in. If you need design help please add design here, Type 'Not sure' if you are unsure.</small>
                                </div>
                            </div>
                        </div>
                        
                     
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Q. Start Date. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            	<?php echo $form->textField($project,'start_date',array('value'=>(isset($project->start_date))?date('m/d/Y',strtotime($project->start_date)):'','placeholder'=>"Select a date",'id'=>'satnamDate','disabled'=>'disabled','class'=>'form-control required')); ?>
                            </div>
                        </div>
                        
                          
                       <div class="form-group border-top">
                            <label class="col-sm-4 control-label">Q. Please summarize the job in your own words. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                               <?php echo $form->textArea($project,'description',array('placeholder'=>"",'class'=>'form-control required','required'=>'required','rows'=>'3','disabled'=>'disabled')); ?>
                               <?php echo $form->hiddenField($project,'other_status',array('placeholder'=>"",'id'=>'other_status')); ?>
                            </div>
                        </div>
                       
                                            
                                  
                </div>
                <!-- panel body -->
				<div class="panel-body pb0">
                <div class="form-group border-top">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4 pl0">Q. Where do you want your service providers to be located? <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                                    
                                    <span class="radio-inline custom-radio custom-radio-primary satnam">
                                    
                                    <input type="radio" data-parsley-id="5322" data-parsley-multiple="a" name="ClientProjects[preferences]" id="customradio1" value="no-preferences" <?php echo ($project->preferences=='no-preferences')?'checked="checked"':'';?> class="budgetClass" disabled="disabled" >
                                    <label for="customradio1">&nbsp;&nbsp;No preference</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                    <input type="radio" data-parsley-id="4433" data-parsley-multiple="a" value="city" name="ClientProjects[preferences]" id="customradio2" <?php echo ($project->preferences=='city')?'checked="checked"':'';?> class="budgetClass" disabled="disabled" >
                                    <label for="customradio2">&nbsp;&nbsp;In my city</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                    <input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="country" name="ClientProjects[preferences]" id="customradio3" <?php echo ($project->preferences=='country')?'checked="checked"':'';?> class="budgetClass" disabled="disabled" >
                                    <label for="customradio3" class="iphone_chg1">&nbsp;&nbsp;In my country</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                     <span class="radio-inline custom-radio custom-radio-primary">
									<input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="regoin" name="ClientProjects[preferences]" id="customradio4" <?php echo ($project->preferences=='regoin')?'checked="checked"':'';?> class="budgetClass" disabled="disabled"  >
                                    <label for="customradio4" class="iphone_chg1">&nbsp;&nbsp;In these regions</label>
												</span>
                                <div style="height: auto;" id="regions" class="col-sm-12 panel-collapse collapse <?php echo ($project->preferences=='regoin')?'in':'';?> pl0 pr0">
									<div class="panel-body mt15 pl0">
										 <?php 
										$regions	=	Countries::model()->findAllBYAttributes(array('status'=>'1'));
										foreach($regions as $region){?>
										<div data-toggle="buttons" class="btn-group mb10 mr10"> 
											<label class="btn btn-sm btn-default active_success btn_new btn_rounded <?php echo (in_array($region->id,$selecetedRegions))?'active':'';?>" >
											<input type="checkbox" id="option<?php echo $region->id;?>" name="options[]" value="<?php echo $region->id;?>"  <?php echo (in_array($region->id,$selecetedRegions))?'checked="checked"':'';?> class="tireSelectuion" disabled="disabled" /><?php echo $region->name;?></label>
										</div>
										<?php }?>
									</div>
								</div>    
                            </div>
						</div>
                </div>
                <div class="form-group">        
                    <div class="col-md-12">
                        <div class="panel-toolbar-wrapper pl0 pt5 pb5 border-none bg-none">
                                <div class="panel-toolbar">
                                    <label class="control-label mb-15">Q. Given your geographical preferences, the following pricings are available. Please select those that match your budget. <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        <div class="panel panel-default">
                            <div id="satnamBugdet">
								 <?php $this->renderPartial('_budget1', array('list'=>$list,'sel'=>$selecetedTier,'preference'=>$project->preferences,'city'=>$project->clientProfiles->cities->name,'countryName'=>$project->clientProfiles->cities->states->name));?>
								<?php //$this->renderPartial('_budget1', array('list'=>$list,'sel'=>$selecetedTier));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo ($project->current_status==1)?'hide':'';?>" id="developerPart">    
                    <div class="col-md-12">
                    	<div class="form-group mt20 mb10">
                            <label class="col-sm-4 control-label bm15">Q. Given your selection above, what is the range of your TOTAL budget? <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            	<div class="col-md-3 pl0 margin_bottom">
                                    <div class="col-md-2 input-group">
                                        <span class="input-group-addon">$</span>
                                        <?php echo $form->textField($project,'min_budget',array('placeholder'=>"Min",'class'=>'form-control','disabled'=>'disabled')); ?>
                                    </div>
                                </div>
                                <div class="col-md-3 pl0">
                                    <div class="col-md-2 input-group">
                                        <span class="input-group-addon">$</span>
                                        <?php echo $form->textField($project,'max_budget',array('placeholder'=>"Max",'class'=>'form-control','disabled'=>'disabled')); ?>
                                    </div>
                                </div>
                            	
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="form-group" style="background: beige;">
                            <label class="col-sm-4 control-label">Q. Please upload any mockups, designs or other documentation that will help us better understand your needs. <span class="text-danger"></span></label>
                            
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" readonly="" class="form-control" data-parsley-id="3057"><ul class="parsley-errors-list" id="parsley-id-3057"></ul>
                                    <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span> <a href="javascript:void();" style="color:#FFF;" id="openBrow">Browse </a>
                                            
                                        </div>
                                    </span>
                                </div>
                               
                            </div>
                            <div class="col-sm-8 pull-right mt15">
                              <table class="table table-striped">
                                                    <tbody id="ClientProjects_mockup">
                                                        
                             	<?php 
											if(count($project->clientProjectDocuments)>0){
												foreach($project->clientProjectDocuments as $doc){?>
													<tr>
                                                    <td class="client_basic">
                                                       <span class="label label-success"><?php echo $doc->type;?></span> <?php echo $doc->name;?> (<?php echo round($doc->size/(1024));?> KB)
                                                    </td>
                                                    <td><a href="javascript:OpenFile('<?php echo $doc->path;?>',400,500)">View</a></td>
                                                        </tr>
                                             	<?php }
											}?>
                                    </tbody></table>
                               
                                
                             </div>
                      </div>
                
            </div>
            	<div class="panel-footer">
					<button type="button" id="productScopeSave" style="cursor: default !important;" class="btn btn-teal btn-lg pull-right ml10 f_s13">Submitted</button>
					
                </div>
			
            </div>
        </div>
    </div>
    <!--/ END row -->
    
</section>

<!--/ END Basic Template and Start Progress Container -->


<?php $this->endWidget(); ?>

<div id="bs-modal" class="modal fade ">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header text-center "> 
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3 class="semibold modal-title">Terms &amp; Conditions </h3>
                              
                            </div>
                            <div class="modal-body">
                              <div class="panel-body">
                             
                                  
                                    <p class="pb10">This Privacy Policy governs the manner in which VenturePact LLC.   collects, uses, maintains and discloses information collected from users   (each, a "User") of the VenturePact.com website ("Site"). This privacy   policy applies to the Site and all products and services offered by   VenturePact LLC.<br>
                                      <br>
                                      <strong class="text-primary">Personal identification information</strong><br>
                                      <br>
We may collect personal identification information from Users in a   variety of ways, including, but not limited to, when Users visit our   site, register on the site, fill out a form, and in connection with   other activities, services, features or resources we make available on   our Site. Users may be asked for, as appropriate, name, email address.   Users may, however, visit our Site anonymously. We will collect personal   identification information from Users only if they voluntarily submit   such information to us. Users can always refuse to supply personally   identification information, except that it may prevent them from   engaging in certain Site related activities.<br>
<br>
<strong class="text-primary">Non-personal identification information</strong><br>
<br>
We may collect non-personal identification information about Users   whenever they interact with our Site. Non-personal identification   information may include the browser name, the type of computer and   technical information about Users means of connection to our Site, such   as the operating system and the Internet service providers utilized and   other similar information.<br>
<br>
<strong class="text-primary">How we use collected information</strong><br>
<br>
The VenturePact LLC may collect and use Users personal information for the following purposes:<br>
<br>
- To personalize user experience We may use information in the aggregate   to understand how our Users as a group use the services and resources   provided on our Site. <br>
- To send periodic emails If User decides to opt-in to our mailing list,   they will receive emails that may include company news, updates,   related product or service information, etc. If at any time the User   would like to unsubscribe from receiving future emails, they may do so   by contacting us via our Site.<br>
<br>
<strong class="text-primary">How we protect your information</strong><br>
<br>
We adopt appropriate data collection, storage and processing practices   and security measures to protect against unauthorized access,   alteration, disclosure or destruction of your personal information,   username, password, transaction information and data stored on our Site.<br>
<br>
<strong class="text-primary">Sharing your personal information</strong><br>
<br>
We do not sell, trade, or rent Users personal identification information   to others. We may share generic aggregated demographic information not   linked to any personal identification information regarding visitors and   users with our business partners, trusted affiliates and advertisers   for the purposes outlined above.<br>
<br>
<strong class="text-primary">Third party websites</strong><br>
<br>
Users may find advertising or other content on our Site that link to the   sites and services of our partners, suppliers, advertisers, sponsors,   licensors and other third parties. We do not control the content or   links that appear on these sites and are not responsible for the   practices employed by websites linked to or from our Site. In addition,   these sites or services, including their content and links, may be   constantly changing. These sites and services may have their own privacy   policies and customer service policies. Browsing and interaction on any   other website, including websites which have a link to our Site, is   subject to that website's own terms and policies.<br>
<br>
<strong class="text-primary">Compliance with children's online privacy protection act</strong><br>
<br>
Protecting the privacy of the very young is especially important. For   that reason, we never collect or maintain information at our Site from   those we actually know are under 13, and no part of our website is   structured to attract anyone under 13.<br>
<br>
<strong class="text-primary">Changes to this privacy policy</strong> VenturePact LLC has the discretion to update this privacy policy at any   time. When we do, we will post a notification on the main page of our   Site. We encourage Users to frequently check this page for any changes   to stay informed about how we are helping to protect the personal   information we collect. You acknowledge and agree that it is your   responsibility to review this privacy policy periodically and become   aware of modifications.<br>
<br>
<strong class="text-primary">Your acceptance of these terms</strong> By using this Site, you signify your acceptance of this policy. If you   do not agree to this policy, please do not use our Site. Your continued   use of the Site following the posting of changes to this policy will be   deemed your acceptance of those changes.<br>
<br>
<strong class="text-primary">Contacting us</strong><br>
<br>
If you have any questions about this Privacy Policy, the practices of   this site, or your dealings with this site, please contact us at:<br>
<br>
<a href="mailto:questions@venturepact.com">questions@venturepact.com </a></p>
                                   
                 </div>
                            </div>
                           
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>

<script type="text/javascript">
$('input').attr("disabled",'disabled');
$("#satnam-start").selectize();
$("#satnam-services").selectize();
$(document).ready(function() {$("#satnamDate").datepicker();})
$('input').attr("readonly",'readonly');
$("#basicSave").click(function(){$('#basicProject').addClass('hide');$('#productScope').removeClass('hide');$("#ProductScope"+<?php echo $project->id;?>).addClass("active");$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").addClass("activeLink");$("#Budget<?php echo $project->id;?>").removeClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");$('html,body').scrollTop(0);});
$("#productScopeSave").click(function(){$('#productScope').addClass('hide');$('#budgetProject').removeClass('hide');$("#Budget"+<?php echo $project->id;?>).addClass("active");$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");$("#Budget<?php echo $project->id;?>").addClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");$('html,body').scrollTop(0);});
$('#productScopeBack').click(function(){$('#productScope').addClass('hide');$('#basicProject').removeClass('hide');$("#Basic<?php echo $project->id;?>").addClass("activeLink");$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");$("#Budget<?php echo $project->id;?>").removeClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");$('html,body').scrollTop(0);});
$("#budgetSave").click(function(){$('#budgetProject').addClass('hide');$('#questionProject').removeClass('hide');$("#Questions"+<?php echo $project->id;?>).addClass("active");$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");$("#Budget<?php echo $project->id;?>").removeClass("activeLink");$("#Questions<?php echo $project->id;?>").addClass("activeLink");$('html,body').scrollTop(0);});
$('#budgetBack').click(function(){$('#budgetProject').addClass('hide');$('#productScope').removeClass('hide');$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").addClass("activeLink");$("#Budget<?php echo $project->id;?>").removeClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");$('html,body').scrollTop(0);});
$("#finalSave").click(function(){$('html,body').scrollTop(0);});
$('#finalBack').click(function(){$('#questionProject').addClass('hide');$('#budgetProject').removeClass('hide');$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");$("#Budget<?php echo $project->id;?>").addClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");$('html,body').scrollTop(0);});
(function($){
$(".questionsshow_sd").on("click",function(){$("#sd_main").click();});
$(".questionsshow_it").on("click",function(){$("#it_main").click();});
$("#customcheckbox_p4").on("click",function(){$("#main_regions").click();});
$("#customradio4").on("change", function(){
	if($("#customradio4").is(":checked")){
		$("#regions").show();
		var regions	=	[];
		$("input[name='options[]']:checked").each( function () {
			regions.push($(this).val());
		});
		getData($(this).val(),regions);
	}
})
$("#customcheckbox_pref4").on('click',function(){$('#satnam').click();})
$(".questionsshow_sd").on('click',function(){$('#sd_main').click();});
$(".questionsshow_it").on('click',function(){$('#it_main').click();});
$('.groupSD').find(':radio:checked').each(function (){$('#sd_overview').show()});
$('.groupITS').find(':radio:checked').each(function (){$('#it_overview').show()});

	})(jQuery);
</script>
