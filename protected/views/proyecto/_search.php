<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idcs_proyecto'); ?>
		<?php echo $form->textField($model,'idcs_proyecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idafiliado'); ?>
		<?php echo $form->textField($model,'idafiliado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcategoriaproyecto'); ?>
		<?php echo $form->textField($model,'idcategoriaproyecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo'); ?>
		<?php echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>145)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_envio'); ?>
		<?php echo $form->textField($model,'fecha_envio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_aprobacion'); ?>
		<?php echo $form->textField($model,'fecha_aprobacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roi'); ?>
		<?php echo $form->textField($model,'roi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nivel_riesgo'); ?>
		<?php echo $form->textField($model,'nivel_riesgo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plazo'); ?>
		<?php echo $form->textField($model,'plazo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inversion_total_requerida'); ?>
		<?php echo $form->textField($model,'inversion_total_requerida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inversion_minima'); ?>
		<?php echo $form->textField($model,'inversion_minima',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'video'); ?>
		<?php echo $form->textArea($model,'video',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especialidades'); ?>
		<?php echo $form->textArea($model,'especialidades',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->