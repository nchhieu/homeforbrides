<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Đăng nhập';
$this->breadcrumbs=array(
	'Đăng nhập',
);
?>
<!-- BEGIN Main Content -->

<div class="login-wrapper"> 
  <!-- BEGIN Login Form -->
  <?php $form=$this->beginWidget('CActiveForm', array('id'=>'form-login','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),
)); ?>
  <p class="clearfix text-center "> <a href="/" class=""><img class="logo-login pull-left" src="img/logo.png"   alt="Pose - Admin site"></a> </p>
  <h3>Login to your account</h3>
  <hr/>
  <div class="form-group">
    <div class="controls"> <?php echo $form->textField($model,'username', array('class'=>'form-control','placeholder'=>'Email ...' )); ?> <?php echo $form->error($model,'username'); ?> </div>
  </div>
  <div class="form-group">
    <div class="controls"> <?php echo $form->passwordField($model,'password', array('class'=>'form-control','placeholder'=>'Password ...' )); ?> <?php echo $form->error($model,'password'); ?></div>
  </div>
  
  <?php if ($model->scenario == 'withCaptcha' && CCaptcha::checkRequirements()): ?>
  <div class="form-group">
    <div class="controls">
      <?php $this->widget('CCaptcha'); ?>
      <?php echo $form->textField($model, 'verifyCode',array('class'=>'form-control','placeholder'=>'Mã xác nhận')); ?> <?php echo $form->error($model, 'verifyCode'); ?> </div>
  </div>
  <?php endif; ?>
  
  <div class="form-group">
    <div class="controls">
      <label class="checkbox"> <?php echo $form->checkBox($model,'rememberMe',array('class'=>'rem_me')); ?> Remember me </label>
    </div>
  </div>
  <div class="form-group">
    <div class="controls"> <?php echo CHtml::submitButton('Log-in', array('class'=>'btn btn-primary form-control')); ?> </div>
  </div>
  <hr/>
  <p class="clearfix"> <a href="#" class="goto-forgot pull-left">Forgot your password ?</a> </p>
  <?php $this->endWidget(); ?>
  <!-- END Login Form --> 
  
  <!-- BEGIN Forgot Password Form -->
  <?php $form=$this->beginWidget('CActiveForm', 
						array(
								'id'=>'form-forgot',
								'enableClientValidation'=>false,
								'clientOptions'=>array('validateOnSubmit'=>false,),
								'htmlOptions'=>array('style'=>'display:none','onsubmit'=>"return false;",'onkeypress'=>" if(event.keyCode == 13){ forget(); } "),
)); ?>
  <p class="clearfix "> <a href="/" class=" "><img class="logo-login pull-left" src="img/logo.png"   alt="Pose - Admin site"></a></p>
  <h3>Quên mật khẩu</h3>
  <hr/>
  <div class="form-group">
    <div class="controls"> <?php echo $form->textField($forgot,'username', array('class'=>'form-control','placeholder'=>'Email' )); ?> </div>
  </div>
  <div class="form-group">
    <div class="controls"> <?php echo CHtml::submitButton('Khôi phục', array('class'=>'btn btn-primary form-control','onclick'=>"forget()")); ?> </div>
  </div>
  <hr/>
  <p class="clearfix"> <a href="#" class="goto-login pull-left">← Back to log-in</a> </p>
  <?php $this->endWidget(); ?>
  <!-- END Forgot Password Form --> 
  
</div>
<!-- END Main Content --> 

<!--basic scripts--> 
<script>window.jQuery || document.write('<script src="assets/jquery/jquery-2.0.3.min.js"><\/script>')</script> 
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
            });
        </script>