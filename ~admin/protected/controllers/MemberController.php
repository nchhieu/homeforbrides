<?php

class MemberController extends Controller
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
		$model=new Member;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
			$model->latest_log_date = date('Y-m-d H:i:s');
			
				if($model->save()){
					$this->redirect(array('view','id'=>$model->member_id));
				}
		}

		$this->render('create',array(
			'model'=>$model
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
		$MemberInfo= MemberInfo::model()->findbyPk($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
			$MemberInfo->attributes=$_POST['MemberInfo'];
			$model->latest_log_date = date('Y-m-d H:i:s');
			
				if($model->save()){
					$MemberInfo->member_id = $model->member_id;
					if($model->city_id){
						$City = City::model()->findbyPk($model->city_id);
						$MemberInfo->city_name = $City->city_name;
					}
					if($MemberInfo->dist_id){
						$Dist = Dist::model()->findbyPk($MemberInfo->dist_id);
						$MemberInfo->dist_name = $Dist->dist_name;
					}
					$MemberInfo->create_date = date('Y-m-d-h:i:s');
					
					$brithday = $MemberInfo->brithday;
					$temp = explode('/',$brithday);
					if(count($temp) > 1){
						$MemberInfo->brithday = $temp[2].'-'. $temp[1].'-'. $temp[0];
					}
					$picture = CUploadedFile::getInstance($MemberInfo, 'picture');
					$rand = rand(0, 999);
					if ($picture) {$MemberInfo->picture = '/photos/' . date('Ym') . '/' .  $model->member_id . '_' .   $rand . '.' . $picture->extensionName;}
					
					if($MemberInfo->save()){
						if ($picture) {$picture->saveAs('../photos/' . date('Ym') . '/'  .  $model->member_id . '_' .  $rand . '.' . $picture->extensionName);}
						$this->redirect(array('view','id'=>$model->member_id));
					}else{
						$MemberInfo->brithday = $brithday;
					}
				}
		}

		$this->render('update',array(
			'model'=>$model,'MemberInfo'=>$MemberInfo,
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
		$dataProvider=new CActiveDataProvider('Member');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Member('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Member']))
			$model->attributes=$_GET['Member'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Member the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Member::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Member $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='member-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
