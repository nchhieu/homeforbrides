<?php

class InfoController extends Controller
{
	public function actionIndex($alias,$id)
	{
		$Info =PostSubcat::model()->findall(array('select'=>'subcat_id,subcat_name,subcat_alias','condition'=>'cat_id ='.Yii::app()->params['Info'] .' AND subcat_status="Show"','order'=>'subcat_order')); 
		
		$DeailInfo = PostSubcat::model()->findbypk($id);
		
		$this->layout='main';
		$this->render('index',array('DeailInfo'=>$DeailInfo,'Info'=>$Info));
	}
}