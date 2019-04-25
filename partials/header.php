<?php 
  if( session_status() == PHP_SESSION_NONE){
    session_start();
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- css -->
    
    <link href="css/mdb.css" rel="stylesheet">  
    <link href="css/app.css" rel="stylesheet">  
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">       -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="icon" href="../../favicon.ico">    
    <title>Cash manager</title>

    
  <!-- <script src="./js/bootstrap-input-spinner.js"></script> -->
  </head>
  <body>
    <nav class="navbar navbar-inverse my_nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="account.php">Cash Manager</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(isset($_SESSION['auth'])):?>
            <li><a href="logout.php">Se déconnecter</a></a></li>
            <?php endif;?>      
                        
            <?php if(!isset($_SESSION['auth'])):?>
              <li class="active"><a href="index.php" class="active">Se connecter</a></li>
            <?php endif;?>      
            <?php if(isset($_SESSION['auth'])):?>
              <li><a href="#"><?= $_SESSION['auth']['username'];?></a></li>
            <?php endif;?>            
            <li><a href="index.php">Accueil</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
      <?php if(isset($_SESSION['flash']) && !empty($_SESSION['flash'])):?>
        <?php foreach($_SESSION['flash'] as $type => $message):?>
          <div class="alert alert-dismissible alert-<?= $type; ?>" data-dismiss="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $message ; ?>
          </div>                   
        <?php endforeach; ?>      
        <?php unset($_SESSION['flash']) ;?>
      <?php endif; ?>