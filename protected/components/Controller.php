<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public function init(){
		if(!Yii::app()->user->isGuest){
			$AdminLog = new AdminLog;
			$AdminLog->admin_id = Yii::app()->user->getState('admin_id');
			$AdminLog->admin_log_time = date('Y-m-d H:i:s');
			$ip = Yii::app()->request->userHostAddress;
			if($ip =='::1'){ $ip = '127.0.0.1'; }
			$AdminLog->admin_log_ip = ip2long($ip);
			$AdminLog->admin_log_controler = Yii::app()->getRequest()->getQueryString();
			$AdminLog->save();
		}
    }
	
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/user';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	
	

}