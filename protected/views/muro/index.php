<?php
/* @var $this MuroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Muros',
);

$this->menu=array(
	array('label'=>'Create Muro', 'url'=>array('create')),
	array('label'=>'Manage Muro', 'url'=>array('admin')),
);
?>

<h1>Muros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
