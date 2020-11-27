<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Clientes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tortilleria</a></li>
            <li class="breadcrumb-item active">Clientes</li>
          </ol>
        </div><!-- /.col -->

        <div class="card card-primary card-outline " style="width: 100rem;">
          <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Clientes</button>
          </div>
          <div class="card-body">

            <table class="table table-bordered table-striped dt-responsive tablasc tabladatatable" width="100%">

              <thead>
 
                <tr>

                  <th style="width:10px">#</th>
                  <th>Nombre del cliente</th>
                  <th>Documento ID</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  <th>Fecha de nacimiento</th>
                  <th>Total compras</th>
                  <th>Ultima compra</th>
                  <th>Ingreso al sistema</th>
                  <th>Acciones</th>
                </tr>

              </thead>

              <tbody>

                <?php
                $item = null;
                $valor = null;
                $Clientes = ControladorClientes::ctrMostrarCliente($item, $valor);
                foreach ($Clientes as $Key => $value) {
                  echo '
                  <tr>
                 <td>' . ($Key + 1) . '</td>
                <td>' . $value["nombre"] . '</td>
                <td>' . $value["documento"] . '</td>
                <td>' . $value["email"] . '</td>
                <td>' . $value["telefono"] . '</td>
                <td>' . $value["direccion"] . '</td>
                <td>' . $value["fecha_nacimiento"] . '</td>
                <td>' . $value["compras"] . '</td>
                <td>2017-12-11 12:05:32</td>
                <td>' . $value["fecha"] . '</td>
                <td>
                  <div class="btn-group">
 
                    <button class="btn btn-warning btnEditarCliente " idCliente="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pen"></i></button>

                    <button class="btn btn-danger btnEliminarCliente " idCliente="' . $value["id"] . '" ><i class="fa fa-times"></i></button>

                  </div>

                </td>
                </tr> ';
                }

 
                ?>


              </tbody>

            </table>

          </div>

        </div>

        </section>

      </div>

      <!-- Modal  bootrap-->
      <div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCliente" aria-hidden="true">
        <form role="form" method="post">
          <div class="modal-dialog" role="document">
            <div class="modal-content">



              <div class="modal-header" style="background:#343a40;color:white">

                <h5 class="modal-title" id="modalAgregarCliente">Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form role="form">
                  <div class="card-body">
                    <!-- Nombre -->
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre del cliente</label>
                      <input type="text" class="form-control" name="nuevoCliente" placeholder="Ingresar nombre " required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Documeto ID</label>
                      <input type="number" min="0" class="form-control" name="nuevoDocumentoId" placeholder="Ingresar documento " required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Correo</label>
                      <input type="email" class="form-control" name="nuevoEmail" placeholder="Ingresar correo " required>
                    </div>

                     <label for="exampleInputEmail1">Telefono</label>
                     <div class="input-group">
                    <input type="text" class="form-control" name="nuevoTelefono"  data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                  </div>

                    <!--<div class="form-group">
                      <label for="exampleInputEmail1">Telefono</label>
                      <input type="number" class="form-control" name="nuevoTelefono" placeholder="Ingresar numero de Telefono " data-inputmask="'mask ':'(999) 999-9999'" data-mask required>
                    </div>-->

                    <div class="form-group">
                      <label for="exampleInputEmail1">Direccion</label>
                      <input type="text" class="form-control" name="nuevaDireccion" placeholder="Ingresar la Direccion " required>
                    </div>

                    <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="nuevaFechaNacimiento"  data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask required >
                  </div>

                    <!--<div class="form-group">
                      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                      <input type="number" class="form-control" name="nuevaFechaNacimiento" placeholder="Ingresar Fecha de nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>
                    </div>-->
                </form>

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar Cliente</button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            </div>
          </div>
      </div>

    </div>


    <?php

    $crearCliente = new ControladorClientes();
    $crearCliente->ctrCrearCliente();

     ?>

     </form>

            </div>

    </div>

    </div>

      <!-- Modal  bootrap-->
      <div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditarCliente" aria-hidden="true">
        <form role="form" method="post">
          <div class="modal-dialog" role="document">
            <div class="modal-content">


              <div class="modal-header" style="background:#343a40;color:white">

                <h5 class="modal-title" id="modalEditarCliente">Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form role="form">
                  <div class="card-body">
                    <!-- Nombre -->
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre del cliente</label>
                      <input type="text" class="form-control" name="editarCliente" id="editarCliente" required>
                      <input type="hidden" id=idCliente name="idCliente">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Documeto ID</label>
                      <input type="number" min="0" class="form-control" name="editarDocumentoId" id="editarDocumentoId" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Correo</label>
                      <input type="email" class="form-control" name="editarEmail" id="editarEmail"  required>
                    </div>
                    <label for="exampleInputEmail1">Telefono</label>
                     <div class="input-group">
                    <input type="text" class="form-control" name="editarTelefono"  id="editarTelefono" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                  </div>
                   <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Telefono</label>
                      <input type="number" class="form-control" name="editarTelefono" id="editarTelefono" required>
                    </div>-->
                    <div class="form-group">
                      <label for="exampleInputEmail1">Direccion</label>
                      <input type="text" class="form-control" name="editarDireccion" id="editarDireccion"  required>
                    </div>

                   <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                      <input type="number" class="form-control" name="editarFechaNacimiento" id="editarFechaNacimiento" required>
                    </div>-->
                    <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="editarFechaNacimiento"  id="editarFechaNacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask required >
                  </div>
                </form>

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            </div>
          </div>
      </div>

    


      <?php

$editarCliente = new ControladorClientes();
$editarCliente -> ctrEditarCliente();

?>



          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>
<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>