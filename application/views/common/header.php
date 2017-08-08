<!DOCTYPE html>
<html>
    
<!-- Mirrored from lambdathemes.in/modern/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 11:01:57 GMT -->
<head>
        
        <!-- Title -->
        <title><?php echo $page_title; ?></title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcode" />
      
        <link rel="shortcut icon" href="<?php echo $this->config->item('assets_url')?>favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $this->config->item('assets_url')?>favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo $this->config->item('assets_url')?>plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo $this->config->item('assets_url')?>plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo $this->config->item('assets_url')?>plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo $this->config->item('assets_url')?>plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo $this->config->item('assets_url')?>plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo $this->config->item('assets_url')?>plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo $this->config->item('assets_url')?>plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>		
        <!-- Theme Styles -->
        <link href="<?php echo $this->config->item('assets_url')?>css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>css/sweet-alert.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('assets_url')?>plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo $this->config->item('assets_url')?>plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        
        <script src="<?php echo $this->config->item('assets_url')?>plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="<?php echo $this->config->item('assets_url')?>plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        <script src="<?php echo $this->config->item('assets_url')?>plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="<?php echo $this->config->item('assets_url')?>js/pages/fabric.js"></script>
        <script src="<?php echo $this->config->item('assets_url')?>js/sweet-alert.min.js"></script>
       
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed small-sidebar">
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                   <div class="logo-box">
                        <a href="<?php echo base_url(); ?>" class="logo-text"><img  src="<?php echo $this->config->item('assets_url')?>images/logoInner.png" alt=""></a>
                    </div><!-- Logo Box -->
                    <div class="topmenu-outer">
                       
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                               <!-- <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>-->
                                <!--<li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                                </li>-->
                               
                            </ul>
                          
                            <ul class="nav navbar-nav navbar-right">
                               <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo $username; ?><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="<?php base_url(); ?>index.php/index/change_password"><i class="fa fa-lock"></i>Change Password</a></li>
                                        <li role="presentation"><a href="<?php base_url(); ?>index.php/index/logout"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li> 
                                
                            </ul>
                            <!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-details">
                                    <span><?php echo $name; ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <li <?php if($current_controller=='index') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-picture"></span><p>Works</p></a></li>
                       
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
 