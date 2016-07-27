<?php
        session_start();
        include('../include/connectdb.php');
        $dat_dep_abs = $_POST['dat_dep_abs'];
        $dat_fin_abs = $_POST['dat_fin_abs'];
        $obs_abs = $_POST['obs_abs'];
        $mat_emp = $_SESSION['mat_emp'];
        $abs_int = $_POST['absint'];
        $dat_abs = date('Ymd');// recuperer la date d'aujourd'hui
        $adr = 'null';
        $etat = 0;
        //determinons si le nombre de jours restant est suffisant 
        $reqemp = $bdd -> prepare (" SELECT * FROM employe WHERE mat_emp=?");
        $empinfo = $reqemp->execute(array($_SESSION['mat_emp']));
        $empinfo = $reqemp->fetch();
        $nbJr = $empinfo['sold_cong_emp'];
        if(strtotime($dat_dep_abs) >= strtotime($dat_fin_abs)) 
        { 
                header('location:../interface.php?msgAbs="Verifier la postériorité de vos date de depart et de retour svp !"'); 
        }
        else {
                if($nbJr < 0 ){
                        header('location:../interface.php?msgAbs="Nombre de jours restant insuffisant pour autoriser cette demande"');
                }
                else {
                        $requete = $bdd->prepare('INSERT INTO demande (type_dem, dat_deb_dem, dat_fin_dem, lib_dem, mat_emp, mat_int, dat_dem,adr_cong, etat_dem, sold_cong) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?,?)');
                        $requete->execute(array('ABSENCE', $dat_dep_abs,$dat_fin_abs,$obs_abs,$mat_emp,$abs_int,$dat_abs,$adr,$etat, $nbJr));
                        header('location:../interface.php?msgAbs="Demande d\'absence envoyée"');
                }
        }
?>