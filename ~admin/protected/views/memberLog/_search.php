<?php

/* @var $this MemberLogController */
/* @var $model MemberLog */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'member_id'); ?> <?php echo $form->textField($model,'member_id',array('size'=>9,'maxlength'=>9,'class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'loged_date'); ?> <?php echo $form->textField($model,'loged_date',array('class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->