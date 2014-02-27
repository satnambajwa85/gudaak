<?php $this->pageTitle=Yii::app()->name . ' - Asses';
$this->breadcrumbs=array('Asses'=>array('/user/tests'));?>
<div id="partial-render">
	<div class="border">
					<ol class="breadcrumb">
					  <li><a href="#">Assessment</a></li>
					 
					</ol>
	</div>
					<?php if(Yii::app()->user->hasFlash('updated')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('updated'); ?></strong>
						</div>
							 
					<?php endif; ?>	
				<div class="col-md-10 pull-left">
					<div class="mr0 col-md-12 fl">
						<?php  $count=1;
								foreach($testContent as $list){ 
								if($count%2 == 0)
									$css='middle-format-left';
								else 
									$css='middle-format-left';			 
									$count= $count+1;
								
								?>
					
						<div class="mr0 col-md-6 pull-left <?php echo $css;?>">
							<h1><?php echo $list->title;?></h1>
							<p><?php echo substr($list->description,0,225);?>..</p>
							<!--<a href="#">Konw more about stream explore</a>-->
						</div>
					<?php } ?>
					</div>
					<div class="col-md-12 pull-left mt50 pd0" id="take-test">
						<!--<div class="col-md-6 pull-left test-description-bot">
							<?php //echo $testContent->test_features ;?>
						</div>-->
						
						<?php foreach($testContent as $list){ ?>
						<?php 	if(in_array($list->id,$userTest)){?>
						<div class="col-md-6 pull-left">
							<div class="col-md-12 pull-left min-height-fix border-box">
								<div align="center">
                                <span class='btn btn-info2 center-bt'>
								Take <?php echo $list->title;?> </span>
									
								</div>
								
								<div class="retaketest mt50">
									<h1>Last test summery</h1>
									<span>Test Date:</span>
									<datetime>	
										<?php echo date('D M, Y',strtotime($detials[$list->id]['date']));?>
										</datetime>
									<div class="clear"></div>
									<span>Duration:</span>
									<datetime><?php echo $detials[$list->id]['duration'];?></datetime>
									<div class="clear"></div>
									<span>Questions:</span>
									<datetime><?php echo $detials[$list->id]['count'];?></datetime>
									<div class="clear"></div>
									
									<div class="clear"></div>
									<!--<a href="#" class="more-faqs">Test Questions & Answer</a>-->
								</div>
								 
								
								<div align="center" class="mar-bottom mt94">							 
									
									<?php	echo CHtml::link('Retake Test','javaScript:void(0);',array('class'=>'btn retake'.$list->title.' btn-warning'));?>
									<?php	echo CHtml::Ajaxlink('Summary',array('user/summaryDetails','id'=>$list->id),array('update'=>'#summeryRecodes'),array('class'=>'btn Summary-details btn-warning ml15'));?>
									 
									
								</div>
							</div>
						</div>
						<div id="retake<?php echo $list->id;?>" class="modal fade">
    	<div class="modal-dialog">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
                            	  <div  class="col-md-12 pull-left">
								<a data-dismiss="modal" class="btn btn-info pull-right ">close</a>
								
                                    <div id="">
                                        <?php   
                                        $form=$this->beginWidget('CActiveForm', array(
                                                                        'id'=>'retake-test-form'.$list->id.'',
																		 'action'=>Yii::app()->createUrl('/user/retakeTest&id='.''.$list->id.''),
                                                                        'enableClientValidation'=>true,
                                                                        'clientOptions'=>array('validateOnSubmit'=>true,)));?>
                                    <?php echo $form->hiddenField($model,'orient_items_id',array('value'=>''.$list->id.''));
                                   ?>
                                    <h4 class="form-signin-heading ">Send Request To Retake To Test</h4>
                                    <?php echo $form->textField($model,'title',array('class'=>'form-control','placeholder'=>'Title','autofocus'=>true));
                                    echo $form->error($model,'title');?>
                                    <div class="pd4"></div>
                                    <?php echo $form->textArea($model,'description',array('class'=>'form-control','placeholder'=>'description'));
                                    echo $form->error($model,'description');?>
                                    <div class="pd4"></div>
                                     
                                    <div class="clearfix"></div>
                                    <div align="center" class="col-md-3  pd0 ">
                                        <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning fl login'));?>
                                        <div class="clearfix"></div>
                                        </div>
                                        <?php $this->endWidget(); ?>
                            
                                </div>
                                 </div>
                               
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
						<?php  }else{ ?>
							<div class="col-md-6 pull-left">
							<div class="col-md-12 pull-left border-box test_features">
							
								<div align="center">
                                <span class='btn btn-info2 center-bt'>
								Take <?php echo $list->title;?> </span>
									
								</div>
								<p><?php echo $list->test_features ;?></p>
								<div align="center" class="mar-bottom">							 
									<?php  
										echo CHtml::link('Take Test',array('user/test','id'=>$list->id),array('class'=>'btn btn-warning'));?>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
					<div class="col-md-2 pd0  pull-right">
					<?php  $this->Widget('WidgetNews'); ?>
				</div>
</div>

<div id="Summary-details" class="modal fade">
    	<div class="modal-dialog">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
							<a data-dismiss="modal" class="btn btmar btn-info pull-right ">close</a>
								
                            	 <div  class="col-md-12 pd0 login-box pull-left">
									<div id="summeryRecodes">
									
									</div>
									 
                                 </div>
                               
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
	