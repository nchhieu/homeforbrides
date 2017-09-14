  <div class="container">
  	<div class="row">
    	<div class="col-md-12" style="margin-top:50px;"></div>
        </div>
       </div>

<?php $this->widget('application.components.Submenu');?>

<div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <h1 class="title-page">
          Results 
          <?php 
		if($tag_id > 0){
			echo ' for <strong>"' . $Tags['tag_key'] . '"</strong>';
		}
		if($key != ''){
			echo ' key "<strong>'. $key .'</strong>"';
		}
		
		  ?>
        </h1>
        <?php echo '<span class="countresult">About ' . count($PostSearch) . ' results</span>';?>
      </div>
    </div>
   <p>&nbsp;</p>
    <div class="row">
      <?php
	$i = 0;
    foreach($PostSearch as $row){
		$i++;
		$subcat_alias = 'san-francisco-wedding-photographer';
		if($row['subcat_alias']){
			$subcat_alias = $row['subcat_alias'];
		}
		$url = Yii::app()->createUrl("gallery/album",array("subcat"=>$subcat_alias,"alias"=>$row['post_alias'],"id"=>$row['post_id']));
		if(strpos($row['post_thumb'],'photos/') > 0){
			$thumb = Yii::app()->params['domain2'].$row['post_thumb'];
		
		}else{
			$thumb = Yii::app()->params['domain'].$row['post_thumb'];
		}
				
	?>
      <div class="col-md-4 catlist"> <a href="<?=$url;?>" target="_blank" title="<?=$row['post_title'];?>"> <img src="<?=$thumb;?>" alt="<?=$row['post_title'];?>" class="img-responsive"> </a> <a href="<?=$url;?>" class="title"  title="<?=$row['post_title'];?>">
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
    
  </div>
</div>

  <?php $this->widget('application.components.Social');?>