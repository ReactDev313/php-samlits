<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "config.php";
foreach (glob("Framework/*.php") as $filename)
{
    require_once $filename;
}
foreach (glob("Controller/*.php") as $filename)
{
    require_once $filename;
}

require_once "Model/ModelInterface.php";
require_once "Model/Model.php";
require_once "Model/User.php";

session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    
    <title>
        SamplitsApp Pricing
    </title>
	
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

      <!-- Custom styles for this template -->
</head>
<body class="">

    <?php

        \SamplitsApp\DbConnection::getInstance()->connect($db_host, $db_name, $db_user, $db_password);

        if(isset($_SESSION["error"])) {
    ?>
        <div class="error-message"><?php echo $_SESSION["error"]; ?></div>
    <?php 
        unset($_SESSION["error"]); 
        }
        echo(\SamplitsApp\Router::routeTo($_SERVER['REQUEST_URI']));
    ?>

<!-- Bootstrap core JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</body>

</html>