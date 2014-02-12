<?php
/* @var $this SpotlightController */
/* @var $model Spotlight */

$this->breadcrumbs=array(
	'Spotlights'=>array('index'),
	$model->idnw_spotlight=>array('view','id'=>$model->idnw_spotlight),
	'Update',
);

$this->menu=array(
	array('label'=>'List Spotlight', 'url'=>array('index')),
	array('label'=>'Create Spotlight', 'url'=>array('create')),
	array('label'=>'View Spotlight', 'url'=>array('view', 'id'=>$model->idnw_spotlight)),
	array('label'=>'Manage Spotlight', 'url'=>array('admin')),
);
?>

<h1>Update Spotlight <?php echo $model->idnw_spotlight; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>