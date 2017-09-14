<div class="container-fluid hidden-xs">
  <div class="row">
    <div class="col-md-12 mainbanner"> 
      
      <!-- Banner Home -->
      <ul class="sliderComing">
      <?php
	  $i = 0;
      foreach($PostCatSlider as $row){
		  $i++;
		  echo '<li class="banner'. $i .'" style="background: url('. $row['slider_photos'] .') no-repeat center center; background-size: cover;"> </li>';
	  }
	?>
      </ul>
      <div class="text" >
        <div class="largetext">ANDY SANDY</div>
        <div class="smalltext">PHOTO - VIDEO - MAKEUP</div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      setInterval(sliderFade,8000);
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