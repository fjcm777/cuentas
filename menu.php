<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Logotipo</a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo INICIO; ?>index.php">Inicio</a></li>
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Transacciones <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Entradas de Asientos de Diario</a></li>
          <li class="divider"></li>
          <li><a href="#">Mayorizar Asientos de Diario</a></li>
          <li class="divider"></li>
          <li><a href="#">Asientos de Diario Recurrentes</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Catálogos <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo INICIO;?>catalogos/catalogocuentas/catalogo_cuentas_lista.php">Catálogo de Cuentas</a></li>
          <li><a href="<?php echo INICIO;?>catalogos/gruposcuentas/grupos_cuentas_lista.php">Grupos de Cuentas</a></li>
          <li><a href="<?php echo INICIO;?>catalogos/categoriascuentas/categorias_cuentas_lista.php">Categorías de Cuentas</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo INICIO;?>catalogos/categoriascuentas/categorias_cuentas_lista_inactivos.php">Catálogo de Cuentas Inactivas</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

