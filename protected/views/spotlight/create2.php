<?php
/* @var $this SpotlightController */
/* @var $model Spotlight */

$this->breadcrumbs=array(
    array('SpotLights', '/spotlight'),
    array('Crear', null)
);
?>



<div class="col-md-11">

    <div class="box">
        <div class="box-header">
            <div class="title">Crear Spotlights</div>
            <ul class="box-toolbar">
                <li class="toolbar-link"> <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="index"><i class="icon-plus-sign"></i>Listar</a></li>
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

