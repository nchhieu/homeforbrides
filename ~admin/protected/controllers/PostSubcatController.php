<?php

class PostSubcatController extends Controller
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
				'actions'=>array('index','view','create','update','admin','Ajax','Sort','UpdateSort'),
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
		
		$model = PostSubcat::model()->findAll(array('condition'=>'cat_id='.(int) $_POST['cat_id'],'order'=>'subcat_name' ));
	    $data= CHtml::listData($model,'subcat_id','subcat_name');
	 
	   echo "<option value=''>Choose sub category</option>";
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
		$model=new PostSubcat;
		$this->performAjaxValidation($model);

		if(isset($_POST['PostSubcat']))
		{
			$model->attributes=$_POST['PostSubcat'];
			$model->subcat_updated_time = date('Y-m-d H:i:s');
			$stringHelper = new StringHelper();
			$model->subcat_alias = $stringHelper->StrRewrite($model->subcat_name);
			
			$PostCat = PostCat::model()->findbyPk($model->cat_id);
			if($PostCat){
				$model->topic_id = $PostCat->topic_id;
				$model->cat_name = $PostCat->cat_name;
			}
			
			$subcat_thumb = CUploadedFile::getInstance($model, 'subcat_thumb');
			$rand = rand(0, 999);
			if ($subcat_thumb) {$model->subcat_thumb = '/media/' . date('Y/m/d') . '/' .   $model->subcat_alias . '_' . $rand . '_thumb.' . $subcat_thumb->extensionName;}
			if($model->validate()){
				if($model->save()){
					if ($subcat_thumb) {$subcat_thumb->saveAs('../media/' .  date('Y/m/d') . '/' . $model->subcat_alias . '_' . $rand . '_thumb.' . $subcat_thumb->extensionName);}
					$this->redirect(array('view','id'=>$model->subcat_id));
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

		if(isset($_POST['PostSubcat']))
		{
			$model->attributes=$_POST['PostSubcat'];
			$model->subcat_updated_time = date('Y-m-d H:i:s');
			$stringHelper = new StringHelper();
			$model->subcat_alias = $stringHelper->StrRewrite($model->subcat_name);
			
			$PostCat = PostCat::model()->findbyPk($model->cat_id);
			
			$model->topic_id = $PostCat->topic_id;
			$model->cat_name = $PostCat->cat_name;
			
			$subcat_thumb = CUploadedFile::getInstance($model, 'subcat_thumb');
			$rand = rand(0, 999);
			if ($subcat_thumb) {$model->subcat_thumb = '/media/' . date('Y/m/d') . '/' .   $model->subcat_alias . '_' . $rand . '_thumb.' . $subcat_thumb->extensionName;}
			if($model->validate()){
				if($model->save()){
					if ($subcat_thumb) {$subcat_thumb->saveAs('../media/' .  date('Y/m/d') . '/' . $model->subcat_alias . '_' . $rand . '_thumb.' . $subcat_thumb->extensionName);}
					$this->redirect(array('view','id'=>$model->subcat_id));
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
		$dataProvider=new CActiveDataProvider('PostSubcat');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PostSubcat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PostSubcat']))
			$model->attributes=$_GET['PostSubcat'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionSort($cat_id = 0)
	{
		$model = PostSubcat::model()->findall(
			array(
			'select'=>'subcat_id, subcat_name, subcat_thumb',
			'order'=>'subcat_order DESC',
			'condition'=>'cat_id ='.$cat_id,
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
			  PostSubcat::model()->updateByPk($recordIDValue,array('subcat_order'=>$counter));
			  $counter = $counter + 1;
			}
		}
		
	
	}
	

	
	protected function countPost($data, $row){
		$Post = Post::model()->countByAttributes(array('subcat_id'=>$data->subcat_id));
		$str = CHtml::link('<i class="fa fa fa-list-ol"></i> ',array('Post/sort','subcat_id'=>$data->subcat_id),array('class'=>'label label-warning label-large show-tooltip','data-placement'=>'top','data-original-title'=>'Sort'));
		$str .= '&nbsp;'.CHtml::link($Post . ' posts ',array('Post/all','Post[cat_id]'=>$data->cat_id,'Post[subcat_id]'=>$data->subcat_id,'ajax'=>'post-grid'),array('class'=>'label label-lime label-large show-tooltip','data-placement'=>'top','data-original-title'=>'View posts of this sub'));
		
		return $str;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PostSubcat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PostSubcat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PostSubcat $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-subcat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
