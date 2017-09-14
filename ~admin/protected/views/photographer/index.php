<?php
/* @var $this PhotographerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Photographers',
);

$this->menu=array(
	array('label'=>'Create Photographer', 'url'=>array('create')),
	array('label'=>'Manage Photographer', 'url'=>array('admin')),
);
?>

<h1>Photographers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
