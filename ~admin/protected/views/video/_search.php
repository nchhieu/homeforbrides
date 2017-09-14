<?php

/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'video_name'); ?> <?php echo $form->textField($model,'video_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'video_link'); ?> <?php echo $form->textField($model,'video_link',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Tỉm kiếm',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->