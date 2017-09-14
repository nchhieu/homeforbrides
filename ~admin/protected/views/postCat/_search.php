<?php

/* @var $this PostCatController */
/* @var $model PostCat */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'topic_id'); ?> <?php echo $form->dropDownList($model,'topic_id',array('Post','Photography','Videography'), array('class'=>'form-control','empty'=>'Any')); ?>  </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'cat_name'); ?> <?php echo $form->textField($model,'cat_name',array('size'=>60,'maxlength'=>125,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'cat_status'); ?> <?php echo $form->dropDownList($model,'cat_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control', 'empty'=>'Any')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->