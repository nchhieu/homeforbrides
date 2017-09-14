<?php

class PostController extends Controller
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
				'actions'=>array('index','view','create','update','admin','All','Up','Ajax','blog','photography','videography','Sort','UpdateSort','InsertImages','UploadFilesPlupload'),
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
	
	protected function pushOrder($data, $row){
		$str = CHtml::link('<i class="fa fa-arrow-up"></i>' ,array('Post/Up','id'=>$data->post_id),array('class'=>'label label-pink show-tooltip','data-original-title'=>'Hiện thị đầu trang','data-placement'=>'top')) ;
		return $str;
	}
	
	protected function PostTitle($data, $row){
		$arrPostType = array('Post','Photo','Video');
		switch ($data->post_type) {
            case 0:
                $css='label label-info';
                break;
            case 1:
                $css='label label-warning';
                break;
            case 2:
                $css='label label-important';
                break; 
        }
		$str = '<span class="'. $css .'">' . $arrPostType[$data->post_type] . '</span> ' . $data->post_title ;
		return $str;
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post;
		$PostContent = new PostContent;
		$PostTags = new PostTags;
		$Options = array();
		$model->post_added_time = date('Y-m-d H:i:s');
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$PostTags->attributes=$_POST['PostTags'];
			
			
			
			//$model->post_type = 0;
			$model->post_order = strtotime(date('Y-m-d H:i:s'));
			
			$model->post_updated_date = date('Y-m-d H:i:s');
			
			$model->admin_id = Yii::app()->user->getState('admin_id');
			$stringHelper = new StringHelper();
			$model->post_alias = $stringHelper->StrRewrite($model->post_title);
			
			$post_thumb = CUploadedFile::getInstance($model, 'post_thumb');
			$rand = rand(0, 999);
			if ($post_thumb) {
				$model->post_thumb = '/media/' . date('Y/m/d') . '/' .   substr($model->post_alias,0,80) . '_' . $rand . '_thumb.' . $post_thumb->extensionName;
				$post_thumb->saveAs('../media/' .  date('Y/m/d') . '/' . substr($model->post_alias,0,80) . '_' . $rand . '_thumb.' . $post_thumb->extensionName);
				if($model->has_video == 'Y'){
					$watermarker = new PhpGdWatermarker('./img/video.png', PhpGdWatermarker::VALIGN_CENTER, PhpGdWatermarker::HALIGN_CENTER);
					$watermarker->setImageOverwrite(TRUE); // [OPTIONAL] Default is TRUE
					$watermarker->setEdgePadding(10); // [OPTIONAL] Default is 5
					$watermarker->applyWaterMark('..'.$model->post_thumb);
				}
			
				/*
				$smallimage = Yii::app()->image->load('..'.$model->post_thumb);
				$smallimage->resize(600,0)->crop(600,450)->quality(100);
				$smallimage->save('..'.$model->post_thumb);
				*/
			}
			if($model->validate()){
				
				$transaction = Yii::app()->db->beginTransaction();
				try{
				
					if($model->save()){
						
						if ($post_thumb) {
							/*
							if(is_file('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName)){
								@$smallimage = Yii::app()->image->load('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName);
								@$smallimage->resize(600, 0)->crop(600,450)->quality(100);
								@$smallimage->save('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName);
							}
							*/
							
						}
						
						
						
						
						$PostContent->post_id = $model->post_id;
						
						$PostContent->attributes=$_POST['PostContent'];
						$post_header_photo = CUploadedFile::getInstance($PostContent, 'post_header_photo');
						
						if ($post_header_photo) {$PostContent->post_header_photo = '/photos/' . date('Ym') . '/' .   substr($model->post_alias,0,100) . '_' . $rand . '.' . $post_header_photo->extensionName;}
						if($PostContent->validate()){
							if($PostContent->save()){
								// Keysearch
								$Keysearch = new Keysearch;
								$Keysearch->post_id = $model->post_id;
								$Keysearch->keysearch = $PostContent->meta_keyword;
								$Keysearch->save(false);
								
								// Tags
								if(is_array($PostTags['tag_id'])){
									for($i = 0; $i<count($PostTags['tag_id']); $i++){
										$PostTags2 = new PostTags;
										$PostTags2->tag_id = $PostTags['tag_id'][$i];
										$PostTags2->post_id = $model->post_id;
										$PostTags2->save(false);
									}
								}
								
								if ($post_header_photo) {$post_header_photo->saveAs('../photos/' .  date('Ym') . '/' . substr($model->post_alias,0,100) . '_' . $rand . '.' . $post_header_photo->extensionName);}
								$transaction->commit();
								if($model->post_type == 1){
									$this->redirect(array('GalleryPhotos/create','gallery_id'=>$model->post_id));
									}
								else{
									$this->redirect(array('view','id'=>$model->post_id));
								}
							}
						}
					}
				}
				catch(Exception $e){
					$transaction->rollBack();
					Yii::app()->user->setFlash('error','Có lỗi xảy ra');
				}
			}
		}
		
		$this->render('create',
		array('model'=>$model,'PostContent'=>$PostContent,'Options'=>$Options,'PostTags'=>$PostTags,'PostSubcat'=>array(),'TopicVideo'=>array())
		);

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$PostContent = PostContent::model()->findByAttributes(array('post_id'=>$id));
		$PostContent->post_content =  $PostContent->post_content . Yii::app()->session['insertimage'];
		$PostTags = new PostTags;
		$PostTagsSelected = PostTags::model()->findAllByAttributes(array('post_id'=>$model->post_id));
		$Options = array();
		foreach($PostTagsSelected as $row){
			array_push($Options,array($row['tag_id']=>array('selected'=>'selected')));
			//$Options[$row['tag_id']] = array('selected'=>true);
		}
		var_dump($Options);
		//exit();
		
		$PostSubcat = PostSubcat::model()->findAllByAttributes(array('cat_id'=>$model->cat_id));
		$TopicVideo = TopicVideo::model()->findAllByAttributes(array('subcat_id'=>$model->subcat_id));
		$this->performAjaxValidation($model);
		$has_video = $model->has_video;
		
		$url_post_thumb = $model->post_thumb;
		

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$PostTags->attributes=$_POST['PostTags'];
			
			
			//$model->post_type = 0;
			$model->admin_id = Yii::app()->user->getState('admin_id');
			$model->post_updated_date = date('Y-m-d H:i:s');
			$stringHelper = new StringHelper();
			$model->post_alias = $stringHelper->StrRewrite($model->post_title);
			
			$post_thumb = CUploadedFile::getInstance($model, 'post_thumb');
			$rand = rand(0, 999);
			if ($post_thumb) {
				$model->post_thumb = '/media/' . date('Y/m/d') . '/' .   substr($model->post_alias,0,80) . '_' . $rand . '_thumb.' . $post_thumb->extensionName;
				$post_thumb->saveAs('../media/' .  date('Y/m/d') . '/' . substr($model->post_alias,0,80) . '_' . $rand . '_thumb.' . $post_thumb->extensionName);
				
				if($model->has_video == 'Y' && $has_video = 'N'){
					$watermarker = new PhpGdWatermarker('./img/video.png', PhpGdWatermarker::VALIGN_CENTER, PhpGdWatermarker::HALIGN_CENTER);
					$watermarker->setImageOverwrite(TRUE); // [OPTIONAL] Default is TRUE
					$watermarker->setEdgePadding(10); // [OPTIONAL] Default is 5
					$watermarker->applyWaterMark('..'.$model->post_thumb);
				}
				
				
			}
			else{
				$model->post_thumb = $url_post_thumb;
			}
			if($model->validate()){
				
				$transaction = Yii::app()->db->beginTransaction();
				try{
				
					if($model->save()){
						
						if ($post_thumb) {
							/*
							if(is_file('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName)){
								@$smallimage = Yii::app()->image->load('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName);
								@$smallimage->resize(600, 0)->crop(600,450)->quality(100);
								@$smallimage->save('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName);
							}
							*/
							
						}
						$PostContent->post_id = $model->post_id;
						
						$PostContent->attributes=$_POST['PostContent'];
						$post_header_photo = CUploadedFile::getInstance($PostContent, 'post_header_photo');
						$rand = rand(0, 999);
						if ($post_header_photo) {$PostContent->post_header_photo = '/photos/' . date('Ym') . '/' .   substr($model->post_alias,0,100) . '_' . $rand . '.' . $post_header_photo->extensionName;}
						if($PostContent->validate()){
							if($PostContent->save()){
								// key search
								PostTags::model()->deleteAllByAttributes(array('post_id'=>$model->post_id));
								Keysearch::model()->deleteAllByAttributes(array('post_id'=>$model->post_id));
								
								$Keysearch = new Keysearch;
								$Keysearch->post_id = $model->post_id;
								$Keysearch->keysearch = $PostContent->meta_keyword;
								$Keysearch->save(false);
								
								
								// Tag
								if(is_array($PostTags['tag_id'])){
									for($i = 0; $i<count($PostTags['tag_id']); $i++){
										$PostTags2 = new PostTags;
										$PostTags2->tag_id = $PostTags['tag_id'][$i];
										$PostTags2->post_id = $model->post_id;
										$PostTags2->save(false);
									}
								}
								
								
								if ($post_header_photo) {$post_header_photo->saveAs('../photos/' .  date('Ym') . '/' . substr($model->post_alias,0,100) . '_' . $rand . '.' . $post_header_photo->extensionName);}
								$transaction->commit();
								unset(Yii::app()->session['insertimage']);
								unset(Yii::app()->session['countimage']);
								$this->redirect(array('view','id'=>$model->post_id));
							}
						}
					}
				}
				catch(Exception $e){
					$transaction->rollBack();
					Yii::app()->user->setFlash('error','Có lỗi xảy ra');
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'PostContent'=>$PostContent,
			'PostTags'=>$PostTags,
			'Options'=>$Options,
			'PostSubcat'=>$PostSubcat,
			'TopicVideo'=>$TopicVideo,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$PostContent = PostContent::model()->findByAttributes(array('post_id'=>$id));
		if(is_file('..' . $model->post_thumb)){ unlink('..' . $model->post_thumb);}
		if($model->post_type == 1){
			$GalleryPhotos = GalleryPhotos::model()->findallbyattributes(array('post_id'=>$id));
			foreach($GalleryPhotos as $row){
				if(is_file('..' . $row['gallery_thumb']) ){ @unlink('..' . $row['gallery_thumb']);}
				if(is_file('..' . $row['galley_photo']) ){ @unlink('..' . $row['galley_photo']);}
			}
		}
		GalleryPhotos::model()->deleteAllByAttributes(array('post_id'=>$id));
		PostTags::model()->deleteAllByAttributes(array('post_id'=>$id));
		Keysearch::model()->deleteAllByAttributes(array('post_id'=>$id));

		$model->delete();
		$PostContent->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	public function actionInsertImages($id)
	{
		$this->layout='//layouts/upload';
		$this->render('insertimages',array('id'=>$id));
	}
	
	public function actionUploadFilesPlupload($id){
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		// Settings
		$stringHelper = new StringHelper();
		$Post=Post::model()->findbyPk($id);
		$alias = $Post->post_alias;
		
		$rand = rand(0,1000);
		$targetDir = '../media/post/' . date('Y/m') . '/';
		$targetShow = '/media/post/' . date('Y/m') . '/';
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
		Yii::app()->session['countimage'] = intval(Yii::app()->session['countimage']) + 1;
		$rand = rand(0,1000);
		
		$fileName = $id . '_' . Yii::app()->session['countimage'] . '_' . $fileName ;
		$fileThumb = $id . '_' . Yii::app()->session['countimage'] . 'thumb_' . $fileName ;
		
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
		$fileUrl = $targetShow . DIRECTORY_SEPARATOR . $fileName;
		
		$filePathThum = $targetDir . DIRECTORY_SEPARATOR . $fileThumb;
		$fileUrlThumb = $targetShow . DIRECTORY_SEPARATOR . $fileThumb;

		
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
			/*
			$image = Yii::app()->image->load($filePath);
			$image->resize(1920, 0)->quality(100);
			$image->save($filePath);
			*/
			/*
			$watermarker = new PhpGdWatermarker('./img/watermark.png', PhpGdWatermarker::VALIGN_BOTTOM, PhpGdWatermarker::HALIGN_RIGHT);
			$watermarker->setImageOverwrite(TRUE); // [OPTIONAL] Default is TRUE
			$watermarker->setEdgePadding(10); // [OPTIONAL] Default is 5
			$watermarker->applyWaterMark($filePath);
			*/
			
			Yii::app()->session['insertimage'] .= '<p><img src="'. $fileUrl .'" alt="'. $Post->post_title .'"></p>';
		}
		
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Post');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionBlog()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='post_order DESC';
		$model->post_type =0;
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('blog',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionPhotography()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='post_order DESC';
		$model->post_type =1;
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('photography',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionVideography()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='post_order DESC';
		$model->post_type =2;
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('videography',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAll()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='post_order DESC';
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];
			
		if($model->cat_id > 0){
			$PostSubcat = PostSubcat::model()->findallbyAttributes(array('cat_id'=>$model->cat_id));
		}else{
			$PostSubcat = array();
		}

		$this->render('all',array(
			'model'=>$model,
			'PostSubcat'=>$PostSubcat,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionUp($id)
	{
		$model = $this->loadModel($id);
		$model->post_order = strtotime(date('Y-m-d H:i:s'));
		$model->save();
		$this->redirect(array('All'));
	}
	
	protected function countPhotos($data, $row){
		$Photos = GalleryPhotos::model()->countByAttributes(array('post_id'=>$data->post_id));
		
		$str = CHtml::link(' <i class="fa fa fa-list-ol"></i> ',array('GalleryPhotos/sort','gallery_id'=>$data->post_id),array('class'=>'label label-warning label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Sort')) ;
		$str .= CHtml::link($Photos . ' photos ',array('GalleryPhotos/admin','gallery_id'=>$data->post_id),array('class'=>'label label-lime label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Photos for this album'));

		return $str;
	}
	
	protected function countSlider($data, $row){
		$Slider = PostSlider::model()->countByAttributes(array('post_id'=>$data->post_id,'slider_position'=>0));
		
		$str = CHtml::link(' <i class="fa fa fa-list-ol"></i> ',array('PostSlider/sort','post_id'=>$data->post_id,'position'=>0),array('class'=>'label label-warning label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Sort')) ;
		$str .= CHtml::link($Slider . ' slider ',array('PostSlider/admin','post_id'=>$data->post_id,'position'=>0),array('class'=>'label label-lime label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Big Slider'));
		
		$Slider = PostSlider::model()->countByAttributes(array('post_id'=>$data->post_id,'slider_position'=>1));
		
		$str .= ' &nbsp;' .  CHtml::link(' <i class="fa fa fa-list-ol"></i> ',array('PostSlider/sort','post_id'=>$data->post_id,'position'=>1),array('class'=>'label label-warning label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Sort')) ;
		$str .= CHtml::link($Slider . ' slider ',array('PostSlider/admin','post_id'=>$data->post_id,'position'=>1),array('class'=>'label label-lime label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Small Slider'));

		return $str;
	}
	
	public function actionSort($subcat_id = 0)
	{
		$model = Post::model()->findall(
			array(
			'select'=>'post_id, post_title, post_thumb',
			'order'=>'post_order DESC',
			'condition'=>'subcat_id ='.$subcat_id,
			)
			);
		$this->render('sort',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdateSort()
	{
		$counter = strtotime(date('Y-m-d H:i:s'));
		if(isset($_POST['ID'])){
			$newOrder = $_POST['ID'];
			foreach ($newOrder as $recordIDValue) {
			  //echo $recordIDValue . ' | ';
			  Post::model()->updateByPk($recordIDValue,array('post_order'=>$counter));
			  $counter = $counter -1 ;
			}
		}
		
	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
