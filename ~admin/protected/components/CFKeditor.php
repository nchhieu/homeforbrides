<?php
class CFKEditor extends CWidget{
	public $defaultValue;
    public $config;
	public $model;
	public $attribute;
	public function run(){
		if(!isset($this->model)){throw new CHttpException(500,'"model" have to be set!');}
		if(!isset($this->attribute)){throw new CHttpException(500,'"attribute" have to be set!');}
		if(!isset($this->defaultValue)){$this->defaultValue = '';}
		$ckEditor = './fckeditor/fckeditor.php';
		$ckBasePath = './fckeditor/';
		$this->render('CFKEditor',array(
		'model'=>$this->model,
		"attribute"=>$this->attribute,
		'ckEditor'=>$ckEditor,
		'ckBasePath'=>$ckBasePath,
		'defaultValue'=>$this->defaultValue,
		'config'=>$this->config
		));
	}	
}
?>