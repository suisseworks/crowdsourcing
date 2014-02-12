<?php
/* @var $this SpotlightController */
/* @var $model Spotlight */

$this->breadcrumbs=array(
    array('SpotLights', '/spotlight'),
    array('Ver', null)
);


$this->menu=array(
	array('label'=>'List Spotlight', 'url'=>array('index')),
	array('label'=>'Create Spotlight', 'url'=>array('create')),
	array('label'=>'Update Spotlight', 'url'=>array('update', 'id'=>$model->idnw_spotlight)),
	array('label'=>'Delete Spotlight', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnw_spotlight),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Spotlight', 'url'=>array('admin')),
);
?>




<div class="col-md-11">

    <div class="box">
        <div class="box-header">
            <div class="title">Detalle Spotlight</div>
            <ul class="box-toolbar">
                <li class="toolbar-link"> <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="crear"><i class="icon-plus-sign"></i>Crear</a></li>
                        <li><a href="admin"><i class="icon-remove-sign"></i>Administrar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="box-content padded">
            <div class="row padded">
                <div class="padded">
                    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                </div>


            </div>
        </div>
    </div>
</div>









<h1>View Spotlight #<?php echo $model->idnw_spotlight; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idnw_spotlight',
		'idafiliado',
		'tipo',
		'titular',
		'mensaje',
		'fecha',
		'estatus',
	),
)); ?>
