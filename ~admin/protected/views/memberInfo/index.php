<?php
/* @var $this MemberInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Member Infos',
);

$this->menu=array(
	array('label'=>'Create MemberInfo', 'url'=>array('create')),
	array('label'=>'Manage MemberInfo', 'url'=>array('admin')),
);
?>

<h1>Member Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
