<?php
/* @var $this PostCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Post Cats',
);

$this->menu=array(
	array('label'=>'Create PostCat', 'url'=>array('create')),
	array('label'=>'Manage PostCat', 'url'=>array('admin')),
);
?>

<h1>Post Cats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
