<?php
require './_app/Config.inc.php';

if ($_POST) {
  $_SESSION['post_data'] = $_POST;
}

$ja = 0;

if ($Url[0] == "index") {
  $title = "Index";
  $ja = 1;
} else if ($Url[0] == "login") {
  $title = "Login";
  $ja = 1;
} else if ($Url[0] == "criarconta") {
  $title = "Criar Conta";
  $ja = 1;
}else {
  $title = $Url[0];
}

?>


<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title><?= ucwords($title) ?> | GOGON</title>

  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="img/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <!-- loader  -->


  <?php
  ///Menu
  require REQUIRE_PATH . "/inc/menu.php";

  ///CONTEÚDO
  $Url[1] = (empty($Url[1]) ? HOME : $Url[1]);
  if (file_exists(REQUIRE_PATH . '/' . $Url[0] . '.php')):
    require REQUIRE_PATH . '/' . $Url[0] . '.php';
  else:
    if (file_exists(REQUIRE_PATH .'/'.'montarComputador'.'/' . $Url[0] . '.php')):
      require REQUIRE_PATH .'/'.'montarComputador'.'/' . $Url[0] . '.php';
    else:
      require REQUIRE_PATH . '/404.php';
    endif;
  endif;
  ///footer
  require REQUIRE_PATH . "/inc/footer.php";

  ?>

  <!-- Javascript files-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <!-- sidebar -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>

  
</body>

</html>