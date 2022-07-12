<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrium Hotel</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </head>
<body style="background-color: #dadada;">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand fst-italic" href="/"><i>Atrium</i><b>Hotel</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active fst-italic" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fst-italic" id="reserva" aria-current="page" href="/reserva">Reserva</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle fst-italic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Saiba mais
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Acomodações</a></li>
                <li><a class="dropdown-item" href="#">Spa</a></li>
                <li><hr class="dropdown-divider"/></li>
                <li><a class="dropdown-item font-weight-bold" href="#">Bistrô</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active fst-italic" href="admin">Administrativo</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link active fst-italic" href="
                <?= isset($_SESSION['name']) ? $router->route('logout') : $router->route('login') ?>
                "><?= isset($_SESSION['name']) ? 'Logout' : 'Login' ?></a>
            </li>
        </ul>
      </div>
    </div>
  </nav>


  

