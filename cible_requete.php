<!DOCTYPE html>

<html lang="fr">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS     
  	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> --> 
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" type="text/css" href="css/general.css">

       <title>PLOT - CESR | Résultat de la recherche</title>
       
       <style>
           
        div.container-fluid {
            margin-top:50px;
        }

        aside {
            border-right:1px solid lightgray;
        }

        section {
            text-align: justify;
        }

        footer {
            margin-top:150px;
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
          <a href="index.html" class="navbar-brand"><img src="images/logos/logo_plot_couleur_recadre.png" alt="logo de PLOT"></img></a>
        </div>
        
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav" role="navigation">
              <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
              <li class="nav-item"><a class="nav-link" href="carte.html">Carte</a></li>
              <li class="dropdown nav-item">
                <a class="dropdown-toggle active" data-toggle="dropdown" href="legende.html">Légendes<span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="textes.php" class="nav-link">Textes</a></li>
                  <li><a href="audios.php" class="nav-link">Audios</a></li>
                  <li><a href="#" class="nav-link">Base de données iconographiques</a></li>
                  <li><a href="acces.php" class="nav-link active">Accès thématiques</a></li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">A propos<span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="#" class="nav-link">Sources</a></li>
                  <li><a href="#" class="nav-link">Le projet</a></li>
                  <li><a href="#" class="nav-link">Contact</a></li>
                </ul>
              </li>          
            </ul>
        </div>
      </div>
    </div>
    

    <div class="container-fluid">

    <header>
        <h1>Résultat de la recherche</h1>
    </header>


     <?php 
     
    define('HOST', "db4free.net");
    define('BDD', "plot_test");
    define('PORT', "3306");
    define('USER', 'plotcesr');
    define('PASSWORD', 'CESR2020');

    try
    {
        $bdd = new PDO('mysql:host='.HOST.';dbname='.BDD.';port='.PORT, USER, PASSWORD);
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    ?>

    <?php 
    
    if (isset($_POST['lieu'])) {
        $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, legendementionnerlieu
        WHERE ' .$_POST['lieu']. '= fk_idLieuPrincipal OR (' .$_POST['lieu'].' = fk_idLieuSecondaire AND fk_idLeg = id_leg)';
    }
    else if (isset($_POST['personnage'])) {
      $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, possederpersonnage
      WHERE ' .$_POST['personnage']. '= fk_idPerso AND fk_idLeg = id_leg';
    }
    else if(isset($_GET['personnage_id']))
    {
      $string = htmlspecialchars($_GET['personnage_id']);
      $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, possederpersonnage, personnage
      WHERE "' .$string. '"= id_persotei AND fk_idPerso = id_perso AND fk_idLeg = id_leg';
    }
    else if(isset($_POST['motcle'])) {
      $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, motcle, descriptionmotcle
      WHERE '.$_POST['motcle'].'=fk_idMC AND fk_idLeg = id_leg';
    }
    else if(isset($_POST['categorie'])) {
      $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, categorie, appartenancecategorie
      WHERE '.$_POST['categorie'].'=fk_idCat AND fk_idLeg = id_leg';
    }    
    ?>
    
        <?php
            $legendes = $bdd->prepare($query);
            $legendes->execute();
          
              if ($legendes->rowCount() == 0) {
                  echo "Aucun résultat ne correspond à la recherche.";
              }
              else {
                  echo "Résultat correspondant à la recherche :";
                  echo "<ul>";
                  while ($donnees = $legendes->fetch()) {
                      // $posSlash = strpos($donnees['url_texte_simple'], '/');
                      // $posSlash = $posSlash+1;
                      // $subStringUrl = substr($donnees['url_texte_simple'], $posSlash);

                      echo "<li><a href=".$donnees['url_texte_simple'].">" . $donnees['titre'] . "</a></li>";
                  }
                  echo "</ul>";
              }
                      
                

        ?>
    </p>
        



    
     
    



      <footer class="row navbar-fixed-bottom">
        <div class="col-md-6">
        <p>
          <a href="#" class="underline--magical">Sources</a><br/>
          <a href="#">Nous contacter</a><br/>
          Mentions légales -- Centre d'Etudes Supérieures de la Renaissance -- 2020
        </p>
      </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-offset-6 col-md-3 logo-footer">
              <img src="images/logos/logo_cesr.gif" class="img-responsive" alt="Logo du CESR"/>
            </div>
            <div class="col-md-3 logo-footer">
              <img src="images/logos/logo_univ_tours.png" class="img-responsive" alt="Logo de l'Université de Tours" />
            </div>
          </div>
        </div>
      </footer>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.4.1.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
  </body>

</html>