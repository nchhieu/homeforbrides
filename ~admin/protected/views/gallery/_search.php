<?php

/* @var $this GalleryController */
/* @var $model Gallery */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'gallery_name'); ?> <?php echo $form->textField($model,'gallery_name',array('size'=>60,'maxlength'=>255,'class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'gallery_taken_time'); ?> <?php echo $form->textField($model,'gallery_taken_time',array('class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'photographer_name'); ?> <?php echo $form->textField($model,'photographer_name',array('size'=>60,'maxlength'=>64,'class'=>'col-sm-12 col-lg-12 form-control')); ?></div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->