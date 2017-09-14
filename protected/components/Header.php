<?php
class Header extends CWidget{	
	public function run(){
		$Aboutus =PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias','condition'=>'cat_id ='.Yii::app()->params['About'] .' AND subcat_status="Show"','order'=>'subcat_order')); 
		$Info =PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias','condition'=>'cat_id ='.Yii::app()->params['Info'] .' AND subcat_status="Show"','order'=>'subcat_order')); 
		$this->render('Header',array('Aboutus'=>$Aboutus,'Info'=>$Info));
	}	
}
?>
