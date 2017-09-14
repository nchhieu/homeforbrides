<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Forgot Password';
$this->breadcrumbs=array(
	'Forgot Password',
);
?>

<div id='wrapper'>
  <div class='application'>
    <div class='application-content'> <a href='/'>
      <img src="./assets/images/logo.png"  />
      <span>Sevi Bebe</span> </a> </div>
  </div>
  <div class='controls'>
    <div class='caret'></div>
    <div class='form-wrapper'>
      <h1 class='text-center'>Forgot Password</h1>
      <?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),
)); ?>
      <div class='row-fluid'>
        <div class='span12 icon-over-input'> <?php echo $form->textField($model,'username', array('class'=>'span12','placeholder'=>'Email' )); ?> <i class='icon-user muted'></i> <?php echo $form->error($model,'username'); ?></div>
      </div>
      <?php echo CHtml::submitButton('Create new password', array('class'=>'btn btn-block')); ?>
      <?php $this->endWidget(); ?>
      <div class='text-center'>
        <hr class='hr-normal'>
       Enter your email to create new password. </div>
    </div>
  </div>
</div>
