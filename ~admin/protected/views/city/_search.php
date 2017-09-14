<?php

/* @var $this CityController */
/* @var $model City */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'city_name'); ?> <?php echo $form->textField($model,'city_name',array('size'=>60,'maxlength'=>64,'class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'city_status'); ?> <?php echo $form->dropDownList($model,'city_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control','empty'=>'Any')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->