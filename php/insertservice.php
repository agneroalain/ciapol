<?php
        session_start();
        include('../include/connectdb.php');
        $lib_ser = $_POST['lib_ser'];
        $cod_dir = $_POST['cod_dir'];
        $requete = $bdd->prepare('INSERT INTO service(lib_ser, cod_dir) VALUES (?, ?)');
        $requete->execute(array($lib_ser,$cod_dir));
        header('location:../interface.php'); 
?>