<!DOCTYPE html>
<!-- 
TEMPLATE NAME : Adminre - Responsive Admin Template build with Twitter Bootstrap 3.1.1
CURRENT VERSION : 1.0.0
AUTHOR : pampersdry
CONTACT : pampersdry@gmail.com

** A license must be purchased in order to legally use this template for your project **
** PLEASE SUPPORT ME. YOUR SUPPORT ENSURE CONTINUITY OF THIS PROJECT **
-->
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Venturepact</title>
        <meta name="description" content="Adminre admin dashboard">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="image/touch/apple-touch-icon.png">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Library stylesheet : mandatory -->
        <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="library/jquery/css/jquery-ui.min.css">
        <!--/ Library stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="stylesheet/layout.css">
        <link rel="stylesheet" href="stylesheet/uielement.css">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->

        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->
    <body data-page="form-wizard">
        <!-- START Template Header -->
        <header id="header" class="navbar navbar-fixed-top">
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <a class="navbar-brand" href="index.html">
                    <span class="template-logo"></span>
                </a>
                <!--/ Brand -->
            </div>
            <!--/ END navbar header -->

            <!-- START Toolbar -->
            <div class="navbar-toolbar clearfix">
                <!-- START Left nav -->
                <ul class="nav navbar-nav navbar-left">
                    <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main hidden-lg hidden-md">
                        <a href="javascript:void(0);" data-toggle="offcanvas" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-left3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas left -->

                    <!-- Message dropdown -->
                    <li class="dropdown custom">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bubbles2"></i></span>
                            </span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Messages</span>
                                <span class="option text-right"><a href="javascript:void(0);">New message</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- Search form -->
                                <form class="form-horizontal" action="">
                                    <div class="has-icon">
                                        <input type="text" class="form-control" placeholder="Search message...">
                                        <i class="ico-search form-control-icon"></i>
                                    </div>
                                </form>
                                <!--/ Search form -->

                                <!-- Message list -->
                                <div class="media-list">
                                    <a href="page-message-rich.html" class="media border-dotted">
                                        <span class="pull-left">
                                            <img src="image/avatar/avatar6.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Arthur Abbott </span>
                                            <span class="media-text ellipsis nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-star6"></i></span>
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">2m</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="image/avatar/avatar1.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Martina Poole</span>
                                            <span class="media-text ellipsis nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-reply"></i></span>
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">20m</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted">
                                        <span class="pull-left">
                                            <img src="image/avatar/avatar2.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Elvis Christensen</span>
                                            <span class="media-text ellipsis nm">Duis aute irure dolor in reprehenderit in voluptate velit esse.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">5h</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="image/avatar/avatar3.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Walter Foster</span>
                                            <span class="media-text ellipsis nm">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">21h</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="image/avatar/avatar4.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Callum Santosr</span>
                                            <span class="media-text ellipsis nm">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">1d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="image/avatar/avatar5.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Noelani Blevins</span>
                                            <span class="media-text ellipsis nm">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">2d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="image/avatar/avatar8.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Carl Johnson</span>
                                            <span class="media-text ellipsis nm">Curabitur consequat, lectus sit amet luctus vulputate, nisi sem</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">2w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="image/avatar/avatar9.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Tamara Moon</span>
                                            <span class="media-text ellipsis nm">Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">2w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>
                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Message dropdown -->

                    <!-- Notification dropdown -->
                    <li class="dropdown custom">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bell"></i></span>
                                <span class="hasnotification hasnotification-danger"></span>
                            </span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Notification (5)</span>
                                <span class="option text-right"><a href="javascript:void(0);">Clear all</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- Message list -->
                                <div class="media-list">
                                    <a href="javascript:void(0);" class="media border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-instagram2 bgcolor-teal"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Lorem ipsum <span class="text-primary semibold">dolor sit</span> amet, consectetur adipisicing elit.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">2m</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-queen"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Ut <span class="text-primary semibold">enim</span> ad minim veniam, aliquip ex ea commodo.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">10m</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-file-check bgcolor-success"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Excepteur sint <span class="text-primary semibold">occaecat cupidatat</span> non laborum.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">1d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-basket2 bgcolor-info"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Duis aute irure dolor in <span class="text-primary semibold">reprehenderit</span> in voluptate.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">2d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-call-incoming"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Aliquip ex ea commodo consequat.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">1w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-alarm2"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Excepteur sint <span class="text-primary semibold">occaecat</span> cupidatat non.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">12w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-checkmark3 bgcolor-success"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Lorem ipsum dolor sit amet, <span class="text-primary semibold">consectetur</span> adipisicing elit.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">14w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>
                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Notification dropdown -->

                    <!-- Search form toggler  -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="dropdown" data-target="#dropdown-form">
                            <span class="meta">
                                <span class="icon"><i class="ico-search"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Search form toggler -->
                </ul>
                <!--/ END Left nav -->

                <!-- START navbar form -->
                <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                    <form action="" role="search">
                        <div class="has-icon">
                            <input type="text" class="form-control" placeholder="Search application...">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                    </form>
                </div>
                <!-- START navbar form -->

                <!-- START Right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Profile dropdown -->
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="avatar"><img src="image/avatar/avatar7.jpg" class="img-circle" alt="" /></span>
                                <span class="text hidden-xs hidden-sm">Erich Reyes</span>
                                <span class="arrow"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="pa15">
                                <h5 class="semibold hidden-xs hidden-sm">
                                    60% <br/>
                                    <small class="text-muted">Profile complete</small>
                                </h5>
                                <h5 class="semibold hidden-md hidden-lg">
                                    Erich Reyes<br/>
                                    <small class="text-muted">60% Profile complete</small>
                                </h5>
                                <div class="progress progress-xs nm mt10">
                                    <div class="progress-bar progress-bar-warning" style="width: 60%">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-user-plus2"></i></span> My Accounts</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-cog4"></i></span> Profile Setting</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-exit"></i></span> Sign Out</a></li>
                        </ul>
                    </li>
                    <!--/ Profile dropdown -->

                    <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main">
                        <a href="javascript:void(0);" data-toggle="offcanvas" data-direction="rtl" rel="tooltip" title="Feed / contact sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-users3"></i></span>
                                <span class="hasnotification hasnotification-danger"></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas right -->
                </ul>
                <!--/ END Right nav -->
            </div>
            <!--/ END Toolbar / link -->
        </header>
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
        <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <!-- START Template Navigation/Menu -->
                <ul id="nav" class="topmenu">
                   <!-- <li class="menuheader">MAIN MENU</li>-->
                    <li >
                        <a href="index.html">
                            <span class="figure"><i class="ico-home2"></i></span>
                            <span class="text">Dashboard</span>
                            <span class="number"><span class="label label-danger">5</span></span>
                        </a>
                    </li>
                    <li class="menuheader">Project 1</li>
                    <li class="active open">
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#Scope" data-parent="#nav">
                            <span class="figure"><i class="ico-lightbulb"></i></span>
                            <span class="text">Scope</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="Scope" class="submenu collapse in">
                            <li class="active">
                                <a href="basic.html" data-toggle="submenu" data-target="#scope" data-parent="#project1">
                                    <span class="text">Basic</span>
                                </a>
                            </li>
                            <li>
                                <a href="progress.html">
                                    <span class="text">Progress</span>
                                </a>
                            </li>
                            <li>
                                <a href="product_scope.html">
                                    <span class="text">Product Scope</span>
                                </a>
                            </li>
                            <li>
                                <a href="budget.html">
                                    <span class="text">Budget</span>
                                </a>
                            </li>
                            <li>
                                <a href="preferences.html">
                                    <span class="text">Preferences</span>
                                </a>
                            </li>
                            <li>
                                <a href="company.html">
                                    <span class="text">Company</span>
                                </a>
                            </li>
                            <li>

                                <a href="custom_questions.html">
                                    <span class="text">Custom Questions</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#Proposal" data-parent="#nav">
                            <span class="figure"><i class="ico-file6"></i></span>
                            <span class="text">Proposal</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="Proposal" class="submenu collapse">
                            <li class="active">
                                <a href="basic.html" data-toggle="submenu" data-target="#scope" data-parent="#project1">
                                    <span class="text">Company 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Company 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Company 3</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Company 4</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment" data-parent="#nav">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Payment</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="payment" class="submenu collapse">
                            <li class="active">
                                <a href="basic.html" data-toggle="submenu" data-target="#scope" data-parent="#project1">
                                    <span class="text">Legal</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Help</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li class="menuheader">Project 2</li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#Scope2" data-parent="#nav">
                            <span class="figure"><i class="ico-lightbulb"></i></span>
                            <span class="text">Scope</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="Scope2" class="submenu collapse">
                            <li class="active">
                                <a href="basic.html" data-toggle="submenu" data-target="#scope" data-parent="#project1">
                                    <span class="text">Basic</span>
                                </a>
                            </li>
                            <li>
                                <a href="progress.html">
                                    <span class="text">Progress</span>
                                </a>
                            </li>
                            <li>
                                <a href="product_scope.html">
                                    <span class="text">Product Scope</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Budget</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Preferences</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Company</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Custom Questions</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#Proposal2" data-parent="#nav">
                            <span class="figure"><i class="ico-file6"></i></span>
                            <span class="text">Proposal</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="Proposal2" class="submenu collapse">
                            <li class="active">
                                <a href="basic.html" data-toggle="submenu" data-target="#scope" data-parent="#project1">
                                    <span class="text">Company 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Company 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Company 3</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Company 4</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#payment2" data-parent="#nav">
                            <span class="figure"><i class="ico-dollar"></i></span>
                            <span class="text">Payment</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="payment2" class="submenu collapse">
                            <li class="active">
                                <a href="basic.html" data-toggle="submenu" data-target="#scope" data-parent="#project1">
                                    <span class="text">Legal</span>
                                </a>
                            </li>
                            <li>
                                <a href="basic.html">
                                    <span class="text">Help</span> 
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    
                </ul>
                <!--/ END Template Navigation/Menu -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <section class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Scope Basic <!--sandeep--></h4>
                    </div>
                </div>
                <!--/ Page Header -->
                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">
                            <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Basic</h3>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                            <div class="panel-body">
                                <form class=" panel-default form-horizontal form-bordered " action="" data-parsley-validate>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Project name? <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text"  class="form-control " name="required" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Please summarize your need briefly <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                           <textarea class="form-control" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Q. What is the business problem that you are trying to solve? <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Q. What industry does your company fall under?</label>
                                        <div class="col-sm-9">
                                            <span class="checkbox custom-checkbox ">
                                                <input type="checkbox" name="customcheckbox1" id="customcheckbox1" />
                                                <label for="customcheckbox1">&nbsp;&nbsp;Ecommercer.</label>
                                            </span>
                                            <span class="checkbox custom-checkbox">
                                                <input type="checkbox" name="customcheckbox2" id="customcheckbox2" />
                                                <label for="customcheckbox2">&nbsp;&nbsp;Healthcare.</label>
                                            </span>
                                            <span class="checkbox custom-checkbox">
                                                <input type="checkbox" name="customcheckbox3" id="customcheckbox3" />
                                                <label for="customcheckbox3">&nbsp;&nbsp;Other.</label>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Q. What all do you need done? (Check all that apply)</label>
                                        <div class="col-sm-9">
                                            <span class="checkbox custom-checkbox ">
                                                <input type="checkbox" name="customcheckbox4" id="customcheckbox4" />
                                                <label for="customcheckbox4">&nbsp;&nbsp;Ecommercer.</label>
                                            </span>
                                            <span class="checkbox custom-checkbox">
                                                <input type="checkbox" name="customcheckbox5" id="customcheckbox5" />
                                                <label for="customcheckbox5">&nbsp;&nbsp;Healthcare.</label>
                                            </span>
                                            <span class="checkbox custom-checkbox">
                                                <input type="checkbox" name="customcheckbox6" id="customcheckbox6" />
                                                <label for="customcheckbox6">&nbsp;&nbsp;Other.</label>
                                            </span>
                                        </div>
                                    </div>
                                    
                                 
                                   <div class="panel-footer">
                                        <div class="form-group no-border">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary">Save & Next</button>
                                                <button type="reset" class="btn btn-danger">Reset button</button>
                                            </div>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                            <!-- panel body -->
                        </div>
                    </div>
                </div>
                <!--/ END row -->
                
            </section>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
        <aside class="sidebar sidebar-right">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <!-- START Sidebar Profile -->
                <!-- START Panel -->
                <div class="panel">
                    <!-- thumbnail -->
                    <div class="thumbnail">
                        <!-- media -->
                        <div class="media">
                            <!-- meta -->
                            <span class="meta text-center">
                                <h5 class="semibold mb0">Erich Reyes</h5>
                                <p class="nm"><i class="ico-user7 mr5"></i>Administrator</p>
                            </span>
                            <!-- meta -->
                            <!-- indicator -->
                            <div class="indicator"><span class="spinner"></span></div>
                            <!--/ indicator -->
                            <img data-toggle="unveil" src="image/background/400x250/placeholder.jpg" data-src="image/background/400x250/background3.jpg" alt="Cover" width="100%">
                        </div>
                        <!--/ media -->
                    </div>
                    <!--/ thumbnail -->
                    <!-- panel body -->
                    <div class="panel-body" style="margin-top:-55px;z-index:2;">
                        <ul class="list-unstyled">
                            <li class="text-center">
                                <img class="img-circle" src="image/avatar/avatar7.jpg" alt="" width="75px" height="75px">
                                <br>
                                <!-- dropdown -->
                                <div class="btn-group mt10">
                                    <button type="button" class="btn btn-default"><span class="hasnotification hasnotification-success mr5"></span>Online</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Away</a></li>
                                        <li><a href="#">Offline</a></li>
                                        <li><a href="#">Busy</a></li>
                                    </ul>
                                </div>
                                <!--/ dropdown -->
                            </li>
                        </ul>
                    </div>
                    <!--/ panel body -->
                </div>
                <!--/ END Panel -->
                <!--/ END Sidebar Profile -->

                <!-- START Sidebar contact -->
                <div class="media-list media-list-contact">
                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar1.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Autumn Barker</span>
                            <span class="media-meta ellipsis">Malaysia</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar2.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Giselle Horn</span>
                            <span class="media-meta ellipsis">Bolivia</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Austin Shields</span>
                            <span class="media-meta ellipsis">Timor-Leste</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Caryn Gibson</span>
                            <span class="media-meta ellipsis">Libya</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar3.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Nash Evans</span>
                            <span class="media-meta ellipsis">Honduras</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar4.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Josiah Johnson</span>
                            <span class="media-meta ellipsis">Belgium</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Philip Hewitt</span>
                            <span class="media-meta ellipsis">Bahrain</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar5.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Wilma Hunt</span>
                            <span class="media-meta ellipsis">Dominica</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar6.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Noah Gill</span>
                            <span class="media-meta ellipsis">Guatemala</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar8.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> David Fisher</span>
                            <span class="media-meta ellipsis">French Guiana</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar9.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Samantha Avery</span>
                            <span class="media-meta ellipsis">Jersey</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Madaline Medina</span>
                            <span class="media-meta ellipsis">Finland</span>
                        </span>
                    </a>
                </div>
                <!--/ END Sidebar contact -->
            </section>
            <!--/ END Sidebar Content -->
        </aside>
        <!--/ END Template Sidebar (right) -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->
        <script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
        <script type="text/javascript" src="library/jquery/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="library/jquery/js/jquery-ui-touch.min.js"></script>
        <script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="library/core/js/core.min.js"></script>
        <!--/ Library script -->

        <!-- app init script -->
        <script type="text/javascript">
            (function($){
                $("html").Core({ "console": false });
            })(jQuery);
        </script>
        <!--/ app init script -->

        <!-- 3rd party plugin script : optional(per use) -->
        <script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
        <script type="text/javascript" src="plugins/steps/js/jquery.steps.min.js"></script>
        <script type="text/javascript" src="plugins/inputmask/js/inputmask.min.js"></script>
        <script type="text/javascript" src="javascript/page.js"></script>
        <!--/ 3rd party plugin script -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
</html>