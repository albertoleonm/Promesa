<br>
<div class="container">
<center><h1>Consume lo natural.</h1></center>
    <div class="row">
    <?php foreach($productosPublicados as $productos){?>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 producto">
            <center>
            <div class="card-producto d-md-none" style="width: 20rem; margin-bottom: 1rem;">
                <img src="<?=base_url();?>images/images_upload/<?=$productos->imagen_1;?>" class="img-card" alt="<?=$productos->nombreProducto?>">
                <div class="card-body">
                    <h3 class="card-title"><?=$productos->nombreProducto?></h3>
                    <a href="<?=base_url();?>productos/detalleProducto/<?=$productos->idProducto?>" class="btn detail">Ver producto</a>
                    <br>
                </div>
            </div>
            </center>
            <br>
            <div id="container" class="productoCompleto d-none d-md-block">
                <!-- Start	Product details -->
                <div class="product-details">
                    <!-- 	Product Name -->
                    <h1><?=$productos->nombreProducto?></h1>
                    <!-- The most important information about the product -->
                    <p class="description"><?=$productos->descripcion?></p>
                    <hr>
                    <a href="<?=base_url();?>productos/detalleProducto/<?=$productos->idProducto?>" class="btn detail">Ver producto</a>
                </div>

                <div class="product-image">
                    <img src="<?=base_url();?>images/images_upload/<?=$productos->imagen_1;?>" alt="<?=$productos->nombreProducto?>">
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    <div class="row">
    <?php foreach($lanzamientos as $lanza){?>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 producto">
            <center><h3 style="color: #f60305;"> - Proximo lanzamiento - </h3></center>
                <center>
                <div class="card-producto d-md-none" style="width: 20rem; margin-bottom: 1rem;">
                    <img src="<?=base_url();?>images/images_upload/<?=$lanza->imagen_1;?>" class="img-card" alt="<?=$lanza->nombreProducto?>">
                    <div class="card-body">
                        <h3 class="card-title"><?=$lanza->nombreProducto?></h3>
                        <a href="<?=base_url();?>productos/detalleProducto/<?=$lanza->idProducto?>" class="btn detail">Ver más</a>
                        <br>
                    </div>
                </div>
                </center>
                <div id="container" class="productoCompleto d-none d-md-block">
                    <!-- Start	Product details -->
                    <div class="product-details">
                        <!-- 	Product Name -->
                        <h1><?=$lanza->nombreProducto?></h1>
                        <!-- The most important information about the product -->
                        <p class="description"><?=$lanza->descripcion?></p>
                        <hr>
                        <button  class="btn lanzamiento" disabled>Ver más</button>
                    </div>

                    <div class="product-image">
                        <img src="<?=base_url();?>images/images_upload/<?=$lanza->imagen_1;?>" alt="<?=$lanza->nombreProducto?>">
                    </div>
                </div>
            <br>
        </div>
    <?php } ?>
    </div>
</div>
