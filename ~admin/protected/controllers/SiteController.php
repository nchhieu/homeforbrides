<?php

class SiteController extends Controller
{
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			////'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','Logout'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('captcha','Login','Logout','forgot','forgotinfo','resetpassword','movefile'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionSetting()
	{
		$this->layout='//layouts/user';
		$this->render('setting');
	}
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	
	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout='//layouts/user';
		$PostCount = Post::model()->countByAttributes(array('post_status'=> 'Hien'));
		$Video = Post::model()->countByAttributes(array('post_status'=> 'Hien', 'post_type'=>2));
		$Album = Post::model()->countByAttributes(array('post_status'=> 'Hien', 'post_type'=>1));
		$SubCat = PostSubcat::model()->countByAttributes(array('subcat_status'=> 'Hien'));
		
		$this->render('index',array(
		'PostCount' => $PostCount,
		'Video' => $Video,
		'Album' => $Album,
		'SubCat' => $SubCat,
		));
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
        
	public function actionLogin()
	{
		$this->layout='//layouts/login';
		$this->pageTitle = 'Pose - Admin site';
		$model=new LoginForm;
		$forgot=new Forgot;
		
		if (Yii::app()->user->getState('attempts-login') > 3) { //make the captcha required if the unsuccessful attemps are more of thee
            $model->scenario = 'withCaptcha';
        }
		
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				Yii::app()->user->setState('attempts-login', 0);
                           $this->redirect(array('site/index'));
			}else{
				Yii::app()->user->setState('attempts-login', Yii::app()->user->getState('attempts-login', 0) + 1);
			}
			if (Yii::app()->user->getState('attempts-login') > 3) { 
                    $model->scenario = 'withCaptcha'; //useful only for view
            }
		}
		
		// display the login form
		$this->render('login',array('model'=>$model,'forgot'=>$forgot));
	}
	
	
	public function actionForget(){
		if(isset($_POST['Forgot']))
		{
			$forgot->attributes=$_POST['Forgot'];
			// validate user input and redirect to the previous page if valid
			if($forgot->validate()){
				// send email
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				$headers .= 'From: Homeforbrides.com <info@homeforbrides.com>' . "\r\n";
				
				$Admin = Admin::model()->findByAttributes(array('admin_email'=>$forgot->username));
				$fullname = $Admin->admin_name;
				$link = 'http://'.Yii::app()->request->getServerName();
				$link .= $this->createUrl('site/resetpassword',array('id'=>$Admin->admin_id,'code'=>md5($Admin->admin_password)));
				$link2 = '<a href="'. $link .'" target="_blank"  >' . $link . '</a>';
				
				
				// get template
				$handle = fopen("./mail/resetpassword.html", "r");
				$templates = fread($handle, filesize("./mail/resetpassword.html"));
				fclose($handle);
				$templates = str_replace("#fullname#",	$fullname,	$templates);
				$templates = str_replace("#username#",	$forgot->username,	$templates);
				$templates = str_replace("#link#",		$link,		$templates);
				$templates = str_replace("#link2#",		$link2,		$templates);
				
				if(mail($model->username, " Homeforbrides.com admin site - Forgot yuor password!",$templates, $headers)){
					echo 'OK';
				}else{
					echo 'ERROR';
				}
				
			}
		}
	}
	
	
	/**
	 * Displays the login page
	 */
	public function actionResetpassword($id, $code)
	{
		$this->layout='//layouts/login';
		$this->pageTitle = 'Pose admin site - Đổi mật khẩu';
		$model = Admin::model()->findbyPk($id);
		$password = md5($model->admin_password);
		if($password == $code){
			$template = 'resetpassword';
		}else{
			$template = 'reseterror';
		}
		$model->mat_khau = '';
		if(isset($_POST['Nhanvien']))
		{
			$model->attributes=$_POST['Nhanvien'];
			if($model->save()){
				// send email
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				$headers .= 'From: Pose <info@pose.com.vn>' . "\r\n";
				$fullname = $model->admin_name;
				$link = 'http://'.Yii::app()->request->getServerName();
				$link .= $this->createUrl('site/login');
				
				// get template
				$handle = fopen("./mail/resetpasssuccess.html", "r");
				$templates = fread($handle, filesize("./mail/resetpasssuccess.html"));
				fclose($handle);
				$templates = str_replace("#fullname#",	$fullname,	$templates);
				$templates = str_replace("#username#",	$model->admin_email,	$templates);
				$templates = str_replace("#password#",	$model->admin_password,	$templates);
				$templates = str_replace("#link#",		$link,		$templates);
				
				if(mail($model->ten_dang_nhap, "Pose - Đổi mật khẩu thành công !",$templates, $headers)){
					$this->redirect(array('site/login'));
				}else{
					$this->redirect(array('site/login'));
				}
			}
			
			
			
		}
		// display the login form
		$this->render($template,array('model'=>$model));
	}
	
	public function actionForgot()
	{
		$this->layout='//layouts/login';
		$this->pageTitle = 'Pose - Quên mật khẩu';
		$model=new Forgot;
		
		if(isset($_POST['Forgot']))
		{
			$model->attributes=$_POST['Forgot'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()){
				// send email
				
				
				//echo $Menu['Email address'] . ' _ ' . $Menu['Email Password'];
				
				//Yii::import('ext.yii-mail.YiiMailMessage');
				 $message = new YiiMailMessage;
				// Yii::app()->mail->getTransport()->setUsername(trim($Menu['Email address']));
				// Yii::app()->mail->getTransport()->setPassword(trim($Menu['Email Password']));
				
				
				$Admin = Admin::model()->findByAttributes(array('admin_email'=>$forgot->username));
				$fullname = $Admin->admin_name;
				$link = 'http://'.Yii::app()->request->getServerName();
				$link .= $this->createUrl('site/resetpassword',array('id'=>$Admin->admin_id,'code'=>md5($Admin->admin_password)));
				$link2 = '<a href="'. $link .'" target="_blank"  >' . $link . '</a>';
				
				// get template
				$handle = fopen("./mail/resetpassword.html", "r");
				$templates = fread($handle, filesize("./mail/resetpassword.html"));
				fclose($handle);
				$templates = str_replace("#fullname#",	$fullname,	$templates);
				$templates = str_replace("#username#",	$Admin->admin_email,	$templates);
				$templates = str_replace("#link#",		$link,		$templates);
				$templates = str_replace("#link2#",		$link2,		$templates);
				
				
				$message->setBody($templates);
				$message->subject = 'Sevibebe - Reset password';
				$message->addTo($Admin->admin_email);
				$message->from = 'info@pose.com.vn';
				Yii::app()->mail->send($message);
				echo 'OK';
				
			}else{
				echo 'ERROR2';
			}
		}
		// display the login form
		//$this->render('forgot',array('model'=>$model));
	}
	
	public function actionMovefile(){
		$Blogs = Post::model()->findall(array('condition'=>'post_type=0', 'limit'=>1,'offset'=>1,'order'=>'post_added_time DESC'));
		echo count($Blogs);
		foreach($Blogs as $blog){
			echo '<p>'.$blog['post_title'] . '</p>';
			$PostContent = PostContent::model()->findbypk($blog['post_id']);
			echo $PostContent['post_content'];
		}

		
	}
	
	public function actionForgotinfo($user)
	{
		$this->layout='//layouts/login';
		$this->pageTitle = 'Pose - Quên mật khẩu';
		// display the login form
		$this->render('forgotinfo',array('email'=>$user));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}