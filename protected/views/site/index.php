<?php  $this->widget('application.components.Slider');?>
<?php  $this->widget('application.components.Submenu');?>
<?php  $this->widget('application.components.Search');?>

<section class="gallery">
  <div class="container-full">
    <div class="gamma-container gamma-loading" id="gamma-container">
      <ul class="gamma-gallery">
        <?php
      
        foreach($GalleryPhotos as $row){
         
            
                $thumb = $row['gallery_thumb'];
                $photo = $row['galley_photo'];
            
            
            
        ?>
        <li>
          <div data-alt="<?php echo $row['gallery_photo_title'];?>"  data-max-width="1800" data-max-height="1350">
            <div data-src="<?=$photo;?>" data-min-width="1300"></div>
            <div data-src="<?=$photo;?>" data-min-width="1000"></div>
            <div data-src="<?=$photo;?>" data-min-width="700"></div>
            <div data-src="<?=$photo;?>" data-min-width="300"></div>
            <div data-src="<?=$thumb;?>" data-min-width="200"></div>
            <div data-src="<?=$thumb;?>" data-min-width="140"></div>
            <div data-src="<?=$thumb;?>"></div>
            <noscript>
            <img src="<?=$thumb;?>" alt="<?php echo $row['gallery_photo_title'];?>"/>
            </noscript>
          </div>
        </li>
        <?php
        } //for
        ?>
      </ul>
      <div class="gamma-overlay"></div>
    </div>
    <!----> 
    
  </div>
  <script src="<?=Yii::app()->params['domain']?>/assets/js/jquery.masonry.min.js"></script> 
  <script src="<?=Yii::app()->params['domain']?>/assets/js/jquery.history.js"></script> 
  <script src="<?=Yii::app()->params['domain']?>/assets/js/js-url.min.js"></script> 
  <script src="<?=Yii::app()->params['domain']?>/assets/js/jquerypp.custom.js"></script> 
  <script src="<?=Yii::app()->params['domain']?>/assets/js/gamma.js"></script> 
  <script type="text/javascript">
			
			$(function() {

				var GammaSettings = {
						// order is important!
						viewport : [ {
							width : 1200,
							columns : 5
						}, {
							width : 900,
							columns : 2
						}, {
							width : 500,
							columns : 1
						}, { 
							width : 320,
							columns : 1
						}, { 
							width : 0,
							columns : 1
						} ]
				};

				Gamma.init( GammaSettings );
			});

		</script>
  <div class="row">
    <div class="col-md-12 text-center">
      <nav>
        <?php
    $this->widget('CLinkPager', array(
            'currentPage'=>$page,
            'itemCount'=>$CountPhotos,
            'pageSize'=>Yii::app()->params['PhotosPerPage'],
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
  <?php $this->widget('application.components.Social');?>
  </div>
</section>
