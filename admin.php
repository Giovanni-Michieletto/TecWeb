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
               <h2>Notizie</h2>
               <ul>
                  <li><a href="./buildForm.php?session=true&table=Notizie">Nuova</a></li>
                  <li><a href="./view.php?session=modifica&table=Notizie">Modifica</a></li>
                  <li><a href="./view.php?session=elimina&table=Notizie">Elimina</a></li>
               </ul>
            </div>
            <div class="title-a">
               <h2>Commenti</h2>
               <ul>
                  <li><a href="./buildForm.php?session=true&table=Commenti">Nuovo</a></li>
                  <li><a href="./view.php?session=modifica&table=Commenti">Modifica</a></li>
                  <li><a href="./view.php?session=elimina&table=Commenti">Elimina</a></li>
               </ul>
            </div>
            <div class="title-a">
               <h2>Articoli</h2>
               <ul>
                  <li><a href="./buildForm.php?session=true&table=Articoli">Nuovo</a></li>
                  <li><a href="./view.php?session=modifica&table=Articoli">Modifica</a></li>
                  <li><a href="./view.php?session=elimina&table=Articoli">Elimina</a></li>
               </ul>
            </div>
            <div class="title-a">
               <h2>Associazioni</h2>
               <ul>
                  <li><a href="./buildForm.php?session=true&table=Associazioni">Nuova</a></li>
                  <li><a href="./view.php?session=modifica&table=Associazioni">Modifica</a></li>
                  <li><a href="./view.php?session=elimina&table=Associazioni">Elimina</a></li>
               </ul>
            </div>
         </div>
      </div>


      <!--  === FOOTER === -->

      <footer>
         <h2>footer</h2>
      </footer>

   </body>
</html>