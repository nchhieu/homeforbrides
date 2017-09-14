<?php

class ConvertController extends Controller
{	
	/*
	public function actionNews(){
		$News = News::model()->findAllByAttributes(array('news_type_id'=>13));
		$count = 0;
		$error = 0;
		foreach($News as $row){
			$Post = new Post;
			$Post->post_type =0;
			$Post->cat_id = 6;
			$Post->subcat_id = 34;
			$Post->post_title = $row['name'];
			$Post->post_thumb = $row['wide_thumbnail_url'];
			$Post->post_intro = $row['brief_intro'];
			$Post->post_alias = $row['friendly_url'];
			$Post->post_order = strtotime($row['add_time']);
			$Post->post_updated_date = $row['add_time'];
			$Post->admin_id = 1;
			if($Post->save()){
				$PostContent = new PostContent;
				$PostContent->post_id = $Post->post_id;
				$PostContent->post_header_photo = $row['wide_thumbnail_url'];
				$PostContent->post_content = $row['page_content'];
				$PostContent->meta_keyword = $row['name'];
				$PostContent->meta_description = $row['name'];
				if($PostContent->save()){ $count++;}
				else{
					$error++;
					echo $row['id'] .'| ';
				}
			}else{
				$error++;
					echo $row['id'] .'_| ';
			}
		}
		echo 'Input : ' . $count . '</br>Error :' . $error;
	}
	*/
	
	/*
	public function actionLocation(){
		$News = LocationSource::model()->findAllByAttributes(array('location_type_id'=>10));
		$count = 0;
		$error = 0;
		$city = array('','Tp. Hồ Chí Minh','Hà Nội','Đà Nẵng','Cần Thơ','Huế','Gia Lai','Hải Phòng');
		foreach($News as $row){
			$Post = new Post;
			$Post->post_type =4;
			$Post->cat_id = 1;
			$Post->subcat_id = 6;
			$Post->post_title = $row['name'];
			$Post->post_thumb = $row['wide_thumbnail_url'];
			$Post->post_intro = $row['brief_intro'];
			$Post->post_alias = $row['friendly_url'];
			$Post->post_order = strtotime($row['add_time']);
			$Post->post_updated_date = $row['add_time'];
			$Post->admin_id = 1;
			if($Post->save()){
				$PostContent = new PostContent;
				$PostContent->post_id = $Post->post_id;
				$PostContent->post_header_photo = $row['wide_thumbnail_url'];
				$PostContent->post_content = $row['page_content'];
				$PostContent->meta_keyword = $row['name'];
				$PostContent->meta_description = $row['name'];
				if($PostContent->save()){ 
					$count++;
					$Location = new Location;
					$Location->location_status = 'Hien';
					$Location->post_id = $Post->post_id;
					$Location->location_name = $Post->post_title;
					$Location->city_id = $row['city_id'];
					$Location->city_name = $city[$row['city_id']];
					$Location->location_address = $row['address'];
					if($Location->save()){
						$count++;
					}else{
						$error++;
						echo $row['id'] .'| ';
					}
				}
				else{
					$error++;
					echo $row['id'] .'| ';
				}
			}else{
				$error++;
					echo $row['id'] .'_| ';
			}
		}
		echo 'Input : ' . $count . '</br>Error :' . $error;
	}
	*/
	/*
	public function actionUpdateLocation(){
		$News = LocationSource::model()->findAll();
		foreach($News as $row){
			$Location = Location::model()->findByAttributes(array('location_name'=>$row['name']));
			if($Location){
				$Location->old_id = $row['id'];
				$Location->save();
			}
		}
	}
	*/
	
	/*
	public function actionAlbum(){
		$News = AlbumSource::model()->findAll(array('limit'=>'200','offset'=>'0'));
		$count = 0;
		$error = 0;
		foreach($News as $row){
			$Post = new Post;
			$Post->post_type =1;
			$Post->cat_id = 6;
			$Post->subcat_id = 34;
			$Post->post_title = $row['name'];
			$Post->post_thumb = $row['wide_thumbnail_url'];
			$Post->post_alias = $row['friendly_url'];
			$Post->post_order = strtotime($row['add_time']);
			$Post->post_updated_date = $row['add_time'];
			$Post->admin_id = 1;
			if($Post->save()){
				$PostContent = new PostContent;
				$PostContent->post_id = $Post->post_id;
				$PostContent->post_header_photo = $row['wide_thumbnail_url'];
				$PostContent->meta_keyword = $row['name'];
				$PostContent->meta_description = $row['name'];
				if($PostContent->save()){
					$count++;
					$Gallery = new Gallery;
					$Gallery->old_id = $row['id'];
					$Gallery->gallery_status = 'Hien';
					$Gallery->post_id = $Post->post_id;
					$Gallery->gallery_name = $Post->post_title;
					$Gallery->gallery_taken_time = $row['taken_time'];
					
					$Location = Location::model()->findByAttributes(array('old_id'=>$row['location_id']) );
					if($Location){
						$Gallery->location_id = $Location->location_id;
						$Gallery->location_name = $Location->location_name;
					}
					
					$Gallery->photographer_name = $row['photographer'];
					if($Gallery->save()){
						$count++;
					}else{
						$error++;
						echo $row['id'] .'| ';
					}
					
					
				}
				else{
					$error++;
					echo $row['id'] .'| ';
				}
			}else{
				$error++;
				echo $row['id'] .'_| ';
			}
		
		*/
		
	/*
	public function actionAlbumPhoto($page){
		$start = 0;
		$start = ($page - 1) * 2;
		$page = $page + 1 ;
		echo $page.'_';
		$News = Gallery::model()->findAll(array('limit'=>'2','offset'=> $start ));
		$count = 0;
		$error = 0;
		foreach($News as $row){
			$i= 0;
			$PhotoSource = PhotoSource::model()->findAllByAttributes( array('album_id'=>$row['old_id']) );
			if($PhotoSource){
				foreach($PhotoSource as $row2){
					$ThumbnailSource = ThumbnailSource::model()->findbyPk($row2['full_photo_id']);
					if($ThumbnailSource){
						$i++;
						$GalleryPhotos = new GalleryPhotos;
						$GalleryPhotos->post_id = $row['post_id'];
						$GalleryPhotos->gallery_id = $row['gallery_id'];
						$GalleryPhotos->gallery_thumb = $row2['photo_url'];
						$GalleryPhotos->galley_photo = $ThumbnailSource->url;
						$GalleryPhotos->gallery_order = $i;
						if(!$GalleryPhotos->save()){  echo $row['old_id'] .'_| ';}
						
					} // if
					else{echo $row['old_id'] .'_| ';}
					
				} // for
			}else{
				$error++;
				echo $row['old_id'] .'_| ';
			}
		} // for
		
		$this->redirect(array('convert/AlbumPhoto','page'=>$page));
		
		// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL="index.php?r=convert/AlbumPhoto&page='. $page .'"><meta http-equiv="cache-control" content="no-cache" />';
	} // public
	*/
	
	/*
	public function actionAlbumPhotoCounter($page){
		$start = 0;
		$start = ($page - 1) * 100;
		$page = $page + 1 ;
		echo $page.'_';
		$News = Gallery::model()->findAll(array('limit'=>'100','offset'=> $start ));
		foreach($News as $row){
			$count = GalleryPhotos::model()->countByAttributes(array('gallery_id'=> $row['gallery_id']));
			$Gallery = Gallery::model()->findbyPk($row['gallery_id']);
			$Gallery->gallery_photos = $count;
			$Gallery->save();
		} // for
		$this->redirect(array('convert/AlbumPhotoCounter','page'=>$page));
	} // public
	*/
	
	
	/*
	public function actionVideo(){
		$News = VideoSource::model()->findAll();
		$count = 0;
		$error = 0;
		foreach($News as $row){
			$Post = new Post;
			$Post->post_type = 2;
			$Post->cat_id = 13;
			$Post->subcat_id = 35;
			$Post->post_title = $row['name'];
			$Post->post_thumb = $row['square_thumbnail_url'];
			$Post->post_alias = $row['friendly_url'];
			$Post->post_order = strtotime($row['add_time']);
			$Post->post_updated_date = $row['add_time'];
			$Post->admin_id = 1;
			if($Post->save()){
				$PostContent = new PostContent;
				$PostContent->post_id = $Post->post_id;
				$PostContent->post_header_photo = $row['large_thumbnail_url'];
				$PostContent->meta_keyword = $row['name'];
				$PostContent->meta_description = $row['name'];
				if($PostContent->save()){
					$count++;
					$Video = new Video;
					$Video->post_id = $Post->post_id;
					$Video->video_name = $Post->post_title;
					$Video->youtube_code = $row['youtube_vid'];
					$Video->video_duration = '00:'.$row['duration'];
					$Video->video_status = 'Hien';
					if($Video->save()){
						$count++;
					}else{
						$error++;
						echo $row['id'] .'| ';
					}
					
					
				}
				else{
					$error++;
					echo $row['id'] .'| ';
				}
			}else{
				$error++;
				echo $row['id'] .'_| ';
			}
		}
	}
	*/
}