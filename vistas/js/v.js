'<div class="row" style="padding:5px 15px">' +

'<br> <div class="col-lg-5">' +
'<div class="input-group"> ' +
'<div class="input-group-prepend">' +
'<button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="' + idProducto + '"><i class="fa fa-times"></i></button>' +
' </div>' +
'<input type="text" class="form-control " id="agregarProducto" name="agregarProducto" value="' + descripcion + '"  readonly required>' +
'</div>' +
'</div>' +
'<div class="col-lg-3">'+
          '<div class="input-group">'+
            '<input type="number" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'"  class="form-control" required>'+
          '</div>'+
        '</div>'+


'<div class="col-lg-4" ingresoPrecio>'+
'<div class="input-group">'+
'<div class="input-group-prepend">'+
'<span class="input-group-text">$</span>'+
'</div>'+

'<input type="text" class="form-control nuevoPrecioProducto" precioReal="' + precio + '" name="nuevoPrecioProducto" value="' + precio + '" readonly required>' +

'</div>' +

'</div>' +

'</div>'

$(".nuevoProducto").append(

  '<div class="row" style="padding:5px 15px">'+
  '<div class="col-xs-6" style="padding-right:5px">'+
  
    '<div class="input-group">'+
    
    '<button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="' + idProducto + '"><i class="fa fa-times"></i></button>' +

    '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

    '</div>'+

  '</div>'+

  '<!-- Cantidad del producto -->'+

  '<div class="col-lg-3"  style="padding-right:10px">'+
    
     '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

  '</div>' +

  '<!-- Precio del producto -->'+

  '<div class="col-lg-4 ingresoPrecio" style="padding-left:0px">'+

    '<div class="input-group">'+

    '<span class="input-group-text">$</span>'+
       
    '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+

    '</div>'+
     
  '</div>'+

  '</div>')