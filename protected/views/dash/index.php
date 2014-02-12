<?php

$this->breadcrumbs=array(
    array('Dashboard', null)
    //array('Perfil', "afiliado/perfil")
);
?>


<script>
    setActiveMenu('#sidebar-menu-dashboard');

    $(document).ready(function()
    {

    $('#headerbienvenida').removeClass('hidden');

    })

</script>




<div class="col-md-9">

    <!-- find me in partials/big_chart -->

    <div class="box">
        <div class="box-header">
            <div class="title">charts</div>
            <ul class="box-toolbar">
                <li class="toolbar-link"> <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-plus-sign"></i> add</a></li>
                        <li><a href="#"><i class="icon-remove-sign"></i> remove</a></li>
                        <li><a href="#"><i class="icon-pencil"></i> edit</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="box-content padded">
            <div class="row">
                <div class="col-md-4 separate-sections" style="margin-top: 5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard-stats">
                                <ul class="list-inline">
                                    <li class="glyph"><i class="icon-bolt icon-2x"></i></li>
                                    <li class="count">973,119</li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-blue tip" title="80%" data-percent="80"></div>
                                </div>
                                <div class="stats-label">total visits</div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-6">
                            <div class="dashboard-stats small">
                                <ul class="list-inline">
                                    <li class="glyph"><i class="icon-user"></i></li>
                                    <li class="count">8800</li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-blue tip" title="65%" data-percent="65"></div>
                                </div>
                                <div class="stats-label">new visitors</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard-stats small">
                                <ul class="list-inline">
                                    <li class="glyph"><i class="icon-eye-open"></i></li>
                                    <li class="count">25668</li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-blue tip" title="80%" data-percent="80"></div>
                                </div>
                                <div class="stats-label">page views</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="sine-chart" id="xchart-sine"></div>
                </div>


                <!-- CALENDARIO -->
                <div class="box" style="display: block; overflow: scroll;">
                    <div class="box-header">
                        <div class="title">Full calendar</div>
                    </div>
                    <div class="box-content">
                        <div id="calendar"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>



<!-- NOTIFICACIONES -->

<div class="col-md-3">
    <div class="box">
        <div class="box-header"> <span class="title">Notificaciones</span>
            <ul class="box-toolbar">
                <li><span class="label label-blue"></span></li>
            </ul>
        </div>
        <div class="box-content scrollable" style="height: 552px; overflow-y: auto">
            <!-- find me in partials/news_with_icons -->
            <?php foreach( array_reverse($afiliado->mensajesRecibidos) as $mensaje) { ?>

                <div class="box-section news with-icons">
                    <div class="avatar blue"><i class="icon-ok icon-2x"></i></div>
                    <div class="news-time"> <span><?php echo date("d",strtotime($mensaje['fecha'])); ?></span>
                        <?php echo Yii::app()->myhelper->nombreMes($mensaje['fecha']);    ?> </div>
                    <div class="news-content">
                        <div class="news-title"><a href="#"><?php echo $mensaje['asunto'];?></a></div>
                        <div class="news-text">
                            <?php echo $mensaje['mensaje'];?>
                        </div>
                    </div>
                </div>

            <?php } ?>




        </div>
    </div>
</div>

