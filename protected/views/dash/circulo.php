<?php
/**
 * Created by PhpStorm.
 * User: Francisco Quesada
 * Date: 20/01/14
 * Time: 08:23 AM
 */

$this->pageTitle=Yii::app()->name . ' - Mi Círculo';

$this->breadcrumbs=array(
array('Mi Círculo', null)

);
?>

<script>
    setActiveMenu('#sidebar-menu-circulo');
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box" style="height: 300px; overflow-y: scroll ">
                            <div class="box-header"> <span class="title"><span style="font-size: 20px;">
                                        <?php echo $afiliado->circulo['nombre']; ?></span></span>
                            </div>

                            <div class="padded">

                                <!-- INICIO GRID -->
                                    <?php $this->renderPartial('_circulo', array('model'=>$model),false,true); ?>
                                <!-- FIN GRID -->

                            </div>



                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box" style="height: 400px;">
                            <div class="box-header"> <span class="title">Resumen</span></div>

                            <div class="padded">
                            

                            
                            	

                                Líder: <?php echo $circulo->lider['nombre']; ?>
                                <img id="miavatar" class="element-animation2 avatar-perfil" width="120px" height="120px"
                                     src="<?php echo Yii::app()->myhelper->myAvatarURL(); ?>">

                            </div>

                        </div>

                    </div>





               </div>
            </div>
        </div>
    </div>











</div>
