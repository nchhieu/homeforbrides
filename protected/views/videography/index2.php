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
          <?php echo $PostCat['cat_name'];?>
        </h1>
      </div>
      <div class="col-md-6 col-xs-12 social">
        <div class="fb-like pull-right" data-href="<?=Yii::app()->request->requestUri;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        <a href="javascript:history.go(-1)" class="btn btn-default btn-xs btn-back"> << Back to previous page </a> &nbsp; </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12  col-xs-12 catintro">
   
  <?php
      echo $PostCat['cat_intro'];
	  ?>
  </div>
  </div>
   
      <?php
	$i = 0;
    foreach($PostSubcat as $row){
		$i++;
		if($row['subcat_url'] != ''){
			$url = $row['subcat_url'];
		}else{
			if($row['subcat_as_post'] == 'No'){
				$url = Yii::app()->createUrl('videography/index', array('alias'=>$row['subcat_alias'],'id'=>$row['subcat_id']));
			}else{
				$url = Yii::app()->createUrl('videography/topic', array('alias'=>$row['subcat_alias'],'id'=>$row['subcat_id']));
			}
		}
	?><div class="row">
		<div class="col-md-5"><a href="<?php echo $url;?>"><img src="<?=$row['subcat_thumb']?>" class="img-responsive" style="margin-top:30px"></a></div>
        <div class="col-md-7">
        	<h2><a href="<?php echo $url;?>" title="<?php echo $row['subcat_name'];?>"><?php echo $row['subcat_name'];?> </a></h2>
            <p><?=$row['subcat_intro']?></p>
        </div>
           
   </div>
   <hr>
    
      <?php
 
	} // for
?>
   
   
  </div>
</div>


<?php $this->widget('application.components.Social');?>
