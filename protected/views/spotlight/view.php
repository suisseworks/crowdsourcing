<?php
/* @var $this SpotlightController */
/* @var $model Spotlight */

$this->breadcrumbs=array(
	'Spotlights'=>array('index'),
	$model->idnw_spotlight,
);

$this->menu=array(
	array('label'=>'List Spotlight', 'url'=>array('index')),
	array('label'=>'Create Spotlight', 'url'=>array('create')),
	array('label'=>'Update Spotlight', 'url'=>array('update', 'id'=>$model->idnw_spotlight)),
	array('label'=>'Delete Spotlight', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnw_spotlight),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Spotlight', 'url'=>array('admin')),
);
?>

<h1>View Spotlight #<?php echo $model->idnw_spotlight; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idnw_spotlight',
		'idafiliado',
		'tipo',
		'titular',
		'mensaje',
		'fecha',
		'estatus',
	),
)); ?>
