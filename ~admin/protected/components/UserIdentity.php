<?php

class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
		$Model=Admin::model()->findByAttributes(
			array('admin_email'=>$this->username, 'admin_status'=>'Show')
		);
        if($Model===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($Model->admin_password!==md5($this->password.Yii::app()->params['securCode']))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            
			$this->setState('admin_id', $Model->admin_id);
			$this->setState('admin_group', $Model->admin_group);
			$this->setState('admin_rights', $Model->admin_rights);
			$this->setState('admin_name', $Model->admin_name);
			if($Model->admin_avatar != ''){
				$this->setState('admin_avatar', $Model->admin_avatar);
			}else{
				$this->setState('admin_avatar', './img/avatar_default.jpg');
			}
			$this->setState('admin_latest_login', date('Y-m-d H:i:s'));
			$Model->admin_latest_login = date('Y-m-d H:i:s');
			$Model->admin_login_times = $Model->admin_login_times+1;
			$Model->update();
			
			$AdminLog = new AdminLog;
			$AdminLog->admin_id = $Model->admin_id;
			$AdminLog->admin_log_time = date('Y-m-d H:i:s');
			$ip = Yii::app()->request->userHostAddress;
			if($ip =='::1'){ $ip = '127.0.0.1'; }
			$AdminLog->admin_log_ip = ip2long($ip);
			$AdminLog->save();

			
			
			
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}

	

}
