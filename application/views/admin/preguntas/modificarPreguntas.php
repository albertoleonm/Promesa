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
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card-users">
            <center><h3><i class="far fa-question-circle"></i> Agregar preguntas</h3></center>
            <br>
            <center><span id="error" class="errorC"></span></center>
            <br>
            <br>
                <form method="post" action="../modify_Preguntas" >
                    <?php foreach($verPregunta as $questionM){ ?>
                        <label for="pregunta">Pregunta </label>
                        <input type="text" name="pregunta" maxlength="100" value="<?=$questionM->nombrePregunta;?>" id="pregunta"  class="form-control input">
                        <br>
                        <label for="respuesta">Respuesta</label>
                        <textarea name="respuesta" id="respuesta" maxlength="300" class="form-control input" cols="10" rows="3"><?=$questionM->respuesta;?></textarea>
                        <br>
                        <input type="hidden" name="idUsuario" value="<?=$this->session->userdata('idUsuario')?>">
                        <input type="hidden" name="idPregunta" value="<?=$questionM->idPregunta;?>">
                        <br>
                        <center><button class="btn add-users" onclick="return validarPreguntas();">Modificar pregunta </button></center>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function validarPreguntas(){
        var pregunta = document.getElementById('pregunta').value;
        var respuesta = document.getElementById('respuesta').value;
        if(pregunta == '' || respuesta == ''){
            document.getElementById('error').innerHTML = '<i class="fas fa-times"></i> Para modificar la pregunta tienes que llenar todos los campos.';
            return false;
        }else{
            return true;
        }
    }
</script>
