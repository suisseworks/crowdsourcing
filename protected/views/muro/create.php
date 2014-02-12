<?php
/* @var $this MuroController */
/* @var $model Muro */

$this->breadcrumbs=array(
	'Muros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Muro', 'url'=>array('index')),
	array('label'=>'Manage Muro', 'url'=>array('admin')),
);
?>

<h1>Create Muro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>