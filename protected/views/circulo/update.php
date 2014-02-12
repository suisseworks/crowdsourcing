<?php
/* @var $this CirculoController */
/* @var $model Circulo */

$this->breadcrumbs=array(
	'Circulos'=>array('index'),
	$model->idnw_circulo=>array('view','id'=>$model->idnw_circulo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Circulo', 'url'=>array('index')),
	array('label'=>'Create Circulo', 'url'=>array('create')),
	array('label'=>'View Circulo', 'url'=>array('view', 'id'=>$model->idnw_circulo)),
	array('label'=>'Manage Circulo', 'url'=>array('admin')),
);
?>

<h1>Update Circulo <?php echo $model->idnw_circulo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>