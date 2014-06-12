<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
    <div class="row test-bot">Session Details</div>
    <div class="clear"></div>
    <div class="col-md-12 fl user-profile-form">
    	<input type="hidden" name="user" value="<?php echo $_REQUEST['user'];?>" />
        <input type="hidden" name="session" value="<?php echo $_REQUEST['session'];?>" />
        
        <?php 
		$count	=	1;
		foreach($question as $item){?>
        <div class="col-md-12 fl mt20">
            Q<?php echo $count.'. '.$item->name;?><br /><br />
            <?php 
			switch($item->controller_type){
				case 'text':
					echo '<input type="text" value="'.((isset($ans[$item->id]))?$ans[$item->id]:'').'" name="question['.$item->id.']" class="form-control"/>';
				break;
				case 'select':
					$options	=	explode(',',$item->options);
					$str	= '<select name="question['.$item->id.']" class="form-control">';
					foreach($options as $option){
						$str	.=	'<option '.((isset($ans[$item->id]) && $ans[$item->id]==$option)?'selected=selected':'').' value="'.$option.'">'.$option.'</option>';
					}
					$str	.=	'</select>';
					echo $str;
				break;
				case 'radio':
					$options	=	explode(',',$item->options);
					$str	= '';
					foreach($options as $option){
						$str	.=	'<div><input type="radio" value="'.$option.'" name="question['.$item->id.']" '.((isset($ans[$item->id]) && $ans[$item->id]==$option)?'checked':'').' class="form-control"  style="display:block !important;float:left; width:20px;"/><label>'.$option.'</label> </div>';
					}
					echo $str;
				break;
			}
			?>
        </div>
        <?php 
		$count++;
		} ?>
        
        <?php echo CHtml::button('Submit',array('class'=>'btn','id'=>'submitSession',"style"=>'float:right;margin-right:50px;margin-top:10px;')); ?>
    </div>
</div>
<script type="text/javascript">
$('#submitSession').on('click', function(){
	$.ajax({
		url		:	'<?php echo Yii::app()->createUrl('/counsellor/sessionSave');?>',
		type	:	"POST",
		data : $('#ajaxContent').serialize(),
		success	:	function(data) {
			alert(data);
		}
	});
});
</script>