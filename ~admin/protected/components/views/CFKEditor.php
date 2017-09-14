<?php
require_once($ckEditor);
$oFCKeditor = new FCKeditor(get_class($model).'['.$attribute.']') ;
$oFCKeditor->BasePath = $ckBasePath;
$oFCKeditor->Value = $defaultValue ;
if(isset($config) && is_array($config)){
	foreach($config as $key=>$value){
		$oFCKeditor->$key = $value;
	}
}
$oFCKeditor->Create() ;
?>