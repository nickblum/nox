<?php
  // Start the session, define some vars for testing
  session_start();
  $_SESSION["servername"] = "localhost";
  $_SESSION["username"] = "testuser";
  $_SESSION["password"] = "testuser12345";
  $_SESSION["dbname"] = "homestead";
?>
<html>
  <head>
    <title>NOX</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/grow-wrap.css">
    <link rel="stylesheet" type="text/css" href="css/topnav.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.tagsinput-revisited.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/nox/js/jquery-3.6.0.min.js"></script>
    <script src="/nox/js/modules.js"></script>
    <script src="/nox/js/settings.js"></script>
    <script src="/nox/js/grub.js"></script>
    <script src="/nox/js/jquery-ui.min.js"></script>
    <script src="/nox/js/jquery.tagsinput-revisited.js"></script>
  </head>
  <body>
    <header>
      <?php include 'private/view/topnav.php'; ?>
    </header>
    <main id="main">
    </main>
  </body>
</html>


