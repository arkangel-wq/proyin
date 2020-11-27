<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
 
 <?php

 if($_SESSION["foto"] != ""){

   echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

 }else{


   echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

 }


 ?>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="logout" class="dropdown-item">
            <i class="fas fa-user-times mr-2"></i> Cerrar Sesión
            <span class="float-right text-muted text-sm">Activa</span>
          </a>
         
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->