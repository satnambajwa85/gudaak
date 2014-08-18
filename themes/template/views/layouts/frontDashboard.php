<?php $path	=	Yii::app()->theme->baseUrl;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo Yii::app()->session['setting']['site_meta']?>">
    <meta name="author" content="">
    <title><?php echo CHtml::encode($this->pageTitle);?></title>
    <!-- Bootstrap core CSS -->
	<link href="<?php echo $path;?>/css/dashboard.css" rel="stylesheet">
	<link href="<?php echo $path;?>/css/style.css" rel="stylesheet">
	<link href="<?php echo $path;?>/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $path;?>/js/html5shiv.js"></script>
      <script src="<?php echo $path;?>/js/respond.min.js"></script>
    <![endif]-->
</head>
<body style="width:1347px; margin:0 auto;" onunload="window.opener.reload();">
    <div class="wrapper"><?php $path	=	Yii::app()->theme->baseUrl;?><header>
		<div class="logo">
			<?php echo CHtml::link('<img alt="" src="'.$path.'/images/dashboard-logo.png">',array('/site'));?>
		</div><!-- Logo -->
		<div class="welcome-user">
			<?php echo CHtml::link('<img alt="" src="'.Yii::app()->baseUrl.'/uploads/user/small/avatar.png">',array('/site'),array('class'=>'userImage'));?>
			<p>Welcome</p>
			<?php echo CHtml::link('<span>Guest</span>',array('site/'));?>
			<div class="clear"></div>
			<div class="progress fl ">
			  <div style="width:20% !important;" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
			  </div>
			  <span class="sr-only"></span>			
			</div>
            <span class="tolal-process">20% </span>
            <span class="progress-title">Profile Completion</span>
		</div>
		<div class="clearfix"></div>
			<div class="side-navigation">
				<h4 style="background-color:#E88B2D">My Progress</h4>
				<ul>
					<?php
                    $action	=	Yii::app()->controller->action->id;
					$getId='';
					if(isset($_REQUEST['id'])){$getId=$_REQUEST['id'];}?>
					
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-record"></i>Assess','',array('title'=>'Asses','class'=>''))?>
				
				
						<ul style="display:block">
                        	<li><?php echo CHtml::link('Career Test','javaScript:void(0);',array('title'=>'Asses','class'=>'home-login-box'))?></li>
							<li><?php echo CHtml::link('Career Report','javaScript:void(0);',array('class'=>'home-login-box'))?></li>
						</ul>					
					</li>
					<li><?php  echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>Explore','javaScript:void(0);',array('class'=>'home-login-box'))?>
						<ul style="display:block">
                        <li><?php echo CHtml::link('Career Options','javaScript:void(0);',array('class'=>'home-login-box'))?></li>
                        <li><?php echo CHtml::link('Stream Options-for IX & X','javaScript:void(0);',array('class'=>'home-login-box'))?></li>
						<li><?php echo CHtml::link('Articles','javaScript:void(0);',array('class'=>'home-login-box'));?></li>
						</ul>
					</li>
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-thumbs-up"></i>Career Preference','javaScript:void(0);',array('title'=>'Career Preference','class'=>'home-login-box'))?>
						 					
					</li>
					<li>
						<?php echo CHtml::link('<i class="glyphicon glyphicon-flag"></i>Finalized Career','javaScript:void(0);',array('class'=>'home-login-box'));?>
					
					</li>
                    	<li><?php echo CHtml::link('<i class="icon-location-arrow"></i>Approach','javaScript:void(0);',array('class'=>'home-login-box'));?>
                        <ul style="display:block">
							<li><?php echo CHtml::link('Colleges','javaScript:void(0);',array('class'=>'home-login-box'));?></li>
							<li><?php echo CHtml::link('Shortlisted Colleges','javaScript:void(0);',array('class'=>'home-login-box'));?></li>
							<li><?php echo CHtml::link('Entrance Exams','javaScript:void(0);',array('class'=>'home-login-box'));?></li>
						</ul>
					</li>
				</ul>
			</div>
		
		
	</header>
	
    
    
    
    
    
    
	<section class="main-section">
		<div class="left-main">
			<div class="w100 fl color">
						<div class="white-text mt10 fl">
						<?php echo $this->pageTitle;?>
                        </div>
						<div class="pull-right dashbord-top-nav ">
							<ul class="nav  top-nav-left pull-left">
							  <li><i class="icon-microphone icon-top talk-icon"></i><?php echo CHtml::link('Talk to Counsellor','javaScript:void(0);',array('class'=>'home-login-box'));?></li>
							  <li><i class="news-icon"></i><?php echo CHtml::link('Notifications','javaScript:void(0);',array('class'=>'home-login-box'));?></li>
							  <li><i class="summary-icon"></i><?php echo CHtml::link('Summary','javaScript:void(0);',array('class'=>'home-login-box'));?></li>
							</ul>
							<div class="top-stats-icons fr social-icon-links mr12">
								<a href="<?php echo Yii::app()->session['setting']['fb_link'];?>" target="_blank">
									<i class="icon-facebook"></i>
								</a>								
							</div>
						</div>
						 
				
			</div>
			<div class="white mr0">
				 
				<?php echo $content;?>

		</div>
		</div>
	</section>
    
    
    
    <div id="myModal" class="modal fade">
    	<div class="modal-dialog">
        	<div class="modal-content border-layer">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo" style="display:block"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
                            	<div class="hide-overflow2" style="top:-20px;z-index:0"></div>
								<div id="alert-confirm-gudaak-id " class=" col-md-12 login-box confirm-gudaak remove hide">
									<h2> Do you have Gudaak ID?</h2>
									
									<a id="gudaakIdYes" href="javaScript:void(0);" class="white-text btn btn-warning ">Yes</a>
									<a id="gudaakIdNo" data-dismiss="modal" data-trigger="expand" href="javaScript:void(0);" class="white-text btn btn-warning ">No</a>
								</div>
								<div id="confirm-gudaak-id" class="show">
                                
                                <div class="col-md-12  pull-right">
                                <?php $model=new Register; $form=$this->beginWidget('CActiveForm', array(
                                                            'id'=>'user-register',
                                                            'action'=>Yii::app()->createUrl('/site/UserRegister'),
                                                            'enableClientValidation'=>true,
                                                            'clientOptions'=>array('validateOnSubmit'=>true,)));?>
                                    <i class="glyphicon glyphicon-edit orange pull-left"></i>
                                    <h4 class="form-signin-heading ">Enroll !!!</h4>
									
                                    <div class="">
                                    <?php echo CHtml::link('<img src="'.$path.'/images/register.png" alt="facebook login">','',array('class'=>'fb-butt','style'=>'margin-left: 150px;','onclick'=>'ShowPopup("'.Yii::app()->createUrl('site/facebook').'")'));?>
                                    <?php //echo CHtml::link('Register with <i class="posi-bt icon-facebook"></i>',array('site/facebook'),array('class'=>'btn  btn-primary fb1','style'=>'margin-left: 150px;'));?>
									</div>
                                    <div class="clear"></div>
                                    <div align="center" class="top-stats-icons ">
                                    <div class="clearfix"></div>
                                    <div class="or">or</div>
                                    </div>
                                    
                                    <div>
									<div class="col-md-6 input-mar pull-left" style="height: 59px;">
                                    <?php echo $form->textField($model,'first_name',array('class'=>'form-control mar-b16','placeholder'=>'First Name','autofocus'=>true));
                                    echo $form->error($model,'first_name');?>
									</div>
									<div class="col-md-6 input-mar pull-left">
										<?php echo $form->textField($model,'last_name',array('class'=>'form-control mar-b16','placeholder'=>'Last Name','autofocus'=>true));
										echo $form->error($model,'last_name');?>
									</div>
									<div class="col-md-6 input-mar pull-left ">
                                     <div class="col-md-9 pd0 pull-left">
                                     <?php echo $form->textField($model,'mobile_no',array('class'=>'dob form-control mar-b16','style'=>'width:72%','placeholder'=>'Mobile no.','autofocus'=>true));
									 echo $form->error($model,'mobile_no');?>
                                     
                                    <?php /*$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                                    'model'=>$model,
                                                                    'attribute'=>'date_of_birth',
                                                                    'options'=>array('dateFormat'=>'yy-mm-dd',
																					'yearRange'=>'1970:2014',
                                                                                    'changeMonth'=>'true',
                                                                                    'changeYear'=>'true',),
                                                                    'htmlOptions'=>array('class'=>'dob form-control mar-b16','style'=>'width:72%',
                                                                                        'placeholder'=>'DOB','autofocus'=>false),));?>	
																						 <?php echo $form->error($model,'date_of_birth');*/?>
									</div>
									<div class="fr dimension-box">
                                    <?php echo $form->checkBox($model,'gender',array('id'=>'dimension-switch'));?>
									</div>
									</div>
                                   
                                    <div class="col-md-6 input-mar pull-left">
                                    <?php echo $form->textField($model,'email',array('class'=>'form-control mar-b16','placeholder'=>'Email','autofocus'=>true));
                                    echo $form->error($model,'email');?>
									</div>
                                    <div class="col-md-6 input-mar pull-left">
                                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control mar-b16','placeholder'=>'Password','autofocus'=>true));
                                    echo $form->error($model,'password');?>
									</div>
                                    <div class="col-md-6 input-mar pull-left">
                                    <?php echo $form->passwordField($model,'confirmpass',array('class'=>'form-control mar-b16','placeholder'=>'confirm password','autofocus'=>true));
                                    echo $form->error($model,'confirmpass');?>
									</div>
                                    <div class="col-md-12 input-mar pull-left">
                                    <div style="font-size:12px; font-weight:normal !important ">
                                    By signing up you agree to our <a href="javascript:vodi(0);" class="terms" style="font-size:12px;">Term and conditions</a></div>
                                     <div class="col-md-4 pull-right pd0">
									    <?php echo CHtml::submitButton('Register',array('class'=>'btn fr btn-warning login '));?>
									</div>
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12">
									<div class="col-md-4 pull-left pd0">
										  <?php echo CHtml::link('Back','',array('class'=>'btn fl back-register-bt btn-info','data-dismiss'=>'modal'));?>
									</div>
                                   
									</div>
								 
                                <?php $this->endWidget();?>
                            </div>
								</div>
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
    
    <div id="terms" class="modal fade" style="height:600px;">
    	<div class="modal-dialog" style="width:850px;">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="row white ">
                        	<div class="col-md-12 pd13 ">
                            	  <div  class="col-md-12 pull-left">
								<a data-dismiss="modal" class="btn btn-info pull-right ">close</a>

<div id="termsC">
<h3 style="width:100%; text-align:center; color:#000;"> Terms of use</h3>
<div id="scrollBar">

<p>
Gudaak Consulting Services Private Limited (“Gudaak” or "We") provides this application, site and/or service 

(collectively, "Service") and these Terms of Use govern your use of this Service. Please read this Terms of Use 

carefully, this includes the Privacy Policy. If you ("You" or "User") are less than eighteen (18) years of age or 

the age of majority in your jurisdiction, then please read these Terms of Use and the Privacy Policy with your 

parent or legal guardian. By using, accessing or purchasing access to this Service, you represent that you (or 

your parent or legal guardian on your behalf if you are a minor) have read, understood and agreed to the Terms 

of Use in their entirety, including the Privacy Policy. If you, or in the case that you are a minor, your parent(s) or 

legal guardian(s) do not agree with any part of the Terms of Use, including the Privacy Policy, then please do not 

use, access or purchase access to the Service.
</p><br/>
<h4 style="color:#000;" >Changes in Terms of Use</h4>
<p>
Gudaak has the right to change or modify the Terms of Use, including the Privacy Policy, applicable to your use

of the Service, or any part thereof, or to impose new conditions, including, but not limited to, adding or changing 

fees and charges for use at any time. Such changes, modifications, additions or deletions shall be effective 

immediately upon notice thereof, which may be given by means including, but not limited to, posting within the 

Service, or by electronic or conventional mail, messaging, or by any other means by which you may obtain 

notice thereof. Any use of the Service by you subsequent to such notice shall be deemed to constitute your, or 

in the case that you are a minor, your parent's or legal guardian's acceptance of such changes, modifications or 

additions.
</p>
<h4 style="color:#000;">User Account</h4>

<ul style="font-family: robotomedium !important;">
<li style="margin-top:15px;"><strong style="padding-right:10px;">a.</strong>In addition to any other requirements specified in this Terms of Use, the use of this Service requires that

you be thirteen (13) years of age or older and that you create a user account comprised of choosing a unique 

user name and password and providing certain registration information such as first name, last name, phone no. 

and valid email address ("User Account"). You may also access this Service through Facebook Connect so long 

as you are a registered member of Facebook and you are in compliance with the policies and terms of service of 

Facebook. Your User Account is for your personal use only. Each User may have only one active User Account 

at any given time. You should keep your User Account information confidential. You agree not to use another 

User's user name and password to access the Service, or to provide your User Account information to another 

User or third party to access the Service. You agree to provide accurate and truthful information when creating a 

User Account.</li>

<li  style="margin-top:15px;"><strong style="padding-right:10px;">b.</strong> Access to certain services on the site requires you to purchase a subscription ("Subscription") for your own 

User Account or another person's User Account on this Service. Users must be thirteen (13) years or older. 

A Subscription is valid only for the User Account for which it is purchased and is otherwise non-transferable. 

Subscriptions are also non-refundable.</li>

<li  style="margin-top:15px;"><strong style="padding-right:10px;">c.</strong> Subscriptions can be purchased on an annual basis and with varying benefits as stated/communicated. 

A Subscription renewal shall be charged at the then current price for the applicable Subscription period. 

Please note that if a Subscription is cancelled before the expiration of the current Subscription period, no 

refunds will be given to the purchaser for the remaining portion of the Subscription period. Your access 

to the Subscription will be terminated at the end of the current subscription period. After cancellation of a 

Subscription, Users will still be able to access free, non-premium Services.</li>

<li  style="margin-top:15px;"><strong style="padding-right:10px;">d.</strong> From time to time, Gudaak may offer free or subsidized trials of Subscriptions to premium services. Such trial 

subscriptions may be subject to certain restrictions such as, first time users, limited duration and as otherwise 

indicated by Gudaak.</li>
</ul>

<br />
<h4 style="color:#000;">Right to Use this Service</h4>
<ul style="font-family: robotomedium !important;">

<li style="margin-top:15px;"><strong style="padding-right:10px;">a.</strong> Gudaak grants you a personal, limited, non-exclusive, revocable license to access and use this Service for your personal use subject to this Terms of Use. Gudaak reserves the right to suspend or terminate operation of this Service at any time for any reason without liability to you. Gudaak has the right to change or discontinue any aspect or feature of the Service, including, but not limited to, content, hours of availability, and equipment needed for access or use, at any time without liability to you.</li>

<li style="margin-top:15px;"><strong style="padding-right:10px;">b.</strong> Certain features of this Service may be provided by third parties and the use of such features may be conditioned upon your agreement to such third parties' terms of use and privacy policies.</li>

<li style="margin-top:15px;"><strong style="padding-right:10px;">c.</strong> In addition to other proprietary rights specified in this Terms of Use, Users may not:
	i) frame or utilize framing techniques to enclose any element, including without limitation, any text, graphics, images or trademarks on the Service (collectively, "Elements");
   ii) gather, obtain, use, access or otherwise copy the Service or any Elements thereof by using any bot, spider, crawler, spy ware, engine, device, software or any other automatic device, utility or manual process of any kind;
    iii) use the Service or any features available on the Service in any manner with the intent to interrupt, damage, disable, overburden or impair the Service or such services;
    iv) directly or indirectly attempt to circumvent, reverse engineer, decrypt, or otherwise alter or interfere with the Service; or
    v) engage in any activity that interferes with another User's access, use or enjoyment of this </li>
</ul>

<br />
<h4 style="color:#000;">
Disclaimers and Limitation of Liability</h4>
<br>
<ul style="font-family: robotomedium !important;">

<li style="margin-top:15px;"><strong style="padding-right:10px;">
a.</strong> USER EXPRESSLY AGREES THAT USE OF THE SERVICE IS AT USER'S OWN RISK.</li>
<li style="margin-top:15px;"><strong style="padding-right:10px;">b.</strong> NEITHER GUDAAK, ITS AFFILIATES, NOR ANY OF THEIR RESPECTIVE EMPLOYEES, SHAREHOLDERS, AGENTS, THIRD-PARTY CONTENT PROVIDERS OR LICENSORS, WARRANT THAT THE SERVICE WILL BE UNINTERRUPTED OR ERROR FREE; NOR DO THEY MAKE ANY WARRANTY AS TO THE RESULTS THAT MAY BE OBTAINED FROM USE OF THE SERVICE, OR AS TO THE ACCURACY, RELIABILITY OR CONTENT OF ANY INFORMATION, SERVICE, OR MERCHANDISE PROVIDED THROUGH THE SERVICE. PRICE INFORMATION IS SUBJECT TO CHANGE WITHOUT <br/><br/>

NOTICE. IT IS YOUR RESPONSIBILITY TO EVALUATE THE ACCURACY AND COMPLETENESS OF ALL INFORMATION, OPINIONS AND OTHER MATERIAL ON THE SERVICE OR ANY SITES OR  SERVICES WITH WHICH IT IS LINKED. THE SERVICE LINKS TO OR REFERENCES SITES, OTHER SERVICES AND INFORMATION LOCATED WORLDWIDE THROUGHOUT THE INTERNET. BECAUSE  GUDAAK HAS NO CONTROL OVER SUCH SITES, OTHER SERVICES AND INFORMATION, GUDAAK MAKES NO GUARANTEE AS TO SUCH SITES, OTHER SERVICES AND INFORMATION, INCLUDING THE ACCURACY, CURRENCY, CONTENT OR QUALITY OF ANY SUCH SITES, OTHER SERVICES AND INFORMATION AND GUDAAK ASSUMES NO RESPONSIBILITY AS TO WHETHER A LINK OR REFERENCE LOCATES UNINTENDED OR OBJECTIONABLE CONTENT. FURTHERMORE, BECAUSE SOME CONTENT ON THE INTERNET CONSISTS OF MATERIAL THAT IS ADULT-ORIENTED OR OTHERWISE OBJECTIONABLE TO SOME PEOPLE, THE RESULTS OF A LINK OR REFERENCE ON THE SERVICE MAY UNINTENTIONALLY GENERATE LINKS OR REFERENCES TO OBJECTIONABLE MATERIAL. GUDAAK MAKES NO CLAIM THAT SUCH SURPRISES WILL NOT OCCUR.</li>

<li style="margin-top:15px;"><strong style="padding-right:10px;">c.</strong> THE SERVICE IS PROVIDED ON AN "AS IS" BASIS WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF TITLE OR IMPLIED WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE, OTHER THAN THOSE WARRANTIES WHICH ARE INCAPABLE OF EXCLUSION, RESTRICTION OR MODIFICATION UNDER THE LAWS APPLICABLE TO THIS AGREEMENT.</li>

<li style="margin-top:15px;"><strong style="padding-right:10px;">d.</strong> THIS DISCLAIMER OF LIABILITY APPLIES TO ANY DAMAGES OR INJURY CAUSED BY ANY FAILURE OF PERFORMANCE, ERROR, OMISSION, INTERRUPTION, DELETION, DEFECT, DELAY IN OPERATION OR TRANSMISSION, COMPUTER VIRUS, COMMUNICATION LINE FAILURE, THEFT OR DESTRUCTION OR UNAUTHORIZED ACCESS TO, ALTERATION OF, OR USE OF RECORD, WHETHER FOR BREACH OF CONTRACT, TORTIOUS BEHAVIOR, NEGLIGENCE, OR UNDER ANY OTHER CAUSE OF ACTION. USER SPECIFICALLY ACKNOWLEDGES THAT GUDAAK AND ITS LICENSORS ARE NOT LIABLE FOR THE DEFAMATORY, OFFENSIVE OR ILLEGAL CONDUCT OF OTHER VISITORS OR THIRD PARTIES AND THAT THE RISK OF INJURY FROM THE FOREGOING RESTS ENTIRELY WITH USER.</li>

<li style="margin-top:15px;"><strong style="padding-right:10px;">e.</strong> IN NO EVENT WILL GUDAAK, OR ANY PERSON OR ENTITY INVOLVED IN CREATING, PRODUCING OR DISTRIBUTING ANY PART OF THE SERVICE BE LIABLE FOR ANY DAMAGES, INCLUDING, WITHOUT LIMITATION, DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL OR PUNITIVE DAMAGES ARISING OUT OF THE USE OF OR INABILITY TO USE ANY PART OF THE SERVICE. USER HEREBY ACKNOWLEDGES THAT THE PROVISIONS OF THIS SECTION SHALL APPLY TO ALL CONTENT AND FEATURES ON THE SERVICE.</li>

<li style="margin-top:15px;"><strong style="padding-right:10px;">f.</strong> IN ADDITION TO THE TERMS SET FORTH ABOVE, NEITHER GUDAAK, NOR ITS AFFILIATES, INFORMATION PROVIDERS, SERVICE PARTNERS OR CONTENT PARTNERS SHALL BE LIABLE REGARDLESS OF THE CAUSE OR DURATION, FOR ANY ERRORS, INACCURACIES, OMISSIONS, OR OTHER DEFECTS IN, OR UNTIMELINESS OR UNAUTHENTICITY OF, THE INFORMATION CONTAINED WITHIN THE SERVICE, OR FOR ANY DELAY OR INTERRUPTION IN THE TRANSMISSION THEREOF TO THE USER, OR FOR ANY CLAIMS OR LOSSES ARISING THEREFROM OR OCCASIONED THEREBY. NONE OF THE FOREGOING PARTIES SHALL BE LIABLE FOR ANY THIRD-PARTY CLAIMS OR LOSSES OF ANY NATURE, INCLUDING, BUT NOT LIMITED TO, LOST PROFITS, PUNITIVE OR CONSEQUENTIAL DAMAGES.</li>
</ul>
<h4 style="color:#000;">Indemnification</h4>

<p>
User agrees to defend, indemnify and hold harmless Gudaak, its affiliates and their respective directors, officers, shareholders, employees, agents, and assigns from and against all claims and expenses, including attorneys' fees, arising out of User's use of the Service.
</p>
<h4 style="color:#000;">Lawful Use</h4>

<p>
User shall use the Service lawful purposes only. User shall not post or transmit through the Service any material which: 
	(i) violates or infringes in any way upon the rights of others; 
    (ii) is unlawful, threatening, abusive, defamatory, invasive of privacy or publicity rights, vulgar, obscene, profane or otherwise objectionable; 
    (iii) encourages conduct that would constitute a criminal offense, gives rise to civil liability or otherwise violates any law; or 
    (iv) contains advertising or any solicitation with respect to products or services, unless Gudaak has expressly approved such material in advance of its transmission. Any conduct by a User that in Gudaak's discretion restricts or inhibits any other User from using or enjoying the Service is expressly prohibited.
</p>
<h4 style="color:#000;">Ownership of Intellectual Property</h4> 
<ul style="font-family: robotomedium !important;">
<li style="margin-top:15px;"><strong style="padding-right:10px;">
a.</strong> The Service contains copyrighted material, trademarks and other proprietary information, including, but not limited to, text, software, photos, video, graphics, music, and sound, portions of which are owned by Gudaak and portions of which are owned by other parties. The entire contents of the Service are copyrighted as a collective work/compilation. Gudaak owns copyright in the selection, coordination, arrangement, and enhancement of such content, as well as in the content original to it. User may not modify, publish, transmit, participate in the transfer or sale, create derivative works, or in any way exploit, any of the content, in whole or in part. Except as otherwise expressly permitted under copyright law, no copying, redistribution, retransmission, publication or commercial exploitation of downloaded material will be permitted without the express written permission of Gudaak (or the copyright owner(s) if other than or in addition to Gudaak). In the event of any permitted copying, redistribution or publication of copyrighted material, no changes in or deletion of author attribution, trademark legend, copyright or other proprietary notice shall be made. User acknowledges that he/she does not acquire any ownership rights by downloading copyrighted material.</li>

<li style="margin-top:15px;"><strong style="padding-right:10px;">b.</strong> The Service permits you to generate certain content, such as responses, essays, test answers and results, based on information provided by you (collectively and excluding the content referenced in Section 11 of this Terms of Use, ("User Content"). Gudaak agrees that you shall retain ownership of your User Content provided however that by using this Service and submitting User Content to the , you hereby grant to GUDAAK and its affiliates and any applicable third party service providers a worldwide, non-exclusive, royalty-free, transferable right and license to reproduce, distribute, adapt, publicly perform and display and otherwise use and modify your User Content in connection with Gudaak's provision of the Service to you. The duration of the rights and license granted in this Section.</li>

<li style="margin-top:15px;"><strong style="padding-right:10px;">c.</strong> Shall terminate within five years after the expiration or termination of your User Account.

<h4 style="color:#000;">Uploading of Intellectual Property</h4>
<p>
 User shall not upload, post or otherwise make available on the Service any material protected by copyright, trademark, or other proprietary right, without the express written permission of the owner of the copyright, trademark, or other proprietary right, and the burden of determining that any material is not protected by copyright rests with User. User shall be solely liable for any damage resulting from any infringement of copyrights, proprietary rights, or any other harm resulting from such a submission. By submitting material to any public area of the Service, User automatically grants, or warrants that the owner of such material has expressly granted Gudaak the royalty-free, perpetual, irrevocable, non-exclusive right and license to use, reproduce, modify, adapt, publish, translate and distribute such material (in whole or in part) worldwide and/or to incorporate it in other works in any form, media or technology now known or hereafter developed for the full term of any copyright that may exist in such material. User also permits any other User to access, view, store or reproduce the material for that User's personal use. User hereby grants Gudaak the right to edit, copy, publish and distribute any material made available on the Service by User.
 </p>
 
<h4 style="color:#000;">Trademarks</h4> 
<p>
 Unless otherwise indicated, trademarks that appear on this Service are trademarks of Gudaak, or its affiliates. All other trademarks not owned by Gudaak or its affiliates that appear in this Service are the property of their respective owners, who may or may not be affiliated with, connected to, or sponsored by Gudaak or its affiliates.
 </p>
 <h4 style="color:#000;">Service Content</h4> 
 <p>
 Certain portions of the Service are supplied by third parties. Any opinions, advice, statements, services, offers, or other information or content expressed or made available by third parties, including information providers, are those of the respective author(s) or distributor(s) and not of Gudaak. Neither Gudaak nor any third-party provider of information guarantees the accuracy, completeness, or usefulness of any content, nor its merchantability or fitness for any particular purpose. Gudaak neither endorses nor is responsible for the accuracy or reliability of any opinion, advice or statement made on any Gudaak Service by anyone other than employee spokespersons of GUDAAK while acting in their official capacities.
 </p>
 <h4 style="color:#000;">Submissions</h4> 
 <p>
 Gudaak always welcomes suggestions and comments regarding the Service. Any comments or suggestions submitted to Gudaak, either online or offline, will become Gudaak's property upon their submission. This policy is intended to avoid the possibility of future misunderstandings when projects developed by Gudaak might seem to others to be similar to their own submissions or comments.</p>
 <h4 style="color:#000;">Entire Agreement</h4> 
 <p>
 This Agreement, and any operating rules for the Service established by Gudaak, constitutes the entire agreement of the parties with respect to the subject matter hereof, and supersedes all previous written or oral agreements between the parties with respect to such subject matter.</p>
  <h4 style="color:#000;">Controlling Law</h4> 
 <p>
 
 This Agreement shall be construed in accordance with the laws of India. Any cause of action of any nature arising out this Agreement shall be brought in the courts at Karnal.
 </p>
</li>
</ul>
</div>
</div>
                                 </div>
                               
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
    
    
	</div>
	<footer id="footer" class="row color mr0">
		 <div class="container">
	
			 <ul class="dashboard-footer nav navbar-nav">
            
				<li><?php echo CHtml::link('Home',array('site/'),array('class'=>'pull-left'));?><i class="pull-right border-l">|</i></li>
				<li><?php echo CHtml::link('About',array('/site/about'),array('class'=>'pull-left'));?><i class="pull-right border-l">|</i></li>
                <li><?php echo CHtml::link('Why Gudaak',array('/site/why'),array('class'=>'pull-left'));?><i class="pull-right border-l">|</i></li>
                
                
				<li><?php echo CHtml::link('Schools',array('site/schools'),array('class'=>'pull-left'));?></li>
				
				
			</ul>
		</div>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <link href="<?php echo $path?>/css/bootstrap-switch.min.css" rel="stylesheet">
	<script src="<?php echo $path?>/js/bootstrap.min.js"></script>
	<script src="<?php echo $path?>/js/bootstrap-switch.min.js"></script>
	<script src="<?php echo $path;?>/js/profle-pop-up.js"></script>
	<script src="<?php echo $path;?>/js/jquery-ui-1.10.3.custom.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/dashboard-custom.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/rating.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.scrollbox.js" type="text/javascript"></script>
	<script src="<?php echo $path?>/js/index.js"></script>
<!-- jquery jcarousel --> 

<!-- end Scripts --> 
<script type="text/javascript">
var popup;
function ShowPopup(url) {
	popup = window.open(url, "Popup", "toolbar=no,scrollbars=yes,location=no,statusbar=no,menubar=no,resizable=1,width=500,height=400,left = 490,top = 200");
	popup.focus();
}
var url	=	'<?php echo Yii::app()->createUrl('/user/userProfileUpdate');?>';
var test	=	'<?php echo Yii::app()->createUrl('user/test');?>';
<?php if(Yii::app()->user->hasFlash('redirect')): ?>
	alert("<?php echo Yii::app()->user->getFlash('redirect'); ?>");
<?php endif; ?>	
</script>

<?php 
if(isset($_REQUEST['first']) && $_REQUEST['first']==1)
	Yii::app()->clientScript->registerScript('opact','$("#popup_box2").fadeIn("slow");$("#container").css({"opacity": "0.3" }); $(".next_position").click(function(){$("#popup_box2").fadeOut();$("#popup_box1").fadeIn("slow");$("#container").css({"opacity": "0.3" });});$(".close_position").click(function(){$("#popup_box1").fadeOut();});',CClientScript::POS_READY);?>
<div id="popup_box2">    <!-- OUR PopupBox DIV-->
<img class="menu_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/menu_position.png"/>
<img class="img_position1" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer1.png"/>
<img class="img_position2" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer2.png"/>
<img class="img_position3" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer3.png"/>
<img class="next_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/next.png"/>
</div>
<div id="popup_box1">
<img class="img_position4" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer4.png"/>
<img class="img_position5" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer5.png"/>
<img class="img_position6" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer7.png"/>
<img class="img_position7" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer8.png"/>
<img class="profile_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile.png"/>
<img class="top_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/top.png"/>
<img class="news_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/news.png"/>
<img class="close_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/close.png"/>
</div>
<script>
function RefreshParent() {
	if (window.opener != null && !window.opener.closed) {
		window.opener.location.reload();
	}
}
window.onbeforeunload = RefreshParent;
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-53922026-1', 'auto');
ga('send', 'pageview');
</script>



</body>
</html>
