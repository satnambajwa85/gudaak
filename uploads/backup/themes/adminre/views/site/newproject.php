<!--<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script> -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/scroller.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/filepicker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/validate.js"></script>
<?php //CVarDumper::dump($project->preferences,10,1);die;?>
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'project-form','enctype' => 'multipart/form-data'))); ?>
<!-- START Get Started Template Container -->
 <section id="main" class="container-fluid">
	<div class="page-header" style="border:none;"> <!-- For Top Margin --> </div>
 	<!-- Get Started Form Start -->
    <div  id="basicProject">
    	<!-- Basic Form-->
         <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default form-horizontal form-bordered">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">Job Scope:</h3>
                </div>
                <!--/ panel heading/header -->
                <!-- panel body  BASIC FORM START -->
				<div class="panel-body pb0" id="basicProject"> 
						<!-- Choice-->
                		<div class="form-group">
                        <label class="col-sm-4 control-label ">Q. What are you looking for? <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                             <?php foreach($currentStatus as $data){?>
                            <span class="radio-inline custom-radio custom-radio-primary">
                            <input type="radio" name="current_status" id="customService<?php echo $data->id;?>" value="<?php echo $data->id;?>" <?php echo ($data->id==2)?'checked="checked"':'';?> class="testSatnam" >
                            <label for="customService<?php echo $data->id;?>">&nbsp;&nbsp;<?php echo $data->name;?></label>
                            </span>
                        <?php }?>
                            

                            
                            
                        
	                    </div>
                    </div>
               	                   
                       <!--Title -->
                       	<div class="form-group">
                        
                            <label class="col-sm-4 control-label">Q. Please give your job a title.<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <?php echo $form->textField($project,'name',array('placeholder'=>"Ex: e-Commerce app for fashion brand",'class'=>'form-control required ','data-parsley-id'=>'123')); ?>
                            <?php 	echo $form->hiddenField($project,'id'); ?>

                                    <ul class="parsley-errors-list" id="parsley-id-123"></ul>
                            </div>
                        </div>
                       
                       <!--Service Type-->
                        <div class="form-group border-top" id="teamPart">
                            <label class="col-sm-4 control-label">Q.Please select a category. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">

								<select id="satnam-services" class="form-control required" placeholder="Web app, iOS app, ERP" multiple name="Services[]" data-parsley-id='126'>
									<option default>Select a Service</option>
									<?php foreach($services as $service){?>
									 <option value=" <?php echo $service->id;?>"><?php echo $service->name;?> </option>
										<?php echo $service->name;?>
                                    </option>
									<?php } ?>
								</select>
                                <div><ul class="parsley-errors-list" id="parsley-id-126"></ul>
                                </div>
                            </div>
                        </div>
						 
                        <!-- Skills -->
                        <div class="form-group border-top" >
                            <label class="col-sm-4 control-label">Q. Do you have a Language or skill preference. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">

								<select id="satnam-start" class="form-control required " placeholder="Yii, Rails, Oracle SQL" multiple name="Skills[]" data-parsley-id='226'>
									<?php foreach($skills as $skill){
										if($skill->skillscol !=0 ||  (in_array($skill->id,$selecetedSkills))){?>
									<option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
										<?php echo $skill->name;?>
                                    </option>
									<?php }} ?>
								</select>
                                <div><ul class="parsley-errors-list" id="parsley-id-226"></ul>
                                <small class="help-block">If the job requires work on an existing application, select the language its built in. If you need design, select 'Design' as well. Select 'Not sure' if you are unsure.</small>
                                </div>
                            </div>
                        </div>
                       
                       <!-- Start Date-->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Q. Start Date. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            	<?php echo $form->textField($project,'start_date',array('value'=>(isset($project->start_date))?date('m/d/Y',strtotime($project->start_date)):'','placeholder'=>"Select a date",'id'=>'satnamDate','class'=>'form-control required','data-parsley-id'=>'124')); ?>
                                    <ul class="parsley-errors-list" id="parsley-id-124"></ul>
                                    <small class="help-block">This helps service providers better plan for the project.
</small>
                            </div>
                        </div>

                                            
						 <div class="form-group border-top pb0">
                            <label class="col-sm-4 control-label">Q. Please summarize the job. <span class="text-danger">*</span></label>

                            <div class="col-sm-8">
                               <?php echo $form->textArea($project,'description',array('placeholder'=>"Ex: We want to build an ecommerce web application selling women's purses online. We need a landing page, a product listings page, a product page and a standard checkout process. Budget permitting, we may build social logins and referral programs. The site will be design heavy as it is a fashion website.",'class'=>'form-control required','required'=>'required','rows'=>'6', 'maxlength'=>"3000",'data-parsley-id'=>'125','data-container'=>"body",'id'=>"bsummary")); ?>
                                    <ul class="parsley-errors-list" id="parsley-id-125"></ul>
                               <small class="help-block">Try to outline the job, the business problem at hand & your expectations. Please limit your response to 50-150 words.</small>
                                
                                                                
                               <?php echo $form->hiddenField($project,'other_status',array('placeholder'=>"",'id'=>'other_status')); ?>
                            </div>
                        </div>                
                </div>
                
                <div class="panel-body pb0" id="productScope">
               <!-- Budget Q1 -->
                <div class="form-group  border-top">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4 pl0">Q. Where do you want your developer(s) to be located? <span class="text-danger">*</span></label>
                        <div class="col-sm-8 pt5">
                        	<span class="radio-inline custom-radio custom-radio-primary satnam">
                                    
                                    <input type="radio" data-parsley-id="5322" data-parsley-multiple="a" name="ClientProjects[preferences]" id="customradio1" value="no-preferences"  checked="checked" class="budgetClass myRadio" >
                                    <label for="customradio1">&nbsp;&nbsp;No preference</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                    
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                    <input type="radio" data-parsley-id="4433" data-parsley-multiple="a" value="city" name="ClientProjects[preferences]" id="customradio2" <?php echo ($project->preferences=='city')?'checked="checked"':'';?> class="budgetClass myRadio disabled" data-toggle="modal" data-target="#bs_new">
                                    <label for="customradio2">&nbsp;&nbsp;In my city</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                    <input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="country" name="ClientProjects[preferences]" id="customradio3" <?php echo ($project->preferences=='country')?'checked="checked"':'';?> class="myRadio budgetClass disabled" data-toggle="modal" data-target="#bs_new">
                                    <label for="customradio3">&nbsp;&nbsp;In my country</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    <li>Activate to this </li>
                                    </ul>
                                     <span class="radio-inline custom-radio custom-radio-primary">
									<input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="regoin" name="ClientProjects[preferences]" id="customradio4" <?php // echo ($project->preferences=='regoin')?'checked="checked"':'';?> class="budgetClass myRadio"  >
                                   <label for="customradio4">&nbsp;&nbsp;In these regions</label>
								</span>
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
                <!-- Budget Q2 -->
                <div class="form-group pt0">    
                    <div class="col-md-12 mt15">
                            <div class="panel-toolbar pl0 pt5 pb5 border-none bg-none">
                                <div class="panel-toolbar">
                                    <label class="control-label mb-15">Q. Given your geographical preferences, the following pricings are available. Please select those that match your budget. <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div novalidate action="" data-parsley-validate="" class="panel panel-default mt10">
                                
                                <div id="satnamBugdet">
                         <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------Changes for Budget--------------------------------------------------------------------------------------->
                            <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
			<tr class="text-center">
				<td width="25%" class="text-center ">
					<h5 class="semibold mt5 mb5 text-tealmedium">Pricing Zone</h5>
				</td>
				<td width="25%" class="text-center">                                                    
					<h5 class="semibold mt5 mb5 pl15 text-tealmedium text-center">Enterprise Grade</h5>
					<small class="text-muted">
						<ul class="text-left">
							<li class="list">Clientele: Fortune 1000</li>
							<li class="list">5 years in business</li>
							<li class="list">Experience in scalability & high compliance domains</li>
						</ul>
					</small>
				</td>
				<td width="25%" class="text-center">                
					<h5 class="semibold mt5 mb5 pl15 text-tealdark">Mid-Market Grade</h5>
					<small class="text-muted">
						<ul class="text-left">
							<li class="list">Clientele: Mid-market companies & funded startups</li>
							<li class="list">3 years in business</li> 
							<li class="list">Exposure to scalability & high compliance domains</li>
						</ul>
					</small>
				</td>
				<td width="25%" class="text-center">                
					<h5 class="semibold mt5 mb5 pl15 text-tealdarker">StartUp Grade</h5>
					<small class="text-muted">
						<ul class="text-left">
							<li class="list">Clientele: Startups</li>
							<li class="list">1 year in business</li>
							<li class="list">Basic knowledge about compliance and security</li>
						</ul>
					</small>
				</td>
			</tr>
		</thead>
        <tbody>
            <?php 
			for($i=1;$i<4;$i++){
				if(array_key_exists($i,$list)){
					$item=	$list[$i];
					?>
				<tr>
					<td class="border-none">
						<div class="form-wizard text-center" >
							<h5 class="semibold mt5 mb5 pl15 text-tealmedium text-center<?php echo $item['id'];?>"><?php echo $item['title'];?> </h5>
						</div>
						<div class="form-wizard text-center" >
							<?php 
							 
							if($project->preferences=='city'){?>
									<a href="javascript:void();" class="label text-muted"><?php echo isset($city)?$city:'';?></a>
								<?php 
							}elseif($project->preferences=='country'){?>
									<a href="javascript:void();" class="label text-muted"><?php echo isset($countryName)?$countryName:'';?></a>
								<?php 
							}else{
								$region	=	array();
								foreach($item['country'] as $country){
									$region[$country->name]	=	$country->name;
								}
								foreach($region as $name){?>
									<a href="javascript:void();" class="label text-muted"><?php echo $name;?></a>
								<?php }
								}?>
						</div>
					</td>
	
	
					<?php foreach($item['tier'] as $tier){?>
					<td class="text-center table_cell bgcolor-tealmedium<?php echo $item['id'];?> ">
						<h5 class="semibold ">$<?php echo $tier->min_price;?> - $<?php echo $tier->max_price;?><small class="text-white"> / hour</small></h5>
						<p><?php echo $tier->description;?></p>
						<span class="checkbox custom-checkbox custom-checkbox-white mt5">
							<input type="checkbox" data-parsley-multiple="sa3" id="customcheckbox_wb<?php echo $tier->id;?>" value="<?php echo $tier->id;?>" name="tier[]" data-parsley-id="3576" <?php //echo (in_array($tier->id,$selecetedTier))?'checked="checked"':'';?> class="require-one1" >
							<label title="" data-placement="top" data-toggle="tooltip" for="customcheckbox_wb<?php echo $tier->id;?>" data-original-title="Select your tier"></label>
						</span>
					</td>
					<?php } ?>
				   
				</tr>
				<?php 
				
				}else{
				$zone	=	PriceZone::model()->findByPk($i);	
				$tiers	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$i));?>
				<tr>
                <td class="border-none">
					<div class="form-wizard text-center">
						<h5 class="semibold mt5 mb5 pl15 text-tealmedium text-center"> <?php echo $zone->title;?></h5>
					</div>
					<div class="form-wizard text-center">
						<a href="javascript:void();" class="label text-muted"></a>
					</div>
				</td>

                <?php foreach($tiers as $tier){?>
                <td class="text-center table_cell bgcolor-grey">
						<h5 class="semibold ">$<?php echo $tier->min_price;?> - $<?php echo $tier->max_price;?><small class="text-white"> / hour</small></h5>
						<p><?php echo $tier->description;?></p>						
					</td>
                <?php } ?>
               
            </tr>
			<?php 
			}
			}?>
        </tbody>
    </table>
</div>
 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------Changes Ends------------------------------------------------------------------->                               
                                </div>
                                
                            </div>
                            <ul class="parsley-errors-list" id="parsley-id-tier-224"></ul>
                            </div>
                </div>
                <!-- Budget Q3 -->
                <div class="form-group" id="teamBudget">            
                    <div class="col-md-12">
                                <div class="form-group mt20 mb100">
                                    <label class="col-sm-4 control-label">Q. Given your selection above, what is the range of your TOTAL budget? <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="col-md-3 pl0">
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
                <!-- MockUp-->
                <div class="form-group pb0" style="background: beige;">
                            <label class="col-sm-4 control-label">Q. Please upload any mockups, designs or other documentation that will help us better understand your needs. <span class="text-danger"></span></label>
                            
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" data-parsley-id="3057" name="attachment1[]" id="client-proj-doc">
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
                                                <li class="list">You can review the Non-Disclosure <a href="#" data-toggle="modal" data-target="#bs-modal-agreement">Agreement here</a></li>                                                 
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
                                                    <td>
                                                       <span class="label label-success"><?php echo $doc->type;?></span> <?php echo $doc->name;?> (<?php echo round($doc->size/(1024));?> KB)
                                                    </td>
                                                    <td><a href="javascript:OpenFile('<?php echo $doc->path;?>',400,500)">View</a></td>
                                                    <td><a href="javascript:void(0);" class="removeImg" rel="<?php echo $doc->id;?>">Delete</a></td>
                                                        </tr>
                                             	<?php }
											}?>
                                    </tbody></table>                                
                            </div>
						</div>  
             </div>
                <!-- panel body BASIC FORM END -->
				  
            </div>
        </div>
    </div>
     	<!-- Budget-->
    	 <section class=" " id="productScope">
		    <div class="row">
 				  <div class="col-md-12">
        			 <input type="hidden" value="" id="savePrefName" />
                     <input type="hidden" value="" name="city_pref" id="pref-city" />
              <?php echo CHtml::Button('Submit', array('class'=>'btn btn-teal pull-right ml10 mr15 mb10','onclick'=>'return validateForm();'));?> 
      <?php $this->endWidget(); ?>
     			   </div>
    		</div>
   	</section>
	</div>
    <!-- Get Started Form End -->
</section>
  <!----SignUp Popup Start------->
 <div id="bs-modal-signup" class="modal_popup " style="z-index: 1050;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        	<div class="modal-header bgcolor-teal border-radius">
                                <button data-dismiss="modal" class="close mt5" type="button">×</button>
                                <div style="font-size:16px;" class="pull-left ico-user22 mr10 mt5"></div>
                                <h4 class="semibold modal-title">Sign Up to get proposals</h4>
                            </div>
                           
	<?php $form=$this->beginWidget('CActiveForm', array('id'=>'Signup-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate'))); ?>
                            <div class="modal-body">
								<div class="col-sm-12">
											<div class="col-sm-2"></div>
											<div class="col-sm-8">
											<a href="index.php?r=site/newlinkedin&lType=initiate&role=2" class="btn btn-social btn-block btn-linkedin">
                                            <!-- index.php?r=site/linkedin&lType=initiate&role=2 -->
													<i class="ico-linkedin2 mr5"></i>
													Sign Up with LinkedIn
												</a>
											</div>
											<div class="col-sm-2"></div>
										</div>
                                <div class="col-sm-12 text-center mb15">
                                    <h4 class="title text-grey9 text-size13 pt0">or</h4>           
                                    <span class="text-muted ">Sign up with E-mail: </span>
                        		</div>
<div class="col-md-12">
			<div class="alert alert-danger signup_error_container hide" id="repsoneRest2">
				<button type="button" class="close" onclick="$('#repsoneRest2').hide();">×</button>
				<div id="signup_errors"></div>
			</div>
		</div>
				<div class="form-group mb10">
		

		<div class="row">
			<div class="col-sm-6 mb5">
				<label class="control-label">Full Name <span class="text-danger">*</span></label>
				<div class="has-icon pull-right">
				  <?php echo CHtml::textField('first_name','',array('placeholder'=>"John",'class'=>'form-control required alphanum minlength','length'=>"2",'tabindex'=>'1','data-parsley-id'=>'3048'));?>
				</div>
                  <ul class="parsley-errors-list" id="parsley-id-3048"></ul>
			</div>
			<div class="col-sm-6 mb5">
			  <label class="control-label">Company Name <span class="text-danger"></span></label>
                <div class="has-icon pull-right">
               <?php echo CHtml::textField('company_name','',array('placeholder'=>"XYZ, LLC",'class'=>'form-control','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2",'tabindex'=>'5'));?>
 
                </div>
			</div>
		</div>
	</div>
				<div class="form-group mb10">
        <div class="row">
            <div class="col-sm-6 mb5">
                <label class="control-label">E-mail <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
                   <?php echo CHtml::textField('email','',array('placeholder'=>"Username / email",'class'=>'form-control required email','data-parsley-type'=>"email",'tabindex'=>'3','data-parsley-id'=>'3099')); ?>
                    <i class="ico-user2 form-control-icon"></i>
                </div>
                <ul class="parsley-errors-list" id="parsley-id-3099"></ul>
             </div>
            <div class="col-sm-6 mb5">
                <label class="control-label">Password <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
                       <?php echo CHtml::passwordField('password','',array('placeholder'=>"Password",'class'=>'form-control required minlength','length'=>"6",'tabindex'=>'4','data-parsley-id'=>'3177'));?>
                    <i class="ico-lock4 form-control-icon"></i>
                </div>
                <ul class="parsley-errors-list" id="parsley-id-3177"></ul>
            </div>
        </div>
    </div>
        <div class="form-group mb10" id="showCity">
		<div class="row">
			<div class="col-sm-6 mb5">
				  <label class="control-label">Country <span class="text-danger">*</span></label>
                 
                              <div class="has-icon "><?php echo CHtml::dropDownList('country_Sign','',CHtml::listData(States::model()->findAll(			array('condition'=>'status = 1','order'=>'name ASC')),'id', 'name'),array('class'=>"form-control required pr10",'data-parsley-id'=>'3077','data-parsley-type'=>"alphanum",'prompt' =>'Select Country','id'=>"sign-up-country",'tabindex'=>'12','ajax'=>array(
                                'type'=>'POST',
                                'url' => CController::createUrl('/site/dynamicCity'),
                                'data'=> array('country'=>'js:this.value'),
                                'success'=>'function(data){loadcity2(data);}'
                                )
                                ));?>
                                <ul class="parsley-errors-list" id="parsley-id-3077"></ul>
                    </div>
                             
              
            </div>
            <div class="col-sm-6 mb5">
                <label class="control-label">City <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
                    
					<select id="sign-up-city" name="city_Sign" placeholder="Select City"  class="form-control selectized required pr10" tabindex="13"   data-parsley-id='3078'>
						<option value="" selected="selected"></option>
                	</select>
				</div>
                <ul class="parsley-errors-list" id="parsley-id-3078"></ul>
            </div>
        </div>
    </div>
    <p class="clearfix text-center">
												<span class="text-muted">Already Have Account ? <a href="javascript:void(0);"  data-target="#login_popup" data-toggle="modal" class="semibold" id="showSignIn">Click Here.</a></span>
											</p>
    <p class="text-center text-grey9">By clicking on "Sign Up" below, you agree to the <a tabindex="14" href="javascript:void(0);" data-toggle="modal" data-target="#bs-modal-lg">Terms &amp; Conditions</a>.</p>
</div>
<div class="modal-footer">
<?php echo CHtml::button('Sign Up',array('id'=>'signupButSat','class'=>'btn btn-teal','tabindex'=>'15','onclick'=>'SignUp()')); ?>
</div>
<?php $this->endWidget(); ?>
<div id="hideCity">
    	<input type="hidden" value="" name="country_Sign" id="sign-up-country" />
        <input type="hidden" value="" name="city_Sign" id="sign-up-city" />
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
 <!----SignUp Popup End------->
 <!--------------------- Agreement PopUp-->
 <div id="bs-modal-agreement" class="modal fade ">
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
                            <strong class="text-primary">a. Definition of Confidential Information</strong> "Confidential Information" means any oral, written, graphic or machine-readable information, technical data or know-how, including, but not limited to, that which relates to patents, patent applications, research, product plans, products, developments, inventions, processes, designs, drawings, engineering, formulae, markets, software (including source and object code), hardware configuration, computer programs, algorithms, regulatory information, medical reports, clinical data and analysis, reagents, cell lines, biological materials, chemical formulas, business plans, agreements with third parties, services, customers, marketing or finances of Prospect or Referring Party, which Confidential Information is designated in writing to be confidential or proprietary, or if given orally, is confirmed in writing as having been disclosed as confidential or proprietary within a reasonable time (not to exceed thirty (30) days) after the oral disclosure, or which information would, under the circumstances, appear to a reasonable person to be confidential or proprietary. 
                            <br>
                            <br>
                            <strong class="text-primary">b. Nondisclosure of Confidential Information. </strong>
                            Company agrees not to use any Confidential Information disclosed to it by Prospect or Referring Party for its own use or for any purpose other than to carry out discussions concerning, and the undertaking of, the Relationship.  Company shall not disclose or permit disclosure of any Confidential Information of Prospect or Referring Party to third parties or to employees of Company, other than directors, officers, employees, consultants, agents and a select group of service providers of Company who are required to have the information in order to carry out the discussions regarding the Relationship.  Company agrees that it shall take reasonable measures to protect the secrecy of and avoid disclosure or use of Confidential Information of Prospect or Referring Party in order to prevent it from falling into the public domain or the possession of persons other than those persons authorized under this Agreement to have any such information.  Such measures shall include the degree of care that Company utilizes to protect its own Confidential Information of a similar nature.  Company agrees to notify Prospect or Referring Party of any misuse, misappropriation or unauthorized disclosure of Confidential Information of Prospect or Referring Party which may come to Company's attention.<br>
                            <br>
                            <strong class="text-primary">1. Exceptions</strong>
                            Notwithstanding the above, Company shall not have liability to Prospect or Referring Party with regard to any Confidential Information that the Company can prove:
                            <br>
                            <br>
                            (i) was in the public domain at the time it was disclosed or has enteredthe public domain through no fault of Company.
                            <br>
                            (ii) was known to Company, without restriction, at the time of disclosure, as demonstrated by files in existence at the time of disclosure.
                            <br>
                            (iii) becomes known to Company, without restriction, from a source other than Prospect or Referring Party without breach of this Agreement by Company and otherwise not in violation of Prospect's rights.
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
                            Nothing in this Agreement shall be construed as granting any rights under any patent, copyright or other intellectual property right of Prospect or Referring Party, nor shall this Agreement grant Company any rights in or to Prospect  or Referring Party's Confidential Information other than the limited right to review such Confidential Information solely for the purpose of determining whether to enter into the Relationship.  Nothing in this Agreement requires the disclosure of any Confidential Information, which shall be disclosed, if at all, solely at Prospect or Referring Party's option.  Nothing in this Agreement requires the Prospect or Referring Party to proceed with the Relationship or any transaction in connection with which the Confidential Information may be disclosed.
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
                            <strong class="text-primary">h. Remedies. </strong> Both parties acknowledge that the Confidential Information to be disclosed hereunder is of a unique and valuable character, and that the unauthorized dissemination of the Confidential Information would destroy or diminish the value of such information. The damages to the Prospect and Referring Party that would result from the unauthorized dissemination of the Confidential Information would be impossible to calculate. Therefore, both parties hereby agree that the Prospect and Referring Party shall be entitled to injunctive relief preventing the dissemination of any Confidential Information in violations of the terms in this Agreement. Such injunctive relief shall be in addition to any other remedies available hereunder, whether at law or in equity. The Prospect and Referring Party shall be entitled to recover its costs and fees, including reasonable attorneys' fees, incurred in obtaining any such relief including any litigation event.
                            <br>
                        </p>									   
                    </div>
                </div>
           	</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
 <!-- Agreement Popup Close-->
  

<!-- City Country Modal-->
<div id="bs_new"class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bgcolor-teal border-radius">
                        <button type="button" class="close" data-dismiss="modal" id="closeCity">×</button>
                        <h4 class=" modal-title">Select Your City</h4>
                        </div>
                            <div class="modal-body" style="min-height:100px;">
                                <div class="col-sm-6 ">
                                <label class="control-label">Country <span class="text-danger">*</span></label>
                                <div class="has-icon pull-right mb10"><?php echo CHtml::dropDownList('ClientProjects[country]','',CHtml::listData(States::model()->findAll(			array('condition'=>'status = 1','order'=>'name ASC')),'id', 'name'),array('class'=>"form-control required pr10",'data-parsley-id'=>'4077','data-parsley-type'=>"alphanum",'prompt' =>'Select Country','id'=>"satnam",'tabindex'=>'12','ajax'=>array(
                                'type'=>'POST',
                                'url' => CController::createUrl('/site/dynamicCity'),
                                'data'=> array('country'=>'js:this.value'),
                                'success'=>'function(data){loadcity1(data);}'
                                )
                                ));?>
                                <ul class="parsley-errors-list" id="parsley-id-4077"></ul>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <label class="control-label">City <span class="text-danger">*</span></label>
                                <div class="has-icon pull-right">
                                <!--php code for city was here-->
                                <select id="sandeep" name="ClientProjects[cities_id]" placeholder="Select City"  class="form-control required pr10 selectized" tabindex="13" data-parsley-id='4078'>
                                <option value="" selected="selected"></option>
                                </select>
                                </div>
                                <ul class="parsley-errors-list" id="parsley-id-4078"></ul>
                                </div>
                            </div>
                                <div class="modal-footer">
                                <button class="btn btn-teal" onclick="saveCity()" data-dismiss="model" type="submit">Submit</button>
                                </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

 <!-- City Country Modal End -->
  
<!-- Terms and Conditions -->
<div id="bs-modal-lg" class="modal fade" style="z-index:9999;" >
                	<div class="modal-dialog modal-lg">
                    	<div class="modal-content">
                            <div class="modal-header bgcolor-teal border-radius">
                                <button data-dismiss="modal" class="close mt5" type="button">×</button>
                                <div style="font-size:16px;" class="pull-left ico-edit mr10 mt5"></div>
                                <h4 class="semibold modal-title">Terms & Conditions</h4>
                            </div>
                            <!--<div class="modal-header text-center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="semibold modal-title">Terms & Conditions </h3>
                            
                            </div>-->
                            <div class="modal-body bgcolor-white slimscroll">
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

<!--/ END modal -->
<!---LogIn PopUp---->
 <div id="login_popup" class="modal_popup" style="z-index:1051">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bgcolor-teal border-radius">
								<button id="modal_close" class="close mt5" type="button">×</button>
								<div style="font-size:16px;" class="pull-left ico-unlock-alt mr10 mt5"></div>
								<h4 class="semibold modal-title">Sign In</h4>
							</div>
							<div class="modal-body" style="background: #f8f8f8;">
								<div class="row">
									<div class="col-sm-12">
										<div class="col-sm-12 text-center">
											<h4 class="title light text-grey9 text-size16 mb20">Access our self-service platform:</h4>
										</div>

										<!-- Social button -->
										<div class="col-sm-12">
											<div class="col-sm-2"></div>
											<div class="col-sm-8">
											<a href="index.php?r=site/newlinkedin&lType=initiate&role=2" class="btn btn-social btn-block btn-linkedin">
                                            <!-- index.php?r=site/linkedin&lType=initiate&role=2 -->
													<i class="ico-linkedin2 mr5"></i>
													Sign Up with LinkedIn
												</a>
											</div>
											<div class="col-sm-2"></div>
										</div>
										<!--/ Social button -->
                                         <?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form1','enableClientValidation'=>true,
												'clientOptions'=>array('validateOnSubmit'=>true,),)); ?>
										<div class="col-sm-12 text-center mb15">
											<h4 class="title text-grey9 text-size13 pt0">or</h4>           
											<span class="text-muted ">Sign in with E-mail: </span>
										</div>
                                        
<div class="col-md-12">

<div class="alert alert-danger hide" id="repsoneRest21">
<p id="signup_errors1"></p>
</div>
</div>

                                        
										<!-- Login form -->
										<div class="col-sm-12 ">
											<div class="form-group mb10">
												<div class="row">
													<div class="col-sm-6 mb5">
														<label class="control-label">E-mail <span class="text-danger">*</span></label>
														<div class="has-icon pull-right">
                                                          <?php echo CHtml::textField('email','',array('placeholder'=>'E-Mail','autofocus'=>"true",							"data-parsley-type"=>"email","required"=>"required","class"=>"form-control input-white","placeholder"=>"Username","data-parsley-id"=>"4081" )); ?>  																			  														<i class="ico-user2  form-control-icon icon-top"></i>
														</div>
													</div>
													<div class="col-sm-6 mb5">
														<label class="control-label">Password <span class="text-danger">*</span></label>
														<div class="has-icon pull-right">	
                                                         <?php echo CHtml::passwordField('password','',array("required"=>"required","class"=>"form-control input-white" ,"placeholder"=>"Password","data-parsley-id"=>"2023")); ?>															
														<i class="ico-lock4 form-control-icon icon-top"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group mb10">
												<div class="row">
													<div class="col-xs-6 text-left">
														<div class="checkbox custom-checkbox">
															<input type="checkbox" name="customcheckbox" id="customcheckbox" />
															<label for="customcheckbox" class="text-grey9">&nbsp;&nbsp;Remember me</label>   
														</div>
													</div>
													<div class="col-xs-6 text-right">
														<!--<a href="javascript:void(0);" id="errorfPassLink" data-toggle="modal" data-target="#bs-modal-lost-password">Forgot password?</a>-->
													</div>
												</div>
											</div>
											<div class="form-group mb10 text-center">
												 <input type="button" id="sign-in" onclick="LogIn()" value="Sign In" name="yt0" style="padding:11px 0px !important;" class="btn btn-teal btn-social btn-signin">
											</div>
								<?php $this->endWidget(); ?> 
                                			<p class="clearfix text-center">
												<span class="text-muted">Here for the first time ? <a href="javascript:void(0);"  data-target="#bs-modal" data-toggle="modal" class="semibold">Register to get started.</a></span>
											</p>
										</div>
										<!--/ Login form -->
									</div>   
								</div>            
							</div>
							 
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
                </div>
 <!----LogIn PopUP END---->  
<script type="text/javascript">
function validateForm(){
	var user_type="<?php echo isset(Yii::app()->user->role)?Yii::app()->user->role:Yii::app()->user->name;?>";
	if(sessionStorage){
		var data = $('#project-form').serialize(); /* In case of LinkedIn SignUp Whole Data Stored in Session */
		sessionStorage.setItem("projectInfo", data);	 
	}
	if(user_type=="Guest"){
		if(!validate('basicProject') && specialVal()){
			$('#bs-modal-signup').modal('show');
		}
		else{
			var top=$('.parsley-error:first').offset().top;
			$('html,body').scrollTop(top-1000);
			$('.parsley-error:first').focus();
		}
	}
	else{ /* Right Now this case is not applicable for Application Enable this code if already logged In user want to submit project*/
		if(!validate('basicProject'))
			$('#project-form').submit();
		return true;
	}
}
function LogIn()
{
	$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/site/newLogIn');?>",
				data:$('#login-form1').serialize(),
				success :function(data){
					if(data=='in')
						{					
					 		$('#project-form').submit();
							$('#repsoneRest21').hide();
							$('#repsoneRest21').addClass('hide');
						}
					else{
						$('#repsoneRest21').show();
						$('#repsoneRest21').removeClass('hide');
						$('#signup_errors1').html(data);
					}
					}
			});
}	
 
/* Script for Signup using application  */
function SignUp()
 {
	if(!validate('Signup-form')){
		$('#signupButSat').val('Please Wait');
		$.ajax({
			type: 'POST',
			url:"<?php echo CController::createUrl('/site/newSignUp');?>",
			data:$('#Signup-form').serialize(),
			success :function(data){
				var response = JSON.parse(data);
				if(response.exist){
					$('#project-form').submit();
				}	 
				else{
					$('#signup_errors').html(response.message);
					$('#repsoneRest2').show();
					$('#repsoneRest2').removeClass('hide');
					$('#repsoneRest2').removeClass('alert-success');
					$('#repsoneRest2').addClass('alert-danger');
					$('#signupButSat').val('Sign Up');
				}
			}	
		});
	}
	else{
		$('.parsley-error:first').focus();
	}
}

</script>
<!-- Handling of Login Popup -->
<!--<script type="text/javascript">
	$('#modal_close').click(function(){
		$('#login_popup').hide();
	});
	$('.semibold').click(function(){
		$('#login_popup').hide();
	});

</script> -->
<!-- app init script -->
<script type="text/javascript">
function callSavePref(pref)
{
	$('#customradio1').prop("checked", true);
	$('#savePrefName').val(pref);
  
  	
}
/* This getData1 is used for updating the grid just after selection of country and city Event occur after Submit*/
function getData1(val,list,pref){
		var projectId='00';
		if(pref=='city')
				projectId=$('#sandeep option:selected').val();
			else if(pref=='country')
				projectId=$('#sandeep option:selected').val();
				else if(pref=='region')
				 projectId=$('#sandeep option:selected').val();
		else
		 projectId=$('#sandeep option:selected').val();
	 	console.log('in getdata');
		console.log(list);
		var urlClient="<?php echo Yii::app()->createUrl('site/calculate',array('id'=>""));?>"+projectId+'&pref='+pref;
		
		 
		$.ajax({
			type: "POST",
			url: urlClient,
			data : $('#project-form').serialize(),
			success: function(respose){
				$('#satnamBugdet').html(respose);
			}
		});
	}
/* This method is to save City Country on click of Submit in modal */ 
function saveCity(){
	 if(!validate('bs_new'))
	 {
		 $('#showCity').html($('#hideCity').html());
		 var country	=	$('#satnam').val();
		 var city 		=	$('#sandeep').val();
		 $('#sign-up-country').val(country);
		 $('#sign-up-city').val(city);
		 $('#pref-city').val(city);
		 $('#bs_new').modal('toggle');
		 $('#customradio2').attr( 'data-target','#');
		 $('#customradio3').attr( 'data-target','#');
		 if($('#savePrefName').val()=='country')
		 {
			$('#customradio3').prop("checked", true);
			getData1(country,'','country');
		 }
		 else
		 {
			$('#customradio2').prop("checked", true)
			getData1(city,'','city');
		 }
	 	
	 }
}
$(document).ready(function(){$("#satnamDate").datepicker();})
$('#ClientProjects_mockup').delegate('.removeImg','click',function(){
	var that	=	$(this);
	that.parent().parent().remove();
	$(this).remove();		 
	});
/* validating form */	
 $('#project-form').on('change',function(){changeValidate('project-form');});

$('#openBrow').click(function(){
	filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
	filepicker.pickMultiple({mimetypes: ['image/*', 'text/plain', 'application/pdf'],},
	function(InkBlob){
		
		$.each(InkBlob, function(i,item){ // notice the item
		console.log(item);
			/* this will generate hidden field which will be posted to the controller for attachments */
			var newData='<tr><td><span class="label label-success">'+item.mimetype+'</span> '+item.filename+' </td><td><a href="'+item.url+'" target="_blank">View</a></td><td><a href="javascript:void(0);" class="removeImg" >Delete</a></td><input type="hidden" name="attachment[]" value=\''+JSON.stringify(item)+'\'/></tr>';
				$('#ClientProjects_mockup').append(newData); 
		 });
	},
	function(FPError){
		console.log(FPError.toString());
  	}
	);
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

(function($){
	$(".testSatnam").on("change", function(){
		/* Radio button What are you looking for. This code will show/hide the relavent fields accordingly */
		if($("#customService1").is(":checked")){
			$("#teamPart").hide();
			$('#satnam-services').removeClass('required');
			$('.number').removeClass('required');
			$("#teamBudget").hide();
			$("#bsummary").attr('placeholder',"I need to augment my team with 2 python developers and hope to scale to a designer and a front end developer over time. Would like to be build a long term relationship with a great partner.\n Key decision criteria --  \n 1. Great UIUX or design experience \n 2. Experience with XYZ API.");
		}else{
			$("#teamPart").show();
			$("#teamPart").removeClass('hide');
			$('#satnam-services').addClass('required');
			$('.number').addClass('required');
			$("#teamBudget").show();
			$("#bsummary").attr('placeholder',"Ex: We want to build an ecommerce web application selling women's purses online. We need a landing page, a product listings page, a product page and a standard checkout process. Budget permitting, we may build social logins and referral programs. The site will be design heavy as it is a fashion website.");
		}
	});
	
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
			getData($(this).val(),regions,'regoin');
		}
	});

/* Govind */

$('.satnamAction > .mr10 > label').click(function (el) {
	/* Fatching the options selected for Regions*/
		var child=$(this).children();
		var regions	=[];
		$("input[name='options[]']:checked").each( function () {
			regions.push($(this).val());
		});
			$(this).children().each( function () {
					if(!this.checked)
					{
							regions.push(this.value);
					}
					else
					{
						regions.splice($.inArray(this.value, regions),1);	
					}
				});
		
		console.log(regions);
		getData('region',regions,'regoin');
		
	});
	/*Selecting Preferences */
	$('#customradio1').on('change', function(){
		$('#regions').hide();
		getData($(this).val(),'','no-preferences');
	});
	$('#customradio2').on('change', function(){
		$('#regions').hide();
		getData($(this).val(),'','city');
	});
	$('#customradio3').on('change', function(){
		$('#regions').hide();
		getData($(this).val(),'','country');
	});
	function getData(val,list,pref){
		/* In All the cases we must send City Id */
		var projectId='00';
		if(pref=='city')
				projectId=$('#sandeep option:selected').val();
			else if(pref=='country')
				projectId=$('#sandeep option:selected').val();
				else if(pref=='region')
				 projectId=$('#sandeep option:selected').val();
		else
		 projectId=$('#sandeep option:selected').val();
	 	console.log('in getdata');
		console.log(list);
		var urlClient="<?php echo Yii::app()->createUrl('site/calculate',array('id'=>""));?>"+projectId+'&pref='+pref;
		var option = 'option='+list; 
		$.ajax({
			type: "POST",
			url: urlClient,
			data : $('#project-form').serialize()+'&'+option,
			success: function(respose){
				$('#satnamBugdet').html(respose);
			},
			error: function(){
				callSavePref(pref);
        	
    }
		});
	}

	$("#customcheckbox_pref4").on('click',function(){
		$('#satnam').click();
	});

	$('#agreement_popup').enscroll({showOnHover: true,verticalTrackClass: 'track3',verticalHandleClass: 'handle3'});

	/* Not in Use */
	/*
	$(".questionsshow_sd").on('click',function(){
		$('#sd_main').click();
	});
	
	$(".questionsshow_it").on('click',function(){
		$('#it_main').click();
	});
	
	if($('.groupSD').find(':radio:checked').length >0)
		$('#sd_overview').show();
	
	if($('.groupITS').find(':radio:checked').length >0)
			$('#it_overview').show();
				
	$('.groupMain').find('input[type="radio"]').click(function(){
		if($('.groupSD').find(':radio:checked').length ==0)
			$('#sd_overview').hide();
		else
			$('#sd_overview').show();
			
		if($('.groupITS').find(':radio:checked').length ==0)
			$('#it_overview').hide();
		else
			$('#it_overview').show();
	});
		
	$("#ajaxLoadingDiv" ).hide();
	$( document ).ajaxStart(function() {
		$( "#ajaxLoadingDiv" ).show();
	});
	$( document ).ajaxStop(function() {
		$( "#ajaxLoadingDiv" ).hide();
	});
	$("input[name='buget_category']").change(function() { 
									if($(this).val()=='ES')
									{
										$(".groupITS").show();
										$(".groupSD").hide();
										$("#groupOS").hide();
										
									}
									  else if($(this).val()=='SD')
									  {
										$(".groupITS").hide();
										$("#groupOS").hide();
									  	$(".groupSD").show();
										
									  }
										 else if($(this).val()=='OS')
									  	{
											$(".groupITS").hide();
											$(".groupSD").hide();
											$("#groupOS").show();
										}
								});*/
		//$('#bsummary').popover('toggle');
})(jQuery);

/*Creating new skills and selectize implementation */ 
$("#satnam-start").selectize({
	delimiter: ",",
	persist: false,
	create: function (input) {
		$.ajax({
			type:'POST',
			url:"<?php echo CController::createUrl("/site/createSkill");?>",
			data : 'name='+input,
			success: function(id){		}
		});
		return {
			value: input,
			text: input
		}
	}
});
/*Creating New Services and selectize implemented */
$("#satnam-services").selectize({
	delimiter: ",",
	persist: false,
});

/*validating signup form Post validation Checks */
$('#Signup-form').on('change',function(){changeValidate('Signup-form');});
/*validating City Country Popup Post Validation */
$('#bs_new').on('change',function(){changeValidate('bs_new');});
/*validating Project Basic Form Post Validation Checks */
$('#project-form').on('change',function(){changeValidate('project-form');});
								
</script>
<!-- City Country Script Preference -->

 <script>
/*Code for City And Country By Ritesh Sir*/
var xhr;
var select_state, $select_state;
var select_city, $select_city;
function loadcity1(data)
{
	$("#sandeep").html(data);
	var selectJson = {};
	selectJson = new Array();
	var select = document.getElementById("sandeep");
	//console.log(data);

	for(var i=0;i<select.options.length;i++)
	{
		var option = select.options[i];
		var optionJson = {};
		optionJson = {value: option.value, name: option.text};
		//console.log(optionJson);
		selectJson.push(optionJson);
	}
	//console.log(selectJson);
	$("#sandeep").html('<option value="" selected="selected"></option>');
	//$select_state = $('#satnam').selectize({selectOnTab:true});

     $select_state= $('#satnam').selectize({
        selectOnTab:true,
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',

	});

        select_city.disable();
        select_city.clearOptions();
        select_city.load(function(callback) {
        select_city.enable();
        callback(selectJson);
        });
}
$(document).ready(function(){
    $select_state= $('#satnam').selectize({
        selectOnTab:true,
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',

	});
	$select_city = $('#sandeep').selectize({
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',
		selectOnTab:true
	});
	select_city  = $select_city[0].selectize;
	select_city.disable();
    select_state = $select_state[0].selectize;
});

/*End of code for city and country*/
</script>
<!-- City Country Script for SignUp Start-->
<script>
/*Code for City And Country*/
var xhr;
var select_sign_state, $select_sign_state;
var select_sign_city, $select_sign_city;
function loadcity2(data)
{
	$("#sign-up-city").html(data);
	var selectJson = {};
	selectJson = new Array();
	var select = document.getElementById("sign-up-city");
	//console.log(data);

	for(var i=0;i<select.options.length;i++)
	{
		var option = select.options[i];
		var optionJson = {};
		optionJson = {value: option.value, name: option.text};
		//console.log(optionJson);
		selectJson.push(optionJson);
	}
	//console.log(selectJson);
	$("#sign-up-city").html('<option value="" selected="selected"></option>');
	//$select_sign_state = $('#sign-up-country').selectize({selectOnTab:true});

     $select_sign_state= $('#sign-up-country').selectize({
        selectOnTab:true,
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',

	});

        select_sign_city.disable();
        select_sign_city.clearOptions();
        select_sign_city.load(function(callback) {
        select_sign_city.enable();
        callback(selectJson);
        });
}
$(document).ready(function(){
    $select_sign_state= $('#sign-up-country').selectize({
        selectOnTab:true,
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',

	});
	$select_sign_city = $('#sign-up-city').selectize({
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',
		selectOnTab:true
	});
	select_sign_city  = $select_sign_city[0].selectize;
	select_sign_city.disable();
    select_sign_state = $select_sign_state[0].selectize;
});

/*End of code for city and country*/
</script>
<!-- City Country Script for SignUp End-->
<style type="text/css">
.modal_popup {
    bottom: 0;
    display: none;
    left: 0;
    outline: 0 none;
    overflow-x: auto;
    overflow-y: scroll;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 9999;
	background:rgba(0,0,0,0.5);
}
</style>
<script type="text/javascript">
	$('#modal_close').click(function(){
		$('#login_popup').modal('toggle');
	});
	$('.semibold').click(function(){
		$('#login_popup').modal('toggle');
		$('#bs-modal-signup').modal('toggle');
	});
	$('#showSignIn').click(function(){
		$('#login_popup').modal('toggle');
		});

</script>