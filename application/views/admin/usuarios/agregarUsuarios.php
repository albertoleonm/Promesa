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
            <center><h3><i class="fas fa-users"></i> Agregar administradores </h3></center>
            <br>
            <center><span id="error" class="errorC"></span></center>
            <br>
            <br>
            <Form method="post" action="agregar_Usuarios">
                <label for="usuario">Nombre usuario:</label>
                <input class="form-control inputs" type="text" maxlength="50" name="usuario" id="usuario">
                <br>
                <label for="contrasena">Contraseña:</label>
                <input class="form-control inputs" type="password" maxlength="150" name="contrasena" id="contrasena">
                <br>
                <label for="clave">Clave usuario:</label>
                <input class="form-control inputs" type="text" maxlength="10" name="clave" id="clave">
                <br>
                <center><button type="submit" class="btn add-users" onclick="return validarUser();">Agregar adminitrador</button></center>
            </Form>
        </div>
    </div>
</div>
<script>
    function validarUser(){
        var name = document.getElementById('usuario').value;
        var pass = document.getElementById('contrasena').value;
        var clave = document.getElementById('clave').value;
        if(name == '' || pass == '' || clave == ''){
            document.getElementById('error').innerHTML = '<i class="fas fa-user-times"></i> Todos los campos tienen que estar llenos para el registro.';
            return false;
        }else{
            return true;
        }
    }
</script>
