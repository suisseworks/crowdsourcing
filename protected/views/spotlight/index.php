<?php
/* @var $this SpotlightController */
/* @var $dataProvider CActiveDataProvider */


$this->breadcrumbs=array(
    array('SpotLights', null)
    //array('Perfil', "afiliado/perfil")
);

?>

<div class="col-md-11">

    <div class="box">
        <div class="box-header">
            <div class="title">Spotlights</div>
            <ul class="box-toolbar">
                <li class="toolbar-link"> <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="create"><i class="icon-plus-sign"></i>Crear</a></li>
                        <li><a href="admin"><i class="icon-remove-sign"></i>Administrar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="box-content padded">
            <div class="row padded">

                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'_view',
                )); ?>


            </div>
        </div>
    </div>
</div>




