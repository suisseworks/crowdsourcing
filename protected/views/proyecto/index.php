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
                    <div class="col-sm-1 action-nav-button"> <a id="crear_proyecto" href="<?php echo Yii::app()->request->baseUrl; ?>/proyecto/crear" title="Crear Proyecto Nuevo"> <i class="icon-file-alt"></i> <span>PROYECTO</span> </a> <span class="triangle-button red"><i class="icon-plus"></i></span> </div>
                    <div class="col-sm-1 action-nav-button"> <a href="#" title="Followers"> <i class="icon-envelope"></i> <span>Mensajes</span> </a> <span class="triangle-button blue"><span class="inner">+8</span></span> </div>
                    <div class="col-sm-1 action-nav-button disable"> <a href="#" title="Files"> <i class="icon-folder-open-alt"></i> <span>Mis Archivos</span> </a> </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">

        <div class="col-md-8">
            <div class="box">
                <div class="box-header"> <span class="title">MURO</span>
                    <ul class="box-toolbar">
                        <li> <a id="refrescar" ><i class="icon-refresh"></i></a> </li>
                        <li class="toolbar-link"> <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                            <ul class="dropdown-menu">
                                <li><a id="agregar_post_muro" href="#"><i class="icon-plus-sign"></i> Crear Proyecto</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="box-content scrollable" style="height:100%; overflow-y: auto">


                </div>
            </div>
        </div>

    </div>




    <div class="row ">
        <div class="col-md-12">


            <div class="box">
                <div class="box-header"> <span class="title">Información Básica</span>
                </div>
                <div class="box-content padded">

                        <?php $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_view',
                        )); ?>


                </div>

            </div>

        </div>

    </div>
</div>


