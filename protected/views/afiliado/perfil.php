<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Perfil';

$this->breadcrumbs=array(
    array('Perfil', null)
    //array('Perfil', "afiliado/perfil")

);
?>

<script>
    setActiveMenu('#sidebar-menu-perfil');
</script>



<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".info").animate({opacity: 1.0}, 25000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>


<div class="container">


    <?php if(Yii::app()->user->hasFlash('registro_actualizado')):?>
        <div class="info alert alert-success" style="font-size: 20px;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo Yii::app()->user->getFlash('registro_actualizado'); ?>
        </div>
    <?php endif; ?>

    <?php if(Yii::app()->user->hasFlash('avatar_invalido')):?>
        <div class="info alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo Yii::app()->user->getFlash('avatar_invalido'); ?>
        </div>
    <?php endif; ?>


  <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'afiliado-perfil-form',
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array(
            'class'=>'fill-up',
            'enctype'=>'multipart/form-data' //para poder subir imagenes (avatar)
        )
    )); ?>


      <?php echo $form->errorSummary($model); ?>


      <div class="row">
        <div class="col-md-12">



            <div class="box">
                <div class="box-header"> <span class="title">Información Básica</span>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php $this->renderPartial('_perfilbasico', array('form'=>$form, 'model'=>$model)); ?>
                        </div>

                        <div class="col-lg-6">
                            <?php $this->renderPartial('_perfilprofesional', array('form'=>$form, 'model'=>$model)); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header"> <span class="title">Ubicación Geográfica</span>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php $this->renderPartial('_perfillocalizacion', array('form'=>$form, 'model'=>$model)); ?>
                        </div>

                        <div class="col-lg-6">
                            <?php $this->renderPartial('_perfilavatar', array('form'=>$form, 'model'=>$model)); ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>




    <?php $this->endWidget(); ?>

  </div>

</div>