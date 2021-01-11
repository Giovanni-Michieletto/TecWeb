<?php
   $session = $_GET['session'];
   if ($session!=true) {
      header('Location: login.html',TRUE);
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- fontawesome -->
      <script src="https://kit.fontawesome.com/faf93335fe.js" crossorigin="anonymous"></script>
      <!-- Google font -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">
      <!-- bootstrap -->
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
      <!-- Hamburger CSS -->
      <link rel="stylesheet" href="./css/hamburger.css">
      <!-- my css -->
      <link rel="stylesheet" href="./css/style.css">
      
      <title>Convento S. Maria del Cengio</title>
   </head>

   <body>
   
      <!-- === HEADER === -->

      <header id="primary-header" class="header-class">
         <span id="logo" class="margin-10"><a href="./conventoPHP.php"><img src="./db/img/logo-small.svg" alt=""></a></span>
      </header>


      <!-- ================= -->
      <!-- === MAIN AREA === -->
      <!-- ================= -->

      <div id="spacer-top"></div>


      <!-- ====NOTIZIE CONVENTO==== -->

      <div id="starter" class="container margin-10">
         <div class="container-home-amministratore">
            <div class="title-a">
               <img src="./db/img/deco.svg" alt="">
               <h2><a href="./nuovoNotiziaForm.html">Aggiungi Notizia</a></h2>
            </div>
            <div class="title-a">
               <img src="./db/img/deco.svg" alt="">
               <h2><a href="./nuovoCommentoForm.html">Aggiungi Commento</a></h2>
            </div>
            <div class="title-a">
               <img src="./db/img/deco.svg" alt="">
               <h2><a href="./nuovoArticoloForm.html">Aggiungi Articolo</a></h2>
            </div>
            <div class="title-a">
               <img src="./db/img/deco.svg" alt="">
               <h2><a href="./nuovoVideoForm.html">Aggiungi Video</a></h2>
            </div>
            <div class="title-a">
               <img src="./db/img/deco.svg" alt="">
               <h2><a href="./nuovoAssociazioniForm.html">Aggiungi Associazione</a></h2>
            </div>
         </div>
      </div>


      <!--  === FOOTER === -->

      <footer>
         <h2>footer</h2>
      </footer>

   </body>
</html>