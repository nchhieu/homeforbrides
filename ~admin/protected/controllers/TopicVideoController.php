<?php

class TopicVideoController extends Controller
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
				'actions'=>array('index','view',),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Ajax','view','admin' ),
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
	
	public function actionAjax()
	{
		$model = TopicVideo::model()->findAll(array('condition'=>'subcat_id='.(int) $_POST['subcat_id'],'order'=>'topic_sort' ));
	    $data= CHtml::listData($model,'topic_id','topic_name');
	 
	   echo "<option value=''>Choose Video Topic</option>";
	   foreach($data as $value=>$subcat_name)
	   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($subcat_name),true);
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
		$model=new TopicVideo;
		$this->performAjaxValidation($model);

		if(isset($_POST['TopicVideo']))
		{
			$model->attributes=$_POST['TopicVideo'];
			
			$model->topic_added_date = date('Y-m-d H:i:s');
			$stringHelper = new StringHelper();
			$model->topic_alias = $stringHelper->StrRewrite($model->topic_name);
			
			$PostSubcat = PostSubcat::model()->findbyPk($model->subcat_id);
			if($PostSubcat){
				$model->subcat_alias = $PostSubcat->subcat_alias;
			}
			
			$topic_thumb = CUploadedFile::getInstance($model, 'topic_thumb');
			$rand = rand(0, 999);
			if ($topic_thumb) {
				$model->topic_thumb = '/media/' . date('Y/m/d') . '/' .   $model->topic_alias . '_' . $rand . '_thumb.' . $topic_thumb->extensionName;
				$topic_thumb->saveAs('../media/' . date('Y/m/d') . '/' .   $model->topic_alias . '_' . $rand . '_thumb.' . $topic_thumb->extensionName);
			}
			
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->topic_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
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
		$this->performAjaxValidation($model);

		if(isset($_POST['TopicVideo']))
		{
			$model->attributes=$_POST['TopicVideo'];
			
			$model->topic_added_date = date('Y-m-d H:i:s');
			$stringHelper = new StringHelper();
			$model->topic_alias = $stringHelper->StrRewrite($model->topic_name);
			
			$PostSubcat = PostSubcat::model()->findbyPk($model->subcat_id);
			if($PostSubcat){
				$model->subcat_alias = $PostSubcat->subcat_alias;
			}
			
			$topic_thumb = CUploadedFile::getInstance($model, 'topic_thumb');
			$rand = rand(0, 999);
			if ($topic_thumb) {
				$model->topic_thumb = '/media/' . date('Y/m/d') . '/' .   $model->topic_alias . '_' . $rand . '_thumb.' . $topic_thumb->extensionName;
				$topic_thumb->saveAs('../media/' . date('Y/m/d') . '/' .   $model->topic_alias . '_' . $rand . '_thumb.' . $topic_thumb->extensionName);
			}
			
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->topic_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TopicVideo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TopicVideo('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='topic_sort';
		if(isset($_GET['TopicVideo']))
			$model->attributes=$_GET['TopicVideo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TopicVideo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TopicVideo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TopicVideo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='topic-video-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
