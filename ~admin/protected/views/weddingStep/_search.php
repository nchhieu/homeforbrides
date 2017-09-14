<?php

/* @var $this WeddingStepController */
/* @var $model WeddingStep */
/* @var $form CActiveForm */
?> <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

      <div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'step_id'); ?>
 <?php echo $form->textField($model,'step_id',array('class'=>'form-control')); ?>
 </div>
      <div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'step_title'); ?>
 <?php echo $form->textField($model,'step_title',array('size'=>60,'maxlength'=>125,'class'=>'form-control')); ?>
 </div>
      <div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'step_order'); ?>
 <?php echo $form->textField($model,'step_order',array('class'=>'form-control')); ?>
 </div>
      <div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'step_status'); ?>
 <?php echo $form->textField($model,'step_status',array('size'=>4,'maxlength'=>4,'class'=>'form-control')); ?>
 </div>
    <div class="col-sm-2 col-lg-1"><?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?>
 </div>

<?php $this->endWidget(); ?>
 
<!-- search-form -->