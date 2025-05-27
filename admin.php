<?php
    session_start();
    require("admin.service.php"); // soubor zpracovávající poslané údaje    
    $error = "";
    if(!isset($_SESSION["user"])){ // přesměrování nepřihlášeného uživatele
        header("location: login.php");
        exit();
    }

    if(isset($_GET["logout"])){ // odhlášení uživatele
        unset($_SESSION["user"]);
        header("location: login.php");
        exit();
    }

    if (isset($_POST) && !empty($_POST)) { // validace CSRF tokenu
      if ($_POST["csrfToken"] != $_SESSION["csrfToken"]) {
          $error = "Neplatný CSRF token.";
      }
      else {
        if (isset($_POST["save"])) { // poslání seznamu uživatelů k uložení
          $save = new Aktuality(
            $_POST["id"],
            htmlspecialchars($_POST["nadpis"]),
            htmlspecialchars($_POST["obsah"])
          );
      }
      if (isset($_POST["delete"])) {
        $delete = new Odstranit(
          $_POST["id"]
        );
      }
      if (isset($_POST["new"])) {
        $new = new NovaAktualita();
      }
    }
  }


    $storage = "aktuality.json";

    $token = md5(uniqid(rand(), true)); // CSRF token
    $_SESSION["csrfToken"] = $token;
?>
<!DOCTYPE html>
<html lang=cs>
  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="img/bunch_icon.png" type="image/icon">
  </head>
  <body>
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <a class="navbar-brand" href="#">Zahradnictví<br/>Oliberius</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" >
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">O NÁS</a></li>
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

    <main role="main" class="container" style="margin-top:40px">
	<p>
	    <h4>Alíkovy vtipy pro lepší den</h4>
	    <h6 style="font-family:Comic Sans MS, cursive;"><a data-alik href="https://www.alik.cz/v"></a></h6>
    	    <script src="https://www.alik.cz/v/js?nahodne" async></script>
	</p>
      <?php
            if (file_exists($storage)) {
              $aktuality = json_decode(file_get_contents($storage));
              foreach($aktuality as $aktualita){
                  echo '<form class="admin" name="edit" action="admin.php" method="post">';
                  echo '<input type="hidden" name="csrfToken" value="';
                  echo $token;
                  echo '">';
                  echo "<input name='id' type='hidden' value='"; 
                  echo $aktualita -> id;
                  echo "'>";
                  echo '<label for="nadpis">Nadpis:</label><br><textarea name="nadpis" id="nadpis">';
                  echo $aktualita -> nadpis;
                  echo "</textarea><br>";
                  echo '<label for="obsah">Obsah:</label><br><textarea name="obsah" id="obsah">';
                  echo $aktualita -> obsah;
                  echo "</textarea><br>";
                  echo '<input name="save" class="serviceButton" value="Uložit" type="submit">';
                  echo '<input name="delete" class="serviceButton" value="Odstranit" type="submit">';
                  echo '</form>';
              }
            }

            else {
                echo "JSON nenalezen, kontaktujte správce";
            }?>
        <form class="new" action="admin.php" method="post">
            <input type="hidden" name="csrfToken" value="<?php echo $token ?>">
            <input name="new" class="serviceButton" value="Nová aktualita" type="submit">
        </form>
        <p><?php echo $error; echo @$new->error; echo @$delete->error; echo @$save->error;?></p>
        <a class="serviceButton" href="?logout" style="margin-bottom:20px">Odhlásit</a>
	</main>
  
  <footer class="footer">     
    <div class="row text-center justify-content-center d-flex bg-light">
				<span class="text-muted col-lg-3"><i class="fas fa-phone"></i>+420 326 324 145</span>
				<span class="text-muted col-lg-3"><i class="fas fa-at"></i><a class="mail" href="mailto:oliberius@oliberius.cz" style="text-decoration:none">oliberius@oliberius.cz</a></span>
				<span class="text-muted col-lg-3"><b>PO-PÁ:</b> 8.00-12.00, 13.00-16.00</span>
			</div>  
    </footer>
  </body>
</html>