<!DOCTYPE html>

<html lang="fr">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS     
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> --> 
    <link rel="stylesheet" type="text/css" href="css/general.css">
  	<link rel="stylesheet" type="text/css" href="css/legendes_apropos.css">
       <title>PLOT - CESR | Base de données iconographique</title>

       <style>
.img-thumbnail, .caption {
    height: 150px;
    width:auto;
  }

.modal-content img {
    /* object-fit: cover; */
  }

  /* @media (min-width: 992px) {
    .container-fluid .row {
    padding-left:25%;
  }
} */



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
                  <li><a href="bddicono.php" class="nav-link active">Base de données iconographiques</a></li>
                  <li><a href="acces.php" class="nav-link">Accès thématiques</a></li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">A propos<span class="caret"></span> </a>
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
            <p><a href="index.html">PLOT</a> > <a href="legende.html">Légendes</a> > <a href="bddicono.php">Base de données iconographique</a></p>
        </div>

    <header>
        <h1>Base de données iconographique</h1>
    </header>

     <?php 
     
    include_once "connexionbdd.php";

    $legendes = $bdd->query('SELECT DISTINCT id_lieu, nom from lieu, imgassocierlieu WHERE fk_idLieu = id_lieu');
    //echo "<ul>";
    while ($donnees = $legendes->fetch()) {
        $legendes_bis = $bdd->query('SELECT DISTINCT id_img, url_img, desc_img from lieu, image, imgassocierlieu WHERE fk_idLieu ='.$donnees['id_lieu'].' AND fk_idImg = id_img');
        if ($legendes_bis->rowCount() != 0) {
          echo "<h3>".$donnees['nom']."</h3>";
            echo "<div class='row'>";
            while($images = $legendes_bis->fetch()) {
                echo "<div class='col-md-3'>";
                echo "<a data-toggle='modal' data-target='#".$images['id_img']."'><img src='".$images['url_img']."' class='img-responsive img-thumbnail'></img></a>";
                echo "<div id='".$images['id_img']."' class='modal fade' role='dialog'>";
                echo '<div class="modal-dialog">';
                echo  '<div class="modal-content">';
                echo '<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                    <div class="modal-body">';
                echo "<img src='".$images['url_img']."' class='img-responsive'></img>";
                echo'<p>'.$images['desc_img'].'</p>';
                echo '</div></div></div></div></div>';
            }
            echo "</div>";

        }

        //echo "<li><a href=".$donnees['url_img'].">".$donnees['nom']."</a></li>";
    }
    //echo "</ul>";
     
     ?>

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
                <a href="https://cesr.cnrs.fr/"><img src="images/logos/logo_cesr.gif" class="img-responsive" alt="Logo du CESR"/></a>
            </div>
            <div class="col-md-3 logo-footer">
              <a href="https://www.univ-tours.fr/"><img src="images/logos/logo_univ_tours.png" class="img-responsive" alt="Logo de l'Université de Tours" /></a>
            </div>
          </div>
        </div>
      </footer>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.4.1.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
  </body>

</html>