<?php
/* @var $this CirculoController */
/* @var $model Circulo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'circulo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->labelEx($model,'idlider'); ?>
		<?php echo $form->textField($model,'idlider'); ?>
		<?php echo $form->error($model,'idlider'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idpais'); ?>
		<?php echo $form->textField($model,'idpais'); ?>
		<?php echo $form->error($model,'idpais'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idprovincia'); ?>
		<?php echo $form->textField($model,'idprovincia'); ?>
		<?php echo $form->error($model,'idprovincia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->