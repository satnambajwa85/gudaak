<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php
        		$list_data	= Users::model()->findAllByAttributes(array('role_id'=>3));
				foreach($list_data as $listval)
					$listval->display_name=$listval->display_name.'::'.$listval->username;
				$listData = CHtml::listData($list_data,'id', 'display_name');
			    if($model->isNewRecord)
                {
				    echo $form->dropDownList($model,'users_id',$listData,array('empty'=>'Select a User'));
                }else{
                    echo $form->dropDownList($model,'users_id',$listData,array('empty'=>'Select a User','disabled'=>'disabled'));
                }
		?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>
	<br />
	<!-- Supplier First Name Last Name-->
    <div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>
	<br />
	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>
    <br />
	<!-- Supplier FN LN Ends-->

	<!-- <div class="row">
		<?php //echo $form->labelEx($model,'cover'); ?>
		<?php //echo $form->textField($model,'cover',array('size'=>60,'maxlength'=>250)); ?>
		<?php //echo $form->error($model,'cover'); ?>
	</div>-->

	<!-- Company Name-->
    <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<!--<div class="row">
		
		<?php //echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>500)); ?>
		<?php //echo $form->error($model,'logo'); ?>
	</div>
-->	<br />
	<!-- Alternate Email-->
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<br />
	<!-- Phone Number-->
	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>
	<br />
	<!-- Skype -->
    <div class="row">
		<?php echo $form->labelEx($model,'skype_id'); ?>
		<?php echo $form->textField($model,'skype_id',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'skype_id'); ?>
	</div>
	<br />
	<!-- Logo-->
	<div class="row">
	<?php echo $form->labelEx($model,'logo',array('class'=>'col-sm-1')); ?>
    <div class="col-sm-5" id="logoimage">
        <div class="input-group">
            <?php echo $form->hiddenField($model,'logo',array('placeholder'=>"Logo","class"=>"form-control")); ?>
            <input type="text" readonly class="form-control" value="<?php echo  $model->logo; ?>">
            <span class="input-group-btn">
                <div class="btn btn-primary btn-file">
                    <span class="icon iconmoon-file-3"></span>Browse

        </div>
        </span>
    </div>
  </div>
		<?php if(!empty($model->logo)){ ?>
        <div class="col-sm-4 ">
            <div class="btn btn-teal">
                <a href="<?php echo $model->logo; ?>" style="color:white" class="magnific">View</a>
    
            </div>
    
        </div>
        <?php } ?>
    </div>
	<br />
	<!-- Location Start-->
    <div class="row">
				<?php echo CHtml::label('Country','');?>
                <?php          
                             $countryList	= States::model()->findAll();
                             $list = CHtml::listData($countryList, 'id', 'name');
                                                 
                       if(isset($model->cities->states_id))
					   {   echo CHtml::dropDownList('state_id',$model->cities->states_id, $list, 
                          array(
                            'prompt'=>'Select Region',
                            'style'=>'width:200px',
                            /*'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('site/dynamicBudget'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update'=>'#Suppliers_cities_id', //or 'success' => 'function(data){...handle the data in the way you want...}',
                          'data'=>array('state_id'=>'js:this.value'),
                          )*/)); }
						  else
						  {
							  echo CHtml::dropDownList('state_id',array(), $list, 
                          array(
                            'prompt'=>'Select Region',
                            'style'=>'width:200px',
							/*'ajax'=>array( 'type'=>'POST', 'url' => CController::createUrl('/site/dynamicBudget'), 'data'=> array('country'=>'js:this.value'), 'success'=>'function(data){updateBudget(data);}' ),
                            'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('site/dynamicCity'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update'=>'#Suppliers_cities_id', //or 'success' => 'function(data){...handle the data in the way you want...}',
                          'data'=>array('state_id'=>'js:this.value'),
                          )
						  */
						  ));
						  }
                ?>
	</div>
    <br />
	<div class="row">
		<?php echo $form->labelEx($model,'cities_id'); ?>
		<?php 
		if(isset($model->cities->states_id)){
			echo  $form->dropDownList($model,'cities_id', CHtml::listData(Cities::model()->findAllByAttributes(array('states_id'=>$model->cities->states_id)),'id','name'), array('prompt'=>'Select City','style'=>'width:200px',/* 'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('site/dynamicPriceTire'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update'=>'#Suppliers_price_tier_id', //or 'success' => 'function(data){...handle the data in the way you want...}',
                            'data'=>array('cities_id'=>'js:this.value'),
                          )*/));
		}
		else
		{
			echo  $form->dropDownList($model,'cities_id', array(), array('prompt'=>'Select City','style'=>'width:200px', 'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('site/dynamicPriceTire'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update'=>'#Suppliers_price_tier_id', //or 'success' => 'function(data){...handle the data in the way you want...}',
                            'data'=>array('cities_id'=>'js:this.value'),
                          )));
		}?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>
    <br />
  <!-- Location End-->

 <!-- Skills-->
    <div class="row">
                        <label class="col-sm-1">Languages:</label>
                        <div class="col-sm-8 ">
                            <?php $supplierSkills	= array();
										$skills	                =	Skills::model()->findAll();
										if(!$model->isNewRecord)
										 	{

												foreach($model->suppliersHasSkills as $skilled)
												 $supplierSkills[]=$skilled->skills->id;
											}?>
                            <select id="SuppliersHasSkills_skills_id" class="form-control " placeholder="Select skills..." multiple name="SuppliersHasSkills[skills_id][]" data-parsley-id-custom="12345">

                                <?php foreach($skills as $skill){?>

                                <?php if(in_array($skill->id,$supplierSkills)){ ?>
                                <option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$supplierSkills))?'selected="selected"':'';?> >
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
    <br />
     <!-- Team -->
	<div class="form-group work_experince">
                        <label class="col-sm-2 control-label">Team
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
                            <?php  
							foreach($supplierTeam as $item){ ?>
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
	<br /><br />

   	<!-- Services-->
	<div class="form-group" id="basic_service">
                        <label class="col-sm-4 control-label">Q. What services does your company offer?
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <!-- Software Development -->
                            <div class="col-sm-4 pl0 pr0 groupSD">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Software Development</label>
                                <?php $serviceRequired=0;
								$services = Services::model()->findAll();
								foreach($services as $service){ 
									if($service->category =='SD')
									{?>
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
                            <div class="col-sm-4 pl0 pr0 groupITS">
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
    <br />
    <!-- Industries-->
	<div class="form-group" id="basic_industry">
           		<label class="col-sm-4 control-label">Q. In which of these categories does your company have experience in? 
           			<span class="text-danger">*</span>
              </label>
                        <div class="col-sm-8">
                            <!-- Group IO -->
                            <?php $industries	=	Industries::model()->findAll();?>
                            <div class="col-sm-6 pl0 pr0 groupSD">
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
     <br /><br />

	<!-- Price Tier -->
     <div class="row">
    	<div class="col-sm-10">
		<?php echo $form->labelEx($model,'price_tier_id'); ?>
		
		<?php if(isset($model->priceTier)&&!$model->isNewRecord ){ 
		$tiersNew=array();
		
		foreach($model->cities->states->priceZone->priceTiers as $tiers)
		{
			$tiersNew[$tiers->id]=CHtml::encode($tiers->title.' $'.$tiers->min_price.' - $'.$tiers->max_price);
		}
		
			echo  $form->dropDownList($model,'price_tier_id', $tiersNew, array('style'=>'width:200px'));?>
		<?php echo $form->error($model,'price_tier_id');}
		else
		{
		echo  $form->dropDownList($model,'price_tier_id', array(), array('prompt'=>'Select Price Tier','style'=>'width:200px'));?>
		<?php echo $form->error($model,'price_tier_id');	
			} ?>
            </div>
	</div>  
	<br />
	 <div class="row">
		<?php echo $form->labelEx($model,'min_price'); ?>
		<?php echo $form->textField($model,'min_price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'min_price'); ?>
	</div>
	<br />
	<div class="row">
		<?php  echo $form->labelEx($model,'pricing_details'); ?>
		<?php  echo $form->textField($model,'pricing_details',array('size'=>60,'maxlength'=>500)); ?>
		<?php  echo $form->error($model,'pricing_details'); ?>
	</div> 
  	<br />
	
    <!--    <div class="row">
		<?php //echo $form->labelEx($model,'tagline'); ?>
		<?php //echo $form->textField($model,'tagline',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'tagline'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'short_description'); ?>
		<?php //echo $form->textField($model,'short_description',array('size'=>60,'maxlength'=>300)); ?>
		<?php //echo $form->error($model,'short_description'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'details'); ?>
		<?php //echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'details'); ?>
	</div>

	 -->

<!-- About Company Start-->
	<div class="row">
		<?php echo $form->labelEx($model,'about_company'); ?>
		<?php echo $form->textArea($model,'about_company',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_company'); ?>
	</div>
	<br />
	<div class="row">
		<?php echo $form->labelEx($model,'number_of_employee'); ?>
		<?php echo $form->textField($model,'number_of_employee',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'number_of_employee'); ?>
	</div>
	<br />
	<div class="row">
		<?php echo $form->labelEx($model,'foundation_year'); ?>
		<?php echo $form->textField($model,'foundation_year',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'foundation_year'); ?>
	</div>
    <br />
	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>
 <!-- About Company Ends -->
	<br />
    <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
        <?php  echo $form->radioButtonList($model,'status',array('Deactivate','Profile Submitted','Approve','Signed/Verified'),array('labelOptions'=>array('style'=>'display:inline','checked'=>'checked'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'status'); ?>
	</div>
    <br />
	  <div class="row">
		<?php echo $form->labelEx($model,'is_faq_complete'); ?>
		<?php echo $form->radioButtonList($model,'is_faq_complete',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'is_faq_complete'); ?>
	</div>  
    <br />
      <div class="row">
		<?php echo $form->labelEx($model,'is_profile_complete'); ?>
		<?php echo $form->radioButtonList($model,'is_profile_complete',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'is_profile_complete'); ?>
	</div>  
    <br />
      <div class="row">
		<?php echo $form->labelEx($model,'is_application_submit'); ?>
		<?php echo $form->radioButtonList($model,'is_application_submit',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'is_application_submit'); ?>
	</div>  
	<br />
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'rough_estimate'); ?>
		<?php //echo $form->textArea($model,'rough_estimate',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'rough_estimate'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'open_source_links'); ?>
		<?php //echo $form->textField($model,'open_source_links',array('size'=>60,'maxlength'=>100)); ?>
		<?php //echo $form->error($model,'open_source_links'); ?>
	</div> 

	<div class="row">
		<?php //echo $form->labelEx($model,'consultation_description'); ?>
		<?php //echo $form->textArea($model,'consultation_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'consultation_description'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'total_available_employees'); ?>
		<?php //echo $form->textField($model,'total_available_employees',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'total_available_employees'); ?>
	</div>
-->
	<br />

	<!-- Standard Pitch Document-->
	<div class="form-group">
                        <label class="col-sm-4 control-label">Standard Pitch Deck <span class="text-danger"></span>
                        </label>
                        <div class="col-sm-4" id="standardPitch">
                            <div class="input-group">
                                <input type="text" readonly class="form-control" value="<?php echo $model->standard_pitch; ?>">
                                <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span>Browse
                                <?php echo $form->hiddenField($model,'standard_pitch',array('placeholder'=>"",'class'=>'form-control')); ?>
                            </div>
                            </span>

                        </div>
                    </div>
                    <?php if(!empty($model->standard_pitch)){ ?>
                    <div class="col-sm-4 ">
                        <div class="btn btn-primary ">
                            <a href="<?php echo $model->standard_pitch; ?>" target="_blank" style="color:white">View</a>

                        </div>

                    </div>
                    <?php }?>

                </div>
	<br /><br />

	<!-- Standard Service Agreement -->
	<div class="form-group">
                    <label class="col-sm-4 control-label">Standard Service Agreements <span class="text-danger"></span>
                    </label>
                    <div class="col-sm-4" id="service_agreement">
                        <div class="input-group">
                            <input type="text" readonly class="form-control" value="<?php echo  $model->standard_service_agreement; ?>">
                            <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span>Browse
                            <?php echo $form->hiddenField($model,'standard_service_agreement',array('placeholder'=>"",'class'=>'form-control')); ?>
                        </div>
                        </span>
                    </div>

                </div>
                <?php if(!empty($model->standard_service_agreement)){ ?>
                <div class="col-sm-4 ">
                    <div class="btn btn-primary ">
                        <a href="<?php echo $model->standard_service_agreement; ?>" style="color:white" target="_blank">View</a>

                    </div>

                </div>

                <?php }?>

            </div>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'accept_new_project_date'); ?>
		<?php //echo $form->textField($model,'accept_new_project_date'); ?>
		<?php //echo $form->error($model,'accept_new_project_date'); ?>
	</div>
	-->
	 
 
	  
<!--
	<div class="row">
		<?php //echo $form->labelEx($model,'response_time'); ?>
		<?php //echo $form->textField($model,'response_time',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'response_time'); ?>
	</div> 

	<div class="row">
		<?php //echo $form->labelEx($model,'add_date'); ?>
		<?php //echo $form->textField($model,'add_date'); ?>
		<?php //echo $form->error($model,'add_date'); ?>
	</div> -->
  <br />
<br />

	<div class="row buttons col-sm-10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save Changes',array('class'=>'btn btn-info large pull-right ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
 $(document).ready(function() {
        $('.signup_error_container').hide();}
		);
$('body').on('change', '#state_id', function() {
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
		
function updateBudget(data) {
	var newdata = JSON.parse(data);
	$("#Suppliers_cities_id").html(newdata.options);
	var $str	=	'';
	$.each(newdata.priceTier, function(index, value){
		$str+='<option value="'+value.id+'">'+value.title+'  $'+value.min_price+'- $'+value.max_price+'</option>';
	});
	$("#Suppliers_price_tier_id").html($str);
	
	//$("#Suppliers_price_tier_id").html(newdata.priceTier);
	// selectJson.push(optionJson);
}
	// var obj = {};
    //$("#Suppliers_price_tier_id").each(function (i, op) {
      //  priceTier[$(op).text()] = $(op).val();
    //});
   // var s = JSON.stringify(priceTier);
        //console.log(selectJson);

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

        $("#profile-form:not(#SupplierTeam_first_name)").on('submit', function() {
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
        })


    

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
                url: "<?php echo $this->createUrl('ajaxProfile',array('supid'=>$model->id)); ?>",
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
            url: "<?php echo $this->createUrl('ajaxProfile',array('supid'=>$model->id));?>",
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
		
		
    } 
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
</script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/filepicker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script><strong></strong>