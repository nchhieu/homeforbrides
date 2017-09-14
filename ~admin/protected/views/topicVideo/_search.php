<?php

/* @var $this TopicVideoController */
/* @var $model TopicVideo */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'topic_id'); ?> <?php echo $form->textField($model,'topic_id',array('class'=>'form-control')); ?> </div>
<div class="col-sm-4 col-lg-4"> <?php echo $form->label($model,'subcat_id'); ?> <?php echo $form->dropDownList($model,'subcat_id',CHtml::listData(PostSubcat::model()->findAll(array('condition'=>'cat_id= 18','order'=>'subcat_order')), 'subcat_id', 'subcat_name'),array('empty'=>'All','class'=>'form-control chosen')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'topic_name'); ?> <?php echo $form->textField($model,'topic_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'topic_status'); ?> <?php echo $form->dropDownList($model,'topic_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control','empty'=>'All',)); ?> </div>
<div class="col-sm-2 col-lg-1"><?php echo CHtml::submitButton('Tìm kiếm',array('class'=>'btn btn-large btn-danger')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->