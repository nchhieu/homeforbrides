<?php // $this->widget('application.components.Slider');?>
<?php $this->widget('application.components.Submenu');?>
<?php $this->widget('application.components.Search');?>


<div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <h1 class="title-page"><?php echo date('F Y',strtotime($date.'-01'));?></h1>
      </div>
      <div class="col-md-12 col-xs-12 social">
        <div class="fb-like pull-right" data-href="<?=Yii::app()->request->requestUri;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        <a href="javascript:history.go(-1)" class="btn btn-default btn-xs btn-back"> << Back to previous page </a> &nbsp; </div>
    </div>
    <!--div class="row">
      <div class="col-md-12 catintro"><?php echo $SubCatBlog['subcat_intro'];?></div>
    </div-->
    <div class="row">
      <div class="col-md-8 bloglist">
        <?php
		$i=0;
		foreach($Post as $row){
			$i++;
			$subcat_name = '';
			
			if(strpos($row['post_thumb'],'photos/') > 0){
				$thumb = Yii::app()->params['domain2'].$row['post_thumb'];
			}else{
				$thumb = Yii::app()->params['domain'].$row['post_thumb'];
			}
			

			if($thumb == ''){ $thumb  = '/images/home_for_brides.png';}
			if($row['subcat_id'] > 0){
				$subcat_alias = $arrSubCat[$row['subcat_id']]['alias'];
				$subcat_name = $arrSubCat[$row['subcat_id']]['name'];
			}else{
				$subcat_alias = 'wedding-photographer-blogs';
			}
			$url = Yii::app()->createUrl('blogs/detail',array('cat'=>$subcat_alias,'alias'=>$row['post_alias'],'id'=>$row['post_id']));
        ?>
        <div class="row blog">
          <div class="col-md-6"><a href="<?php echo $url;?>" title="<?=$row['post_title'];?>"><img src="<?=$thumb;?>" class="img-responsive"  alt="<?=$row['post_title'];?>"></a></div>
          <div class="col-md-6"><a href="<?php echo $url;?>" class="blogtitle" title="<?=$row['post_title'];?>">
            <?=$row['post_title'];?>
            </a>
            <div class="meta">
              <ul class="list-unstyled list-inline blog-info" style="margin:10px 0px">
                <li>
                  <div class="fb-like" data-href="<?=Yii::app()->params['domain'].$url;?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
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
        <div class="row">
          <div class="col-md-12 text-center">
            <nav>
              <?php $this->widget('CLinkPager', array(
							'pages'=>$CPagination,
							'htmlOptions'=>array('class'=>'pagination'),
							'maxButtonCount'=>5,
							'nextPageLabel'=>' » ',
							'prevPageLabel'=>' « ','id'=>'pagelink',
							'selectedPageCssClass'=>'active',
							'header'=>'',)); ?>
            </nav>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sidebar">
         <div class="list-group"> <a href="#" class="list-group-item active"> Search by months </a>
            <?php
			$i=0;
		foreach($BlogbyMonth as $row){
			$i++;
			$url = Yii::app()->createUrl('blogs/bydate',array('date'=>$row['link']));
			if($i==10){ echo ' <div class="collapse" id="collapseExample">';}
			echo '<a href="'. $url .'" class="list-group-item" title="'. $row['months'] .'"> '. $row['months'] .'</a>';
		}
		if($i>10){echo '</div>';}
      ?>
      	 <a href="javascript:void();" class="list-group-item " data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">View more</a>
          </div>
          
          <div class="list-group"> <a href="#" class="list-group-item active"> Search by Category </a>
            <?php 
			foreach($SubCat as $row){
				//$CountPost = Post::model()->countByAttributes(array('subcat_id'=>$row['subcat_id'],'post_status'=>'Show','post_type'=>'0'));
				$url = Yii::app()->createUrl('blogs/cat',array('cat'=>$row['subcat_alias'],'id'=>$row['subcat_id']));
				echo '<a href="'. $url .'" class="list-group-item" title="'. $row['subcat_name'] .'">'. $row['subcat_name'] .'</a> ';		
			}
			?>
          </div>
         
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->widget('application.components.Social');?>
