<?php
/* @var $this CirculoController */
/* @var $model Circulo */

$this->breadcrumbs=array(
	'Circulos'=>array('index'),
	$model->idnw_circulo,
);

$this->menu=array(
	array('label'=>'List Circulo', 'url'=>array('index')),
	array('label'=>'Create Circulo', 'url'=>array('create')),
	array('label'=>'Update Circulo', 'url'=>array('update', 'id'=>$model->idnw_circulo)),
	array('label'=>'Delete Circulo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnw_circulo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Circulo', 'url'=>array('admin')),
);
?>

<h1>View Circulo #<?php echo $model->idnw_circulo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idnw_circulo',
		'nombre',
		'descripcion',
		'idlider',
		'idpais',
		'idprovincia',
	),
)); ?>
