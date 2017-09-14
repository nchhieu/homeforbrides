<?php

/* @var $this GalleryPhotosController */
/* @var $model GalleryPhotos */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Tìm kiếm',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->