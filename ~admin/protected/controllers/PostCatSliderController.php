<?php

class PostCatSliderController extends Controller
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
	
	protected function Thumb($data, $row){
		$str = '<a href="'. $data->slider_photos .'" target="_blank"><img src="'. $data->slider_photos .'" height="40" ></a>';
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
	
	public function actionSort($cat_id, $position)
	{
		$model = PostCatSlider::model()->findall(
			array(
			'select'=>'post_cat_slider_id, slider_photos',
			'order'=>'slider_sort ',
			'condition'=>'cat_id ='.$cat_id . ' AND slider_position='. $position,
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
			  PostCatSlider::model()->updateByPk($recordIDValue,array('slider_sort'=>$counter));
			  $counter ++;
			}
		}
		
	
	}
	
	

	public function actionCreate($cat_id)
	{
		
		$cat_id = intval($cat_id);
		$model = new PostCatSlider;
		$model->cat_id = $cat_id;
		$PostCat = PostCat::model()->findbypk($cat_id);
		$this->performAjaxValidation($model);

		if(isset($_POST['PostCatSlider']))
		{
			$model->attributes=$_POST['PostCatSlider'];
			$slider_photos = CUploadedFile::getInstance($model, 'slider_photos');
			$rand = rand(0, 999);
			if ($slider_photos) {
				$model->slider_photos = '/media/slider/' . date('Y') . '/' .   $PostCat->cat_alias . '_' . $rand . '_slider.' . $slider_photos->extensionName;
				$slider_photos->saveAs('../media/slider/' .  date('Y') . '/' . $PostCat->cat_alias . '_' . $rand . '_slider.' . $slider_photos->extensionName);
			}
			
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->post_cat_slider_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'cat_id'=>$cat_id,
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

		if(isset($_POST['PostCatSlider']))
		{
			$model->attributes=$_POST['PostCatSlider'];
			$slider_photos = CUploadedFile::getInstance($model, 'slider_photos');
			$rand = rand(0, 999);
			if ($slider_photos) {
				
				$model->slider_photos = '/media/slider/' . date('Y') . '/' .   $PostCat->cat_alias . '_' . $rand . '_slider.' . $slider_photos->extensionName;
				$slider_photos->saveAs('../media/slider/' .  date('Y') . '/' . $PostCat->cat_alias . '_' . $rand . '_slider.' . $slider_photos->extensionName);
			}
			
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->post_cat_slider_id));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PostCatSlider');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($cat_id)
	{
		$cat_id = (int) $cat_id;
	
		
		$model=new PostCatSlider('search');
		$model->unsetAttributes();  // clear any default values
		$model->cat_id = $cat_id;  // clear any default values
	
		
		if(isset($_GET['PostCatSlider']))
			$model->attributes=$_GET['PostCatSlider'];

		$this->render('admin',array(
			'model'=>$model,
			'cat_id'=>$cat_id,
		
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PostCatSlider the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PostCatSlider::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PostCatSlider $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-cat-slider-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
