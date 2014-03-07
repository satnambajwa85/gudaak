<div id="profile-details" class="modal fade">
    	<div class="modal-dialog2">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
							<a data-dismiss="modal" class="btn btmar btn-info pull-right ">close</a>
								
                            	 <div  class="col-md-12 pd0 login-box pull-left">
						<div id="scrollBar" style="max-height:410px">			 
						<div class="pull-left">
								  <div class="mr0 col-md-12 fl">
									<div class="my_profile_outr">
									  <h1>My Profile</h1>
									</div>
									<div id="tabs">
										<ul class="tab-fix-height">
											<li class="next-active-res1"><a href="#tabs-1">Profile Details</a></li>
											<li><p class="breaker">-</p></li>
											<li class="next-active-res2"><a href="#tabs-2">Academic</a></li>
											<li><p class="breaker">-</p></li>
											<li class="next-active-res3"><a href="#tabs-3">Interest</a></li>
										</ul>
										<div id="tabs-1">
											<div class="profile_tab1_form ">
												<div  id="user-profile-form">
												<div class="profile_tab1_left">
													<p><a class="edit-form" href="javascript:void(0);">Edit Details</a></p>
													<input type="text" placeholder="<?php echo $model->first_name;?>" />
													<input type="text" placeholder="<?php echo $model->last_name;?>" />
													<input type="text" placeholder="<?php echo $model->date_of_birth;?>" />
													<input type="text" placeholder="<?php echo $model->gender;?>" />
													<input class="big_index" type="text" placeholder="<?php echo $model->email;?>" />
													<input class="big_index" type="text" placeholder="+91<?php echo $model->mobile_no;?>" />
													<input type="text" placeholder="<?php echo $model->generateGudaakIds->cities->title;?>" />
													<select>
														<option value="State"> - <?php echo $model->generateGudaakIds->cities->states->title;?> -</option>
													</select>
												</div>
												<div class="profile_tab1_right margin-top27">
													<select>
														<option value="State"> -<?php echo $model->generateGudaakIds->cities->states->countries->title;?>-</option>
													</select>
													<input type="text" placeholder="<?php echo (!empty($model->postcode))?''.$model->postcode.'':'Postcode here';?>" />
													<select class="uClass">
														<option value="State"><?php echo $model->userClass->title;?></option>
													</select> 
													<input class="big_index" type="text" placeholder="<?php echo $model->generateGudaakIds->schools->name;?>" />
													<ul>
														<li>
															<a class="next_button next_button1" href="#tabs-2">Next Step</a>
														</li>
													</ul>
												</div>
												</div>
											</div>
											 <div class="profile_tab1_form" style="display:none;">
												<div class="profile_tab1_left">
												
													<p><a href="javascript:void(0);">Edit Details</a></p>
													<?php $form=$this->beginWidget('CActiveForm', array(
																	'id'=>'person-form-edit_person-form',
																	'enableAjaxValidation'=>false,
																		'htmlOptions'=>array(
																							   'onsubmit'=>"return false;",/* Disable normal form submit */
																							   'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
																							 ),
																)); ?>
													<?php echo $form->textField($model,'first_name',array('placeholder'=>''.$model->first_name.''));
													echo $form->error($model,'first_name');?>
													<?php echo $form->textField($model,'last_name',array('placeholder'=>''.$model->last_name.''));
													echo $form->error($model,'last_name');?>
													<?php echo $form->textField($model,'date_of_birth',array('placeholder'=>''.$model->date_of_birth.''));
													echo $form->error($model,'date_of_birth');?>
													<?php echo $form->textField($model,'gender',array('placeholder'=>''.$model->gender.''));
													echo $form->error($model,'gender');?>
													<?php echo $form->textField($model,'email',array('placeholder'=>''.$model->email.'','class'=>'big_index'));
													echo $form->error($model,'email');?>
												
													<?php echo $form->textField($model,'mobile_no',array('placeholder'=>''.$model->mobile_no.'','class'=>'big_index'));
													echo $form->error($model,'mobile_no');?>
											  
													<input type="text" placeholder="<?php echo $model->generateGudaakIds->cities->title;?>" />
													<select>
														<option value="State"> - <?php echo $model->generateGudaakIds->cities->states->title;?> -</option>
													</select>
												</div>
												<div class="profile_tab1_right margin-top27">
													<select>
														<option value="State"> -<?php echo $model->generateGudaakIds->cities->states->countries->title;?>-</option>
													</select>
												 
													<?php echo $form->textField($model,'postcode',array('placeholder'=>''.(!empty($model->postcode))?''.$model->postcode.'':'Postcode here'.''));
													echo $form->error($model,'postcode');?>
													
													<?php echo $form->dropDownList($model,'class',array('placeholder'=>''.$model->userClass->title.''));
													echo $form->error($model,'class');?>
												   
													<input class="big_index" type="text" placeholder="<?php echo $model->generateGudaakIds->schools->name;?>" />
													<p>
													<?php echo CHtml::Button('Update',array('onclick'=>'send();','class'=>'next_button','style'=>'width:134px;')); ?> 
													</p>
												</div>
												<?php $this->endWidget(); ?>
												
											</div>
										
										</div>
										<div id="tabs-2">
											<div class="profile_tab1_form">
											<?php 
													$form=$this->beginWidget('CActiveForm', array(
																			'id'=>'person-form-academic-form',
																			'enableAjaxValidation'=>false,
																			'htmlOptions'=>array(
																				   'onsubmit'=>"return false;",/* Disable normal form submit */
																				   'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
																					 ),)); ?>
												<div class="profile_tab1_left">
													<!--<p><a href="javascript:void(0);">Edit Details</a></p>-->
													<div class="tab2_form_box">
														<h4>What are your current subjects?</h4>
														<?php $count	=	count($model->userProfilesHasUserSubjects);
															if($count!=0){
																foreach($model->userProfilesHasUserSubjects as $subjact){
																if($subjact->status==1 && $subjact->is_favorite==0)
																echo $form->textField($model,'currentSubject['.$subjact->id.']',array('onChange'=>'subjectUpdateCall(this.value,id='.$subjact->id.')','value'=>$subjact->userSubjects->title,'class'=>'big_index'));
																}
															} 
															else{?>
														<?php echo $form->textField($model,'currentSubject[]',array('class'=>'big_index','onChange'=>'academic(this.value)'));?>
														<?php echo $form->textField($model,'currentSubject[]',array('class'=>'big_index','onChange'=>'academic(this.value)'));?>
														<?php echo $form->textField($model,'currentSubject[]',array('class'=>'big_index','onChange'=>'academic(this.value)'));?>
														<?php echo $form->textField($model,'currentSubject[]',array('class'=>'big_index','onChange'=>'academic(this.value)'));?>
														<?php } ?>
														<div class="profileHide">
														<?php echo $form->textField($model,'currentSubject[]',array('class'=>'big_index','id'=>'profileHide','onChange'=>'academic()'));?>
														</div>
														 
													 
													</div>
													<div class="tab2_form_box">
														<h4>Two most favourite subjects?</h4>
														<?php $count	=	count($model->userProfilesHasUserSubjects);
															if($count!=0){
																foreach($model->userProfilesHasUserSubjects as $favorite){
																if($favorite->is_favorite==1)
																echo $form->textField($model,'favorite['.$favorite->id.']',array('onChange'=>'subjectUpdateCall(this.value,id='.$favorite->id.')','value'=>$favorite->userSubjects->title,'class'=>'big_index'));
																}
															} 
															else{?>
														<?php echo $form->textField($model,'favorite[]',array('class'=>'big_index','onChange'=>'favorite(this.value)'));?>
														<?php echo $form->textField($model,'favorite[]',array('class'=>'big_index','onChange'=>'favorite(this.value)'));?>
														<?php } ?>
													
														 
														
															 
														 
														<!--<a id="add-more" href="javascript:void(0);">Add more subjects</a>-->
													</div>
													
												</div>
												<div class="profile_tab1_right">
													<div class="tab2_form_box">
														<h4>Least favourite subjects?</h4>
														<?php $count	=	count($model->userProfilesHasUserSubjects);
															if($count!=0){
																foreach($model->userProfilesHasUserSubjects as $lestFavorite){
																if($lestFavorite->least_favourite==1)
																echo $form->textField($model,'Lestfavorite['.$lestFavorite->id.']',array('onChange'=>'subjectUpdateCall(this.value,id='.$lestFavorite->id.')','value'=>$lestFavorite->userSubjects->title,'class'=>'big_index'));
																}
															} 
															else{?>
														<?php echo $form->textField($model,'Lestfavorite[]',array('class'=>'big_index','onChange'=>'lestFavorite(this.value)'));?>
														<?php echo $form->textField($model,'Lestfavorite[]',array('class'=>'big_index','onChange'=>'lestFavorite(this.value)'));?>
														<?php } ?>
													
													 
														 
													</div>
													<div class="tab2_form_box_right">
														<h4>Language Known</h4>
														<?php echo $form->textField($model,'language_known',array('class'=>'big_index','onChange'=>'userProfileData(this.value,id="language")','placeholder'=>''.(!empty($model->language_known))?''.$model->language_known.'':'Language Known'.''));
														echo $form->error($model,'language_known');?>
													 
													</div>
													<div class="tab2_form_box_right">
														<h4>Medium of instruction at School / College</h4>
														<?php echo $form->textField($model,'medium_instruction',array('class'=>'big_index','onChange'=>'userProfileData(this.value,id="medium")','placeholder'=>''.(!empty($model->medium_instruction))?''.$model->medium_instruction.'':'Medium of instruction at School / College'.''));
														echo $form->error($model,'medium_instruction');?>
														 
													</div>
													 
													<p>	<a href="#tabs-3" class="next_button next_button2">Next Step</a> 
													</p>
												 		 
												</div>
											<?php $this->endWidget(); ?>
											</div>
										</div>
										<div id="tabs-3">
											<div class="profile_tab1_form">
												<div class="profile_tab1_left">
													<div class="profile_tab3_left">
														<p><a href="javascript:void(0);">Edit Details</a></p>
														<div class="tab2_form_box">
															<h4>What are your current Interest?</h4>
															<?php $count	=	count($model->userProfilesHasInterests);
															if($count!=0){
																foreach($model->userProfilesHasInterests as $interest){
																if($interest->status==1)
																echo $form->textField($model,'interest['.$interest->id.']',array('onChange'=>'interest(this.value,id='.$interest->id.')','value'=>$interest->interests->title,'class'=>'big_index'));
																}
															} 
															else{?>
															<?php echo $form->textField($model,'interest[]',array('class'=>'big_index','onChange'=>'userInterest(this.value)'));?>
															<?php echo $form->textField($model,'interest[]',array('class'=>'big_index','onChange'=>'userInterest(this.value)'));?>
															<?php echo $form->textField($model,'interest[]',array('class'=>'big_index','onChange'=>'userInterest(this.value)'));?>
															<?php echo $form->textField($model,'interest[]',array('class'=>'big_index','onChange'=>'userInterest(this.value)'));?>
															<?php } ?>
																 
															</div>
														 
														 
														 
														 
													</div>
												</div>
											</div>
										</div>
									</div>

          </div>
						  <div class="clear"></div>
						  <div class="row educationbot  fl">
							<div id="careerLibrary" class="list-view">
							  <div class="summary"></div>
							</div>
						  </div>
						</div>
						</div>
									 
									 
                                 </div>
                               
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
