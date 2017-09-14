<?php

/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal form-row-separated','enctype'=>'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
  <div class="form-group"> <?php echo $form->labelEx($model,'admin_email',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'admin_email',array('size'=>60,'maxlength'=>125,'class'=>'form-control')); ?> <?php echo $form->error($model,'admin_email'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'admin_name',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'admin_name',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?> <?php echo $form->error($model,'admin_name'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'admin_phone',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'admin_phone',array('size'=>16,'maxlength'=>16,'class'=>'form-control')); ?> <?php echo $form->error($model,'admin_phone'); ?> </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'admin_avatar',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls">
      <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="input-group">
          <div class="form-control uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
          <div class="input-group-btn"> <a class="btn bun-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span> <?php echo $form->fileField($model,'admin_avatar',array('class'=>'file-input show-tooltip','data-original-title'=>'.jpp, gif, png; 100px x 100px ;< 100Kb','data-placement'=>'top')); ?> </a> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
        </div>
        <?php echo $form->error($model,'admin_avatar'); ?> </div>
    </div>
  </div>
  <div class="form-group"> <?php echo $form->labelEx($model,'admin_status',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
    <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'admin_status',array('Hien'=>'Hiện','An'=>'Ẩn'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'admin_status'); ?> </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Nhập lại' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->