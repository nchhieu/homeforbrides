<?php

class VideoController extends Controller
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
		$Video=new Video;
		$model=new Post;
		$PostContent = new PostContent;
		$this->performAjaxValidation($model);

		if(isset($_POST['Video']))
		{
			
			$model->attributes=$_POST['Post'];
			$model->post_type = 2;
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
						
						if($PostContent->validate()){
							if($PostContent->save()){
								
								$Video->attributes=$_POST['Video'];
								$Video->post_id = $model->post_id;
								$Video->video_name = $model->post_title;
								//echo $Video->video_duration;
								//exit();
								if($Video->validate()){
									if($Video->save()){
										$transaction->commit();
										$this->redirect(array('view','id'=>$Video->video_id));
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
			'model'=>$model,
			'PostContent'=>$PostContent,
			'Video'=>$Video,
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
		$Video=$this->loadModel($id);
		$model=Post::model()->findbyPk($Video->post_id);
		$PostContent = PostContent::model()->findByAttributes(array('post_id'=>$Video->post_id));
		$PostSubcat = PostSubcat::model()->findAllByAttributes(array('cat_id'=>$model->cat_id));
		$this->performAjaxValidation($model);

		if(isset($_POST['Video']))
		{
			
			$model->attributes=$_POST['Post'];
			$model->post_type = 2;
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
						
						if($PostContent->validate()){
							if($PostContent->save()){
								
								$Video->attributes=$_POST['Video'];
								$Video->post_id = $model->post_id;
								$Video->video_name = $model->post_title;
								if($Video->validate()){
									if($Video->save()){
										$transaction->commit();
										$this->redirect(array('view','id'=>$Video->video_id));
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
			'model'=>$model,
			'PostContent'=>$PostContent,
			'Video'=>$Video,
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
		$Post = Post::model()->findByAttributes(array('post_id'=>$model->post_id));
		$PostContent = PostContent::model()->findByAttributes(array('post_id'=>$model->post_id));
		if(is_file('..' . $Post->post_thumb)){ unlink('..' . $Post->post_thumb);}
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
		$dataProvider=new CActiveDataProvider('Video');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Video('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='video_id DESC';
		if(isset($_GET['Video']))
			$model->attributes=$_GET['Video'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Video the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Video::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Video $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='video-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
