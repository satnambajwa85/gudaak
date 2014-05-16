<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
    <div class="row test-bot">Session Details</div>
    <div class="clear"></div>
    <div class="col-md-12 fl user-profile-form">
        <?php 
		$count	=	1;
		foreach($question as $item){?>
        <div class="col-md-12 fl mt20">
            Q<?php echo $count.'. '.$item->name;?><br /><br />
            <?php 
			switch($item->controller_type){
				case 'text':
					echo '<input type="text" value="" name="question['.$item->id.']" class="form-control"/>';
				break;
				case 'select':
					$options	=	explode(',',$item->options);
					$str	= '<select name="question['.$item->id.']" class="form-control">';
					foreach($options as $option){
						$str	.=	'<option>'.$option.'</option>';
					}
					$str	.=	'</select>';
					echo $str;
				break;
			}
			?>
        </div>
        <?php 
		$count++;
		} ?>
    </div>
</div>