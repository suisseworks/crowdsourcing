<?php
/* @var $this CirculoController */
/* @var $model Circulo */

$this->breadcrumbs=array(
	'Circulos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Circulo', 'url'=>array('index')),
	array('label'=>'Manage Circulo', 'url'=>array('admin')),
);
?>

<h1>Create Circulo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>