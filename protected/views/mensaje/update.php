<?php
/* @var $this MensajeController */
/* @var $model Mensaje */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->idnw_mensaje=>array('view','id'=>$model->idnw_mensaje),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mensaje', 'url'=>array('index')),
	array('label'=>'Create Mensaje', 'url'=>array('create')),
	array('label'=>'View Mensaje', 'url'=>array('view', 'id'=>$model->idnw_mensaje)),
	array('label'=>'Manage Mensaje', 'url'=>array('admin')),
);
?>

<h1>Update Mensaje <?php echo $model->idnw_mensaje; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>