<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <?php $retVal = (condition) ? a : b ;?> -->
  <title><?php echo ($this->uri->segment(1) == "") ? "JimboRee" : "JimboRee" . " " . ucfirst($this->uri->segment(1)); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/morris.js/morris.css'); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
  <!-- bootstrap datetimepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>">
  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/bootstrap-switch/bootstrap-switch.min.css'); ?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/iCheck/all.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/main.css'); ?>">

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/template/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
  <style>
    .wysihtml5-sandbox{
      width: 600px;
      margin-bottom: 25px;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>JR</b>E</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url('assets/img/logo.png'); ?>" alt=""></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #e52f65 !important;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li> -->
                <!-- inner menu: contains the actual data -->
                <!-- <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul> 
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> -->          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/template/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/template/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                <p>
                <?php echo $this->session->userdata('username'); ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/template/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo (($this->uri->segment(1) == "")) ? 'active' : '' ?>">
          <a href="<?php echo base_url(); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?php echo (($this->uri->segment(1) == "master-data")) ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-bars"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo (($this->uri->segment(2) == "subjects")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/subjects'); ?>">
                <i class="fa fa-book"></i> Subjects
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "class")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/class'); ?>">
                <i class="fa fa-pencil"></i> Class
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "students")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/students'); ?>">
                <i class="fa fa-child"></i> Students
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "parents")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/parents'); ?>">
                <i class="fa fa-users"></i> Parents
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "foodmenu")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/foodmenu'); ?>">
                <i class="fa fa-apple"></i> Food Menu
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "contacts")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/contacts'); ?>">
                <i class="fa fa-phone"></i> Contact
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "typenilai")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/typenilai'); ?>">
                <i class="fa fa-graduation-cap"></i> Score Type 
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "articles")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/articles'); ?>">
                <i class="fa fa-file"></i> Article
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "articles-type")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/articles-type'); ?>">
                <i class="fa fa-file"></i> Article Type 
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "teachers")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/teachers'); ?>">
                <i class="fa fa-gears"></i> Teachers
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "agama")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/agama'); ?>">
                <i class="fa fa-gears"></i> Religion
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "extracuricullar")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/extracuricullar'); ?>">
                <i class="fa fa-gears"></i> Extracuricullar
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "roles")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/roles'); ?>">
                <i class="fa fa-gears"></i> Roles 
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "events")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/events'); ?>">
                <i class="fa fa-gears"></i> Events 
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "events-type")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/events-type'); ?>">
                <i class="fa fa-gears"></i> Events Type
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "school")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/school'); ?>">
                <i class="fa fa-gears"></i> School
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "experience")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/experience'); ?>">
                <i class="fa fa-gears"></i> Experience
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "news")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/news'); ?>">
                <i class="fa fa-gear"></i> <span>News</span>
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "classes-program")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/classesprogram'); ?>">
                <i class="fa fa-gear"></i> <span>Classes Program</span>
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "schoolimprovement")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('master-data/schoolimprovement'); ?>">
                <i class="fa fa-gear"></i> <span>School Improvement</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview <?php echo (($this->uri->segment(1) == "transaction")) ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-bars"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo (($this->uri->segment(2) == "testimoni")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('transaction/testimoni'); ?>">
                <i class="fa fa-gear"></i> <span>Testimoni</span>
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "schoolyear")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('transaction/schoolyear'); ?>">
                <i class="fa fa-gear"></i> <span>School Year</span>
              </a>
            </li>
            <li class="<?php echo (($this->uri->segment(2) == "extracuricullar-student")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('transaction/extracuricullar-student'); ?>">
                <i class="fa fa-gear"></i> <span>Extracuricullar Student List</span>
              </a>
            </li>
            <!-- <li class="<?php echo (($this->uri->segment(1) == "schoolyear")) ? 'active' : '' ?>">
              <a href="<?php echo base_url('schoolyear'); ?>">
                <i class="fa fa-gear"></i> <span>School Year</span>
              </a>
            </li> -->
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>