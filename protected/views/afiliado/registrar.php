<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Registrar';
$this->breadcrumbs=array(
    'Login',
);
?>


 <script>

       $(document).ready(function(){
               $("#linkregistrarse").addClass('active');
                $("body").addClass("fondo2");
       });
   </script>


<div class="container">
    <div class="col-md-5 col-md-offset-2">
        <div class="padded">
            <?php $this->renderPartial('_registrar', array('model'=>$model)); ?>
        </div>
    </div>

</div>