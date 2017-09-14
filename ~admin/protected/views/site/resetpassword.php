<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Quên mật khẩu';
$this->breadcrumbs=array(
	'Quên mật khẩu',
);
?>

<div id='wrapper'>
  <div class='application'>
    <div class='application-content'> <a href='/'>
      <div class='icon-shopping-cart'></div>
      <span>Nhanh Nhanh</span> </a> </div>
  </div>
  <div class='controls'>
    <div class='caret'></div>
    <div class='form-wrapper'>
      <h1 class='text-center'>Đổi mật khẩu</h1>
      <?php $form=$this->beginWidget('CActiveForm', array('id'=>'User','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),
)); ?>
      <div class='row-fluid'>
        <div class='text-center'> Chào <?php echo $model->ho_ten ; ?>, vui lòng nhập mật khẩu mới bên dưới. </div>
        <hr class='hr-normal'>
      </div>
      <div class='row-fluid'>
        <div class='span12 icon-over-input'> <?php echo $form->passwordField($model,'mat_khau', array('class'=>'span12','placeholder'=>'Mật khẩu' )); ?> <i class='icon-lock muted'></i> </div>
      </div>
      <?php echo CHtml::submitButton('Đổi mật khẩu', array('class'=>'btn btn-block')); ?>
      <?php $this->endWidget(); ?>
    </div>
  </div>
</div>
