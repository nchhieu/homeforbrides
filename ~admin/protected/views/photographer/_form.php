<?php

/* @var $this PhotographerController */
/* @var $model Photographer */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photographer-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'photographer_nick',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'photographer_nick',array('maxlength'=>64,'class'=>'form-control')); ?> <?php echo $form->error($model,'photographer_nick'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'photographer_fullname',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'photographer_fullname',array('maxlength'=>64,'class'=>'form-control')); ?> <?php echo $form->error($model,'photographer_fullname'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'photographer_phone',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'photographer_phone',array('maxlength'=>32,'class'=>'form-control')); ?> <?php echo $form->error($model,'photographer_phone'); ?> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'photographer_avatar',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-group">
              <div class="form-control uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
              <div class="input-group-btn"> <a class="btn bun-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span> <?php echo $form->fileField($model,'photographer_avatar',array('class'=>'file-input show-tooltip','data-original-title'=>'.jpp, gif, png; 100px x 100px ;< 100Kb','data-placement'=>'top')); ?> </a> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div>
            <?php echo $form->error($model,'photographer_avatar'); ?> </div>
        </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'photographer_gender',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'photographer_gender',array('Nam'=>'Nam','Nu'=>'Nữ'), array('class'=>'form-control', 'empty'=>'Chọn giới tính')); ?> <?php echo $form->error($model,'photographer_gender'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'photographer_status',array('class'=>'ccol-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'photographer_status',array('Hien'=>'Hiện','An'=>'Ẩn'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'photographer_status'); ?> </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->