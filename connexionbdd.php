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

