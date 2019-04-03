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
<div class="container">
    <div class="row">
        <h3 style="color: #fff;">- Bandeja de mensajes no leídos - </h3>
    </div>
    <br>
    <div class="row">
        <?php foreach ($comentarios as $publicado) {?>
        <div class="col-md-6 col-lg-6 col-xl-6" style="margin-top: 1rem;">
            <div class="card-coment">
                <div class="card-body">
                    <center>
                        <h5><?=$publicado->nombreUsuario;?></h5>
                        <span style="color: rgb(160, 160, 160);"><?=$publicado->mail;?></span>
                    </center>
                    <hr>
                    <p><?=$publicado->comentario;?></p>
                    <hr>
                    <form action="<?php base_url();?>leido" method="POST">
                        <input type="hidden" value="<?=$publicado->idComentario?>" name="idComentario">
                        <input type="hidden" name="idUsuario" value="<?=$this->session->userdata('idUsuario')?>">
                        <button type="submit" class="btn leido"><i class="fas fa-check"></i> marcar como leído</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <br><br>
    <div class="row">
        <h3 style="color: #fff;">- Bandeja de mensajes leídos - </h3>
    </div>
    <div class="row">
        <?php foreach ($comentariosLeidos as $leidos) {?>
            <div class="col-md-6 col-lg-6 col-xl-6" style="margin-top: 1rem;">
                <div class="card-coment">
                    <div class="card-body">
                        <center>
                            <h5><?=$leidos->nombreUsuario;?></h5>
                            <span style="color: rgb(160, 160, 160);"><?=$leidos->mail;?></span>
                        </center>
                        <hr>
                        <p><?=$leidos->comentario;?></p>
                        <hr>
                        <a onclick="return question();" href="<?=base_url();?>admin/deleteComentario/<?php echo $leidos->idComentario;?>" class="btn delete"><i class="fas fa-times"></i> eliminar mensaje</a>
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
</div>
<br><br>
<script>
    function question(){
        var question = confirm("¿Estás seguro de eliminar este mensaje?");
        if(question == true){
            return true;
        }else{
            return false;
        }
    }
</script>
