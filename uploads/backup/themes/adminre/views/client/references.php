<section class="container-fluid">
                <!-- Page Header -->
<!--
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">VenturePact - Feedback on Service Provider </h4>
                    </div>
                </div>
-->
                <!--/ Page Header -->

                <!-- section header -->
                <div class="section-header">
                    <h5 class="semibold title mb15"></h5>
                </div>
                <!--/ section header -->

                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- START Panel -->
                        <div class="panel panel-default">
                            <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Review for <?php echo $company;?></h3>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- START Form Wizard -->
<?php $form=$this->beginWidget('CActiveForm', array('htmlOptions'=>array('id'=>'wizard-validate','class'=>"form-horizontal form-bordered",))); ?>
 <!-- Wizard Container 1 -->
                                <div class="wizard-title">Step 1</div>
                                <div class="wizard-container">
<div class="panel-body">
									<!--<div class="form-group">
                                        <label class="col-sm-4 control-label">Company Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">-->
                                        <?php //echo $form->hiddenField($model,'company_name',array('class'=>'form-control','data-parsley-group'=>"order",'data-parsley-required'=>'data-parsley-required')); ?>
                                        <!--</div>
                                    </div>-->
    
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">How would you rate your service provider on the following criteria? <span class="text-muted">&nbsp;&nbsp;&nbsp; 5: Excellent, 3: Satisfactory, 1: Poor Experience</span></label>
                                    </div>
                                    
                                    
                                  <div class="form-group">
                                        <label class="col-sm-4 control-label">Communication<span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-9 mt5">
                                            <span class="radio-inline custom-radio custom-radio-primary">
                                            <input type="radio" value="5" id="customradio1" <?php echo ($model->q1_communication_rating==5)?'checked="checked"':'';?>  name="q1_communication_rating" >
                                            <label for="customradio1">&nbsp;&nbsp;5</label>
                                            </span>
                                            <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                            </ul>
                                            <span class="radio-inline custom-radio custom-radio-primary">
                                            <input type="radio" value="4" id="customradio2" <?php echo ($model->q1_communication_rating==4)?'checked="checked"':'';?> name="q1_communication_rating" >
                                            <label for="customradio2">&nbsp;&nbsp;4</label>
                                            </span>
                                            <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                            </ul>
                                            <span class="radio-inline custom-radio custom-radio-primary">
                                            <input type="radio" value="3" id="customradio3" <?php echo ($model->q1_communication_rating==3)?'checked="checked"':'';?> name="q1_communication_rating" >
                                            <label for="customradio3">&nbsp;&nbsp;3</label>
                                            </span>
                                            <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                            </ul>
                                            <span class="radio-inline custom-radio custom-radio-primary">
                                            <input type="radio" value="2" id="customradio4" <?php echo ($model->q1_communication_rating==2)?'checked="checked"':'';?> name="q1_communication_rating" >
                                            <label for="customradio4">&nbsp;&nbsp;2</label>
                                            </span>
                                            <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                            </ul>
                                            <span class="radio-inline custom-radio custom-radio-primary">
                                            <input type="radio" value="1" id="customradio5" <?php echo ($model->q1_communication_rating==1)?'checked="checked"':'';?> name="q1_communication_rating"  data-parsley-group="order" data-parsley-required data-parsley-id="2060">
                                            <label for="customradio5">&nbsp;&nbsp;1</label>
                                            </span>
                                            <small class="help-block">Did the service provider communicate regularly? Was the service provider responsive?</small>
                                        </div>
                                            
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-4 control-label">Technical Skills<span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-9 mt5">
                                            <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="5" id="customradio11" <?php echo ($model->q2_skill_rating==5)?'checked="checked"':'';?> name="skill_rating"  data-parsley-id="2060">
                                <label for="customradio11">&nbsp;&nbsp;5</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="4" id="customradio12" <?php echo ($model->q2_skill_rating==4)?'checked="checked"':'';?> name="skill_rating"  data-parsley-id="5093">
                                <label for="customradio12">&nbsp;&nbsp;4</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="3" id="customradio13" <?php echo ($model->q2_skill_rating==3)?'checked="checked"':'';?> name="skill_rating"  data-parsley-id="7921">
                                <label for="customradio13">&nbsp;&nbsp;3</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="2" id="customradio14" <?php echo ($model->q2_skill_rating==2)?'checked="checked"':'';?> name="skill_rating"  data-parsley-id="1698">
                                <label for="customradio14">&nbsp;&nbsp;2</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="1" id="customradio15" <?php echo ($model->q2_skill_rating==1)?'checked="checked"':'';?> name="skill_rating"    data-parsley-group="order" data-parsley-required data-parsley-id="7281">
                                <label for="customradio15">&nbsp;&nbsp;1</label>
                                </span>
                                <small class="help-block">Did you face any major technical difficulties with the product?</small>

                                
                                        </div>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label class="col-sm-4 control-label">Adherance to Timelines<span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-9 mt5">
                                            <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="5" id="customradio21" <?php echo ($model->q3_timelines_ratings==5)?'checked="checked"':'';?> name="timelines_ratings"  data-parsley-id="2060">
                                <label for="customradio21">&nbsp;&nbsp;5</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="4" id="customradio22" <?php echo ($model->q3_timelines_ratings==4)?'checked="checked"':'';?> name="timelines_ratings"  data-parsley-id="5093">
                                <label for="customradio22">&nbsp;&nbsp;4</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="3" id="customradio23" <?php echo ($model->q3_timelines_ratings==3)?'checked="checked"':'';?> name="timelines_ratings"  data-parsley-id="7921">
                                <label for="customradio23">&nbsp;&nbsp;3</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="2" id="customradio24" <?php echo ($model->q3_timelines_ratings==2)?'checked="checked"':'';?> name="timelines_ratings"  data-parsley-id="1698">
                                <label for="customradio24">&nbsp;&nbsp;2</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="1" id="customradio25" <?php echo ($model->q3_timelines_ratings==1)?'checked="checked"':'';?> name="timelines_ratings"    data-parsley-group="order" data-parsley-required data-parsley-id="7281">
                                <label for="customradio25">&nbsp;&nbsp;1</label>
                                </span>
                                <small class="help-block">Did the service provider finish the project in time?</small>

                                
                                        </div>
                                        </div>
                                    </div>
                                    
                               <div class="form-group">
                                        <label class="col-sm-4 control-label">Product Thinking<span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-9 mt5">
                                            <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="5" id="customradio31" <?php echo ($model->q4_independence_rating==5)?'checked="checked"':'';?> name="independence_rating"  data-parsley-id="2060">
                                <label for="customradio31">&nbsp;&nbsp;5</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="4" id="customradio32" <?php echo ($model->q4_independence_rating==4)?'checked="checked"':'';?> name="independence_rating"  data-parsley-id="5093">
                                <label for="customradio32">&nbsp;&nbsp;4</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="3" id="customradio33" <?php echo ($model->q4_independence_rating==3)?'checked="checked"':'';?> name="independence_rating"  data-parsley-id="7921">
                                <label for="customradio33">&nbsp;&nbsp;3</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="2" id="customradio34" <?php echo ($model->q4_independence_rating==2)?'checked="checked"':'';?> name="independence_rating"  data-parsley-id="1698">
                                <label for="customradio34">&nbsp;&nbsp;2</label>
                                </span>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a">
                                </ul>
                                <span class="radio-inline custom-radio custom-radio-primary">
                                <input type="radio" value="1" id="customradio35" <?php echo ($model->q4_independence_rating==1)?'checked="checked"':'';?> name="independence_rating"  data-parsley-group="order" data-parsley-required data-parsley-id="7281">
                                <label for="customradio35">&nbsp;&nbsp;1</label>
                                </span>
                                <small class="help-block">Was the service provier able to make independent product decisions? Did you have to hand hold the team a lot?</small>

                                
                                        </div>
                                        </div>
                                    </div>
                                    
                                
                            </div>
                                </div>
                                <!--/ Wizard Container 1 -->

								<!-- Wizard Container 2 -->
                                <div class="wizard-title">Step 2</div>
                                <div class="wizard-container">
                                  <div class="panel-body">
                                  <div class="form-group">
                                        <label class="col-sm-4 control-label">What did the service provider do well? <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                              <?php echo $form->textArea($model,'provider_do_well',array('class'=>'form-control', 'data-parsley-group'=>"payment", 'data-parsley-required'=>'data-parsley-required')); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">What could the service provider do to improve? <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                             <?php echo $form->textArea($model,'provider_improve',array('class'=>'form-control','data-parsley-group'=>"payment", 'data-parsley-required'=>'data-parsley-required')); ?>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group">
                                        <label class="col-sm-4 control-label">>How did they handle problems and issues that came up during development? <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                              <?php echo $form->textArea($model,'problems_during_development',array('class'=>'form-control','data-parsley-group'=>"payment", 'data-parsley-required'=>'data-parsley-required')); ?>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label class="col-sm-4 control-label">What did the service provider build or do for you? What was your project? <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                              <?php echo $form->textArea($model,'client_project_description',array('class'=>'form-control','data-parsley-group'=>"payment", 'data-parsley-required'=>'data-parsley-required')); ?>
                                        </div>
                                    </div>
                                 </div>
                                </div>
                                <!--/ Wizard Container 2 -->

                                
                                
                            <?php $this->endWidget(); ?>
                            <!--/ END Form Wizard --> 
                        </div>
                        <!--/ END Panel -->
                    </div>
                </div>
                <!--/ END row -->
                
              
            </section>
<?php if($model->status==1){?>
<script type="text/javascript">
$("form :input").attr("disabled","disabled");
$("form :select").attr("disabled","disabled");
$("form :radio").attr("disabled","disabled");
</script>
<?php } ?>



<?php if(Yii::app()->user->hasFlash('success')):
?>
<script type="text/javascript">
$(document).ready( function() {
	function loadPopMess() {    // To Load the Popupbox
		$('.mess_popup').fadeIn("slow");
		$(".mess_popup_container").css({ // this is just for style
			"z-index": "9999","height":"100%"
		});        
	}
	function unloadPopupBox() {    // TO Unload the Popupbox
		$('.mess_popup').fadeOut("slow");
		$(".mess_popup_container").css({ // this is just for style       
			"z-index": "-1","height":"auto"
		});
	}
	loadPopMess();
	$('.popupBoxClose').click( function() {
		unloadPopMess1();
	});
});</script>


<div class="mess_popup_container">

	<div class="mess_popup pl0 pt0 pr0"> 
    <div class="alert_head "><h4 class="pa15 mt0">Your review has been recorded.</h4></div>
		<div class="area_set pa15">  
<!--			<div class="success_icon_outer" ><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/success_icon.png" alt="" /></div>-->
            
			<div class="success_text">
			
			<?php echo Yii::app()->user->getFlash('success'); ?>
			</div>
            <div class=" pull-right " >
			<?php echo CHtml::link('OK', array('/client/index'),array('class'=>'btn btn-teal '));?>
			</div>
        </div>
<!--        <a class="popupBoxClose"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_cancel.png" alt="" /></a>-->
	</div>
</div>
<?php endif; ?>