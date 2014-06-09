<div id="profile-details" class="modal fade">
    	<div class="modal-dialog2">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
							<a data-dismiss="modal" class="btn btmar btn-info pull-right close-btn ">close</a>
							
                            	 <div  class="col-md-12 pd0 login-box pull-left">
                                    <div id="scrollBar" style="max-height:410px">			 
                                    <div class="pull-left">
                                              <div class="mr0 col-md-12 fl">
                                                <div class="my_profile_outr">
                                                  <h1>My Profile</h1>
                                                </div>
                                                <div id="tabs">
                                                    <ul class="tab-fix-height">
                                                        <li class="next-active-res1"><a href="#tabs-1">Personal Details</a></li>
                                                        <li><p class="breaker">-</p></li>
                                                        <li class="next-active-res2"><a href="#tabs-2">Academic</a></li>
                                                        <li><p class="breaker">-</p></li>
                                                        <li class="next-active-res3"><a href="#tabs-3">Interest</a></li>
                                                    </ul>
                                                    <p><a class="edit-form" href="javascript:void(0);">Edit Details</a></p>
                                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                                                                'id'=>'person-form-edit_person-form',
                                                                                'enableAjaxValidation'=>false,
                                                                                    'htmlOptions'=>array(
                                                                                                           'onsubmit'=>"return false;",/* Disable normal form submit */
                                                                                                           'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
                                                                                                         ),
                                                                            )); ?>
                                                    <div id="tabs-1">
                                                        <div class="profile_tab1_form ">
                                                            <div  class="user-profile-form">
                                                            <div class="profile_tab1_left">
                                                               
                                                                <input type="text" disabled="disabled" value="<?php echo $model->first_name;?>" />
                                                                <input type="text" disabled="disabled" value="<?php echo $model->last_name;?>" />
                                                                <input type="text" disabled="disabled" value="<?php echo $model->date_of_birth;?>" />
                                                                <input type="text" disabled="disabled" value="<?php echo $model->gender;?>" />
                                                                <input class="big_index" type="text" disabled="disabled"  value="<?php echo $model->email;?>" />
                                                                <input class="big_index" type="text" disabled="disabled"  value="+91<?php echo $model->mobile_no;?>" />
                                                                <input type="text" disabled="disabled" value="<?php echo $model->generateGudaakIds->cities->title;?>" />
                                                                <select disabled="disabled" >
                                                                    <option value="State"> - <?php echo $model->generateGudaakIds->cities->states->title;?> -</option>
                                                                </select>
                                                            </div>
                                                            <div class="profile_tab1_right margin-top27">
                                                                <select disabled="disabled" >
                                                                    <option value="State"> -<?php echo $model->generateGudaakIds->cities->states->countries->title;?>-</option>
                                                                </select>
                                                                <input type="text" disabled="disabled" value="<?php echo (!empty($model->postcode))?''.$model->postcode.'':'Postcode here';?>" />
                                                                <select disabled="disabled" class="uClass">
                                                                    <option value="State"><?php echo $model->class;?></option>
                                                                </select> 
                                                                <input class="big_index" disabled="disabled"  type="text" value="<?php echo $model->generateGudaakIds->schools->name;?>" />
                                                                <ul>
                                                                    <li>
                                                                        <a class="next_button next_button1" href="#tabs-2">Next Step</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                            <div class="user-profile-form-after" style="display:none;">
                                                        
                                                            <div class="profile_tab1_left ">
                                                                <?php echo $form->textField($model,'first_name',array('placeholder'=>'First name','class'=>'alpha required'));
                                                                echo $form->error($model,'first_name');?>
                                                                <?php echo $form->textField($model,'last_name',array('placeholder'=>'Last name','class'=>'alpha required'));
                                                                echo $form->error($model,'last_name');?>
            <div style="position:relative !important;z-index:2000!important;">													
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'model'=>$model,
            'attribute'=>'date_of_birth',
            'options'=>array('dateFormat'=>'yy-mm-dd',
            'changeMonth'=>'true',
            'changeYear'=>'true',),
            'htmlOptions'=>array('id'=>'disabledInput','placeholder'=>'DOB'),
            
            ));
                                                                echo $form->error($model,'date_of_birth');?>
                                                                </div>
                                                                <?php 
                                                                $list2	=	array('Male'=>'Male','Female'=>'Female');
                                                                echo CHtml::dropDownList('UserProfiles[gender]',$model->gender,$list2,array(''=>''));
                                                                ?>
                                                                <?php echo $form->textField($model,'email',array('placeholder'=>'Email','class'=>'email required big_index'));
                                                                echo $form->error($model,'email');?>
                                                            
                                                                <?php echo $form->textField($model,'mobile_no',array('placeholder'=>'Mobile no.','maxlength'=>'10','class'=>'phone required big_index'));
                                                                echo $form->error($model,'mobile_no');?>
                                                          
                                                                <input type="text" placeholder="City Name" value="<?php echo $model->generateGudaakIds->cities->title;?>" />
                                                                <select>
                                                                    <option value="State"> - <?php echo $model->generateGudaakIds->cities->states->title;?> -</option>
                                                                </select>
                                                            </div>
                                                            <div class="profile_tab1_right margin-top27">
                                                                <select>
                                                                    <option value="State"> -<?php echo $model->generateGudaakIds->cities->states->countries->title;?>-</option>
                                                                </select>
                                                             
                                                                <?php echo $form->textField($model,'postcode',array('placeholder'=>'Postcode here'));
                                                                echo $form->error($model,'postcode');?>
            
            
            
                                                                <?php echo $form->dropDownList($model,'class',array('placeholder'=>'Class','value'=>''.$model->class.''));
                                                                echo $form->error($model,'class');?>
                                                               
                                                                <input class="big_index" type="text" placeholder="School Name" value="<?php echo $model->generateGudaakIds->schools->name;?>" />
                                                                <p>
            <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
            array(
                    'id'=>'uploadFile',
                    'config'=>array(
                           'action'=>Yii::app()->createUrl('user/upload'),
                           'allowedExtensions'=>array("jpg","jpeg","gif",'png'),//array("jpg","jpeg","gif","exe","mov" and etc...
                           'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                           'minSizeLimit'=>124,// minimum file size in bytes
                           'onComplete'=>"js:function(id, fileName, responseJSON){ 
                           $('#imgPical').val(fileName);
                           $('#imgPic').attr('src','/uploads/user/small/'+fileName);}",
                          )
            )); ?>
            
                                                                
                                                                <?php echo CHtml::Button('Update',array('onclick'=>'send("'.Yii::app()->createUrl('/user/editProfile').'");','class'=>'next_button','style'=>'width:134px;')); ?> 
                                                                </p>
            <?php echo $form->hiddenField($model,'image',array('id'=>'imgPical'));?>
                                                            </div>
                                                        </div>	
                                                        </div>
                                                    
                                                    </div>
                                                    <div id="tabs-2">
                                                        <div  class="user-profile-form">
                                                        
                                                            <div class="profile_tab1_left">
                                                            	 
                                                                <div class="tab2_form_box">
                                                                    <div class="col-md-12">
                                                                            <div class="col-md-12"><h4>Academic performance in last examination</h4></div><!--<div class="col-md-4"><h4 class="pull-right">percentage</h4></div>--></div>
                                                                            
                                                                    <?php 
                                                                        $count	=	count($model->userProfilesHasUserSubjects);
                                                                        $index	=	0;
                                                                        if($count!=0){
                                                                            foreach($model->userProfilesHasUserSubjects as $subjact){
                                                                            if($index==0){?>
                                                                            <div class="col-md-12">
                                                                            <div class="col-md-8">
                                                                            <?php 
                                                                            echo $form->textField($model,'currentSubject['.$index.']',array('value'=>'Total','readonly'=>"readonly",'class'=>'big_index','disabled'=>'disabled'));?>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <?php 
                                                                            $list	=	array('Below 40%'=>'Below 40%','40% - Below 50%'=>'40% - Below 50%','50% - Below 60%'=>'50% - Below 60%','60% - Below 70%'=>'60% - Below 70%','70% - Below 80%'=>'70% - Below 80%','80% - Below 90%'=>'80% - Below 90%','Above 90%'=>'Above 90%');
                                                                    echo CHtml::dropDownList('UserProfiles[percentage]['.$index.']',$subjact->percentage,$list,array('class'=>'big_index','disabled'=>'disabled'));?>
                                                                            </div>
                                                                            </div>
                                                                            <?php }else{?>
                                                                            <div class="col-md-12">
                                                                            <div class="col-md-8">
                                                                            
                                                                            <?php 
                                                                            echo $form->textField($model,'currentSubject['.$index.']',array('value'=>$subjact->userSubjects->title,'class'=>'big_index','disabled'=>'disabled'));?>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <?php 
                                                                             $list	=	array('Below 40'=>'Below 40','40 - Below 50'=>'40 - Below 50','50 - Below 60'=>'50 - Below 60','60 - Below 70'=>'60 - Below 70','70 - Below 80'=>'70 - Below 80','80 - Below 90'=>'80 - Below 90','Above 90'=>'Above 90');
                                                                    echo CHtml::dropDownList('UserProfiles[percentage]['.$index.']',$subjact->percentage,$list,array('class'=>'big_index','disabled'=>'disabled'));?>
                                                                            </div>
                                                                            </div>
                                                                        <?php }
                                                                            $index++;	
                                                                            
                                                                            }
                                                                        } ?>
                                                                        <div class="col-md-12">
                                                                            
                                                                        
                                                                    <?php	while($index<6){?>
                                                                        <div class="col-md-8">
                                                                        <?php echo $form->textField($model,'currentSubject['.$index.']',array('class'=>'big_index','disabled'=>'disabled'));?>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                    <?php 
                                                                             $list	=	array('Below 40'=>'Below 40','40 - Below 50'=>'40 - Below 50','50 - Below 60'=>'50 - Below 60','60 - Below 70'=>'60 - Below 70','70 - Below 80'=>'70 - Below 80','80 - Below 90'=>'80 - Below 90','Above 90'=>'Above 90');
                                                                    echo CHtml::dropDownList('UserProfiles[percentage]['.$index.']','',$list,array('class'=>'big_index','disabled'=>'disabled'));?>
                                                                    </div>
                                                                    <?php
                                                                        $index++;
                                                                        }?>
                                                                </div>
                                                                <div class="tab2_form_box">
                                                                    <h4>Two most favourite subjects?</h4>
                                                                    <?php $count	=	count($model->userProfilesHasUserSubjects);
                                                                        $favIndex	=	0;
                                                                        if($count!=0){
                                                                            foreach($model->userProfilesHasUserSubjects as $favorite){
                                                                                if($favorite->is_favorite==1){
                                                                                    echo $form->textField($model,'favorite['.$favIndex.']',array('value'=>$favorite->userSubjects->title,'class'=>'big_index','disabled'=>'disabled'));
                                                                                    $favIndex++;
                                                                                }
                                                                            }
                                                                        } 
                                                                        while($favIndex<2){
                                                                            echo $form->textField($model,'favorite['.$favIndex.']',array('class'=>'big_index','onChange'=>'favorite(this.value)','disabled'=>'disabled'));
                                                                            $favIndex++;
                                                                            }?>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="profile_tab1_right">
                                                                <div class="tab2_form_box">
                                                                    <h4>Least favourite subjects?</h4>
                                                                    <?php $count	=	count($model->userProfilesHasUserSubjects);
                                                                        $favIndex2	=	0;
                                                                        if($count!=0){
                                                                            foreach($model->userProfilesHasUserSubjects as $lestFavorite){
                                                                                if($lestFavorite->least_favourite==1){
                                                                                    echo $form->textField($model,'Lestfavorite['.$favIndex2.']',array('value'=>$lestFavorite->userSubjects->title,'class'=>'big_index','disabled'=>'disabled'));
                                                                                    $favIndex2++;
                                                                                }
                                                                            }
                                                                        } 
                                                                        while($favIndex2 < 2){
                                                                            echo $form->textField($model,'Lestfavorite['.$favIndex2.']',array('class'=>'big_index','onChange'=>'lestFavorite(this.value)','disabled'=>'disabled'));
                                                                    $favIndex2++;} ?>
                                                                
                                                                 
                                                                     
                                                                </div>
                                                                <div class="tab2_form_box_right">
                                                                    <h4>Languages known <br />( put commas to separate more than one entries)</h4>
                                                                    <?php echo $form->textField($model,'language_known',array('class'=>'big_index','value'=>$model->language_known,'placeholder'=>'Languages Known','disabled'=>'disabled'));
                                                                    echo $form->error($model,'language_known');?>
                                                                 
                                                                </div>
                                                                <div class="tab2_form_box_right">
                                                                    <h4>Medium of instruction at School / College</h4>
                                                                    <?php echo $form->textField($model,'medium_instruction',array('class'=>'big_index','disabled'=>'disabled','placeholder'=>'Medium of instruction at School / College'));
                                                                    echo $form->error($model,'medium_instruction');?>
                                                                     
                                                                </div>
                                                                
                                                                <div class="tab2_form_box_right">
                                                                    <h4>Board</h4>
                                                                    <?php $list	=	array('CBSE'=>'CBSE','ICSE'=>'ICSE','State Board'=>'State Board');
                                                                    echo CHtml::dropDownList('UserProfiles[board]',$model->board,$list,array('class'=>'big_index','disabled'=>'disabled'));
                                                                    //echo $form->textField($model,'board',array('class'=>'big_index'));?>
                                                                     
                                                                </div>
                                                                 
                                                                <p>	<a href="#tabs-3" class="next_button next_button2">Next Step</a> 
                                                                </p>
                                                                     
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="user-profile-form-after" style="display:none;">
                                                            <div class="profile_tab1_left">
                                                                <div class="tab2_form_box">
                                                                    <div class="col-md-12">
                                                                            <div class="col-md-12"><h4>Academic performance in last examination</h4></div><!--<div class="col-md-4"><h4 class="pull-right">percentage</h4></div>--></div>
                                                                            
                                                                    <?php 
                                                                        $count	=	count($model->userProfilesHasUserSubjects);
                                                                        $index	=	0;
                                                                        if($count!=0){
                                                                            foreach($model->userProfilesHasUserSubjects as $subjact){
                                                                            if($index==0){?>
                                                                            <div class="col-md-12">
                                                                            <div class="col-md-8">
                                                                            <?php 
                                                                            echo $form->textField($model,'currentSubject['.$index.']',array('value'=>'Total','readonly'=>"readonly",'class'=>'big_index alpha'));?>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <?php 
                                                                            $list	=	array('Below 40%'=>'Below 40%','40% - Below 50%'=>'40% - Below 50%','50% - Below 60%'=>'50% - Below 60%','60% - Below 70%'=>'60% - Below 70%','70% - Below 80%'=>'70% - Below 80%','80% - Below 90%'=>'80% - Below 90%','Above 90%'=>'Above 90%');
                                                                    echo CHtml::dropDownList('UserProfiles[percentage]['.$index.']',$subjact->percentage,$list,array('class'=>'big_index'));?>
                                                                            </div>
                                                                            </div>
                                                                            <?php }else{?>
                                                                            <div class="col-md-12">
                                                                            <div class="col-md-8">
                                                                            
                                                                            <?php 
                                                                            echo $form->textField($model,'currentSubject['.$index.']',array('value'=>$subjact->userSubjects->title,'placeholder'=>'Subject','class'=>'big_index alpha'));?>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <?php 
                                                                             $list	=	array('Below 40'=>'Below 40','40 - Below 50'=>'40 - Below 50','50 - Below 60'=>'50 - Below 60','60 - Below 70'=>'60 - Below 70','70 - Below 80'=>'70 - Below 80','80 - Below 90'=>'80 - Below 90','Above 90'=>'Above 90');
                                                                    echo CHtml::dropDownList('UserProfiles[percentage]['.$index.']',$subjact->percentage,$list,array('class'=>'big_index'));?>
                                                                            </div>
                                                                            </div>
                                                                        <?php }
                                                                            $index++;	
                                                                            
                                                                            }
                                                                        } ?>
                                                                        <div class="col-md-12">
                                                                            
                                                                        
                                                                    <?php	while($index<6){?>
                                                                        <div class="col-md-8">
                                                                        <?php echo $form->textField($model,'currentSubject['.$index.']',array('class'=>'alpha big_index','placeholder'=>'Subject'));?>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                    <?php 
                                                                             $list	=	array('Below 40'=>'Below 40','40 - Below 50'=>'40 - Below 50','50 - Below 60'=>'50 - Below 60','60 - Below 70'=>'60 - Below 70','70 - Below 80'=>'70 - Below 80','80 - Below 90'=>'80 - Below 90','Above 90'=>'Above 90');
                                                                    echo CHtml::dropDownList('UserProfiles[percentage]['.$index.']','',$list,array('class'=>'big_index'));?>
                                                                    </div>
                                                                    <?php
                                                                        $index++;
                                                                        }?>
                                                                </div>
                                                                <div class="tab2_form_box">
                                                                    <h4>Two most favourite subjects?</h4>
                                                                    <?php $count	=	count($model->userProfilesHasUserSubjects);
                                                                        $favIndex	=	0;
                                                                        if($count!=0){
                                                                            foreach($model->userProfilesHasUserSubjects as $favorite){
                                                                                if($favorite->is_favorite==1){
                                                                                    echo $form->textField($model,'favorite['.$favIndex.']',array('value'=>$favorite->userSubjects->title,'placeholder'=>'Favourite subjects','class'=>'alpha big_index'));
                                                                                    $favIndex++;
                                                                                }
                                                                            }
                                                                        } 
                                                                        while($favIndex<2){
                                                                            echo $form->textField($model,'favorite['.$favIndex.']',array('class'=>'big_index alpha'));
                                                                            $favIndex++;
                                                                            }?>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="profile_tab1_right">
                                                                <div class="tab2_form_box">
                                                                    <h4>Least favourite subjects?</h4>
                                                                    <?php $count	=	count($model->userProfilesHasUserSubjects);
                                                                        $favIndex2	=	0;
                                                                        if($count!=0){
                                                                            foreach($model->userProfilesHasUserSubjects as $lestFavorite){
                                                                                if($lestFavorite->least_favourite==1){
                                                                                    echo $form->textField($model,'Lestfavorite['.$favIndex2.']',array('value'=>$lestFavorite->userSubjects->title,'placeholder'=>'Least favourite subjects','class'=>'alpha big_index'));
                                                                                    $favIndex2++;
                                                                                }
                                                                            }
                                                                        } 
                                                                        while($favIndex2 < 2){
                                                                            echo $form->textField($model,'Lestfavorite['.$favIndex2.']',array('class'=>'alpha big_index'));
                                                                    $favIndex2++;} ?>
                                                                
                                                                 
                                                                     
                                                                </div>
                                                                <div class="tab2_form_box_right">
                                                                    <h4>Languages known <br />( put commas to separate more than one entries)</h4>
                                                                    <?php echo $form->textField($model,'language_known',array('class'=>'big_index','value'=>$model->language_known,'placeholder'=>'Languages Known'));
                                                                    echo $form->error($model,'language_known');?>
                                                                 
                                                                </div>
                                                                <div class="tab2_form_box_right">
                                                                    <h4>Medium of instruction at School / College</h4>
                                                                    <?php echo $form->textField($model,'medium_instruction',array('class'=>'alpha big_index','placeholder'=>'Medium of instruction at School / College'));
                                                                    echo $form->error($model,'medium_instruction');?>
                                                                     
                                                                </div>
                                                                
                                                                <div class="tab2_form_box_right">
                                                                    <h4>Board</h4>
                                                                    <?php $list	=	array('CBSE'=>'CBSE','ICSE'=>'ICSE','State Board'=>'State Board');
                                                                    echo CHtml::dropDownList('UserProfiles[board]',$model->board,$list,array('class'=>'big_index'));
                                                                    //echo $form->textField($model,'board',array('class'=>'big_index'));?>
                                                                     
                                                                </div>
                                                                 
                                                                <p><?php echo CHtml::Button('Update',array('onclick'=>'send("'.Yii::app()->createUrl('/user/editProfile').'");','class'=>'next_button','style'=>'width:134px;')); ?></p>
                                                                     
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tabs-3">
                                                        <div  class="user-profile-form">
                                                        
                                                        <div class="profile_tab1_form">
                                                            <div class="col-md-12">
                                                                <div class="profile_tab3_left">
                                                                    
                                                                    <div class="tab2_form_box">
                                                                        <h4>What are your current Interest?</h4>
                                                                        <div class="col-md-12">
                                                                            <?php 
                                                                            foreach($Interests as $interest){
                                                                            echo '<div class="col-md-4">'.$form->checkBox($model,'interest['.$interest->id.']',array('disabled'=>'disabled','value'=>$interest->id,'checked'=>(in_array($interest->id,$selInter))?'checked':'')).' '.$interest->title.'</div>';
                                                                            }?>
                                                                         </div>   
                                                                    </div>
                                                                     
                                                                     
                                                                     
                                                                     
                                                                </div>
                                                            </div>
                                                         </div>
                                                        </div>
                                                        <div class="user-profile-form-after" style="display:none;">
                                                        
                                                        <div class="profile_tab1_form">
                                                            <div class="col-md-12">
                                                                <div class="profile_tab3_left">
                                                                  
                                                                    <div class="tab2_form_box">
                                                                        <h4>What are your current Interest?</h4>
                                                                        <div class="col-md-12">
                                                                            <?php 
                                                                            foreach($Interests as $interest){
                                                                            echo '<div class="col-md-4">'.$form->checkBox($model,'interest['.$interest->id.']',array('onChange'=>'interest(this.value,id='.$interest->id.')','value'=>$interest->id,'checked'=>(in_array($interest->id,$selInter))?'checked':'')).' '.$interest->title.'</div>';
                                                                            }?>
                                                                         </div>   
                                                                    </div>
                                                                     
                                                                     
                                                                     
                                                                     
                                                                </div>
                                                                <p><?php echo CHtml::Button('Update',array('onclick'=>'send("'.Yii::app()->createUrl('/user/editProfile').'");','class'=>'next_button','style'=>'width:134px;')); ?></p>
                                                            </div>
                                                        </div>
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                        <?php $this->endWidget(); ?>
                                                    
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
<script type="text/javascript">
	$(".edit-form").click(function(){
		$(".user-profile-form").hide();
		$(".user-profile-form-after").show();
	});
	$(".close-btn").click(function(){
		$(".user-profile-form").show();
		$(".user-profile-form-after").hide();
		
	}); 
</script>