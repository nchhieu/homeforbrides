<?php

/* @var $this MemberLogController */
/* @var $model MemberLog */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-log-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<fieldset>
  <div class="form-group"> <?php echo $form->labelEx($model,'member_id',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'member_id',array('size'=>9,'maxlength'=>9,'class'=>'form-control')); ?> <?php echo $form->error($model,'member_id'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'loged_date',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'loged_date',array('class'=>'form-control')); ?> <?php echo $form->error($model,'loged_date'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'ip',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'ip',array('class'=>'form-control')); ?> <?php echo $form->error($model,'ip'); ?> </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Add new' : 'Update', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->