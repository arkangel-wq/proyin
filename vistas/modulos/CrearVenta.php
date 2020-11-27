<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Crear Venta</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tortilleria</a></li>
            <li class="breadcrumb-item active">Crear Venta</li>
          </ol>
        </div><!-- /.col -->

        <div class="card  " style="width: 100rem;">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-5 hidden-md hidden-sm hidden-xs" style="width: 100rem;">
                <div class="card card-green card-outline">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <form role="form" method="POST">
                      <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                          </div>
                          <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" placeholder="Vendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                          <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                        </div>



                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></i></span>
                          </div>
                          <?php
                          $item = null;
                          $valor = null;
                          $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
                          if (!$ventas) {
                            echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                          } else {
                            foreach ($ventas as $key => $value) {
                            }
                            $codigo = $value["codigo"] + 1;
                            echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="' . $codigo . '" readonly>';
                          }
                          ?>

                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group mb-3">
                          <select class="form-control select2" style="width: 80%;" id="seleccionarCliente" name="seleccionarCliente" required>
                            <option selected="selected">Selecciona clientes</option>
                            <?php
                            $item = null;
                            $valor = null;
                            $categorias = ControladorClientes::ctrMostrarCliente($item, $valor);
                            foreach ($categorias as $key => $value) {
                              echo '<option value ="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                            }
                            ?>

                          </select>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar</button>
                        </div>
                      </div>
                      <!-- /input-group -->
                      <div class="row">
                        <div class="col-lg-5">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                            </div>
                            <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripción del producto" required>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="input-group">
                            <input type="number" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="0" placeholder="0" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="number " class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="000000" readonly required>
                          </div>
                        </div>
                      </div>


                      <hr>
                      <div>
                        <div class="row">
                          <div class="col-lg-5">
                          </div>
                          <div class="col-lg-3">
                            <label for="">Importe</label>
                          </div>
                          <div class="col-lg-4">
                            <label for="">Total</label>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="row">
                          <div class="col-lg-5">
                          </div>
                          <div class="col-lg-3">
                            <div class="input-group">
                              <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                              <span class="input-group-text">%</span>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                              </div>
                              <input type="number " class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div>
                        <div>


                          <div>
                            <div>
                              <div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <label>Metodo de pago</label>
                                  </div>
                                  <div class="col-lg-1">
                                  </div>
                                  <div class="col-lg-5">
                                    <label for="">Codigo de transacion</label>
                                  </div>
                                </div>
                              </div>
                              <div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <select class="form-control select2" style="width: 100%;">
                                      <option selected="selected" id="nuevoMetodoPago" name="nuevoMetodoPago" required>Selecciona una opcion</option>
                                      <option>Efectivo</option>
                                      <option>Tarjeta Credito</option>
                                      <option>Tarjeta Devito</option>
                                    </select>
                                    <div>
                                    </div>
                                  </div>
                                  <div class="col-lg-1">
                                  </div>
                                  <div class="col-lg-5">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">#</span>
                                      </div>
                                      <input type="number " class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código transacción" required>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Venta</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-sm-7 hidden-md hidden-sm hidden-xs" style="width: 100rem;">
                <div class="card card-dark card-outline">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%">

                      <thead>

                        <tr>
                          <th style="width:10px">#</th>
                          <th>Imagen</th>
                          <th>Codigo</th>
                          <th>Descripcion</th>
                          <th>Stock</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      





                    </table>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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