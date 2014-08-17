<!-- START Jumbotron -->
<div class="jumbotron">
    <!-- info -->
    <div class="info bottom">
        <div class="col-md-4">
            <ul class="list-table">
                <li class="text-left" style="width:90px;">
                    <img width="80px" height="80px" class="img-circle mt10" src="<?php echo (isset($details->suppliers->logo))?$details->suppliers->logo:'';?>" alt="">
                </li>
                <li class="text-left">
                    <h4 class="semibold ellipsis nm mb5"><?php echo (isset($details->suppliers->name))?$details->suppliers->name:'';?></h4>
                    <p class="ellipsis nm"><i class="ico-users text-white mr5"></i> <?php echo (isset($details->suppliers->number_of_employee))?$details->suppliers->number_of_employee:'';?> employees</p>
                    <p class="ellipsis nm"><i class="ico-calendar text-white mr5"></i> Joined in <?php echo (isset($details->suppliers->foundation_year))?$details->suppliers->foundation_year:'';?></p>
                    <p class="ellipsis nm"><i class="ico-location  text-white mr5"></i> Lives in <?php echo (isset($details->suppliers->cities->name))?$details->suppliers->cities->name:''?></p>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="minicart col-md-4 pull-right">
                <a class="cart-contents" href="" title="View your shopping cart">
                    <span class="ico-question pl15 pr15 text-white" aria-hidden="true"></span>
                    <span class="mini-cart-contents">
                        Award Project<span class="mini-cart-total"><span class="amount"></span></span></span>
                    <span class="ico-checkmark3 pl5 pr5 text-white" aria-hidden="true"></span>
                </a>
            </div>
            
        </div>
    </div>
    <!--/ info -->
    <!-- media : make sure that media image is 1280px width -->
    <div class="media">
        <img alt="Cover photo" data-src="<?php echo (isset($details->suppliers->cover))?$details->suppliers->cover:'';?>" src="<?php echo (isset($details->suppliers->cover))?$details->suppliers->cover:'';?>" data-toggle="unveil" class="unveiled">
    </div>
    <!--/ media -->
</div>
<!--/ END Jumbotron -->

<!-- START Template Container -->
<section class="container-fluid">
    <!-- START Table Layout -->
    <div class="row">
        <!-- Left Side / Top side -->
        <div class="col-md-8">
            <div class="row">
                <!-- 1/2 Grid -->
                <div class="col-md-12">
                    <div class="panel">
                        <div class="pa15 hidden-xs">
                            <ul class="nav nav-section nav-justified">
                                
                                <li>
                                    <div class="section">
                                        <h4 class="bold text-primary mt0 mb5" style="font-size:14px;"><?php echo (isset($details->estimated_cost))?$details->estimated_cost:'';?></h4>
                                        <p class="nm text-muted">
                                            <span class="semibold" style="font-size:12x;">Budget <i class="ico-info-sign" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Enter Text for Budget details"  style="cursor:pointer;"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="section">
                                        <h4 class="bold text-success mt0 mb5" style="font-size:14px;"><?php echo (isset($details->add_date))?date('d, M',strtotime($details->add_date)):'';?></h4>
                                        <p class="nm text-muted">
                                            <span class="semibold">Start Date</span>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="section">
                                        <h4 class="bold text-warning mt0 mb5" style="font-size:14px;"><?php echo (isset($details->time_estimation))?$details->time_estimation:'';?></h4>
                                        <p class="nm text-muted">
                                            <span class="semibold">Timeline</span>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="section">
                                        <h4 class="bold text-danger mt0 mb5" style="font-size:14px;"><?php echo (isset($details->others))?$details->others:'';?></h4>
                                        <p class="nm text-muted">
                                            <span class="semibold">Trial</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ 1/2 Grid -->
                <div class="col-lg-6">
                
                    <div class="panel">
                        <hr class="nm"><!-- horizontal line -->
                        <!-- Panel body -->
                        <div class="panel-body"> 
                        <div id="scrollbox4">
                            <h5 class="semibold mb5 mt0 text-success">Dear Client </h5>
                            
                            <br/>
                            <h5 class="semibold mb5 mt0 ">About the company </h5>
                            <p class="nm">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
                            </p>
                            <br/>
                            <h5 class="semibold mb5 mt0 " style="line-height:20px;">Why us?
</h5>
                            <p class="nm">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            </p>
                            <br/>
                            <h5 class="semibold mb5 mt0 ">How will you go about this engagement?</h5>
</h5>
                            <p class="nm">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt  
                            </p>
                            <br/>
                              <h5 class="semibold mb5 mt0 ">Assumptions made</h5>
</h5>
                            <p class="nm">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt  
                            </p>
                            <br/>
                              <h5 class="semibold mb5 mt0 ">How will you go about this engagement?</h5>
</h5>
                            <p class="nm">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt  
                            </p>
                            <br/>
                              <h5 class="semibold mb5 mt0 ">Pricing details</h5>
</h5>
                            <p class="nm">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt  
                            </p>
                            <br/>
                             <h5 class="semibold mb5 mt0 ">Any questions ?</h5>
</h5>
                            <p class="nm">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt  
                            </p>
                            <br/>
                            
                            <!--attachment sa-->
                            <div class="content-attachment">
                                <h5 class="semibold mt0 mb15">Attachment <span class="text-muted">(3 attachment, 2.4 MB)</span></h5>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="label label-success">HTML</span> file.html (1.2 MB)
                                            </td>
                                            <td width="6%"><a href="javascript:void(0);">View</a></td>
                                            <td width="6%"><a href="javascript:void(0);">Download</a></td>
                                        </tr>
                                     <!--   <tr>
                                            <td>
                                                <span class="label label-primary">CSS</span> file.css (1.2 MB)
                                            </td>
                                            <td width="6%"><a href="javascript:void(0);">View</a></td>
                                            <td width="6%"><a href="javascript:void(0);">Download</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-danger">PHP</span> file.php (1.2 MB)
                                            </td>
                                            <td width="6%"><a href="javascript:void(0);">View</a></td>
                                            <td width="6%"><a href="javascript:void(0);">Download</a></td>
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>
                            <!--attachment sa-->
                            </div>
                        </div>
                        <!--/ Panel body -->
                        <hr class="nm"><!-- horizontal line -->
                        
                        <hr class="nm"><!-- horizontal line -->
                        
                    </div>
                    <div class="panel">
                        <!-- User info -->
                        <ul class="list-table pa15">
                            <li class="text-left">
                                <p class="ellipsis nm semibold">Custom Questions</p>
                            </li>
                        </ul>
                        <!--/ User info -->
                        <hr class="nm"><!-- horizontal line -->
                        
                        <!-- Comment list -->
                        <div class="panel-group panel-group-compact" id="accordion2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne1" class="collapsed" style="font-size:10px;">
                                        Ques. Are there any questions that you want to ask the companies who would bid for your project? 
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne1" class="panel-collapse collapse in">
                                <div class="panel-body" style="font-size:10px;">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" class="collapsed" style="font-size:10px;">
                                        Ques. What is the business problem that you are trying to solve?*
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo2" class="panel-collapse collapse">
                                <div class="panel-body" style="font-size:10px;">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree3" class="collapsed" style="font-size:10px;">
                                        Ques. What industry does your company fall under?
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree3" class="panel-collapse collapse">
                                <div class="panel-body" style="font-size:10px;">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--/ Comment list -->
                        <hr class="nm"><!-- horizontal line -->
                        <!-- Comment box -->
                        
                        <!--/ Comment box -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pannel">
                        <!-- tab -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#popular">Ratings</a></li>
                            <li class=""><a data-toggle="tab" href="#comments">Reviews</a></li>
                        </ul>
                        <!--/ tab -->
                        <!-- tab content -->
                        <div class="tab-content panel">
                            <div id="popular" class="tab-pane active">
                                <!-- Media list -->
                                <div class="media-list">
                                    <div class="media-body">
                                        <p class="media-heading">Rating Summary</p>
                                        <div class="col-lg-12 pl0 mt10 pr0">
                                            <div class="progress progress-xs nm col-lg-6 pl0 pr0">
                                                <div style="width: 60%" class="progress-bar progress-bar-warning"></div>
                                            </div>
                                            <h4 style="font-size:12px;" class="semibold col-lg-6 mt0 mb0">3.5 / 5</h4>
                                            <p style="font-size:10px" class="media-text"><b>40</b> out of <b>100</b> (91%) customers recommended this project </p>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead></thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="media-text">Communication & Transparency</p>
                                                    <div class="progress progress-xs nm">
                                                        <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="media-text">Technical skill</p>
                                                    <div class="progress progress-xs nm">
                                                        <div class="progress-bar progress-bar-warning" style="width: 90%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="media-text">Adherence to timelines</p>
                                                    <div class="progress progress-xs nm">
                                                        <div class="progress-bar progress-bar-warning" style="width: 40%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="media-text">Independence</p>
                                                    <div class="progress progress-xs nm">
                                                        <div class="progress-bar progress-bar-warning" style="width: 90%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--/ Message list -->
                            </div>
                            <div id="comments" class="tab-pane">
                                <div id="scrollbox3">
                                    <!-- Message list -->
                                    <div class="media-list mt10 ml5">
                                        <ul class="list-table">
                                            <li style="width:50px;">
                                                <img width="45px" height="45px" alt="" src="image/avatar/avatar9.jpg" class="img-circle img-bordered-primary">
                                            </li>
                                            <li class="text-left">
                                                <h5 class="semibold ellipsis nm">Riewers Name</h5>
                                                <p class="text-muted nm">Company Name</p>
                                                <p class="text-muted nm" style="font-size:11px;">12/12/2012</p>
                                            </li>
                                        </ul><br/>
                                        <hr class="mt0">
                                        <div id="accordion2" class="panel-group panel-group-compact">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a style="font-size:10px;" class="collapsed" href="#collapseOne1" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. Are there any questions that you want to ask the companies who would bid for your project? 
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse in" id="collapseOne1">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">


                                                        <a style="font-size:10px;" class="collapsed" href="#collapseTwo2" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. What is the business problem that you are trying to solve?*
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse" id="collapseTwo2">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a style="font-size:10px;" class="collapsed" href="#collapseThree3" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. What industry does your company fall under?
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse" id="collapseThree3">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
    
                                        
                                    </div>
                                    <div class="media-list  mt10 ml5">
                                        <ul class="list-table">
                                            <li style="width:50px;">
                                                <img width="45px" height="45px" alt="" src="image/avatar/avatar7.jpg" class="img-circle img-bordered-primary">
                                            </li>
                                            <li class="text-left">
                                                <h5 class="semibold ellipsis nm">Riewers Name</h5>
                                                <p class="text-muted nm">Company Name</p>
                                                <p class="text-muted nm" style="font-size:11px;">12/12/2012</p>
                                            </li>
                                        </ul><br/>
                                        <hr class="mt0">
                                        <div id="accordion2" class="panel-group panel-group-compact">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a style="font-size:10px;" class="collapsed" href="#collapseOne1" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. Are there any questions that you want to ask the companies who would bid for your project? 
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse in" id="collapseOne1">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a style="font-size:10px;" class="collapsed" href="#collapseTwo2" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. What is the business problem that you are trying to solve?*
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse" id="collapseTwo2">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a style="font-size:10px;" class="collapsed" href="#collapseThree3" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. What industry does your company fall under?
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse" id="collapseThree3">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
    
                                        
                                    </div>
                                    <div class="media-list  mt10 ml5">
                                        <ul class="list-table">
                                            <li style="width:50px;">
                                                <img width="45px" height="45px" alt="" src="image/avatar/avatar7.jpg" class="img-circle img-bordered-primary">
                                            </li>
                                            <li class="text-left">
                                               <h5 class="semibold ellipsis nm">Riewers Name</h5>
                                                <p class="text-muted nm">Company Name</p>
                                                <p class="text-muted nm" style="font-size:11px;">12/12/2012</p>
                                            </li>
                                        </ul><br/>
                                        <hr class="mt0">
                                        <div id="accordion2" class="panel-group panel-group-compact">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a style="font-size:10px;" class="collapsed" href="#collapseOne1" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. Are there any questions that you want to ask the companies who would bid for your project? 
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse in" id="collapseOne1">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a style="font-size:10px;" class="collapsed" href="#collapseTwo2" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. What is the business problem that you are trying to solve?*
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse" id="collapseTwo2">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a style="font-size:10px;" class="collapsed" href="#collapseThree3" data-parent="#accordion2" data-toggle="collapse">
                                                            Ques. What industry does your company fall under?
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="panel-collapse collapse" id="collapseThree3">
                                                    <div style="font-size:10px;" class="panel-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
    
                                        
                                    </div>
                                    <!--/ Message list -->
                                </div>
                            </div>
                        </div>
                        <!--/ tab content -->
                    </div>
                    <div class="panel">
                        <!-- User info -->
                        <ul class="list-table pa15">
                            
                            <li class="text-left">
                                <p class="ellipsis nm semibold">The Team</p>
                            </li>
                        </ul>
                        <!--/ User info -->
                        <hr class="nm"><!-- horizontal line -->
                        
                        <!-- horizontal line -->
                        <!-- Toolbar -->
                        
                        <!--/ Toolbar -->
                        <!-- Comment list -->
                        <ul class="media-list">
                            <li class="media border-dotted">
                              
                                <div class="media-body">
                                    <p class="media-heading">Arthur Abbott</p>
                                    <p class="media-text">Lorem ipsum dolor sit amet, consectetur.</p>
                                </div>
                            </li>
                            <li class="media border-dotted">
                                <div class="media-body">
                                    <p class="media-heading">Martina Poole</p>
                                    <p class="media-text">Lorem ipsum dolor sit amet, consectetur.</p>
                                </div>
                            </li>
                            <li class="media border-dotted">
                                <div class="media-body">
                                    <p class="media-heading">Elvis Christensen</p>
                                    <p class="media-text">Duis aute irure dolor in reprehenderit.</p>
                                </div>
                            </li>
                        </ul>
                        <!--/ Comment list -->
                        <hr class="nm"><!-- horizontal line -->
                        <!-- Comment box -->
                        
                        <!--/ Comment box -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ Left Side / Top side -->

        <!-- Right Side / Bottom side  Chatting panel -->
			<div class="col-md-4">
				 <div id="chat-box" class="table-layout">
                    <div class="col-lg-5 valign-top panel panel-default">
                        <!-- panel heading -->
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <i class="ico-circle mr5"></i>
                                <span class="name"><?php  echo ((isset($project->suppliers->first_name))?$project->suppliers->first_name:'')." ".(isset($project->suppliers->last_name))?$details->suppliers->last_name:''; ?></span>
                                <input type="hidden" id="otheruserpic" value="<?php echo (strpos($imag,'avatar.png'))?Yii::app()->baseUrl.'/uploads/client/small/avatar.png':$project->clientProjects->clientProfiles->image;?>" />

                                <span class="badge pull-right"></span>
                            </h5>
                        </div>
						
                        <div class="panel-body np pl15 pb5">
                            <!-- message list -->
                            <ul class="media-list media-list-bubble clearfix" style="height;200px !important;overflow:auto"></ul>
                            <!--/ message list -->
                            <div class="status">
                                <i><?php  echo (isset($project->suppliers->first_name))?$project->suppliers->first_name:''." ".(isset($project->suppliers->last_name))?$project->suppliers->last_name:''; ?> is offline</i>
                            </div>
                            
                        </div>

                        <div class="panel-footer">
                            <!--write box-->
                            <div class="panel-toolbar-wrapper">
                                <div class="panel-toolbar">
                                    <div class="input-group" style="width:100%;">
                                        <input type="text" class="form-control message" placeholder="Type your message">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary send" type="button"><i class="ico-paper-plane"></i> <span class="semibold">Send</span></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt10 mb10"><!-- horizontal line -->

                            <div class="panel-toolbar-wrapper">
                                <div class="panel-toolbar">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-default"><i class="ico-google-drive"></i></button>
                                        <button type="button" class="btn btn-default"><i class="ico-instagram"></i></button> -->
                                        <button type="button" class="btn btn-default"><i class="ico-facetime-video"></i></button>
                                    </div>
                                </div>

                                <div class="panel-toolbar text-right">
                                    <a href="javascript:void(0);" class="btn btn-default"><i class="ico-attachment"></i> Attach files</a>
                                </div>
                            </div>
                        </div>
                        <!-- panel footer -->
                    </div>
                </div>
			</div>
    </div>
    <!--/ END Table Layout -->
</section>
<!--/ END Template Container -->



<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/firebase.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/firechat.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/cchat.js"></script>


<script type="text/javascript">

$(document).ready(function(){
    console.log("chating startesd");
	var token 		= "<?php echo $token; ?>";
	var clientid 	= "<?php echo (isset($project->suppliers->id))?$project->suppliers->id:'0'; ?>";
	var purposalId 	= "<?php echo $project->id; ?>";
	var clientname	= "<?php echo $project->suppliers->first_name.''.$project->suppliers->last_name; ?>";
	var roomurl= "<?php echo CController::createUrl('/supplier/ajaxChatHandler'); ?>";
	var data= {
		id : clientid,
		name : clientname
	};
	chat_init(token,data,roomurl,purposalId);
		
	});
</script>
