<html>
  <head>
  <link rel="stylesheet" type="text/css" href="navbarstyle.css">
  <?php include 'head.php'?>
</head>
<!-- Navbar -->
<section id = "nav-bar">
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar-example2">
    <a class="navbar-brand" href="#"><img src = 'img/logo.JPG'><?php session_start(); echo "Hi, " . $_SESSION["name"] . ".<br>";?></a>
    <a class="navbar-brand" href="#">Welcome to Stark Logistics</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="supplieradmin.php">PENDING SUPPLIER REQUESTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="receiveradmin.php">PENDING RECIEVER REQUESTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#ongoing">ON-GOING ORDERS</a>
        </li>
        <li class="nav-item">
          <form action="#" method="post">
            <button type="button" id="sbtn" class="btn btn-info btn-lg" onclick="location.href='index.php'"> LOGOUT </button>
          </form>
          <?php
            if (isset($_POST['logout_button'])) 
            {
              session_start();
              session_destroy(); 
            }
          ?>
        </li>
      </ul>
    </div>
  </nav>
</section>
</html>
