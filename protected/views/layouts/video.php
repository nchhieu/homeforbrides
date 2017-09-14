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
<link  href="<?=Yii::app()->params['domain']?>/assets/css/style.css"  rel="stylesheet">
<link  href="<?=Yii::app()->params['domain']?>/assets/css/mobile.css"  rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/freewall.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->params['domain']?>/assets/css/jquery.fancybox.css?v=2.1.5" media="screen" />

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->params['domain']?>/assets/css/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/jquery.fancybox-buttons.js?v=1.0.5"></script>
    
    
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript" src="<?=Yii::app()->params['domain']?>/assets/js/main.js"></script>
</head>
<body>
<?php $this->widget('application.components.Header');?>
<?php echo $content;?>
<?php $this->widget('application.components.Footer');?>
    
<div id="fb-root"></div>
<script>
$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});
                </script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
