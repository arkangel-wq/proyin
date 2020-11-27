<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Adiministrador De Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tortilleria</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->

          <div class="card card-primary card-outline " style="width: 100rem;">
              <div class="card-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuarios</button>
              </div>
              <div class="card-body">
              
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas tabladatatable" width="100%"> 
        <thead>
         <tr>
          <!-- /campos --> 
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Ultimo inicio de Sesion </th>
                <th>Acciones</th>
         </tr> 
        </thead>
        <tbody>

       <?php
 
          $item=null;
          $valor = null;
          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
          foreach ($usuarios as $key => $value) {
            echo'<tr>
          <th scope="row">'.$value['id'].'</th>
          <td>'.$value['nombre'].'</td>
          <td>'.$value['usuario'].'</td>';
                 if($value["foto"]!=""){
            echo '<td><img src="'.$value['foto'].'" class="img-thumbnail" width="40px"></td>';
          }else{
            echo '<td><img src="vistas/img/user.png" class="img-thumbnail" width="40px"></td>';
          }
          echo'<td>'.$value["perfil"].'</td>';
          if($value["estado"]!=0){
              echo'<td><button class="btn btn-success  btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activo</button></td>';
          }else{
            echo'<td><button class="btn btn-danger  btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Inactivo</button></td>';
          }
           echo'
          <td>'.$value['ultimo_login'].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarUsuario"idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario "><i class="fa fa-pen"></i></button>

                    
                      <button class="btn btn-danger  btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                  </div>

        </tr>';
          }

              ?>

        </tbody> 

       </table>

      </div>
      <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAgregarUsuario" aria-hidden="true">
    <form role="form" method="post"  enctype="multipart/form-data">
      <div class="modal-dialog" role="document">
        <div class="modal-content">



          <div class="modal-header" style="background:#343a40;color:white">

            <h5 class="modal-title" id="modalAgregarUsuario">Agregar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
<form role="form">
              <div class="card-body">
                <!-- Nombre -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar Nombre ">
                </div>
                <!-- Usuario -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Usuario</label>
                  <input type="text" class="form-control" id="nuevoUsuario" name="nuevoUsuario" placeholder="Ingresar Usuario ">
                </div>
                <!-- Password -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="nuevoPassword" placeholder="Ingrese Password">
                </div>
                <!-- /.card-header -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Perfil</label>
                      <select class="form-control select2" style="width: 100%;" name="nuevoPerfil">
                        <option selected="selected">Selecciona Perfil</option>
                        <option>Administrador </option>
                        <option>Vendedor</option>

                      </select>
                    </div>
                    <!-- /.card-body -->
            </form>
          </div>
          <!-- /.card -->
          <div class="form-group">
            <label>Subir Foto</label>
            <input type="file" class="nuevaFoto" name="nuevaFoto" class="center-block">
            <p class="center-block">Peso maximo de la foto 200Mb</p>
            <img src="vistas/img/usuarios/Default/anonymous.png" class="thumbnail center-block previsualizar" width="100px">
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        </div>
      </div>
  </div>

</div>
        
<?php
$crearUsuario = new ControladorUsuarios();
$crearUsuario->ctrCrearUsuario();

?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<!-- Modal  bootrap-->
  <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEditarUsuario" aria-hidden="true">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-dialog" role="document">
        <div class="modal-content">



          <div class="modal-header" style="background:#343a40;color:white">

            <h5 class="modal-title" id="modalEditarUsuario">Editar Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form">
              <div class="card-body">
                <!-- Nombre -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control"  id="editarNombre" name="editarNombre" >
                </div>
                <!-- Usuario -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Usuario</label>
                  <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" readonly >
                </div>
                <!-- Password -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control"  id="editarPassword" name="editarPassword" >
                  <input type="hidden" name="passwordActual" id="passwordActual">
                </div>
                <!-- /.card-header -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Perfil</label>
                      <select class="form-control select2" style="width: 100%;"  id="editarPerfil" name="editarPerfil">
                        <option selected="selected">Selecciona Perfil</option>
                        <option>Administrador </option>
                        <option>Vendedor</option>

                      </select>
                    </div>
                    <!-- /.card-body -->
            </form>
          </div>
          <!-- /.card -->
          <div class="form-group">
            <label>Subir Foto</label>
            <input type="file" class="nuevaFoto" name="editarFoto" class="center-block">
            <p class="center-block">Peso maximo de la foto 200Mb</p>
            <img src="vistas/img/usuarios/Default/anonymous.png" class="thumbnail center-block previsualizar" width="100px">
            <input type="hidden" name="fotoActual" id="fotoActual">
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Modificar Usuario</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>
      </div>
  </div>

</div>

      <?php
$editarUsuario = new ControladorUsuarios();
$editarUsuario->ctrEditarUsuario();

?>

      </form>

    </div>

  </div>

</div>

<?php
  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();
  ?>
              </div>
             
              
            
            </div>
            
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->