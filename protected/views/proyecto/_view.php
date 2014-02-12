<?php
/* @var $this ProyectoController */
/* @var $data Proyecto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcs_proyecto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcs_proyecto), array('editar', 'id'=>$data->idcs_proyecto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idafiliado')); ?>:</b>
	<?php echo CHtml::encode($data->idafiliado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcategoriaproyecto')); ?>:</b>
	<?php echo CHtml::encode($data->idcategoriaproyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_envio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_envio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_aprobacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_aprobacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roi')); ?>:</b>
	<?php echo CHtml::encode($data->roi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel_riesgo')); ?>:</b>
	<?php echo CHtml::encode($data->nivel_riesgo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plazo')); ?>:</b>
	<?php echo CHtml::encode($data->plazo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inversion_total_requerida')); ?>:</b>
	<?php echo CHtml::encode($data->inversion_total_requerida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inversion_minima')); ?>:</b>
	<?php echo CHtml::encode($data->inversion_minima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especialidades')); ?>:</b>
	<?php echo CHtml::encode($data->especialidades); ?>
	<br />

	*/ ?>

</div>