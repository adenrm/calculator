<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css"
        rel="stylesheet"
        />
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#323bae;">
    <!-- Container wrapper -->
    <div class="container-fluid">
  
      <!-- Navbar brand -->
      <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo" style="width: 50px;">  Project Kalkulator</a>
  
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  
          <!-- Link -->
          <li class="nav-item">
            <a class="nav-link btn" href="index.html"><i class="bi bi-house"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn active" href="#"><img src="img/logo-js.png" alt="JS" width="20px"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="kalkulator.php"><img src="img/logo-php.png" alt="PHP" width="25px"></a>
          </li>
  
        </ul>
  
        <!-- Icons -->
        <ul class="navbar-nav d-flex flex-row me-1">
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" target="_blank" href="https://wa.me/6282159571001/"><i class="bi bi-whatsapp"></i></a>
              </li>
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" target="_blank" href="https://instagram.com/ydznq/"><i class="bi bi-instagram"></i></a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="https://github.com/adenrm"><i class="bi bi-github"></i></a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="https://adenrm.github.io/"><i class="bi bi-file-person"></i></a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="info.html"><i class="bi bi-info-lg"></i></a>
          </li>
        </ul>
  
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
<div class="mt-5 container calculator card">

<input type="text" class="calculator-screen z-depth-1" value="" disabled />

<div class="calculator-keys">

  <button  type="button" data-mdb-button-init class="operator btn btn-info" value="+">+</button>
  <button  type="button" data-mdb-button-init class="operator btn btn-info" value="-">-</button>
  <button  type="button" data-mdb-button-init class="operator btn btn-info" value="*">&times;</button>
  <button  type="button" data-mdb-button-init class="operator btn btn-info" value="/">&divide;</button>

  <button  type="button" data-mdb-button-init value="7" data-mdb-ripple-init class="btn btn-light waves-effect">7</button>
  <button  type="button" data-mdb-button-init value="8" data-mdb-ripple-init class="btn btn-light waves-effect">8</button>
  <button  type="button" data-mdb-button-init value="9" data-mdb-ripple-init class="btn btn-light waves-effect">9</button>


  <button  type="button" data-mdb-button-init value="4" data-mdb-ripple-init class="btn btn-light waves-effect">4</button>
  <button  type="button" data-mdb-button-init value="5" data-mdb-ripple-init class="btn btn-light waves-effect">5</button>
  <button  type="button" data-mdb-button-init value="6" data-mdb-ripple-init class="btn btn-light waves-effect">6</button>


  <button  type="button" data-mdb-button-init value="1" data-mdb-ripple-init class="btn btn-light waves-effect">1</button>
  <button  type="button" data-mdb-button-init value="2" data-mdb-ripple-init class="btn btn-light waves-effect">2</button>
  <button  type="button" data-mdb-button-init value="3" data-mdb-ripple-init class="btn btn-light waves-effect">3</button>


  <button  type="button" data-mdb-button-init value="0" data-mdb-ripple-init class="btn btn-light waves-effect">0</button>
  <button  type="button" data-mdb-button-init class="decimal function btn btn-secondary" value=".">.</button>
  <button  type="button" data-mdb-button-init class="all-clear function btn btn-danger btn-sm" value="all-clear">AC</button>

  <button  type="button" data-mdb-button-init class="equal-sign operator btn btn-default" value="=">=</button>

</div>
</div>
<script src="system.js"></script>
</body>
</html>