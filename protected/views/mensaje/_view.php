<?php
/* @var $this MensajeController */
/* @var $data Mensaje */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnw_mensaje')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idnw_mensaje), array('view', 'id'=>$data->idnw_mensaje)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('de')); ?>:</b>
	<?php echo CHtml::encode($data->de); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('para')); ?>:</b>
	<?php echo CHtml::encode($data->para); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asunto')); ?>:</b>
	<?php echo CHtml::encode($data->asunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mensaje')); ?>:</b>
	<?php echo CHtml::encode($data->mensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	*/ ?>

</div>