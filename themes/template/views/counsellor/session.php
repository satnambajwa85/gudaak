<?php
$this->pageTitle=Yii::app()->name . ' -  Student Details';
$this->breadcrumbs=array('studentDetails',);
?>
<div class="container">
	<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
		<div class="row test-bot">School Details</div>
		<div class="clear"></div>
		<div class="col-md-12 fl">
			<input type="hidden" value="2" id="userId" name="user" />
			<?php foreach($model as $item){?>
            <div class="col-md-2 fl mt20">
                <span class=""><?php echo $item->name;?></span><input type="radio" name="session" value="<?php echo $item->id?>" class="radioB pull-left mr10" />
            </div>
            <?php } ?>
        </div>
        <div id="ajaxContent">
        
        </div>
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