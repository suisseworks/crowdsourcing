<?php

/*
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript('ajax-prueba',
    "$.ajax(
        type: 'GET',
        url: '.Yii::app()->createUrl('afiliado/prueba', array('id'=>$modelo->idpais))',
        success: function(result) {
                        alert('SUCCESS');
                            }
            )"
);
*/




?>


<style>
    #detallecirculo   {
        position: relative;
        font-size: 14px;
    }

    #detallecirculo .milabel    {
        float: left;
        text-decoration: underline;
        width: 140px;
    }

    #detallecirculo .mitexto    {
        float: left;
        width: 200px;

    }

    .mirow {
        margin-bottom: 0px;
    }

    #descripcioncirculo {
        height: 60px;
        overflow-y: scroll;
    }

    .clear {clear: both;}



</style>




            <div class="login box" style="margin-top: 20px;">


                <div class="box-header">
                    <span class="title"><h3><a tooltip="Círculos disponibles en tu país!"> Círculos Disponibles</a></h3>
                    </span>

                    <div class="input-group addon-left">
                        <?php
                            $idpais = intval($model->idpais);


                            echo CHtml::ajaxButton ('Mostrar Círculos Disponibles',
                                $this->createUrl('afiliado/mostrarcirculos'/*,array("idpais"=>'3' )*/),

                                array(
                                    'data'=>array(
                                            'idpais'=>'js: $("#Afiliado_idpais option:selected").val()',
                                            'idcategoria'=>'js: $("#Afiliado_idcategoria option:selected").val()',
                                            'idespecialidad'=>'js: $("#Afiliado_idespecialidad option:selected").val()'
                                    ),
                                    'type'=>'POST',
                                    'update' => '#arbolcirculos',
                                    'beforeSend' => 'function(){
                                                 $("#ajaxloader").show(); }',
                                    'complete' => 'function(){
                                                $("#ajaxloader").hide();}',
                                ),
                                array('class' => 'btn btn-large btn-green btn-block ')
                            );


                            ?>
                    </div>
                </div>
                <div id="arbolcirculos" class="box-content padded" style="height: 350px; overflow-y: scroll;">

                </div>
            </div>




            <!-- DETALLE CIRCULO -->
            <div class="box" style="margin-top: 0px;">
                <div class="box-header">
                    <div class="title">Detalle</div>
                </div>
                <div id="detallecirculo" class="box-content padded" style="height: 150px;">

                    <div class="mirow">
                        <div class="milabel"><label> Nombre del Círculo:</label></div>
                        <div id="nombrecirculo" class="mitexto"></div>
                    </div>
                    <div class="clear"></div>

                    <div class="mirow">
                        <div class="milabel"><label>Miembros:</label></div>
                        <div id="miembroscirculo" class="mitexto"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="mirow">
                        <div class="milabel"><label>Líder:</label></div>
                        <div id="lidercirculo" class="mitexto"></div>
                    </div>
                    <div class="clear"></div>



                    <div class="mirow">
                        <div class="milabel"><label>Descripción:</label></div>
                        <ul class="chat-box">
                            <li  class="gray">
                                <div id="descripcioncirculo"></div>
                            </li>
                        </ul>



                    </div>








                </div>
            </div>







