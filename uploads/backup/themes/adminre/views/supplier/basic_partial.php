<link rel="stylesheet" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/css/selectize.min.css" />
<!-- START Template Main -->
<section>
    <!-- START Template Container -->
    <section class="container-fluid">
        <!-- Page header -->
        <div class="page-header page-header-block pb0 pt15">
            <div class="page-header-section pt5 ">
                <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                    <li>
                        <?php echo CHtml::link( 'Dashboard', array( '/supplier/index'));?>
                    </li>
                    <li class="text-info">Profile</li>
                    <li class="active">Basic</li>
                </ol>
            </div>
        </div>


        <!--/ Page header -->
        <?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="alert alert-dismissable alert-success">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
        <?php endif; ?>

        <!-- START Profile form -->
        <div class="row">
            <div class="col-md-12">
                <!-- START panel -->
                <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/profile'),'id'=>'profile-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>" form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate')));?>

                <div class="alert alert-dismissable alert-info">
                    <strong>Why these questions?</strong>
                    <br>The goal is to provide information to clients that they usually ask for <strong>upfront</strong>. This way you will not have to answer the same questions multiple times for each client. Also, whenever you send a proposal, the client will be able to view your portfolio, ratings & answers to FAQs on VenturePact.com. It will take some time up front but it will save you time over the long run..
                </div>
                <!-- Starts Basic Section -->
                <div id="basic" class="profileSection panel panel-default mb50">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title">Basic Information</h3>
                    </div>
                    <!--/ panel heading/header -->
                    <!-- panel body -->
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Name of the company
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-4">
                                <?php echo $form->textField($profile,'name',array('placeholder'=>"XYZ, LLC",'class'=>'form-control','required'=>'required',"data-parsley-maxlength"=>"50")); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Alternate E-mail
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-4">
                                <?php echo $form->textField($profile,'email',array('placeholder'=>"Jon@XYZ.com","class"=>"form-control",'required'=>'required','data-parsley-type'=>"email")); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Skype ID
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-4">
                                <?php echo $form->textField($profile,'skype_id',array('placeholder'=>"Skype Id","class"=>"form-control",'required'=>'required')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Phone Number
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-4">
                                <?php echo $form->textField($profile,'phone_number',array('placeholder'=>"xxx-xxx-xxxx","class"=>"form-control",'required'=>'required',"data-parsley-length"=>"[5,15]")); ?>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label">Company website
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-4">
                                <?php echo $form->textField($profile,'website',array('placeholder'=>"http://www.XYZ.com","class"=>"form-control",'required'=>'required')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Year Founded
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-4">
                                <?php echo $form->textField($profile,'foundation_year',array('placeholder'=>"xxxx","class"=>"form-control",'required'=>'required',"data-mask"=>"9999")); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Number of employees
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-4">
                                <?php echo $form->textField($profile,'number_of_employee',array('placeholder'=>"xx","class"=>"form-control",'required'=>'required',"data-parsley-type"=>"number","data-parsley-maxlength"=>"6")); ?>

                            </div>
                        </div>
                        <!-- Location -->

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Location <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-8">
                                <div class="col-sm-6 pl0">
                                    <?php //echo CHtml::dropDownList( 'country',$profile->cities->states_id,CHtml::listData(States::model()->findAllByAttributes(array("status"=>'1')),'id', 'name'),array('class'=>"form-control",'id'=>"countries_dropdown", 'prompt' =>'Select Country'));?>
                                    <?php echo CHtml::dropDownList( 'country', $profile->cities->states_id,CHtml::listData(States::model()->findAll(array('condition'=>'status = 1','order'=>'name ASC')),'id', 'name'),array('class'=>"form-control required ",'prompt' =>'Select Country','id'=>"countries_dropdown",'ajax'=>array( 'type'=>'POST', 'url' => CController::createUrl('/site/dynamicBudget'), 'data'=> array('country'=>'js:this.value'), 'success'=>'function(data){updateBudget(data);}' ) ));?>

                                </div>



                                <div class="col-sm-6 basic_padding">  
                                    <?php echo CHtml::dropDownList( 'Suppliers[cities_id]', $profile->cities_id,CHtml::listData(Cities::model()->findAllByAttributes(array('states_id'=>$profile->cities->states_id,'status'=>'1')),'id', 'name'),array('prompt' =>'Select City','class'=>"form-control pr10 required",'id'=>"dynamicities" ));?>
                                </div>
                            </div>
                        </div>
                        <!--/Location -->



                        <div class="form-group">

                            <label class="col-sm-4 control-label">Company logo
                                <span class="text-danger"></span>
                            </label>
                            <div class="col-sm-4" id="logoimage">
                                <div class="input-group">
                                    <?php echo $form->hiddenField($profile,'logo',array('placeholder'=>"Comany Website","class"=>"form-control")); ?>
                                    <input type="text" readonly class="form-control" value="<?php echo  $profile->logo; ?>">
                                    <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span>Browse

                                </div>
                                </span>
                            </div>
                            <span class="help-block">The logo will be used on your profile.</span>



                        </div>
                        <?php if(!empty($profile->logo)){ ?>
                        <div class="col-sm-4 ">
                            <div class="btn btn-teal">
                                <a href="<?php echo $profile->logo; ?>" style="color:white" class="magnific">View</a>

                            </div>

                        </div>
                        <?php } ?>
                    </div>


                    <!--/ Sample pitch content added on requirement changes -->




                    <div class="form-group">
                        <label class="col-sm-4 control-label">Please briefly introduce your company.
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <?php echo $form->textArea($profile,'about_company',array('placeholder'=>"Try to limit your response to 50-100 words","class"=>"form-control",'required'=>'required',"rows"=>"3","data-parsley-length"=>"[6, 10000]")); ?>
                        </div>
                    </div>

                    <div class="form-group work_experince">
                        <label class="col-sm-4 control-label">Please briefly introduce the management.
                            <span class="text-danger"></span>
                        </label>
                        <div class="col-sm-8" id="dynamicTeam">
                            <div class="col-md-12">
                                <div class="alert alert-dismissable alert-danger signup_error_container">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                                    <div id="signup_errors"></div>
                                </div>
                            </div>
                            <!-- Starts Displaying all Team member -->
                            <?php if(count($supplierTeam)>0){ ?>
                            <?php foreach($supplierTeam as $item){ ?>
                            <?php //CVarDumper::dump($item->attributes["id"] ,10,1); ?>

                            <div class="row mb10" id="member_<?php echo $item->attributes['id']; ?>">
                                <div class="col-sm-4 pt5 pb5">
                                    <?php echo $form->textField($item,'first_name',array('placeholder'=>"Name","class"=>"form-control")); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->textArea($item,'experiance',array('placeholder'=>"Work Experince and background","class"=>"form-control")); ?>

                                </div>
                                <div class="col-sm-2 mt5">
                                    <button type="button" class="bg-border-none" onclick="removeTeamMember('member_<?php echo $item->attributes['id']; ?>')"><i class="ico-minus2 text-default"></i>
                                    </button>
                                </div>

                            </div>
                            <?php }// End For loop ?>
                            <!-- Adding a blank column Starts -->
                            <div class="row mb10" id="member_0">
                                <div class="col-sm-4 pt5 pb5">
                                    <?php echo $form->textField($supplierTeam1,'first_name',array('placeholder'=>"Name","class"=>"form-control")); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->textArea($supplierTeam1,'experiance',array('placeholder'=>"Work Experience and background","class"=>"form-control")); ?>
                                </div>
                                <div class="col-sm-2 mt5">
                                    <button type="button" class="btn btn-teal" onclick="addNewMember('member_0')">Add +</button>
                                </div>
                            </div>
                            <!-- Adding a blank column Ends -->

                            <?php }else{ ?>
                            <!-- If there is no data in suppliers table  -->
                            <div class="row mb10" id="member_0">
                                <div class="col-sm-4 pt5 pb5">
                                    <?php echo $form->textField($supplierTeam1,'first_name',array('placeholder'=>"Name","class"=>"form-control")); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->textArea($supplierTeam1,'experiance',array('placeholder'=>"Work Experience and background","class"=>"form-control")); ?>
                                </div>
                                <div class="col-sm-2 mt5">
                                    <button type="button" class="btn btn-teal" onclick="addNewMember('member_0')">Add +</button>
                                </div>
                            </div>
                            <?php } // End If Else ?>
                            <!-- Ends Displaying all Team member -->
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-4 control-label">Q. What tools, languages, frameworks does your company specialize in? <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8 mt15">
                            <?php //print_r($skills); ?>
                            <?php //print_r($selecetedSkills); ?>
                            <?php //echo (in_array($skills[0]->id,$selecetedSkills)); ?>
                            <select id="SuppliersHasSkills_skills_id" class="form-control " placeholder="Select skills..." multiple name="SuppliersHasSkills[skills_id][]" data-parsley-id-custom="12345">

                                <?php foreach($skills as $skill){?>

                                <?php if(in_array($skill->id,$selecetedSkills)){ ?>
                                <option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
                                    <?php echo $skill->name;?>

                                </option>
                                <?php }else{ ?>
                                <option value="<?php echo $skill->id;?>">
                                    <?php echo $skill->name;?>

                                </option>
                                <?php }} ?>
                            </select>




                        </div>
                        <div class="col-sm-8 pull-right ">
                            <ul class="parsley-errors-list filled" id="parsley-id-custom-12345"></ul>
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="">

                            <label class="col-sm-4 control-label">Q. What is your average hourly rate?
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-8">
                                <div class="table-responsive">
                                    <div class="col-sm-12 pl0">
                                        <!--<div class="col-sm-9">
												<span class="radio custom-radio custom-radio-primary">  
													<input type="radio" value="option1" id="customradio1" name="average">  
													<label for="customradio1" class="">&nbsp; <strong class="text-black semibold " style="">$250 - $350</strong>
														<small class="text-black"> / mo</small>
													</label>   
												</span>
																						
												<span class="radio custom-radio custom-radio-primary">  
													<input type="radio" value="option2" id="customradio2" name="average">  
													<label for="customradio2">&nbsp;&nbsp;Radio 2</label>   
												</span>
												<span class="radio custom-radio custom-radio-primary">  
													<input type="radio" value="option3" id="customradio3" name="average">  
													<label for="customradio3">&nbsp;&nbsp;Radio 2</label>   
												</span>
											</div>-->

                                        <?php foreach($priceTier as $tier){ ?>
                                        <span class="radio custom-radio custom-radio-primary zonebudget">
													<input type="radio" id="customradio<?php echo $tier->id;?>" name="Suppliers[price_tier_id]" value="<?php echo $tier->id;?>" <?php echo ($profile->price_tier_id == $tier->id)?'checked':'' ?> required />	
													<label for="customradio<?php echo $tier->id;?>" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top">&nbsp;&nbsp;										
														<strong class="semibold text-black" style="font-size:14px; font-weight: normal;">$<?php echo $tier->min_price; ?> - $<?php echo $tier->max_price; ?></strong>
														<small class="text-black"> / hour</small>
													</label>													
												</span>
                                        <?php } ?>

                                        <small class="help-block">Please select the one closest to your average price.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- New changes Pricing Details and Absolute minimum price -->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Q. Please add any pricing details for your company.
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <?php echo $form->textField($profile,'pricing_details',array('placeholder'=>"Front end developer: $40/hour, Systems Architect: $75",'class'=>'form-control','required'=>'required',"data-parsley-maxlength"=>"500")); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Q. What is the absolute minimum price under which you will not accept a project.
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <?php echo $form->textField($profile,'min_price',array('placeholder'=>"xxxx",'class'=>'form-control',"data-parsley-type"=>"integer","data-parsley-maxlength"=>"10","data-parsley-id-custom"=>"5136")); ?>

                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-custom-5136"></ul>
                            <small class="help-block">Please mention accurate numbers here as this impacts our matching process</small>

                        </div>
                    </div>
                    <!--/ New changes Pricing Details and Absolute minimum price -->
                    <div class="form-group" id="basic_service">
                        <label class="col-sm-4 control-label bm15">Q. What services does your company offer?
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <!-- Software Development -->
                            <div class="col-sm-4 pl0 pr0 groupSD bm15">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Software Development</label>
                                <?php $serviceRequired=0;foreach($services as $service){ if($service->category =='SD'){?>
                                <div class="panel-heading pl0 pr0">
                                    <a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
                                    <span class="checkbox custom-checkbox">
											<input type="checkbox" name="Services[]" <?php echo (in_array($service->id,$selecetedServices))?'checked':'';?> id="servicecheckbox<?php echo $service->id;?>" value="<?php echo $service->id;?>" <?php //echo ($serviceRequired==0?"required":'');$serviceRequired++;?>  data-parsley-group="block_services" />
											<label for="servicecheckbox<?php echo $service->id;?>">&nbsp;&nbsp;
												<?php echo $service->name;?></label>
										</span>
                                </div>
                                <?php } } ?>


                            </div>
                            <!--/ Software Development -->

                            <!-- Enterprise Software -->
                            <div class="col-sm-4 pl0 pr0 groupITS bm15">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Enterprise Software</label>
                                <?php foreach($services as $service){ if($service->category =='ITS'){?>
                                <div class="panel-heading pl0 pr0">
                                    <a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
                                    <span class="checkbox custom-checkbox">
											<input type="checkbox" name="Services[]" <?php echo (in_array($service->id,$selecetedServices))?'checked':'';?> id="servicecheckbox<?php echo $service->id;?>" value="<?php echo $service->id;?>"  data-parsley-group="block_services"/>
											<label for="servicecheckbox<?php echo $service->id;?>">&nbsp;&nbsp;
												<?php echo $service->name;?></label>
										</span>
                                </div>
                                <?php } } ?>
                            </div>
                            <!--/ Enterprise Software -->

                            <!-- Other Services -->
                            <div class="col-sm-4 pl0 pr0">
                                <label class="col-sm-12 gray_label_new pl0 pr0 mb15 pb0">Other Services</label>
                                <?php foreach($services as $service){ if($service->category =='OS'){?>
                                <div class="panel-heading pl0 pr0">
                                    <a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
                                    <span class="checkbox custom-checkbox">
											<input type="checkbox" name="Services[]" <?php echo (in_array($service->id,$selecetedServices))?'checked':'';?> id="servicecheckbox<?php echo $service->id;?>" value="<?php echo $service->id;?>" class="groupOS"  data-parsley-group="block_services"/>
											<label for="servicecheckbox<?php echo $service->id;?>">&nbsp;&nbsp;
												<?php echo $service->name;?></label>
										</span>
                                </div>
                                <?php } } ?>
                            </div>


                            <!--/ Other Services -->

                            <div class="col-sm-12 mt5 pl0 pr0">
                                <ul class="parsley-errors-list" id="parsley-id-basic_service"></ul>
                            </div>
                            <div class="col-sm-12 mt5 pl0 pr0">
                                <small class="help-block">Check all that apply</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="basic_industry">
                        <label class="col-sm-4 control-label bm15">Q. In which of these categories does your company have experience in? <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <!-- Group IO -->
                            <div class="col-sm-6 pl0 pr0 groupSD bm15">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Internal Operations Product</label>
                                <?php $requiredIndustry=0; foreach($industries as $industry){ if($industry->position =='IO'){?>
                                <div class="panel-heading pl0 pr0">
                                    <a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
                                    <span class="checkbox custom-checkbox">
											<input type="checkbox" name="Industries[]" <?php echo (in_array($industry->id,$selecetedIndustries))?'checked':'';?> id="industrycheckbox<?php echo $industry->id;?>" value="<?php echo $industry->id;?>" <?php //echo ($requiredIndustry==0?"required":'');$requiredIndustry++;?>  />
											<label for="industrycheckbox<?php echo $industry->id;?>">&nbsp;&nbsp;
												<?php echo $industry->name;?></label>
										</span>
                                </div>
                                <?php } } ?>


                            </div>
                            <!--/ Group IO -->

                            <!-- Group CF -->
                            <div class="col-sm-6 pl0 pr0 groupITS">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Client Facing</label>
                                <?php foreach($industries as $industry){ if($industry->position =='CF'){?>
                                <div class="panel-heading pl0 pr0">
                                    <a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
                                    <span class="checkbox custom-checkbox">
											<input type="checkbox" name="Industries[]" <?php echo (in_array($industry->id,$selecetedIndustries))?'checked':'';?> id="industrycheckbox<?php echo $industry->id;?>" value="<?php echo $industry->id;?>" />
											<label for="industrycheckbox<?php echo $industry->id;?>">&nbsp;&nbsp;
												<?php echo $industry->name;?></label>
										</span>
                                </div>
                                <?php } } ?>
                            </div>
                            <!--/ CF -->
                            <div class="col-sm-12 mt5 pl0 pr0">
                                <ul class="parsley-errors-list" id="parsley-id-basic_industry"></ul>
                            </div>
                            <div class="col-sm-12 mt5 pl0 pr0">
                                <small class="help-block">Check all that apply</small>
                            </div>
                        </div>
                    </div>

                    <!-- new design -->

                    <!-- Sample pitch content added on requirement changes -->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Q. Please upload the standard pitch deck that you use.<span class="text-danger"></span>
                        </label>
                        <div class="col-sm-4" id="standardPitch">
                            <div class="input-group">
                                <input type="text" readonly class="form-control" value="<?php echo $profile->standard_pitch; ?>">
                                <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span>Browse
                                <?php echo $form->hiddenField($profile,'standard_pitch',array('placeholder'=>"",'class'=>'form-control')); ?>
                            </div>
                            </span>

                        </div>
                    </div>
                    <?php if(!empty($profile->standard_pitch)){ ?>
                    <div class="col-sm-4 ">
                        <div class="btn btn-primary ">
                            <a href="<?php echo $profile->standard_pitch; ?>" target="_blank" style="color:white">View</a>

                        </div>

                    </div>
                    <?php }?>

                </div>


                <div class="form-group">
                    <label class="col-sm-4 control-label">Q. Can you give us a copy of the standard services agreement that you use with clients? <span class="text-danger"></span>
                    </label>
                    <div class="col-sm-4" id="service_agreement">
                        <div class="input-group">
                            <input type="text" readonly class="form-control" value="<?php echo  $profile->standard_service_agreement; ?>">
                            <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span>Browse
                            <?php echo $form->hiddenField($profile,'standard_service_agreement',array('placeholder'=>"",'class'=>'form-control')); ?>
                        </div>
                        </span>
                    </div>

                </div>
                <?php if(!empty($profile->standard_service_agreement)){ ?>
                <div class="col-sm-4 ">
                    <div class="btn btn-primary ">
                        <a href="<?php echo $profile->standard_service_agreement; ?>" style="color:white" target="_blank">View</a>

                    </div>

                </div>

                <?php }?>

            </div>

            <div class="panel-footer">
                <div class="form-group no-border pt0 pb0">
                    <label class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-teal btn-lg pull-right f_s13" id="btn-form-basic">Save & Next</button>
                    </div>
                </div>
            </div>

        </div>

        <!--/ panel body -->
        </div>
        <!-- Ends Baisc Section -->


        <?php $this->endWidget(); ?>
        <!-- END panel -->
        </div>
        </div>
        <!--/ END Profile form -->

    </section>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
        <i class="ico-angle-up"></i>
    </a>
    <!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.signup_error_container').hide();

        $("#SuppliersHasSkills_skills_id").selectize({
            delimiter: ",",
            persist: false,
            create: function(input) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo CController::createUrl("/client/createSkill");?>",
                    data: 'name=' + input,
                    success: function(id) {
                        return id;
                    }
                });

                //console.log("return id :" , newid.success);
                return {
                    value: input,
                    text: input
                }
            }
        });
        var dynamicTeam = $("#dynamicTeam");

      /*  $("#profile-form:not(#SupplierTeam_first_name)").on('submit', function() {
            console.log("submitting form");
            var that = $(this);
            var count = 0;
            that.find("[type=text]").each(function() {
                var el = $(this);
                console.log(el.attr("id") + " = " + el.val());
                if (el.val() == "") {
                    count++;
                }
            });
            console.log("count : " + count);
            if (count == 0) {
                console.log("Inside count : " + count);
                return true;
                $.ajax({
                    type: 'POST',
                    data: that.searlize(),
                    url: "",
                    success: function(data) {},
                    error: function(a, b, c) {
                        console.log("Errors : " + a + " | " + b + " | " + c);
                    }
                });
            }
            //return false;
        })*/


    });

    function addNewMember(member) {
        console.log(member);
        var el = $("#" + member);
        var memberName = el.find("#SupplierTeam_first_name").val();
        var memberExper = el.find("#SupplierTeam_experiance").val();
        $('.signup_error_container').hide();
        //Check if fields are not empty
        if (memberName.trim() !== "" && memberExper.trim() !== "") {

            $.ajax({
                type: 'POST',
                data: 'memberid=0&action=add&first_name=' + memberName + "&experiance=" + memberExper,
                url: "<?php echo CController::createUrl('/supplier/ajaxProfile'); ?>",
                success: function(data) {
                    var data = JSON.parse(data);
                    console.log(JSON.stringify(data));
                    $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                    var messageData = data.Success;
                    var htm = "";
                    if (data.iserror) {
                        //rendering error
                        console.log("error found ");
                        messageData = data.errors[0].msg;
                        $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                    } else {
                        messageData = data.success[0].msg;

                        // setting up clone div
                        var cloneDiv = el.clone();
                        cloneDiv.find("[type=button]").html("Add +");
                        cloneDiv.find("#SupplierTeam_first_name").val("");
                        cloneDiv.find("#SupplierTeam_experiance").val("");
                        cloneDiv.appendTo(dynamicTeam);

                        // convert add to remove
                        el.attr("id", "member_" + data.success[0].lastInsertedId);
                        //el.find("[type=button]").html('Remove -').attr("onclick","removeTeamMember('member_"+data.success[0].lastInsertedId+"')");
                        el.find("[type=button]").html('<i class="ico-minus2 text-default"></i>').attr("onclick", "removeTeamMember('member_" + data.success[0].lastInsertedId + "')");
                        el.find("[type=button]").removeClass("btn btn-teal").addClass("bg-border-none");

                    }

                    //Genrating message
                    console.log("message data : " + JSON.stringify(messageData));
                    /*for(var i = 0 ; i<messageData.length ; i++ )
    					{*/
                    htm += messageData + "<br />";
                    //}
                    $("#signup_errors").html(htm);
                    $('.signup_error_container').show('blind', {}, 500)
                    console.log("finsishes all tasks");
                    //var data
                    //if(data.iserror )

                },
                error: function(a, b, c) {
                    console.log("Errors : " + JSON.stringify(a) + " | " + JSON.stringify(b) + " | " + JSON.stringify(c));
                }
            });

        } else {
            $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
            $("#signup_errors").html("Please enter team information first");
            $('.signup_error_container').show('blind', {}, 500)
        }
        hideNotification();


    }

    function removeTeamMember(member) {
        console.log("remove memeber : " + member)
        var el = $("#" + member);
        var memberid = member.toString().split('_');
        console.log("member id : " + el.html());
        $.ajax({
            type: 'POST',
            data: 'memberid=' + memberid[1] + "&action=remove",
            url: "<?php echo CController::createUrl('/supplier/ajaxProfile');?>",
            success: function(data) {
                var data = JSON.parse(data);
                console.log(JSON.stringify(data));
                $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                var messageData = data.Success;
                var htm = "";
                if (data.iserror) {
                    //rendering error
                    console.log("error found ");
                    messageData = data.errors[0].msg;
                    $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                } else {
                    // success
                    //el.hide('blind', {}, 300);
                    el.hide(300);
                    messageData = data.success[0].msg;
                }

                //Genrating message
                console.log("message data : " + JSON.stringify(messageData));

                htm += messageData + "<br />";
                $("#signup_errors").html(htm);
                $('.signup_error_container').show('blind', {}, 500)
                console.log("finsishes all tasks");

            },
            error: function(a, b, c) {
                console.log("Errors found : " + a + " | " + b + " | " + c);
            }
        });
        el.hide();
        hideNotification();
        return false;
        //console.log(el.html());
    }

    function hideNotification() {
        //Hide the notification div after 2 second

        setTimeout(function() {
            $(".signup_error_container").hide('blind', {}, 500);
        }, 2000);
    }
</script>


<script type="text/javascript">

    $(document).ready(function() {

        //select_city.disable();

		
        $("#profile-form").parsley();
        $("#profile-form").on("submit", function(e) {
            var ret = true;
            if ($("#SuppliersHasSkills_skills_id").val() == null) {
                var errId = $("#SuppliersHasSkills_skills_id").data("parsley-id-custom");
                console.log("select ID " + errId);
                $("#parsley-id-custom-" + errId).html('<li class="parsley-required">This value is required.</li>').addClass("filled");
                ret = false;
            } else {
                var errId = $("#SuppliersHasSkills_skills_id").data("parsley-id");
                //if(typeof $("#parsley-id-custom-"+errId) !=='undefined')
                //$("#parsley-id-custom-"+errId).html().removeClass("filled");
            }

            //Validating services in a single return message

            var service_len = $("#basic_service").find("input:checkbox:not(:checked)").length;
            var total_service_len = $("#basic_service").find("input:checkbox").length;
            console.log(service_len + " select " + total_service_len);
            if (service_len >= total_service_len) {
                $("#parsley-id-basic_service").html("<li class='parsley-required'>This value is required.</li>").addClass("filled");
                ret = false;
            } else {
                $("#parsley-id-basic_service").html('').removeClass("filled");
            }
            var industry_len = $("#basic_industry").find("input:checkbox:not(:checked)").length;
            var total_industry_len = $("#basic_industry").find("input:checkbox").length;
            console.log(service_len + " select " + total_service_len);
            if (industry_len >= total_industry_len) {
                $("#parsley-id-basic_industry").html("<li class='parsley-required'>This value is required.</li>").addClass("filled");
                ret = false;
            } else {
                $("#parsley-id-basic_industry").html('').removeClass("filled");
            }


            //Validating Absolute minimum
            if ($("#Suppliers_min_price").val() == "") {
                var errId = $("#Suppliers_min_price").data("parsley-id-custom");
                console.log(errId + "found");
                $("#parsley-id-custom-" + errId).html('<li class="parsley-required">This value is required.</li>').addClass("filled");
                ret = false;
            } else {
                var errId = $("#Suppliers_min_price").data("parsley-id-custom");
                console.log(errId + "found else");
                $("#parsley-id-custom-" + errId).removeClass("filled");
            }

            console.log("submitting profile");
            if (ret == false) {
                return ret;
            }else{
				localStorage.removeItem(formToControl);
			}

            //e.preventDefault();
        });


        $('#coverphoto,#logoimage').click(function() {
            var el = $(this);
            console.log("clicked");
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: ['image/*']
                },
                function(InkBlob) {
                    el.find(":input[type=text],:input[type=hidden]").val(InkBlob.url);
                    console.log(InkBlob.url);
                },
                function(FPError) {
                    //alert("Error Uploading Files : " + FPError.toString());
                    console.log(FPError.toString());
                }
            );

        });
        $('body').on('change', '#countries_dropdown', function() {
            select_city.clearOptions();
            select_city.load(function(callback) {
                select_city.enable();
                callback();
            });
            $.ajax({
                'type': 'POST',
                'url': '<?php echo CController::createUrl('/site/dynamicBudget'); ?>',
                'data': {
                    'country': this.value
                },
                'cache': false,
                'success': function(data) {
                    updateBudget(data);
                }
            });
            return false;
        });

    });


</script>
<script type="text/javascript">
	var formToControl = "profile-form";
	var renderform = function(formData){
		console.log("render form called");
        var formData = JSON.parse(formData);
        $.each(formData, function (index,el) {
            var tagname = $("[name='"+el.name+"']").get(0).tagName ;
			var eltype = $("[name='"+el.name+"']").get(0).type;
			console.log(eltype);
            switch(eltype){
				case "text":
					renderTextBox(el.name,el.value);
					break;
				case "select-one":
					renderSelectBox(el.name,el.value);
					break;
				case "textarea":
					renderTextBox(el.name,el.value);
					break;
				case "select-multiple" :
					renderSelectBox(el.name,el.value);
					break;
				case "radio" :
					renderRadioBox(el.name,el.value)
					break;
				case "checkbox" :
					break;


			}
            $("[name='"+el.name+"']").val(el.value);
         });


    }

	var renderTextBox = function(name,val){
		console.log("render text box called !");
		$("[name='"+name+"']").val(val);
	};
	var renderRadioBox = function(name,val){
		console.log("render radio box called !");
		$("[name='"+name+"']").each(function(){

			if($(this).val() == val){
				console.debug("radio "+ $(this).val() + " - stored val " + val );
				$(this).attr("checked","checked");
			}
		});
	};
	var renderSelectBox = function(name,val){
		console.log("render select box called !");
		$("[name='"+name+"'] option").each(function(){
			if($(this).val() == val)
				$(this).attr("selected","selected");
		});
	}


    $(document).ready(function() {
        $('#standardPitch,#service_agreement').click(function() {
            var el = $(this);
            var allowedMime = [
                'image/*', 'text/plain',
                'application/pdf',
                'application/msword', //.doc
                'application/vnd.ms-powerpoint', //.ppt
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //.docx
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', //.pptx
            ];
            console.log("clicked");
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: allowedMime
                },
                function(InkBlob) {
                    el.find(":input[type=text],:input[type=hidden]").val(InkBlob.url);
                    console.log(InkBlob.url);
                },
                function(FPError) {
                    //alert("Error Uploading Files : " + FPError.toString());
                    console.log(FPError.toString());
                }
            );
        });

		 /*controlling back button for FAQ page */

        if (window.history && window.history.pushState) {

            window.history.pushState('forward', null, 'index.php?r=supplier/#basic');
            $(window).on('popstate', function(e) {
                e.preventDefault();
                console.log("back button pressed ");
              if (localStorage) {
                if(localStorage.getItem(formToControl)){

                     var boottext = "Please save your changes before you leave.";
            bootbox.dialog({
                        message: boottext,
                        title: "There are some unsaved changes!",
                        buttons: {

                             danger: {
                                label: "Discard Changes",
                                className: "btn-danger ",
                                callback: function () {
                                    if(localStorage.getItem(formToControl))
                                        localStorage.removeItem(formToControl);

                                    var id = $("#components li:first a").attr("id");
                                    console.log("finsishes all tasks" +id);
                                    $("#"+id).trigger("click");
									bootbox.hideAll();
                                    // callback
                                }
                            },
                            success: {
                                label: "Save Changes",
                                className: "btn-success",
                                callback: function () {
                                    $("#"+formToControl).submit();
									bootbox.hideAll();
                                }
                            }

                        }
                    });

                }

              }else{
                    console.log("LocalStorage is not supported");
                }

            });

          }
        // Check for LocalStorage support.
        if (localStorage) {
            if(localStorage.getItem(formToControl))
                renderform(localStorage.getItem(formToControl));

            console.log("LocalStorage is supported");
            $(" textarea,input[type=text]","#"+formToControl).bind("change paste keyup", function() {
                localStorage.setItem(formToControl, JSON.stringify($("#"+formToControl).serializeArray()));
            });
			$(" input[type=radio],select","#"+formToControl).bind("change", function() {
                localStorage.setItem(formToControl, JSON.stringify($("#"+formToControl).serializeArray()));
            });

        }
        else{
            alert("Please save your changes befor leaving this page!");
            console.log("LocalStorage is not supported");
        }
    });
</script>


<script type="text/javascript" >
    /*Code for City And Country*/
    var xhr;
        var select_state, $select_state;
        var select_city, $select_city;
        $select_state = $('#countries_dropdown').selectize({selectOnTab:true});
        $select_city = $('#dynamicities').selectize({
            valueField: 'value',
            labelField: 'name',
		    searchField: ['name'],
		    sortField: 'name',
            selectOnTab:true
        });

        select_city = $select_city[0].selectize;
        select_state = $select_state[0].selectize;


    function updateBudget(data) {
        var newdata = JSON.parse(data);
        console.log("update budget", newdata);
        $("#dynamicities").html(newdata.options);

        //Ritesh code
        var selectJson = {};
        selectJson = new Array();
        var select = document.getElementById("dynamicities");

        for (var i = 0; i < select.options.length; i++) {
            var option = select.options[i];
            var optionJson = {};
            optionJson = {
                value: option.value,
                name: option.text
            };
            //console.log("json " , optionJson);
            selectJson.push(optionJson);
        }
        //console.log(selectJson);

        $select_state = $('#countries_dropdown').selectize({selectOnTab:true});
        select_city.disable();
        select_city.clearOptions();
        select_city.load(function(callback) {
            select_city.enable();
            callback(selectJson);
        });


        //Ritesh

        var index = 0;
        $(".zonebudget").each(function() {
            if (index < 3) {
                var el = $(this);
                console.log("data recived : " + index + " -" + newdata.priceTier[index].id)
                el.find(":input").val(newdata.priceTier[index].id);
                el.find(".semibold").html("$" + newdata.priceTier[index].min_price + " - $" + newdata.priceTier[index].max_price);
            }
            index++;


        });
    }


    /*End of code for city and country*/


</script>
