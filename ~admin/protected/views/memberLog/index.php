<?php
/* @var $this MemberLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Member Logs',
);

$this->menu=array(
	array('label'=>'Create MemberLog', 'url'=>array('create')),
	array('label'=>'Manage MemberLog', 'url'=>array('admin')),
);
?>

<h1>Member Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
