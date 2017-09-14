<?php $this->widget('application.components.Slider');?>
<?php $this->widget('application.components.Search');?>
<?php $this->widget('application.components.Submenu');?>

<div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <h1 class="title-page">Our Prices</h1>
      </div>
      <div class="col-md-6 col-xs-12 social">
        <div class="fb-like pull-right" data-href="<?=Yii::app()->request->requestUri;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        <a href="#" class="btn btn-default btn-xs btn-back"> << Back to previous page </a> &nbsp; </div>
    </div>
   
    <div class="row">
      <div class="col-md-8 bloglist">
        <?php
		$i=0;
		foreach($Post as $row){
			$i++;
			$subcat_name = '';
			
			if($row['post_thumb'] != ''){
				$thumb = $row['post_thumb'];
			
			}else{ 
				$thumb = '/images/home_for_brides.png';
			}
		
		
			if($row['subcat_id'] > 0){
				$subcat_alias = $arrSubCat[$row['subcat_id']]['alias'];
				$subcat_name = $arrSubCat[$row['subcat_id']]['name'];
			}else{
				$subcat_alias = 'wedding-photographer-blogs';
			}
			$url = Yii::app()->createUrl('price/detail',array('alias'=>$row['post_alias'],'id'=>$row['post_id']));
        ?>
        <div class="row blog">
          <div class="col-md-6"><a href="<?=$url;?>" title="<?=$row['post_title'];?>"><img src="<?=$thumb;?>" class="img-responsive"  alt="<?=$row['post_title'];?>"></a></div>
          <div class="col-md-6"><a href="<?=$url;?>" class="blogtitle" title="<?=$row['post_title'];?>">
            <?=$row['post_title'];?>
            </a>
            <div class="meta">
              <ul class="list-unstyled list-inline blog-info" style="margin:10px 0px">
                <li>
                  <div class="fb-like" data-href="<?=$url;?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                </li>
                <li>
                  <div class="fb-like" data-href="http://facebook.com/homeforbrides" data-layout="button_count" data-action="like" ></div>
                </li>
                <li>
                  <div class="g-plusone" data-size="medium"></div>
                </li>
              </ul>
            </div>
            <p class="summary">
              <?=$row['post_intro'];?>
            </p>
          </div>
        </div>
        <?php
		} // for
		?>
      
      </div>
      <div class="col-md-4 ">
        <div class="sidebar">
          <div class="list-group"> <a href="#" class="list-group-item active"> Price </a>
            <?php 
			foreach($Post as $row){
				$url = Yii::app()->createUrl('price/detail',array('alias'=>$row['post_alias'],'id'=>$row['post_id']));
				echo '<a href="'. $url .'" class="list-group-item" title="'. $row['post_title'] .'">'. $row['post_title'] .'</a> ';		
			}
			?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->widget('application.components.Social');?>
