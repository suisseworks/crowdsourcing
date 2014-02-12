<?php
/* @var $this MensajeController */
/* @var $model Mensaje */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mensaje', 'url'=>array('index')),
	array('label'=>'Manage Mensaje', 'url'=>array('admin')),
);
?>

<h1>Create Mensaje</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>