<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);

//'&nbsp;'

 Yii::app()->clientScript->registerScript(
     'loginInit',
     '$("#linkingresar").addClass("active");
      $("body").addClass("fondo1");

     '
 );
?>


<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".info").animate({opacity: 1.0}, 15000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>



<div class="container">
    <div class="col-md-4 col-md-offset-3">
        <div class="padded">


               <?php if(Yii::app()->user->hasFlash('registro_exitoso')):?>
                <div class="info alert alert-success" style="font-size: 16px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo Yii::app()->user->getFlash('registro_exitoso'); ?>
                </div>


            <?php endif; ?>


            <div id="login" class="login box element-animation underline sombratransparente" style="margin-top: 20px;">
                <div class="box-header">
                    <span class="title">Login</span>
                </div>
                <div class="box-content padded">

                    <div class="form">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                            ),
                            'htmlOptions'=>array(
                                'class'=>'separate-sections',
                            )

                        )); ?>

                        <p class="note"><span class="required">*</span> Campo requerido.</p>

                        <!--            -->
                        <!-- USUARIO    -->
                        <!--            -->
                        <?php echo $form->labelEx($model,'username'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-user"></i>
                             </span>
                            <?php echo $form->textField($model,'username', array("autofocus"=>"autofocus")); ?>
                        </div>
                        <?php echo $form->error($model,'username'); ?>

                        <!--            -->
                        <!-- PASSWORD   -->
                        <!--            -->
                        <?php echo $form->labelEx($model,'password'); ?>
                        <div class="input-group addon-left">
                             <span class="input-group-addon" href="#">
                                <i class="icon-key"></i>
                             </span>
                            <?php echo $form->passwordField($model,'password'); ?>
                        </div>
                        <?php echo $form->error($model,'password'); ?>

                        <div  style="text-align: right;">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/recuperarclave">
                                    Olvidé mi contraseña
                                </a>

                        </div>



                        <div class="input-group addon-left">
                            <table >
                                <tr>
                                    <td><?php echo $form->checkBox($model,'rememberMe'); ?></td>
                                    <td style="padding-left: 5px;"><?php echo $form->label($model,'rememberMe'); ?></td>
                                </tr>
                            </table>
                        </div>


                            <?php echo CHtml::submitButton('Ingresar', array('class' => 'btn btn-lg btn-blue btn-block')); ?>


                        <?php $this->endWidget(); ?>
                    </div><!-- form -->


                    <div style="margin-top: 5px;">
                        ¿No tienes una cuenta?
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/afiliado/registrar">
                            Regístrate aquí!
                        </a>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>