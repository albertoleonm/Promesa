<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$title;?></title>
  <link rel="shortcut icon" type="image/ico" href="<?=base_url();?>images/favicon.ico"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?=base_url();?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?=base_url();?>/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?=base_url();?>/css/style.css" rel="stylesheet">
</head>

<body>
<header>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark primary-color">

  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="<?=base_url();?>">PROMESA</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <i style="color: red;" class="fas fa-ellipsis-v"></i>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url();?>">Inicio
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url();?>Productos">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url();?>Nosotros">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url();?>Preguntas">Preguntas Frecuentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="<?=base_url();?>Contacto">Contacto</a>
        </li>
      </ul>
      <!-- Links -->
    </div>
    <!-- Collapsible content -->
  </div>

  </nav>
  <!--/.Navbar-->
</header>
