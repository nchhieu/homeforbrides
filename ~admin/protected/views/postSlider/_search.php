<?php

/* @var $this PostSliderController */
/* @var $model PostSlider */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'post_id'); ?> <?php echo $form->textField($model,'post_id',array('size'=>9,'maxlength'=>9,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-1"><?php echo CHtml::submitButton('Tìm kiếm',array('class'=>'btn btn-large btn-danger')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->