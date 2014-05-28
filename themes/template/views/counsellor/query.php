<?php $this->pageTitle=Yii::app()->name . ' -  Student Query';?>
<div class="container">
<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
	<div class="row test-bot">Student Query</div>
   <h4> Your Queries</h4>
	<div id="create-form">
		<?php $this->renderPartial('_talk1',array('model'=>$model,)); ?>
	</div>
	<div class="clear"></div>
	</div>
</div>
