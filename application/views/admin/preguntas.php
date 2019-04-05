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
    <a class="btn add" href="<?=base_url();?>admin/agregarPreguntas"><i class="fas fa-comments"></i> Agregar preguntas</a>
</div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col"><center>Pregunta</center></th>
                        <th scope="col"><center>Respuesta</center></th>
                        <th scope="col"><center>Usuario</center></th>
                        <th scope="col"><center>Publicado</center></th>
                        <th scope="col"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <?php foreach($pregunta as $question){ ?>

                    <tbody>
                        <tr>
                            <th scope="row"><?=$question->nombrePregunta;?></th>
                            <td><?=$question->respuesta;?></td>
                            <td><?=$question->nombre;?></td>
                            <td><center><?php if ($question->publicado ==1){echo '<i class="far fa-check-circle" style="color: green; font-size: 13px;"></i>';}else {
                                echo '<i class="fas fa-times" style="color: red; font-size: 13px;"></i>';
                            }?></center></td>
                            <td>
                                <center>
                                <?php if($question->publicado == 1){echo '<a href="'. base_url() . 'admin/despublicar/' . $question->idPregunta . '" class="btn leido">Despublicar</a>';}
                                else{echo'<a href="'. base_url() . 'admin/publicar/' . $question->idPregunta . '" class="btn leido">Publicar</a>';} ?>
                                <a href="<?=base_url();?>admin/modificarPregunta/<?=$question->idPregunta;?>" class="btn add">Modificar </a>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
