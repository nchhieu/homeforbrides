<?php

class AboutController extends Controller
{
	public function actionIndex($alias,$id)
	{
		$Aboutus =PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias','condition'=>'cat_id ='.Yii::app()->params['About'] .' AND subcat_status="Show"','order'=>'subcat_order DESC')); 
		
		$DeailAboutus = PostSubcat::model()->findbypk($id);
		$Post = array();
		if($DeailAboutus['subcat_as_post'] == 'No' ){
			$Post = Post::model()->findall(array('select'=>'post_title,post_thumb,post_intro','condition'=>'subcat_id='. $id . ' AND post_status="Show"','order'=>' post_order '));
		}
		$this->layout='main';
		$this->render('index',array('DeailAboutus'=>$DeailAboutus,'Aboutus'=>$Aboutus, 'Post'=>$Post));
	}
}