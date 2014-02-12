
            <div id="registrar" class="login box element-animation sombratransparente" style="margin-top: 20px;">
                <div class="box-header"> <span class="title"><h3>Usuario Nuevo</h3></span> </div>
                <div class="box-content padded " >
                    <div class="form">

                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'afiliado-registrar-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // See class documentation of CActiveForm for details on this,
                            // you need to use the performAjaxValidation()-method described there.
                            'enableAjaxValidation'=>false,
                            'htmlOptions'=>array(
                                'class'=>'separate-sections',
                            )
                        )); ?>

	                    <p class="note"><span class="required">*</span> Campo requerido.</p>

                        <?php echo $form->errorSummary($model); ?>


                        <?php echo $form->labelEx($model,'nombre'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-ok"></i>
                             </span>
                            <?php echo $form->textField($model,'nombre',array("autofocus"=>"autofocus")); ?>
                        </div>
                        <?php echo $form->error($model,'nombre'); ?>


                        <?php echo $form->labelEx($model,'apellido'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-ok"></i>
                             </span>
                            <?php echo $form->textField($model,'apellido'); ?>
                        </div>
                        <?php echo $form->error($model,'apellido'); ?>


                        <?php echo $form->labelEx($model,'email'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-envelope"></i>
                             </span>
                            <?php echo $form->textField($model,'email'); ?>
                        </div>
                        <?php echo $form->error($model,'email'); ?>


                        <?php echo $form->labelEx($model,'genero'); ?>
                        <br/>
                        <div style="padding: 5px; border-style: solid; border-width: thin; border-color: #d3d3d3;
                        -webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;

                        ">

                        <?php echo $form->radioButtonList($model,'genero',array('Masculino'=>'Masculino','Femenino'=>'Femenino')); ?>
                           </div>

                        <?php echo $form->error($model,'genero'); ?>

                        <br/>


                        <?php echo $form->labelEx($model,'usuario'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-user"></i>
                             </span>
                            <?php echo $form->textField($model,'usuario'); ?>
                        </div>
                        <?php echo $form->error($model,'usuario'); ?>


                        <?php echo $form->labelEx($model,'clave'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-key"></i>
                             </span>
                            <?php echo $form->passwordField($model,'clave'); ?>
                        </div>
                        <?php echo $form->error($model,'clave'); ?>


                        <?php echo $form->labelEx($model,'clave2'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-key"></i>
                             </span>
                            <?php echo $form->passwordField($model,'clave2'); ?>
                        </div>
                        <?php echo $form->error($model,'clave2'); ?>




                        <div class="row buttons">
                            <?php echo CHtml::submitButton('Registrarse',array('class' => 'btn btn-lg btn-blue btn-block')); ?>
                        </div>

                    <?php $this->endWidget(); ?>

                    </div><!-- form -->




                </div>
            </div>
