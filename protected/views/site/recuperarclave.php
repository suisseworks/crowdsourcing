<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Recuperar Contraseña';
$this->breadcrumbs=array(
    'Recuperar Contraseña',
);

//'&nbsp;'

Yii::app()->clientScript->registerScript(
    'recuperarclaveinit',
    '$("#linkingresar").addClass("active");
     $("body").addClass("fondo1");

    '
);
?>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascripts/application.js" type="text/javascript"></script>

<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".info").animate({opacity: 1.0}, 5000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>



<script>
    $(document).ready(function() {
        $("#login-form").bind("submit", hola);
    });

</script>

<div class="container">
    <div class="col-md-4 col-md-offset-3">
        <div class="padded">


            <?php if(Yii::app()->user->hasFlash('clave_enviada')):?>
                <div align="center" class=" alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo Yii::app()->user->getFlash('clave_enviada'); ?>
                </div>
            <?php endif; ?>

            <?php if(Yii::app()->user->hasFlash('noexiste')):?>
                <div class=" alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo Yii::app()->user->getFlash('noexiste'); ?>
            </div>
            <?php endif; ?>


            <div id="recuperarclave" class="login box element-animation underline sombratransparente" style="margin-top: 20px;">
                <div class="box-header">
                    <span class="title">Recuperar Contraseña</span>
                </div>
                <div class="box-content padded">

                    <div class="form">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                                //'beforeValidate' => 'alert("beforeValidate");',
                            ),
                            'htmlOptions'=>array(
                                'class'=>'separate-sections',
                            )

                        )); ?>

                        <p class="note"><span class="required">*</span> Campo requerido.</p>

                        <!--            -->
                        <!-- USUARIO    -->
                        <!--            -->
                        <?php echo $form->labelEx($model,'email'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-user"></i>
                             </span>
                            <?php echo $form->textField($model,'email', array("autofocus"=>"autofocus")); ?>
                        </div>
                        <?php echo $form->error($model,'email'); ?>





                        <?php echo CHtml::submitButton('Enviar nueva Contraseña a mi correo', array('class' => 'btn btn-lg btn-blue btn-block')); ?>


                        <?php $this->endWidget(); ?>
                    </div><!-- form -->




                </div>
            </div>
        </div>
    </div>
</div>