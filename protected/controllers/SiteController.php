<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$id =  Yii::app()->params['HomeGallery'];
		$Post = Post::model()->findbypk($id);
		
		$offset =0;
		$page = 0;
		$page = Yii::app()->request->getQuery('page');
		if($page > 0){
			$page = $page - 1;
			$offset = $page * Yii::app()->params['PhotosPerPage'];
		}
		
		
		$Post->post_views = $Post->post_views + 1;
		$Post->save();
		
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
		
		$this->layout='gallery';
		$this->render('index',array('Post'=>$Post,
									'PostSubcat'=>$PostSubcat,
									'GalleryPhotos'=>$GalleryPhotos,
									'PostSlider'=>$PostSlider,
									'PostContent'=>$PostContent,
									'CountPhotos'=>$CountPhotos,
									'page'=>$page));
	}
	
	public function actionSearch($tag_id, $key = '')
	{
		
		$offset =0;
		$page = 0;
		$page = Yii::app()->request->getQuery('page');
		if($page > 0){
			$page = $page - 1;
			$offset = $page * Yii::app()->params['CatPageSize'];
		}
		
		$Tags = array();
		
		$sql = 'select  tbl_post.post_title, tbl_post.post_thumb, tbl_post.post_id, tbl_post.post_alias, tbl_post_tags.tag_id , tbl_post_subcat.subcat_alias
from tbl_post INNER JOIN tbl_post_tags ON tbl_post.post_id = tbl_post_tags.post_id INNER JOIN tbl_post_subcat on tbl_post.subcat_id = tbl_post_subcat.subcat_id 
where 1=1 ';
		
		if($tag_id > 0){
			$sql .= ' AND tbl_post_tags.tag_id =' . $tag_id;
			$Tags = Tags::model()->findbypk($tag_id);
		}
		
		if($key !=''){
			$sql .=  ' AND tbl_post.post_id in (select post_id from tbl_keysearch where tbl_keysearch.keysearch like "%'. $key .'%")';
		}
		
		$sql .= ' GROUP BY tbl_post.post_id  ORDER BY tbl_post.post_id DESC';
		
		$PostSearch = Yii::app()->db->createCommand($sql)->queryAll();

		
		
		
		

		//$PostSearch = PostTags::model()->with('post')->findAll($q);
		//var_dump($Post);
		//exit();
			
		
		//$CountPost = Post::model()->count(array('condition'=>'cat_id='.$id . ' AND post_status="Show" '));
		//$CountPost =  100;
		
		$this->layout='main';
		$this->render('search',array('PostSearch'=>$PostSearch,
									'Tags'=>$Tags,
									'key'=>$key,
									'tag_id'=>$tag_id));
	}
	
	public function actionContact(){
		$PostCat = PostCat::model()->findbypk(Yii::app()->params['Contactus']);
		
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
			$this->redirect(array('contact','sent'=>'sent'));
		}
		
		
		$this->layout='main';
		$this->render('contact',array('PostCat'=>$PostCat));
	}
	
	
	private function deleterow($id){
		$GalleryPhotos = GalleryPhotos::model()->findbypk($id);
		$root = '/var/chroot/home/content/02/7489302/html/websites/homeforbrides.com';
		if($GalleryPhotos){
			@unlink($root . $GalleryPhotos['gallery_thumb']);
			@unlink($root . $GalleryPhotos['galley_photo']);
			$GalleryPhotos->delete();
			
			return true;
		}else{
			return false;
		}
		
	}
	
	public function actionGenThumb(){
		
		$GalleryPhotos = GalleryPhotos::model()->findall(array('condition'=>'chuyen_file=0','limit'=>40,'offset'=>0,'order'=> 'gallery_photo_id'));
		foreach($GalleryPhotos as $row){
			$Post = Post::model()->findbypk($row['post_id']);
			if($Post){
				$update_date = $Post['post_updated_date'];
				$temp = explode('-',$update_date);
				$year = $temp[0];
				$month = $temp[1];
				$day = $temp[2];
				$temp =explode(' ',$day);
				$day = $temp[0];
				$dest_folder = '/media/' . $year . '/' . $month . '/' . $day . '/';
				
				$filePath = $row['galley_photo'];
				$temp =  explode('/',$filePath);
				$file_name = $temp[count($temp) - 1];
				
				// thumb name
				$thumb = $row['gallery_thumb'];
				$temp =  explode('/',$thumb);
				$thumb_file_name = $temp[count($temp) - 1];
				
				
				$root = '/var/chroot/home/content/02/7489302/html/websites/homeforbrides.com';
				
				
				
				if(is_file($root.$filePath) ){
					copy($root.$filePath,$root. '/v2' .  $dest_folder.$file_name);
					// create thumb
					$smallimage = Yii::app()->image->load($root. '/v2' . $dest_folder.$file_name);
					$smallimage->resize(500, 0)->crop(400,300)->quality(80);
					$smallimage->save($root.'/v2' .$dest_folder.$thumb_file_name);
					
					$row->galley_photo = $dest_folder.$file_name;
					$row->gallery_thumb = $dest_folder.$thumb_file_name;
					$row->chuyen_file = 1;
					$row->save();
					echo $dest_folder.$file_name . '</br>' ;
					echo $dest_folder.$thumb_file_name. '</br>' ;
					echo '==========================================</br>';
					echo '<meta http-equiv="refresh" content="5">';
				}else{
					$this->deleterow($row['gallery_photo_id']);
				}
			}else{
				$this->deleterow($row['gallery_photo_id']);
			
			}
			
		}
		
		
	}
	
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