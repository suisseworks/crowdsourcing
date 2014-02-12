<?php
/* @var $this MuroController */
/* @var $data Muro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnw_muro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idnw_muro), array('view', 'id'=>$data->idnw_muro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idafiliado')); ?>:</b>
	<?php echo CHtml::encode($data->idafiliado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asunto')); ?>:</b>
	<?php echo CHtml::encode($data->asunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mensaje')); ?>:</b>
	<?php echo CHtml::encode($data->mensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>