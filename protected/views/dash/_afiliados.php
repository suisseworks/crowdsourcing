<?php
/**
 * Created by PhpStorm.
 * User: Matthias Malek
 * Date: 17/12/13
 * Time: 08:32 PM
 */


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#circulo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<style>
    .seo
    {
        color: red;
    }

</style>



<?php
/*
Yii::app()->clientScript->registerScript('row_dblclick', "
    $('table > tbody > tr').on('dblclick', function(){
            alert('hola');
    });"
);
*/
?>

<script>

    $(document).ready(function()
    {

    })


    function afterUpdate(grid_id)
    {
      /*
        $('tr').hover( function() {
            $(this).css('cursor','pointer');
        })
        */
    }


    function rowSelected(grid_id) {
        var keyId = $.fn.yiiGridView.getSelection(grid_id);
        keyId  = keyId[0]; //above function returns an array with single item, so get the value of the first item
        if (keyId != undefined)
        {
           // alert(keyId); return;
            $("#Referencia_idreferido").val(keyId);
            $('#errorreferido').html("");
        }


            $.ajax({
                url: '<?php echo $this->createUrl("afiliado/datosAfiliado"); ?>',
                data: {id: keyId},
                type: 'GET',
                dataType: "json",
                success: function(data) {
                    $('#referido').html(data.nombre);
                    $('#especialidad').html(data.especialidad);
                    $('#pais').html(data.pais);
                    $('#provincia').html(data.provincia);
                    $('#email').html(data.email);
                    $('#biografia').html(data.biografia);

                    $('#avatar').attr('src',data.avatar);

                }
            });

        }

</script>




    <p class="hidden">
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php /*$this->renderPartial('_search',array(
            'model'=>$model,

        )); */ ?>
    </div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'afiliado-grid',
   'ajaxType'=>'POST',
    'dataProvider'=>$model->search(),
    'selectableRows' => 1, //permit to select only one row by the time
    'selectionChanged' => 'rowSelected',  // javascript
    //'afterAjaxUpdate' => 'afterUpdate',  // el css se pierde....luego de ordenar o buscar

    'rowCssClass'=>array('odd','even'),

    'htmlOptions' => array(
        'style'=>'cursor: pointer;',

    ),

    //'rowCssClassExpression'=>'$data->especialidad["nombre"] == "SEO" ? "seo" : "seo"  ',
    //'rowCssClassExpression'=>'$row == 1 ? "seo" : "seo2"  ',


    'filter'=>$model,
    'columns'=>array(

        array(
            'name'=>'circulo',
            'value'=> '$data->circulo["nombre"]',
            'filter'=>CHtml::listData(Circulo::model()->findAll(array("condition"=>'idnw_circulo != -1')),'nombre','nombre')
        ),


        array(
            'name'=>'categoria',
            'value'=> '$data->categoria["nombre"]',
            'filter'=>CHtml::listData(Categoria::model()->findAll(array("condition"=>'idnw_categoria != -1')),'nombre','nombre')
        ),

        array(
            'name'=>'especialidad',
            'value'=> '$data->especialidad["nombre"]',
            'filter'=>CHtml::listData(Especialidad::model()->findAll(array("condition"=>'idnw_especialidad != -1')),'nombre','nombre')
        ),


        array(
            'name'=>'nombrecompleto',
            'header'=>'Nombre',
            //'type'=>'raw',
            'value'=>'$data->nombre . " " . $data->apellido'
        ),


        array(
            'name'=>'pais',
            'value'=> '$data->pais["nombre"]',
            'filter'=>CHtml::listData(Pais::model()->findAll(),'nombre','nombre')
        ),
        /*
        array(
            'name'=>'provincia',
            'value'=> '$data->provincia["nombre"]',
            'filter'=>CHtml::listData(Provincia::model()->findAll(),'nombre','nombre')
        ),

        */

        /*
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
       /* array(
            'class'=>'CButtonColumn',
        ),
       */
    ),
)); ?>