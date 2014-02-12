<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>/site">CrowdSourcing

<!--            <img src="--><?php //echo Yii::app()->theme->baseUrl; ?><!--/images/logo.png" height="20px" />-->


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

          <div class="navbar-right">
            <ul class="nav navbar-nav navbar-left">

                <li id="linkingresar"  class="cdrop"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login">Ingresar</a></li>

                <li id="linkregistrarse" class="cdrop"><a href="<?php echo Yii::app()->request->baseUrl; ?>/afiliado/registrar">Registrarse</a></li>

<!--                <li class="dropdown cdrop">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>






        </div>




    </div><!-- /.navbar-collapse -->


</nav>