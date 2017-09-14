<?php

class SiteController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout='//layouts/layout';
		// Main banner
		$MainBanner = Post::model()->findall(array('select'=>'post_id,post_intro','condition'=>'subcat_id= 49 AND post_status="Show"'));
		$arrManBanner = array();
		$i = 0;
		foreach($MainBanner as $row){
			$PostContent = PostContent::model()->find(array('select'=>'post_header_photo','condition'=>'post_id = ' . $row['post_id']));
			$arrManBanner[$i][0] = $PostContent->post_header_photo;
			$arrManBanner[$i][1] = $row['post_intro'];
			$i++;
		}
		
		// Righ Banner
		$RightBanner = Post::model()->findall(array('select'=>'post_thumb,post_title,post_intro','condition'=>'subcat_id= 48','order'=>'post_order DESC'));
		
		// About us
		$Aboutus = Post::model()->find(array('select'=>'post_id,post_title,post_intro','condition'=>'subcat_id= 50'));
		$AboutusContent = PostContent::model()->find(array('select'=>'post_content','condition'=>'post_id = ' . $Aboutus->post_id));
		
		// Blogs

		$SubCatBlog = PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_alias','condition'=>'cat_id= 5','order'=>'subcat_order '));
		$SubCat = array();
		$i = 0;
		foreach($SubCatBlog as $row){
			$SubCat[$row['subcat_id']] = $row['subcat_alias'];
			$i++;
		}
		
		
		$Post = Post::model()->findall(array('select'=>'post_id,subcat_id,post_title,post_alias,post_intro,post_thumb,post_added_time',
												 'condition'=>'cat_id= 5 AND post_status="Show"',
												 'limit'=>10,
												 'offset'=>0,
												 'order'=>'post_added_time DESC'));
												 
		$this->render('index',array('arrManBanner'=>$arrManBanner,'RightBanner'=>$RightBanner,
									'Aboutus'=>$Aboutus,'AboutusContent'=>$AboutusContent,
									'SubCat'=>$SubCat,'Post'=>$Post));
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionContact()
	{
		$this->layout='//layouts/contact';
		// Righ Banner
		$RightBanner = Post::model()->findall(array('select'=>'post_thumb,post_title,post_intro','condition'=>'subcat_id= 48','order'=>'post_order DESC'));
		
		
		if(isset($_POST['name']))
		{
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$headers .= 'From: Home for Brides - Contact us <homeforbrides@gmail.com>' . "\r\n";
			$subject = 'Contact us from homeforbrides.com at ' . date("m/d/Y h:i");
			
			
			$handle = fopen("./mail/contactus.html", "r");
			$templates = fread($handle, filesize("./mail/contactus.html"));
			fclose($handle);
			$templates = str_replace("#yourname#",				$_POST['name'],		$templates);
			$templates = str_replace("#time#",					date('Y-m-d H:i:s'),		$templates);
			$templates = str_replace("#email#",					$_POST['email'],			$templates);
			$templates = str_replace("#mobile#",				$_POST['phone'],		$templates);
			$templates = str_replace("#date#",					$_POST['date'],			$templates);
			$templates = str_replace("#where#",					$_POST['where'],			$templates);
			$templates = str_replace("#service#",				$_POST['service'],		$templates);
			$templates = str_replace("#hour#",					$_POST['hour'],			$templates);
			$templates = str_replace("#hear#",					$_POST['hear'],			$templates);
			$templates = str_replace("#comment#",				$_POST['message'],		$templates);
			mail("homeforbrides@gmail.com", $subject, $templates, $headers);
			mail("nchhieu@yahoo.com", $subject, $templates, $headers);
			$this->redirect(array('thankyou'));
		}
		
		$this->render('contact',array('RightBanner'=>$RightBanner));
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionThankyou()
	{
		$this->layout='//layouts/contact';
		// Righ Banner
		$RightBanner = Post::model()->findall(array('select'=>'post_thumb,post_title,post_intro','condition'=>'subcat_id= 48','order'=>'post_order DESC'));
		
		$this->render('thankyou',array('RightBanner'=>$RightBanner));
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionAlbum()
	{
		$this->layout='//layouts/layout';
		$this->render('album',array());
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionAlbumdetail()
	{
		$this->layout='//layouts/layout';
		$this->render('albumdetail',array());
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionBlog()
	{
		$this->layout='//layouts/layout2';
		$this->render('blog',array());
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionBlogDetail()
	{
		$this->layout='//layouts/layout2';
		$this->render('blogdetail',array());
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