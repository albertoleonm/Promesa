<?php foreach($setProduct as $detalle){ ?>
<div class="container detalle">
    <div class="row">
        <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
            <div class="producto-imagen">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="imag-produc" src="<?=base_url();?>images/images_upload/<?=$detalle->imagen_1;?>" alt="<?=$detalle->nombreProducto;?>">
                        </div>
                        <div class="carousel-item">
                        <img class="imag-produc" src="<?=base_url();?>images/images_upload/<?=$detalle->imagen_2;?>" alt="<?=$detalle->nombreProducto;?>">
                        </div>
                        <div class="carousel-item">
                        <img class="imag-produc" src="<?=base_url();?>images/images_upload/<?=$detalle->imagen_3;?>" alt="<?=$detalle->nombreProducto;?>">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
            <h2><?=$detalle->nombreProducto;?></h2>
            <br>
            <p><?=$detalle->nombreProducto;?></p>
            <br>
            <hr>
            <p>Detalle técnico</p>
            <ul>
                <li>Precio: <strong style="color: #f60305;">$ <?=$detalle->pVenta;?></strong></li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>
