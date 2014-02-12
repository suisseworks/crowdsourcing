<?php
/* @var $this MuroController */
/* @var $model Muro */

$this->breadcrumbs=array(
	'Muros'=>array('index'),
	$model->idnw_muro=>array('view','id'=>$model->idnw_muro),
	'Update',
);

$this->menu=array(
	array('label'=>'List Muro', 'url'=>array('index')),
	array('label'=>'Create Muro', 'url'=>array('create')),
	array('label'=>'View Muro', 'url'=>array('view', 'id'=>$model->idnw_muro)),
	array('label'=>'Manage Muro', 'url'=>array('admin')),
);
?>

<h1>Update Muro <?php echo $model->idnw_muro; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>