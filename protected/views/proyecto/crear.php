<?php
/* @var $this SiteController */
/* @var $proyecto LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Crear Proyecto';

$this->breadcrumbs=array(
    array('PROYECTOS', '/proyecto' ,'icon-lightbulb'),
    array('CREAR', null,'icon-plus-sign')

);

?>

<script>
    setActiveMenu('#sidebar-menu-proyectos');
</script>



<div class="container">
    <?php $this->renderPartial('_formulario', array('proyecto'=>$proyecto)); ?>
</div>