<?php
        session_start();
        include('../include/connectdb.php');
        $dat_dep_cong = $_POST['dat_dep_cong'];
        $dat_fin_cong = $_POST['dat_fin_cong'];
        $obs_cong = $_POST['obs_cong'];
        $mat_emp = $_SESSION['mat_emp'];
        $cong_int = $_POST['congint'];
        $dat_cong = date('Ymd');// recuperer la date d'aujourd'hui
        $etat = 0;
        if(strtotime($dat_dep_cong) >= strtotime($dat_fin_cong)) 
        { 
                header('location:../interface.php?errcong="Verifier la postériorité de vos date de depart et de retour svp !"'); 
        }
        else {
                $requete = $bdd->prepare('INSERT INTO demande (type_dem, dat_deb_dem, dat_fin_dem, lib_dem, mat_emp, mat_int, dat_dem, etat_dem) VALUES (?, ?, ?, ?, ?, ?, ?,?)');
                $requete->execute(array('CONGE', $dat_dep_cong,$dat_fin_cong,$obs_cong,$mat_emp,$cong_int,$dat_cong,$etat));
                header('location:../interface.php'); 
        }
        
?>