<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="vistas/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Tortilleria</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php

      if ($_SESSION['foto']!=""){
        echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2" alt="User Image">';

 }else{
  echo '<img src="vistas/img/user.png" class="img-circle elevation-2" alt="User Image">';

 }
 ?>
      </div>
      <div class="info">
        <?php
 if ($_SESSION['nombre']!=""){
      echo '<a class="d-block">'.$_SESSION['nombre'].'</a></div>';
 }else{
  echo '<a href="#"  class="d-block">Nombre de Usuario</a>
  </div>';
 }

        ?>
     
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">MENU</li>
        <li class="nav-item">
          <a href="Usuarios" class="nav-link">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <p>
              Usuarios
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="categorias" class="nav-link">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <p>
              Categorias
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="Productos" class="nav-link">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <p>
              Productos
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="Clientes" class="nav-link">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <p>
              Clientes
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="Ventas" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              ventas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="venta" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ventas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="CrearVenta" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear Venta</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="Calendario" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendario
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>