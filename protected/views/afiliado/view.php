<?php
/* @var $this AfiliadoController */
/* @var $model Afiliado */

$this->breadcrumbs=array(
	'Afiliados'=>array('index'),
	$model->idnw_afiliado,
);

$this->menu=array(
	array('label'=>'List Afiliado', 'url'=>array('index')),
	array('label'=>'Create Afiliado', 'url'=>array('create')),
	array('label'=>'Update Afiliado', 'url'=>array('update', 'id'=>$model->idnw_afiliado)),
	array('label'=>'Delete Afiliado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnw_afiliado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Afiliado', 'url'=>array('admin')),
);
?>

<h1>View Afiliado #<?php echo $model->idnw_afiliado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idnw_afiliado',
		'email',
		'usuario',
		'clave',
		'nombre',
		'apellido',
		'idcategoria',
		'idespecialidad',
		'fecha_ingreso',
		'idpais',
		'idprovincia',
		'ciudad',
		'domicilio',
		'estatus',
		'tipo',
		'biografia',
		'link_facebook',
		'link_twitter',
		'link_linkedin',
		'genero',
		'avatar',
	),
)); ?>
