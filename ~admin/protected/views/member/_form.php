<?php

/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
  <div class="form-group"> <?php echo $form->labelEx($model,'username',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>125,'class'=>'form-control')); ?> <?php echo $form->error($model,'username'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'password',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,'class'=>'form-control')); ?> <?php echo $form->error($model,'password'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'fullname',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?> <?php echo $form->error($model,'fullname'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'gender',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"><?php echo $form->dropDownList($model,'gender',array('Nam'=>'Nam','Nu'=>'Nữ'), array('empty'=>'Chọn giới tính','class'=>'form-control')); ?> <?php echo $form->error($model,'gender'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'city_id',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'city_id',CHtml::listData(City::model()->findAll(), 'city_id', 'city_name'),array('empty'=>'Chọn thành phố','class'=>'form-control')); ?> <?php echo $form->error($model,'city_id'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'status',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'status',array('Show'=>'Show','Hide'=>'Hide','Lock'=>'Lock'), array('empty'=>'Choose status','class'=>'form-control')); ?><?php echo $form->error($model,'status'); ?> </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Add new' : 'Update', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->