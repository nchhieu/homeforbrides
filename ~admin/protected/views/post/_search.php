<?php

/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'post_id'); ?> <?php echo $form->textField($model,'post_id',array('size'=>9,'maxlength'=>9,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'cat_id'); ?> <?php echo $form->dropDownList($model,'cat_id',CHtml::listData(PostCat::model()->findAll(), 'cat_id', 'cat_name'),array('ajax' => array('type'=>'POST','url'=>CController::createUrl('PostSubcat/Ajax'),'update'=>'#Post_subcat_id','data'=>array('cat_id'=>'js:this.value')),'empty'=>'Choose category','class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'subcat_id'); ?> <?php echo $form->dropDownList($model,'subcat_id',array(),array('empty'=>'Choose sub category','class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'post_title'); ?> <?php echo $form->textField($model,'post_title',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'post_status'); ?><?php echo $form->dropDownList($model,'post_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control','empty'=>'Any')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo $form->label($model,'post_hot'); ?> <?php echo $form->dropDownList($model,'post_hot',array('Co'=>'Có','Khong'=>'Không'), array('class'=>'form-control','empty'=>'Any')); ?> </div>
<div class="col-sm-2 col-lg-2"> <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-large btn-primary')); ?> </div>
<?php $this->endWidget(); ?>

<!-- search-form -->