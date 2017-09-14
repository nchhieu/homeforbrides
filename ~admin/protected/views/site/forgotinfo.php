<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Forgot password';
$this->breadcrumbs=array(
	'Login',
);
?>
<!-- BEGIN Main Content -->
        <div class="login-wrapper">
              
            <!-- BEGIN Login Form -->
           <form >
          		 <p class="clearfix ">
                    <a href="http://www.sevibebe.com" class=" "><img class="logo-login pull-left" src="img/misc/logo.png"   alt="Sevi Bebe Logo"></a>
                </p>
               <h3>Forgot password</h3>
                <hr/>
                <div class="form-group">
                    <div class="controls">
                        Please check your email <strong><?php echo $email;?></strong> to reset password

                    </div>
                </div>
                <p>&nbsp;</p>
                
                <p class="clearfix cdpfooter pull-right">
                    <a href="#" class=" "><img src="img/misc/logo_cinfikir.png"></a>
                </p>
            	</form>
            <!-- END Login Form -->

            <!-- BEGIN Forgot Password Form -->
           
                
               
           
            <!-- END Forgot Password Form -->

            <!-- BEGIN Register Form -->
           
            <!-- END Register Form -->
            
        </div>
        <!-- END Main Content -->
        
        <!--basic scripts--> 

<script src="assets/jquery/jquery-2.0.3.min.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
            function goToForm(form)
            {
                $('.login-wrapper > form:visible').fadeOut(500, function(){
                    $('#form-' + form).fadeIn(500);
                });
            }
            $(function() {
                $('.goto-login').click(function(){
                    goToForm('login');
                });
                $('.goto-forgot').click(function(){
                    goToForm('forgot');
                });
                $('.goto-register').click(function(){
                    goToForm('register');
                });
            });
        </script>