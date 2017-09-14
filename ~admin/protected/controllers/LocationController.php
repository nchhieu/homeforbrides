<?php

class LocationController extends Controller
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
	
	public function actionAjax($key){
		$criteria = new CDbCriteria;
		$criteria->select = array('location_id, location_name, location_type_name');
		$criteria->condition = 'location_name LIKE  :key    AND location_status="Hien"';
		$criteria->params = array(':key' =>  '%' . trim($key) . '%');
		$criteria->order = 'location_name';
		$Location = Location::model()->findAll($criteria);
		$arr = array();
		$str = '';
		foreach($Location as $row){
			array_push($arr,array('id'=>$row['location_id'], 'text'=>$row['location_name'] . ' [' . $row['location_type_name']. ']'));
		}
		echo json_encode($arr);   //$str;
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
		$Location = new Location;
		$model=new Post;
		$PostContent = new PostContent;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Location']))
		{
			$model->attributes=$_POST['Post'];
			$model->post_type = 4;
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
								$Location->attributes=$_POST['Location'];
								$Location->location_status = $model->post_status;
								$Location->post_id = $model->post_id;
								$Location->location_name = $model->post_title;
								
								if($Location->city_id){
									$City = City::model()->findbyPk($Location->city_id);	
									$Location->city_id = $City->city_id;
									$Location->city_name = $City->city_name;
								}
								if($Location->validate()){
									if($Location->save()){
										$transaction->commit();
										$this->redirect(array('view','id'=>$Location->location_id));
									} // if save
								} //  if validate
							} // if PostContent->save();
						} // if validate
					} // if model->save();
				}
				catch(Exception $e){
					$transaction->rollBack();
					Yii::app()->user->setFlash('error','Có lỗi xảy ra');
				}
			}// if validate
		}

		$this->render('create',array(
			'Location'=>$Location,
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
		$Location=$this->loadModel($id);
		$model=Post::model()->findbyPk($Location->post_id);
		$PostContent = PostContent::model()->findByAttributes(array('post_id'=>$Location->post_id));
		$PostSubcat = PostSubcat::model()->findAllByAttributes(array('cat_id'=>$model->cat_id));
		$this->performAjaxValidation($model);

		if(isset($_POST['Location']))
		{
			$model->attributes=$_POST['Post'];
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
								$Location->attributes=$_POST['Location'];
								$Location->location_status = $model->post_status;
								$Location->post_id = $model->post_id;
								$Location->location_name = $model->post_title;
								
								if($Location->dist_id){
									$Dist = Dist::model()->findbyPk($Location->dist_id);	
									$Location->city_id = $Dist->city_id;
									$Location->city_name = $Dist->city_name;
									$Location->dist_name = $Dist->dist_name;
								}
								if($Location->validate()){
									if($Location->save()){
										$transaction->commit();
										$this->redirect(array('view','id'=>$Location->location_id));
									} // if save
								} //  if validate
							} // if PostContent->save();
						} // if validate
					} // if model->save();
				}
				catch(Exception $e){
					$transaction->rollBack();
					Yii::app()->user->setFlash('error','Có lỗi xảy ra');
				}
			}// if validate
		}

		$this->render('update',array(
			'Location'=>$Location,
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
		$Gallery = Gallery::model()->findByAttributes(array('location_id'=>$id));
		if(!$Gallery){
			$model = $this->loadModel($id);
			$Post = Post::model()->findByAttributes(array('post_id'=>$model->post_id));
			$PostContent = PostContent::model()->findByAttributes(array('post_id'=>$model->post_id));
			if(is_file('..' . $Post->post_thumb)){ unlink('..' . $Post->post_thumb);}
			$model->delete();
			$Post->delete();
			$PostContent->delete();
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Location');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Location('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='location_id DESC';
		if(isset($_GET['Location']))
			$model->attributes=$_GET['Location'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Location the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Location::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Location $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='location-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
