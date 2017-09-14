<?php 
/* @var $this Controller */
$controler = strtolower(Yii::app()->controller->id);
$action = strtolower($this->action->id);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Andy Sandy - Admin site</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

<!--base css styles-->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

<!--page specific css styles-->
<link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen.min.css" />
<link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
<link rel="stylesheet" type="text/css" href="assets/jquery-pwstrength/jquery.pwstrength.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-duallistbox/duallistbox/bootstrap-duallistbox.css" />
<link rel="stylesheet" type="text/css" href="assets/dropzone/downloads/css/dropzone.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
<!--flaty css styles-->
<link rel="stylesheet" href="css/homeforbrides.css">
<link rel="stylesheet" href="css/homeforbrides-responsive.css">
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body class="skin-orange">
<!-- BEGIN Navbar -->

<div id="navbar" class="navbar">
  <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar"> <span class="fa fa-bars"></span> </button>
  <a class="navbar-brand" href="index.php"> <small> <i class="fa fa-desktop"></i> HomeForBrides admin</small> </a> 
  
  <!-- BEGIN Navbar Buttons -->
  <ul class="nav flaty-nav pull-right">
    <!-- BEGIN Button Notifications -->
    <li class="hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="fa fa-bell"></i> <span class="badge badge-important">2</span> </a> 
      
      <!-- BEGIN Notifications Dropdown -->
      <ul class="dropdown-navbar dropdown-menu">
        <li class="nav-header"> <i class="fa fa-warning"></i> 2 nhắc nhở </li>
        <li class="notify"> <a href="#"> <i class="fa fa-comment orange"></i>
          <p>Thành viên đăng ký mới</p>
          <span class="badge badge-warning">4</span> </a> </li>
        <li class="notify"> <a href="#"> <i class="fa fa-twitter blue"></i>
          <p>Hết hạn quảng cáo</p>
          <span class="badge badge-info">7</span> </a> </li>
      </ul>
      <!-- END Notifications Dropdown --> 
    </li>
    <!-- END Button Notifications --> 
    
    <!-- BEGIN Button User -->
    <li class="user-profile"> <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle"> <img class="nav-user-photo" src="<?php echo Yii::app()->user->getState('admin_avatar'); ?>" /> <span class="hhh" id="user_info"> <?php echo Yii::app()->user->getState('admin_name'); ?> </span> <i class="fa fa-caret-down"></i> </a> 
      
      <!-- BEGIN User Dropdown -->
      <ul class="dropdown-menu dropdown-navbar" id="user_menu">
        <li class="nav-header"> <i class="fa fa-clock-o"></i> Loged at <?php echo date_format(date_create(Yii::app()->user->getState('admin_latest_login')),'H:i');?></li>
        <li> <?php echo CHtml::link('<i class="fa fa-cog"></i> Change password', array('Admin/Changepwd','id'=>Yii::app()->user->getState('admin_id'))); ?></li>
        <li> <?php echo CHtml::link('<i class="fa fa-user"></i> My account', array('Admin/profile','id'=>Yii::app()->user->getState('admin_id'))); ?> </li>
        <li class="divider"></li>
        <li> <?php echo CHtml::link('<i class="fa fa-off"></i> Log-out', array('Site/logout')); ?> </li>
      </ul>
      <!-- BEGIN User Dropdown --> 
    </li>
    <!-- END Button User -->
  </ul>
  <!-- END Navbar Buttons --> 
</div>
<!-- END Navbar --> 

<!-- BEGIN Container -->
<div class="container" id="main-container"> 
  <!-- BEGIN Sidebar -->
  
  <div id="sidebar" class="navbar-collapse collapse"> 
    <!-- BEGIN Navlist -->
    <ul class="nav nav-list">
      <!-- BEGIN Search Form -->
      <li>
        <form target="#" method="GET" class="search-form">
          <span class="search-pan">
          <button type="submit"> <i class="fa fa-search"></i> </button>
          <input type="text" name="search" placeholder="Search ..." autocomplete="off" />
          </span>
        </form>
      </li>
      <!-- END Search Form -->
      <li <?php if($controler == 'site' && $action == 'index'){ echo 'class="active"';} ?>> <?php echo CHtml::link(' <i class="fa fa-dashboard"></i> <span>Dashboard</span> <b class="arrow fa fa-angle-right"></b>', array('Site/Index')); ?></li>
      <li <?php if(in_array($controler, array('post','event','gallery','video','postcat','postsubcat','topicivdeo'))){ echo 'class="active"';} ?> > <a href="#" class="dropdown-toggle"> <i class="fa fa-edit"></i> <span>Content</span> <b class="arrow fa fa-angle-right"></b> </a> 
        
        <!-- BEGIN Submenu -->
        <ul class="submenu">
          <li <?php if($controler == 'postcat' && in_array($action,array('admin','create','update','view'))){ echo 'class="active"';} ?>><?php echo CHtml::link('Categories', array('PostCat/admin')); ?></li>
          <li <?php if($controler == 'postsubcat' && in_array($action,array('admin','create','update','view'))){ echo 'class="active"';} ?>><?php echo CHtml::link('Sub Categories', array('PostSubcat/admin')); ?></li>
          <li <?php if($controler == 'postsubcat' && in_array($action,array('admin','create','update','view'))){ echo 'class="active"';} ?>><?php echo CHtml::link('Tags', array('tags/admin')); ?></li>
          <li <?php if($controler == 'post' && $action == 'create'){ echo 'class="active"';} ?>><?php echo CHtml::link('Add new post', array('Post/Create')); ?></li>
          <li <?php if($controler == 'post' && $action == 'all'){ echo 'class="active"';} ?> ><?php echo CHtml::link('All posts', array('Post/all')); ?></li>
          <li <?php if($controler == 'post' && in_array($action,array('admin','update','view'))){ echo 'class="active"';} ?> ><?php echo CHtml::link('Blog', array('Post/blog')); ?></li>
          <li <?php if($controler == 'post' && in_array($action,array('photography'))){ echo 'class="active"';} ?> ><?php echo CHtml::link('Photography', array('Post/photography')); ?></li>
          <li <?php if($controler == 'topicivdeo'){ echo 'class="active"';} ?> ><?php echo CHtml::link('Topic Videography', array('topicVideo/admin')); ?></li>
          <li <?php if($controler == 'post' && in_array($action,array('videography'))){ echo 'class="active"';} ?> ><?php echo CHtml::link('Videography', array('Post/videography')); ?></li>
        </ul>
        <!-- END Submenu --> 
      </li>
      <li <?php if(in_array($controler,array('member','promotioncode'))){ echo 'class="active"';} ?> > <a href="#" class="dropdown-toggle"> <i class="fa fa-users"></i> <span>Customer</span> <b class="arrow fa fa-angle-right"></b> </a> 
        
        <!-- BEGIN Submenu -->
        <ul class="submenu">
          <li <?php if($controler == 'member' && in_array($action,array('admin','update','view'))){ echo 'class="active"';} ?>><?php echo CHtml::link('Customer', array('Member/admin')); ?> </li>
          <li <?php if($controler == 'member' && $action == 'create'){ echo 'class="active"';} ?>><?php echo CHtml::link('Add new customer', array('Member/create')); ?> </li>
        </ul>
        <!-- END Submenu --> 
      </li>
      <li <?php if(in_array($controler,array('postcat','postsubcat','photographer','weddingstep','location'))){ echo 'class="active"';} ?>> <a href="#" class="dropdown-toggle"> <i class="fa fa-cogs"></i> <span>Settings </span> <b class="arrow fa fa-angle-right"></b> </a> 
        
        <!-- BEGIN Submenu -->
        <ul class="submenu">
          <li <?php if($controler == 'WeddingStep' && in_array($action,array('admin','create','update','view'))){ echo 'class="active"';} ?>><?php echo CHtml::link('Photography Step', array('WeddingStep/admin')); ?></li>
        </ul>
        <!-- END Submenu --> 
      </li>
      <li <?php if($controler == 'admin' ){ echo 'class="active"';} ?>> <a href="#" class="dropdown-toggle"> <i class="fa fa-user"></i> <span><?php echo Yii::app()->user->getState('admin_name'); ?></span> <b class="arrow fa fa-angle-right"></b> </a> 
        
        <!-- BEGIN Submenu -->
        <ul class="submenu">
          <?php if( Yii::app()->user->getState('admin_group') == 'Admin' ) { ?>
          <li <?php if($controler == 'admin' && in_array($action,array('admin','create','update','view'))){ echo 'class="active"';} ?>><?php echo CHtml::link('Administartor', array('Admin/admin')); ?> </li>
          <?php  }  ?>
          <li <?php if($controler == 'postsubcat' && $action = 'profile'){ echo 'class="active"';} ?>><?php echo CHtml::link('My account', array('Admin/profile', 'id'=>Yii::app()->user->getState('admin_id'))); ?> </li>
          <li><?php echo CHtml::link('Log out', array('site/logout')); ?></li>
        </ul>
        <!-- END Submenu --> 
      </li>
    </ul>
    <!-- END Navlist --> 
    
    <!-- BEGIN Sidebar Collapse Button -->
    <div id="sidebar-collapse" class="visible-lg"> <i class="fa fa-angle-double-left"></i> </div>
    <!-- END Sidebar Collapse Button --> 
  </div>
  <!-- END Sidebar --> 
  
  <!-- BEGIN Content -->
  <div id="main-content"> <?php echo $content;?>
    <footer>
      <p>2014 © Home For Brides Admin .</p>
    </footer>
    <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a> </div>
  <!-- END Content --> 
</div>
<!-- END Container --> 

<!--basic scripts--> 
<script>window.jQuery || document.write('<script src="assets/jquery/jquery-2.0.3.min.js"><\/script>')</script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script> 
<script src="assets/jquery-cookie/jquery.cookie.js"></script> 

<!--page specific plugin scripts--> 
<script type="text/javascript" src="assets/chosen-bootstrap/chosen.jquery.min.js"></script> 
<script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> 
<script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script> 
<script type="text/javascript" src="assets/jquery-pwstrength/jquery.pwstrength.min.js"></script> 
<script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script> 
<script type="text/javascript" src="assets/bootstrap-duallistbox/duallistbox/bootstrap-duallistbox.js"></script> 
<script type="text/javascript" src="assets/dropzone/downloads/dropzone.min.js"></script> 
<script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
<script type="text/javascript" src="assets/clockface/js/clockface.js"></script> 
<script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script> 
<script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
<!--flaty scripts--> 
<script src="js/homeforbrides.js"></script> 
<script src="js/homeforbrides-demo-codes.js"></script>
</body>
</html>
