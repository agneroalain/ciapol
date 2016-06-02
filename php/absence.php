<?php
        session_start();
        include('../include/connectdb.php');
        $dat_dep_abs = $_POST['dat_dep_abs'];
        $dat_fin_abs = $_POST['dat_fin_abs'];
        $obs_abs = $_POST['obs_abs'];
        $mat_emp = $_SESSION['mat_emp'];
        $abs_int = $_POST['absint'];
        $etat = 0;
        $dat_abs = '2016-05-03';// recuperer la date d'aujourd'hui
        $requete = $bdd->prepare('INSERT INTO demande (type_dem, dat_dem, dat_deb_dem, dat_fin_dem, mat_emp, mat_int, lib_dem, etat_dem) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $requete->execute(array('ABSENCE', $dat_abs,$dat_dep_abs,$dat_fin_abs,$mat_emp,$abs_int,$obs_abs,$etat));
        header('location:../interface.php'); 
?>