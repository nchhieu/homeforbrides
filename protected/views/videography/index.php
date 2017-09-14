<?php
if($Slider1){
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mainbanner"> 
      
      <!-- Banner Home -->
      <ul class="sliderComing">
        <?php
	  $i = 0;
      foreach($Slider1 as $row){
		  $i++;
		  echo '<li class="banner'. $i .'" style="background: url('. $row['slider_photos'].') no-repeat center center; background-size: cover;"> </li>';
	  } //  foreach
	?>
      </ul>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      setInterval(sliderFade,3000);
    });

    
    var currentSlider = 0;
    var sliderFade = function(){
      var lengthBanner = $('.sliderComing li').length;
      
      if(currentSlider >= lengthBanner-1)
        currentSlider = 0;
      else
        currentSlider++;
      
      $('.sliderComing li').css('opacity',0);
      $('.sliderComing li').eq(currentSlider).css('opacity',1);
    }

</script>
<?php
} // if
else{
	//echo '<div class="row"><div class="col-md-12" style="margin-top:50px;"></div></div>';
}

?>
<?php $this->widget('application.components.Submenu');?>

<div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <h1 class="title-page">
          <?=$PostSubcat['subcat_name'];?>
        </h1>
      </div>
      <div class="col-md-6 col-xs-12 social">
        <div class="fb-like pull-right" data-href="<?=Yii::app()->request->requestUri;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        <a href="javascript:history.go(-1)" class="btn btn-default btn-xs btn-back"> << Back to previous page </a> &nbsp; </div>
    </div>
    <!--div class="row">
      <div class="col-md-12 col-sm-12  col-xs-12 catintro">
   
  <?php
      // echo $PostSubcat['subcat_intro'];
	  ?>
  </div>
  </div-->
  <p>&nbsp;</p>
  <p>&nbsp;</p>
    <div class="row">
      <?php
	$i = 0;
    foreach($Post as $row){
		$i++;
		
		
				
	?>
    
    <div class="col-md-4 videolist"> <a href="<?php echo $row['post_intro'];?>" class="fancybox-media" ><img src="<?php echo $row['post_thumb'];?>" class="img-responsive"></a>
        <div class="play"><a href="<?php echo $row['post_intro'];?>" class="fancybox-media" ><img src="/images/play.png" class="iplay"></a></div>
        <a href="#" class="title"><?php echo $row['post_title'];?></a></div>
    
      <?php
   if($i % 3 == 0 ){
	   echo '</div><div class="row">';
	  }
	} // for
?>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <nav>
          <?php
    $this->widget('CLinkPager', array(
            'currentPage'=>$page,
            'itemCount'=>$CountPost,
            'pageSize'=>Yii::app()->params['CatPageSize'],
            'maxButtonCount'=>5,
            'nextPageLabel'=>'&gt;',
			'prevPageLabel'=>'&lt;',
			'firstPageLabel'=>'&lt;&lt;',
			'lastPageLabel'=>'&gt;&gt;',
            'header'=>'',
        'htmlOptions'=>array('class'=>'pagination'),
        ));

	?>
         
        </nav>
      </div>
    </div>
  </div>
</div>
