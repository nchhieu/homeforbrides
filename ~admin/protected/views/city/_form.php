<?php

/* @var $this CityController */
/* @var $model City */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<fieldset>
  <div class="form-group"> <?php echo $form->labelEx($model,'city_name',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'city_name',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?> <?php echo $form->error($model,'city_name'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'city_order',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'city_order',array('class'=>'form-control')); ?> <?php echo $form->error($model,'city_order'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'city_status',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'city_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'city_status'); ?> </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Add new' : 'Update', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->