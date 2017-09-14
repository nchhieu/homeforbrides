<?php

class PostSliderController extends Controller
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
				'actions'=>array('create','update','Ajax','view','admin','sort','UpdateSort' ),
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
	
	protected function Sposition($data, $row){
		$str = '';
		if($data->slider_position == 0){
			$str = 'Big Banner';
		}
		
		if($data->slider_position == 1){
			$str = 'Small Banner';
		}
		
		return $str;
	}
	
	protected function Thumb($data, $row){
		$str = '<a href="'. $data->photos .'" target="_blank"><img src="'. $data->photos .'" height="40" ></a>';
		return $str;
	}
	
	public function actionSort($post_id, $position)
	{
		$model = PostSlider::model()->findall(
			array(
			'select'=>'post_slider_id, photos',
			'order'=>'slider_sort ',
			'condition'=>'post_id ='.$post_id . ' AND slider_position='. $position,
			)
			);
		$this->render('sort',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdateSort()
	{
		$counter = 1;
		if(isset($_POST['ID'])){
			$newOrder = $_POST['ID'];
			foreach ($newOrder as $recordIDValue) {
			  //echo $recordIDValue . ' | ';
			  PostSlider::model()->updateByPk($recordIDValue,array('slider_sort'=>$counter));
			  $counter ++;
			}
		}
		
	
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($post_id)
	{
		$model=new PostSlider;
		$model->post_id = $post_id;
		$this->performAjaxValidation($model);

		if(isset($_POST['PostSlider']))
		{
			$Post = Post::model()->findbypk($post_id);
			$model->attributes=$_POST['PostSlider'];
			
			$photos = CUploadedFile::getInstance($model, 'photos');
			$rand = rand(0, 999);
			if ($photos) {
				$model->photos = '/media/' . date('Y/m/d') . '/' .   $Post->post_alias . '_' . $rand . '_slider.' . $photos->extensionName;
				$photos->saveAs('../media/' .  date('Y/m/d') . '/' . $Post->post_alias . '_' . $rand . '_slider.' . $photos->extensionName);
			}
			
			
			
			if($model->save(false)){
				$this->redirect(array('view','id'=>$model->post_slider_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'post_id'=>$post_id,
			
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

		if(isset($_POST['PostSlider']))
		{
			$model->attributes=$_POST['PostSlider'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->post_slider_id));
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
		$model = $this->loadModel($id);
		$file = $model['photos'];
		$model->delete();
		@unlink('..'.$file);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PostSlider');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($post_id,$position)
	{
		$model=new PostSlider('search');
		$model->unsetAttributes();  // clear any default values
		$model->slider_position = $slider_position;
		$model->post_id = $post_id;
		if(isset($_GET['PostSlider']))
			$model->attributes=$_GET['PostSlider'];

		$this->render('admin',array(
			'model'=>$model,
			'post_id'=>$post_id,
			'position'=>$position,
		));
		
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PostSlider the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PostSlider::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PostSlider $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-slider-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
