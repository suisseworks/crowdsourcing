<?php
/* @var $this AfiliadoController */
/* @var $model Afiliado */

$this->breadcrumbs=array(
	'Afiliados'=>array('index'),
	$model->idnw_afiliado=>array('view','id'=>$model->idnw_afiliado),
	'Update',
);

$this->menu=array(
	array('label'=>'List Afiliado', 'url'=>array('index')),
	array('label'=>'Create Afiliado', 'url'=>array('create')),
	array('label'=>'View Afiliado', 'url'=>array('view', 'id'=>$model->idnw_afiliado)),
	array('label'=>'Manage Afiliado', 'url'=>array('admin')),
);
?>

<h1>Update Afiliado <?php echo $model->idnw_afiliado; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>