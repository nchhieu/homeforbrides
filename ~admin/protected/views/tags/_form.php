<?php

/* @var $this TagsController */
/* @var $model Tags */
/* @var $form CActiveForm */
?> <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tags-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php if($form->errorSummary($model)){ echo   $form->errorSummary($model,'','',array('class'=>'alert alert-danger')); }?>



<fieldset>
<div class="row">
    	<div class="col-md-6">
    <div class="form-group">  <?php echo $form->labelEx($model,'tag_key',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
      <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'tag_key',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
 <?php echo $form->error($model,'tag_key'); ?>
</div>
    </div>
	</div>
    </div>
 <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class'=>'btn btn-lg btn-danger')); ?>
 <?php echo CHtml::resetButton('Nhập lại' , array('class'=>'btn')); ?>
 </div>
</div>
</fieldset>
<?php $this->endWidget(); ?>
 
<!-- form -->