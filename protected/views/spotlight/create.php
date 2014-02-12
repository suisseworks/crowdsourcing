<?php
/* @var $this SpotlightController */
/* @var $model Spotlight */

$this->breadcrumbs=array(
	'Spotlights'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Spotlight', 'url'=>array('index')),
	array('label'=>'Manage Spotlight', 'url'=>array('admin')),
);
?>

<h1>Create Spotlight</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>