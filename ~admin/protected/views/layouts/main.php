<?php 
/* @var $this Controller */
$controler = strtolower(Yii::app()->controller->id);
$action = strtolower($this->action->id);
$tabActive = array('page'=>'','profile'=>'', 'param'=>'','user'=>'');
if(in_array($controler , array('site','product','store','article','contact','banner','articlegallery','articlegalleryphoto')) ){$tabActive['page'] = 'active'; }
if($controler == 'user' && $action == 'profile' ){$tabActive['profile'] = 'active'; }
if(in_array($controler , array('productcat','storetype','country','city','language','icon','config'))){$tabActive['param'] = 'active'; }
if($controler == 'user' && $action != 'profile'  ){ $tabActive['user'] = 'active'; }
if($controler == 'config' && $action == 'footer'){
	$tabActive['param'] = '';
	$tabActive['page'] = 'active';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

<!--base css styles-->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

<!--page specific css styles-->
<link rel="stylesheet" href="assets/prettyPhoto/css/prettyPhoto.css">
<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
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
<link rel="stylesheet" type="text/css" href="assets/bootstrap-switch/static/stylesheets/bootstrap-switch.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

<!--flaty css styles-->
<link rel="stylesheet" href="css/homeforbrides.css">
<link rel="stylesheet" href="css/homeforbrides-responsive.css">
<!--Customized css styles-->
<link rel="stylesheet" type="text/css" href="css/mystyles.css">
<!--favi icon -->
<link rel="shortcut icon" href="img/ico/favicon.png">
<script src="assets/jquery/jquery-2.0.3.min.js"></script> 
</head>
<body>

<!-- BEGIN Theme Setting -->
<div id="theme-setting"> <a href="#"><i class="fa fa-gears fa fa-2x"></i></a>
  <ul>
    <li> <span>Skin</span>
      <ul class="colors" data-target="body" data-prefix="skin-">
        <li class="active"><a class="blue" href="#"></a></li>
        <li><a class="red" href="#"></a></li>
        <li><a class="green" href="#"></a></li>
        <li><a class="orange" href="#"></a></li>
        <li><a class="yellow" href="#"></a></li>
        <li><a class="pink" href="#"></a></li>
        <li><a class="magenta" href="#"></a></li>
        <li><a class="gray" href="#"></a></li>
        <li><a class="black" href="#"></a></li>
      </ul>
    </li>
    <li> <span>Navbar</span>
      <ul class="colors" data-target="#navbar" data-prefix="navbar-">
        <li class="active"><a class="blue" href="#"></a></li>
        <li><a class="red" href="#"></a></li>
        <li><a class="green" href="#"></a></li>
        <li><a class="orange" href="#"></a></li>
        <li><a class="yellow" href="#"></a></li>
        <li><a class="pink" href="#"></a></li>
        <li><a class="magenta" href="#"></a></li>
        <li><a class="gray" href="#"></a></li>
        <li><a class="black" href="#"></a></li>
      </ul>
    </li>
    <li> <span>Sidebar</span>
      <ul class="colors" data-target="#main-container" data-prefix="sidebar-">
        <li class="active"><a class="blue" href="#"></a></li>
        <li><a class="red" href="#"></a></li>
        <li><a class="green" href="#"></a></li>
        <li><a class="orange" href="#"></a></li>
        <li><a class="yellow" href="#"></a></li>
        <li><a class="pink" href="#"></a></li>
        <li><a class="magenta" href="#"></a></li>
        <li><a class="gray" href="#"></a></li>
        <li><a class="black" href="#"></a></li>
      </ul>
    </li>
    <li> <span></span> <a data-target="navbar" href="#"><i class="fa fa-square-o"></i> Fixed Navbar</a> <a class="hidden-inline-xs" data-target="sidebar" href="#"><i class="fa fa-square-o"></i> Fixed Sidebar</a> </li>
  </ul>
</div>
<!-- END Theme Setting --> 

<!-- BEGIN Navbar -->
<div id="navbar" class="navbar">
  <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar"> <span class="fa fa-bars"></span> </button>
  <a class="navbar-brand" href="htp://www.cinfikirler.com"> <img src="img/misc/logo_cinfikir_beyaz.png" width="50" height="30" alt="Cinfikir Dijital Medya Logo"> <small> Dijital Cloud Publishing Web 1.0</small> </a> 
  <!-- BEGIN Navbar Buttons -->
  <ul class="nav flaty-nav pull-right">
    <!-- END Button Notifications --> 
    <!-- BEGIN Button User -->
    <li class="user-profile"> <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle"> <img class="nav-user-photo" src="..<?php echo Yii::app()->user->getState('user_avatar'); ?>" alt="Penny's Photo" /> <span id="user_info"> <?php echo Yii::app()->user->getState('name'); ?> </span> <i class="fa fa-caret-down"></i> </a> 
      
      <!-- BEGIN User Dropdown -->
      <ul class="dropdown-menu dropdown-navbar" id="user_menu">
        <li> <?php echo CHtml::link('<i class="fa fa-user"></i> Edit Profile', array('User/profile')); ?>  </li>
        <li class="divider"></li>
        <li><?php echo CHtml::link('<i class="fa fa-power-off"></i> Logout', array('Site/Logout')); ?></li>
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
      <li class="<?php echo $tabActive['page']?>"> <a href="#" class="dropdown-toggle"> <i class="fa fa-desktop"></i> <span>Pages</span> <b class="arrow fa fa-angle-right"></b> </a> 
        
        <!-- BEGIN Pages Submenu -->
        <ul class="submenu">
          <li <?php if($controler == 'site'){ echo 'class="active"';}?>><?php echo CHtml::link('Home Page', array('Site/index')); ?></a> </li>
          <li <?php if($controler == 'product'){ echo 'class="active"';}?>><?php echo CHtml::link('Product Page', array('Product/admin')); ?></a></li>
          <li <?php if($controler == 'store'){ echo 'class="active"';}?>><?php echo CHtml::link('Store Page', array('Store/admin')); ?></a></li>
          <li <?php if(in_array($controler,array('article','articlegallery','articlegalleryphoto')) && in_array($action,array('admin','create'))){ echo 'class="active"';}?>><?php echo CHtml::link('About Us Page', array('Article/admin')); ?></a></li>
          <li <?php if($controler == 'article' && in_array($action,array('mother','createmother'))){ echo 'class="active"';}?>><?php echo CHtml::link('For Mothers Page', array('Article/mother')); ?></a></li>
          <li <?php if($controler == 'contact' ){ echo 'class="active"';}?>><?php echo CHtml::link('Contact Page', array('Contact/admin')); ?></a></li>
          <li <?php if($controler == 'config' && $action == 'footer'){ echo 'class="active"';}?> ><?php echo CHtml::link('Footer', array('Config/footer')); ?></a></li>
        </ul>
        <!-- END Submenu --> 
      </li>
      <li class="<?php echo $tabActive['profile']?>"><?php echo CHtml::link('<i class="fa fa-user"></i> Edit Profile', array('User/profile')); ?> </li>
      <li class="<?php echo $tabActive['param']?>"> <a href="#" class="dropdown-toggle"> <i class="fa fa-cog"></i> <span>Paramaters</span> <b class="arrow fa fa-angle-right"></b> </a> 
        
        <!-- BEGIN Submenu -->
        <ul class="submenu">
          <li <?php if($controler == 'productcat'){ echo 'class="active"';}?>><?php echo CHtml::link('Product Category', array('ProductCat/admin')); ?></li>
          <li <?php if($controler == 'storetype'){ echo 'class="active"';}?>><?php echo CHtml::link('Store Type', array('Storetype/admin')); ?></li>
          <li <?php if($controler == 'country'){ echo 'class="active"';}?>><?php echo CHtml::link('Country', array('Country/admin')); ?></li>
          <li <?php if($controler == 'city'){ echo 'class="active"';}?>><?php echo CHtml::link('City', array('City/admin')); ?></li>
          <li <?php if($controler == 'language'){ echo 'class="active"';}?>><?php echo CHtml::link('Language', array('Language/admin')); ?></li>
          <li <?php if($controler == 'icon'){ echo 'class="active"';}?>><?php echo CHtml::link('Icons', array('Icon/admin')); ?></li>
          <li <?php if($controler == 'config' && $action != 'footer'){ echo 'class="active"';}?>><?php echo CHtml::link('Configuration', array('Config/admin')); ?></li>
        </ul>
        <!-- END Submenu --> 
      </li>
      <?php if(Yii::app()->user->getState('user_rule') == 'Administrator'){ ?>
      <li class="<?php echo $tabActive['user']?>"> <a href="#" class="dropdown-toggle"> <i class="fa fa-users"></i> <span>Users</span> <b class="arrow fa fa-angle-right"></b> </a> 
        <!-- BEGIN Submenu -->
        <ul class="submenu">
          <li <?php if($controler == 'user' && $action == 'create'){ echo 'class="active"';}?>><?php echo CHtml::link('New  User', array('User/create')); ?></li>
          <li <?php if($controler == 'user'  && $action == 'admin'){ echo 'class="active"';}?>><?php echo CHtml::link('Edit User', array('User/admin')); ?></li>
        </ul>
        <!-- END Submenu --> 
      </li>
      <?php
	  } 
      ?>
    </ul>
    <!-- END Navlist --> 
    
    <!-- BEGIN Sidebar Collapse Button -->
    <div id="sidebar-collapse" class="visible-lg"> <i class="fa fa-angle-double-left"></i> </div>
    <!-- END Sidebar Collapse Button --> 
  </div>
  <!-- END Sidebar --> 
  
  <!-- BEGIN Content --> 
  
  <?php echo $content;?> 
  <!-- END Main Content -->
  <footer>
    <p> <a href="http://www.cinfikirler.com"><img src="img/misc/logo_cinfikir.png" width="50" height="30"></a> </p>
  </footer>
  <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a> </div>
<!-- END Content -->
</div>
<!-- END Container -->
</div>

<!-- BEGIN MODALS -->
<div id="product-detail-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Product Detail</h3>
        <p>Click picture to edit</p>
      </div>
      <div class="modal-body">
        <div> <img class="img-responsive" src="images/products/product-detail/01-01.png" alt="Description of image" />
          <p> <span class="label label-important">NOTE!</span> W:770-H:440px/Jpg</p>
        </div>
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label"><i class="fa  fa-file-text"></i> Text</label>
            <div class="col-sm-9 col-lg-10 controls">
              <textarea class="form-control show-popover" placeholder="Filenin içerisinde, tek kullanmlık sıcak çay bardaklarında ve yemek tabaklarında da kullanılacak kadar sağlıklı olan (boncuk) strafor kullanılmıştır.Kumaş %100 polyester, İç malzeme Boncuk Strafor (Polisteren) " data-trigger="hover" data-content="Max 220 Characters"  data-placement="right" rows="5"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label"><i class="fa fa-video-camera"></i> Video</label>
            <!-- DEVELOPER NOTE: Please test it with youtube and vimeo embed video. -->
            <div class="col-sm-9 col-lg-10 controls">
              <input type="text" class="form-control show-popover" placeholder="http://player.vimeo.com/video/57413269" data-trigger="hover" data-content="Embed Video Vimeo/Youtube"  data-placement="right" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 col-lg-5 control-label"><i class="fa  fa-picture-o"> Icon </i></label>
            <div class="fileupload-new img-thumbnail" style="width: 72px; height: 70px;"> <img src="http://www.placehold.it/62x60/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
            <!-- DEVELOPER NOTE: Open same  modal as home page icon modal -->
            <div class="col-sm-4 col-lg-5 controls col-md-offset-4" style="margin-top:10px;"> <a href="#add-product-icon" class="btn btn-magenta show-tooltip" title="Icon will appear right top of product image." data-toggle="modal"><i class="fa fa-cog"></i> Select icon</a> </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-lime show-popover " data-dismiss="modal" data-trigger="hover" data-content="Discard Changes"  data-placement="top">Cancel</button>
        <button class="btn btn-primary show-popover " data-dismiss="modal" data-trigger="hover" data-content="Save "  data-placement="top">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="add-product-icon" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Select icon</h3>
      </div>
      <div class="modal-body">
        <table class="table table-hover" >
          <tbody>
            <tr class="col-md-2" > 
              <!-- DEVELOPER NOT: if user selects first image there will me no icon at news model MODALS -->
              <td style="border-top:none;"><img src="http://www.placehold.it/62x60/EFEFEF/AAAAAA&amp;text=no+image" alt="" /></td>
            </tr>
            <tr class="col-md-2">
              <td style="border-top:none;"><img src="images/icons/new2.png" width="70px" height="70px" alt="Description of image" /></td>
            </tr>
            <tr class="col-md-2">
              <td style="border-top:none;"><img src="images/icons/patent.png" width="70px" height="70px" alt="Description of image" /></td>
            </tr>
            <tr class="col-md-2">
              <td style="border-top:none;"><img src="images/icons/patent.png" width="70px" height="70px" alt="Description of image" /></td>
            </tr>
            <tr class="col-md-2">
              <td style="border-top:none;"><img src="images/icons/patent.png" width="70px" height="70px" alt="Description of image" /></td>
            </tr>
            <tr class="col-md-2">
              <td style="border-top:none;"><img src="images/icons/patent.png" width="70px" height="70px" alt="Description of image" /></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-magenta show-popover " data-dismiss="modal" data-trigger="hover" data-content="Width 70px / Height 70px /png"  data-placement="top">Add icon</button>
        <button class="btn btn-lime show-popover " data-dismiss="modal" data-trigger="hover" data-content="Discard Changes"  data-placement="top">Cancel</button>
        <button class="btn btn-primary show-popover " data-dismiss="modal" data-trigger="hover" data-content="Save Changes"  data-placement="top">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete  product item -->
<div id="delete-product" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Are you sure to delete this item ?</h3>
      </div>
      <table class="table table-advance table-hover">
        <thead>
          <tr>
            <th> Thumb</th>
            <th> Name</th>
            <th> Code</th>
            <th>Description</th>
            <th>Show</th>
            <th>Category</th>
          </tr>
        </thead>
        <tr class="">
          <th><img src="images/products/Banyo_Tuvalet_02.png" width="50px" height="50px"></img></th>
          <th>Taşıma Gurubu</th>
          <!-- DEVELLOPER NOTE:Don't forget to add Code: before text (art869) -->
          <th style="width:100px">art869</th>
          <th>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</th>
          <th>Yes</th>
          <th>Product category 1, product category 2</th>
        </tr>
          </tbody>
        
      </table>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
        <button class="btn btn-primary" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODALS --> 

<!--basic scripts--> 

<script src="assets/bootstrap/js/bootstrap.js"></script> 
<script src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script> 
<script src="assets/jquery-cookie/jquery.cookie.js"></script> 

<!--page specific plugin scripts--> 
<script src="assets/prettyPhoto/js/jquery.prettyPhoto.js"></script> 
<script src="assets/chosen-bootstrap/chosen.jquery.min.js"></script> 
<script type="text/javascript" src="assets/chosen-bootstrap/chosen.jquery.min.js"></script> 
<script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script> 
<script type="text/javascript" src="assets/jquery-validation/dist/jquery.validate.min.js"></script> 
<script type="text/javascript" src="assets/jquery-validation/dist/additional-methods.min.js"></script> 
<!--flaty scripts--> 
<script src="js/flaty.js"></script> 
<script src="js/flaty-demo-codes.js"></script>
</body>
</html>