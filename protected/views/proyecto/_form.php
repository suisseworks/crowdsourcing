<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proyecto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idafiliado'); ?>
		<?php echo $form->textField($model,'idafiliado'); ?>
		<?php echo $form->error($model,'idafiliado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idcategoriaproyecto'); ?>
		<?php echo $form->textField($model,'idcategoriaproyecto'); ?>
		<?php echo $form->error($model,'idcategoriaproyecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
		<?php echo $form->error($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_envio'); ?>
		<?php echo $form->textField($model,'fecha_envio'); ?>
		<?php echo $form->error($model,'fecha_envio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_aprobacion'); ?>
		<?php echo $form->textField($model,'fecha_aprobacion'); ?>
		<?php echo $form->error($model,'fecha_aprobacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roi'); ?>
		<?php echo $form->textField($model,'roi'); ?>
		<?php echo $form->error($model,'roi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nivel_riesgo'); ?>
		<?php echo $form->textField($model,'nivel_riesgo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nivel_riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plazo'); ?>
		<?php echo $form->textField($model,'plazo'); ?>
		<?php echo $form->error($model,'plazo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inversion_total_requerida'); ?>
		<?php echo $form->textField($model,'inversion_total_requerida'); ?>
		<?php echo $form->error($model,'inversion_total_requerida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inversion_minima'); ?>
		<?php echo $form->textField($model,'inversion_minima',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'inversion_minima'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video'); ?>
		<?php echo $form->textArea($model,'video',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'especialidades'); ?>
		<?php echo $form->textArea($model,'especialidades',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'especialidades'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->