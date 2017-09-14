<?php

class PostCatController extends Controller
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
		$model=new PostCat;
		$this->performAjaxValidation($model);

		if(isset($_POST['PostCat']))
		{
			$model->attributes=$_POST['PostCat'];
			
			$model->cat_updated_time = date('Y-m-d H:i:s');
			$stringHelper = new StringHelper();
			$model->cat_alias = $stringHelper->StrRewrite($model->cat_name);
			
			$cat_screen = CUploadedFile::getInstance($model, 'cat_screen');
			$cat_thumb = CUploadedFile::getInstance($model, 'cat_thumb');
			
			$rand = rand(0, 999);
			if ($cat_screen) {$model->cat_screen = '/photos/' . date('Ym') . '/' .   $model->cat_alias . '_' . $rand . '.' . $cat_screen->extensionName;}
			if ($cat_thumb) {$model->cat_thumb = '/photos/' . date('Ym') . '/' .  $model->cat_alias . '_' . $rand . '_thumb.' . $cat_thumb->extensionName;}
			if($model->validate()){
				if($model->save()){
					if ($cat_screen) {$cat_screen->saveAs('../photos/' . date('Ym') . '/' . $model->cat_alias . '_' . $rand . '.' . $cat_screen->extensionName);}
					if ($cat_thumb) {$cat_thumb->saveAs('../photos/' .  date('Ym') . '/' . $model->cat_alias . '_' . $rand . '_thumb.' . $cat_thumb->extensionName);}
					$this->redirect(array('view','id'=>$model->cat_id));
				}
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

		if(isset($_POST['PostCat']))
		{
			$model->attributes=$_POST['PostCat'];
			
			$model->cat_updated_time = date('Y-m-d H:i:s');
			$stringHelper = new StringHelper();
			$model->cat_alias = $stringHelper->StrRewrite($model->cat_name);
			
			$cat_screen = CUploadedFile::getInstance($model, 'cat_screen');
			$cat_thumb = CUploadedFile::getInstance($model, 'cat_thumb');
			
			$rand = rand(0, 999);
			if ($cat_screen) {$model->cat_screen = '/photos/' . date('Ym') . '/' .   $model->cat_alias . '_' . $rand . '.' . $cat_screen->extensionName;}
			if ($cat_thumb) {$model->cat_thumb = '/photos/' . date('Ym') . '/' .  $model->cat_alias . '_' . $rand . '_thumb.' . $cat_thumb->extensionName;}
			if($model->validate()){
				if($model->save()){
					if ($cat_screen) {$cat_screen->saveAs('../photos/' . date('Ym') . '/' . $model->cat_alias . '_' . $rand . '.' . $cat_screen->extensionName);}
					if ($cat_thumb) {$cat_thumb->saveAs('../photos/' .  date('Ym') . '/' . $model->cat_alias . '_' . $rand . '_thumb.' . $cat_thumb->extensionName);}
					$this->redirect(array('view','id'=>$model->cat_id));
				}
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
		$dataProvider=new CActiveDataProvider('PostCat');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	protected function getTopic($data, $row){
		$arrTopic = array('Post','Photography','Videography','Home');
		return $arrTopic[$data->topic_id];
	}
	
	protected function countSub($data, $row){
		$PostSubcat = PostSubcat::model()->countByAttributes(array('cat_id'=>$data->cat_id));
		$str = CHtml::link(' <i class="fa fa fa-list-ol"></i> ',array('PostSubcat/sort','cat_id'=>$data->cat_id),array('class'=>'label label-warning label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Sort')) ;
		$str .= '&nbsp;'.CHtml::link($PostSubcat . ' subs ',array('PostSubcat/admin','PostSubcat[cat_id]'=>$data->cat_id,'ajax'=>'post-subcat-grid'),array('class'=>'label label-lime label-large show-tooltip','data-placement'=>'top','data-original-title'=>'View subs of this category')) ;
		
		return $str;
	}
	
	protected function Slider($data, $row){
		$str = '';
		//if($data->topic_id == 1 || $data->topic_id == 3){
			$Slider1 = PostCatSlider::model()->countByAttributes(array('cat_id'=>$data->cat_id,'slider_position'=>0));
			$Slider2 = PostCatSlider::model()->countByAttributes(array('cat_id'=>$data->cat_id,'slider_position'=>1));
			$str .= CHtml::link(' <i class="fa fa fa-list-ol"></i> ',array('PostCatSlider/sort','cat_id'=>$data->cat_id,'position'=>0),array('class'=>'label label-warning label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Sort')) .CHtml::link($Slider1 . ' photos ',array('PostCatSlider/admin','cat_id'=>$data->cat_id,'position'=>0),array('class'=>'label label-info label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Big Banner')) ;
			$str .= '&nbsp;'.CHtml::link(' <i class="fa fa fa-list-ol"></i> ',array('PostCatSlider/sort','cat_id'=>$data->cat_id,'position'=>1),array('class'=>'label label-warning label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Sort')) .CHtml::link($Slider2 . ' photos ',array('PostCatSlider/admin','cat_id'=>$data->cat_id,'position'=>1),array('class'=>'label label-info label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Small Banner')) ;
		//}
		return $str;
	}
	
	
	

	
	protected function countPost($data, $row){
		$Post = Post::model()->countByAttributes(array('cat_id'=>$data->cat_id));
		$str = CHtml::link($Post . ' posts ',array('Post/all','Post[cat_id]'=>$data->cat_id,'ajax'=>'post-grid'),array('class'=>'label label-lime label-large show-tooltip','data-placement'=>'top','data-original-title'=>'View posts of this category'));
		return $str;
	}
	
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PostCat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PostCat']))
			$model->attributes=$_GET['PostCat'];
		
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PostCat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PostCat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PostCat $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-cat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
