
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
                    </ul></div>
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





                                        <!-- -->

                                        <li class="input">
                                            <span style="font-weight: bolder">Fecha Creación:</span>
                                            <em><?php echo $proyecto->fecha_creacion  ?></em>
                                        </li>
                                        <li class="input">
                                            <span style="font-weight: bolder">Última Modificación:</span>
                                            <em><?php echo $proyecto->fecha_ultima_modificacion  ?></em>
                                        </li>
                                    </ul>
                                </div>
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
                <div class="box-header"><span class="title"><i class="icon-bar-chart"></i> Datos de la Inversión</span></div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-lg-12">

                            <ul class="padded separate-sections">
                                <li class="input">
                                    <i class="icon-signal"></i>
                                    <?php echo $form->labelEx($proyecto,'roi'); ?>
                                    <?php echo $form->textField($proyecto,'roi'); ?>
                                    <?php echo $form->error($proyecto,'roi'); ?>
                                </li>
                                <li class="input">
                                    <?php echo $form->labelEx($proyecto,'nivel_riesgo'); ?>
                                    <?php echo $form->textField($proyecto,'nivel_riesgo',array('size'=>45,'maxlength'=>45)); ?>
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
                            </ul>
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
                                         <li class="input">
                                            <img id="logo_proyecto" class="element-animation logo-proyecto"
                                                 src="<?php echo Yii::app()->myhelper->proyectLogoURL($proyecto); ?>">
                                            <?php echo CHtml::activeFileField($proyecto,'logo',array('class'=>'hidden')); ?>
                                            <?php echo $form->textField($proyecto,'logo', array('class'=>'hidden')); ?>
                                            <?php echo $form->error($proyecto,'logo'); ?>
                                         </li>
                                    </ul>
                                    <button class="btn btn-blue" id="btn-upload">Seleccionar/Cambiar Logo</button>

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

    <div class="form-actions" style="padding-top: 0px;padding-left: 0px;">
        <?php if ($proyecto->idcs_proyecto == null) { ?>
            <button type="submit" class="btn btn-gold">CREAR PROYECTO</button>
        <?php } else { ?>
            <button type="submit" class="btn btn-green">SALVAR PROYECTO</button>
        <?php } ?>

    </div>






    <?php $this->endWidget(); ?>
</div>