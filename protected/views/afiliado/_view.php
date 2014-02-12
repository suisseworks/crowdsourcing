<?php
/* @var $this AfiliadoController */
/* @var $data Afiliado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnw_afiliado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idnw_afiliado), array('view', 'id'=>$data->idnw_afiliado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clave')); ?>:</b>
	<?php echo CHtml::encode($data->clave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idcategoria); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idespecialidad')); ?>:</b>
	<?php echo CHtml::encode($data->idespecialidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpais')); ?>:</b>
	<?php echo CHtml::encode($data->idpais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprovincia')); ?>:</b>
	<?php echo CHtml::encode($data->idprovincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domicilio')); ?>:</b>
	<?php echo CHtml::encode($data->domicilio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biografia')); ?>:</b>
	<?php echo CHtml::encode($data->biografia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_facebook')); ?>:</b>
	<?php echo CHtml::encode($data->link_facebook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_twitter')); ?>:</b>
	<?php echo CHtml::encode($data->link_twitter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_linkedin')); ?>:</b>
	<?php echo CHtml::encode($data->link_linkedin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genero')); ?>:</b>
	<?php echo CHtml::encode($data->genero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>
	<br />

	*/ ?>

</div>