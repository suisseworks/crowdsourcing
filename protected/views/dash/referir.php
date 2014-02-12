<?php

$this->pageTitle=Yii::app()->name . ' - Referir';
$this->breadcrumbs=array(
    array('Referir', null)
    //array('Perfil', "afiliado/perfil")
);
?>




<script>

    $(document).ready(function(){
        $('#tabla_afiliados td').height(20);

    })


</script>

<div class="container">


    <?php if(Yii::app()->user->hasFlash('exito')):?>
        <div class="info alert alert-success" style="font-size: 16px;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo Yii::app()->user->getFlash('exito'); ?>
        </div>


    <?php endif; ?>

    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'afiliado-referir-form',
            'enableAjaxValidation'=>true,
            'htmlOptions'=>array(
                'class'=>'fill-up'
            )
        )); ?>


        <?php echo $form->errorSummary($referencia); ?>




        <div class="row">
            <div class="col-md-12">
                    <div class="box-content">
                        <div class="row">
                            <div class="col-lg-4">
                               <div class="box" style="height: 400px;">
                                   <div class="box-header"> <span class="title">1. Información del Interesado</span>
                                   </div>

                                <ul class="padded separate-sections">
                                    <li class="input">
                                        <?php echo $form->labelEx($referencia,'nombre_completo'); ?>
                                        <?php echo $form->textField($referencia,'nombre_completo'); ?>
                                        <?php echo $form->error($referencia,'nombre_completo'); ?>
                                    </li>
                                    <li class="input">
                                        <?php echo $form->labelEx($referencia,'email'); ?>
                                        <?php echo $form->textField($referencia,'email'); ?>
                                        <?php echo $form->error($referencia,'email'); ?>
                                    </li>
                                    <li class="input">
                                        <?php echo $form->labelEx($referencia,'telefono'); ?>
                                        <?php echo $form->textField($referencia,'telefono'); ?>
                                        <?php echo $form->error($referencia,'telefono'); ?>
                                    </li>
                                    <li class="input">
                                        <?php echo $form->labelEx($referencia,'comentario'); ?>
                                        <?php echo $form->textArea($referencia,'comentario',array('rows' => 4)); ?>
                                        <?php echo $form->error($referencia,'comentario'); ?>
                                    </li>
                                </ul>


                               </div>



                            </div>

                            <div class="col-lg-8">
                                <div class="box" style="height: 400px; overflow-y: scroll;">
                                    <div class="box-header"> <span class="title">2. Referir a</span>
                                    </div>
                                    <div class="padded">
                                        <?php $this->renderPartial('_afiliados', array('model'=>$model),false,true); ?>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>


            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <div class="box-header"> <span class="title">Perfil Referido</span></div>
                                <?php
                                $nombre = $pais = $provincia = $especialidad = $correo = $bio = $avatar = "";

                                $idreferido = $referencia->idreferido;
                                if ($idreferido != null)
                                {
                                    $afiliado = Afiliado::model()->find(array("condition"=>"idnw_afiliado = $idreferido"));
                                    $nombre = $afiliado->nombre . " " . $afiliado->apellido;
                                    $pais = $afiliado->pais->nombre;
                                    $provincia = $afiliado->provincia->nombre;
                                    $especialidad = $afiliado->categoria->nombre . "/" . $afiliado->especialidad->nombre;
                                    $correo = $afiliado->email;
                                    $bio    = $afiliado->biografia;
                                    $avatar = Yii::app()->request->baseUrl . '/uploads/avatars/' . $afiliado->avatar;
                                }

                                ?>

                                <div class="row">
                                    <div class="col-lg-5">


                                    <div style="height: 250px;" class="padded">
                                    <table id="tabla_afiliados" width="100%" border="0">
                                        <tr>
                                            <div id="errorreferido">
                                                <?php echo $form->error($referencia,'idreferido'); ?>
                                            </div>
                                            <td width="160"><strong>Nombre</strong></td>
                                            <td id="referido" width="283">
                                                <?php echo $nombre ?>
                                            </td>

                                            <td width="250">&nbsp;</td>
                                        </tr>
                                        <tr style="display: none">
                                            <?php echo $form->textField($referencia,'idreferido',array('class'=>'hidden')); ?>
                                        </tr>

                                        <tr>
                                            <td><strong>Especialidad</strong></td>
                                            <td id="especialidad">
                                                <?php echo $especialidad ?>
                                            </td>
                                            <td rowspan="7"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>País</strong></td>
                                            <td id="pais">
                                                <?php echo $pais ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Provincia</strong></td>
                                            <td id="provincia">
                                                <?php echo $provincia ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><strong>Correo Electrónico</strong></td>
                                            <td id="email">
                                                <?php echo $correo ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Reseña</strong></td>
                                            <td id="biografia" rowspan="2" valign="top">
                                                <?php echo $bio ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </div>
                                   </div>

                                    <div class="col-lg-2">
                                        <img style="margin-top: 20px;" id="avatar" class="avatar-perfil200" width="200px" height="200px"
                                             src="<?php echo $avatar ?>" />
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-actions">
                                            <?php //echo CHtml::submitButton('Salvar Cambios',array('class' => 'btn btn-blue')); ?>

                                            <button type="submit" class="btn btn-lg btn-blue">Enviar Referencia</button>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                </div>

             </div>
        </div>











        <?php $this->endWidget(); ?>




    </div> <!-- form -->
</div> <!-- containar -->
