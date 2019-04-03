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
            <i class="fas fa-user-shield"></i> Administrador
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

<div class="container-fluid">
<div class="row">

<a href="<?php base_url();?>agregarProductos" class="btn add"><i class="fas fa-parachute-box"></i> Agregar producto</a>
</div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Nombre del Producto</th>
                        <th scope="col">Descripción del Producto</th>
                        <th scope="col">Precio Producto</th>
                        <th scope="col">Precio Venta</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Ganancia</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($modificar as $productos){?>
                        <tr>
                            <th scope="row"><?=$productos->nombreProducto;?></th>
                            <td><?=$productos->descripcion;?></td>
                            <td>$<?=$productos->pProducto;?></td>
                            <td>$<?=$productos->pVenta;?></td>
                            <td><?=$productos->stock;?></td>
                            <td style="color: green;">$<?=number_format($productos->ganancia, 2, '.', '');?></td>
                            <td><?=$productos->nombre;?></td>
                            <td><img src="<?=base_url();?>images/images_upload/<?=$productos->imagen_1;?>" style="width: 50px; heigth: 50px;" alt=""></td>
                            <td><?php
                                if($productos->baja_logica == 0){
                                    echo '<a href="'. base_url() . 'Admin/publicarPregunta/' . $productos->idProducto . '"><button class="btn add">Publicar <i class="far fa-thumbs-up"></i></button></a>';
                                }else{
                                    echo '<a href="'. base_url() . 'Admin/despublicarPregunta/' . $productos->idProducto . '"><button class="btn add">Despublicar <i class="far fa-thumbs-down"></i></button></a>';
                                }
                             ?>
                             <a href="<?=base_url();?>admin/modificarProducto/<?=$productos->idProducto?>"><button class="btn add"><i class="fas fa-box-open"></i> MODIFICAR</button></a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
