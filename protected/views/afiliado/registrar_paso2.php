<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Paso 2/3 - Escoger Círculo';
$this->breadcrumbs=array(
    'Login',
);


Yii::app()->clientScript->registerScript(
    'seleccionarIngresar',
    '$("#linkregistrar").addClass("active");
     $("body").addClass("fondo2");

    '
);
?>


<script type="text/javascript">


  $( document ).ready(function() {

    function toggleSugerirCategoria(idcategoria)
    {
        if (idcategoria == -1)
        {
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
    }

    function toggleSugerirEspecialidad(idespecialidad)
    {
        if (idespecialidad == -1) {
            $('#seccion_sugerirespecialidad').show();
        }
        else
        {
            $('#seccion_sugerirespecialidad').hide();
        }
    }

   function toogleSugerirCirculo(idcirculo)
   {
       if (idcirculo == -1) {
           $('#seccion_nuevocirculo').show();
       }
       else
       {
           $('#seccion_nuevocirculo').hide();
       }

   }


   toggleSugerirCategoria( $('#Afiliado_idcategoria').val());
   toggleSugerirEspecialidad($('#Afiliado_idespecialidad').val());
   toogleSugerirCirculo($('#Afiliado_idcirculo').val());

  });


  function updateprovinciasycirculos(data)
  {
      $('#Afiliado_idprovincia').html(data.provincias);
      $('#Afiliado_idcirculo').html(data.circulos);

      //actualizar circulos
      $('#yt1').click();
  }


  function updateespecialidadesycirculos(data)
  {

      alert(data.especialidades);
      //$('#Afiliado_idespecialidad').html(data.especialidades);
  }





</script>




<div class="container">

    <div class="col-md-4 col-md-offset-1">
        <div>
            <?php $this->renderPartial('_registrar_paso2', array('model'=>$model)); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div >
            <?php $this->renderPartial('_registrar_paso2_circulo', array('model'=>$model),false,true); ?>
        </div>
    </div>


</div>