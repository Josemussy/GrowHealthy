<html>
  <head>
    <meta charset="UTF-8">
    <title>Growhealthy</title>
    <link rel="icon" type="image/jpg" href="imagens/ghealthy_logo.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/customize.css">
  </head>
  
  <body>
    <?php
    session_start();
    session_destroy();
    header('location: /AcompanhaFit/indexo.php');
    exit();
    ?>
  </body> 
</html> 
    
    
 
