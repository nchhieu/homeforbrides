<?php

/* @var $this WeddingStepController */
/* @var $model WeddingStep */
/* @var $form CActiveForm */
?> <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wedding-step-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php if($form->errorSummary($model)){ echo   $form->errorSummary($model,'','',array('class'=>'alert alert-danger')); }?>



<fieldset>
<div class="row">
    	<div class="col-md-6">
    <div class="form-group">  <?php echo $form->labelEx($model,'step_title',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
      <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'step_title',array('size'=>60,'maxlength'=>125,'class'=>'form-control')); ?>
 <?php echo $form->error($model,'step_title'); ?>
</div>
    </div>
	</div>
    	<div class="col-md-6">
    <div class="form-group">  <?php echo $form->labelEx($model,'step_order',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
      <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'step_order',array('class'=>'form-control')); ?>
 <?php echo $form->error($model,'step_order'); ?>
</div>
    </div>
	</div>
    </div><div class="row">	<div class="col-md-6">
    <div class="form-group">  <?php echo $form->labelEx($model,'step_status',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
      <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'step_status',array('size'=>4,'maxlength'=>4,'class'=>'form-control')); ?>
 <?php echo $form->error($model,'step_status'); ?>
</div>
    </div>
	</div>
    </div>
 <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-lg btn-primary')); ?>
 <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?>
 </div>
</div>
</fieldset>
<?php $this->endWidget(); ?>
 
<!-- form -->