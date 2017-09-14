<?php
/* @var $this PostSubcatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Post Subcats',
);

$this->menu=array(
	array('label'=>'Create PostSubcat', 'url'=>array('create')),
	array('label'=>'Manage PostSubcat', 'url'=>array('admin')),
);
?>

<h1>Post Subcats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
