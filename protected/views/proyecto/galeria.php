<?php

$this->breadcrumbs=array(
    array('PROYECTOS', null,'icon-lightbulb')
);

?>

<script>
    setActiveMenu('#sidebar-menu-proyectos');
</script>

<div class="container">


    <div class="row ">
        <!-- NOTIFICACIONES -->

        <div class="col-md-12">

            <!--big normal buttons-->
            <div class="action-nav-normal">
                <div class="row action-nav-row">
                    <div class="col-sm-1 action-nav-button"> <a id="crear_proyecto" href="<?php echo Yii::app()->request->baseUrl; ?>/proyecto/crear" title="Crear Proyecto Nuevo"> <i class="icon-file-alt"></i> <span>CREAR</span> </a> <span class="triangle-button red"><i class="icon-plus"></i></span> </div>
                    <div class="col-sm-1 action-nav-button"> <a href="#" title="mensajes"> <i class="icon-envelope"></i> <span>Mensajes</span> </a> <span class="triangle-button blue"><span class="inner">+8</span></span> </div>
                    <div class="col-sm-1 action-nav-button disable"> <a href="#" title="archivos"> <i class="icon-folder-open-alt"></i> <span>Mis Archivos</span> </a> </div>
                </div>
            </div>
        </div>

    </div>



    <div class="row ">
        <div class="col-md-12">


            <div class="box">
                <div class="box-header"> <span class="title" style="color: #333; font-weight: bolder">Galería de Proyectos</span>
                    <ul class="box-toolbar">
                        <li> <a id="refrescar" ><i class="icon-refresh"></i></a> </li>
                        <li class="toolbar-link"> <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                            <ul class="dropdown-menu">
                                <li><a id="crear_proyecto" href="<?php echo Yii::app()->request->baseUrl; ?>/proyecto/crear"><i class="icon-plus-sign"></i> Crear Proyecto</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="box-content">

                    <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'itemView'=>'_galeria',
                    )); ?>


                </div>

            </div>

        </div>

    </div>
</div>


