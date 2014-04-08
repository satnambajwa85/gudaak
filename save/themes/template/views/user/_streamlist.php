<div class="col-md-3 career-lib">
	<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/stream/small/'.$data->image.'"/>',array('user/streamCareerOptions','id'=>''.$data->id.''),array('class'=>'fl'));?>
	<div class="clear"></div>
	<?php echo CHtml::link('<h1>'.substr($data->name,0,27).'</h1>',array('user/streamCareerOptions','id'=>''.$data->id.''));?>
	<?php echo substr($data->description,0,78);?>
	<div class="col-md-12 career-hot-links">
	<?php 	echo CHtml::link('Read more..',array(''),array('class'=>'pull-left'));?>
		<span class="pull-right"><i class="icon-eye-open"></i>19021</span>
	</div>
</div>

		