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
     <title>PLOT - CESR | Nous contacter</title>
     
     <style>
            body {
                text-align: justify;
            }

      
          @media (min-width: 992px) {

            /* .container-fluid .row {
              padding-left: 10%;
            } */

            .formulaire {
                padding-top: 15px;
                padding-left:80px;
                padding-right:50px;
            }

            .container-fluid .row div:first-child {
              max-width:600px;
              /* margin-right:50px; */
            }

            .container-fluid .row div:first-child p {
              padding-top: 15px;
            }
          }
          .form-control {
            border:none;
            box-shadow: none;
            border-radius:0;}

          .form-group {
            max-width: 500px;
            border:none;
          }
          .form-group input, .form-group textarea {
            appearance: none;
            border-style: solid;
            border-color: black;
            border-width: 0 0 1px 0;
            background: transparent;
            padding: 5px;
            max-width:500px;
            font-size: inherit;
            outline: none;

           }

           input[type='submit'] {
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
          <a href="index.html" class="navbar-brand"><img src="images/logos/logo_plot_couleur_recadre.png" alt="logo de PLOT"></img></a>
        </div>
        
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav" role="navigation">
              <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
              <li class="nav-item"><a class="nav-link" href="carte.html">Carte</a></li>
              <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-toggle="dropdown" href="legende.html">Légendes<span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="textes.php" class="nav-link">Textes</a></li>
                  <li><a href="audios.php" class="nav-link">Audios</a></li>
                  <li><a href="bddicono.php" class="nav-link">Base de données iconographiques</a></li>
                  <li><a href="acces.php" class="nav-link">Accès thématiques</a></li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a class="dropdown-toggle active" data-toggle="dropdown" href="#">A propos<span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="sources.html" class="nav-link">Sources</a></li>
                  <li><a href="leprojet.html" class="nav-link">Le projet</a></li>
                  <li><a href="contact.php" class="nav-link active">Nous contacter</a></li>
                </ul>
              </li>          
            </ul>
        </div>
      </div>
    </div>
    
    
    <div class="container-fluid">

        <div class="fil_ariane">
            <p><a href="index.html">PLOT</a> > <a href="#">A propos</a> > <a href="contact.php">Nous contacter</a></p>
        </div>

        <div class="row">
        <div class="col-md-6">
        <h1>Nous contacter</h1>
          <p>Vous avez aperçu une erreur ? Vous avez une légende à nous proposer ? Quelqu'en soit la raison, n'hésitez pas à nous envoyer un message via ce formulaire de contact. Notre équipe vous répondra au plus vite ! </p>
        </div>

        <div class="formulaire col-md-6">
            <h3>Formulaire de contact</h3>
            <form method="post">
            <div class="form-group">
                <label for="nameInput">Nom</label>
                <input type="text" name="name" class="form-control" id="nameInput" placeholder="Votre nom">
            </div>
            <div class="form-group">
                <label for="firstnameInput">Prénom</label>
                <input type="text" name="firstName" class="form-control" id="firstnameInput" placeholder="Votre prénom">
            </div>
            <div class="form-group">
                <label for="emailInput">Adresse mail</label>
                <input type="email" name="email" class="form-control" id="emailInput" placeholder="name@exemple.com">
            </div>
            <div class="form-group">
                <label for="textInput">Message</label>
                <textarea name="message" class="form-control" id="textInput" rows="3" placeholder="Votre message"></textarea>
            </div>
                <input type="submit">
            </form>
            <?php
                if (isset($_POST['message'])) {
                    $position_arobase = strpos($_POST['email'], '@');
                    if ($position_arobase === false)
                        echo '<p>Votre email doit comporter un arobase.</p>';
                    else {
                        // $retour = mail('jules@free.fr', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['email']);
                        // if($retour)
                        //     echo '<p>Votre message a été envoyé.</p>';
                        // else
                        //     echo '<p>Erreur.</p>';
                        echo "<p>Votre message a bien été envoyé.</p>";
                    }
                }
    ?>

        </div> <!-- div formulaire -->
              </div> <!-- div row -->
           

        </div> <!-- div container fluid -->


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