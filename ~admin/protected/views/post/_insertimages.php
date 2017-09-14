<?php

/* @var $this GalleryPhotosController */
/* @var $model GalleryPhotos */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-photos-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal ','enctype'=>'multipart/form-data'),
)); ?>
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<script type="text/javascript" src="./js/pupload/plupload.js"></script>
<script type="text/javascript" src="./js/pupload/plupload.gears.js"></script>
<script type="text/javascript" src="./js/pupload/plupload.silverlight.js"></script>
<script type="text/javascript" src="./js/pupload/plupload.flash.js"></script>
<script type="text/javascript" src="./js/pupload/plupload.browserplus.js"></script>
<script type="text/javascript" src="./js/pupload/plupload.html4.js"></script>
<script type="text/javascript" src="./js/pupload/plupload.html5.js"></script>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <div class="col-sm-12 col-lg-12 controls">
          <div id="container">
            <div id="filelist">No runtime found.</div>
            <br />
            <a id="pickfiles" href="javascript:;" class="btn btn-xlarge btn-primary">[Select files]</a> <a id="uploadfiles" href="javascript:;" class="btn btn-xlarge btn-primary">[Upload files]</a> <?php echo CHtml::link('<< Back ',array('post/update','id'=>$id),array( 'class'=>'btn btn-xlarge btn-primary'))?>  </div>
        </div>
      </div>
    </div>
  </div>
</fieldset>
<?php $this->endWidget(); ?>

<!-- form --> 
<script type="text/javascript">
// Custom example logic
function $(id) {
	return document.getElementById(id);	
}


var uploader = new plupload.Uploader({
	runtimes : 'gears,html5,flash,silverlight,browserplus',
	browse_button : 'pickfiles',
	container: 'container',
	max_file_size : '20mb',
	url : 'index.php?r=Post/UploadFilesPlupload&id=<?php echo $id;?>',
	//resize : {width : 800, height : 800, quality : 100},
	flash_swf_url : './js/plupload.flash.swf',
	silverlight_xap_url : './js/plupload.silverlight.xap',
	filters : [
		{title : "Image files", extensions : "jpg,gif,png"},
		{title : "Zip files", extensions : "zip"}
	]
});

uploader.bind('Init', function(up, params) {
	$('filelist').innerHTML = "<div>Current runtime: " + params.runtime + "</div>";
});

uploader.init();

uploader.bind('FilesAdded', function(up, files) {
	for (var i in files) {
		$('filelist').innerHTML += '<div id="' + files[i].id + '">' + files[i].name + ' (' + plupload.formatSize(files[i].size) + ') <b></b></div>';
	}
});

uploader.bind('UploadProgress', function(up, file) {
	$(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
});

$('uploadfiles').onclick = function() {
	uploader.start();
	return false;
};


</script>