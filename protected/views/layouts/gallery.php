<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="language" content="english"/>
<meta name="distribution" content="global"/>
<meta name="author" content="Homeforbrides"/>
<meta name="publisher" content="Homeforbrides"/>
<meta name="copyright" content="Homeforbrides"/>
<meta name="description" content="Homeforbrides">
<meta name="keywords" content="Homeforbrides">
<meta name="og:title" content="Homeforbrides">
<meta name="og:description" content="Homeforbrides">
<meta name="og:url" content="">
<meta name="og:image" content="">
<title>Homeforbrides</title>
<link  href="<?=Yii::app()->params['domain']?>/assets/css/bootstrap.min.css"  rel="stylesheet">
<link  href="<?=Yii::app()->params['domain']?>/assets/css/mobile.css"  rel="stylesheet">
<link  href="<?=Yii::app()->params['domain']?>/assets/css/style.css"  rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="<?=Yii::app()->params['domain']?>/assets/js/modernizr.custom.70736.js"></script> 
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/bootstrap.min.js"></script>
<!--script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/freewall.js"></script-->

<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/main.js"></script>




</head>
<body>
<?php $this->widget('application.components.Header');?>
<?php echo $content;?>
<?php $this->widget('application.components.Footer');?>
    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
