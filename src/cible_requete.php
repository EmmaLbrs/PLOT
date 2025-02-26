<!DOCTYPE html>

<html lang="fr">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../css/general.css">
    <link rel="stylesheet" type="text/css" href="../css/legendes_apropos.css">


       <title>PLOT - CESR | Résultat de la recherche</title>

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
            <p><a href="../index.html">PLOT</a> > <a href="legende.html">Légendes</a> > <a href="cible_requete.php">Résultats de la recherche</a></p>
        </div>

    <header>
        <h1>Résultat de la recherche</h1>
    </header>


     <?php 
     
     include_once "connexionbdd.php";
    
    if (isset($_POST['lieu'])) {
        $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, legendementionnerlieu
        WHERE ' .$_POST['lieu']. '= fk_idLieuPrincipal OR (' .$_POST['lieu'].' = fk_idLieuSecondaire AND fk_idLeg = id_leg) ORDER BY titre';
    }
    else if (isset($_POST['personnage'])) {
      $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, possederpersonnage
      WHERE ' .$_POST['personnage']. '= fk_idPerso AND fk_idLeg = id_leg ORDER BY titre';
    }
    else if(isset($_GET['personnage_id']))
    {
      $string = htmlspecialchars($_GET['personnage_id']);
      $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, possederpersonnage, personnage
      WHERE "' .$string. '"= id_persotei AND fk_idPerso = id_perso AND fk_idLeg = id_leg ORDER BY titre';
    }
    else if(isset($_POST['motcle'])) {
      $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, motcle, descriptionmotcle
      WHERE '.$_POST['motcle'].'=fk_idMC AND fk_idLeg = id_leg ORDER BY titre';
    }
    else if(isset($_POST['categorie'])) {
      $query = 'SELECT DISTINCT id_leg, titre, url_texte_simple from legende, categorie, appartenancecategorie
      WHERE '.$_POST['categorie'].'=fk_idCat AND fk_idLeg = id_leg ORDER BY titre';
    }    
    ?>
    
        <?php
            $legendes = $bdd->prepare($query);
            $legendes->execute();
          
              if ($legendes->rowCount() == 0) {
                  echo "<p>Aucun résultat ne correspond à la recherche.</p>";
              }
              else {
                  echo "<p>Résultat correspondant à la recherche :</p>";
                  echo "<ul>";
                  while ($donnees = $legendes->fetch()) {
                      $url_legende =  '../'.$donnees['url_texte_simple'];
                      echo "<li><a href=".$url_legende.">" . $donnees['titre'] . "</a></li>";
                  }
                  echo "</ul>";
              }
                      
                

        ?>
    </p>
        



    
     
    

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