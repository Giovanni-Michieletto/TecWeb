<?php
   $session = $_GET['session'];
   if ($session!=true) {
      header('Location: login.html',TRUE);
   }
?>
<!DOCTYPE html>
<html lang="it">
   <head>
      <link rel="stylesheet" href="./css/desktop.css">
      
      <title>Convento S. Maria del Cengio</title>
   </head>

<body>
   
   <div id="container">

      <!-- === HEADER === -->
      <header>
         <a href="./conventoPHP.php">
               <img src="./db/img/logo-small.png" alt="">
         </a>
      </header>
      
      <!-- === MENU === -->
      <div id="menu"> 
         <ul class="links">
            <li class="notlink">Home</li>
            <li><a href="view.php?session=true&table=Articoli">Articoli</a></li> 
            <li><a href="view.php?session=true&table=Associazioni">Associazioni</a></li>
            <li><a href="view.php?session=true&table=Commenti">Commenti</a></li>
            <li><a href="view.php?session=true&table=Notizie">Notizie</a></li>
            <li><a href="Storia.html">Storia</a></li>
         </ul> 
      </div>

      <!-- === PERCORSO === -->
      <div id="percorso">
         <span id="space">
            <p>Ti trovi in: <span xml:lang="en">Home</span></p>
         </span>
      </div>
      <div id="cerca">
         <label for="s" class="hide" >Cerca sul sito</label>
         <input type="search" id="s"  name="s" placeholder="Cosa cerchi?" src="../db/img/lente.png">
         <input type="submit" id="sub" name="sub" value="Cerca">      
      </div>

      <!-- ====ADMIN==== -->

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
   </div>
      <!--  === FOOTER === -->

      <footer>
         <h2>footer</h2>
      </footer>

   </body>
</html>