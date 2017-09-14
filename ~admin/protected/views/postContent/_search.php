<?php

/* @var $this PostContentController */
/* @var $model PostContent */
/* @var $form CActiveForm */
?> <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class='row-fluid'>
      <div class="span3"> <?php echo $form->label($model,'post_content_id'); ?>
 <?php echo $form->textField($model,'post_content_id',array('size'=>9,'maxlength'=>9,'class'=>'span12')); ?>
 </div>
  
    
      <div class="span3"> <?php echo $form->label($model,'post_id'); ?>
 <?php echo $form->textField($model,'post_id',array('size'=>9,'maxlength'=>9,'class'=>'span12')); ?>
 </div>
  
    
      <div class="span3"> <?php echo $form->label($model,'post_header_photo'); ?>
 <?php echo $form->textField($model,'post_header_photo',array('size'=>60,'maxlength'=>125,'class'=>'span12')); ?>
 </div>
  
    
      <div class="span3"> <?php echo $form->label($model,'post_content'); ?>
 <?php echo $form->textArea($model,'post_content',array('rows'=>6, 'cols'=>50)); ?>
 </div>
  
  </div><div class='row-fluid'>  
      <div class="span3"> <?php echo $form->label($model,'meta_keyword'); ?>
 <?php echo $form->textField($model,'meta_keyword',array('size'=>60,'maxlength'=>255,'class'=>'span12')); ?>
 </div>
  
    
      <div class="span3"> <?php echo $form->label($model,'meta_description'); ?>
 <?php echo $form->textField($model,'meta_description',array('size'=>60,'maxlength'=>255,'class'=>'span12')); ?>
 </div>
  
    
    <div class="span3"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
 
<!-- search-form -->