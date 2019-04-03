<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url();?>admin/dashboard">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>admin/dashboard">Usuarios <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>admin/productos">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>admin/preguntas">Preguntas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>admin/comentarios">Comentarios</a>
        </li>
        <li class="nav-item dropdown my-2 my-lg-0">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-shield"></i> <?=$this->session->userdata('dataS');?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?=base_url();?>admin/logout"><i class="fas fa-user-slash"></i> Cerrar sesión</a>
            </div>
        </li>
        </ul>
    </div>
  </div>
</nav>
<!--TERMINA EL NAV-->
<br>
<div class="container">
    <div class="row">
        <?php foreach($verProducto as $producModify){ ?>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card-users">
                    <form action="<?=base_url();?>admin/modifyProducto" method="POST" enctype="multipart/form-data">
                        <center><h3><i class="fas fa-truck-loading"></i> Modificar Productos</h3>
                    </center>
                    <br>
                    <input type="hidden" name="idProducto" value="<?=$producModify->idProducto?>">
                    <input type="hidden" name="idImagen" value="<?=$producModify->producto_idImagen?>">
                    <label for="nombreProducto">Nombre del producto:</label>
                    <input type="text" name="nombreProducto" id="nombreProducto" maxlength="50" value="<?=$producModify->nombreProducto?>" class="form-control">
                    <br>
                    <label for="descripcion">Descripcion del producto:</label>
                    <textarea type="text" name="descripcion" id="descripcion" cols="30" maxlength="200" rows="2" class="form-control"><?=$producModify->descripcion?></textarea>
                    <br>
                    <label for="precioProducto">Precio del producto:</label>
                    <input type="text" name="precioProducto" id="precioProducto" maxlength="5" value="<?=$producModify->pProducto?>" class="form-control">
                    <br>
                    <label for="ventaProducto">Precio venta del producto:</label>
                    <input type="text" name="ventaProducto" id="ventaProducto" maxlength="5" value="<?=$producModify->pVenta?>" class="form-control">
                    <br>
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" max="100" min="1" class="form-control" value="<?=$producModify->stock?>">
                    <br>
                    <label for="lanzamiento">¿Es un producto de lanzamiento?</label>
                    <select name="lanzamiento" id="lanzamiento" class="form-control">
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                    <br>
                    <input type="hidden" name="idUsuario" value="<?=$this->session->userdata('idUsuario')?>">
                    <br>
                    <span style="color: red;">- Tienes que subir todas las imagenes de nuevo</span>
                    <br><br>
                    <label for="imagen_1">Primera imagen:</label>
                    <input type="file" name="imagen_1" id="imagen_1" size="30">
                    <br>
                    <label for="imagen_2">Segunda imagen:</label>
                    <input type="file" name="imagen_2" id="imagen_2">
                    <br>
                    <label for="imagen_3">Tercera imagen:</label>
                    <input type="file" name="imagen_3" id="imagen_3">
                    <br>
                    <center>
                    <input type="submit" onclick="return validarProducto();" class="btn add-users" value="Agregar Producto">
                    </center>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    function validarProducto(){
        var nombre = document.getElementById('nombreProducto').value;
        var descripcion = document.getElementById('descripcion').value;
        var precio = document.getElementById('precioProducto').value;
        var venta = document.getElementById('ventaProducto').value;
        var stock = document.getElementById('stock').value;
        var lanzamiento = document.getElementById('lanzamiento').value;
        var imagen_1 = document.getElementById('imagen_1').value;
        var imagen_2 = document.getElementById('imagen_2').value;
        var imagen_3 = document.getElementById('imagen_3').value;
        if(nombre == "" || descripcion == "" || precio == "" || venta == "" || stock == "" || lanzamiento == "" || imagen_1 == "" || imagen_2 == "" || imagen_3 == ""){
            alert("Todos los campos deben de estar llenos para continuar.");
            return false;
        }else{
            return true;
        }
    }
</script>
