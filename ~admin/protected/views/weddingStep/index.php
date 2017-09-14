<?php
/* @var $this WeddingStepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wedding Steps',
);

$this->menu=array(
	array('label'=>'Create WeddingStep', 'url'=>array('create')),
	array('label'=>'Manage WeddingStep', 'url'=>array('admin')),
);
?>

<h1>Wedding Steps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
