<?php

/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'cat_id',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'cat_id',CHtml::listData(PostCat::model()->findAll(), 'cat_id', 'cat_name'),array('ajax' => array('type'=>'POST','url'=>CController::createUrl('PostSubcat/Ajax'),'update'=>'#Post_subcat_id','data'=>array('cat_id'=>'js:this.value')),'empty'=>'Choose category','class'=>'form-control')); ?> <?php echo $form->error($model,'cat_id'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'subcat_id',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'subcat_id',CHtml::listData($PostSubcat,'subcat_id','subcat_name'),array('empty'=>'Choose sub category','class'=>'form-control')); ?> <?php echo $form->error($model,'subcat_id'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'post_title',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($model,'post_title',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'post_title'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'post_thumb',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-group">
              <div class="form-control uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
              <div class="input-group-btn"> <a class="btn bun-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span> <?php echo $form->fileField($model,'post_thumb',array('class'=>'file-input show-tooltip','data-original-title'=>'.jpp, gif, png; 360px x 360px ;< 200Kb','data-placement'=>'top')); ?> </a> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="form-group"> <?php echo $form->labelEx($Video,'youtube_code',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($Video,'youtube_code',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?> <?php echo $form->error($Video,'youtube_code'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($Video,'video_duration',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textField($Video,'video_duration',array('class'=>'form-control','data-mask'=>'99:99:99','placeholder'=>'__:__:__')); ?> <?php echo $form->error($Video,'video_duration'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'post_intro',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textArea($model,'post_intro',array('rows'=>2,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($model,'post_intro'); ?> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"> <?php echo $form->labelEx($model,'post_status',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'post_status',array('Show'=>'Show','Hide'=>'Hide'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'post_status'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'post_hot',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'post_hot',array('Co'=>'Có','Khong'=>'Không'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'post_hot'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($model,'post_login_require',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->dropDownList($model,'post_login_require',array('Co'=>'Có','Khong'=>'Không'), array('class'=>'form-control')); ?> <?php echo $form->error($model,'post_login_require'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($PostContent,'meta_keyword',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textArea($PostContent,'meta_keyword',array('rows'=>2,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($PostContent,'meta_keyword'); ?> </div>
      </div>
      <div class="form-group"> <?php echo $form->labelEx($PostContent,'meta_description',array('class'=>'col-sm-4 col-lg-3 control-label')); ?>
        <div class="col-sm-8 col-lg-9 controls"> <?php echo $form->textArea($PostContent,'meta_description',array('rows'=>2,'maxlength'=>255,'class'=>'form-control')); ?> <?php echo $form->error($PostContent,'meta_description'); ?> </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12 col-lg-12 controls">
      <?php  $this->widget('application.components.CFKeditor',array('model'=>$PostContent,'attribute'=>'post_content','defaultValue'=>$PostContent->post_content,'config'=>array('Height'=>400,'class'=>'form-control'),));?>
    </div>
  </div>
  <div class="form-group">
    <div class="text-center"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Add new' : 'Update', array('class'=>'btn btn-xlarge btn-primary')); ?> <?php echo CHtml::resetButton('Reset' , array('class'=>'btn')); ?> </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form -->