<?php
  $storage = "aktuality.json";
  $aktuality = file_get_contents($storage);
  $aktualityDecode = json_decode($aktuality);
?>
<!DOCTYPE html>
<html lang=cs>
  <head>
    <title>O nás</title>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" contetnt="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css?id=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
            <li class="nav-item active"><a class="nav-link" href="index.php">O NÁS</a></li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">VAZBY</a>				
				<div class="dropdown-menu">
					<a class="dropdown-item" href="vazby.php">Smuteční kytice</a>
					<a class="dropdown-item" href="vazby.php?p=rakvove">Rakvové kytice</a>
					<a class="dropdown-item" href="vazby.php?p=vence">Smuteční věnce</a>
					<a class="dropdown-item" href="vazby.php?p=darkove">Dárkové kytice</a>
				</div>
			  </li>
            <li class="nav-item"><a class="nav-link" href="prodejna.html">PRODEJNA </a></li>
            <li class="nav-item"><a class="nav-link" href="sluzby.html">SLUŽBY</a></li>
          </ul>
        </div>
      </nav>
    </header>
	  <div class="imgContainer">
      <h1>Zahradnictví Oliberius</h1>
      <!-- <span>Zoe Schaffer; unsplash.com</span> -->
	  </div>
    <main role="main" class="container" style='margin-top:-100px'>
	<?php
        if(count($aktualityDecode) != 0){
          echo '<div class="jumbotron" style="margin-bottom: 50px;">
            <p>';
          foreach($aktualityDecode as $aktualita){
            echo "<h1>" . htmlspecialchars($aktualita->nadpis) . "</h1>";
            echo "<h3>" . htmlspecialchars($aktualita->obsah) . "</h3>";
          }
          echo '</p>
          </div>';
        }
    ?>   
	<p class='index'>
		Naše firma se od roku 1991 zabývá zejména výrobou smutečních věnců a kytic, prodejem květin, zahradnickými pracemi, jako např. osazování menších okrasných ploch, jejich údržbou, osazováním a údržbou hrobů v Mladé Boleslavi, výzdobou interiérů na přání a doručováním květin v Mladé Boleslavi a okolí.
	</p>
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