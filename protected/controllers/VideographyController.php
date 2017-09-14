<?php

class VideographyController extends Controller
{
	public function actionIndex($alias,$id)
	{
		$id = (int)$id;
		
		$PostSubcat = PostSubcat::model()->findbypk($id);
		$offset =0;
		$page = 0;
		$page = Yii::app()->request->getQuery('page');
		if($page > 0){
			$page = $page - 1;
			$offset = $page * Yii::app()->params['CatPageSize'];
		}
		
		$Post = Post::model()->findall(array(	'select'=>'post_id,post_title,post_thumb,post_intro,post_alias',
												'condition'=>'subcat_id='.$id . ' AND post_status="Show" ' ,
												'order'=>'post_order DESC',
												'limit'=>Yii::app()->params['CatPageSize'],
												'offset'=>$offset));
												
		$CountPost = Post::model()->count(array('condition'=>'subcat_id='.$id . ' AND post_status="Show" '));
		
		
		
		$Slider1 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.Yii::app()->params['Videography'] .' AND slider_position=0 AND  slider_status="Show"','order'=>'slider_sort'));
		$Slider2 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.Yii::app()->params['Videography'] .' AND slider_position=1 AND  slider_status="Show"','order'=>'slider_sort'));
		
		$this->pageTitle = $PostSubcat->subcat_name;
		Yii::app()->clientScript->registerMetaTag($PostSubcat['subcat_thumb'], 'keywords');
		Yii::app()->clientScript->registerMetaTag($PostSubcat['subcat_description'], 'description');

		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_name, null, null, array('property' => 'og:title'), 'og:title');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl($PostSubcat->subcat_thumb) , null, null, array('property' => 'og:image'), 'og:image');
		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_description, null, null, array('property' => 'og:description'), 'og:description');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl(Yii::app()->request->url), null, null, array('property' => 'og:url'), $PostSubcat->subcat_name);
		Yii::app()->clientScript->registerMetaTag('https://www.facebook.com/HomeforBrides', null, null, array('property' => 'article:publisher'), 'article:publisher');
		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_updated_time, null, null, array('property' => 'article:published_time'), 'article:published_time');
		
		$this->layout='//layouts/video';
		$this->render('index',array('PostSubcat'=>$PostSubcat,'Post'=>$Post,'Slider1'=>$Slider1,'Slider2'=>$Slider2,'CountPost'=>$CountPost,'page'=>$page));
		
	}
	
	public function actionTopic($alias,$id)
	{
		$id = (int)$id;
		
		$PostSubcat = PostSubcat::model()->findbypk($id);
		/*
		$offset =0;
		$page = 0;
		$page = Yii::app()->request->getQuery('page');
		if($page > 0){
			$page = $page - 1;
			$offset = $page * Yii::app()->params['CatPageSize'];
		}
		*/
		
		$TopicVideo = TopicVideo::model()->findall(array('condition'=>' subcat_id='.$id . ' AND topic_status="Show"','order'=>'topic_sort'));
		
		
		$Slider1 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.Yii::app()->params['Videography'] .' AND slider_position=0 AND  slider_status="Show"','order'=>'slider_sort'));
		$Slider2 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.Yii::app()->params['Videography'] .' AND slider_position=1 AND  slider_status="Show"','order'=>'slider_sort'));
		
		$this->pageTitle = $PostSubcat->subcat_name;
		Yii::app()->clientScript->registerMetaTag($PostSubcat['subcat_thumb'], 'keywords');
		Yii::app()->clientScript->registerMetaTag($PostSubcat['subcat_description'], 'description');

		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_name, null, null, array('property' => 'og:title'), 'og:title');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl($PostSubcat->subcat_thumb) , null, null, array('property' => 'og:image'), 'og:image');
		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_description, null, null, array('property' => 'og:description'), 'og:description');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl(Yii::app()->request->url), null, null, array('property' => 'og:url'), $PostSubcat->subcat_name);
		Yii::app()->clientScript->registerMetaTag('https://www.facebook.com/HomeforBrides', null, null, array('property' => 'article:publisher'), 'article:publisher');
		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_updated_time, null, null, array('property' => 'article:published_time'), 'article:published_time');
		
		$this->layout='//layouts/video';
		$this->render('topic',array('PostSubcat'=>$PostSubcat,'TopicVideo'=>$TopicVideo,'Slider1'=>$Slider1,'Slider2'=>$Slider2));
		
	}
	
	public function actionTopicvideo($alias,$subcat_id, $topic_alias, $topic_id)
	{
		$subcat_id = (int)$subcat_id;
		$topic_id = (int)$topic_id;
		
		
		$PostSubcat = PostSubcat::model()->findbypk($subcat_id);
		$TopicVideo = TopicVideo::model()->findbypk($topic_id);
		$offset =0;
		$page = 0;
		$page = Yii::app()->request->getQuery('page');
		if($page > 0){
			$page = $page - 1;
			$offset = $page * Yii::app()->params['CatPageSize'];
		}
		
		$Post = Post::model()->findall(array(	'select'=>'post_id,post_title,post_thumb,post_intro,post_alias',
												'condition'=>'subcat_id='.$subcat_id . ' AND topic_id='. $topic_id .' AND post_status="Show" ' ,
												'order'=>'post_order DESC',
												'limit'=>Yii::app()->params['CatPageSize'],
												'offset'=>$offset));
												
		$CountPost = Post::model()->count(array('condition'=>'subcat_id='.$subcat_id . '  AND topic_id='. $topic_id .' AND post_status="Show" '));
		
		
		
		$Slider1 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.Yii::app()->params['Videography'] .' AND slider_position=0 AND  slider_status="Show"','order'=>'slider_sort'));
		$Slider2 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.Yii::app()->params['Videography'] .' AND slider_position=1 AND  slider_status="Show"','order'=>'slider_sort'));
		
		$this->pageTitle = $PostSubcat->subcat_name;
		Yii::app()->clientScript->registerMetaTag($PostSubcat['subcat_thumb'], 'keywords');
		Yii::app()->clientScript->registerMetaTag($PostSubcat['subcat_description'], 'description');

		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_name, null, null, array('property' => 'og:title'), 'og:title');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl($PostSubcat->subcat_thumb) , null, null, array('property' => 'og:image'), 'og:image');
		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_description, null, null, array('property' => 'og:description'), 'og:description');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl(Yii::app()->request->url), null, null, array('property' => 'og:url'), $PostSubcat->subcat_name);
		Yii::app()->clientScript->registerMetaTag('https://www.facebook.com/HomeforBrides', null, null, array('property' => 'article:publisher'), 'article:publisher');
		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_updated_time, null, null, array('property' => 'article:published_time'), 'article:published_time');
		
		$this->layout='//layouts/video';
		$this->render('topicvideo',array('PostSubcat'=>$PostSubcat,'TopicVideo'=>$TopicVideo,'Post'=>$Post,'Slider1'=>$Slider1,'Slider2'=>$Slider2,'CountPost'=>$CountPost,'page'=>$page));
		
	}
	
	public function actionIndex2()
	{
		$id = (int)$id;
		$PostCat = PostCat::model()->findbypk(Yii::app()->params['Videography']);
		$PostSubcat = PostSubcat::model()->findall(array('condition'=>'cat_id='.Yii::app()->params['Videography'].' AND subcat_status="Show" ' ,'order'=>'subcat_order'));
	
		
		$Slider1 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.Yii::app()->params['Videography'] .' AND slider_position=0 AND  slider_status="Show"','order'=>'slider_sort'));
		$Slider2 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.Yii::app()->params['Videography'] .' AND slider_position=1 AND  slider_status="Show"','order'=>'slider_sort'));
		
		$this->pageTitle = $PostSubcat->subcat_name;
		Yii::app()->clientScript->registerMetaTag($PostSubcat['subcat_thumb'], 'keywords');
		Yii::app()->clientScript->registerMetaTag($PostSubcat['subcat_description'], 'description');

		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_name, null, null, array('property' => 'og:title'), 'og:title');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl($PostSubcat->subcat_thumb) , null, null, array('property' => 'og:image'), 'og:image');
		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_description, null, null, array('property' => 'og:description'), 'og:description');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl(Yii::app()->request->url), null, null, array('property' => 'og:url'), $PostSubcat->subcat_name);
		Yii::app()->clientScript->registerMetaTag('https://www.facebook.com/HomeforBrides', null, null, array('property' => 'article:publisher'), 'article:publisher');
		Yii::app()->clientScript->registerMetaTag($PostSubcat->subcat_updated_time, null, null, array('property' => 'article:published_time'), 'article:published_time');
		
		$this->layout='//layouts/video';
		$this->render('index2',array('PostCat'=>$PostCat,'PostSubcat'=>$PostSubcat,'Slider1'=>$Slider1,'Slider2'=>$Slider2));
		
	}
	
	/*
	public function actiondetaillist($alias,$id)
	{
		
		$PostSubcat = PostSubcat::model()->findbypk($id);
		$Posts = array();
		$arrPostContent = array();
		if($PostSubcat['subcat_as_post'] == 'Yes'){
			
			$Posts = Post::model()->findAll(array('select'=>'post_id,subcat_id,post_title,post_thumb,post_intro,post_alias,post_views,post_added_time',
											 'condition'=>'post_status="Show"  AND subcat_id='. $id,
											 //'limit'=>Yii::app()->params['pageSize'],
											 'offset'=>0,
											 'order'=>' post_order DESC'));
			$arrPostContent = array();
			$i = 0;
			foreach($Posts as $row){
				$PostContent = PostContent::model()->findbypk($row['post_id']);
				$arrPostContent[$i] = $PostContent->post_content;
				$i++;
				
			}
		
		
		}
		$this->layout='main';
		$this->render('detaillist',array('PostSubcat'=>$PostSubcat,'Posts'=>$Posts,'arrPostContent'=>$arrPostContent));
		
	}
	*/

	
}