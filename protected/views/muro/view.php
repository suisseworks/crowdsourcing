<?php
/* @var $this MuroController */
/* @var $model Muro */

$this->breadcrumbs=array(
	'Muros'=>array('index'),
	$model->idnw_muro,
);

$this->menu=array(
	array('label'=>'List Muro', 'url'=>array('index')),
	array('label'=>'Create Muro', 'url'=>array('create')),
	array('label'=>'Update Muro', 'url'=>array('update', 'id'=>$model->idnw_muro)),
	array('label'=>'Delete Muro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnw_muro),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Muro', 'url'=>array('admin')),
);
?>

<h1>View Muro #<?php echo $model->idnw_muro; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idnw_muro',
		'fecha',
		'idafiliado',
		'asunto',
		'mensaje',
		'estado',
	),
)); ?>
