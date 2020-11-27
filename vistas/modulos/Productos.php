<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tortilleria</a></li>
            <li class="breadcrumb-item active">Productos</li>
          </ol>
        </div><!-- /.col -->

        <div class="card card-primary card-outline " style="width: 100rem;">
          <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto</button>
          </div>
          <div class="card-body">
            <div class="box-body">
              <table class="table table-bordered table-striped dt-responsive tablaProductos  " width="100%">
                <thead>
                  <tr>
                    <th style="width:10px">#</th>
                    <th>Imagen </th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Precio de Compra</th>
                    <th>Precio de venta</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </thead>
              </table>

            </div>
          </div>
        </div>
      </div>
      <!--=====================================
                    MODAL AGREGAR PRODUCTO
            ======================================-->

      <div id="modalAgregarProducto" class="modal fade" role="dialog">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

              <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

              <div class="modal-header" style="background:#343a40;color:white">

                <h5 class="modal-title" id="modalAgregarProducto">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

              <div class="modal-body">

                <div class="box-body">


                  <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                  <div class="input-group mb-0">
                    <div class="form-group">
                      <label>Seleccionar Categoria</label>
                      <select class="form-control select2" style="width: 202%;" name="nuevaCategoria" id="nuevaCategoria" required>
                        <option selected="selected">Seleccionar Categoria</option>
                        <?php
                        $item = null;
                        $valor = null;
                        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                        foreach ($categorias as $Key => $value) {
                          echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                        }
                        ?>

                      </select>
                    </div>
                  </div>

                  <!-- ENTRADA PARA EL CÓDIGO -->

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-code"></i></span>
                    </div>
                    <input type=" text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" placeholder=" Ingresar Codigo" readonly required>

                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-comment-medical"></i></span>
                    </div>
                    <input type=" text" class="form-control" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                    <input type=" number" class="form-control" name="nuevoStock" min="0" placeholder=" Stock" required>
                  </div>

                  <div class="row">

                    <div class="col-lg-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                        <input type=" number" class="form-control" name="nuevoPrecioCompra" id="nuevoPrecioCompra" min="0" placeholder="Precio Compra" required>
                      </div>

                    </div>
                    <div class="col-lg-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                        <input type=" number" class="form-control" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" placeholder="Precio Venta" required>
                      </div>

                    </div>
                    <br>
                    <br>
                    <div class="col-lg-6">
                      <label>
                        Porcentaje
                      </label>
                      <input type="checkbox" checked data-toggle="toggle" data-width="70" class="porcentaje" data-on="Si" data-off=" No" data-onstyle="dark">
                    </div>
                    <div class="col-lg-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                        <span class="input-group-text"><i class="fas fa-percent"></i></span>
                      </div>

                    </div>

                  </div>

                  <br>

                  <div class="form-group">
                    <label>Subir Foto</label>
                    <input type="file" class="nuevaImagen" name="nuevaImagen" class="center-block">
                    <p class="center-block">Peso maximo de la foto 200Mb</p>
                    <img src="vistas/img/productos/default/anonymous.png" class="thumbnail center-block previsualizar" width="100px">
                  </div>

                </div>

              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
              </div>
            </form>

            <?php
            $crearProducto = new ControladorProductos();
            $crearProducto->ctrCrearProducto();

            ?>
          </div>

        </div>

      </div>

      <!--=====================================
                    MODAL EDITAR PRODUCTO
       ======================================-->

      <div id="modalEditarProducto" class="modal fade" role="dialog">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

              <div class="modal-header" style="background:#343a40;color:white">

                <h5 class="modal-title" id="modalEditarProducto">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                <div class="box-body">

                  <div class="input-group mb-0">
                    <div class="form-group">
                      <label>Seleccionar Categoria</label>
                      <select class="form-control select2" style="width: 202%;" name="editarCategoria" readonly required>
                        <option id="editarCategoria"></option>
                      </select>
                    </div>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-code"></i></span>
                    </div>
                    <input type=" text" class="form-control" id="editarCodigo" name="editarCodigo" readonly>

                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-comment-medical"></i></span>
                    </div>
                    <input type=" text" class="form-control" name="editarDescripcion" id="editarDescripcion" required>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                    <input type=" number" class="form-control" name="editarStock" id="editarStock" min="0" required>
                  </div>

                  <div class="row">

                    <div class="col-lg-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                        <input type=" number" class="form-control" name="editarPrecioCompra" id="editarPrecioCompra" min="0" required>
                      </div>

                    </div>
                    <div class="col-lg-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                        <input type=" number" class="form-control" id="editarPrecioVenta" name="editarPrecioVenta" min="0" readonly required>
                      </div>

                    </div>
                    <br>
                    <br>
                    <div class="col-lg-6">
                      <label>
                        Porcentaje
                      </label>
                      <input type="checkbox" checked data-toggle="toggle" data-width="70" class="porcentaje" data-on="Si" data-off=" No" data-onstyle="dark">

                    </div>
                    <div class="col-lg-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="15" required>
                        <span class="input-group-text"><i class="fas fa-percent"></i></span>
                      </div>

                    </div>

                  </div>

                  <br>

                  <div class="form-group">
                    <label>Subir Foto</label>
                    <input type="file" class="nuevaImagen" name="editarImagen" class="center-block">
                    <p class="center-block">Peso maximo de la foto 200Mb</p>
                    <img src="vistas/img/productos/default/anonymous.png" class="thumbnail center-block previsualizar" width="100px">
                    <input type="hidden" name="imagenActual" id="imagenActual">
                  </div>

                </div>

              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
              </div>
            </form>

            <?php
            $editarProducto = new ControladorProductos();
            $editarProducto->ctrEditarProducto();

            ?>
            <?php
            $eliminarProducto = new ControladorProductos();
            $eliminarProducto->ctrEliminarProducto();

            ?>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>