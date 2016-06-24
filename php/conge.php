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
                // $requete = $bdd->prepare('INSERT INTO demande (type_dem, dat_deb_dem, dat_fin_dem, lib_dem, mat_emp, mat_int, dat_dem, etat_dem) VALUES (?, ?, ?, ?, ?, ?, ?,?)');
                // $requete->execute(array('CONGE', $dat_dep_cong,$dat_fin_cong,$obs_cong,$mat_emp,$cong_int,$dat_cong,$etat));
                 
$header = "MIME-Version: 1.0\r\n";
$header.='From:"Ciapol.com"<agneroalainphoto@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="utf-8'."\n";
$header.='Content-Transfert-Enconding: 8bit'; 
// Le message
$message = "ceci \r\n est \r\n un mail";

// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Envoi du mail
if( $test = mail('agneroalainphoto@gmail.com', 'valide', $message,$header)){
        echo "mail envoyé";
}
else {
        echo "erreur dans l'envoi du mail !";
        var_dump($test);
}
// header('location:../interface.php');
        }
        
?>