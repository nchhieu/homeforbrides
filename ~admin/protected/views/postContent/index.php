<?php
/* @var $this PostContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Post Contents',
);

$this->menu=array(
	array('label'=>'Create PostContent', 'url'=>array('create')),
	array('label'=>'Manage PostContent', 'url'=>array('admin')),
);
?>

<h1>Post Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
