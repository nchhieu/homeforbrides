<?php

/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
  <div class="form-group"> <?php echo $form->labelEx($model,'admin_email',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'admin_email',array('size'=>60,'maxlength'=>125,'class'=>'form-control','readonly'=>'true')); ?> <?php echo $form->error($model,'admin_email'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'admin_password',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'admin_password',array('size'=>60,'maxlength'=>125,'class'=>'form-control')); ?> <?php echo $form->error($model,'admin_password'); ?> </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Nhập lại' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->