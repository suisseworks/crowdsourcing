<?php
/* @var $this MensajeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mensajes',
);

$this->menu=array(
	array('label'=>'Create Mensaje', 'url'=>array('create')),
	array('label'=>'Manage Mensaje', 'url'=>array('admin')),
);
?>

<h1>Mensajes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
