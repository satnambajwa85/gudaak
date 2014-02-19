	<div class="career-bot pull-left">
						<?php if(Yii::app()->user->hasFlash('sccess')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('sccess'); ?></strong>
						</div>
							 
					<?php endif; ?>	
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Explore Colleges with Gudaak </h1>
			</div>
			
		</div>
      	
</div>

	
	<div class="news pd0 fl">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			