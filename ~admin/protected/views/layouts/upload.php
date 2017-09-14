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
<title>Home For Brides - Admin site</title>
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
  
  <!-- END Navbar Buttons --> 
</div>
<!-- END Navbar --> 

<!-- BEGIN Container -->
<div class="container" id="main-container"> 
  <!-- BEGIN Sidebar --> 
  
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

</body>
</html>
