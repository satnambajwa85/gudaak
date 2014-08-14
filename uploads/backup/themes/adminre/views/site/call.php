<?php Yii::app()->clientScript->registerScript('helloscript','$("#satnam").selectize();$("#sandeep").selectize();',CClientScript::POS_READY);?>
<section class="col-lg-12 bg-teal" style="height:5px;">
	<!-- START row -->
	
	<!--/ END row -->
</section>

<section class="col-lg-12" style="margin-top:20%;">
	<!-- START row -->
	<div class="row">
		<div class="col-md-4"></div>                                
		<div class="col-md-4 text-center">
			<div class="col-sm-12">	
				<script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
				<script id="my1">var ownButton = new timelyButton("vp", { buttonId: "my1", imgSrc: "<?php echo Yii::app()->theme->baseUrl; ?>/image/book-now-grey.png" });</script>
			</div>
		</div>                
		<div class="col-md-4"></div>
	</div>
</section>		
