
<style>
    .form-actions button {
        width: 100%;
        display: inline;
    }



    span.tachar {
        position: absolute;
        width: 100%;
        border-top: 1px solid red;
        left: 0;
        top: 50%;
    }


    .efecto2 {
        position: relative;
    }

    .efecto2:before {
        position: absolute;
        content: "";
        left: 0;
        top: 50%;
        right: 0;
        border-top: 1px solid;
        border-color: inherit;

        -webkit-transform:rotate(-5deg);
        -moz-transform:rotate(-5deg);
        -ms-transform:rotate(-5deg);
        -o-transform:rotate(-5deg);
        transform:rotate(-5deg);
    }




</style>


<script>


    $(function() {

           $("#refrescar").click(function(e){
               location.reload();
           })

        /* ESCONDER ELEMENTOS CUANDO SE ESTÁ CRAENDO UN PROYECTO */
        es_nuevo = <?php echo ($proyecto->idcs_proyecto == null) ? 'true' : 'false' ?>;
        if (es_nuevo) {
            $("#eltermometro, #tabEstadisticas, #tabInversores, #toolbar_proyecto").hide();
        }

        /* MOSTRAR ELEMENTOS DEPENDIENDO DEL ESTADO del PROYECTO */
        aprobado = <?php echo ($proyecto->estado ==  MyGlobals::ESTADO_PROYECTO_APROBADO) ? 'true' : 'false' ?>;
        if (aprobado) {
            $("#estadisticas_no_aprobado, #inversores_no_aprobado").hide();
        }





        /* ELIMINAR PROYECTO */

        $("#eliminarproyecto").click(function(e){
            e.preventDefault();
            $( "#dialog-confirm" ).dialog({
                resizable: false,
                height:140,
                width: 400,
                modal: true,
                buttons: {
                    "Está seguro ?": function() {
                        //$( this ).dialog( "close" );
                        window.location.replace("<?php echo Yii::app()->request->baseUrl; ?>/proyecto/borrar/<?php echo $proyecto->idcs_proyecto; ?>");

                    },
                    Cancel: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });

    });

</script>





<script>
    $(document).ready(function()
    {

        $('#Proyecto_inversion_total_requerida').currency();
        $('#Proyecto_inversion_minima').currency();



        $('#btn-upload, #logo_proyecto').click(function(e){
            e.preventDefault();
            $('#Proyecto_logo').click();

        });

        $('#Proyecto_logo').change(function()
        {
            //alert( $('#Afiliado_avatar').val());


            var input = document.getElementById("Proyecto_logo");
            var fReader = new FileReader();
            fReader.readAsDataURL(input.files[0]);
            fReader.onloadend = function(event){
                var img = document.getElementById("logo_proyecto");

                img.src = event.target.result;
            }
        })
    });


</script>



<div style="display: none;" id="dialog-confirm" title="Eliminar Proyecto">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>El Proyecto será eliminado de manera permanente!!</p>
</div>


<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".info").animate({opacity: 1.0}, 5000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>



<!-- FLASH REGISTRO ACTUALIZADO  -->
<?php if(Yii::app()->user->hasFlash('registro_actualizado')):?>
    <div class="info alert alert-success" style="font-size: 16px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo Yii::app()->user->getFlash('registro_actualizado'); ?>
    </div>
<?php endif; ?>

<!-- FLASH LOGO INVALIDO  -->
<?php if(Yii::app()->user->hasFlash('logo_invalido')):?>
    <div class="info alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo Yii::app()->user->getFlash('logo_invalido'); ?>
    </div>
<?php endif; ?>


<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'proyecto-form',
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array(
            'class'=>'fill-up',
            'enctype'=>'multipart/form-data' //para poder subir attachments
        )
    )); ?>



    <?php echo $form->errorSummary($proyecto); ?>


    <div class="row">

        <!-- INFORMACION BÁSICA DEL PROYECTO -->

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <ul class="nav nav-tabs nav-tabs-left">
                        <li class="active"><a href="#general" data-toggle="tab"><i class="icon-info-sign"></i><span>Información General</span></a></li>
                        <li><a href="#documentos" data-toggle="tab"><i class="icon-folder-open-alt"></i> <span>Documentos</span></a></li>
                    </ul>

                    <ul id="toolbar_proyecto" class="box-toolbar">
                        <li> <a id="refrescar" ><i class="icon-refresh"></i></a> </li>
                        <li class="toolbar-link"> <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a id="agregar_post_muro" href="@"><i class="icon-plus-sign"></i> <span style="color: rgb(21, 138, 194);">Enviar para Aprobación</span></a>
                                </li>

                                <li><a id="toolbar_crear_proyecto" href="<?php echo Yii::app()->request->baseUrl; ?>/proyecto/crear"><i class="icon-plus-sign"></i>Crear Nuevo Proyecto</a></li>
                                <hr style="background:#9EA8B1; border:0; height:1px; margin: 5px;" />
                                <li><a id="agregar_post_muro" href="#"><i class="icon-envelope"></i>Notificar Modifaciones</a></li>
                                <li><a id="agregar_post_muro" href="@"><i class="icon-plus"></i>Crear Evento</a></li>
                                <hr style="background:#9EA8B1; border:0; height:1px; margin: 5px;" />
                                <li><a id="eliminarproyecto" href="@"><i class="icon-warning-sign"></i><span style="color: rgb(224, 61, 61);">Eliminar Proyecto</a></span></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="general">
                                    <ul class="padded separate-sections">
                                        <li class="input">
                                            <?php echo $form->labelEx($proyecto,'nombre'); ?>
                                                <?php echo $form->textField($proyecto,'nombre',array('size'=>45,'maxlength'=>45)); ?>
                                            <?php echo $form->error($proyecto,'nombre'); ?>
                                        </li>
                                        <li class="input">
                                            <span style="font-size: 20px !important;">
                                                <?php echo $form->labelEx($proyecto,'estado'); ?>
                                                <span style="font-weight: bolder">
                                                    <?php echo  $proyecto->proyecto_estado->nombre; ?>
                                                </span>
                                            </span>
                                        </li>
                                        <li class="input">
                                            <i class="icon-flag"></i>
                                            <?php echo $form->labelEx($proyecto,'idcategoriaproyecto');
                                            $catetorias = CategoriaProyecto::model()->findAll(array('order'=>'nombre'));
                                            $list = CHtml::listData($catetorias,'idcs_categoriaproyecto','nombre');

                                            echo $form->dropDownList($proyecto, 'idcategoriaproyecto',  $list,
                                                array('prompt' => 'Seleccione una Categoría'));
                                            ?>
                                        </li>
                                        <li class="input">
                                            <?php echo $form->labelEx($proyecto,'descripcion'); ?>
                                            <?php echo $form->textArea($proyecto,'descripcion',array('rows'=>5, 'cols'=>50)); ?>
                                            <?php echo $form->error($proyecto,'descripcion'); ?>
                                        </li>

                                        <!-- -->

                                        <li>
                                            <label>Especialidades Requeridas</label>
                                            <select multiple="multiple" name="colors[]" class="chzn-select">
                                                <option value="SAE/ECE Amber (color)">SAE/ECE Amber (color)</option>
                                                <option value="Alloy orange">Alloy orange</option>
                                                <option value="Amethyst">Amethyst</option>
                                                <option value="Antique bronze">Antique bronze</option>
                                                <option value="Air superiority blue">Air superiority blue</option>
                                                <option value="Amber" selected="selected">Amber</option>
                                                <option value="Anti-flash white" selected="selected">Anti-flash white</option>
                                                <option value="Android Green">Android Green</option>
                                                <option value="Air Force blue (RAF)">Air Force blue (RAF)</option>
                                                <option value="Amazon">Amazon</option>
                                                <option value="Alabama Crimson">Alabama Crimson</option>
                                                <option value="Amaranth" selected="selected">Amaranth</option>
                                                <option value="Alizarin crimson">Alizarin crimson</option>
                                                <option value="Air Force blue (USAF)">Air Force blue (USAF)</option>
                                                <option value="American rose">American rose</option>
                                                <option value="Alice blue">Alice blue</option>
                                                <option value="Aero blue">Aero blue</option>
                                                <option value="Antique fuchsia ">Antique fuchsia </option>
                                                <option value="Antique brass">Antique brass</option>
                                                <option value="Almond">Almond</option>
                                            </select>
                                        </li>
                                        <li class="input">
                                            <label>Tags:</label>
                                            <?php echo $form->textArea($proyecto,'tags',array('rows'=>6, 'cols'=>50,'class'=>'tags')); ?>
                                        </li>



                                        <!-- FECHA DE CREACION Y MODIFICACION -->

                                        <li class="input">
                                            <table>
                                                <tr>
                                                    <td><span style="font-weight: bolder">Fecha Creación:</span></td>
                                                    <td><em><?php echo $proyecto->fecha_creacion  ?></em></td>
                                                </tr>
                                                <tr>
                                                    <td><span style="font-weight: bolder">Última Modificación:</span></td>
                                                    <td><em><?php echo $proyecto->fecha_ultima_modificacion  ?></em></td>
                                                </tr>
                                            </table>
                                        </li>
                                    </ul>
                                </div>

                                <!-- DOCUMENTOS -->
                                <div class="tab-pane" id="documentos">
                                    <ul class="padded separate-sections">
                                        <li class="input">
                                            DOCUMENTOS
                                        </li>

                                   </ul>
                                </div>
                             </div> <!-- tab-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- INVERSION DEL PROYECTO -->

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <div class="box-header">
                        <ul class="nav nav-tabs nav-tabs-left">
                            <li class="active"><a href="#datosinversion" data-toggle="tab"><i class="icon-info-sign"></i><span>Datos de la Inversión</span></a></li>
                            <li id="tabEstadisticas" ><a href="#estadisticas" data-toggle="tab"><i class="icon-folder-open-alt"></i> <span>Estadísticas</span></a></li>
                            <li id="tabInversores"><a href="#inversores" data-toggle="tab"><i class="icon-folder-open-alt"></i> <span>Inversores</span></a></li>
                        </ul>
                    </div>

                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="datosinversion">
                                    <ul class="padded separate-sections">
                                        <li class="input">
                                            <i class="icon-signal"></i>
                                            <?php echo $form->labelEx($proyecto,'roi'); ?> %
                                            <?php echo $form->textField($proyecto,'roi'); ?>
                                            <?php echo $form->error($proyecto,'roi'); ?>
                                        </li>
                                        <li class="input">
                                            Nivel de Riesgo Sugerido <em>[1-10]</em>
                                            <input name="Proyecto[nivel_riesgo]" id="Proyecto_nivel_riesgo" type="number" min="1" max="10" value="<?php echo $proyecto->nivel_riesgo ?>">
                                            <?php echo $form->error($proyecto,'nivel_riesgo'); ?>
                                        </li>
                                        <li class="input">
                                            <i class="icon-time"></i>
                                            Plazo en Meses
                                            <?php //echo $form->textField($proyecto,'plazo'); ?>
                                            <input name="Proyecto[plazo]" id="Proyecto_plazo" type="number" min="1" max="120" value="<?php echo $proyecto->plazo ?>">
                                            <?php echo $form->error($proyecto,'plazo'); ?>
                                        </li>
                                        <li class="input">
                                            <i class="icon-money"></i>
                                            <?php echo $form->labelEx($proyecto,'inversion_total_requerida'); ?>
                                            <?php echo $form->textField($proyecto,'inversion_total_requerida'); ?>
                                            <?php echo $form->error($proyecto,'inversion_total_requerida'); ?>
                                        </li>
                                        <li class="input">
                                            <?php echo $form->labelEx($proyecto,'inversion_minima'); ?>
                                            <?php echo $form->textField($proyecto,'inversion_minima'); ?>

                                            <?php echo $form->error($proyecto,'inversion_minima'); ?>
                                        </li>

                                        <!-- TERMÓMETRO -->
                                        <li id="eltermometro" class="input">
                                            <h2>Inversión Recaudada</h2>
                                            <div id="goal-thermometer"></div>

                                        </li>
                                    </ul>
                                </div>

                                <!-- ESTADÍSTICAS -->

                                <div class="tab-pane" id="estadisticas">
                                    <ul class="padded separate-sections">
                                        <li class="input">
                                            <div id="estadisticas_no_aprobado">
                                                El proyecto debe estar aprobado para poder mostrar estadísticas!
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <!-- INVERSORES -->

                                <div class="tab-pane" id="inversores">
                                    <ul class="padded separate-sections">
                                        <li class="input">
                                            <div id="inversores_no_aprobado">
                                                El proyecto debe estar aprobado para poder mostrar datos de los inversores!
                                            </div>
                                        </li>

                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- LOGO Y VIDEO -->

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <ul class="nav nav-tabs nav-tabs-left">
                        <li class="active"><a href="#logo" data-toggle="tab"><i class="icon-picture"></i><span>Logo</span></a></li>
                        <li><a href="#video" data-toggle="tab"><i class="icon-facetime-video"></i> <span>Video</span></a></li>
                    </ul>
                </div>



                <div class="box-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="logo">
                                    <ul class="padded separate-sections">
                                         <li style="text-align: center" class="input">
                                            <img id="logo_proyecto" class="element-animation logo-proyecto borderedondo1 efecto2 "
                                                 src="<?php echo Yii::app()->myhelper->proyectLogoURL($proyecto); ?>">
                                            <?php echo CHtml::activeFileField($proyecto,'logo',array('class'=>'hidden')); ?>
                                            <?php echo $form->textField($proyecto,'logo', array('class'=>'hidden')); ?>
                                            <?php echo $form->error($proyecto,'logo'); ?>
                                         </li>
                                        <li style="text-align: center">
                                            <button class="btn btn-blue" id="btn-upload">Seleccionar/Cambiar Logo</button>
                                        </li>
                                    </ul>


                                </div>
                                <div class="tab-pane" id="video">
                                    <ul class="padded separate-sections">

                                        <li class="input">
                                            <?php echo "Insertar código del Video" ?>
                                            <?php echo $form->textArea($proyecto,'video',array('rows'=>5, 'cols'=>50)); ?>
                                            <?php echo $form->error($proyecto,'video'); ?>
                                        </li>
                                   </ul>

                                </div>

                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>  <!-- row -->

    <div class="row">
        <div class="col-md-4">
            <div class="form-actions" style="padding-top: 0px;padding-left: 0px;">
                    <button style="display: <?php echo ($proyecto->idcs_proyecto == null) ? 'block' : 'none';  ?>" type="submit" class="btn btn-lg btn-gold">CREAR PROYECTO</button>
                    <button  style="display: <?php echo ($proyecto->idcs_proyecto != null) ? 'block' : 'none';  ?>"  type="submit" class="btn btn-lg btn-green">SALVAR PROYECTO</button>
            </div>


        </div>
    </div>







    <?php $this->endWidget(); ?>
</div>