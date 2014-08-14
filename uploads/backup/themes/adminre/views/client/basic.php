<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/page1.js"></script>
<?php if(Yii::app()->controller->action->id=="project"){
	/*echo '<script>$(document).ready(function(){$("html,body").scrollTop($("#accordion1").offset().top-50);});</script>';*/
}
else
{
echo '<script>$(document).ready(function(){$("html,body").scrollTop(0);});</script>';
}
?>

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'project-form','enctype' => 'multipart/form-data'))); ?>
<!-- START Basic Template Container -->
<section class="container-fluid" >

	<!-- Page Header -->
    <div class="page-header page-header-block pb0 pt15">
        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
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
         <div class="panel panel-default form-horizontal form-bordered mb50">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">Job Scope:</h3>
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
                    
					<div class="form-group border-top">
                            <label class="col-sm-4 control-label">Q. Please give your job a title.<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <?php echo $form->textField($project,'name',array('placeholder'=>"Ex: e-Commerce app for fashion brand",'class'=>'form-control required minlength','length'=>"3",'data-parsley-id'=>'123')); ?>
                                    <ul class="parsley-errors-list" id="parsley-id-123"></ul>
                                  </div>
                        </div>
                    
                    
                    
                     <!-- new design -->
					<div class="form-group teamPart <?php echo ($project->current_status==1)?'hide':'';?>">
						<label class="col-sm-4 control-label bm15">Q. Please select a category. <span class="text-danger">*</span></label>
						<div class="col-sm-8 groupMain">
                            <select id="satnam-services" class="form-control required" placeholder="Ex: Web app, iOS app, ERP" multiple="multiple" name="Services[]" data-parsley-id='126'>
                            <?php foreach($services as $service){?>
                            <option value=" <?php echo $service->id;?>" <?php echo (in_array($service->id,$selecetedServices))?'selected="selected"':'';?>>
								<?php echo $service->name;?>
                            </option>
                            <?php } ?>
                            </select>	
                        	</div>
                        </div>
                    <!-- new design -->
                      
					<div class="form-group border-top" >
                            <label class="col-sm-4 control-label">Q. Do you have a language or skill preference. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">

								<select id="satnam-start" class="form-control required" placeholder="Yii, Rails, Oracle SQL" multiple name="Skills[]" data-parsley-id='126'>
									<?php foreach($skills as $skill){
										if($skill->skillscol !=0 ||  (in_array($skill->id,$selecetedSkills))){?>
									<option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
										<?php echo $skill->name;?>
                                    </option>
									<?php }} ?>
								</select>
                                <div><ul class="parsley-errors-list" id="parsley-id-126"></ul>
                                <small class="help-block">If the job requires work on an existing application, select the language its built in. If you need design, select 'Design' as well. Select 'Not sure' if you are unsure.</small>
                                </div>
                            </div>
                        </div>
                        
					
					
					

					<div class="form-group">
                            <label class="col-sm-4 control-label">Q. Start Date. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            	<?php echo $form->textField($project,'start_date',array('value'=>(isset($project->start_date))?date('m/d/Y',strtotime($project->start_date)):'','placeholder'=>"Select a date",'id'=>'satnamDate','class'=>'form-control required','data-parsley-id'=>'124')); ?>
                                    <ul class="parsley-errors-list" id="parsley-id-124"></ul>
                                    <small class="help-block">This helps service providers better plan for the project.
</small>
                            </div>
                        </div>
                        
					
					<div class="form-group border-top">
                            <label class="col-sm-4 control-label">Q. Please summarize the job. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                               <?php echo $form->textArea($project,'description',array('placeholder'=>"Ex: We want to build an ecommerce web application selling women’s purses online. We need a landing page, a product listings page, a product page and a standard checkout process. Budget permitting, we may build social logins and referral programs. The site will be design heavy as it is a fashion website.",'class'=>'form-control required','required'=>'required','rows'=>'6', 'maxlength'=>"3000",'data-parsley-id'=>'125','data-container'=>"body",'id'=>"bsummary")); ?>
                                    <ul class="parsley-errors-list" id="parsley-id-125"></ul>
                               <small class="help-block">Try to outline the job, the business problem at hand & your expectations. Please limit your response to 50-150 words.</small>
                                
                                                                
                               <?php echo $form->hiddenField($project,'other_status',array('placeholder'=>"",'id'=>'other_status')); ?>
                            </div>
                        </div>
                        
                </div>
                <!-- panel body -->
				<div class="panel-body pb0" id="productScope">
                <div class="form-group  border-top">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4 pl0">Q. Where do you want your developer(s) to be located? <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                        	<span class="radio-inline custom-radio custom-radio-primary satnam">
                                    
                                    <input type="radio" data-parsley-id="5322" data-parsley-multiple="a" name="ClientProjects[preferences]" id="customradio1" value="no-preferences" <?php echo ($project->preferences=='no-preferences')?'checked="checked"':'';?> class="budgetClass" >
                                    <label for="customradio1">&nbsp;&nbsp;No preference</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                    
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                    <input type="radio" data-parsley-id="4433" data-parsley-multiple="a" value="city" name="ClientProjects[preferences]" id="customradio2" <?php echo ($project->preferences=='city')?'checked="checked"':'';?> class="budgetClass disabled" data-toggle="modal" <?php echo (Yii::app()->user->profileStatus==0)?'data-target="#bs_new"':'';?> >
                                    <label for="customradio2">&nbsp;&nbsp;In my city</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                    <input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="country" name="ClientProjects[preferences]" id="customradio3" <?php echo ($project->preferences=='country')?'checked="checked"':'';?> class="budgetClass disabled" data-toggle="modal"  <?php echo (Yii::app()->user->profileStatus==0)?'data-target="#bs_new"':'';?>>
                                    <label for="customradio3" class="iphone_chg1">&nbsp;&nbsp;In my country</label> 
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    <li>Activate to this </li>
                                    </ul>
                                     <span class="radio-inline custom-radio custom-radio-primary">
									<input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="regoin" name="ClientProjects[preferences]" id="customradio4" <?php echo ($project->preferences=='regoin')?'checked="checked"':'';?> class="budgetClass"  >
									<label for="customradio4" class="iphone_chg1">&nbsp;&nbsp;In these regions</label>
								</span>
                                <?php if(Yii::app()->user->profileStatus==0){?>
									<!-- <div style="height: auto;" class="col-sm-8 pa10"></div>-->
                                <?php } ?>
                                <div style="height: auto;" id="regions" class="col-sm-12 panel-collapse collapse <?php echo ($project->preferences=='regoin')?'in':'';?> pl0 pr0">
                                        <div class="panel-body mt0 pl0 satnamAction">
                                            <?php 
											$regions	=	Countries::model()->findAllBYAttributes(array('status'=>'1'));
											foreach($regions as $region){?>
                                            <div data-toggle="buttons" class="btn-group mb10 mr10"> 
                                                <label class="btn btn-sm btn-default active_success btn_new btn_rounded <?php echo (in_array($region->id,$selecetedRegions))?'active':'';?>" >
                                                <input type="checkbox" id="option<?php echo $region->id;?>" name="options[]" value="<?php echo $region->id;?>"  <?php echo (in_array($region->id,$selecetedRegions))?'checked="checked"':'';?> class="tireSelectuion" /><?php echo $region->name;?></label>
                                            </div>
                                            <?php }?>
                                            
                                        </div>
                                    </div>
                                    
                            </div>
					</div>
                </div>
                <div class="form-group">    
                    <div class="col-md-12 mt15">
                            <div class="panel-toolbar pl0 pt5 pb5 border-none bg-none">
                                <div class="panel-toolbar">
                                    <label class="control-label mb-15">Q. Given your geographical preferences, the following pricings are available. Please select those that match your budget. <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div novalidate action="" data-parsley-validate="" class="panel panel-default mt10">
                                
                                <div id="satnamBugdet">
                             	   <?php $this->renderPartial('_budget', array('list'=>$list,'sel'=>$selecetedTier,'preference'=>$project->preferences,'city'=>$project->clientProfiles->cities->name,'countryName'=>$project->clientProfiles->cities->states->name));?>
                                </div>
                                
                            </div>
                            <ul class="parsley-errors-list" id="parsley-id-tier-224"></ul>
                            </div>
                </div>
                <div class="form-group teamPart <?php echo ($project->current_status==1)?'hide':'';?> ">
                    <div class="col-md-12">
                                <div class="form-group mt20 mb100">
                                    <label class="col-sm-4 control-label bm15">Q. Given your selection above, what is the range of your TOTAL budget? <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="col-md-3 pl0 margin_bottom">
                                        	<div class="col-md-2 input-group">
                                                <span class="input-group-addon">$</span>
                                                <?php echo $form->textField($project,'min_budget',array('placeholder'=>"Min",'class'=>'form-control number required from','data-parsley-id'=>'129')); ?>
                                   
                                            </div>
                                            <ul class="parsley-errors-list" id="parsley-id-129"></ul>
                                        </div>
                                        <div class="col-md-3 pl0">
                                            <div class="col-md-2 input-group">
                                                <span class="input-group-addon">$</span>
                                                <?php echo $form->textField($project,'max_budget',array('placeholder'=>"Max",'class'=>'form-control number required to','data-parsley-id'=>'130')); ?>
                                           </div>
                                           <ul class="parsley-errors-list" id="parsley-id-130"></ul>
                                        </div>
                                        <div class="col-md-12 pl0 pr0">
                                        	<small class="help-block">If you are not sure about your budget, feel free to  <script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
<div style="display:none;"><script id="hideScript">var hideButton = new timelyButton('vp', { buttonId: 'hideScript' });</script></div>
<a href="#" onclick="hideButton.start();">Schedule a Call</a> to talk to a software architect and get an estimate.</here></small>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                </div>
                
                <div class="form-group" style="background: beige;">
                            <label class="col-sm-4 control-label">Q. Please upload any mockups, designs or other documentation that will help us better understand your needs. <span class="text-danger"></span></label>
                            
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" data-parsley-id="3057">
                                    <ul class="parsley-errors-list" id="parsley-id-3057"></ul>
                                    <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                        <span class="icon iconmoon-file-3"></span> <a href="javascript:void(0)" style="color:#FFF;" id="openBrow">Browse </a>
                                        </div>
                                    </span>
                                </div>
                               
                            </div>
                            <div class="col-sm-6">
                            	<small class="help-block">
                                                Your IP will remain secure. Please note the following in this regard:
                                                <ul>
												<li class="list">All service providers on VenturePact are legally bound by a Non-Disclosure Agreement for any client information they receive on VenturePact's marketplace.</li>
                                                <li class="list">The information you provide will only be shared with 2-5 service providers that VenturePact deems to be a good fit.</li>
                                                <li class="list">You can review the Non-Disclosure <a href="#" data-toggle="modal" data-target="#bs-modal">Agreement here</a></li>                                                 
                                                </ul>
                                </small>
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
                                                    <td><a href="javascript:void(0);" class="removeImg" rel="<?php echo $doc->id;?>">Delete</a></td>
                                                        </tr>
                                             	<?php }
											}?>
								</tbody>
								</table>                                
                            </div>
						</div>
                </div>
                <div class="panel-footer">
					<button class="btn btn-teal btn-lg pull-right ml10 f_s13" id="productScopeSave" type="button">Submit</button>
					<!--<button class="btn btn-default btn-lg pull-right f_s13" id="productScopeBack" type="button">Back</button>-->
                </div>  
                
            </div>
        </div>
    </div>
    <!--/ END row -->
    
</section>
<?php $this->endWidget(); ?>

<!-- START modal -->
<div id="bs-modal" class="modal fade ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bgcolor-teal border-radius">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="semibold modal-title">Non-Disclosure Agreement (For reference only)</h4>                              
            </div>
            <div id="agreement_popup" style="min-height: 460px;" class="mb15 mt15">
                <div class="modal-body bgcolor-white">
                    <div class="panel-body" style="text-align:justify;">									  
                        <p class="pb10">
<!--
                          <strong class="text-primary">NonDisclosure</strong><br>
                          <br>
-->
                            <strong class="text-primary">a. Definition of Confidential Information</strong> “Confidential Information” means any oral, written, graphic or machine-readable information, technical data or know-how, including, but not limited to, that which relates to patents, patent applications, research, product plans, products, developments, inventions, processes, designs, drawings, engineering, formulae, markets, software (including source and object code), hardware configuration, computer programs, algorithms, regulatory information, medical reports, clinical data and analysis, reagents, cell lines, biological materials, chemical formulas, business plans, agreements with third parties, services, customers, marketing or finances of Prospect or Referring Party, which Confidential Information is designated in writing to be confidential or proprietary, or if given orally, is confirmed in writing as having been disclosed as confidential or proprietary within a reasonable time (not to exceed thirty (30) days) after the oral disclosure, or which information would, under the circumstances, appear to a reasonable person to be confidential or proprietary. 
                            <br>
                            <br>
                            <strong class="text-primary">b. Nondisclosure of Confidential Information. </strong>
                            Company agrees not to use any Confidential Information disclosed to it by Prospect or Referring Party for its own use or for any purpose other than to carry out discussions concerning, and the undertaking of, the Relationship.  Company shall not disclose or permit disclosure of any Confidential Information of Prospect or Referring Party to third parties or to employees of Company, other than directors, officers, employees, consultants, agents and a select group of service providers of Company who are required to have the information in order to carry out the discussions regarding the Relationship.  Company agrees that it shall take reasonable measures to protect the secrecy of and avoid disclosure or use of Confidential Information of Prospect or Referring Party in order to prevent it from falling into the public domain or the possession of persons other than those persons authorized under this Agreement to have any such information.  Such measures shall include the degree of care that Company utilizes to protect its own Confidential Information of a similar nature.  Company agrees to notify Prospect or Referring Party of any misuse, misappropriation or unauthorized disclosure of Confidential Information of Prospect or Referring Party which may come to Company’s attention.<br>
                            <br>
                            <strong class="text-primary">1. Exceptions</strong>
                            Notwithstanding the above, Company shall not have liability to Prospect or Referring Party with regard to any Confidential Information that the Company can prove:
                            <br>
                            <br>
                            (i) was in the public domain at the time it was disclosed or has enteredthe public domain through no fault of Company.
                            <br>
                            (ii) was known to Company, without restriction, at the time of disclosure, as demonstrated by files in existence at the time of disclosure.
                            <br>
                            (iii) becomes known to Company, without restriction, from a source other than Prospect or Referring Party without breach of this Agreement by Company and otherwise not in violation of Prospect’s rights.
                            <br>
                            (iv) is disclosed with the prior written approval of Prospect; or
                            <br>
                            (v) is disclosed pursuant to the order or requirement of a court, administrative agency, or other governmental body; provided, however, that Company shall provide prompt notice of such court order or requirement to Prospect or Referring Party to enable Prospect or Referring Party to seek a protective order or otherwise prevent or restrict such disclosure.
                            <br>
                            <br>
                            <strong class="text-primary">c. Return of Materials.</strong>
                            Company agrees, except as otherwise expressly authorized by Prospect or Referring Party, not to make any copies or duplicates of any Confidential Information.  Any materials or documents that have been furnished by Prospect or Referring Party to Company in connection with the Relationship shall be promptly returned by Company, accompanied by all copies of such documentation, within ten (10) days after (a) the Relationship has been rejected or concluded or (b) the written request of Prospect or Referring Party.
                            <br>
                            <br>
                            <strong class="text-primary">d. No Rights Granted.</strong>
                            Nothing in this Agreement shall be construed as granting any rights under any patent, copyright or other intellectual property right of Prospect or Referring Party, nor shall this Agreement grant Company any rights in or to Prospect  or Referring Party’s Confidential Information other than the limited right to review such Confidential Information solely for the purpose of determining whether to enter into the Relationship.  Nothing in this Agreement requires the disclosure of any Confidential Information, which shall be disclosed, if at all, solely at Prospect or Referring Party’s option.  Nothing in this Agreement requires the Prospect or Referring Party to proceed with the Relationship or any transaction in connection with which the Confidential Information may be disclosed.
                            <br>
                            <br>
                            <strong class="text-primary">e. Term.</strong>
                            The foregoing commitments of each party shall survive any termination of the Relationship between the parties, and shall continue for a period terminating on the later to occur of the date (a) five (5) years following the date of this Agreement or (b) three (3) years from the date on which Confidential Information is last disclosed under this Agreement.
                            <br>
                            <br>
                            <strong class="text-primary">f. Severability.</strong>
                            If one or more provisions of this Agreement are held to be unenforceable under applicable law, the parties agree to renegotiate such provision in good faith.  In the event that the parties cannot reach a mutually agreeable and enforceable replacement for such provision, then (a) such provision shall be excluded from this Agreement, (b) the balance of the Agreement shall be interpreted as if such provision were so excluded and (c) the balance of the Agreement shall be enforceable in accordance with its terms.
                            <br>
                            <br>
                            <strong class="text-primary">g. Independent Contractors. </strong> The parties are independent contractors, and nothing contained in this Agreement shall be construed to constitute the parties as partners, joint venturers, co-owners or otherwise as participants in a joint or common undertaking.
                            <br>
                            <br>
                            <strong class="text-primary">h. Remedies. </strong> Both parties acknowledge that the Confidential Information to be disclosed hereunder is of a unique and valuable character, and that the unauthorized dissemination of the Confidential Information would destroy or diminish the value of such information. The damages to the Prospect and Referring Party that would result from the unauthorized dissemination of the Confidential Information would be impossible to calculate. Therefore, both parties hereby agree that the Prospect and Referring Party shall be entitled to injunctive relief preventing the dissemination of any Confidential Information in violations of the terms in this Agreement. Such injunctive relief shall be in addition to any other remedies available hereunder, whether at law or in equity. The Prospect and Referring Party shall be entitled to recover its costs and fees, including reasonable attorneys’ fees, incurred in obtaining any such relief including any litigation event.
                            <br>
                        </p>									   
                    </div>
                </div>
           	</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END modal -->
<!-- START modal -->
<div class="modal fade" id="bs_new">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bgcolor-teal border-radius">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class=" modal-title">Heading</h4>
			</div>
			<div class="modal-body">
				<form action="" class="">
					<div class="form-group mb10">
						<div class="row">
							<div class="col-sm-6 mb5">
								<label class="control-label">Country <span class="text-danger">*</span></label>
								<div class="has-icon">
									 <?php echo CHtml::dropDownList('country','',CHtml::listData(States::model()->findAll(),'id', 'name'),array('class'=>"form-control",'id'=>"selectize-customselect",'ajax'=>array(
                                'type'=>'POST',
                                'url' => CController::createUrl('/site/dynamicCity'),
                                'data'=> array('country'=>'js:this.value'),
                                'update'=>'#satnamCity',
                                )
                                ));?>
								</div>
							</div>
							<div class="col-sm-6 mb5">
								<label class="control-label">City <span class="text-danger">*</span></label>
								<div class="has-icon">
									 <?php echo CHtml::dropDownList('cities_id','',array(),array('class'=>"form-control",'id'=>"satnamCity"));?>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-teal" onclick="saveCity()" data-dismiss="model" type="submit">Submit</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal -->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/scroller.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/slimscroll.min.js"></script>
<!-- app init script -->
<script type="text/javascript">
function saveCity(){
	$.ajax({
		type:'POST',
		url:"<?php echo CController::createUrl("/client/cityUpdate");?>",
		data : 'city='+$('#satnamCity').val(),
		success:function(data){
			$('#customradio2').attr('data-target','');
			$('#customradio3').attr('data-target','');
			$('#bs_new').hide();
			$('.modal-backdrop').addClass('hide');
		}
	}); 
}
$('#basicProject').delegate('.otherOption','change',function(){
	if($('#stanmOther').hasClass('hide'))
		$('#stanmOther').removeClass('hide');
	else
		$('#stanmOther').addClass('hide');
});
$("#productScopeSave").on("click", function (event) {
	var el= $(this);
	if(!validate('basicProject') && !validate('productScope') && !validate('budgetProject') && specialVal()){
		bootbox.dialog({
			message: "<?php echo ((Yii::app()->user->profileStatus)?'<strong>Thank you for completing the job scope</strong>. <br> <p></p>Before confirming your submission, please ensure that you have provided sufficient detail through mock ups or wireframes. Insufficient detail could delay quotes from the service providers.':'There are some required fields that have not been completed. Please complete those in order to get a good estimate from our service providers.'); ?>",
            title: "Confirm Submission",
			buttons: {
				danger: {
					label: "Cancel",
					className: "btn-danger",
					callback: function(){}
				},
                
                success: {
					label: "Confirm",
					className: "btn-success",
					callback: function() {
						<?php if(Yii::app()->user->profileStatus){?>
						$('#other_status').val('4');
						$.ajax({
							type:'POST',
							url:"<?php echo CController::createUrl("/client/basic",array('id'=>$project->id));?>",
							data : $('#project-form').serialize(),
							success:function(data){
								$( "#ajaxLoadingDiv" ).show();
								$(window).attr("location","<?php echo CController::createUrl("/client/compare",array('id'=>$project->id));?>");
							}
						}); 
						<?php }?>
					}
				}
			}
		});
	 }else{
		 bootbox.confirm("Some required fields in the job scope are not filled. Please complete them before moving forward.", function (result) {	return true;}).find("div.modal-body").addClass("bgcolor-teal");
		 $('html,body').scrollTop(top-1000);
		$('.parsley-error:first').focus();
	 }
	return false;
	event.preventDefault();
});

$("#satnam-start").selectize({
	delimiter: ",",
	persist: false,
	create: function (input) {
		$.ajax({
			type:'POST',
			url:"<?php echo CController::createUrl("/client/createSkill");?>",
			data : 'name='+input,
			success: function(id){		}
		});
		return {
			value: input,
			text: input
		}
	}
});

$(document).ready(function(){$("#satnamDate").datepicker();})
$('#ClientProjects_mockup').delegate('.removeImg','click',function(){
	var that	=	$(this);
	$.ajax({
		type:'POST',
		url:"<?php echo CController::createUrl("/client/mockup",array('id'=>$project->id));?>",
		data : 'action=delete&imageId='+that.attr('rel'),
		success:function(data){
			if(data==1){
				that.parent().parent().hide();
			}
		}
	});
});
/*function validate(){
	return true; 
}*/
$('#project-form').on('change',function(){changeValidate('project-form');});
$("#basicSave").click(function(){
	if(!validate('basicProject')){
		$('#other_status').val('1');
		$.ajax({
			type:'POST',
			url:"<?php echo CController::createUrl("/client/basic",array('id'=>$project->id));?>",
			data : $('#project-form').serialize(),
			success:function(data){
				if(data==1){
					$('#basicProject').addClass('hide');
					$('#productScope').removeClass('hide');
					$("#Basic<?php echo $project->id;?>").addClass("active");
					$("#Basic<?php echo $project->id;?>").removeClass("activeLink");
					$("#ProductScope<?php echo $project->id;?>").addClass("activeLink");
					$("#Budget<?php echo $project->id;?>").removeClass("activeLink");
					$("#Questions<?php echo $project->id;?>").removeClass("activeLink");
					$('#nameT-<?php echo $project->id;?>').html($('#ClientProjects_name').val());
				}
			}
		});
		$('html,body').scrollTop(0);
	}else{
		var top=$('.parsley-error:first').offset().top;
		$('html,body').scrollTop(top-1000);
		$('.parsley-error:first').focus();
	}
});
$("#productScopeSave1").click(function(){
	if(!validate('productScope') && specialVal()){
	$('#other_status').val('2');
	$.ajax({
		type:'POST',
		url:"<?php echo CController::createUrl("/client/basic",array('id'=>$project->id));?>",
		data : $('#project-form').serialize(),
		success:function(data){
			if(data==1){
				$('#productScope').addClass('hide');
				$('#budgetProject').removeClass('hide');
				$("#ProductScope<?php echo $project->id;?>").addClass("active");
				$("#Basic<?php echo $project->id;?>").removeClass("activeLink");
				$("#Budget<?php echo $project->id;?>").addClass("activeLink");
				$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");
				$("#Questions<?php echo $project->id;?>").removeClass("activeLink");
			}
		}
	});
	$('html,body').scrollTop(0);
	}else{
		$('.parsley-error:first').focus();
	}
});
$('#productScopeBack').click(function(){
	$('#productScope').addClass('hide');
	$('#basicProject').removeClass('hide');
	$("#Basic<?php echo $project->id;?>").addClass("activeLink");
	$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");
	$("#Budget<?php echo $project->id;?>").removeClass("activeLink");
	$("#Questions<?php echo $project->id;?>").removeClass("activeLink");	
	$('html,body').scrollTop(0);
});
$("#budgetSave").click(function(){
	if(!validate('budgetProject')){
		$('#other_status').val('3');
		$.ajax({
			type:'POST',
			url:"<?php echo CController::createUrl("/client/basic",array('id'=>$project->id));?>",
			data : $('#project-form').serialize(),
			success:function(data){
				if(data==1){
					$('#budgetProject').addClass('hide');
					$('#questionProject').removeClass('hide');
					$("#Budget<?php echo $project->id;?>").addClass("active");
					$("#Basic<?php echo $project->id;?>").removeClass("activeLink");
					$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");
					$("#Questions<?php echo $project->id;?>").addClass("activeLink");
					$("#Budget<?php echo $project->id;?>").removeClass("activeLink");
				}
			}
		});
		$('html,body').scrollTop(0);
	}else{
		$('.parsley-error:first').focus();
	}
});
function specialVal(){
	errorList	=	1;
	if($('.require-one1:checked').size() == 0){
		$('#parsley-id-tier-224').html('<li>Please select required field</li>');
		$('#parsley-id-tier-224').addClass('filled');
		errorList	=	0;
	}else{
		$('#parsley-id-tier-224').removeClass('filled');
		$('#parsley-id-tier-224').html('');
	}
	return	errorList;
}
$('#budgetBack').click(function(){
	$('#budgetProject').addClass('hide');
	$('#productScope').removeClass('hide');
	$("#Basic<?php echo $project->id;?>").removeClass("activeLink");
	$("#ProductScope<?php echo $project->id;?>").addClass("activeLink");
	$("#Budget<?php echo $project->id;?>").removeClass("activeLink");
	$("#Questions<?php echo $project->id;?>").removeClass("activeLink");
	$('html,body').scrollTop(0);
});
$('#finalBack').click(function(){
	$('#questionProject').addClass('hide');
	$('#budgetProject').removeClass('hide');

	$("#Basic<?php echo $project->id;?>").removeClass("activeLink");
	$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");
	$("#Budget<?php echo $project->id;?>").addClass("activeLink");
	$("#Questions<?php echo $project->id;?>").removeClass("activeLink");
	$('html,body').scrollTop(0);
});

$('#openBrow').click(function(){
	filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
	filepicker.pickMultiple({mimetypes: ['image/*', 'text/plain', 'application/pdf'],},
	function(InkBlob){
		var values	=	['image/jpg', 'image/jpeg','image/gif','image/png'];
		$.ajax({
			type:'POST',
			url:"<?php echo CController::createUrl("/client/mockup",array('id'=>$project->id));?>",
			data : 'data='+JSON.stringify(InkBlob),
			success:function(data){
				$('#ClientProjects_mockup').append(data);
			}
		});
//		$('html,body').scrollTop(0);
	},
	function(FPError){
		console.log(FPError.toString());
  	}
	);
});
function SatnamTest($data,$ind){
	console.log($ind);
}
$('.add_link').click(function(){
	var that	=	$(this);
	var clone	=	that.parent().parent().parent().find('.hide').clone(true);
	var couter	=	that.parent().parent().parent().find('.hide').find('.counterNum');
	couter.val(parseInt(couter.val())+1);
	var Sat	=	couter.find('.add_new');
	Sat.html('Screen'+couter.val());
	$(clone).attr('class', 'col-sm-12 mb5');
	$(clone).removeClass('hide');
	clone.find('.counterNum').each(function (){$(this).parent().find('span').html(''+$(this).val()+'');});	
	var sat	=	that.parent().parent().parent().parent().parent().find('.container_outer').append(clone);
});

$('.delete_link').click(function(){
	var that	=	$(this);
	var couter	=	that.parent().parent().parent().parent().find('.hide').find('.counterNum');
	that.parent().parent().hide();
	that.parent().parent().html('');
	couter.val(parseInt(couter.val())-1);
});

(function($){
	
$("#satnam-services").selectize({
	delimiter: ",",
	persist: false,
});
	
	$(".questionsshow_sd").on("click",function(){
	$("#sd_main").click();
	});
	
	$(".questionsshow_it").on("click",function(){
	$("#it_main").click();
	});
	$(".testSatnam").on("change", function(){
		if($("#customService1").is(":checked")){
			$(".teamPart").hide();
			$('#satnam-services').removeClass('required');
			$('.number').removeClass('required');
			$("#teamBudget").hide();
			$("#bsummary").attr('placeholder',"I need to augment my team with 2 python developers and hope to scale to a designer and a front end developer over time. Would like to be build a long term relationship with a great partner.\n Key decision criteria --  \n 1. Great UIUX or design experience \n 2. Experience with XYZ API.");
		}else{
			$(".teamPart").show();
			$(".teamPart").removeClass('hide');
			$('#satnam-services').addClass('required');
			$('.number').addClass('required');
			$("#teamBudget").show();
			$("#bsummary").attr('placeholder',"Ex: We want to build an ecommerce web application selling women's purses online. We need a landing page, a product listings page, a product page and a standard checkout process. Budget permitting, we may build social logins and referral programs. The site will be design heavy as it is a fashion website.");
		}
	});
    
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
	
	$('.satnamAction').delegate('.tireSelectuion','change', function(){
		var regions	=	[];
		$("input[name='options[]']:checked").each( function () {
			regions.push($(this).val());
		});
		getData('region',regions);
	})
	$('#customradio1').on('change', function(){
		$('#regions').hide();
		getData($(this).val(),'');
	})
	$('#customradio2').on('change', function(){
		$('#regions').hide();
		
		getData($(this).val(),'');
	})
	$('#customradio3').on('change', function(){
		$('#regions').hide();
		getData($(this).val(),'');
	});
	function getData(val,list){
		$.ajax({
			type: "POST",
			url: "<?php echo Yii::app()->createUrl('/client/calculate',array('id'=>$project->id));?>",
			data : $('#project-form').serialize(),
			success: function(respose){
				$('#satnamBugdet').html(respose);
			}
		})
	}

	$("#customcheckbox_pref4").on('click',function(){
		$('#satnam').click();
	})

	$(".questionsshow_sd").on('click',function(){
		$('#sd_main').click();
	});
	
	$(".questionsshow_it").on('click',function(){
		$('#it_main').click();
	});
	
	$('#agreement_popup').enscroll({showOnHover: true,verticalTrackClass: 'track3',verticalHandleClass: 'handle3'});
	
	$("#ajaxLoadingDiv" ).hide();
	$( document ).ajaxStart(function() {
		$( "#ajaxLoadingDiv" ).show();
	});
	$( document ).ajaxStop(function() {
		$( "#ajaxLoadingDiv" ).hide();
	});

})(jQuery);
//toolSat();
</script>

