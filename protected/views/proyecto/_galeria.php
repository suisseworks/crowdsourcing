


<style>
  .vistaproyecto h1 {
      /*font-family: 'Architects Daughter', cursive; */
      font-family: 'Open Sans', HelveticaNeue, Helvetica, Arial;;
      font-weight: bold;
      font-size: 200%;
      color: #333333;

    /*  font-size: 30px;
      line-height: 30px;
      font-weight: bolder;*/
      text-shadow: black 2px 2px 40px;
    }
  .vistaproyecto p {
      text-align: justify;
  }

  .vistaproyecto p:first-letter {
      font-size: 30px;
      color: gray;
  }

  .vistaproyecto p:first-line {
      color: #151b20;
  }


  .vistaproyecto a.milink {
      color: #0054FF;
      text-decoration: underline;
  }





</style>

<script>

    $(document).ready(function(e) {



       $("#inversion_total_requerida<?php echo $data->idcs_proyecto; ?>").currency();


        //iframe youtube..cambiar tamano
        $('embed, iframe').attr('width',320);
        $('embed, iframe').attr('height',320);



        //creating the Gauge Meter
        var gm1 = new GaugeMeter(
            {
                ElementId   : "gauge<?php echo $data->idcs_proyecto?>",
                MinValue    : 0,
                MaxValue    : 10,
                //you can also provide an initial value in the settings object
                /*Value       : 8,*/
                MinLabel      : "Bajo",
                MaxLabel      : "Alto",
                Text        : "Riessgo",
                GaugeColors   :
                    [
                        '#D0D0FF', '#C0C0FF',
                        '#B0B0FF', '#A0A0FF',
                        '#9090FF', '#8080FF',
                        '#ff6600', '#ff6600',
                        '#cc0000', '#f60404'
                    ]
            });

    })


    //the function for setting a new value
    function setGM1()
    {
        var gm1_input=parseFloat(document.getElementById('gm1_val').value);
        if(!isNaN(gm1_input))
            gm1.SetValue(gm1_input);
    }
</script>

<?php
    $idproyecto = $data->idcs_proyecto;
    $link_proyecto = Yii::app()->request->baseUrl . '/proyecto/editar/' . $data->idcs_proyecto;

?>


<div class="row padded vistaproyecto">
    <div class="col-md-3 centrar">
        <div class="box">
            <div class="box-header">
                <ul class="nav nav-tabs nav-tabs-left">
                    <li class="active"><a href="#logo<?php echo $idproyecto ?>" data-toggle="tab"><i class="icon-picture"></i><span>Logo</span></a></li>
                    <li><a href="#video<?php echo $idproyecto ?>" data-toggle="tab"><i class="icon-facetime-video"></i> <span>Video</span></a></li>
                </ul>

            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div style="max-height:225px; " class="tab-pane active" id="logo<?php echo $idproyecto ?>" >
                                    <ul class="padded separate-sections">
                                        <li class="input">
                                            <a href="<?php echo $link_proyecto ?> " title="<?php echo $data->nombre ?>">
                                                <img class="logo_proyecto_galeria2 element-animation" src="<?php echo Yii::app()->myhelper->proyectLogoURL($data); ?>">
                                            </a>
                                        </li>
                                    </ul>
                            </div>


                            <div style="min-height: 318px;" class="tab-pane" id="video<?php echo $idproyecto ?>">
                                <ul class="padded separate-sections">
                                    <li class="input">
                                        <?php echo $data->video ?>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

            <ul style="text-align: left" class="separate-sections">
                <li class="input"> <h5>Estado: <span style="color:#ff6014"> <?php echo $data->estado ?></span></h5>
                Fecha Creación: <em><?php echo $data->fecha_creacion ?></em>
                </li>
            </ul>

    </div>


    <div class="col-md-3 ">
        <h1><?php echo $data->nombre ?></h1>
        <h5><a class="milink" href="<?php echo $link_proyecto ?>">Código: <?php echo $data->idcs_proyecto ?></a></h5>
        <div style="max-height: 200px; overflow-y: scroll; padding: 5px;">
           <p><?php echo $data->descripcion ?> </p>
        </div>


    </div>
    <!-- the input field & button -->

    <div  class="col-md-2 centrar">
        <h4>Nivel de Riesgo Sugerido</h4>
        <div id="gauge<?php echo $data->idcs_proyecto?>">
            <span style="display: none"><?php echo $data->nivel_riesgo ?></span>
        </div>

    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <ul class="nav nav-tabs nav-tabs-left">
                    <li class="active"><a href="#detalles<?php echo $idproyecto ?>" data-toggle="tab"><i class="icon-bar-chart"></i><span>Resumen</span></a></li>
                    <li><a href="#estadisticas<?php echo $idproyecto ?>" data-toggle="tab"><i class="icon-info-sign"></i><span>Estadísticas</span></a></li>
                    <li><a href="#documentos<?php echo $idproyecto ?>" data-toggle="tab"><i class="icon-folder-open-alt"></i> <span>Documentos</span></a></li>
                </ul>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div style="max-height:225px; " class="tab-pane active" id="detalles<?php echo $idproyecto ?>" >
                                <ul class="padded separate-sections">
                                    <li class="input">
                                            <table class="displayInfo">
                                                <tr>
                                                    <td>Inversión:</td>
                                                    <td> <span id="inversion_total_requerida<?php echo $idproyecto ?>"><?php echo $data->inversion_total_requerida ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td>ROI:</td>
                                                    <td><span id="roi<?php echo $idproyecto ?>"><?php echo $data->roi ?>%</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Plazo:</td>
                                                    <td><span id="roi<?php echo $idproyecto ?>"><?php echo $data->plazo ?>%</span></td>
                                                </tr>
                                            </table>
                                    </li>
                                    <li>
                                        <button onclick='location.href="<?php echo $link_proyecto ?>"'
                                            type="button" class="btn btn-lg btn-blue">VER PROYECTO</button>
                                    </li>
                                </ul>
                            </div>

                            <div style="max-height:225px; " class="tab-pane" id="estadisticas<?php echo $idproyecto ?>" >
                                <ul class="padded separate-sections">
                                    <li class="input">
                                        ESTADÍSTICAS
                                    </li>
                                </ul>
                            </div>

                            <div style="max-height:225px; " class="tab-pane" id="documentos<?php echo $idproyecto ?>" >
                                <ul class="padded separate-sections">
                                    <li class="input">
                                        DOCUMENTOS
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>




</div>
<hr style="background:#9EA8B1; border:0; height:3px" />