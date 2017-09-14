<?php

/* @var $this MemberInfoController */
/* @var $model MemberInfo */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'mobile'); ?> <?php echo $form->textField($model,'mobile',array('size'=>16,'maxlength'=>16,'class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'brithday'); ?> <?php echo $form->textField($model,'brithday',array('class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'city_name'); ?> <?php echo $form->textField($model,'city_name',array('size'=>32,'maxlength'=>32,'class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'dist_name'); ?> <?php echo $form->textField($model,'dist_name',array('size'=>32,'maxlength'=>32,'class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->