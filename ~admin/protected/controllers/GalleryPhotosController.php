<?php

class GalleryPhotosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/user';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','Ajax','UploadFilesPlupload','UpdatePhoto','Empty','Sort','UpdateSort','Copyhome','Copytosmallslider','Copytolargeslider'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'expression'=>'(Yii::app()->user->getState("admin_group")=="Admin")',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionSort($gallery_id)
	{
	
		$model = GalleryPhotos::model()->findall(
			array(
			'select'=>'gallery_photo_id, gallery_thumb',
			'order'=>'gallery_order DESC',
			'condition'=>'post_id ='.$gallery_id,
			)
			);
		$this->render('sort',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdateSort()
	{
		$counter = count($_POST['ID']);
		if(isset($_POST['ID'])){
			$newOrder = $_POST['ID'];
			foreach ($newOrder as $recordIDValue) {
			  //echo $recordIDValue . ' | ';
			  GalleryPhotos::model()->updateByPk($recordIDValue,array('gallery_order'=>$counter));
			  $counter = $counter - 1;
			}
		}
		
	
	}
	
	protected function Thumb($data, $row){
		$str = '<a href="'. $data->galley_photo .'" target="_blank"><img src="'. $data->gallery_thumb .'" height="40" ></a>';
		return $str;
	}
	
	protected function Showhome($data, $row){
		$str = CHtml::link('<button class="btn btn-primary"><i class="fa fa-home"></i></button>',array('GalleryPhotos/Copyhome','id'=>$data->gallery_photo_id));
		return $str;
	}
	
	
	protected function ShowLargeSlider($data, $row){
		$str = CHtml::link('<button class="btn btn-primary"><i class="fa fa-picture-o"></i></button>',array('GalleryPhotos/Copytolargeslider','id'=>$data->gallery_photo_id));
		return $str;
	}
	
	protected function ShowSlider($data, $row){
		$str = CHtml::link('<button class="btn btn-primary"><i class="fa fa-picture-o"></i></button>',array('GalleryPhotos/Copytosmallslider','id'=>$data->gallery_photo_id));
		return $str;
	}
	
	public function actionCopytolargeslider($id)
	{
		$id = (int)$id;
		$GalleryPhotos = GalleryPhotos::model()->findbypk($id);
		if($GalleryPhotos){
			
			$SortPostSlider = PostSlider::model()->find(array('condition'=>'post_id ='.$GalleryPhotos['post_id'] . ' AND slider_position=0' ,'order'=>'slider_sort DESC'));
			if($SortPostSlider){
				$slider_sort = $SortPostSlider['slider_sort'] + 1;
			}else{
				$slider_sort = 1;
			}
			
			$PostSlider = new PostSlider;
			$PostSlider->post_id = $GalleryPhotos['post_id'];
			$PostSlider->photos = $GalleryPhotos['galley_photo'];
			$PostSlider->slider_position = 0;
			$PostSlider->slider_sort = $slider_sort;
			$PostSlider->save(false);
			
			// copy file
			$galley_photo = $PostSlider->photos;
			$temp = explode('/',$galley_photo);
			$filename = $temp[count($temp) -1];
			$newfilename = $PostSlider->post_slider_id . rand(0,1000) . '-' . $filename;
			copy('..'. $galley_photo, '../media/' . date('Y/m/d') .'/' . $newfilename);
			$PostSlider->photos = '/media/' . date('Y/m/d') .'/' . $newfilename;
			
			$PostSlider->save(false);
			
			$this->redirect(array('admin','gallery_id'=>$GalleryPhotos['post_id']));
		}
		
	}
	
	public function actionCopytosmallslider($id)
	{
		$id = (int)$id;
		$GalleryPhotos = GalleryPhotos::model()->findbypk($id);
		if($GalleryPhotos){
			
			$SortPostSlider = PostSlider::model()->find(array('condition'=>'post_id ='.$GalleryPhotos['post_id'] . ' AND slider_position=1' ,'order'=>'slider_sort DESC'));
			if($SortPostSlider){
				$slider_sort = $SortPostSlider['slider_sort'] + 1;
			}else{
				$slider_sort = 1;
			}
			
			$PostSlider = new PostSlider;
			$PostSlider->post_id = $GalleryPhotos['post_id'];
			$PostSlider->photos = $GalleryPhotos['galley_photo'];
			$PostSlider->slider_position = 1;
			$PostSlider->slider_sort = $slider_sort;
			$PostSlider->save(false);
			
			// copy file
			$galley_photo = $PostSlider->photos;
			$temp = explode('/',$galley_photo);
			$filename = $temp[count($temp) -1];
			$newfilename = $PostSlider->post_slider_id . rand(0,1000) . '-' . $filename;
			copy('..'. $galley_photo, '../media/' . date('Y/m/d') .'/' . $newfilename);
			$PostSlider->photos = '/media/' . date('Y/m/d') .'/' . $newfilename;
			
			$PostSlider->save(false);
			
			$this->redirect(array('admin','gallery_id'=>$GalleryPhotos['post_id']));
		}
		
	}
	
	
	public function actionCopyhome($id)
	{
		$id = (int)$id;
		$GalleryPhotos = GalleryPhotos::model()->findbypk($id);
		if($GalleryPhotos){
			
			$HomeGallery = GalleryPhotos::model()->find(array('condition'=>'post_id ='.Yii::app()->params['HomeGallery'],'order'=>'gallery_order'));
			
			$newPhoto = new GalleryPhotos();
			$newPhoto->post_id = Yii::app()->params['HomeGallery'];
			$newPhoto->step_id = $GalleryPhotos['step_id'];
			$newPhoto->gallery_photo_title = $GalleryPhotos['gallery_photo_title'];
			$newPhoto->gallery_photo_alias = $GalleryPhotos['gallery_photo_alias'];
			$newPhoto->gallery_thumb = $GalleryPhotos['gallery_thumb'];
			$newPhoto->galley_photo = $GalleryPhotos['galley_photo'];
			$newPhoto->gallery_order = $HomeGallery['gallery_order'] - 1;
			$newPhoto->gallery_order = 0;
			$newPhoto->old_id = $GalleryPhotos['old_id'];
			$newPhoto->save(false);
			
			
			
			// copy file
			$gallery_thumb = $newPhoto->gallery_thumb;
			$temp = explode('/',$gallery_thumb);
			$filename = $temp[count($temp) -1];
			$newfilename = $newPhoto->gallery_photo_id . '-' . $filename;
			copy('..'. $gallery_thumb, '../media/' . date('Y/m/d') .'/' . $newfilename);
			$newPhoto->gallery_thumb = '/media/' . date('Y/m/d') .'/' . $newfilename;
			
			$galley_photo = $newPhoto->galley_photo;
			$temp = explode('/',$galley_photo);
			$filename = $temp[count($temp) -1];
			$newfilename = $newPhoto->gallery_photo_id . '-' . $filename;
			copy('..'. $galley_photo, '../media/' . date('Y/m/d') .'/' . $newfilename);
			$newPhoto->galley_photo = '/media/' . date('Y/m/d') .'/' . $newfilename;
			
			$newPhoto->save(false);
			
			$this->redirect(array('admin','gallery_id'=>$GalleryPhotos['post_id']));
		}
		
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionUpdatePhoto($page=0){
		$i =0;
		$GalleryPhotos = GalleryPhotos::model()->findall(array('select'=>'gallery_photo_id, gallery_thumb, galley_photo','limit'=>100,'offset'=>100*$page,'order'=>'post_id DESC'));
		if(count($GalleryPhotos) > 0){
			echo '<meta http-equiv="refresh" content="2;url=index.php?r=GalleryPhotos/UpdatePhoto&page='. ($page + 1 ). '">';
			foreach($GalleryPhotos as $row){
				$i++;
				$galley_photo = $row['galley_photo'];
				$gallery_thumb = $row['gallery_thumb'];
				@unlink('..'.$gallery_thumb);
				if(is_file('..'.$galley_photo)){
					@$smallimage = Yii::app()->image->load('..'.$galley_photo);
					@$smallimage->resize(600, 0)->crop(600,450)->quality(100);
					@$smallimage->save('..'.$gallery_thumb);
					echo $i . ' - ' . $row['gallery_photo_id'] . ' : ' . $gallery_thumb . '</br>';
				}else{
					echo 'Error ' . ' - ' . $row['gallery_photo_id'] .' : ' . $gallery_thumb . '</br>';;
				}
			}
		}
	}
	
	public function actionUploadFilesPlupload($gallery_id , $logo = 1){
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		// Settings
		$stringHelper = new StringHelper();
		$Post=Post::model()->findbyPk($gallery_id);
		//$StartOrder = GalleryPhotos::model()->countByAttributes(array('post_id'=> $gallery_id));
		$GalleryPhotos = GalleryPhotos::model()->find(array('condition'=>'post_id = '. $gallery_id , 'order'=>'gallery_order','limit'=>1, 'offset'=>0));
		if($GalleryPhotos){
			$StartOrder = $GalleryPhotos['gallery_order'] - 1;
		}else{
			$StartOrder = 1000;;
		}
		
		
		
		/*
		$Photos = GalleryPhotos::model()->find(array('select'=>'gallery_order','condition'=>'post_id='.$gallery_id,'order'=>'gallery_order'));
		if($Photos){
			$gallery_order = $Photos['gallery_order'] - 1;
		}else{
			$gallery_order = strtotime(date('Y-m-d H:i:s'));
		}
		*/
		
		
		$alias = $stringHelper->StrRewrite($Post->post_title);
		
		$rand = rand(0,1000);
		$targetDir = '../media/' . date('Y/m/d');
		$targetShow = '/media/' . date('Y/m/d');
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds
		
		// 5 minutes execution time
		@set_time_limit(5 * 60);
		
		// Uncomment this one to fake upload time
		// usleep(5000);
		
		// Get parameters
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
		$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';
		
		// Clean the fileName for security reasons
		$fileName = preg_replace('/[^\w\._]+/', '_', $fileName);
		
		$temp =  explode('.',$fileName);
		
		$fileName = $gallery_id . '_' . $alias .'_' . $rand . '_' . $StartOrder . '.' . $temp[count($temp) - 1];
		$fileThumb = $gallery_id . '_' . $alias .'_' . $rand . '_' . $StartOrder . '_thumb' . '.' . $temp[count($temp) - 1];
		
		//$fileName = $gallery_id . '_' . $temp[0] .'_' . $rand . '_' . $StartOrder . '.' . $temp[count($temp) - 1];
		//$fileThumb = $gallery_id . '_' . $temp[0] .'_' . $rand . '_' . $StartOrder . '_thumb' . '.' . $temp[count($temp) - 1];
		
		$filePath = $targetDir . '/' . $fileName;
		$fileUrl = $targetShow . '/' . $fileName;
		
		$filePathThum = $targetDir . '/' . $fileThumb;
		$fileUrlThumb = $targetShow . '/' . $fileThumb;

		
		// Remove old temp files	
		if ($cleanupTargetDir) {
			if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
				while (($file = readdir($dir)) !== false) {
					$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
		
					// Remove temp file if it is older than the max age and is not the current file
					if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
						@unlink($tmpfilePath);
					}
				}
				closedir($dir);
			} else {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}
		}	
		
		// Look for the content type header
		if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
			$contentType = $_SERVER["HTTP_CONTENT_TYPE"];
		
		if (isset($_SERVER["CONTENT_TYPE"]))
			$contentType = $_SERVER["CONTENT_TYPE"];
		
		// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
		if (strpos($contentType, "multipart") !== false) {
			if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
				// Open temp file
				$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
				if ($out) {
					// Read binary input stream and append it to temp file
					$in = @fopen($_FILES['file']['tmp_name'], "rb");
		
					if ($in) {
						while ($buff = fread($in, 4096))
							fwrite($out, $buff);
					} else
						die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
					@fclose($in);
					@fclose($out);
					@unlink($_FILES['file']['tmp_name']);
				} else
					die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
		} else {
			// Open temp file
			$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
			if ($out) {
				// Read binary input stream and append it to temp file
				$in = @fopen("php://input", "rb");
		
				if ($in) {
					while ($buff = fread($in, 4096))
						fwrite($out, $buff);
				} else
					die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		
				@fclose($in);
				@fclose($out);
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}
		
		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off 
			rename("{$filePath}.part", $filePath);
			
			// create thumb
			$image = Yii::app()->image->load($filePath);
			//$image->resize(1920, 0)->quality(100);
			$image->save($filePath);
			$smallimage = Yii::app()->image->load($filePath);
			//$smallimage->resize(500, 0)->crop(400,300)->quality(80);
			$smallimage->resize(400, 0)->quality(100);
			$smallimage->save($filePathThum);
			if($logo == 1){
				$watermarker = new PhpGdWatermarker('./img/watermark.png', PhpGdWatermarker::VALIGN_BOTTOM, PhpGdWatermarker::HALIGN_RIGHT);
				$watermarker->setImageOverwrite(TRUE); // [OPTIONAL] Default is TRUE
				$watermarker->setEdgePadding(10); // [OPTIONAL] Default is 5
				$watermarker->applyWaterMark($filePath);
			}
			$GalleryPhotos = new GalleryPhotos;
			$GalleryPhotos->post_id = $gallery_id;
			$GalleryPhotos->gallery_photo_title = $Post->post_title;
			$GalleryPhotos->gallery_photo_alias = $Post->post_alias;
			//$GalleryPhotos->gallery_id = $gallery_id;
			$GalleryPhotos->gallery_thumb = $fileUrlThumb;
			$GalleryPhotos->galley_photo = $fileUrl;
			$GalleryPhotos->gallery_order = $StartOrder;
			$GalleryPhotos->save();
			$Post->gallery_photos = $StartOrder;
			$Post->update();
		}
		
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($gallery_id,$logo =1)
	{
		$this->layout='//layouts/upload';
		$gallery_id = intval($gallery_id);
		$model=new GalleryPhotos;
		$Post=Post::model()->findbyPk($gallery_id);
		if(isset($_POST['GalleryPhotos']))
		{
			$root = '../photos/';
			
			$model->attributes=$_POST['GalleryPhotos'];
			$stringHelper = new StringHelper();
			$alias = $stringHelper->StrRewrite($Post['post_title']);
			$StartOrder = GalleryPhotos::model()->countByAttributes(array('gallery_id'=> $gallery_id));
			$images = CUploadedFile::getInstancesByName('galley_photo');
            if (isset($images) && count($images) > 0) {
				$i =0;
                foreach ($images as $image => $pic) {
					$StartOrder++;
					$rand = rand(0,1000);
					$url = $root . date('Ym') . '/'. $gallery_id . '_' . $alias .'_' . $rand. '.' . $pic->extensionName;
					$urlshow = '/photos/' . date('Ym') . '/'. $gallery_id . '_' . $alias .'_'. $rand. '.' . $pic->extensionName;
					$small_url = $root . date('Ym') . '/'. $gallery_id . '_' . $alias  .'_thumb_'. $rand. '.' . $pic->extensionName;
					$small_urlshow = '/photos/' . date('Ym') . '/'. $gallery_id . '_' . $alias  .'_thumb_'. $rand. '.' . $pic->extensionName;
                    if ($pic->saveAs($url)) {
						$image = Yii::app()->image->load($url);
						$image->resize(2200, 0)->quality(100);
						$image->save($url);
						$smallimage = Yii::app()->image->load($url);
						$smallimage->resize(0, 100)->crop(600,450)->quality(100);
						$smallimage->save($small_url);
						
						$watermarker = new PhpGdWatermarker('./img/watermark.png', PhpGdWatermarker::VALIGN_BOTTOM, PhpGdWatermarker::HALIGN_RIGHT);
						$watermarker->setImageOverwrite(TRUE); // [OPTIONAL] Default is TRUE
						$watermarker->setEdgePadding(10); // [OPTIONAL] Default is 5
						//$watermarker->setWatermarkedImageNamePostfix('');
						$watermarker->applyWaterMark($url);
						
                        $GalleryPhotos = new GalleryPhotos;
						$GalleryPhotos->post_id = $Post->post_id;
                        $GalleryPhotos->gallery_id = $gallery_id;
						$GalleryPhotos->gallery_thumb = $small_urlshow;
						$GalleryPhotos->galley_photo = $urlshow;
						$GalleryPhotos->gallery_order = $StartOrder;
                        $GalleryPhotos->save(); 
                    }
                }
				
				$Post->gallery_photos = $StartOrder;
				$Post->save();
				
				$this->redirect(array('admin','gallery_id'=>$gallery_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'Post'=>$Post,
			'gallery_id'=>$gallery_id,
			'logo'=>$logo
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GalleryPhotos']))
		{
			$model->attributes=$_POST['GalleryPhotos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->gallery_photo_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionEmpty($gallery_id)
	{
		$GalleryPhotos = GalleryPhotos::model()->findAllByAttributes(array('post_id'=>$gallery_id));
		foreach($GalleryPhotos as $row){
			if(is_file('..' . $row->gallery_thumb)){ unlink('..' . $row->gallery_thumb);}
			if(is_file('..' . $row->galley_photo)){ unlink('..' . $row->galley_photo);}
		}
		GalleryPhotos::model()->deleteAllByAttributes(array('post_id'=>$gallery_id));
		$this->redirect(array('admin','gallery_id'=>$gallery_id));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		if(is_file('..' . $model->gallery_thumb)){ unlink('..' . $model->gallery_thumb);}
		if(is_file('..' . $model->galley_photo)){ unlink('..' . $model->galley_photo);}
		$Count = GalleryPhotos::model()->countByAttributes(array('post_id'=> $model->post_id));
		$Post = Post::model()->findByPk($model->post_id);
		$Post->gallery_photos = $Count;
		$Post->update();
		$model->delete();
		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GalleryPhotos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($gallery_id)
	{
		$post_id = intval($gallery_id);
		$Post = Post::model()->findbyPk($post_id);
		$model=new GalleryPhotos('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='gallery_order DESC';
		$model->dbCriteria->condition ='post_id = ' . $post_id;

		
		if(isset($_GET['GalleryPhotos']))
			$model->attributes=$_GET['GalleryPhotos'];
		$this->render('admin',array(
			'model'=>$model,
			'gallery_id'=>$post_id,
			'Post'=>$Post,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GalleryPhotos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GalleryPhotos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GalleryPhotos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-photos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
