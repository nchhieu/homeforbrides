<?php

/* @var $this PostSliderController */
/* @var $model PostSlider */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-slider-form',
	//'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php if($form->errorSummary($model)){ echo   $form->errorSummary($model,'','',array('class'=>'alert alert-danger')); }?>
<fieldset>
  <div class="row">
  
  </div>
  <div class="row">
  <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'slider_position',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'slider_position',array('0'=>'Big Banner','1'=>'Small Banner'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'slider_position'); ?> </div>
      </div>
    </div>
    
   <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'photos',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-group">
              <div class="form-control uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
              <div class="input-group-btn"> <a class="btn bun-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span> <?php echo $form->fileField($model,'photos',array('class'=>'file-input show-tooltip','data-original-title'=>'Size 1920px x 800px','data-placement'=>'top')); ?> </a> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div>
            <?php echo $form->error($model,'photos'); ?> </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'slider_sort',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'slider_sort',array('class'=>'form-control')); ?> <?php echo $form->error($model,'slider_sort'); ?> </div>
      </div>
    </div>
    
 
  </div>
  <div class="row"></div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class'=>'btn btn-lg btn-danger')); ?> <?php echo CHtml::resetButton('Nhập lại' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->