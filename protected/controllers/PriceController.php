<?php

class PriceController extends Controller
{
	public function actionIndex()
	{
		// Price
		$Post = Post::model()->findAll(array('select'=>'post_id,subcat_id,post_title,post_thumb,post_intro,post_alias,post_views,post_added_time',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Price'],
											 'limit'=>10,
											 'offset'=>0,
											 'order'=>' post_order DESC'));
		$this->layout='main';
		$this->render('index',array('Post'=>$Post));
		
	}
	
	public function actionDetail($alias,$id)
	{
		$Post = Post::model()->findbypk($id);
		$Post->post_views = $Post->post_views+1;
		$Post->update();
		$PostContent = PostContent::model()->findbyPk($id);
		
		
		
		$PostContent = PostContent::model()->findbypk($id);
		
		// Price
		$Posts = Post::model()->findAll(array('select'=>'post_id,subcat_id,post_title,post_thumb,post_intro,post_alias,post_views,post_added_time',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Price'],
											 'limit'=>10,
											 'offset'=>0,
											 'order'=>' post_added_time DESC'));
		$this->layout='main';
		$this->render('detail',array('Posts'=>$Posts,'Post'=>$Post,'PostContent'=>$PostContent));
		
	}
	

	
}