<?php
/* @var $this SiteController */
/* @var $proyecto LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Editar Proyecto';

$this->breadcrumbs=array(
    array('PROYECTOS', '/proyecto' ,'icon-lightbulb'),
    array('EDITAR',null,'icon-edit'),
    array('<span style="font-size: 16px; text-decoration: underline; color: #3e89b9">' . $proyecto->nombre . '</span>' .
    "-   " .
     '<span style="font-size: 16px;  color: rgb(179, 7, 7);">' . $proyecto->idcs_proyecto . '</span>' , null,'icon-pencil')

);

?>

<script>
    setActiveMenu('#sidebar-menu-proyectos');
</script>



<div class="container">
    <?php $this->renderPartial('_formulario', array('proyecto'=>$proyecto)); ?>
</div>