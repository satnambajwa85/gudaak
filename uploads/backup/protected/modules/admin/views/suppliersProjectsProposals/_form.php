<?php
/* @var $this SuppliersProjectsProposalsController */
/* @var $model SuppliersProjectsProposals */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-projects-proposals-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row" >
	<?php echo $form->labelEx($model,'client_projects_id'); ?>
		<?php 
			  
			    $list_data	=	array();
				$to_del=array();
				$lists	    =	ClientProjects::model()->findAll("state=2");
				if($model->isNewRecord)
				{
					 foreach($lists as $list)
						{
							foreach($list->suppliersProjectsProposals as $listProj)
							{ 
									if(in_array($listProj->status,array('4','5')))
										{
											$to_del[]=$list->id;
										}
							}
						   $list_data[$list->id]	=	$list;
						}
						
					
						foreach($to_del as $cur)
							unset($list_data[$cur]);
							
						
						$listData = CHtml::listData($list_data,'id', 'name');
						echo $form->dropDownList($model,'client_projects_id',$listData,array( 'ajax' => array(
								'type'=>'POST', 
								'url'=>Yii::app()->createUrl('admin/SuppliersProjectsProposals/dynamicSupplier'),
								'update'=>'#SuppliersProjectsProposals_suppliers_id', 
								'data'=>array('client_projects_id'=>'js:this.value'),
							  ),'empty'=>'Select A Project','style'=>'width:200px' ));
				}
				else
				{
					foreach($lists as $list)
						$list_data[]	=	$list;
					
					$listData = CHtml::listData($list_data,'id', 'name');
					echo $form->dropDownList($model,'client_projects_id',$listData,array( 'ajax' => array(
								'type'=>'POST', 
								'url'=>Yii::app()->createUrl('admin/SuppliersProjectsProposals/dynamicSupplier'),
								'update'=>'#SuppliersProjectsProposals_suppliers_id', 
								'data'=>array('client_projects_id'=>'js:this.value'),
							  ),'empty'=>'Select A Project','style'=>'width:200px',"disabled"=>"disabled" ));
					
				}
	
				
	
		 ?>
		<?php echo $form->error($model,'client_projects_id'); ?>
	</div>
    <br />

	<div class="row">
    <?php echo $form->labelEx($model,'suppliers_id'); ?>
		 
               <?php 
		if(!$model->isNewRecord)
		{
	            $list_dateSup		=	array();
				$assignedSup	=	array();
				
				$lists	    =	Suppliers::model()->findAll('status=3');
				foreach($lists as $list)
                {
                     	foreach($list->suppliersProjectsProposals as $supplier)
						{
							if($supplier->client_projects_id == $model->client_projects_id){
								if($model->suppliers_id!=$supplier->suppliers_id)
									$assignedSup[]		=	$list->id;
								
								$list_dateSup[$list->id]	=	$list;
							}else
								$list_dateSup[$list->id]	=	$list;
						}
				}
				foreach($assignedSup as $cur){
					unset($list_dateSup[$cur]);
				}
				$listData1 = CHtml::listData($list_dateSup,'id', 'name');
		}
		 else
		 {
			 $lists	    =	Suppliers::model()->findAll('status=3');
		     foreach($lists as $list)
           			$list_dateSup[$list->id]	=	$list;
				$listData1 = CHtml::listData($list_dateSup,'id', 'name');
		 }
               
		if(!$model->isNewRecord)
			    echo $form->dropDownList($model,'suppliers_id',$listData1,array('empty'=>'Select one or many','multiple'=>false,'size'=>'1','style'=>'width:200px',"disabled"=>"disabled" ));
			   else
			   echo $form->dropDownList($model,'suppliers_id',$listData1,array('empty'=>'Select one or many','multiple'=>true,'size'=>'5','style'=>'width:200px'));
	 
	       ?>
		<?php echo $form->error($model,'suppliers_id'); ?>
	</div>
<br />

	

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'pitch'); ?>
		<?php //echo $form->textArea($model,'pitch',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'pitch'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'estimated_cost'); ?>
		<?php //echo $form->textField($model,'estimated_cost',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'estimated_cost'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'time_estimation'); ?>
		<?php //echo $form->textField($model,'time_estimation',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'time_estimation'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'comments'); ?>
		<?php //echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'others'); ?>
		<?php //echo $form->textField($model,'others',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'others'); ?>
	</div>-->
	<div class="row" >
		<?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',array('0'=>'Assigned to supplier by admin','1'=>'Seeking Clarification','2'=>'Proposal Submitted','4'=>'Proposal Accepted','5'=>'Project Completed','6'=>'Proposal Archived'),array('empty'=>'Select a status'));  ?>  
		<?php echo $form->error($model,'status'); ?>
	</div>
<br />
    <div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note'); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row buttons" style="margin-left:270px;margin-bottom:15px;">
		<button type="submit" class="btn btn-info"><?php echo ($model->isNewRecord ? 'Create' : 'Save'); ?></button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
