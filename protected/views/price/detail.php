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
				echo $PostContent->post_content;
			?> 
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sidebar">
          <div class="list-group"> <a href="#" class="list-group-item active"> Price </a>
            <?php 
			foreach($Posts as $row){
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
