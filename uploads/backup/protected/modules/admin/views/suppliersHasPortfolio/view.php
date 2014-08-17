<script type="text/javascript">
$(document).ready(function() {
	$('input').each(function (){
		$(this).attr("disabled",'disabled');
	});
	$('select').each(function (){
		$(this).attr("disabled",'disabled');
	});
	 $('#openBrow').attr("disabled",'disabled');

})
</script>

<h1>View SuppliersHasPortfolio #<?php echo $model->id; ?></h1>
 <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/magnific-popup.min.css">
<div class="form" style="margin-right:4%">
<a href="<?php echo $this->createUrl('suppliersHasPortfolio/update',array('id'=>$model->id));?>" class="btn btn-info pull-right">Edit Portfolio</a>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-has-portfolio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_id'); ?>
	 	<?php
				$lists	    =	Suppliers::model()->findAll('status=3');
				$listData = CHtml::listData($lists,'id', 'name');
				if(!$model->isNewRecord)
			    echo $form->dropDownList($model,'suppliers_id',$listData,array('empty'=>'Select one or many','multiple'=>false,'size'=>'1','style'=>'width:200px',"disabled"=>"disabled" ));
			   else
			   echo $form->dropDownList($model,'suppliers_id',$listData,array('empty'=>'Select one or many','multiple'=>false,'size'=>'1','style'=>'width:200px'));
	 ?>
		<?php echo $form->error($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover'); ?>
       <!-- <input type="text" readonly id="faketxtbox" class="" value="<?php echo $model->cover; ?>">-->
        <?php echo $form->hiddenField($model,'cover',array('placeholder'=>"",'class'=>'')); ?>
        <div class="  file" style="padding: 4px 10px;margin-bottom: 5px;">
	 	<a href="<?php echo $model->cover; ?>" target="_blank"><img src="<?php echo $model->cover; ?>" width="150px" alt="Image Not Available" /></a>
        </div>
   		<?php echo $form->error($model,'cover'); ?>
   </div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_link'); ?>
		<?php echo $form->textField($model,'project_link',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'project_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'industry_id'); ?>
		<?php $lists	    =	Industries::model()->findAll();
			  $listData = CHtml::listData($lists,'id', 'name');
			  echo $form->dropDownList($model,'industry_id',$listData,array('empty'=>'Select Industry','multiple'=>false,'size'=>'1','style'=>'width:200px'));?>
		<?php echo $form->error($model,'industry_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_done'); ?>
		<?php echo $form->textField($model,'year_done',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'year_done'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_id'); ?>
		<div class="form-group">
                	<div class="col-sm-12">
						<div class="col-sm-8">
							<!-- Software Development -->
							<div class="col-sm-4 pl0 pr0 groupSD">
								<label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Software Development</label>
                                <?php $requiredCount=0;
								$services =	 Services::model()->findAll();
								?>
								<?php foreach($services as $service){
									if($service->category =='SD'){?>
								<div class="panel-heading pl0 pr0">

									<span class="radio-inline custom-radio custom-radio-primary">
										<input type="radio" value="<?php echo $service->id;?>" id="customradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" <?php echo ($service->id==$model->service_id?'checked="checked"':'');?> <?php echo ($requiredCount==0?'required':'');$requiredCount++; ?> />

										<label for="customradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
									</span>
								</div>
                                <?php
									}
								} ?>


                            </div>
                            <!--/ Software Development -->

                            <!-- Enterprise Software -->
                            <div class="col-sm-4 pl0 pr0 groupITS">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Enterprise Software</label>
                               <?php foreach($services as $service){
									if($service->category =='ITS'){?>
								<div class="panel-heading pl0 pr0">

									<span class="radio custom-radio custom-radio-teal pb0">
										<input type="radio" value="<?php echo $service->id;?>" id="customradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" <?php echo ($service->id==$model->service_id?'checked="checked"':'');?>  />
										<label for="customradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
									</span>

								</div>
                                <?php
									}
								} ?>
                            </div>
                            <!--/ Enterprise Software -->

                            <!-- Other Services -->
                            <div class="col-sm-4 pl0 pr0">
                                <label class="col-sm-12 gray_label_new pl0 pr0 mb15 pb0">Other Services</label>
                              <?php foreach($services as $service){
									if($service->category =='OS'){?>
								<div class="panel-heading pl0 pr0">

									<span class="radio custom-radio custom-radio-teal pb0">
										<input type="radio" value="<?php echo $service->id;?>" id="customradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" <?php echo ($service->id==$model->service_id?'checked="checked"':'');?>  />
										<label for="customradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
									</span>

								</div>
                                <?php
									}
								} ?>
                            </div>
                            <!--/ Other Services -->

                        </div>
               		</div>
                </div>
		<?php echo $form->error($model,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimate_price'); ?>
		<?php echo $form->textField($model,'estimate_price'); ?>
		<?php echo $form->error($model,'estimate_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimate_timelines'); ?>
		<?php echo $form->textField($model,'estimate_timelines',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'estimate_timelines'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'languages_used'); ?>
		<div class="form-group">
					<div class="col-sm-12">

						<div class="col-sm-7"><?php
										$supplierSkills	= array();
										$skills	                =	Skills::model()->findAll();
										if(!$model->isNewRecord)
										 	{

												foreach($model->suppliersPortfolioHasSkills as $skilled)
												 $supplierSkills[]=$skilled->skills->id;
											}

							 			 ?>
							<select id="SuppliersPortfolioHasSkillsEdit_id" class="form-control " placeholder="Select languages.." multiple name="SuppliersHasSkills[skills_id][]"  >

									<?php

										foreach($skills as $skill)
										{

											if(in_array($skill->id,$supplierSkills))
											{
									?>
												<option value="<?php echo $skill->id;?>" selected="selected"><?php echo $skill->name;?>	</option>
									<?php
											}
											else
											{ ?>

												<option value="<?php echo $skill->id;?>" ><?php echo $skill->name;?>	</option>
                                    <?php   }
										} ?>
								</select>

						</div>
					</div>
				</div>
		<?php echo $form->error($model,'languages_used'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
	    <?php echo $form->radioButtonList($model,'status',array('Not Verified','Verified'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ')) ;?>	<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	$('#openBrow').click(function(){
			console.log("clicked");
			filepicker.setKey("<?php echo $this->filpickerKey; ?>");
			filepicker.pick({
    			mimetypes: ['image/*']
				},
				function(InkBlob){
					$("#SuppliersHasPortfolio_cover,#faketxtbox").val(InkBlob.url);
			  		console.log(InkBlob.url);
				},
				function(FPError){
    				console.log(FPError.toString());
  				}
			);
		});
		 $("#SuppliersPortfolioHasSkillsEdit_id").selectize({
			delimiter: ",",
				persist: false,
				create: function (input) {
					$.ajax({
						type:'POST',
						url:"<?php echo CController::createUrl("/client/createSkill");?>",
						data : 'name='+input,
						success: function(id){
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



</script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/filepicker.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/page1.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/steps/js/jquery.steps.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/inputmask/js/inputmask.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/scroller.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/page.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/validate.js"></script>
