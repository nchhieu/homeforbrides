<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Forgot extends CFormModel
{
	public $username;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username', 'required'),
			// rememberMe needs to be a boolean
			array('username', 'email'),
			// password needs to be authenticated
			array('username', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'Email',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$User = User::model()->findByAttributes(array('user_email'=>$this->username));
			if(!$User){
				$this->addError('username','There was not this email in our database, please check again.');
			}
		}
	}

	
	
}
