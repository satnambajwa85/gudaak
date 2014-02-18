<div id="partial-render">

        <div class="career-bot pull-left">
          <div class="mr0 col-md-12 fl">
            <div class="my_profile_outr">
              <h1>My Profile</h1>
            </div>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Profile Details</a></li>
                    <li><p class="breaker">-</p></li>
                    <li><a href="#tabs-2">Academic</a></li>
                    <li><p class="breaker">-</p></li>
                    <li><a href="#tabs-3">Interest</a></li>
                </ul>
                <div id="tabs-1">
                	<div class="profile_tab1_form ">
						<div  id="user-profile-form">
                    	<div class="profile_tab1_left">
								<?php if(Yii::app()->user->hasFlash('updated')): ?>
									<div class="alert alert-success">
									  <button data-dismiss="alert" class="close" type="button">×</button>
									  <strong><?php echo Yii::app()->user->getFlash('updated'); ?></strong>
									</div>
										<div class="flash-error">
											
										</div>
								<?php endif; ?>	
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
                        <div class="profile_tab1_right">
                            <select>
                            	<option value="State"> -<?php echo $model->generateGudaakIds->cities->states->countries->title;?>-</option>
                            </select>
                            <input type="text" placeholder="<?php echo $model->postcode;?>" />
                            <select style="float:left; margin-left:22px;">
                            	<option value="State"><?php echo $model->class;?></option>
                            </select> 
                            <input class="big_index" type="text" placeholder="<?php echo $model->generateGudaakIds->schools->name;?>" />
                            <p>
                            <a class="next_button" href="#tabs-2">Next Step</a>
                            </p>
                        </div>
						</div>
                    </div>
					 <div class="profile_tab1_form" style="display:none;">
                    	<div class="profile_tab1_left">
                        	<p><a href="javascript:void(0);">Edit Details</a></p>
							<?php $form=$this->beginWidget('CActiveForm', array(
																	'id'=>'user-profile-form',
																	'enableClientValidation'=>true,
																		'clientOptions'=>array(
																			'validateOnSubmit'=>true,
																		),
																));?> 
							<?php echo $form->textField($model,'first_name',array('placeholder'=>''.$model->first_name.''));
							echo $form->error($model,'first_name');?>
							<?php echo $form->textField($model,'last_name',array('placeholder'=>''.$model->last_name.''));
							echo $form->error($model,'last_name');?>
							<?php echo $form->textField($model,'date_of_birth',array('placeholder'=>''.$model->date_of_birth.''));
							echo $form->error($model,'date_of_birth');?>
							<?php echo $form->textField($model,'gender',array('placeholder'=>''.$model->gender.''));
							echo $form->error($model,'gender');?>
							<?php echo $form->textField($model,'email',array('placeholder'=>''.$model->email.''));
							echo $form->error($model,'email');?>
							<?php echo $form->textField($model,'mobile_no',array('placeholder'=>''.$model->mobile_no.''));
							echo $form->error($model,'mobile_no');?>
							<?php echo $form->textField($model,'mobile_no',array('placeholder'=>''.$model->mobile_no.''));
							echo $form->error($model,'mobile_no');?>
                      
                            <input type="text" placeholder="<?php echo $model->generateGudaakIds->cities->title;?>" />
                            <select>
                            	<option value="State"> - <?php echo $model->generateGudaakIds->cities->states->title;?> -</option>
                            </select>
                        </div>
                        <div class="profile_tab1_right">
                            <select>
                            	<option value="State"> -<?php echo $model->generateGudaakIds->cities->states->countries->title;?>-</option>
                            </select>
							<?php echo $form->textField($model,'postcode',array('placeholder'=>''.$model->postcode.''));
							echo $form->error($model,'postcode');?>
                            
							<?php echo $form->dropDownList($model,'class',array('class'=>'left','placeholder'=>''.$model->class.''));
							echo $form->error($model,'class');?>
                           
                            <input class="big_index" type="text" placeholder="<?php echo $model->generateGudaakIds->schools->name;?>" />
                            <p>
							<?php echo CHtml::submitButton('Submit',array('class'=>''));?>
                            </p>
                        </div>
						<?php $this->endWidget(); ?>
                    </div>
                
                </div>
                <div id="tabs-2">
                	<div class="profile_tab1_form">
                    	<div class="profile_tab1_left">
                        	<p><a href="javascript:void(0);">Edit Details</a></p>
                            <div class="tab2_form_box">
                            	<h4>What are your current subjects?</h4>
                                <input class="big_index" type="text" placeholder="Physical Science" />
                                <input class="big_index" type="text" placeholder="Physical Science" />
                            </div>
                            <div class="tab2_form_box">
                            	<h4>Two most favourite subjects?</h4>
                                <input class="big_index" type="text" placeholder="Physical Science" />
                                <input class="big_index" type="text" placeholder="Physical Science" />
                                <a href="javascript:void(0);">Add more subjects</a>
                            </div>
                            <div class="tab2_form_box">
                            	<h4>Least favourite subjects?</h4>
                                <input class="big_index" type="text" placeholder="Physical Science" />
                            </div>
                        </div>
                        <div class="profile_tab1_right">
                            <div class="tab2_form_box_right">
                            	<h4>Two most favourite subjects?</h4>
                                <input class="big_index" type="text" placeholder="Physical Science" />
                            </div>
                            <div class="tab2_form_box_right">
                            	<h4>Language Known</h4>
                                <input class="big_index" type="text" placeholder="Physical Science" />
                            </div>
                            <div class="tab2_form_box_right">
                            	<h4>Medium of instruction at School / College</h4>
                                <input class="big_index" type="text" placeholder="Physical Science" />
                            </div>
                            <p>
                            <a class="next_button" href="#tabs-3">Next Step</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div id="tabs-3">
                	<div class="profile_tab1_form">
                    	<div class="profile_tab1_left">
                        	<div class="profile_tab3_left">
                                <p><a href="javascript:void(0);">Edit Details</a></p>
                                <div class="tab2_form_box">
                                    <h4>What are your current subjects?</h4>
                                    <input class="big_index" type="text" placeholder="Physical Science" />
                                </div>
                                <div class="tab2_form_box">
                                    <h4>Two most favourite subjects?</h4>
                                    <input class="big_index" type="text" placeholder="Physical Science" />
                                    <a href="javascript:void(0);">Add more subjects</a>
                                </div>
                                <div class="tab2_form_box">
                                    <h4>Least favourite subjects?</h4>
                                    <input class="big_index" type="text" placeholder="Physical Science" />
                                    <a href="javascript:void(0);">Add more subjects</a>
                                </div>
                                <div class="tab2_form_box">
                                    <h4>Least favourite subjects?</h4>
                                    <input class="big_index" type="text" placeholder="Physical Science" />
                                </div>
                                <p>
                                	<a class="next_button" href="javascript:void(0);">Submit</a>
                                </p>
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
      <div class="col-md-2 pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			
</div>


