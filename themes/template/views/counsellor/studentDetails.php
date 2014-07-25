<?php
$this->pageTitle=Yii::app()->name . ' -  Student Details';
$this->breadcrumbs=array('studentDetails',);
?>
<div class="container">
<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
	<div class="row test-bot">School Details
    <div class="pull-right back-btn">
    	<?php echo CHtml::link('Back', Yii::app()->createUrl('/counsellor/schools'));?>
        </div>
    </div>
    <div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
    <div class="row" style="margin:10px 0">
		<table width="100%">
<tbody>
<tr>
<td width="16%"><?php echo $form->textField($model,'gudaak_id',array('placeholder'=>'Gudaak Id','class'=>'form-control2 mar-b16')); ?></td>
<td width="16%"><?php echo $form->textField($model,'first_name',array('placeholder'=>'First Name','class'=>'form-control2 mar-b16')); ?></td>
<td width="16%"><?php echo $form->textField($model,'last_name',array('placeholder'=>'Last Name','class'=>'form-control2 mar-b16')); ?></td>
<td width="16%"><?php echo $form->dropDownlist($model,'class',CHtml::listData(UserClass::model()->findAll(),'id','title'),array('prompt'=>'All','class'=>'mar-b16 form-control2'));?></td>
<td width="16%"> <?php //echo $form->dropDownlist($model,'class',CHtml::listData(UserClass::model()->findAll(),'id','title'),array('id'=>'class_register','class'=>'mar-b16 form-control'));?></td>
<td  width="16%"><?php echo CHtml::submitButton('Search',array('class'=>'back-btn')); ?></td>
</tr>
</tbody>
</table>
        
        
		
		
		
		
		
		
	    
		
	
		
	</div>

<?php $this->endWidget(); ?>

</div>
    
		<?php $this->widget('zii.widgets.grid.CGridView', array(
													'id'=>'career-options-grid',
													'dataProvider'=>$model->search(),
													'template'=>"{pager}{items}",
														'pager' => array(
														'cssFile' =>'',
														'htmlOptions'=>array('class'=>'pagination'),
														'prevPageLabel'=>'<i class="skyblue icon-caret-left"></i>',
														'nextPageLabel'=>'<i class="skyblue icon-caret-right"></i>',
														'lastPageLabel'=>false,
													
														),
													'columns'=>array(
														'first_name',
														'last_name',
														'email',
														array(
															'name'=>'class',
															'value'=>'(isset($data->user_class_id))?$data->userClass->title:""'
														),
														array(
																'class'=>'CButtonColumn', //custom button for email and view
																'template'=>'{Details}',
																'header'=>'View Details',
																'htmlOptions'=>array('class'=>'btn-td',),
																'buttons'=>array(
																	'Details' => array(
																		'url'=>'Yii::app()->createUrl("/counsellor/studentDetail",array("id"=>($data->id)))',
																		
																	),
																
																),
														   ),
												),)); ?>
	</div>
</div>


