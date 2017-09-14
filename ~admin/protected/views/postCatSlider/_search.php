<?php

/* @var $this PostCatSliderController */
/* @var $model PostCatSlider */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'slider_position'); ?><?php echo $form->dropDownList($model,'slider_position',array('0'=>'Slider 1','1'=>'Slider 2'), array('class'=>'form-control','empty'=>'All')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'slider_status'); ?> <?php echo $form->textField($model,'slider_status',array('class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-1"><?php echo CHtml::submitButton('Tìm kiếm',array('class'=>'btn btn-large btn-danger')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->