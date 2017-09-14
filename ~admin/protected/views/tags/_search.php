<?php

/* @var $this TagsController */
/* @var $model Tags */
/* @var $form CActiveForm */
?> <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

      <div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'tag_id'); ?>
 <?php echo $form->textField($model,'tag_id',array('class'=>'form-control')); ?>
 </div>
      <div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'tag_key'); ?>
 <?php echo $form->textField($model,'tag_key',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
 </div>
    <div class="col-sm-2 col-lg-1"><?php echo CHtml::submitButton('Tìm kiếm',array('class'=>'btn btn-large btn-danger')); ?>
 </div>

<?php $this->endWidget(); ?>
 
<!-- search-form -->