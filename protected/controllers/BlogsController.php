<?php

class BlogsController extends Controller
{
	public function actionIndex()
	{
		$page = CHttpRequest::getParam('page');
		$page = intval($page);
		if($page > 0){
			$page = $page -1;
		}
		
		$PostCat = PostCat::model()->findbypk(Yii::app()->params['Blog']);
		
		
		// Blogs
		$Post = Post::model()->findAll(array('select'=>'post_id,subcat_id,post_title,post_thumb,post_intro,post_alias,post_views,post_added_time',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'],
											 'limit'=>Yii::app()->params['blogpageSize'],
											 'offset'=>Yii::app()->params['blogpageSize']*$page,
											 'order'=>' post_added_time DESC'));
		// Sub Cat
		$SubCat = PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias,subcat_thumb',
												 	  'condition'=>' cat_id='. Yii::app()->params['Blog'],
													  'order'=>' subcat_order' ));
													  
		// Blog by Month								  
		$BlogbyMonth = Post::model()->findAll(array('select'=>' DISTINCT DATE_FORMAT(post_added_time,"%M %Y") as months, DATE_FORMAT(post_added_time,"%Y-%m") as link ',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'],
											 'limit'=>20,
											 'order'=>' post_added_time DESC'));
											 
		$arrSubCat = array();
		foreach($SubCat as $row){
			$arrSubCat[$row['subcat_id']]['alias'] = $row['subcat_alias'];
			$arrSubCat[$row['subcat_id']]['name'] = $row['subcat_name'];
		}
		
		// Pagination
		$Count = Yii::app()->db->createCommand()
												->select(' count(*) as total')
												->from('tbl_post')
												->where('post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'])
												->queryScalar();
		
		$CPagination = new CPagination($Count);
        $CPagination->setPageSize(Yii::app()->params['blogpageSize']);
		
		$this->layout='main';
		$this->render('index',array('arrSubCat'=>$arrSubCat,'Post'=>$Post,'PostCat'=>$PostCat,'SubCat'=>$SubCat,'BlogbyMonth'=>$BlogbyMonth,'CPagination'=>$CPagination));
		
	}
	
	
	public function actionCat($cat,$id)
	{
		$page = CHttpRequest::getParam('page');
		$page = intval($page);
		if($page > 0){
			$page = $page -1;
		}
		$id = intval($id);
		// Blogs
		$Post = Post::model()->findAll(array('select'=>'post_id,subcat_id,post_title,post_thumb,post_intro,post_alias,post_views,post_added_time',
											 'condition'=>'post_status="Show" AND post_type=0 AND subcat_id='. $id,
											 'limit'=>Yii::app()->params['blogpageSize'],
											 'offset'=>Yii::app()->params['blogpageSize']*$page,
											 'order'=>' post_added_time DESC'));
											 
		// Sub Cat
		$SubCatBlog = PostSubcat::model()->findbyPk($id);
		
		// Sub Cat List
		$SubCat = PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias,subcat_thumb',
												 	  'condition'=>' cat_id='. Yii::app()->params['Blog'],
													  'order'=>' subcat_order' ));
													  
		// Blog by Month								  
		$BlogbyMonth = Post::model()->findAll(array('select'=>' DISTINCT DATE_FORMAT(post_added_time,"%M %Y") as months, DATE_FORMAT(post_added_time,"%Y-%m") as link ',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'],
											 'limit'=>20,
											 'order'=>' post_added_time DESC'));
											 
		$arrSubCat = array();
		foreach($SubCat as $row){
			$arrSubCat[$row['subcat_id']]['alias'] = $row['subcat_alias'];
			$arrSubCat[$row['subcat_id']]['name'] = $row['subcat_name'];
		}
		
		// Pagination
		$Count = Yii::app()->db->createCommand()
												->select(' count(*) as total')
												->from('tbl_post')
												->where('post_status="Show" AND post_type=0 AND subcat_id='. $id)
												->queryScalar();
		
		$CPagination = new CPagination($Count);
        $CPagination->setPageSize(Yii::app()->params['blogpageSize']);
		
		$this->layout='main';
		$this->render('cat',array('arrSubCat'=>$arrSubCat,'Post'=>$Post,'SubCat'=>$SubCat,'SubCatBlog'=>$SubCatBlog,'BlogbyMonth'=>$BlogbyMonth,'CPagination'=>$CPagination));
	}
	
	public function actionBydate($date,$page= 0)
	{
		$page = intval($page);
		$start = $date . '-01 00:00:00';
		$end = $date . '-31 59:59:59';
	 
		// Blogs
		$Post = Post::model()->findAll(array('select'=>'post_id,subcat_id,post_title,post_thumb,post_intro,post_alias,post_views,post_added_time',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'] . ' AND post_added_time > "'. $start .'" AND post_added_time < "'. $end .'"',
											 'limit'=>Yii::app()->params['pageSize'],
											 'offset'=>Yii::app()->params['pageSize']*$page,
											 'order'=>' post_added_time DESC'));
		
		// Recent posts
		$Recent = Post::model()->findAll(array('select'=>'post_id,subcat_id,post_title,post_thumb,post_intro,post_alias,post_views,post_added_time',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'],
											 'limit'=>3,
											 'offset'=>0,
											 'order'=>' post_added_time DESC'));											 
		// Sub Cat
		$SubCat = PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias,subcat_thumb',
												 	  'condition'=>' cat_id='. Yii::app()->params['Blog'],
													  'order'=>' subcat_order' ));
													  
		// Blog by Month								  
		$BlogbyMonth = Post::model()->findAll(array('select'=>' DISTINCT DATE_FORMAT(post_added_time,"%M %Y") as months, DATE_FORMAT(post_added_time,"%Y-%m") as link ',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'],
											 'order'=>' post_added_time DESC'));
											 
		$arrSubCat = array();
		foreach($SubCat as $row){
			$arrSubCat[$row['subcat_id']]['alias'] = $row['subcat_alias'];
			$arrSubCat[$row['subcat_id']]['name'] = $row['subcat_name'];
		}
		
		// Pagination
		$Count = Yii::app()->db->createCommand()
												->select(' count(*) as total')
												->from('tbl_post')
												->where('post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'] .' AND post_added_time > "'. $start .'" AND post_added_time < "'. $end .'"')
												->queryScalar();
		
		$CPagination = new CPagination($Count);
        $CPagination->setPageSize(Yii::app()->params['pageSize']);
		
		$this->layout='//layouts/main';
		$this->render('bydate',array('arrSubCat'=>$arrSubCat,'Post'=>$Post,'SubCat'=>$SubCat,'Recent'=>$Recent,'BlogbyMonth'=>$BlogbyMonth,'date'=>$date,'CPagination'=>$CPagination));
	}
	
	public function actionDetail($cat, $alias,$id)
	{
		$id = intval($id);
		// Blog Detail
		$Post = Post::model()->findbyPk($id);
		$Post->post_views = $Post->post_views+1;
		$Post->update();
		$PostContent = PostContent::model()->findbyPk($id);
		
		// Recent posts
		$Recent = Post::model()->findAll(array('select'=>'post_id,subcat_id,post_title,post_thumb,post_intro,post_alias,post_views,post_added_time',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'],
											 'limit'=>7,
											 'offset'=>0,
											 'order'=>' post_added_time DESC'));
		
		// Sub Cat
		$SubCat = PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias,subcat_thumb',
												 	  'condition'=>' cat_id='. Yii::app()->params['Blog'],
													  'order'=>' subcat_order' ));
		$arrSubCat = array();
		foreach($SubCat as $row){
			$arrSubCat[$row['subcat_id']]['alias'] = $row['subcat_alias'];
			$arrSubCat[$row['subcat_id']]['name'] = $row['subcat_name'];
		}
													  
		// Blog by Month								  
		$BlogbyMonth = Post::model()->findAll(array('select'=>' DISTINCT DATE_FORMAT(post_added_time,"%M %Y") as months, DATE_FORMAT(post_added_time,"%Y-%m") as link ',
											 'condition'=>'post_status="Show" AND post_type=0 AND cat_id='. Yii::app()->params['Blog'],
											 'limit'=>20,
											 'order'=>' post_added_time DESC'));
											 
		$this->pageTitle = $Post->post_title;
		Yii::app()->clientScript->registerMetaTag($PostContent['meta_keyword'], 'keywords');
		Yii::app()->clientScript->registerMetaTag($PostContent['meta_description'], 'description');

		Yii::app()->clientScript->registerMetaTag($Post->post_title, null, null, array('property' => 'og:title'), 'og:title');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl($Post->post_thumb) , null, null, array('property' => 'og:image'), 'og:image');
		Yii::app()->clientScript->registerMetaTag($Post->post_intro, null, null, array('property' => 'og:description'), 'og:description');
		Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl(Yii::app()->request->url), null, null, array('property' => 'og:url'), $Post->post_title);
		Yii::app()->clientScript->registerMetaTag('https://www.facebook.com/HomeforBrides', null, null, array('property' => 'article:publisher'), 'article:publisher');
		Yii::app()->clientScript->registerMetaTag($Post->post_updated_date, null, null, array('property' => 'article:published_time'), 'article:published_time');
		
													 
		$this->layout='main';
		$this->render('detail',array('Post'=>$Post,'PostContent'=>$PostContent,'arrSubCat'=>$arrSubCat,'Recent'=>$Recent,'SubCat'=>$SubCat,'BlogbyMonth'=>$BlogbyMonth));
	}	
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
}