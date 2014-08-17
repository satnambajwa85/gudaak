<script type="text/javascript">

var $data1=sessionStorage.getItem("projectInfo");
$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/site/NewProject');?>",
				data:$data1,
				success :function(){
						window.location.href = "<?php echo CController::createUrl('/client/index',array('first'=>'1'));?>";
						sessionStorage.setItem("projectInfo","");
					}
			});
</script>
