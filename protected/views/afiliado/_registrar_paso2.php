


            <div class="login box" style="margin-top: 20px;">
                <div class="box-header">
                    <span class="title"> <h3>Registro Paso 2/2</h3></span> <br/>
                </div>
                <p>
                <h4 style="margin-left: 10px;"><?php echo "Bienvenid@ a bordo " . $model->nombre  ?> </h4>
                    <span style="margin-left: 10px;">Por favor completa la siguiente información.</span>
                </p>
                <div class="box-content padded">
                    <div class="form">


                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'afiliado-registrar-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // See class documentation of CActiveForm for details on this,
                            // you need to use the performAjaxValidation()-method described there.
                            'enableAjaxValidation'=>true,
                            'htmlOptions'=>array(
                                'class'=>'separate-sections',
                            )
                        )); ?>



                        <p class="note"><span class="required">*</span> Campo requerido.</p>

                        <?php echo $form->errorSummary($model); ?>

                        <?php echo $form->labelEx($model,'idpais'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-tag"></i>
                             </span>
                            <?php $paises = Pais::model()->findAll(array('select'=>'idpais, nombre', 'order'=>'idpais')); ?>
                            <?php $list = CHtml::listData($paises, 'idpais', 'nombre'); ?>
                            <?php

                            echo $form->dropDownList($model, 'idpais',  $list,
                                array(

                                    'ajax'=>array(
                                        'type'=>'POST',
                                        'url'=>CController::createUrl('afiliado/selectprovinciasycirculos'),
                                        //'update'=>'#'. CHtml::activeId($model,'idprovincia')
                                        'success'=>'updateprovinciasycirculos',
                                        'dataType' => 'json',
                                        'beforeSend' => 'function(){
                                                $("#ajaxloader").show();
                                                }',
                                        'complete' => 'function(){
                                                $("#ajaxloader").hide();
                                                }',

                                    ),

                                    'empty' => 'Selecione un país'));

                            ?>

                        </div>


                        <?php echo $form->labelEx($model,'idprovincia'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-tag"></i>
                             </span>
                            <?php

                            $idpais = intval($model->idpais);
                            $provincias = Provincia::model()->findAll(array('condition'=>"idpais = $idpais", 'order'=>'nombre'));
                            $list = CHtml::listData($provincias, 'idprovincia', 'nombre');

                            echo $form->dropDownList($model, 'idprovincia',  $list,
                                array('empty' => 'Seleccione una provincia'));
                            ?>

                        </div>







                        <i class="icon-suitcase"></i>
                        <?php echo $form->labelEx($model,'idcategoria'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-tag"></i>
                             </span>
                            <?php  $categorias = Categoria::model()->findAll(array('select'=>'idnw_categoria, nombre', 'order'=>'nombre'));
                            $list = CHtml::listData($categorias, 'idnw_categoria', 'nombre');

                            echo $form->dropDownList($model, 'idcategoria',  $list,
                                array(

                                    'ajax'=>array(
                                     'type'=>'POST',
                                        'url'=>CController::createUrl('afiliado/selectespecialidades'),

                                        'update'=>'#'. CHtml::activeId($model,'idespecialidad'),
                                        //'success'=>'updateespecialidadesycirculos',
                                        //'dataType' => 'json',
                                        'beforeSend' => 'function(){
                                                $("#ajaxloader").show();
                                                }',
                                        'complete' => 'function(){
                                                $("#ajaxloader").hide();
                                                  /*$("#yt1").click();*/

                                                }',
                                    ),



                                    'onchange'=>" if ($(this).val() == -1) {
                                                        $('#seccion_sugerircategoria').show();
                                                        $('#seccion_sugerirespecialidad').show();
                                                        $('#seccion_especialidad').hide();
                                                    }
                                                    else
                                                    {
                                                        $('#seccion_sugerircategoria').hide();
                                                        $('#seccion_sugerirespecialidad').hide();
                                                        $('#seccion_especialidad').show();
                                                    }
                                    ",



                                    'prompt' => 'Selecione una categoría'));
                            ?>
                        </div>


                       <div id="seccion_sugerircategoria">
                            <?php echo "Sugerir Categoria" ?>
                            <div class="input-group addon-left">
                                 <span class="input-group-addon" href="#">
                                    <i class="icon-lightbulb"></i>
                                 </span>
                                <?php echo $form->textField($model,'nuevacategoria'); ?>
                            </div>
                       </div>





                        <div id="seccion_especialidad">
                            <?php echo $form->labelEx($model,'idespecialidad'); ?>
                            <div class="input-group addon-left">
                                 <span class="input-group-addon" href="#">
                                    <i class="icon-tag"></i>
                                 </span>
                                <?php
                                $idcategoria = intval($model->idcategoria);
                                $especialidades = Especialidad::model()->findAll(array('condition'=>"idcategoria = $idcategoria or idnw_especialidad=-1",'order'=>'nombre'));
                                $list = CHtml::listData($especialidades,'idnw_especialidad','nombre');


                                echo $form->dropDownList($model, 'idespecialidad', $list,
                                    array(
                                        'ajax'=>array(
                                            'type'=>'POST',
                                            'url'=>CController::createUrl('afiliado/selectcirculos'),
                                            'update'=>'#'. CHtml::activeId($model,'idcirculo'),
                                            'beforeSend' => 'function(){
                                                 $("#ajaxloader").show();
                                                }',
                                            'complete' => 'function(){
                                                $("#ajaxloader").hide();
                                                 $("#yt1").click();
                                                }',
                                        ),
                                        'onchange'=>" if ($(this).val() == -1) {
                                                        $('#seccion_sugerirespecialidad').show();
                                                    }
                                                    else
                                                    {
                                                        $('#seccion_sugerirespecialidad').hide();
                                                    }
                                                     //$('#yt1').click();
                                    ",
                                        'prompt' => 'Seleccione una especialidad'));
                                ?>
                            </div>
                        </div>


                        <div id="seccion_sugerirespecialidad">
                            <?php echo "Sugerir Especialidad" ?>
                            <div class="input-group addon-left">
                                 <span class="input-group-addon" href="#">
                                    <i class="icon-lightbulb"></i>
                                 </span>
                                <?php echo $form->textField($model,'nuevaespecialidad'); ?>
                            </div>
                        </div>





                        <?php echo $form->labelEx($model,'idcirculo'); ?>
                        <div class="input-group addon-left">
                                 <span class="input-group-addon" href="#">
                                    <i class="icon-tag"></i>
                                 </span>
                            <?php
                            $idpais = intval($model->idpais);
                            $circulos = Circulo::model()->findAll(array('condition'=>"idpais = $idpais  or idnw_circulo = -1", 'order'=>'nombre'));
                            $list = CHtml::listData($circulos, 'idnw_circulo', 'nombre');

                            echo $form->dropDownList($model, 'idcirculo',  $list,
                                array(
                                    'onchange'=>" if ($(this).val() == -1) {
                                                        $('#seccion_nuevocirculo').show();
                                                    }
                                                    else
                                                    {
                                                        $('#seccion_nuevocirculo').hide();
                                                    }
                                    ",
                                    'prompt' => 'Seleccione un círculo'));
                            ?>

                        </div>



                        <div id="seccion_nuevocirculo">
                            <?php echo $form->labelEx($model,'nuevocirculo'); ?>
                            <div class="input-group addon-left">
                                     <span class="input-group-addon" href="#">
                                        <i class="icon-circle-blank"></i>
                                     </span>
                                <?php echo $form->textField($model,'nuevocirculo'); ?>
                            </div>
                            <?php echo $form->error($model,'nuevocirculo'); ?>
                        </div>


                        <br/>


                        <div class="row buttons">
                            <?php echo CHtml::submitButton('Aceptar',array('class' => 'btn btn-lg btn-blue btn-block')); ?>
                        </div>


                        <?php $this->endWidget(); ?>

                    </div><!-- form -->





                </div>
            </div>
