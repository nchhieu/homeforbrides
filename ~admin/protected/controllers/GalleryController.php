<?php

class GalleryController extends Controller
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
				'actions'=>array('index','view','create','update','admin','Ajax'),
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
	
	protected function Photos($data, $row){
		$str = CHtml::link($data->gallery_photos . ' hình',array('GalleryPhotos/admin','gallery_id'=>$data->gallery_id),array('class'=>'label label-important show-tooltip','data-original-title'=>'Upload hình cho album này','data-placement'=>'top')) ;
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
		$Gallery=new Gallery;
		$model=new Post;
		$PostContent = new PostContent;

		$this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			
			$model->attributes=$_POST['Post'];
			$model->post_type = 1;
			$model->admin_id = Yii::app()->user->getState('admin_id');
			$stringHelper = new StringHelper();
			$model->post_alias = $stringHelper->StrRewrite($model->post_title);
			
			$post_thumb = CUploadedFile::getInstance($model, 'post_thumb');
			$rand = rand(0, 999);
			if ($post_thumb) {$model->post_thumb = '/photos/' . date('Ym') . '/' .   $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName;}
			
			if($model->validate()){
				$transaction = Yii::app()->db->beginTransaction();
				try{
					if($model->save()){
						
						$PostContent->attributes=$_POST['PostContent'];
						
						if ($post_thumb) {$post_thumb->saveAs('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName);}
						$PostContent->post_id = $model->post_id;
						
						$post_header_photo = CUploadedFile::getInstance($PostContent, 'post_header_photo');
						$rand = rand(0, 999);
						if ($post_header_photo) {$PostContent->post_header_photo = '/photos/' . date('Ym') . '/' .   $model->post_alias . '_' . $rand . '.' . $post_header_photo->extensionName;}
						
						if($PostContent->validate()){
							if($PostContent->save()){
								if ($post_header_photo) {$post_header_photo->saveAs('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '.' . $post_header_photo->extensionName);}
								
								$Gallery->attributes=$_POST['Gallery'];
								$Gallery->post_id = $model->post_id;
								$Gallery->gallery_name = $model->post_title;
								
								
								if($Gallery->location_id){
									$Location = Location::model()->findbyPk($Gallery->location_id);
									if($Location){
										$Gallery->location_name = $Location->location_name;
									}
								}
								
								if($Gallery->photographer_id){
									$Photographer = Photographer::model()->findbyPk($Gallery->photographer_id);
									if($Photographer){
										$Gallery->photographer_name = $Photographer->photographer_nick;
									}
								}
								
								$gallery_taken_time = $Gallery->gallery_taken_time;
								$temp = explode(' ',$gallery_taken_time);
								if(count($temp) == 2){
									$temp2 = explode('/',$temp[0]);
									if(count($temp2) > 1){
										$Gallery->gallery_taken_time = $temp2[2].'-'. $temp2[1].'-'. $temp2[0];
									}
									
									$temp2 = explode(':',$temp[1]);
									if(count($temp2) > 1){
										$Gallery->gallery_taken_time .= ' ' . $temp2[0].':'. $temp2[1].':00';
									}
								}else{
									$Gallery->gallery_taken_time = '0000-00-00 00:00:00';
									}
								
								if($Gallery->validate()){
									if($Gallery->save()){
										$transaction->commit();
										$this->redirect(array('GalleryPhotos/create','gallery_id'=>$Gallery->gallery_id));
									}else{
										$Gallery->gallery_taken_time = $gallery_taken_time;
									}
								}
							} // save
						} // validate
					} // save
				} // try
				catch(Exception $e){
					$transaction->rollBack();
					Yii::app()->user->setFlash('error','Có lỗi xảy ra');
				}
			} // validate
		}
		$this->render('create',array(
			'Gallery'=>$Gallery,
			'model'=>$model,
			'PostContent'=>$PostContent,
			'PostSubcat'=>array(),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$Gallery=$this->loadModel($id);
		$model=Post::model()->findbyPk($Gallery->post_id);
		$PostContent = PostContent::model()->findByAttributes(array('post_id'=>$Gallery->post_id));
		$PostSubcat = PostSubcat::model()->findAllByAttributes(array('cat_id'=>$model->cat_id));
		
		$Gallery->gallery_taken_time = date('d/m/Y H:i', strtotime($Gallery->gallery_taken_time));
		
		
		$this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			
			$model->attributes=$_POST['Post'];
			$model->post_type = 1;
			$model->admin_id = Yii::app()->user->getState('admin_id');
			$stringHelper = new StringHelper();
			$model->post_alias = $stringHelper->StrRewrite($model->post_title);
			
			$post_thumb = CUploadedFile::getInstance($model, 'post_thumb');
			$rand = rand(0, 999);
			if ($post_thumb) {$model->post_thumb = '/photos/' . date('Ym') . '/' .   $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName;}
			
			if($model->validate()){
				$transaction = Yii::app()->db->beginTransaction();
				try{
					if($model->save()){
						
						$PostContent->attributes=$_POST['PostContent'];
						
						if ($post_thumb) {$post_thumb->saveAs('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '_thumb.' . $post_thumb->extensionName);}
						$PostContent->post_id = $model->post_id;
						
						$post_header_photo = CUploadedFile::getInstance($PostContent, 'post_header_photo');
						$rand = rand(0, 999);
						if ($post_header_photo) {$PostContent->post_header_photo = '/photos/' . date('Ym') . '/' .   $model->post_alias . '_' . $rand . '.' . $post_header_photo->extensionName;}
						
						if($PostContent->validate()){
							if($PostContent->save()){
								if ($post_header_photo) {$post_header_photo->saveAs('../photos/' .  date('Ym') . '/' . $model->post_alias . '_' . $rand . '.' . $post_header_photo->extensionName);}
								
								$Gallery->attributes=$_POST['Gallery'];
								$Gallery->post_id = $model->post_id;
								$Gallery->gallery_name = $model->post_title;
								
								if($Gallery->location_id){
									$Location = Location::model()->findbyPk($Gallery->location_id);
									if($Location){
										$Gallery->location_name = $Location->location_name;
									}
								}
								
								if($Gallery->photographer_id){
									$Photographer = Photographer::model()->findbyPk($Gallery->photographer_id);
									if($Photographer){
										$Gallery->photographer_name = $Photographer->photographer_nick;
									}
								}
								
								$gallery_taken_time = $Gallery->gallery_taken_time;
								$temp = explode(' ',$gallery_taken_time);
								if(count($temp) == 2){
									$temp2 = explode('/',$temp[0]);
									if(count($temp2) > 1){
										$Gallery->gallery_taken_time = $temp2[2].'-'. $temp2[1].'-'. $temp2[0];
									}
									
									$temp2 = explode(':',$temp[1]);
									if(count($temp2) > 1){
										$Gallery->gallery_taken_time .= ' ' . $temp2[0].':'. $temp2[1].':00';
									}
								}else{
									$Gallery->gallery_taken_time = '0000-00-00 00:00:00';
									}
								
								if($Gallery->validate()){
									if($Gallery->save()){
										$transaction->commit();
										$this->redirect(array('view','id'=>$Gallery->gallery_id));
									}else{
										$Gallery->gallery_taken_time = $gallery_taken_time;
									}
								}
							} // save
						} // validate
					} // save
				} // try
				catch(Exception $e){
					$transaction->rollBack();
					Yii::app()->user->setFlash('error','Có lỗi xảy ra');
				}
			} // validate
		}

		$this->render('update',array(
			'Gallery'=>$Gallery,
			'model'=>$model,
			'PostContent'=>$PostContent,
			'PostSubcat'=>$PostSubcat,
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
		$GalleryPhotos = GalleryPhotos::model()->findAllByAttributes(array('gallery_id'=>$id));
		foreach($GalleryPhotos as $row){
			if(is_file('..' . $row->gallery_thumb)){ unlink('..' . $row->gallery_thumb);}
			if(is_file('..' . $row->galley_photo)){ unlink('..' . $row->galley_photo);}
		}
	
		$Post = Post::model()->findByAttributes(array('post_id'=>$model->post_id));
		$PostContent = PostContent::model()->findByAttributes(array('post_id'=>$model->post_id));
		if(is_file('..' . $Post->post_thumb)){ unlink('..' . $Post->post_thumb);}
		
		GalleryPhotos::model()->deleteAll('gallery_id='.$id);
		$model->delete();
		$Post->delete();
		$PostContent->delete();
		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Gallery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='batdau DESC';
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Gallery the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Gallery $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
