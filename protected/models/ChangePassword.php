<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ChangePassword extends CFormModel
{
	public $password;
	public $newpassword;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('password, newpassword', 'required'),
			array('password', 'checkPassword'),
			// rememberMe needs to be a boolean
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password'=>'Current password',
			'newpassword'=>'New password',
			'checkPassword'=>'New Password',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function checkPassword($attribute,$params)
	{
		$check = User::model()->findbyPk(Yii::app()->user->getState('user_id') );
		if( $check->user_password !=  $this->password){
			$this->addError($attribute,'You have enter wrong password');
		}
	}

}
