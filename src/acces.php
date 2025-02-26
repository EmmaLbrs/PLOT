<!DOCTYPE html>

<html lang="fr">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../css/general.css">
    <link rel="stylesheet" type="text/css" href="../css/legendes_apropos.css">

       <title>PLOT - CESR | Accès thématiques</title>
       
       <style>
           
           select {
            appearance: none;
            border-style: solid;
            border-color: black;
            border-width: 0 0 3px 0;
            width:250px;
            background: transparent;
            padding: 5px;
            font-size: inherit;
            outline: none;

           }

           @media (min-width: 991.98px) { 
             
          .main div:first-child,
           .main div:nth-child(2) {
             padding-top:25px;
             padding-bottom:50px;
           }
            }


           input {
             margin-left: 10px;
             border:none;
             background-color: black;
             color:white;
           }




       </style>

  </head>


  <body>

    <div class="navbar navbar-expand-lg navbar-fixed-top navbar-custom" id="myNavbar">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a href="../index.html" class="navbar-brand"><img src="../images/logos/logo_plot_couleur_recadre.png" alt="logo de PLOT"></img></a>
        </div>
        
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav" role="navigation">
              <li class="nav-item"><a class="nav-link" href="../index.html">Accueil</a></li>
              <li class="nav-item"><a class="nav-link" href="carte.html">Carte</a></li>
              <li class="dropdown nav-item">
                <a class="dropdown-toggle active" data-toggle="dropdown" href="legende.html">Légendes<span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="textes.php" class="nav-link">Textes</a></li>
                  <li><a href="audios.php" class="nav-link">Audios</a></li>
                  <li><a href="bddicono.php" class="nav-link">Base de données iconographiques</a></li>
                  <li><a href="acces.php" class="nav-link active">Accès thématiques</a></li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-toggle="dropdown" href="apropos.html">A propos<span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="sources.html" class="nav-link">Sources</a></li>
                  <li><a href="leprojet.html" class="nav-link">Le projet</a></li>
                  <li><a href="contact.php" class="nav-link">Nous contacter</a></li>
                </ul>
              </li>          
            </ul>
        </div>
      </div>
    </div>
    

    <div class="container-fluid">

    <div class="fil_ariane">
            <p><a href="../index.html">PLOT</a> > <a href="legende.html">Légendes</a> > <a href="acces.php">Accès thématiques</a></p>
        </div>

    <header>
        <h1>Accès thématiques</h1>
    </header>


     <?php 
     
     include_once "connexionbdd.php";

    ?>
    <div class="row main">
      <div class="col-md-6"> 
        <p>Par lieu : </p>
        <form method="post" action="cible_requete.php">
        
        <p>
        <select name="lieu">
            <?php
                $lieux = $bdd->query('SELECT * from lieu ORDER BY nom');
                while ($donnees = $lieux->fetch()) {
                    echo "<option value=".$donnees['id_lieu'].">".$donnees['nom']."</option>";
                }
            ?>
        </select>
        <input type="submit" name="valider" value="OK"/>
        </p>
        </form>
      </div>

          <div class="col-md-6">
          <p>Par personnage : </p>
          <form method="post" action="cible_requete.php">
          
          <p>
          <select name="personnage">
              <?php
                  $personnages = $bdd->query('SELECT * from personnage ORDER BY nom');
                  while ($donnees = $personnages->fetch()) {
                      echo "<option value=".$donnees['id_perso'].">".$donnees['nom']."</option>";
                  }
              ?>
          </select>
          <input type="submit" name="valider" value="OK"/>
          </p>
          </form>
          </div>

            <div class="col-md-6">
       <p>Par mot-clé : </p>
    <form method="post" action="cible_requete.php">
    
    <p>
    <select name="motcle">
        <?php
            $motcles = $bdd->query('SELECT * from motcle ORDER BY motcle');
            while ($donnees = $motcles->fetch()) {
                echo "<option value=".$donnees['id_mc'].">".$donnees['motcle']."</option>";
            }
        ?>
    </select>
    <input type="submit" name="valider" value="OK"/>
    </p>
    </form>
          </div>

          <div class="col-md-6">
    <p>Par catégorie : </p>
    <form method="post" action="cible_requete.php">
    
    <p>
    <select name="categorie">
        <?php
            $motcles = $bdd->query('SELECT * from categorie ORDER BY categorie');
            while ($donnees = $motcles->fetch()) {
                echo "<option value=".$donnees['id_cat'].">".$donnees['categorie']."</option>";
            }
        ?>
    </select>
    <input type="submit" name="valider" value="OK"/>
    </p>
    </form>
          </div>

          </div>

    
     
    

          </div>


      <footer class="row">
        <div class="col-md-6">
        <p>
          <a href="sources.html">Sources</a><br/>
          <a href="contact.php">Nous contacter</a><br/>
          Mentions légales -- Centre d'Etudes Supérieures de la Renaissance -- 2020
        </p>
      </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-offset-6 col-md-3 logo-footer">
                <a href="https://cesr.cnrs.fr/"><img src="../images/logos/logo_cesr.gif" class="img-responsive" alt="Logo du CESR"/></a>
            </div>
            <div class="col-md-3 logo-footer">
              <a href="https://www.univ-tours.fr/"><img src="../images/logos/logo_univ_tours.png" class="img-responsive" alt="Logo de l'Université de Tours" /></a>
            </div>
          </div>
        </div>
      </footer>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../bootstrap/js/jquery-3.4.1.js"></script>
	  <script src="../bootstrap/js/bootstrap.min.js"></script>
	
  </body>

</html>