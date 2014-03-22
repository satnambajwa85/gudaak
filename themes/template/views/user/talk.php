<<<<<<< HEAD
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref" style="width:90%;">
				<h1>Talk</h1>
<div>
	<?php echo CHtml::link('Add New','#',array('onclick'=>'$("#create-form").show();')); ?>
	<div id="create-form" style="display:none">
		<?php $this->renderPartial('_talk',array('model'=>$model,)); ?>
	</div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tickets-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'title',
		'problem',
		'status',
		'add_date',
		/*
		'sender_id',
		'receiver_id',
		'solution',
		'modification_date',
		array(
			'class'=>'CButtonColumn',
		),
		*/
	),
)); ?>
			</div>
		</div>
	</div>
    <div class="col-md-2  pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
=======
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref" style="width:90%;">
				<h1>Talk</h1>
<div>
	<?php 
	echo CHtml::link('Add New','#',array('onclick'=>'$("#create-form").show();','class'=>'back-btn margin_t')); ?>
	<div style="width:100%; float:left;">
   <div style=" float: left; margin-bottom: 38px; margin-left: 18%; width: 75%;"> 
	<div id="create-form" <?php echo (isset($_POST['Tickets']))?'':'style="display:none"';?>>
		<?php $this->renderPartial('_talk',array('model'=>$model,)); ?>
	</div>
  </div>
  </div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tickets-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'summaryText' => '',
	'columns'=>array(
		//'id',
		'title',
		'problem',
		array(
            'name'=>'status',
            'value'=>'($data->status==1)?"Pending":"Answers"'
		),
		array(
            'name'=>'add_date',
            'value'=>'date("M d,Y",strtotime($data->add_date))'
		),
		/*
		'sender_id',
		'receiver_id',
		'solution',
		'modification_date',
		array(
			'class'=>'CButtonColumn',
		),
		*/
	),
)); ?>
			</div>
		</div>
	</div>
    <div class="col-md-2  pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
>>>>>>> 1279c3defb076de0d6ec381dd9fb5ee2f5bae04d
			