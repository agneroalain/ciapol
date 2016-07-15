<?php
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=bd_ciapol', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
        }
    catch(PDOExeption $e)
        {
            die('Erreur : '.$e->getMessage());
        }
?>