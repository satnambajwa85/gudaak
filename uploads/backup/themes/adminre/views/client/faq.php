<section class="container-fluid">
	
    <!-- Page Header -->
    <div class="page-header page-header-block pb0 pt0 mt0">
        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
				<li class="text-info">Proposal</li>
                <li class="active">Frequently asked question</li>
               
            </ol>
           
        </div>
    </div>
    <!--/ Page Header -->
                <!-- START row -->
                <div class="row mb30">
                	<!-- Start Faq -->
                    <div class="col-lg-6">
                        <div class="col-sm-12">
                            <!-- section header -->
                            <div class="section-header mb15">
                                <h5 class="semibold">About the Service Provider</h5>
                            </div>
                            <!--/ section header -->
                            <!-- panel group -->
                            <div class="panel-group panel-group-compact" id="accordion1">
                                <?php if(isset($question['About']))
								foreach($question['About'] as $key=>$item){?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title panel-title_new">
                                            <a data-toggle="collapse" data-parent="#accordion-s<?php echo $key;?>" href="#collapse-s<?php echo $key;?>" class="collapsed">
                                                <span class="plus mr5 plus_new"></span> <?php echo $item;?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-s<?php echo $key;?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo (isset($answer[$key]))?$answer[$key]:'Not Answered';?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                           
                            </div>
                            <!--/ panel group -->
                        </div>
                        <div class="col-sm-12">
                            <!-- section header -->
                            <div class="section-header mb15">
                                <h5 class="semibold">Terms</h5>
                            </div>
                            <!--/ section header -->
                            <!-- panel group -->
                            <div class="panel-group panel-group-compact" id="accordion3">
                                <?php 
								if(isset($question['Terms']))
								foreach($question['Terms'] as $key=>$item){?> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title panel-title_new">
                                            <a data-toggle="collapse" data-parent="#accordion-s<?php echo $key;?>" href="#collapse-s<?php echo $key;?>" class="collapsed">
                                                <span class="plus mr5 plus_new"></span> <?php echo $item;?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-s<?php echo $key;?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo (isset($answer[$key]))?$answer[$key]:'Not Answered';?>
                                        </div>
                                    </div>
                                </div>
								<?php } ?>                             
                            </div>
                            <!--/ panel group -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                    	<div class="col-sm-12">
                            <!-- section header -->
                            <div class="section-header mb15">
                                <h5 class="semibold">Development Process</h5>
                            </div>
                            <!--/ section header -->
                            <!-- panel group -->
                            <div class="panel-group panel-group-compact" id="accordion2">
                            <?php 
							if(isset($question['Process']))
							foreach($question['Process'] as $key=>$item){?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title panel-title_new">
                                            <a data-toggle="collapse" data-parent="#accordion-s<?php echo $key;?>" href="#collapse-s<?php echo $key;?>" class="collapsed">
                                                <span class="plus mr5 plus_new"></span> <?php echo $item;?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-s<?php echo $key;?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo (isset($answer[$key]))?$answer[$key]:'Not Answered';?>
                                        </div>
                                    </div>
                                </div>
                              <?php } ?>
                              
                            </div>
                            <!--/ panel group -->
                        </div>
                        <div class="col-sm-12">
                            <!-- section header -->
                            <div class="section-header mb15">
                                <h5 class="semibold">Payments</h5>
                            </div>
                            <!--/ section header -->
                            <!-- panel group -->
                            <div class="panel-group panel-group-compact" id="accordion4">
                            <?php 
							if(isset($question['Payment']))
							foreach($question['Payment'] as $key=>$item){?>
                            	<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title panel-title_new">
                                            <a data-toggle="collapse" data-parent="#accordion-s<?php echo $key;?>" href="#collapse-s<?php echo $key;?>" class="collapsed">
                                                <span class="plus mr5 plus_new"></span> <?php echo $item;?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-s<?php echo $key;?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo (isset($answer[$key]))?$answer[$key]:'Not Answered';?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                            <!--/ panel group -->
                        </div>
                    </div>
                    <!--/ End Faq -->
                </div>
                <!--/ END row -->
                
            </section>
