 <!-- START Template Container -->
            <section class="container-fluid">
        <!-- Page header -->
		 <div class="page-header page-header-block pb0 pt15">

        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li><?php echo CHtml::link('Dashboard', array('/supplier/index'));?></li>
				<li class="text-info">Profile</li>
                <li class="active">Sample Estimate</li>

            </ol>

        </div>
    </div>
	<!--/ Page header -->

               

               
                  <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- START panel -->
						<?php $form=$this->beginWidget('CActiveForm', array('id'=>'estimate-supplier','action'=>Yii::app()->createUrl('/supplier/profile'), 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>


                            <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Option 4</h3>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                            <div class="panel-body">
                              
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Some clients are looking for a tech consultation. This can serve as a great way to build relationships and source clients early on. Would you be open to providing companies with a free tech consultation? If not, please explain why not and how much you would charge for a 10-20 minute consultation.<span class="text-danger">*</span></label>
                                        <div class="col-sm-7 mt5">
												<?php echo $form->textArea($profile,'consultation_description',array('placeholder'=>"",'class'=>'form-control','required'=>'required',"rows"=>"4")); ?>
                                        </div>
                                    </div>
                                    
                               
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">How fast will you be able to respond to a client's request for proposal? A response usually includes a rough high level ballpark cost and timeline estimate, along with any questions you have for the client and any other points or information you would like to point out. We highly recommend responding with a rough estimate (for eg $30-40K ) in 24 hours.</label>
                                    <div class="col-sm-7 mt5">
                                      	<?php echo $form->textArea($profile,'rough_estimate',array('placeholder'=>"",'class'=>'form-control','required'=>'required',"rows"=>"4")); ?>
                                    </div>
                                </div>
                                
                                <div class="panel-footer">
									<div class="form-group no-border">
										<label class="col-sm-5 control-label"></label>
										<div class="col-sm-7">
											<button type="submit" class="btn btn-teal pull-right">Save & Next</button>
										</div>
									</div> 
								</div>
                            </div>
                            
                            <!--/ panel body -->
                        	<?php $this->endWidget(); ?>
                        <!-- END panel -->
                    </div>
                </div>
                <!--/ END row -->
                
            </section>
            <!--/ END Template Container -->
