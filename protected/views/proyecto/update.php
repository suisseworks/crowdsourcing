<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->idcs_proyecto=>array('view','id'=>$model->idcs_proyecto),
	'Update',
);

$this->menu=array(
	array('label'=>'List Proyecto', 'url'=>array('index')),
	array('label'=>'Create Proyecto', 'url'=>array('create')),
	array('label'=>'View Proyecto', 'url'=>array('view', 'id'=>$model->idcs_proyecto)),
	array('label'=>'Manage Proyecto', 'url'=>array('admin')),
);
?>

<h1>Update Proyecto <?php echo $model->idcs_proyecto; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>