<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <!--  Scripts para las paginas -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Proyecto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="vistas/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="vistas/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="vistas/dist/js/pages/dashboard.js"></script>
  <!-- DataTables -->
  <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- InputMask -->
<script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- fullCalendar -->
<link rel="stylesheet" href="vistas/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="vistas/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="vistas/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="vistas/plugins/fullcalendar-bootstrap/main.min.css">

  <script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/plugins/fullcalendar/main.min.js"></script>
<script src="vistas/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="vistas/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="vistas/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="vistas/plugins/fullcalendar-bootstrap/main.min.js"></script>
</head>
 <!-- -->


<?php

if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {
  echo '<body class="hold-transition sidebar-mini layout-fixed">';

  echo '<div class="wrapper">';

  include "vistas/modulos/cabezote.php";
  include "vistas/modulos/menu.php";


  if (isset($_GET['ruta'])) {
    if (
      $_GET['ruta'] == "inicio" ||
      $_GET['ruta'] == "Usuarios" ||
      $_GET['ruta'] == "Productos" ||
      $_GET['ruta'] == "Clientes" ||
      $_GET['ruta'] == "venta" ||
      $_GET['ruta'] == "CrearVenta" ||
      $_GET['ruta'] == "Calendario" ||
      $_GET['ruta'] == "categorias" ||
      $_GET['ruta'] == "logout"
    ) {

      include "vistas/modulos/" . $_GET['ruta'] . ".php";
    } else {
      include "vistas/modulos/404.php";
    }
  }


  include "vistas/modulos/footer.php";
} else {
  echo '<body class="hold-transition sidebar-mini layout-fixed login-page">';
  include "vistas/modulos/login.php";
}


?>

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/ventas.js"></script>

</body>

</html>