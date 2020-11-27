<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categorias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tortilleria</a></li>
              <li class="breadcrumb-item active">Categorias</li>
            </ol>
          </div><!-- /.col -->
           <br>
           <br>
          <div class="card card-primary card-outline " style="width: 100rem;">
              <div class="card-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar Categoria</button>
              </div>
              <div class="card-body">
              
              </div>
             
              <div class="card-footer">
              <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas tabladatatable" width="100%">
          
         <thead>
          
          <tr>
            
            <th style="width:10px">#</th>
            <th>Categoria</th>
            
            <th>Fecha De Creacion</th>
             <th>Acciones</th>
          </tr> 
 
         </thead>
 
         <tbody>
 
         <?php
 
           $item = null;
           $valor = null;
 
           $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
 
           foreach ($categorias as $key => $value) {
            
             echo ' <tr>
 
                     <td>'.($key+1).'</td>
 
                     <td class="text-uppercase">'.$value["categoria"].'</td>
                     <td>'.$value['fecha'].'</td>
 
                     <td>
 
                       <div class="btn-group">
                           
                         <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pen"></i></button>
 
                           <button class="btn btn-danger  btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
 
                       </div>  
                   </tr>';
           }
 
         ?>
 
         </tbody> 
 
        </table>
 
       </div>
 
     </div>
 
   </section>
 
 </div>
  
 <!-- Modal  bootrap-->
   <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCategoria" aria-hidden="true">
     <form role="form" method="post" >
       <div class="modal-dialog" role="document">
         <div class="modal-content">
 
 
 
           <div class="modal-header" style="background:#343a40;color:white">
 
             <h5 class="modal-title" id="modalAgregarCategoria">Agregar Categoria</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
 
             <form role="form">
               <div class="card-body">
                 <!-- Nombre -->
                 <div class="form-group">
                   <label for="exampleInputEmail1">Categoria</label>
                   <input type="text" class="form-control" name="nuevaCategoria" placeholder="Ingresar Categoria ">
                 </div> 
             </form>
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
 
           $crearCategoria = new ControladorCategorias();
           $crearCategoria -> ctrCrearCategoria();
 
         ?>
 
       </form>
 
     </div>
 
   </div>
 
 </div>
 
 <!--=====================================
 MODAL EDITAR CATEGORÍA
 ======================================-->
 
 <!-- Modal  bootrap-->
   <div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalEditarCategoria" aria-hidden="true">
     <form role="form" method="post" >
       <div class="modal-dialog" role="document">
         <div class="modal-content">
 
 
 
           <div class="modal-header" style="background:#343a40;color:white">
 
             <h5 class="modal-title" id="modalEditarCategoria">Editar Categoria</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
 
             <form role="form">
               <div class="card-body">
                 <!-- Nombre -->
                 <div class="form-group">
                   <label for="exampleInputEmail1">Categoria</label>
                   <input type="text" class="form-control" name="editarCategoria" id="editarCategoria" requiredplaceholder="Ingresar Categoria ">
                    <input type="hidden"  name="idCategoria" id="idCategoria" required>
                 </div> 
             </form>
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
 
           $editarCategoria = new ControladorCategorias();
           $editarCategoria -> ctrEditarCategoria();
 
         ?> 
 
       </form>
 
     </div>
 
   </div>
 
 </div>
 
 <?php
 
   $borrarCategoria = new ControladorCategorias();
   $borrarCategoria -> ctrBorrarCategoria();
 
 ?>
 
              </div>
            
            </div>
            
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->