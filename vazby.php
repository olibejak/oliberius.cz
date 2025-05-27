<!DOCTYPE html>
<html lang=cs>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css?n=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    <?php 
      if($_GET["p"] == null){
        echo '<script src="js/vazby_config.js?n=9"></script>';
	echo '<title>Smuteční kytice</title>';}
      if($_GET["p"] == 'darkove'){
        echo '<script src="js/vazby_config_darkove.js?n=3"></script>';
	echo '<title>Dárkové kytice</title>';}
      if($_GET["p"] == 'vence'){
        echo '<script src="js/vazby_config_vence.js?n=3"></script>';
	echo '<title>Smuteční věnce</title>';}
      if($_GET["p"] == 'rakvove'){
        echo '<script src="js/vazby_config_rakvove.js?n=7"></script>';
	echo '<title>Rakvové kytice</title>';}
    ?>
    <script src="js/vazby.js?n=3"></script>
    <link rel="icon" href="img/bunch_icon.png" type="image/icon">
  </head>
  <body>
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <a class="navbar-brand" href="index.php">Zahradnictví<br/>Oliberius</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" >
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">O NÁS</a></li>
            <li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">VAZBY</a>				
				<div class="dropdown-menu">
					<a class="dropdown-item" href="vazby.php">Smuteční kytice</a>
					<a class="dropdown-item" href="vazby.php?p=rakvove">Rakvové kytice</a>
					<a class="dropdown-item" href="vazby.php?p=vence">Smuteční věnce</a>
					<a class="dropdown-item" href="vazby.php?p=darkove">Dárkové kytice</a>
				</div>
			  </li>
            <li class="nav-item"><a class="nav-link" href="prodejna.html">PRODEJNA</a></li>
            <li class="nav-item"><a class="nav-link" href="sluzby.html">SLUŽBY</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <main role="main" class="container">
      <?php
        if($_GET["p"] == null){
          echo '<h1 class="mt-5">Smuteční kytice</h1><br>';}
        if($_GET["p"] == 'darkove'){
          echo '<h1 class="mt-5">Dárkové kytice</h1><br>';}
        if($_GET["p"] == 'vence'){
          echo '<h1 class="mt-5">Smuteční věnce</h1><br>';}
        if($_GET["p"] == 'rakvove'){
          echo '<h1 class="mt-5">Rakvové kytice</h1><br>';}
      ?>
      <button onclick="topFunction()" id="backupthepage"><i class="fas fa-arrow-up"></i></button>
    </main>

    <footer class="footer">     
			<div class="row text-center justify-content-center d-flex bg-light">
				<span class="text-muted col-lg-3"><i class="fas fa-phone"></i> +420 326 324 145</span>
				<span class="text-muted col-lg-3"><i class="fas fa-at"></i> oliberius@oliberius.cz</span>
				<span class="text-muted col-lg-3"><b>PO-PÁ:</b> 8.00-12.00, 13.00-16.00</span>
			</div>  
    </footer>
  </body>
</html>
