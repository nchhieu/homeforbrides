<section class="topmenu">
  <div class="container">
    <div class="row">
      <div class="col-md-12 subtopmenu">
        <ul class="nav nav-pills ">
          <li><?php echo CHtml::link('PORTFOLIO', array('gallery/portfolio','alias'=>'portfolio-photography','id'=>815)); ?></li>
          <li role="presentation" class="dropdown">
          
          <?php echo CHtml::link('VIDEO', array('videography/index2'));?>
          <!--a href="#" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">VIDEO <span class="caret"></span></a>
            <ul class="dropdown-menu subsubmenu">
              <?php
			  foreach($Video as $row){
				  //echo '<li>'.CHtml::link($row['subcat_name'], array('videography/index','alias'=>$row['subcat_alias'],'id'=>$row['subcat_id'])) . '</li>';
			  }
              ?>
            
            </ul-->
          </li>
          <li><?php echo CHtml::link($WeddingGallery['cat_name'], array('gallery/cat','alias'=>$WeddingGallery['cat_alias'],'id'=>$WeddingGallery['cat_id'])); ?></li>
          
          <li><?php echo CHtml::link($LGBT['cat_name'], array('gallery/cat','alias'=>$LGBT['cat_alias'],'id'=>$LGBT['cat_id'])); ?></li>
          <li><?php echo CHtml::link($Cityhall['cat_name'], array('gallery/cat','alias'=>$Cityhall['cat_alias'],'id'=>$Cityhall['cat_id'])); ?></li>
          <li><?php echo CHtml::link('ENGAGEMENT', array('gallery/cat','alias'=>'engagement','id'=>11)); ?></li>
          <li><?php echo CHtml::link($LIFESTYLE['cat_name'], array('gallery/cat','alias'=>$LIFESTYLE['cat_alias'],'id'=>$LIFESTYLE['cat_id'])); ?></li>
          <li><?php echo CHtml::link($Associate['cat_name'], array('gallery/cat','alias'=>$Associate['cat_alias'],'id'=>$Associate['cat_id'])); ?></li>
        </ul>
      </div>
    </div>
  </div>
</section>
