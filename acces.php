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
  	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
       <title>PLOT - CESR | Accès thématiques</title>
       
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
          <a href="index.html" class="navbar-brand">PLOT</a>
        </div>
        
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav" role="navigation">
              <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
              <li class="nav-item"><a class="nav-link" href="carte.html">Carte</a></li>
              <li class="dropdown nav-item">
                <a class="dropdown-toggle active" data-toggle="dropdown" href="legende.html">Légendes<span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="#" class="nav-link active">Textes</a></li>
                  <li><a href="#" class="nav-link">Audios</a></li>
                  <li><a href="#" class="nav-link">Base de données iconographiques</a></li>
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
        <h1>Accès thématiques</h1>
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
    <p>Par lieu : </p>
    <form method="post" action="cible_requete.php">
    
    <p>
    <select name="lieu">
        <?php
            $lieux = $bdd->query('SELECT * from lieu');
            while ($donnees = $lieux->fetch()) {
                echo "<option value=".$donnees['id_lieu'].">".$donnees['nom']."</option>";
            }
        ?>
    </select>
    <input type="submit" name="valider" value="OK"/>
    </p>
    </form>

    <p>Par personnage : </p>
    <form method="post" action="cible_requete.php">
    
    <p>
    <select name="personnage">
        <?php
            $personnages = $bdd->query('SELECT * from personnage');
            while ($donnees = $personnages->fetch()) {
                echo "<option value=".$donnees['id_perso'].">".$donnees['nom']."</option>";
            }
        ?>
    </select>
    <input type="submit" name="valider" value="OK"/>
    </p>
    </form>
    



    
     
    



      <footer class="row">
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