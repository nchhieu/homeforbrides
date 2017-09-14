<?php

/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'admin_email'); ?> <?php echo $form->textField($model,'admin_email',array('size'=>60,'maxlength'=>125,'class'=>' form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'admin_name'); ?> <?php echo $form->textField($model,'admin_name',array('size'=>60,'maxlength'=>64,'class'=>' form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'admin_phone'); ?> <?php echo $form->textField($model,'admin_phone',array('size'=>16,'maxlength'=>16,'class'=>' form-control')); ?></div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'admin_status'); ?><?php echo $form->dropDownList($model,'admin_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control','empty'=>'Any')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->