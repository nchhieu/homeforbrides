<?php

/* @var $this PostContentController */
/* @var $model PostContent */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-content-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php if($form->errorSummary($model)){ echo  '<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><h4><i class="icon-remove-sign"></i> Lỗi</h4>' . $form->errorSummary($model,'','',array('class'=>'alert alert-error')) . '</div>'; }?>
<fieldset>
  <div class="form-group"> <?php echo $form->labelEx($model,'post_id',array('class'=>'control-label')); ?>
    <div class="col-sm-6 col-lg-4 controls"> <?php echo $form->textField($model,'post_id',array('size'=>9,'maxlength'=>9,'class'=>'span12')); ?> <?php echo $form->error($model,'post_id'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'post_header_photo',array('class'=>'control-label')); ?>
    <div class="col-sm-6 col-lg-4 controls"> <?php echo $form->textField($model,'post_header_photo',array('size'=>60,'maxlength'=>125,'class'=>'span12')); ?> <?php echo $form->error($model,'post_header_photo'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'post_content',array('class'=>'control-label')); ?>
    <div class="col-sm-6 col-lg-4 controls"> <?php echo $form->textArea($model,'post_content',array('rows'=>6, 'cols'=>50)); ?> <?php echo $form->error($model,'post_content'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'meta_keyword',array('class'=>'control-label')); ?>
    <div class="col-sm-6 col-lg-4 controls"> <?php echo $form->textField($model,'meta_keyword',array('size'=>60,'maxlength'=>255,'class'=>'span12')); ?> <?php echo $form->error($model,'meta_keyword'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'meta_description',array('class'=>'control-label')); ?>
    <div class="col-sm-6 col-lg-4 controls"> <?php echo $form->textField($model,'meta_description',array('size'=>60,'maxlength'=>255,'class'=>'span12')); ?> <?php echo $form->error($model,'meta_description'); ?> </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-large btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->