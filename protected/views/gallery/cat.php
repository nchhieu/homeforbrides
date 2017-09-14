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
<?php $this->widget('application.components.Search');?>

<div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <h1 class="title-page">
          <?=$PostCat['cat_name'];?>
        </h1>
      </div>
      <div class="col-md-6 col-xs-12 social">
        <div class="fb-like pull-right" data-href="<?=Yii::app()->request->requestUri;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        <a href="javascript:history.go(-1)" class="btn btn-default btn-xs btn-back"> << Back to previous page </a> &nbsp; </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 col-xs-12 catintro">
    <?php
	  if(count($Slider2) > 0){
	?>
    
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          <!-- Indicators -->
          
          <ol class="carousel-indicators">
           <?php
		  $i = 0;
          foreach($Slider2 as $row2){
			  $active = '';
			  if($i == 0){
				  $active = 'class="active"';
				}
            echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" '. $active .'></li>';
        
		  } // for
		  ?>
          
          </ol>
          <!-- Wrapper for slides -->
          
          <div class="carousel-inner" role="listbox">
            <?php
  $i = 0;
  foreach($Slider2 as $row2){
	  $active = '';
	  if($i == 0){
		  $active = 'active';
		}
  ?>
            <div class="item <?=$active;?>"> <img src="<?=$row2['slider_photos']?>" alt="<?=$PostCat['cat_name'];?>" >
              <div class="carousel-caption"></div>
            </div>
            <?php
	  $i++;
  } // for
  ?>
          </div>
          
          <!-- Controls --> 
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        <script type="text/javascript">
    $(document).ready(function(){
			$('.carousel').carousel();
 });</script> 
    <?php
  } // if
  ?>
  
  <?php
      echo $PostCat['cat_intro'];
	  ?>
  </div>
  </div>
    <div class="row">
      <?php
	$i = 0;
    foreach($Post as $row){
		$i++;
		$subcat_alias = $PostCat['cat_alias'];
		$url = Yii::app()->createUrl("gallery/album",array("subcat"=>$subcat_alias,"alias"=>$row['post_alias'],"id"=>$row['post_id']));
		if(strpos($row['post_thumb'],'photos/') > 0){
			$thumb = Yii::app()->params['domain2'].$row['post_thumb'];
		
		}else{
			$thumb = Yii::app()->params['domain'].$row['post_thumb'];
		}
				
	?>
      <div class="col-md-4 catlist"> <a href="<?=$url;?>" title="<?=$row['post_title'];?>"> <img src="<?=$thumb;?>" alt="<?=$row['post_title'];?>" class="img-responsive"> </a> <a href="<?=$url;?>" class="title"  title="<?=$row['post_title'];?>">
        <?=$row['post_title'];?>
        </a> <span class="subtitle">
        <?=$row['post_intro'];?>
        </span> </div>
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

<?php $this->widget('application.components.Social');?>
