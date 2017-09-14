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
      <h1 class='text-center'>Reset password</h1>
      <div class='row-fluid'>
        <div class='text-center'> Hi <?php echo $model->user_fname . ' ' . $model->user_lname; ?>, your code was wrong, please
          <?php
		echo CHtml::link('Click here ',array('site/forgot'));
        ?>
          reset password again. </div>
        <hr class='hr-normal'>
      </div>
    </div>
  </div>
</div>
