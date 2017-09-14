<?php

/* @var $this LocationController */
/* @var $model Location */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'location_name'); ?> <?php echo $form->textField($model,'location_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?></div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'city_id'); ?> <?php echo $form->dropDownList($model,'city_id',CHtml::listData(City::model()->findAll(), 'city_id', 'city_name'),array('empty'=>'Any','class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'location_phone'); ?> <?php echo $form->textField($model,'location_phone',array('size'=>32,'maxlength'=>32,'class'=>' form-control')); ?></div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'location_status'); ?> <?php echo $form->dropDownList($model,'location_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control','empty'=>'Any')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->