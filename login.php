<?php
    $error = "";
    session_start();
    if(isset($_POST) && !empty($_POST )){
        if($_POST["csrfToken"] != $_SESSION["csrfToken"]){ // validace CSRF tokenu
            $error = "Neplatný CSRF token.";
        }
        else{
            require("admin.service.php"); // soubor zpracovávající poslané údaje

            if(isset($_POST["submit"])){ // posílání username a password
                $user = new LoginUser( 
                    htmlspecialchars($_POST["username"], ENT_QUOTES),
                    htmlspecialchars($_POST["password"], ENT_QUOTES)
                );
            }
        }
    }

    $token = md5(uniqid(rand(), true)); // CSRF token
    $_SESSION["csrfToken"] = $token;
?>
<!DOCTYPE html>
<html lang=cs>
  <head>
    <title>Přihlášení</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" contetnt="no-cache">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css?id=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="img/bunch_icon.png" type="image/icon">
    <style>
        form{
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
            margin-top: 20%;
        }
        form label {
            font-size: 125%;
            margin-bottom: 0;
        }

        form input{
            margin-bottom: 1em;
        }
    </style>
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

    <main>
        <form name="form" action="login.php" method="post">
            <input type="hidden" name="csrfToken" value="<?php echo $token?>">
            <label for="username">Uživatel:</label>
            <input required type="text" id="username" name="username" value=""><br>
            <label for="password">Heslo:</label>
            <input required type="password" id="password" name="password" value=""><br><br>
            <input type="submit" id="submit" name="submit" value="PŘIHLÁSIT">
            <p><?php echo @$user->$error; echo $error ?></p>
        </form>
    </main>
  </body>
</html>