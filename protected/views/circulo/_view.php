<?php
/* @var $this CirculoController */
/* @var $data Circulo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnw_circulo')); ?>:</b>
    <?php echo CHtml::encode($data->idnw_circulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->nombre), array('view', 'id'=>$data->idnw_circulo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlider')); ?>:</b>
    <?php
        if ($data->idlider != null){
            $afiliado = Afiliado::model()->find(array("condition"=>"idnw_afiliado = $data->idlider"));
            if ($afiliado != null)
                echo CHtml::encode($afiliado->nombre . " " . $afiliado->apellido );
        }

    ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpais')); ?>:</b>
	<?php
        if ($data->idpais)
        {
            $pais = Pais::model()->find(array("condition"=>"idpais = $data->idpais"));
            echo CHtml::encode($pais->nombre);
        }

    ?>


	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprovincia')); ?>:</b>
	<?php echo CHtml::encode($data->idprovincia); ?>
	<br />


</div>