<?php
class Slider extends CWidget{	
	public function run(){
		$PostCatSlider = PostCatSlider::model()->findAll(array('select'=>'post_cat_slider_id, slider_photos','condition'=>'cat_id=' . Yii::app()->params['HomeSlider'].'  AND slider_status="Show" AND slider_position=0','order'=>'slider_sort'));
		$this->render('Slider',array('PostCatSlider'=>$PostCatSlider));
	}	
}
?>
