<?php
/* @var $this CirculoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Circulos',
);

$this->menu=array(
	array('label'=>'Crear Circulo', 'url'=>array('create')),
	array('label'=>'Manejar Circulo', 'url'=>array('admin')),
);
?>

<h1>Circulos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
