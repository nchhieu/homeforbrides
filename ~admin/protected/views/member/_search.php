<?php

/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'username'); ?> <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>125,'class'=>'col-sm-12 col-lg-12 form-control')); ?></div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'fullname'); ?> <?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>64,'class'=>'col-sm-12 col-lg-12 form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'gender'); ?> <?php echo $form->dropDownList($model,'gender',array('Nam'=>'Nam','Nu'=>'Nữ'), array('empty'=>'Any','class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'city_id'); ?><?php echo $form->dropDownList($model,'city_id',CHtml::listData(City::model()->findAll(), 'city_id', 'city_name'),array('empty'=>'Any','class'=>'form-control')); ?></div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'status'); ?><?php echo $form->dropDownList($model,'status',array('Show'=>'Show','Hide'=>'Hide','Khoa'=>'Khóa'), array('empty'=>'Any','class'=>'form-control')); ?></div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->