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
<?php if($this->session->userdata('estatus') == 1){ ?>
    <a href="<?=base_url();?>admin/agregarUsuarios" class="btn add"><i class="fas fa-user-plus"></i> Agregar usuario</a>
<?php }else{ echo '<h3 style="color: #fff;">- Solo puedes ver los usuarios.</h3>';} ?>
</div>
<br>
<div class="row">
    <?php foreach($user as $viewUser){?>
        <div class="col-lg-4 col-xl-4">
        <div class="card-user" style="width: 18rem; margin-top: 1rem;">
            <center>
                <img src="<?=base_url();?>images/logo.png" class="card-img-top logo-card">
            </center>
            <div class="card-body">
                <center>
                    <h4><?=$viewUser->nombre;?></h4>
                    <span class="admon"><i class="fas fa-user-shield"></i> <?php if($viewUser->estatus==1){echo("Super Admin");} else{echo "Administrador";}?></span>
                </center>

                <hr>
                <p class="card-text"> <?php if($viewUser->estatus==1){echo("Permisos (Leer, agregar, publicar y ver).");} else{echo "Permisos (Leer, publicar y ver).";}?></p>
                <hr>
                <?php if($this->session->userdata('estatus') == 1){?>
                <center>
                    <a href="<?=base_url()?>admin/modificarUsuarios/<?=$viewUser->idUsuario?>" class="btn edit"><i class="fas fa-user-edit"></i> Editar</a>
                    <?php if($viewUser->estatus==1){}else{echo '<a class="btn delete" onclick="return question();" href="' . base_url() . 'admin/eliminar_Usuarios/' . $viewUser->idUsuario . '"><i class="fas fa-user-times"></i> eliminar</a>';}?>
                </center>
                <?php }?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</div>

<script>
    function question(){
        var pregunta = confirm('¿Estás seguro o segura de eliminar a este administrador?');
        if(pregunta == true){
            return true;
        }else{
            return false;
        }
    }
</script>
