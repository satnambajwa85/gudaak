
<section>
    <!-- START Template Container -->
    <section class="container-fluid">
        <!-- section header -->
        <div class="page-header page-header-block pb0 pt15">
            <div class="page-header-section pt5">
                <ol style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;" class="breadcrumb">
                    <li><a href="javascript:void(0);">Dashboard</a></li>
                </ol>
            </div>
        </div>
 <?php if(Yii::app()->user->hasFlash('success1')):?>
					<div class="col-md-12">
						<div class="alert alert-dismissable alert-success">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<?php echo Yii::app()->user->getFlash('success1'); ?>
						</div>
					</div>
                    <?php endif; ?>
        
        <!--/ section header -->
		<?php if($supplier->status == 0){ ?>
			<div class="col-md-12 pl0 pr0">
                <div class="alert alert-dismissable alert-info">

                    <strong>Welcome to VenturePact!</strong> The next step is to complete and submit your Profile to start receiving leads. Please click on <strong>"Profile"</strong> to get started.
                </div>
            </div>
             <!-- New section {SAhil} -->
			<div class="col-md-12 pl0 pr0">
                    <div class="col-md-3">
                        <!-- START Widget Panel -->
                        <div class="widget">
                            <!-- panel body -->
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="text-center mb15">
                                        <img width="100px" height="100px" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/supplier_profile.png" class="img-circle ">
                                    </li>
                                    <li class="text-center mb10">
                                        <h5 class="semibold ellipsis nm text-default">Step 1: Complete your profile</h5>
                                    </li>
                                    <li class="text-center text-default">You will be required to provide details of your <strong>portfolio</strong>, your <strong>past clients</strong> and <strong>project preferences.</strong></li>
                                </ul>
                            </div>
                            <!--/ panel body -->
                        </div>
                        <!--/ END Widget Panel -->
                    </div>
                    <div class="col-md-1" style="padding-top:5%;"><i class="ico-long-arrow-right text-default" style="font-size:25px;"></i></div>
                    <div class="col-md-3">
                        <!-- START Widget Panel -->
                        <div class="widget">
                            <!-- panel body -->
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="text-center mb15">
                                        <img width="100px" height="100px" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/approved_icon.png" class="img-circle ">
                                    </li>
                                    <li class="text-center mb10">
                                        <h5 class="semibold ellipsis nm text-default">Step 2: Get verified</h5>
                                    </li>
                                    <li class="text-center text-default">Our team will help you through the verification process. Thereafter, we sign the <strong>Referral Agreement</strong>.</li>
                                </ul>
                            </div>
                            <!--/ panel body -->
                        </div>
                        <!--/ END Widget Panel -->
                    </div>
                    <div class="col-md-1" style="padding-top:5%;"><i class="ico-long-arrow-right text-default" style="font-size:25px;"></i></div>
                    <div class="col-md-3">
                        <!-- START Widget Panel -->
                        <div class="widget">
                            <!-- panel body -->
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="text-center mb15">
                                        <img width="100px" height="100px" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/finish_icon.png" class="img-rounded ">
                                    </li>
                                    <li class="text-center mb10">
                                        <h5 class="semibold ellipsis nm text-default">Step 3: Receive leads</h5>
                                    </li>
                                    <li class="text-center text-default">Once your profile is set and legalities are out of the way, we start <strong>sending leads</strong> your way.</li>
                                </ul>
                            </div>
                            <!--/ panel body -->
                        </div>
                        <!--/ END Widget Panel -->
                    </div>

                </div>
        <div class="col-md-12 text-center" style="padding-right: 90px">
            <button id="btnProfile" class="btn btn-teal" style="
    padding-left: 50px;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-right: 50px;
">Get Started</button>
            </div>


		<!-- if Profile has filled -->
		<?php }else if($supplier->status ==1){ ?>

		<div class="col-md-12 pl0 pr0">
			<div class="alert alert-dismissable alert-success col-sm-12">
                Thank you for completing your profile. We will review it & get back with the next steps.
			</div>
		</div>
		
         <!-- After profile filled Awaiting admin approval -->
		<?php }else if($supplier->status ==2){ ?>
			<div class="col-md-12 alert alert-dismissable alert-info">
				<div class="col-sm-12"><strong>Congratulations!</strong> Your application to join the VenturePact marketplace has been accepted. <br>We are exicted to welcome you! One final step - please sign this <strong>Referral Agreement</strong> and we'll be good to go.</div>
				<div class="col-md-12"><p></p>
				
					<a href="javascript:void(0);" data-toggle="modal" class="btn btn-danger pull-left" data-target="#bs-modal-terms-suppliers">Sign Agreement</a>
  </div>
			</div>


		<?php }else if($supplier->status ==3){ ?>
            <!-- Project Not accepting -->
            <div class="row mb30">
                <!-- Project you are not accepting -->
                    <?php if(Yii::app()->user->hasFlash('success')):?>
					<div class="col-md-12">
						<div class="alert alert-dismissable alert-success">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<?php echo Yii::app()->user->getFlash('success'); ?>
						</div>
					</div>
                    <?php endif; ?>

                    <!-- Panel body -->

                    <?php if(!empty($supplier->suppliersHasServices)){ ?>
                    <div class="col-md-12">
                        <div class="panel panel-default">

                    <!-- Starts panel header -->
                      <div class="panel-heading">
                        <h3 class="panel-title" style="font-size: 13px;">Which of these services are you offering at the moment? Please check the ones you're offering and uncheck those for which you may not have resources available. </h3>

                        </div>
                                <!--/ Ends panel header -->
                        <div class="panel-body">
                        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'skills-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>"panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>

                        <div class="panel-default">


                            <div class="">
                                <!-- panel body -->
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="col-md-12 pl0">
                                                <?php foreach($supplier->suppliersHasServices as $service){ ?>
                                                <span class="checkbox custom-checkbox custom-checkbox pb5 pt5 col-sm-3  <?php echo ($service->status==1)?'':'cross_text_try';?>" value="<?php echo $service->id; ?>">
                                                    <input type='checkbox' name='Services[<?php echo $service->services_id; ?>]' id='customcheckbox<?php echo $service->services_id; ?>' data-toggle='selectrow' data-target='tr' data-contextual='stroke' <?php echo ($service->status==1)?'checked':'';?> value="<?php echo $service->id; ?>" class='index_checkbox'>
                                                    <label for="customcheckbox<?php echo $service->services_id; ?>" data-original-title='<?php echo $service->services->description; ?>' data-toggle='tooltip' data-placement="top">&nbsp;&nbsp;<?php echo $service->services->name; ?></label>
                                                </span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ panel body -->
                                <input type="hidden" name="Services[test]" value="4" />

                                <!-- panel footer -->
                                <div class="panel-footer">
                                <div class="form-group no-border pt0 pb0">
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8 pl0 pr0">
                                        <button type="submit" class="mr15 btn btn-teal pull-right"  id="basicSave">Update</button>

                                    </div>
                                </div>
                            </div>

                            </div>
                                <!--/ panel footer -->
                            </div>

                     <?php $this->endWidget(); ?>
                     </div>


                    <!--/ Panel body -->
                    </div>
                    </div>
                    <?php } ?>
                <!--/ Project you are not accepting -->

                <!-- View all projects categories wise -->
                <div class="col-md-12 mb15 hide">
                    <div class="form-wizard mt10 mb15">
                        <h3 class="control-label mb-15 mt0 text-success">New Projects</h3>
                    </div>
                </div>
            <?php if(empty($suppliers_projects_proposals)){ ?>
                <div class="col-md-12 hide">
                    <div class="alert alert-dismissable alert-danger">
                        <strong></strong> No Current Projects !
                    </div>
                </div>
            <?php }else{ ?>
                <?php foreach($suppliers_projects_proposals as $project){ ?>

                <div class="col-xs-12 col-md-6 col-lg-4 project "<?php if(!empty($project->chat_room_id)) echo 'data-room="'.$project->chat_room_id.'"' ?>>

                    <div class="table-layout widget panel grand_parent">

                        <!-- Left side of card -->
                        <div class="col-xs-6 widget panel panel-minimal bgcolor-inverse">
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                         <?php
									if($project->clientProjects->current_status==1){
											echo '<i class="ico-user7" style="font-size:25px;"></i>';
										}else{
										foreach($project->clientProjects->clientProjectsHasServices as $service){
													echo '<i class="'.$service->services->tooltip.'" style="font-size:25px;"></i>';
											}
										}?>


                                        <br/>
                                        <!-- Project Name -->
                                        <h5 class="semibold mb0" >
                                             <?php echo CHtml::link( $project->clientProjects->name, array('/supplier/rfp&render=full&projectid='.$project->id."&stat=".$project->status),array("class"=>"projectName"));?>
                                        </h5>
                                        <!-- Project Name -->

                                        <!-- Starts Display services selected -->
                                        <div >
                                            <?php foreach($project->clientProjects->clientProjectsHasServices as $service){?>
                                            <p class="nm mb10 text-white">
                                                <?php echo $service->services->name;?></p>
                                            <?php } ?>
                                        </div>
                                        <br/>
                                        <!-- Ends Display the information of services selected -->
                                        <div> <!-- class="client_dashboard_scoller"> -->
                                        <p class="nm text-white">
                                            <!-- hide below on requirement change -->
                                            <?php //echo $project->clientProjects->description; ?>
                                        </p>
                                        </div>
                                        <br/>
                                        <h5>
                                            <?php //echo $project->clientProjects->clientProfiles->first_name; ?></h5>
                                      <!--   <p class="nm text-muted">Awaiting your response</p> -->
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!--/ Left side of card -->
                        <!-- Right side of card -->
                        <div class="col-xs-6 widget panel panel-minimal bgcolor-white">
							<?php if(!empty($project->clientProjects->max_budget)){ ?>
                           <div class="panel-body text-center bgcolor-white pa10">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                        <i class="ico-dollar" style="font-size:26px;"></i>
                                        <br>
                                        <?php
										$minbudget=(empty($project->clientProjects->min_budget) ? "0" : $project->clientProjects->min_budget);
										$maxbudget = (empty($project->clientProjects->max_budget) ? "0" : $project->clientProjects->max_budget); ?>
                                        <h5 class="semibold mb0">
                                            <?php echo $minbudget. " - ".$maxbudget; ?>
                                        </h5>
                                        <p class="nm text-muted">Budget</p>
                                    </li>
                                </ul>
                            </div>
                            <hr class="mt0 mb0">
							<?php } ?>
                            <div class="panel-body text-center bgcolor-white pa10">
                                <ul class="list-unstyled" <?php echo (empty($project->clientProjects->max_budget)?'style="padding-top:35%; padding-bottom:35%;"':''); ?>
                                    <li class="text-center">
                                        <i class="ico-calendar" style="font-size:26px;"></i>
                                        <br>
                                        <h5 class="semibold mb0">
                                            <?php echo date( "d-M-Y",strtotime($project->clientProjects->start_date)); ?></h5>
                                        <p class="nm text-muted">Start Date</p>
                                    </li>
                                </ul>
                            </div>
                            <hr class="mt0 mb0">
                            <div class="panel-body text-center bgcolor-white pa10">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                        <i class="ico-calendar" style="font-size:26px;"></i>
                                        <br>
                                        <h5 class="semibold mb0">
                                            <?php echo (isset($this->projectStatus[$project->status]["supplier"])?$this->projectStatus[$project->status]["supplier"]:"Status Not Found") ?></h5>
                                        <p class="nm text-muted">Status</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body text-center bgcolor-success pa10">

                                <div class="col-sm-12">
                                    <ul class="nav nav-section nav-justified">
                                        <li class="text-center">
                                            <div class="section">
                                                <span class="number">
                                                   <span class="label label-danger msg2">0</span>
                                                </span>
                                                <p class="nm">
                                                    <a href="" class="text-white">Message</a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Right side of card -->
                    </div>
                </div>

                    <?php } ?>
                <?php } ?>
            </div>
            <!--/ END row -->

		<?php } ?>



		<!-- START modal -->
		<div id="bs-modal-terms-suppliers" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bgcolor-teal border-radius">
						<button type="button" class="close" data-dismiss="modal">x</button>
						<h4 class="semibold modal-title">Referral Agreement</h4>
					</div>
					<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/index'),'id'=>'legal-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate'))); ?>
					<?php //$form=$this->beginWidget('CActiveForm', array('id'=>'legal-form','enableClientValidation'=>true,'action'=>CController::createUrl("/site/updateLegalStatus"),'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>

					<div class="modal-body bgcolor-white slimscroll" style="height:300px;">
						<div class="col-md-12 pl10 pr10">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">


<p>This Referral Agreement (&ldquo;Agreement&rdquo;) grants to VenturePact LLC (&ldquo;Referring Party&rdquo;) the right to refer to your Firm (&ldquo;Company&rdquo;) qualifying new customers (&ldquo;Prospects&rdquo;) in exchange for a Referral Fee (&ldquo;Referral Fee&rdquo;), as set forth below.</p>

<p>1. <strong style="text-decoration:underline;">Referral.</strong> To be eligible for a Referral Fee, the Referring Party must identify Prospects to the Company and either introduce or facilitate an introduction between the two parties, this includes a Prospect who learns about the Company through the Referring Party website. Existing customers of the Company are not eligible as Prospects, neither are customers in the Company&rsquo;s sales funnels who are completely independent from the Referring Party. If the sales lead is approved, the Company must inform the Referring Party of all the details of the transaction including payments. An approved sales lead is hereinafter referred to as a &ldquo;Qualifying Transaction&rdquo; and eligible for a Referral Fee. </p>

<p>2. <strong style="text-decoration:underline;">Limitation.</strong> This Agreement shall in no way limit Company&rsquo;s right to sell any product or service to any current or prospective customers unrelated to the Referring Party. </p>

<p>3. <strong style="text-decoration:underline;">Computation.</strong> Referral fees for any Qualifying Transaction shall equal 10% (&ldquo;Fee Percentage&rdquo;) of total payments made by Prospect to Company during the first 12 months of development work after the starting date of development. As the Company performs well and takes on more projects through the Referring party, the Company will likely receive more leads. </p>

<p>4. <strong style="text-decoration:underline;">Payment Terms.</strong> Company shall pay at the end of each month to Referring party the Fee Percentage multiplied by the total payments Company received from Prospect that month. Such that the total payments made for the first <strong style="text-decoration:underline;">12 months</strong> of development work to the Referring Party (after the starting date of development) will equal the Fee Percentage multiplied by the total payments received by Company from Prospect for those 12 months of work. In the event that there is a delay on the payment, the referral fee will still apply after the 12 month period. For example if a payment for the 12th month of work is paid on the 14th month, the referral fee will still apply on that payment and the referral payment will be made at the end of the 14th month. If development is put on hold for a period of time before the 12 months of development is complete, for example Prospect takes a one month break after the 9th month of development, then there will be no referral payment during that break month, but in the three months after the break month the referral fees will apply as these three months will be the 10th-12th development months. </p>

<p><ul>
<li>a. <strong style="text-decoration:underline;">Method.</strong> Payments can be made by bank transfer, check made payable to VenturePact LLC, or paypal to email address randy@venturepact.com.</li>
</ul>
</p>

<p>5. <strong style="text-decoration:underline;">Secondary Referrals.</strong> If the Company has a lead that it cannot serve and chooses to refer that lead to the Referring Party (&ldquo;VenturePact&rdquo;), the Company will receive a secondary referral fee. The fee varies based on the size of the transaction but is usually <strong style="text-decoration:underline;">30%</strong> of the total amount of Referring Party&rsquo;s (&ldquo;VenturePact&rsquo;s&rdquo;) revenue from that lead as long as the lead is not already in the Referring Party&rsquo;s pipeline and if two companies refer the same lead the first company to make the introduction will receive the secondary referral payment. The payment will be made within 2 weeks from Referring Party&rsquo;s receipt of the income from that lead. The two ways to refer a lead are via the VenturePact online platform, or an email introduction to questions@venturepact.com.</p>

<p>6. <strong style="text-decoration:underline;">Non circumvention.</strong> Company should act in proper, professional and honest conduct when dealing with the Prospect. Company must respect Prospect&rsquo;s information and keep it confidential. Company should be honest in calculating the Referral fee. Company must not circumvent or misrepresent payments made by the Prospect in any way and is required to pay the Referring party the correct and entire referral fee for any Prospect that has learned about the Company through the Referring Party. It is strictly prohibited to attempt to circumvent the Referring Party. Any attempt will be heavily penalized through a lower ranking in the matching system and therefore will result in less leads and may even result in an increase in Fee Percentage and possibly a removal from the marketplace. </p>

<p>
    <ul>
            <li>a. Disclosure. Upon engaging with the Prospect, the Company is required to share the legal contract and payment terms with the Referring Party.
            </li>
    </ul>
 </p>

<p>7. <strong style="text-decoration:underline;">Trial Period.</strong> It is recommended that the Company provides a trial period with no upfront fees (usually 2 weeks), where Prospects can test out the engagement. If Prospect decides that the Company has not met deadlines, has not delivered work of satisfactory quality or has not properly tested their work during the trial period then the Prospect is not obligated to pay for those weeks and development will stop at the end of the trial period. Otherwise the Prospect will pay for the trial period and development will continue as planned. While this is not required, it is recommended as a trial period and no upfront fees help the Client build trust in the Company.</p>

<p>8. <strong style="text-decoration:underline;">Taxes.</strong> Referring Party shall be responsible for the payment of taxes related to the income received from the Referral Fee.</p>

<p>9. <strong style="text-decoration:underline;">Use of Logo.</strong> Referring Party can include Company logo, and basic information that is included on the Company site or that is revealed through the VenturePact questionnaires on the Referring Party website.</p>

<p><strong style="text-decoration:underline;">10. NonDisclosure.</strong>
<ul>
   <li>a. <strong style="text-decoration:underline;">Definition of Confidential Information.</strong> “Confidential Information” means any oral, written, graphic or machine­readable information, technical data or know­how, including, but not limited to, that which relates to patents, patent applications, research, product plans, products, developments, inventions, processes, designs, drawings, engineering, formulae, markets, software (including source and object code), hardware configuration, computer programs, algorithms, regulatory information, medical reports, clinical data and analysis, reagents, cell lines, biological materials, chemical formulas, business plans, agreements with third parties, services, customers, marketing or finances of Prospect or Referring Party, which Confidential Information is designated in writing to be confidential or proprietary, or if given orally, is confirmed in writing as having been disclosed as confidential or proprietary within a reasonable time (not to exceed thirty (30) days) after the oral disclosure, or which information would, under the circumstances, appear to a reasonable person to be confidential or proprietary.  
</li>

<li>b. <strong style="text-decoration:underline;">Nondisclosure of Confidential Information.</strong> Company agrees not to use any Confidential Information disclosed to it by Prospect or Referring Party for its own use or for any purpose other than to carry out discussions concerning, and the undertaking of, the Relationship. Company shall not disclose or permit disclosure of any Confidential Information of Prospect or Referring Party to third parties or to employees of Company, other than directors, officers, employees, consultants, agents and a select group of service providers of Company who are required to have the information in order to carry out the discussions regarding the Relationship. Company agrees that it shall take reasonable measures to protect the secrecy of and avoid disclosure or use of Confidential Information of Prospect or Referring Party in order to prevent it from falling into the public domain or the possession of persons other than those persons authorized under this Agreement to have any such information. Such measures shall include the degree of care that Company utilizes to protect its own Confidential Information of a similar nature. Company agrees to notify Prospect or Referring Party of any misuse, misappropriation or unauthorized disclosure of Confidential Information of Prospect or Referring Party which may come to Company&rsquo;s attention.<br />
1. <strong style="text-decoration:underline;">Exceptions.</strong> Notwithstanding the above, Company shall not have liability to Prospect or Referring Party with regard to any Confidential Information that the Company can prove:<br />
(i) was in the public domain at the time it was disclosed or has enteredthe public domain through no fault of Company;<br />
(ii) was known to Company, without restriction, at the time of disclosure, as demonstrated by files in existence at the time of disclosure;<br />
(iii) becomes known to Company, without restriction, from a source other than Prospect or Referring Party without breach of this Agreement by Company and otherwise not in violation of Prospect&rsquo;s rights;<br />
(iv) is disclosed with the prior written approval of Prospect; or<br />
(v) is disclosed pursuant to the order or requirement of a court, administrative agency, or other governmental body; provided, however, that Company shall provide prompt notice of such court order or requirement to Prospect or Referring Party to enable Prospect or Referring Party to seek a protective order or otherwise prevent or restrict such disclosure.</li>

<li>c. <strong style="text-decoration:underline;">Return of Materials.</strong> Company agrees, except as otherwise expressly authorized by Prospect or Referring Party, not to make any copies or duplicates of any Confidential Information. Any materials or documents that have been furnished by Prospect or Referring Party to Company in connection with the Relationship shall be promptly returned by Company, accompanied by all copies of such documentation, within ten (10) days after (a) the Relationship has been rejected or concluded or (b) the written request of Prospect or Referring Party.</li>

<li>d. <strong style="text-decoration:underline;">No Rights Granted.</strong> Nothing in this Agreement shall be construed as granting any rights under any patent, copyright or other intellectual property right of Prospect or Referring Party, nor shall this Agreement grant Company any rights in or to Prospect or Referring Party&rsquo;s Confidential Information other than the limited right to review such Confidential Information solely for the purpose of determining whether to enter into the Relationship. Nothing in this Agreement requires the disclosure of any Confidential Information, which shall be disclosed, if at all, solely at Prospect or Referring Party&rsquo;s option. Nothing in this Agreement requires the Prospect or Referring Party to proceed with the Relationship or any transaction in connection with which the Confidential Information may be disclosed.</li>

<li>e. <strong style="text-decoration:underline;">Term.</strong> The foregoing commitments of each party shall survive any termination of the Relationship between the parties, and shall continue for a period terminating on the later to occur of the date (a) five (5) years following the date of this Agreement or (b) three (3) years from the date on which Confidential Information is last disclosed under this Agreement.</li>
<li>f. <strong style="text-decoration:underline;">Severability.</strong> If one or more provisions of this Agreement are held to be unenforceable under applicable law, the parties agree to renegotiate such provision in good faith. In the event that the parties cannot reach a mutually agreeable and enforceable replacement for such provision, then (a) such provision shall be excluded from this Agreement, (b) the balance of the Agreement shall be interpreted as if such provision were so excluded and (c) the balance of the Agreement shall be enforceable in accordance with its terms.</li>

<li>g. Independent Contractors. The parties are independent contractors, and nothing contained in this Agreement shall be construed to constitute the parties as partners, joint venturers, co-owners or otherwise as participants in a joint or common undertaking.</li>
<li>h. <strong style="text-decoration:underline;">Remedies.</strong> Both parties acknowledge that the Confidential Information to be disclosed hereunder is of a unique and valuable character, and that the unauthorized dissemination of the Confidential Information would destroy or diminish the value of such information. The damages to the Prospect and Referring Party that would result from the unauthorized dissemination of the Confidential Information would be impossible to calculate. Therefore, both parties hereby agree that the Prospect and Referring Party shall be entitled to injunctive relief preventing the dissemination of any Confidential Information in violations of the terms in this Agreement. Such injunctive relief shall be in addition to any other remedies available hereunder, whether at law or in equity. The Prospect and Referring Party shall be entitled to recover its costs and fees, including reasonable attorneys&rsquo; fees, incurred in obtaining any such relief including any litigation event.</li>
</ul>


</p>
                                        
<p>11. <strong style="text-decoration:underline;">Termination.</strong> This Referral Agreement will commence upon the date it is signed below and will continue until both parties decide to terminate it. Termination of the Agreement shall not impact the Company&rsquo;s obligation to pay Referring Party the Referral Fee for a Qualifying Transaction registered prior to the termination of the agreement.</p>

<br/>
<br/>

<p >BY CLICKING BELOW BELOW, YOU ACKNOWLEDGE TO HAVE READ, UNDERSTAND AND AGREE TO ALL OF THE TERMS AND CONDITIONS HEREIN CONTAINED.</p>
<div style="width:100%; float:left;"> 
<div style="float:left; width:80%;"><strong>Company</strong></div> <div style="float:right; width:20%;"><strong>Referring Party</strong><br/>  VenturePact LLC</div>

<!--
<div style="float:left; width:80%;"> Signature:</div><div style="float:right; width:20%;"> Signature:</div>

<div style="float:left; width:80%;"> Name:</div><div style="float:right; width:20%;"> Name:</div>

<div style="float:left; width:80%;"> Title:</div> <div style="float:right; width:20%;">Title: </div>
-->

</div>
									</div>
								 </div>
							</div>
						</div>
						<div style="position: absolute; z-index: 1; margin: 0px; padding: 0px; opacity: 0; display: none; left: 100px; top: 582px;">
							<div style="position: relative; height: 353px;" class="enscroll-track track3">
								<a style="position: absolute; z-index: 1; height: 112.058px; top: 0px;" href="" class="handle3">
									<div class="top"></div>
									<div class="bottom"></div>
								</a>
							</div>
						</div>
					</div>
					<div class="modal-footer panel-footer">
						<input type="hidden" name="action" value="approve" />
						<!--<input type="checkbox" name="Suppliers[status]" value="2" id="chkLegal" />-->

				
						<div class="col-sm-12 p0 pr0">
							<div class="col-sm-12 pr0">
								<span class="checkbox custom-checkbox custom-checkbox-inverse pull-left">
									<input type="checkbox" name="Suppliers[status]" id="chkLegal" value="2" required="">
									<label for="chkLegal">&nbsp;&nbsp;By checking here, you agree to the terms and conditions laid out in the Referral Agreement.</label><p></p><p></p>
								</span>						
								<?php //echo CHtml::submit('Accept & Continue',array('name'=>'Submit','class'=>'btn btn-success','id'=>'passButSat')); ?>
							</div>
							<div class="col-sm-3 pr0">
								<input type="submit" id="btnLegal" value="Accept & Continue" class="btn btn-teal col-sm-12"/>
							</div>

						</div>
						<div class="alert alert-success hide" id="repsoneLegal">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							
						</div>
                        <p id="messageResponse"><?php echo Yii::app()->user->getFlash('errorfPass'); ?></p>
					</div>
					
					<?php $this->endWidget(); ?>
				</div><!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!--/ END modal -->
	</section>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
        <i class="ico-angle-up"></i>
    </a>
    <!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->
<!-- 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/firebase.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/firechat.js"></script>
-->
<script type="text/javascript">


			$(".index_checkbox").on('click',function(){

				if($('.index_checkbox').attr('checked')) {
					var pare	=	$(this).parent();
					pare.removeClass('cross_text_try');
					//$(".cross_text_try").css({"color":"#ccc",});//"background":"#efefef","padding-right":"18px"
				} else {
					var pare	=	$(this).parent();

                    pare.addClass('cross_text_try');
					//$(".cross_text_try").css({"color":"#333"});//"background":"none","padding-right":"0"
				}

			});
			
			$('.btn-toggle').click(function() {

				$(this).find('.btn').toggleClass('btn-default');

			});

			$('form').submit(function(){
				//alert($(this["options"]).val());
				//return true;
			});
        </script>
<script>

    $(document).ready(function(){
		var legal_form= $("#legal-form").parsley();
       // var legal_form= $("#legal-form").parsley();
		/* $("#btnLegal").on("click",function(){
			var elem	=	$('#chkLegal');
			var ErrID	=	elem.attr('data-parsley-id')
			console.log("submitting" + elem.attr("checked"));
			if(typeof elem.attr("checked") !== 'undefined'){
				console.log("Sending request");
				$('#parsley-id-multiple-Suppliersstatus,#parsley-id-'+ErrID).html('');
				$('#parsley-id-multiple-Suppliersstatus,#parsley-id-'+ErrID).removeClass('parsley-errors-list filled');
				$('#btnLegal').attr('disabled','disabled');
				$.ajax({
					type: 'POST',
					url:"<?php echo CController::createUrl('/supplier/updateLegalStatus'); ?>",
					data:$("#legal-form").serialize(),
					success :function(data){
						console.log(JSON.stringify(data));
						var response = JSON.parse(data);
						if(response.iserror == false){
							$("#repsoneLegal").removeClass("hide");
							$("#messageResponse").html(response.success);

						}
						else{
							elem.val('');
							$('#messageResponse').html(response.message);
							$('#repsoneRest').show();
							$('#repsoneRest').removeClass('hide');
							var ErrID	=	elem.attr('data-parsley-id')
							$('#parsley-id-satn-'+ErrID).html('');
						}

					}
				});
			}
			else{
				elem.addClass('parsley-error');

				$('#parsley-id-multiple-Suppliersstatus,#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Agree to terms.</li>');
				$('#parsley-id-multiple-Suppliersstatus,#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				console.log("Invalid form");
			}
			return true;
		}); */
});

    $(document).ready(function()
    {
        //btnProfile
        $("#btnProfile").on("click",function(){
            $("#nav li:nth(1)").addClass("open");
            $("#nav li:nth(1) ul").addClass("in");
            var id = $("#components li:nth(0) a").attr("id");
			console.log("finsishes all tasks" +id);
			$("#"+id).trigger("click");

        });
        $(".project").on('click',function(){
			
			window.location.href= $(this).find(".projectName").attr("href");
		});
        var resource;
        if(window.location.hostname=='localhost')
        {
            resource="https://incandescent-fire-5373.firebaseio.com/chat";// local api
        }
        else
        {
            resource="https://venturepact.firebaseio.com/chat"; //server api
        }

        var chat_ref=new Firebase(resource);
        var chat=new Firechat(chat_ref);

        //var token = "<?php echo $token; ?>";
        
       /* 
        chat_ref.auth(token,function(e,u)
        {
            if(e) //if something went wrong
            {
                console.log(e);
            }
            else //successful login
            {
                console.log('user authenticated');
                console.log(u);
                //for each project
                $('.project').each(function(i,e)
                {
            
                    var $project=$(this);
                
                    var room=$project.data('room');
                    console.log(room);
                    if(room)
                    {
                        var ot;
                        chat_ref.child("room-users")
                                .child(room)
                                .child('<?php echo yii::app()->user->id ?>')
                                .once('value',function(s)
                                {
                                    ot=s.val().offline_time; //offline time
                                    console.log(ot);
                                    if(ot)
                                    {

                                        console.log(room);
                                       chat._messageRef.child(room)
                                                       .startAt(ot)
                                                       .on('value',function(s1)
                                                       {
                                                            $project.find('.number>.label').html(s1.numChildren());
                                                       });
                                    }
                               });
                    }
                });
            }
        });
		*/
		
    });
</script>


