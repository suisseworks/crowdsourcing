<?php
/* @var $this AfiliadoController */
/* @var $model Afiliado */



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#afiliado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Afiliados</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php /*$this->renderPartial('_search',array(
        'model'=>$model,
    )); */ ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'afiliado-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'idnw_afiliado',
        'email',
        'usuario',
        'clave',
        'nombre',
        'apellido',
        /*
        'idcategoria',
        'idespecialidad',
        'fecha_ingreso',
        'idpais',
        'idprovincia',
        'ciudad',
        'domicilio',
        'estatus',
        'tipo',
        'biografia',
        'link_facebook',
        'link_twitter',
        'link_linkedin',
        'genero',
        'avatar',
        */
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
