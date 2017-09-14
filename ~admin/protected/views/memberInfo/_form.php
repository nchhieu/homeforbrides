<?php

/* @var $this MemberInfoController */
/* @var $model MemberInfo */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-info-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<fieldset>
  <div class="form-group"> <?php echo $form->labelEx($model,'member_id',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'member_id',array('size'=>9,'maxlength'=>9,'class'=>'form-control')); ?> <?php echo $form->error($model,'member_id'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'mobile',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'mobile',array('size'=>16,'maxlength'=>16,'class'=>'form-control')); ?> <?php echo $form->error($model,'mobile'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'brithday',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'brithday',array('class'=>'form-control')); ?> <?php echo $form->error($model,'brithday'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'picture',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'picture'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'city_name',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'city_name',array('size'=>32,'maxlength'=>32,'class'=>'form-control')); ?> <?php echo $form->error($model,'city_name'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'dist_id',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'dist_id',array('class'=>'form-control')); ?> <?php echo $form->error($model,'dist_id'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'dist_name',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'dist_name',array('size'=>32,'maxlength'=>32,'class'=>'form-control')); ?> <?php echo $form->error($model,'dist_name'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'address',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'address'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'favourite',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'favourite',array('rows'=>2,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'favourite'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'create_date',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'create_date',array('class'=>'form-control')); ?> <?php echo $form->error($model,'create_date'); ?> </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Add new' : 'Update', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->