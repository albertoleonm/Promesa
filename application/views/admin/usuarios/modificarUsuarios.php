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
    <div class="col-lg-12">
        <div class="card-users">
            <?php foreach($modifyUser as $modify) {?>
                <center><h3><i class="fas fa-user-edit"></i> Modificar Administrador</h3></center>
                <br>
                <center><span id="error" class="errorC"></span></center>
                <br>
                <br>
                <Form method="post" action="../modificar_Usuarios">
                <input type="hidden" name="idUsuario" value="<?=$modify->idUsuario;?>">
                <label for="usuario">Nombre usuario:</label>
                <input class="form-control inputs" value="<?=$modify->nombre;?>" maxlength="50" type="text" name="usuario" id="usuario">
                <br>
                <label for="contrasena">Contraseña:</label>
                <input class="form-control inputs" value="<?=$modify->contrasena;?>" maxlength="150" type="password" name="contrasena" id="contrasena">
                <br>
                <label for="clave">Clave usuario:</label>
                <input class="form-control inputs" value="<?=$modify->clave;?>" maxlength="10" type="text" name="clave" id="clave">
                <br>
                <center><button type="submit" class="btn add-users" onclick="return validarUser();">Modificar administrador</button></center>
            </Form>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function validarUser(){
        var name = document.getElementById('usuario').value;
        var pass = document.getElementById('contrasena').value;
        var clave = document.getElementById('clave').value;
        if(name == '' || pass == '' || clave == ''){
            document.getElementById('error').innerHTML = '<i class="fas fa-user-times"></i> Todos los campos tienen que estar llenos para modificar';
            return false;
        }else{
            return true;
        }
    }
</script>
