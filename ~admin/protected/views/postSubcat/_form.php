<?php

/* @var $this PostSubcatController */
/* @var $model PostSubcat */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-subcat-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_id',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'cat_id',CHtml::listData(PostCat::model()->findAll(), 'cat_id', 'cat_name'),array('empty'=>'Choose category','class'=>'form-control')); ?> <?php echo $form->error($model,'cat_id'); ?> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_name',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'subcat_name',array('size'=>60,'maxlength'=>125,'class'=>'form-control')); ?> <?php echo $form->error($model,'subcat_name'); ?> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_thumb',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-group">
              <div class="form-control uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
              <div class="input-group-btn"> <a class="btn bun-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span> <?php echo $form->fileField($model,'subcat_thumb',array('class'=>'file-input show-tooltip','data-original-title'=>'.jpp, gif, png;  200px x 112px; < 100Kb','data-placement'=>'top')); ?> </a> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div>
            <?php echo $form->error($model,'subcat_thumb'); ?> </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_order',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'subcat_order',array('class'=>'form-control')); ?> <?php echo $form->error($model,'subcat_order'); ?> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_url',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'subcat_url',array('class'=>'form-control')); ?> <?php echo $form->error($model,'subcat_url'); ?> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_status',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'subcat_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'subcat_status'); ?> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_as_post',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'subcat_as_post',array('No'=>'No/Video Không có cấp','Yes'=>'Yes/Video Có hiện thị cấp'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'subcat_status'); ?> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_keyword',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textArea($model,'subcat_keyword',array('rows'=>2,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'subcat_keyword'); ?> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_description',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textArea($model,'subcat_description',array('rows'=>2,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'subcat_description'); ?> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="col-sm-12 col-lg-12 controls">
          <?php  $this->widget('application.components.CFKeditor',array('model'=>$model,'attribute'=>'subcat_intro','defaultValue'=>$model->subcat_intro,'config'=>array('Height'=>400,'class'=>'form-control'),));?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="col-sm-12 col-lg-12 controls">
          <?php  $this->widget('application.components.CFKeditor',array('model'=>$model,'attribute'=>'subcat_intro2','defaultValue'=>$model->subcat_intro2,'config'=>array('Height'=>400,'class'=>'form-control'),));?>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class=" text-center"><?php echo CHtml::submitButton($model->isNewRecord ? 'Add new' : 'Update', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->