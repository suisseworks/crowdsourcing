
<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>/site">
            <img  height="30px;"  class="element-animation" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/minilogo.png"  />
        </a>

<!--        Estos son los botones que aparecen con los menús al hacerse pequeña la pantalla-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-primary">
            <span class="sr-only">Toggle Side Navigation</span>
            <i class="icon-th-list"></i>
        </button>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
            <span class="sr-only">Toggle Top Navigation</span>
            <i class="icon-align-justify"></i>
        </button>

    </div>




    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-collapse-top">

  <!--      <div id="mainmenu">
            <?php /*$this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                    array('label'=>'Home', 'url'=>array('/site/index')),
                    array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                    array('label'=>'Contact', 'url'=>array('/site/contact')),
                    array('label'=>'Perfil', 'url'=>array('/afiliado/perfil'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Registrar', 'url'=>array('/afiliado/registrar'),'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                ),
            )); */?>
        </div>--><!-- mainmenu -->




        <div class="navbar-right">
            <ul class="nav navbar-nav navbar-left">


<!--                <li class="cdrop"><a href="--><?php //echo Yii::app()->request->baseUrl . "/dash/invitar/"  ?><!--">Invitar</a></li>-->


                <li class="dropdown cdrop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bolt"></i>Acciones <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/proyecto/crear"><i class="icon-plus-sign"></i>Crear Proyecto</a></li>
                        <li><a href="#"><i class="icon-envelope"></i>Enviar Correo</a></li>
                    </ul>
                </li>
            </ul>



            <form class="navbar-form navbar-left" role="search" style="display: <?php echo Yii::app()->user->isGuest ? 'none':'block'   ?> ">
                <div class="form-group">
                    <input type="text" class="search-query animated" placeholder="Buscar">
                    <i class="icon-search"></i>
                </div>
            </form>


            <ul class="nav navbar-nav navbar-left" style="display: <?php echo Yii::app()->user->isGuest ? 'none':'block'   ?> ">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle dropdown-avatar" data-toggle="dropdown">
              <span>
                <img class="menu-avatar" src="<?php echo Yii::app()->myhelper->myAvatarURL(); ?>" /> <span><?php echo Yii::app()->user->name; ?> <i class="icon-caret-down"></i></span>
                <span class="badge badge-dark-red"><?php echo Yii::app()->myhelper->mensajesNoLeidos(); ?>  </span>
              </span>
                    </a>
                    <ul class="dropdown-menu" style="width: 180px;">

                        <!-- the first element is the one with the big avatar, add a with-image class to it -->

                        <li class="with-image">
                            <div class="avatar">
                                <img src="<?php echo Yii::app()->myhelper->myAvatarURL(); ?>" />
                            </div>
                            <span> <?php echo Yii::app()->user->getState("nombrecompleto"); ?></span>
                        </li>

                        <li class="divider"></li>

                        <li><a href="<?php echo Yii::app()->request->baseUrl . "/afiliado/perfil/" . Yii::app()->user->id; ?>"><i class="icon-user"></i> <span>Perfil</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl . "/afiliado/preferencias/" . Yii::app()->user->id; ?>"><i class="icon-cog"></i> <span>Preferencias</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl . "/afiliado/mensajes/" . Yii::app()->user->id; ?>"><i class="icon-envelope"></i> <span>Notificaciones</span> <span class="label label-dark-red pull-right"><?php echo Yii::app()->myhelper->mensajesNoLeidos(); ?></span></a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl . "/afiliado/cuenta/" . Yii::app()->user->id; ?>"><i class="icon-key"></i> <span>Mi Cuenta</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout"><i class="icon-off"></i> <span>Salir</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>




    </div><!-- /.navbar-collapse -->


</nav>