<?php

/* @var $this PostCatController */
/* @var $model PostCat */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-cat-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'topic_id',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'topic_id',array('Post','Photography','Videography','Home'), array('class'=>'form-control','empty'=>'Chọn chủ đề')); ?> <?php echo $form->error($model,'topic_id'); ?> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_name',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'cat_name',array('size'=>60,'maxlength'=>125,'class'=>'form-control')); ?> <?php echo $form->error($model,'cat_name'); ?> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_screen',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-group">
              <div class="form-control uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
              <div class="input-group-btn"> <a class="btn bun-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span> <?php echo $form->fileField($model,'cat_screen',array('class'=>'file-input show-tooltip','data-original-title'=>'JPG, GIF, PNG; 1080px x 700px ; < 1024Kb','data-placement'=>'top')); ?> </a> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div>
            <?php echo $form->error($model,'cat_screen'); ?> </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_thumb',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-group">
              <div class="form-control uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
              <div class="input-group-btn"> <a class="btn bun-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span> <?php echo $form->fileField($model,'cat_thumb',array('class'=>'file-input show-tooltip','data-original-title'=>'.PNG, background trong suốt 400px x 347px','data-placement'=>'top')); ?> </a> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div>
            <?php echo $form->error($model,'cat_thumb'); ?> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_order',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'cat_order',array('class'=>'form-control')); ?> <?php echo $form->error($model,'cat_order'); ?> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_status',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'cat_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'cat_status'); ?> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_description',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textArea($model,'cat_description',array('rows'=>2,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'cat_description'); ?> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_keyword',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textArea($model,'cat_keyword',array('rows'=>2,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'cat_keyword'); ?> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="col-sm-12 col-lg-12 controls">
          <?php  $this->widget('application.components.CFKeditor',array('model'=>$model,'attribute'=>'cat_intro','defaultValue'=>$model->cat_intro,'config'=>array('Height'=>800,'class'=>'form-control'),));?>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class=" text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Add new' : 'Update', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->