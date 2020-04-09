<?php
  include "inc/include.php";

  $sql = "SELECT can_id, can_num, can_nom, can_url FROM canais";
  //$result = mysqli_query($my_con, $sql);

  $result = pg_query($pg_con, $sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >

    <!-- Favicons -->
<link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<!--<link rel="manifest" href="img/favicons/manifest.json">-->
<link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="img/favicons/favicon.ico">
<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Magno Canais</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <?php
          
            //while($row = mysqli_fetch_array($result)){
            while($row = pg_fetch_row($result)){      
              

              echo '<li class="nav-item" onclick="channel(\''.$row[3].'\')";>';
                echo '<a class="nav-link" href="#">';
                  echo '<span data-feather="home"></span>';
                  echo $row[2];
                echo '</a>';
              echo '</li>';
            }
          ?>
        </ul>
      </div>
    </nav>

            <div id="tela" crossorigin="anonymous"></div>
  </div>
</div>
<script src="js/jquery-3.4.1.slim.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/jquery.slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js"></script>
      </body>
</html>
<script>
  function channel(url) {
    window.location.href = url;
  }
</script>