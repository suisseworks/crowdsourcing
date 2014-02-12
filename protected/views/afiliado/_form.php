<?php
/* @var $this AfiliadoController */
/* @var $model Afiliado */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'afiliado-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clave'); ?>
		<?php echo $form->textField($model,'clave',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'clave'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idcategoria'); ?>
		<?php echo $form->textField($model,'idcategoria'); ?>
		<?php echo $form->error($model,'idcategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idespecialidad'); ?>
		<?php echo $form->textField($model,'idespecialidad'); ?>
		<?php echo $form->error($model,'idespecialidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
		<?php echo $form->textField($model,'fecha_ingreso'); ?>
		<?php echo $form->error($model,'fecha_ingreso'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'ciudad'); ?>
		<?php echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domicilio'); ?>
		<?php echo $form->textArea($model,'domicilio',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'domicilio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus'); ?>
		<?php echo $form->error($model,'estatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biografia'); ?>
		<?php echo $form->textArea($model,'biografia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'biografia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_facebook'); ?>
		<?php echo $form->textField($model,'link_facebook',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'link_facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_twitter'); ?>
		<?php echo $form->textField($model,'link_twitter',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'link_twitter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_linkedin'); ?>
		<?php echo $form->textField($model,'link_linkedin',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'link_linkedin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genero'); ?>
		<?php echo $form->textField($model,'genero',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'genero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->