<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Proyecto', 'url'=>array('index')),
	array('label'=>'Manage Proyecto', 'url'=>array('admin')),
);
?>

<h1>Create Proyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>