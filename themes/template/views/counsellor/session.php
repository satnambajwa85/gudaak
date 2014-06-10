<?php
$this->pageTitle=Yii::app()->name . ' -  Student Details';
$this->breadcrumbs=array('studentDetails',);
?>
<div class="container">
	<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
		<div class="row test-bot">School Details
        <div class="pull-right back-btn">
    	<?php echo CHtml::link('Back', Yii::app()->createUrl('/counsellor/studentDetail',array('id'=>$id)));?>
        </div>
        </div>
		<div class="clear"></div>
		<div class="col-md-12 fl">
			<input type="hidden" value="<?php echo $_REQUEST['id'];?>" id="userId" name="user" />
			<?php foreach($model as $item){?>
            <div class="col-md-2 fl mt20">
                <span class=""><?php echo $item->name;?></span><input type="radio" name="session" value="<?php echo $item->id?>" class="radioB pull-left mr10" />
            </div>
            <?php } ?>
        </div>
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'ajaxContent','enableAjaxValidation'=>false,)); ?>
        <?php $this->endWidget(); ?>
	</div>
</div>
<script type="text/javascript">
$('.radioB').change(function(){
	$.ajax({
		url		:	'<?php echo Yii::app()->createUrl('/counsellor/session');?>',
		type	:	"POST",
		data	:	'session='+$(this).val()+'&user='+$('#userId').val()+'&action=content',
		success	:	function(data) {
			$('#ajaxContent').html(data);
		}
	});
});
</script>