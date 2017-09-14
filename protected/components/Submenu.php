<?php
class Submenu extends CWidget{	
	public function run(){
		$Associate = PostCat::model()->findbypk(17); 
		$WeddingGallery = PostCat::model()->findbypk(6); 
		$LGBT = PostCat::model()->findbypk(13); 
		$LIFESTYLE = PostCat::model()->findbypk(20); 
		$Cityhall = PostCat::model()->findbypk(7); 
		
		$Video =PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias','condition'=>'cat_id ='.Yii::app()->params['Videography'] .' AND subcat_status="Show"','order'=>'subcat_order')); 
		$this->render('Submenu',array('Video'=>$Video,
										'Associate'=>$Associate,
										'WeddingGallery'=>$WeddingGallery,
										'LGBT'=>$LGBT,
										'LIFESTYLE'=>$LIFESTYLE,
										'Cityhall'=>$Cityhall,
										));
	}	
}
?>
