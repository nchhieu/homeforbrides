<?php // $this->widget('application.components.Slider');?>
<?php $this->widget('application.components.Submenu');?>
<?php $this->widget('application.components.Search');?>

<div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <h1 class="title-page"><?php echo $Post->post_title;?></h1>
      </div>
      <div class="col-md-12 col-xs-12 social">
        <div class="fb-like pull-right" data-href="<?=Yii::app()->request->requestUri;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        <a href="javascript:history.go(-1)" class="btn btn-default btn-xs btn-back"> << Back to previous page </a> &nbsp; </div>
    </div>
    <div class="row">
      <div class="col-md-12 catintro"><?php echo $Post->post_intro;?></div>
    </div>
    <div class="row">
      <div class="col-md-8 blogdetail">
        <div class="row blog">
          <div class="col-md-12"> 
		  	<?php 
				$content = str_replace('<img ','<img class="lazy img-responsive" ',$PostContent->post_content);
				//$content = str_replace('src="','src="' . Yii::app()->params['domain2'],$content);
				echo $content;
			?> 
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sidebar">
          <div class="list-group"> <a href="#" class="list-group-item active"> Search by Category </a>
            <?php 
			foreach($SubCat as $row){
				//$CountPost = Post::model()->countByAttributes(array('subcat_id'=>$row['subcat_id'],'post_status'=>'Show','post_type'=>'0'));
				$url = Yii::app()->createUrl('blogs/cat',array('cat'=>$row['subcat_alias'],'id'=>$row['subcat_id']));
				echo '<a href="'. $url .'" class="list-group-item" title="'. $row['subcat_name'] .'"> '. $row['subcat_name'] .'</a> ';		
			}
			?>
          </div>
          <div class="list-group"> <a href="#" class="list-group-item active"> Search by months </a>
            <?php
		foreach($BlogbyMonth as $row){
			$url = Yii::app()->createUrl('blogs/bydate',array('date'=>$row['link']));
			echo '<a href="'. $url .'" class="list-group-item" title="'. $row['months'] .'"> '. $row['months'] .'</a>';
		}
      ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->widget('application.components.Social');?>
