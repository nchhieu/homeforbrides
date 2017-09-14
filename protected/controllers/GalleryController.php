<?php

class GalleryController extends Controller
{
	
	public function actionPortfolio($alias='', $id)
	{
		
		$Post = Post::model()->findbypk($id);
		
		$Post->post_views = $Post->post_views + 1;
		$Post->save();
		
		$offset =0;
		$page = 0;
		$page = Yii::app()->request->getQuery('page');
		if($page > 0){
			$page = $page - 1;
			$offset = $page * Yii::app()->params['PhotosPerPage'];
		}
		
		
		$PostSlider = PostSlider::model()->findall(array('select'=>'photos','condition'=>'post_id='.$id ,'order'=>'slider_sort'));
		
		$PostContent = PostContent::model()->findbyPk($id);
		$PostSubcat = PostSubcat::model()->findbypk($Post['subcat_id']);
		$GalleryPhotos = GalleryPhotos::model()->findAll(array('select'=>'gallery_photo_id,gallery_photo_title,gallery_thumb,galley_photo',
											 'condition'=>' post_id='. $id,
											 'order'=>' gallery_order',
											 'limit'=>Yii::app()->params['PhotosPerPage'],
											 'offset'=>$offset));

		$CountPhotos = GalleryPhotos::model()->count(array('condition'=>'post_id='.$id));
		
		
		$this->pageTitle = $Post->post_title;
		Yii::app()->clientScript->registerMetaTag($PostContent['meta_keyword'], 'keywords');
		Yii::app()->clientScript->registerMetaTag($PostContent['meta_description'], 'description');

		Yii::app()->clientScript->registerMetaTag($Post->post_title, null, null, array('property' => 'og:title'), 'og:title');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl($Post->post_thumb) , null, null, array('property' => 'og:image'), 'og:image');
		Yii::app()->clientScript->registerMetaTag($Post->post_intro, null, null, array('property' => 'og:description'), 'og:description');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl(Yii::app()->request->url), null, null, array('property' => 'og:url'), $Post->post_title);
		Yii::app()->clientScript->registerMetaTag('https://www.facebook.com/HomeforBrides', null, null, array('property' => 'article:publisher'), 'article:publisher');
		Yii::app()->clientScript->registerMetaTag($Post->post_updated_date, null, null, array('property' => 'article:published_time'), 'article:published_time');
		
		$this->layout='//layouts/gallery';
		$this->render('portfolio',array('Post'=>$Post,
						'PostSubcat'=>$PostSubcat,
						'GalleryPhotos'=>$GalleryPhotos,
						'PostSlider'=>$PostSlider,
						'PostContent'=>$PostContent,
						'CountPhotos'=>$CountPhotos,
						'page'=>$page));
		
	}
	
	public function actionSort($id)
	{
		$GalleryPhotos = GalleryPhotos::model()->findAll(array('select'=>'gallery_photo_id',
											 'condition'=>' post_id='. $id,
											 'order'=>' gallery_order DESC'));
		$i=0;
		foreach($GalleryPhotos as $row){
			$i++;
			
			$model = GalleryPhotos::model()->findbypk($row['gallery_photo_id']);
			echo $model->gallery_order . '-' . $i. '</br>';
			$model->gallery_order = $i;
			$model->save(false);
			
		}
	}
	
	public function actionCat($alias='', $id)
	{
		
		$id = (int)$id;

		$PostCat = PostCat::model()->findbypk($id);
		$offset =0;
		$page = 0;
		$page = Yii::app()->request->getQuery('page');
		if($page > 0){
			$page = $page - 1;
			$offset = $page * Yii::app()->params['CatPageSize'];
		}
		
		$Post = Post::model()->findall(array(	'select'=>'post_id,post_title,post_thumb,post_intro,post_alias',
												'condition'=>'cat_id='.$id . ' AND post_status="Show" ' ,
												'order'=>'post_order DESC',
												'limit'=>Yii::app()->params['CatPageSize'],
												'offset'=>$offset));
												
		$CountPost = Post::model()->count(array('condition'=>'cat_id='.$id . ' AND post_status="Show" '));
		
		
		
		$Slider1 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.$id .' AND slider_position=0 AND  slider_status="Show"','order'=>'slider_sort'));
		$Slider2 = PostCatSlider::model()->findall(array('select'=>'slider_photos,slider_url','condition'=>'cat_id='.$id .' AND slider_position=1 AND  slider_status="Show"','order'=>'slider_sort'));
		
		$this->pageTitle = $PostCat->cat_name;
		Yii::app()->clientScript->registerMetaTag($PostCat['cat_keyword'], 'keywords');
		Yii::app()->clientScript->registerMetaTag($PostCat['cat_description'], 'description');

		Yii::app()->clientScript->registerMetaTag($PostCat->cat_name, null, null, array('property' => 'og:title'), 'og:title');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl($PostCat->cat_thumb) , null, null, array('property' => 'og:image'), 'og:image');
		Yii::app()->clientScript->registerMetaTag($PostCat->cat_description, null, null, array('property' => 'og:description'), 'og:description');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl(Yii::app()->request->url), null, null, array('property' => 'og:url'), $PostCat->cat_name);
		Yii::app()->clientScript->registerMetaTag('https://www.facebook.com/HomeforBrides', null, null, array('property' => 'article:publisher'), 'article:publisher');
		Yii::app()->clientScript->registerMetaTag($PostCat->cat_updated_time, null, null, array('property' => 'article:published_time'), 'article:published_time');
		
		$this->layout='//layouts/main';
		$this->render('cat',array('PostCat'=>$PostCat,'Post'=>$Post,'Slider1'=>$Slider1,'Slider2'=>$Slider2,'CountPost'=>$CountPost,'page'=>$page));
		
	}
	
	public function actionAlbum($subcat='',$alias='', $id)
	{
		
		$Post = Post::model()->findbypk($id);
		
		$Post->post_views = $Post->post_views + 1;
		$Post->save();
		
		$offset =0;
		$page = 0;
		$page = Yii::app()->request->getQuery('page');
		if($page > 0){
			$page = $page - 1;
			$offset = $page * Yii::app()->params['PhotosPerPage'];
		}
		
		$PostSlider = PostSlider::model()->findall(array('select'=>'photos','condition'=>'post_id='.$id . ' AND slider_position=0'  ,'order'=>'slider_sort'));
		
		$SmallPostSlider = PostSlider::model()->findall(array('select'=>'photos','condition'=>'post_id='.$id . ' AND slider_position=1'  ,'order'=>'slider_sort'));
		
		$PostContent = PostContent::model()->findbyPk($id);
		$PostSubcat = PostSubcat::model()->findbypk($Post['subcat_id']);
		$GalleryPhotos = GalleryPhotos::model()->findAll(array('select'=>'gallery_photo_id,gallery_photo_title,gallery_thumb,galley_photo',
											 'condition'=>' post_id='. $id,
											 'order'=>' gallery_order DESC',
											 'limit'=>Yii::app()->params['PhotosPerPage'],
											 'offset'=>$offset));
											 
		$CountPhotos = GalleryPhotos::model()->count(array('condition'=>'post_id='.$id));
											 
		$this->pageTitle = $Post->post_title;
		Yii::app()->clientScript->registerMetaTag($PostContent['meta_keyword'], 'keywords');
		Yii::app()->clientScript->registerMetaTag($PostContent['meta_description'], 'description');

		Yii::app()->clientScript->registerMetaTag($Post->post_title, null, null, array('property' => 'og:title'), 'og:title');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl($Post->post_thumb) , null, null, array('property' => 'og:image'), 'og:image');
		Yii::app()->clientScript->registerMetaTag($Post->post_intro, null, null, array('property' => 'og:description'), 'og:description');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl(Yii::app()->request->url), null, null, array('property' => 'og:url'), $Post->post_title);
		Yii::app()->clientScript->registerMetaTag('https://www.facebook.com/HomeforBrides', null, null, array('property' => 'article:publisher'), 'article:publisher');
		Yii::app()->clientScript->registerMetaTag($Post->post_updated_date, null, null, array('property' => 'article:published_time'), 'article:published_time');
		
		$this->layout='gallery';
		$this->render('album',array('Post'=>$Post,
									'PostSubcat'=>$PostSubcat,
									'GalleryPhotos'=>$GalleryPhotos,
									'PostSlider'=>$PostSlider,
									'SmallPostSlider'=>$SmallPostSlider,
									'PostContent'=>$PostContent,
									'CountPhotos'=>$CountPhotos,
									'page'=>$page));
		
	}
}
