<?php
/* @var $this SpotlightController */
/* @var $data Spotlight */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnw_spotlight')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idnw_spotlight), array('view', 'id'=>$data->idnw_spotlight)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idafiliado')); ?>:</b>
	<?php echo CHtml::encode($data->idafiliado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titular')); ?>:</b>
	<?php echo CHtml::encode($data->titular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mensaje')); ?>:</b>
	<?php echo CHtml::encode($data->mensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>