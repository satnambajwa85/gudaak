<?php
$type = array ();

foreach ($faq as $row)
    if (!in_array($row->type,$type)) array_push($type,$row->type);

//print_r ($tmp);
//CVarDumper::dump($type,10,1);



?>

<!-- START Template Main -->
<section  >
	<!-- START Template Container -->
	<section class="container-fluid">
		<!-- Page header -->
		<div class="page-header page-header-block pb0 pt15">
			<div class="page-header-section pt5 ">
				<ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
					<li><?php echo CHtml::link('Dashboard', array('/supplier/index'));?></li>
					<li class="text-info">Profile</li>
					<li class="active">FAQ</li>

				</ol>
			</div>
		</div>
	<!--/ Page header -->

<div class="alert alert-dismissable alert-info">
                    <strong>Why these questions?</strong>
                    <br>These questions, as you will see soon, are questions that are frequently asked by clients. By providing these answers upfront, we are trying to reduce the back and forth that happens between a client and yourself. <strong> If you prefer to answer these over a call, you may schedule a call with our team. </strong></div>

		<!-- START FOrm -->
		<div class="row mb30">
			<div class="col-md-12">
				<div class="col-md-12 hide">
					<div class="alert alert-dismissable alert-danger signup_error_container">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                    <div class="signup_errors"></div>
                </div>
				</div>
                       <?php if(Yii::app()->user->hasFlash('success')):?>
                        <div class="alert alert-dismissable alert-success">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                    <?php endif; ?>
				<!-- START panel -->

                <?php $form=$this->beginWidget('CActiveForm', array('id'=>'faq-supplier', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>" form-horizontal form-bordered"))); ?>

                <?php if(empty($faq)){ ?>
							<div class="col-md-12">
                                        <div class="alert alert-dismissable alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <strong>Oh snap!</strong> Admin has not added any Question yet!
                                        </div>
                            </div>
						<?php }else{ ?>
                <?php function getFaqCategoryWise($ansList,$faq,$t){ ?>
                <div class="col-md-12 pl0 pr0">
                    <div class=" panel panel-default">
						<!-- panel heading/header Category wise -->
						<div class="panel-heading">
							<h3 class="panel-title"><?php echo $t ?></h3>
						</div>
						<!--/ panel heading/header -->

						<!-- panel body -->
						<div class="panel-body">
							<?php $req = 1;

							?>

							<?php foreach($faq as $question){ ?>
								<?php if($question->type == $t){ ?>

								<div class="form-group">
									<label class="col-sm-4 control-label"><strong>Q:  </strong><?php echo $question->question ;?>

										<span class="text-danger"><?php echo (($req==5 && $t == 'Payment')?'':'*'); ?></span>
										<?php $req++; ?>
									</label>
									<div class="col-sm-8">
										<textarea  value="<?php echo (isset($ansList[$question->id])?$ansList[$question->id]:''); ?>" name="SuppliersFaqAnswers[<?php echo $question->id; ?>]" class="form-control required" row="6"><?php echo (isset($ansList[$question->id])?$ansList[$question->id]:''); ?></textarea>
									<?php //echo $form->textField($question,'questioin',array('placeholder'=>"",'class'=>'form-control','required'=>'required')); ?>
									</div>
								</div>
								<?php }//if compare type ?>
							<?php }// foreach of faq ?>
						</div>
					</div>
				</div>

				<?php } //End getFaqCategoryWise() ?>


                <?php foreach($type as $t){
                    //generate all the faqs category wise
                    getFaqCategoryWise($ansList,$faq,$t);
                } ?>

                <div class="col-lg-12 pl0 pr0">
					<div class="form-group no-border pt0 pb0">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							<input type="hidden" name="action" value="noajax">

							<input type="button" class="<?php echo (($profile->is_application_submit==1)?'btn btn-lg btn-teal ':'btn btn-success ');  ?>f_s13 btn-lg pull-right " id="btnAddFaq" name="app" value="<?php echo (($profile->is_application_submit==1)?'Submitted':'Submit')  ?>" />

							<input type="submit" class="mr10 btn btn-lg btn-primary pull-right f_s13" id="btnsaveFaq" value="<?php echo (($profile->is_application_submit==1)?'Update':'Save')  ?>" name="save" />

						</div>
					</div>
				</div>

				<!--/ panel body Category wise -->
				<?php $this->endWidget(); ?>
                <?php } ?>
				<!-- END panel -->
			</div>
		</div>
		<!--/ END form -->

	</section>
	<!--/ END Template Container -->

	<!-- START To Top Scroller -->
	<a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
		<i class="ico-angle-up"></i>
	</a>
	<!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->
<script type='text/javascript'>
    //window.onbeforeunload = function() { return "Are you sure you want to leave?"; }
    var popit = true;
     /*window.onbeforeunload = function() {
          if(popit == true) {
               popit = false;
               return "You have some unsaved changes?";
          }
     }*/
</script>
<script type="text/javascript">
    function renderform(formData){
        var formData = JSON.parse(formData);
        $.each(formData, function (index,el) {
            //console.log(value.name + " - " + value.value);
            $("[name='"+el.name+"']").val(el.value);
         });

    }
	$(document).ready(function(){

        /*controlling back button for FAQ page */
        if (window.history && window.history.pushState) {

            window.history.pushState('forward', null, 'index.php?r=supplier/#faq');
            $(window).on('popstate', function(e) {
                e.preventDefault();
                console.log("back button pressed ");
              if (localStorage) {
                if(localStorage.getItem('faq-supplier')){

                     var boottext = "Please save your changes before you leave.";
            bootbox.dialog({
                        message: boottext,
                        title: "There are some unsaved changes!",
                        buttons: {

                             danger: {
                                label: "Discard Changes",
                                className: "btn-danger ",
                                callback: function () {
									bootbox.hideAll();
                                    if(localStorage.getItem('faq-supplier'))
                                        localStorage.removeItem('faq-supplier');

                                    var id = $("#components li:last a").attr("id");
                                    console.log("finsishes all tasks" +id);
                                    $("#"+id).trigger("click");
                                    // callback
                                }
                            },
                            success: {
                                label: "Save Changes",
                                className: "btn-success",
                                callback: function () {
									bootbox.hideAll();
                                    $("#faq-supplier").submit();
                                }
                            }

                        }
                    });
                    //window.history.pushState('forward', null, 'index.php?r=supplier/#faq');
                }
                else{
                    console.log("LocalStorage is not supported");
                }
              }

            });

          }
        // Check for LocalStorage support.
        if (localStorage) {
            if(localStorage.getItem('faq-supplier'))
                renderform(localStorage.getItem('faq-supplier'));

            console.log("LocalStorage is supported");
            $("#faq-supplier textarea").bind("change paste keyup", function() {
                localStorage.setItem('faq-supplier', JSON.stringify($("#faq-supplier").serializeArray()));
            });
        }
        else{
            alert("Please save your FAQ befor leaving this page!");
            console.log("LocalStorage is not supported");
        }


		$('.signup_error_container').hide();
        //var faq_validate = $("#faq-supplier").parsley();
		$("#faq-supplier").on("submit",function(){
			console.log("submitting");
            localStorage.removeItem('faq-supplier');
			return true;
		});
		/*$("#faq-supplier").on("submit",function(){
            console.log("submitting form "+ faq_validate.isValid())
            //return false;
        });*/
        /*
        $("#btnAddFaq").on("click",function(){
            $("#faq-supplier").submit();
			if(faq_validate.isValid()==true)
            {
                console.log("valid form ");
                var thisform = $("#faq-supplier");
                console.log("submitting form"+ thisform.serialize());
                $.ajax({
                    type:'POST',
                    data: thisform.serialize(),
                    url:"<?php echo CController::createUrl('/supplier/faq');?>",
                    datatype:"json",
                    success:function(data)
                    {
                            var data= JSON.parse(data);
                            console.log(JSON.stringify(data));
                            $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                            var messageData = data.Success ;
                            var htm="";
                            if(data.iserror){
                                //rendering error
                                console.log("error found ");
                                messageData = data.errors[0].msg;
                                $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                            }else
                            {

                                messageData = data.success[0].msg;
                            }

                            //Genrating message
                            console.log("message data : " + JSON.stringify(messageData) );

                            htm+=messageData + "<br />";
                            $(".signup_errors").html(htm);
                            $('.signup_error_container').show('blind', {}, 500)
                            console.log("finsishes all tasks");

                    },
                    error: function(a,b,c){
                        console.log("Errors found : " +a +" | " +b + " | " + c);
                    }
                });
            }else
            {
                console.log("Invalid form");
            }
		
		//hideNotification();
		return false;
		});
        */

        $("#btnAddFaq").click(function(){
            var boottext = "By clicking confirm you agree that all the information provided in your profile is authentic and true to the best of your knowledge.";
            if($(this).attr("value")=="Submit"){
                var isProfile = "<?php echo $profile->is_profile_complete; ?>";
                var isfaq = "<?php echo $profile->is_faq_complete; ?>";
                var emptytext = checking();
                if(emptytext>0 || isProfile == 0){
                    callerrorpopup();
                }else{
                    bootbox.dialog({
                        message: boottext,
                        title: "Submit your profile for review:",
                        buttons: {

                            danger: {
                                label: "Close",
                                className: "btn-danger ",
                                callback: function () {
									bootbox.hideAll();

                                    // callback
                                }
                            },

                            success: {
                                label: "Confirm",
                                className: "btn-success",
                                callback: function () {
                                    callanotherpopup();

                                    return true;
                                    // callback
                                }
                            }
                        }
                        });
                }


                return false;
                event.preventDefault();
                }


        });
	});
    function callanotherpopup(){
        var boottext = "Thank you for submitting your application. We look forward to welcoming you to the VenturePact community soon.<br><br><ul><li>1. Over the next few days, we will look over your profile to make sure your company is a good fit for our marketplace.</li><p></p><li>2. You can update the profile whenever you want. You may add portfolio items, past clients or change account information.</li></ul>"
        
        bootbox.dialog({
                        message: boottext,
                        title: "Application submitted",
                        buttons: {
                            success: {
                                label: "Got it!",
                                className: "btn-success",
                                callback: function () {
                                    console.log("got it submit now");
									bootbox.hideAll();
                                    submitform();

                                    return true;
                                    // callback
                                }
                            }
                        }
                    });
                                                                                                                                                                                                                                                                                                                                                                                                                                                     }
    function callerrorpopup(){

        var boottext = "Please complete all details in  Profile and FAQs section before submitting the application.";
        $("#faq-supplier").find("[name=action]").val("noajax");
        $.ajax({
            type:'POST',
            url: $("#faq-supplier").attr("action"),
            data : $("#faq-supplier").serialize(),
            datatype :'json',
            success: function(data){

                    $("#faq-supplier").find("[name=action]").val("noajax");
            }
        });


        bootbox.dialog({
                        message: boottext,
                        title: "Error Found!",
                        buttons: {
                            success: {
                                label: "OK",
                                className: "btn-danger",
                                callback: function () {
									bootbox.hideAll();
                                    // callback
                                }
                            }
                        }
                    });
    }
    function submitform(){
        console.log("about to submit ");
        console.log($("#faq-supplier").serialize());
        localStorage.removeItem('faq-supplier');
        $("#faq-supplier").find("[name=action]").val("ajax");
        $.ajax({
            type:'POST',
            url: $("#faq-supplier").attr("action"),
            data : $("#faq-supplier").serialize(),
            datatype :'json',
            success: function(data){
                data = JSON.parse(data);
                console.log(data);
                console.log(data.iserror);
                if(data.iserror==false){
                    window.location = '<?php echo CController::createUrl("/supplier/index");?>';
                }
                else{
                    $("#faq-supplier").find("[name=action]").val("noajax");
                    console.log("error found");
                }
            }
        });

    }
    function checking() {
        var empty = 0;
        $('#faq-supplier textarea:not(:last)').each(function(){
           if ($(this).val().trim() == "") {
               empty++;
               $("#error").show('slow');
           }
        })
        return empty;
    }

	
</script>
