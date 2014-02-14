<div class="sidebar-background">
  <div class="primary-sidebar-background"></div>
</div>
<div class="primary-sidebar"> 
  
  <!-- Main nav -->
  <ul class="nav navbar-collapse collapse navbar-collapse-primary ">


      <li id="sidebar-menu-dashboard" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/dash/inicio"> <i class="icon-dashboard icon-2x"></i> <span>DASHBOARD</span> </a> </li>
      <li id="sidebar-menu-inicio" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/proyecto/galeria"> <i class="icon-eye-open icon-2x"></i> <span>GALERÍA</span> </a> </li>

      <li id="sidebar-menu-proyectos"> <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/proyecto"> <i class="icon-lightbulb icon-2x"></i> <span>MIS PROYECTOS</span> </a> </li>
      <li id="sidebar-menu-inicio" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/dash/inicio"> <i class="icon-comment icon-2x"></i> <span>BLOG</span> </a> </li>
      <li id="sidebar-menu-inicio" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/dash/inicio"> <i class="icon-bar-chart icon-2x"></i> <span>INVERSIONES</span> </a> </li>
      <li id="sidebar-menu-inicio" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/dash/inicio"> <i class="icon-group 2x"></i> <span>GRUPO</span> </a> </li>
      <li id="sidebar-menu-inicio" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/dash/inicio"> <i class="icon-key icon-2x"></i> <span>CUENTA</span> </a> </li>


    <div style="display: none">
    <li id="sidebar-menu-inicio" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/dash/inicio"> <i class="icon-bullhorn icon-2x"></i> <span>Inicio</span> </a> </li>
    <li id="sidebar-menu-dashboard" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/site"> <i class="icon-dashboard icon-2x"></i> <span>Dashboard</span> </a> </li>
    <li id="sidebar-menu-circulo" > <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl . "/dash/circulo/" . Yii::app()->user->id; ?>" > <i class="icon-circle-blank  icon-2x"></i> <span>Mi Círculo</span> </a> </li>
    <li id="sidebar-menu-mensajes" class=""> <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl . "/afiliado/mensajes/" . Yii::app()->user->id; ?>"> <i class="icon-envelope icon-2x"></i> <span>Mensajes</span> </a> </li>
    <li class=""> <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl . '/dash/calendario/' ?>"> <i class="icon-calendar icon-2x"></i> <span>Calendario</span> </a> </li>
    <li class=""> <span class="glow"></span> <a href="<?php echo Yii::app()->request->baseUrl . "/afiliado/cuenta/" . Yii::app()->user->id; ?>"> <i class="icon-money icon-2x"></i> <span>Mi Cuenta</span> </a> </li>
    </div>

      <!-- ADMIN AREA -->
      <li style="display: <?php if (Yii::app()->myhelper->esAdministrador()) {echo 'block';} else {echo 'none';}   ?>"


          id="sidebar-menu-acciones" class="dark-nav "> <span class="glow"></span> <a class="accordion-toggle  " data-toggle="collapse" href="#yJ6h3Npe7C"> <i class="icon-briefcase icon-2x"></i> <span> ADMINISTRAR <i class="icon-caret-down"></i> </span> </a>
          <ul id="yJ6h3Npe7C" >
              <li id="sidebar-menu-admin-spotlight" class=""> <a href="<?php echo Yii::app()->request->baseUrl . "/spotlight/"  ?>"> <i class="icon-lightbulb"></i> Spotlight </a> </li>


              <!--
              <li class=""> <a href="pages/ui_lab/grid.html"> <i class="icon-th-large"></i> Grid </a> </li>
              <li class=""> <a href="pages/ui_lab/tables.html"> <i class="icon-table"></i> Tables </a> </li>
              <li class=""> <a href="pages/ui_lab/widgets.html"> <i class="icon-plus-sign-alt"></i> Widgets </a> </li>
              -->
          </ul>
      </li>

  </ul>






</div>
