<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->idcs_proyecto,
);

$this->menu=array(
	array('label'=>'List Proyecto', 'url'=>array('index')),
	array('label'=>'Create Proyecto', 'url'=>array('create')),
	array('label'=>'Update Proyecto', 'url'=>array('update', 'id'=>$model->idcs_proyecto)),
	array('label'=>'Delete Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcs_proyecto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Proyecto', 'url'=>array('admin')),
);
?>

<h1>View Proyecto #<?php echo $model->idcs_proyecto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcs_proyecto',
		'idafiliado',
		'nombre',
		'descripcion',
		'idcategoriaproyecto',
		'fecha_creacion',
		'logo',
		'fecha_envio',
		'fecha_aprobacion',
		'estado',
		'roi',
		'nivel_riesgo',
		'plazo',
		'inversion_total_requerida',
		'inversion_minima',
		'video',
		'tags',
		'especialidades',
	),
)); ?>
