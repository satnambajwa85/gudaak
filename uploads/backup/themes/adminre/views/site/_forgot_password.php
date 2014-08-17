<div id="bs-modal-lost-password" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bgcolor-teal border-radius">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h4 class="modal-title">Forgot Password</h4>
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form','enableClientValidation'=>true,'action'=>CController::createUrl("/site/forgotPassword"),'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>


			<div class="alert alert-success hide" id="repsoneRest">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<p id="messageResponse">
					<?php echo Yii::app()->user->getFlash('errorfPass'); ?></p>
			</div>

			<div class="modal-body">
				<div class="form-group mb0">
					<div class="row">
						<div class="col-sm-12">
							<label class="control-label">Enter Your Email here <span class="text-danger">*</span>
							</label>
							<div class="has-icon pull-right">
								<?php echo $form->textField($forgot,'email',array('placeholder'=>'Email','class'=>'form-control','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email')); ?>
								<i class="ico-user2 form-control-icon"></i>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<?php echo CHtml::button( 'Reset Password',array( 'name'=>'Submit','class'=>'btn btn-success','id'=>'passButSat')); ?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	$(document).ready(function(){
	$('#passButSat').on("click", function () {
		var elem = $('#forget-form-email');
		if (elem.val().length > 0) {
			if (testEmail(elem.val())) {
				$.ajax({
					type: 'POST',
					url: "<?php echo CController::createUrl( '/site/ajaxUniqe');?>" + '&email=' + elem.val(),
					beforeSend: function(){
						$("#forget-form").find("#passButSat").val('Please wait..');
					},
					success: function (data) {
						var response = JSON.parse(data);
						if (response.exist) {
							elem.addClass('parsley-error');
							var ErrID = elem.attr('data-parsley-id');
							$('#parsley-id-' + ErrID).html('<li id="parsley-id-satn-' + ErrID + '">' + response.message + '</li>');
							$('#parsley-id-' + ErrID).addClass('parsley-errors-list filled');
							$('#signupButSat').attr('type', 'button');
						} else {
							elem.val('');
							$('#messageResponse').html(response.message);
							$('#repsoneRest').show();
							$('#repsoneRest').removeClass('hide');
							var ErrID = elem.attr('data-parsley-id');
							$('#parsley-id-satn-' + ErrID).html('');
						}
						$("#forget-form").find("#passButSat").val('Reset Password');
					}
				});
			} else {
				elem.addClass('parsley-error');
				var ErrID = elem.attr('data-parsley-id');
				$('#parsley-id-' + ErrID).html('<li id="parsley-id-satn-' + ErrID + '">This is not a valid email address.</li>');
				$('#parsley-id-' + ErrID).addClass('parsley-errors-list filled');
			}
		} else {
			elem.addClass('parsley-error');
			var ErrID = elem.attr('data-parsley-id');
			$('#parsley-id-' + ErrID).html('<li id="parsley-id-satn-' + ErrID + '">This is required field.</li>');
			$('#parsley-id-' + ErrID).addClass('parsley-errors-list filled');
		}
		return false;
	});
		});
</script>