<?php
/* @var $this GalleryPhotosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gallery Photoses',
);

$this->menu=array(
	array('label'=>'Create GalleryPhotos', 'url'=>array('create')),
	array('label'=>'Manage GalleryPhotos', 'url'=>array('admin')),
);
?>

<h1>Gallery Photoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
