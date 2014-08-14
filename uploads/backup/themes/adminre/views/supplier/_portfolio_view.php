

<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/profile'),'id'=>'portfolio-edit-supplier','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate')));?>

				<div class="modal-header bgcolor-teal border-radius">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<div class="ico-user-plus2 mr15 mt5 pull-left" style="font-size:16px;"></div>
					<h4 class="modal-title ">Add a new project</h4>
				</div>

				<br/>
				<?php echo $form->hiddenField($portfolio,"id"); ?>
				<input type="hidden" name="action" value="add" />
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Project screenshots
							<span class="text-danger"></span>
						</label>
						<div class="col-sm-7">
							<div class="input-group">
								<input type="text" readonly id="faketxtbox" class="form-control" value="<?php echo $portfolio->cover; ?>">
                                <?php echo $form->hiddenField($portfolio,'cover',array('placeholder'=>"",'class'=>'form-control')); ?>

								<ul class="parsley-errors-list" id="parsley-id-4011"></ul>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file" id="openBrow">
										<span class="icon iconmoon-file-3"></span>Browse
										<ul class="parsley-errors-list" id="parsley-id-6400"></ul>
									</div>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Descriptive project title
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-7">
							<?php echo $form->textField($portfolio,'project_name',array('placeholder'=>"Ecommerce app for fashion brand",'class'=>'form-control','required'=>'required',"data-parsley-maxlength"=>"60")); ?>
							<ul class="parsley-errors-list"></ul>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Project URL
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-7">
							<?php echo $form->textField($portfolio,'project_link',array('placeholder'=>"www.Amazon.com",'class'=>'form-control','required'=>'required',"data-parsley-type"=>"url")); ?>
							<ul class="parsley-errors-list"></ul>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Client name
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-7">
							<?php echo $form->textField($portfolio,'client_name',array('placeholder'=>"Jeff Bezos",'class'=>'form-control','required'=>'required',"data-parsley-maxlength"=>"30")); ?>
							
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Year completed
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-7">
							<?php //echo $form->textField($portfolio,'year_done',array('placeholder'=>"xxxx",'class'=>'form-control','required'=>'required',"data-mask"=>"9999")); ?>
							<?php echo $form->textField($portfolio,'year_done',array('placeholder'=>"xxxx",'class'=>'form-control')); ?>
							
						</div>
					</div>
				</div>
			
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">What exactly did you do for this project/client?
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-7">
                            <?php //echo $form->textArea ($portfolio,'description',array('placeholder'=>"Try to limit your response to 50 words",'class'=>'form-control','required'=>'required',"data-parsley-minlength "=>"[250]")); ?>
                            <?php echo $form->textArea ($portfolio,'description',array('placeholder'=>"Ex: End to end development, Frontend design, Testing.",'class'=>'form-control','required'=>'required')); ?>
<!--                            <span class="help-block">Ex: End to end development, Frontend design, Testing.</span>-->
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Category
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-7">
							<?php $typeList=CHtml::ListData(Industries::model()->findAll(),'id','name'); $htmlOption = array('size'=>'1','prompt'=>'Select industry...','class'=>'form-control','id'=>'SuppliersPortfolioHasSkillsEdit_industryId'); ?>
							<?php echo $form->dropDownList($portfolio, 'industry_id', $typeList, $htmlOption); ?>

						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Languages and frameworks used
							<span class="text-danger"></span>
						</label>
						<div class="col-sm-7">
							<select id="SuppliersPortfolioHasSkillsEdit_id" class="form-control " placeholder="Select languages.." multiple name="SuppliersHasSkills[skills_id][]"  >
                                    
									<?php foreach($skills as $skill){?>
                                    <?php if(in_array($skill->id,$selecetedSkills)){ ?>
									<option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
										<?php echo $skill->name;?>
										
                                    </option>
									<?php }else{ ?>
                                    <option value="<?php echo $skill->id;?>"><?php echo $skill->name;?></option>
                                    <?php }} ?>
								</select>
                           
						</div>
					</div>
				</div>
			
				<!-- new design -->
				<div class="form-group">
                	<div class="col-sm-12">
						<label class="col-sm-4 control-label bm15">Service type<span class="text-danger">*</span></label>
                		<div class="col-sm-8">
							<!-- Software Development -->
							<div class="col-sm-4 pl0 pr0 groupSD bm15">
								<label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Software Development</label>
                                <?php $requiredCount=0; ?>
								<?php foreach($services as $service){
									if($service->category =='SD'){?>
								<div class="panel-heading pl0 pr0">
									
									<span class="radio-inline custom-radio custom-radio-primary">
										<input type="radio" value="<?php echo $service->id;?>" id="customradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" <?php echo ($service->id==$portfolio->service_id?'checked="checked"':'');?> <?php echo ($requiredCount==0?'required':'');$requiredCount++; ?> />
										
										<label for="customradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
									</span>
								</div>
                                <?php 
									}
								} ?>
                                
                                
                            </div>
                            <!--/ Software Development -->
                            
                            <!-- Enterprise Software -->
                            <div class="col-sm-4 pl0 pr0 groupITS bm15">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Enterprise Software</label>
                               <?php foreach($services as $service){									
									if($service->category =='ITS'){?>
								<div class="panel-heading pl0 pr0">
									
									<span class="radio custom-radio custom-radio-teal pb0">  
										<input type="radio" value="<?php echo $service->id;?>" id="customradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" <?php echo ($service->id==$portfolio->service_id?'checked="checked"':'');?>  />
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
										<input type="radio" value="<?php echo $service->id;?>" id="customradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" <?php echo ($service->id==$portfolio->service_id?'checked="checked"':'');?>  />
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
                <!-- new design -->
			
				
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Estimated price
							<span class="text-danger"></span>
						</label>
						<div class="col-sm-7 ">
                            <div class="input-group">
                            <span class="input-group-addon">$</span>

							<?php echo $form->textField($portfolio,'estimate_price',array('placeholder'=>"",'class'=>'form-control  c_integer_coma_allowed',"data-parsley-id-custom"=>"5135")); ?>
                                <?php //echo $form->textField($portfolio,'estimate_price',array('placeholder'=>"",'class'=>'form-control c_required c_integer')); ?>

                                </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-custom-5135"></ul>
							
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Estimated timeline
							<span class="text-danger"></span>
						</label>
						<div class="col-sm-7">
                            <div class="input-group">
								<span class="input-group-addon">Days</span>

								<?php echo $form->textField($portfolio,'estimate_timelines',array('placeholder'=>"",'class'=>'form-control ',"data-parsley-id-custom"=>"5136")); ?>
                                <?php //echo $form->textField($portfolio,'estimate_timelines',array('placeholder'=>"",'class'=>'form-control ')); ?>

							</div>
                            <ul class="parsley-errors-list filled" id="parsley-id-custom-5136"></ul>
						</div>
					</div>
				</div>
<!-- 
				<div class="form-group">
					<div class="col-sm-12">
						<label class="col-sm-4 control-label">Language Used
							<span class="text-danger">*</span>
						</label>
						<div class="col-sm-7">
							<?php //echo $form->textField($portfolio,'languages_used',array('placeholder'=>"Enter Languages coma seprated",'class'=>'form-control','required'=>'required')); ?>
							
						</div>
					</div>
				</div>
	-->		

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<?php echo CHtml::submitButton( 'Save',array( 'id'=>'btnprotfolioedit','class'=>'btn btn-teal')); ?>

				</div>

				<?php $this->endWidget(); ?>


<script type="text/javascript">
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
	$("#SuppliersPortfolioHasSkillsEdit_industryId").selectize();
	var protfolio_edit=$("#portfolio-edit-supplier").parsley();
	$("#SuppliersHasPortfolioEdit_year_done").datepicker({
                changeMonth: true,
                changeYear: true
        });
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
	$("#portfolio-edit-supplier").on("submit",function(e){
        var ret=true;


        /*if($("#SuppliersPortfolioHasSkillsEdit_id").val()==null){
            var errId = $("#SuppliersPortfolioHasSkillsEdit_id").data("parsley-id");
            $("#parsley-id-"+errId).html('<li class="parsley-required">This value is required.</li>').addClass("filled");
            ret =  false;
        }
        else{
            var errId = $("#SuppliersPortfolioHasSkillsEdit_id").data("parsley-id");
            //$("#parsley-id-"+errId).html().removeClass("filled");
        }*/
        if($("#SuppliersPortfolioHasSkillsEdit_industryId").val()==""){
            var errId = $("#SuppliersPortfolioHasSkillsEdit_industryId").data("parsley-id");
            $("#parsley-id-"+errId).html('<li class="parsley-required">This value is required.</li>').addClass("filled");
            ret =  false;
        }else
        {
            var errId = $("#SuppliersPortfolioHasSkillsEdit_industryId").data("parsley-id");
            //$("#parsley-id-"+errId).html().removeClass("filled");
        }
        if(!custom_validate($(this)))
        {
            ret =false;
        }


		  console.log("submitting portfolio");
        //return ret

        return ret;

			//e.preventDefault();
	});
	/* $("#btnprotfolioedit").on("click",function(e){
			if(protfolio_edit.isValid()){
				console.log("valid form sending ajax");
				$.ajax({
				type: "POST",
				data:$("#portfolio-edit-supplier").serialize(),
				url: "<?php echo CController::createUrl('/supplier/ajaxPortfolio'); ?>",
				success: function(data){
					var data= JSON.parse(data);
					console.log(JSON.stringify(data));
					$('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
					var messageData = data.Success ;
					var htm="";
					if(data.iserror){
						//rendering error
						console.log("error found ");
							messageData = data.errors[0].msg;
							$('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
					}else
					{
						messageData = data.success[0].msg;
						$(".portfoliocount").html(parseInt($(".portfoliocount").text())-1);
					}

					//Genrating message
					console.log("message data : " + JSON.stringify(messageData) );
					htm+=messageData + "<br />";
					$("#signup_errors").html(htm);
					$('.signup_error_container').show('blind', {}, 500)

					console.log("finsishes all tasks");
					$("#bs-modal").modal("hide");
					//$(".modal-backdrop").hide();

					//var data
					//if(data.iserror )
				},
				error: function(a,b,c)
				{
					console.log("Error occured : " + a +" | "+ b + " | "+ c);
				}

			});
			hideNotification();
			}
			else
			{
				console.log("In valid form ");
			}
		}); */



</script>
