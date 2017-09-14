<?php

/* @var $this PhotographerController */
/* @var $model Photographer */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'photographer_nick'); ?> <?php echo $form->textField($model,'photographer_nick',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'photographer_fullname'); ?> <?php echo $form->textField($model,'photographer_fullname',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'photographer_phone'); ?> <?php echo $form->textField($model,'photographer_phone',array('size'=>32,'maxlength'=>32,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'photographer_status'); ?> <?php echo $form->dropDownList($model,'photographer_status',array('Hien'=>'Hiện','An'=>'Ẩn'), array('class'=>'form-control','empty'=>'Tất cả')); ?></div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Tìm kiếm',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->