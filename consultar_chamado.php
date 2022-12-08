<?php require_once("php/valida_acesso.php") ?>

<?php
  $profileId = $_SESSION['profileId'];

  $calls = array();
  $archive = fopen('../../app_help_desk/arquivo.hd', 'r');

  while(!feof($archive)) {
    $line = fgets($archive);

    if(!empty($line)) {
      $lineSplitted = explode('#', $line);
      
      if($profileId == 1 || ($profileId == 2 && ($lineSplitted[0] == $_SESSION['id']))) $calls[] = $line;
    }
  }

  fclose($archive);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="./images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="php/logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <!--<div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">Título do chamado...</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Categoria</h6>
                  <p class="card-text">Descrição do chamado...</p>

                </div>
              </div>-->

              <?php

                foreach ($calls as $value) { 
                  $call = explode('#', $value); 
              ?>
                
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $call[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $call[2] ?></h6>
                    <p class="card-text"><?= $call[3] ?></p>
                  </div>
                </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>