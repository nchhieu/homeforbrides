<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="/"><img src="/images/logo.png"> </a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown "><a href="#" data-toggle="dropdown" role="button">About <span class="caret"></span></a>
       <ul class="dropdown-menu"> 
       <?php
       foreach($Aboutus as $row){
		   echo '<li>'. CHtml::link($row['subcat_name'], array('about/index','alias'=>$row['subcat_alias'],'id'=>$row['subcat_id']),array('title'=>$row['subcat_name'])) .'</li>';
	   }
		?>
        </ul>
        
        </li>
        
        <li class="dropdown "><a href="#" data-toggle="dropdown" role="button">Info <span class="caret"></span></a>
       <ul class="dropdown-menu"> 
       <?php
       foreach($Info as $row){
		   echo '<li>'. CHtml::link($row['subcat_name'], array('info/index','alias'=>$row['subcat_alias'],'id'=>$row['subcat_id']),array('title'=>$row['subcat_name'])) .'</li>';
	   }
		?>
        </ul>
        
        </li>
        
        <li><?php echo CHtml::link('Blog', array('blogs/index')); ?></li>
        <li><?php echo CHtml::link('Prices', array('price/index')); ?></li>
        <!--li><?php echo CHtml::link('Info', array('resource/index')); ?></li-->
        <li><?php echo CHtml::link('Contact us', array('site/contact')); ?></li>
        
        
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>