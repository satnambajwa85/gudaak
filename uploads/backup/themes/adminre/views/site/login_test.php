<?php Yii::app()->clientScript->registerScript('helloscript','$("#satnam").selectize();$("#sandeep").selectize();',CClientScript::POS_READY);?>
        <section class="col-lg-12 bg-teal" style="height:5px;">
            <!-- START row -->
            
            <!--/ END row -->
        </section>
        
        <section class="col-lg-12">
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="title light text-grey5 mtb22">Get started by outlining your requirements</h3>
                </div>
            </div>
            
        </section>
        
        <section class="col-lg-12" style="margin-top:20px;">
            <!-- START row -->
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                   	<div class="col-sm-12">
                        <div class="col-sm-12 text-center">
                            <h4 class="title light text-grey9 text-size16 mb20">Access our self-service platform:</h4>
                        </div>

                        <!-- Social button -->
                        <div class="col-sm-12">
                        	<a href="index.php?r=site/linkedin&lType=initiate&role=2" class="btn btn-social btn-block btn-linkedin">
                                <i class="1-icon mr15"></i>
                                Sign Up with LinkedIn
                            </a>
                        </div>
                        <!--/ Social button -->
                        <div class="col-sm-12 text-center mb15">
                            <h4 class="title text-grey9 text-size13 pt0">or</h4>           
    						<span class="text-muted ">Sign in with E-mail: </span>
                        </div>
                        <!--<div class="col-sm-12 text-center">
                            <h6 class="title light text-grey9 text-size13 mb20">To login with VenturePact account,
                            <a href="javascript:void(0);" id="show" class="text-teal-new"> Click here</a></h6>
                        </div>-->
                        <!-- Login form -->
                        <div class="col-sm-12 ">
                            <?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('data-parsley-validate'=>"data-parsley-validate"))); ?>
                                <div class="form-group mb10">
<?php if(Yii::app()->user->hasFlash('loginError')):?>
<script type="text/javascript">$(".showdiv").slideToggle(700);</script>
<div class="alert alert-dismissable alert-danger">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<?php echo Yii::app()->user->getFlash('loginError'); ?>
</div>
<?php endif; ?>
                                
                                
                                    <div class="row">
                                        <div class="col-sm-6 mb5">
                                            <label class="control-label">E-mail <span class="text-danger">*</span></label>
                                            <div class="has-icon pull-right">
                                               <?php echo $form->textField($model,'username',array('placeholder'=>"Username",'class'=>'form-control input-white','required'=>'required','data-parsley-type'=>"email")); ?>
                                              <i class="ico-user2  form-control-icon icon-top"></i>
                                            </div>
                                         </div>
                                        <div class="col-sm-6 mb5">
                                            <label class="control-label">Password <span class="text-danger">*</span></label>
                                            <div class="has-icon pull-right">
                                                 <?php echo $form->passwordField($model,'password',array('placeholder'=>"Password",'class'=>'form-control input-white','required'=>'required')); ?>
                                                <i class="ico-lock4 form-control-icon icon-top"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb10">
                                    <div class="row">
                                        <div class="col-xs-6 text-left">
                                            <div class="checkbox custom-checkbox">  
                                                <?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox")); ?>
                                                <label for="customcheckbox" class="text-grey9">&nbsp;&nbsp;Remember me</label>   
                                            </div>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a href="javascript:void(0);" id="errorfPassLink" data-toggle="modal" data-target="#bs-modal-lost-password">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb10">
									<?php echo CHtml::submitButton('Sign In',array('class'=>'btn btn-block btn-teal btn-social btn-signin col-lg-offset-4 w30','style'=>'padding:11px 0px !important;')); ?>
                                </div>
                                <p class="clearfix text-center">
                                    <span class="text-muted">Here for the first time ? <a href="javascript:void(0);"  data-target="#bs-modal" data-toggle="modal" class="semibold">Register to get started.</a></span>
                                </p>
                            <?php $this->endWidget(); ?>
                        </div>
                        <!--/ Login form -->
                	</div>   
                </div>
                
                <div class="col-md-2" >
                    <div class="col-sm-12 text-center border_design" style="margin-top:70px;">
                        <div class="center_border col-sm-offset-6"></div>
                        <div class="center_text">Or</div>
                        <div class="center_border col-sm-offset-6"></div>
                    </div>
                </div>
                
                <div class="col-md-3 text-center">
                	<div class="col-sm-12 mt78" style="margin-top:130px;">	
                		<script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
<script id="my1">var ownButton = new timelyButton("vp", { buttonId: "my1", imgSrc: "<?php echo Yii::app()->theme->baseUrl; ?>/image/book-now-grey.png" });</script>
                    </div>
                </div>
                
                <!-- START modal -->
                <div id="bs-modal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        	<div class="modal-header bgcolor-teal border-radius">
                                <button data-dismiss="modal" class="close mt5" type="button">×</button>
                                <div style="font-size:16px;" class="pull-left ico-user22 mr10 mt5"></div>
                                <h4 class="semibold modal-title">Sign Up</h4>
                            </div>
                            <!--<div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">x</button>
                                <h3 class=" modal-title">Sign Up</h3>
                            </div>-->
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'Signup-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate'))); ?>
                            <div class="modal-body">

<div class="alert alert-success hide" id="repsoneRest2">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<p id="messageResponse2"></p>
</div>

	<div class="form-group mb10">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger signup_error_container hide">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
				<div id="signup_errors"></div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 mb5">
				<label class="control-label">First Name <span class="text-danger">*</span></label>
				<div class="has-icon pull-right">
					<?php echo $form->textField($users,'display_name',array('placeholder'=>"John",'class'=>'form-control required','required'=>'required','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2",'tabindex'=>'1'));?>
				</div>
			</div>
			<div class="col-sm-6 mb5">
				<label class="control-label">Last Name <span class="text-danger">*</span></label>
				<div class="has-icon pull-right">
					<?php echo $form->textField($users,'role',array('placeholder'=>"Doe",'class'=>'form-control required','required'=>'required','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2",'tabindex'=>'2'));?>
				</div>
			</div>
		</div>
	</div>
<div class="form-group mb10">
        <div class="row">
            <div class="col-sm-6 mb5">
                <label class="control-label">E-mail <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
                    <?php echo $form->textField($users,'username',array('placeholder'=>"Username / email",'class'=>'form-control required email','required'=>'required','data-parsley-type'=>"email",'tabindex'=>'3')); ?>
                    <i class="ico-user2 form-control-icon"></i>
                </div>
             </div>
            <div class="col-sm-6 mb5">
                <label class="control-label">Password <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
                     <?php echo $form->passwordField($users,'password',array('placeholder'=>"Password",'class'=>'form-control required minlength','required'=>'required','length'=>"6",'tabindex'=>'4'));?>
                    <i class="ico-lock4 form-control-icon"></i>
                </div>
            </div>
        </div>
    </div>
                                
	<div class="form-group mb10">
		<div class="row">
			<div class="col-sm-6 mb5">
				<label class="control-label">Company Name <span class="text-danger"></span></label>
                <div class="has-icon pull-right">
               <?php echo $form->textField($users,'company_name',array('placeholder'=>"XYZ, LLC",'class'=>'form-control','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2",'tabindex'=>'5'));?>
<!--                

                <?php echo $form->textField($users,'company_name',array('placeholder'=>"XYZ, LLC",'class'=>'form-control required','required'=>'required','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2",'tabindex'=>'5'));?>-->
                </div>
            </div>
            <div class="col-sm-6 mb5">
                <label class="control-label">Company Website<span class="text-danger"></span></label>
                <div class="has-icon pull-right">
                <?php echo $form->textField($users,'company_link',array('placeholder'=>"http://www.XYZ.com",'class'=>'form-control url','data-parsley-type'=>"url",'data-parsley-minlength'=>"2",'tabindex'=>'6'));?>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="form-group mb10">
    <div class="row">
    <div class="col-sm-12 mb5">
    <label class="control-label">Company Size</label>
    <div class="has-icon pull-right">
    <div class="col-sm-12 pl0">
    
    <span class="radio-inline custom-radio custom-radio-primary">
    <input type="radio" data-parsley-id="5322" data-parsley-multiple="a" name="ClientProjects[team_size]" id="customradio1" value="1-2" tabindex="7" checked="checked" />
    <label for="customradio1">&nbsp;&nbsp;1-2</label>
    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
    </ul>
        
    <span class="radio-inline custom-radio custom-radio-primary spacing_left">
    <input type="radio" data-parsley-id="4433" data-parsley-multiple="a" value="3-5" name="ClientProjects[team_size]" id="customradio2" tabindex="8" <?php echo ($users->company_size=="3-5")?'checked="checked"':'';?>>
    <label for="customradio2">&nbsp;&nbsp;3-10</label>
    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
    </ul>
 
    <span class="radio-inline custom-radio custom-radio-primary spacing_left">
    <input type="radio" data-parsley-id="2947" data-parsley-multiple="a" value="11-50" name="ClientProjects[team_size]" id="customradio4" tabindex="9" <?php echo ($users->company_size=="11-50")?'checked="checked"':'';?> />
    <label for="customradio4">&nbsp;&nbsp;11-50</label>
    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
    </ul>
    <span class="radio-inline custom-radio custom-radio-primary spacing_left">
    <input type="radio" data-parsley-id="4823" data-parsley-multiple="a" value="51-100" name="ClientProjects[team_size]" id="customradio5" tabindex="10" <?php echo ($users->company_size=="51-100")?'checked="checked"':'';?>>
    <label for="customradio5">&nbsp;&nbsp;51-500</label>
    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
    </ul>
    <span class="radio-inline custom-radio custom-radio-primary">
    <input type="radio" data-parsley-id="1739" data-parsley-multiple="a" value="500+" name="ClientProjects[team_size]" id="customradio7" tabindex="11" <?php echo ($users->company_size=="500+")?'checked="checked"':'';?>>
    <label for="customradio7">&nbsp;&nbsp;500 or more</label>
    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
    </div>
    
    </div></div>
    </div>
    </div>    
    <div class="form-group mb10">
        <div class="row">
            <div class="col-sm-6 mb5">
                <label class="control-label">Country <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
<?php echo CHtml::dropDownList('ClientProjects[country]','',CHtml::listData(States::model()->findAll(array('condition'=>'status = 1','order'=>'name ASC')),'id', 'name'),array('class'=>"form-control required pr10",'prompt' =>'Select Country','id'=>"satnam",'tabindex'=>'12','ajax'=>array(
'type'=>'POST',
'url' => CController::createUrl('/site/dynamicCity'),
'data'=> array('country'=>'js:this.value'),
'success'=>'function(data){loadcity1(data);}'
)
));?>

<script>
/*Code for City And Country*/
var xhr;
var select_state, $select_state;
var select_city, $select_city;
function loadcity1(data)
{
	$("#sandeep").html(data);
	var selectJson = {};
	selectJson = new Array();
	var select = document.getElementById("sandeep");
	//console.log(data);

	for(var i=0;i<select.options.length;i++)
	{
		var option = select.options[i];
		var optionJson = {};
		optionJson = {value: option.value, name: option.text};
		//console.log(optionJson);
		selectJson.push(optionJson);
	}
	//console.log(selectJson);
	$("#sandeep").html('<option value="" selected="selected"></option>');
	$select_state = $('#satnam').selectize();
        select_city.disable();
        select_city.clearOptions();
        select_city.load(function(callback) {
        select_city.enable();
        callback(selectJson);
        });
}
$(document).ready(function(){

	$select_state = $('#satnam').selectize({
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',
		selectOnTab:true
	});

	$select_city = $('#sandeep').selectize({
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',
		selectOnTab:true
	});
	//$select_state = $('#satnam').selectize();
	select_state  = $select_state[0].selectize;
	
	select_city  = $select_city[0].selectize;
	select_city.disable();
});

/*End of code for city and country*/
</script>

                </div>
             </div>
            <div class="col-sm-6 mb5">
                <label class="control-label">City <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
                    <!--php code for city was here-->
					<select id="sandeep" placeholder="Select City" class="form-control required pr10" tabindex="13" class="selectized" style="display: none;">
						<option value="" selected="selected"></option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<p class="text-center text-grey9">By clicking on "Sign Up" below, you agree to the <a tabindex="14" href="javascript:void(0);" data-toggle="modal" data-target="#bs-modal-lg">Terms &amp; Conditions</a>.</p>
</div>
<div class="modal-footer">
<?php echo CHtml::button('Sign Up',array('id'=>'signupButSat','class'=>'btn btn-teal','tabindex'=>'15')); ?>
</div>
<?php $this->endWidget(); ?>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
                <!--/ END modal -->
                
                <!-- START modal -->
                <div id="bs-modal-lost-password" class="modal fade">
                <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <div class="modal-header bgcolor-teal border-radius">
                    <button data-dismiss="modal" class="close mt5" type="button">×</button>
                    <div style="font-size:16px;" class="pull-left ico-unlock-alt mr10 mt5"></div>
                    <h4 class="semibold modal-title">Forgot Password</h4>
                </div>
                <!--<div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h3 class=" modal-title">Forgot Password</h3>
                </div>-->
                <?php $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form','enableClientValidation'=>true,'action'=>CController::createUrl("/site/forgotPassword"),'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
                
                
                <div class="alert alert-success hide mt15" id="repsoneRest">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <p id="messageResponse"><?php echo Yii::app()->user->getFlash('errorfPass'); ?></p>
                </div>
                
                <div id="resetpass" class="modal-body">
                    <div class="form-group mb0">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label">Enter Your e-mail here <span class="text-danger">*</span></label>
                                <div class="has-icon pull-right">
                                   <?php echo $form->textField($forgot,'email',array('placeholder'=>'Email','class'=>'form-control','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email')); ?>
                                    <i class="ico-user2 form-control-icon"></i>
                                </div>
                             </div>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                <?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'btn btn-teal','id'=>'passButSat')); ?>
                </div>
                <?php $this->endWidget(); ?>
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                </div>
                <!--/ END modal -->
                
                <div id="bs-modal-lg" class="modal fade">
                	<div class="modal-dialog modal-lg">
                    	<div class="modal-content">
                            <div class="modal-header bgcolor-teal border-radius">
                                <button data-dismiss="modal" class="close mt5" type="button">×</button>
                                <div style="font-size:16px;" class="pull-left ico-edit mr10 mt5"></div>
                                <h4 class="semibold modal-title">Terms & Conditions</h4>
                            </div>
                            <!--<div class="modal-header text-center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="semibold modal-title">Terms & Conditions </h3>
                            
                            </div>-->
                            <div class="modal-body bgcolor-white slimscroll">
                            	<div class="panel-body">							  
                                	<p class="pb10">This Privacy Policy governs the manner in which VenturePact LLC.   collects, uses, maintains and discloses information collected from users   (each, a "User") of the VenturePact.com website ("Site"). This privacy   policy applies to the Site and all products and services offered by   VenturePact LLC.<br>
                                <br>
                                <strong class="text-primary">Personal identification information</strong><br>
                                <br>
                                We may collect personal identification information from Users in a   variety of ways, including, but not limited to, when Users visit our   site, register on the site, fill out a form, and in connection with   other activities, services, features or resources we make available on   our Site. Users may be asked for, as appropriate, name, email address.   Users may, however, visit our Site anonymously. We will collect personal   identification information from Users only if they voluntarily submit   such information to us. Users can always refuse to supply personally   identification information, except that it may prevent them from   engaging in certain Site related activities.<br>
                                <br>
                                <strong class="text-primary">Non-personal identification information</strong><br>
                                <br>
                                We may collect non-personal identification information about Users   whenever they interact with our Site. Non-personal identification   information may include the browser name, the type of computer and   technical information about Users means of connection to our Site, such   as the operating system and the Internet service providers utilized and   other similar information.<br>
                                <br>
                                <strong class="text-primary">How we use collected information</strong><br>
                                <br>
                                The VenturePact LLC may collect and use Users personal information for the following purposes:<br>
                                <br>
                                - To personalize user experience We may use information in the aggregate   to understand how our Users as a group use the services and resources   provided on our Site. <br>
                                - To send periodic emails If User decides to opt-in to our mailing list,   they will receive emails that may include company news, updates,   related product or service information, etc. If at any time the User   would like to unsubscribe from receiving future emails, they may do so   by contacting us via our Site.<br>
                                <br>
                                <strong class="text-primary">How we protect your information</strong><br>
                                <br>
                                We adopt appropriate data collection, storage and processing practices   and security measures to protect against unauthorized access,   alteration, disclosure or destruction of your personal information,   username, password, transaction information and data stored on our Site.<br>
                                <br>
                                <strong class="text-primary">Sharing your personal information</strong><br>
                                <br>
                                We do not sell, trade, or rent Users personal identification information   to others. We may share generic aggregated demographic information not   linked to any personal identification information regarding visitors and   users with our business partners, trusted affiliates and advertisers   for the purposes outlined above.<br>
                                <br>
                                <strong class="text-primary">Third party websites</strong><br>
                                <br>
                                Users may find advertising or other content on our Site that link to the   sites and services of our partners, suppliers, advertisers, sponsors,   licensors and other third parties. We do not control the content or   links that appear on these sites and are not responsible for the   practices employed by websites linked to or from our Site. In addition,   these sites or services, including their content and links, may be   constantly changing. These sites and services may have their own privacy   policies and customer service policies. Browsing and interaction on any   other website, including websites which have a link to our Site, is   subject to that website's own terms and policies.<br>
                                <br>
                                <strong class="text-primary">Compliance with children's online privacy protection act</strong><br>
                                <br>
                                Protecting the privacy of the very young is especially important. For   that reason, we never collect or maintain information at our Site from   those we actually know are under 13, and no part of our website is   structured to attract anyone under 13.<br>
                                <br>
                                <strong class="text-primary">Changes to this privacy policy</strong> VenturePact LLC has the discretion to update this privacy policy at any   time. When we do, we will post a notification on the main page of our   Site. We encourage Users to frequently check this page for any changes   to stay informed about how we are helping to protect the personal   information we collect. You acknowledge and agree that it is your   responsibility to review this privacy policy periodically and become   aware of modifications.<br>
                                <br>
                                <strong class="text-primary">Your acceptance of these terms</strong> By using this Site, you signify your acceptance of this policy. If you   do not agree to this policy, please do not use our Site. Your continued   use of the Site following the posting of changes to this policy will be   deemed your acceptance of those changes.<br>
                                <br>
                                <strong class="text-primary">Contacting us</strong><br>
                                <br>
                                If you have any questions about this Privacy Policy, the practices of   this site, or your dealings with this site, please contact us at:<br>
                                <br>
                                <a href="mailto:questions@venturepact.com">questions@venturepact.com </a></p>						   
                                </div>
                            </div>                    
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

			</div>
</section>
		<section class="col-lg-12" >
            <!-- START row -->
            <div class="row">
                <div class="col-lg-12 text-center">
<!--                    <h3 class="title light text-grey5 mtb22">Are you a service provider? Sign in<a href="">here</a></h3>-->
                    <span class="text-muted ">Are you a service provider? Sign in<a href="/index.php?r=site/supplier"> here...</a> </span>
                    
                </div>
            </div>
            <!--/ END row -->
        </section>
<script type="text/javascript">
$(document).ready(function(){

	$('#signupButSat').blur(function(){
		$('#Users_display_name').focus();
	});

	$('#usernameL').on("keypress",function(){
		var elem	=	$(this);
		var ErrID	=	elem.attr('data-parsley-id')
		$('#parsley-id-satn-'+ErrID).html('');
	});
	$('#usernameL').on("focusout",function(){
		var elem	=	$(this);
		$.ajax({
			type: 'POST',
			url:"<?php echo CController::createUrl('/site/ajaxUniqe');?>"+'&email='+elem.val(),
			success :function(data){
				var response = JSON.parse(data);
				
				if(elem.attr('id')=='usernameL'){
					if(response.exist){
						elem.addClass('parsley-error');
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Email address already exists.</li>');
						$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
						$('#signupButSat').attr('type','button');
					}
					else{
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-satn-'+ErrID).html('');
						$('#signupButSat').attr('type','submit');
					}
				}else{
					if(!(response.exist)){
						elem.addClass('parsley-error');
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Record does not exists for this email.</li>');
						$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
						$('#passButSat').attr('type','button');										
					}
					else{
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-satn-'+ErrID).html('');
						$('#passButSat').attr('type','submit');
					}
				}
			}
		});
	});
	var cnt=0;
	$('#signupButSat').on("click",function(){
		//console.log(validate('Signup-form'));
		if(!validate('Signup-form')){
			$('#signupButSat').val('Please wait..');
			console.log($('#Signup-form').serialize());
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/site/signup');?>",
				data:$('#Signup-form').serialize(),
				success :function(data){
					var response = JSON.parse(data);
					if(response.exist){
						$('#messageResponse2').html(response.message);
						redirectToURL("<?php echo CController::createAbsoluteUrl('/client/index',array('first'=>1));?>");
						$.ajax({
							type: 'POST',
							url:"<?php echo CController::createUrl('/client/statusUpdate');?>",
							success :function(data){}
						});
					}
					else{
						$('#messageResponse2').html(response.message);
						$('#repsoneRest2').show();
						$('#repsoneRest2').removeClass('hide');
						$('#repsoneRest2').removeClass('alert-success');
						$('#repsoneRest2').addClass('alert-danger');
						
					}
					
				}
			});
		}
		else
		{
			console.log('form fields required');
		
			if($("#sandeep").val()=="")
			{
				var ul=$('#sandeep').next();
				var divc=$(ul).next();
				$(divc).append($(ul));
			}		
			
			if($("#satnam").val()=="")
			{
				if(cnt==0)
				{
					var ul1=$("#satnam").next();
					if(ul1)
					{
						var divc1=$(ul1).next();
						$(divc1).append($(ul1));
					}
					cnt++;
				}
			}
		}
	});
	
	$('#passButSat').on("click",function(){
		var elem	=	$('#forget-form-email');
		if(elem.val().length>0){
			if(testEmail(elem.val())){
				
				$('#passButSat').val('Please Wait');
				$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/site/ajaxUniqe');?>"+'&email='+elem.val(),
				success :function(data){
					var response = JSON.parse(data);
					console.log('Element is :'+elem);
					if(response.exist){
						elem.addClass('parsley-error');
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">'+response.message+'</li>');
						$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
						$('#signupButSat').attr('type','button');
						
						
					}
					else{
						elem.val('');
						$('#messageResponse').html(response.message);
						$('#repsoneRest').show();
						$('#resetpass').addClass('hide');
						$('#repsoneRest').removeClass('hide');
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-satn-'+ErrID).html('');
					}
					
				}
			});
			}
			else{
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is not a valid email address.</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			}
		}
		else{
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is required field.</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
		}
	});
});
function redirectToURL(redirectURL){
window.location.href= redirectURL;
}
$('#Signup-form').on('change',function(){changeValidate('Signup-form');});
</script>
