<?php 
$dec=$_POST[$_GET['cod']];
if(isset($dec) AND !empty($dec))
{
     if($dec == 1){
        $lib_notif = 'Votre demande de congé à été acceptée';
    }
    else{
        $lib_notif = 'Votre demande de congé à été refusée';
    }
    include("../include/connectdb.php");  
    $reqcong = $bdd -> prepare ("SELECT * FROM demande WHERE cod_dem=?");
    $conginfo =  $reqcong -> execute(array($_GET['cod']));
    $conginfo = $reqcong->fetch() ;  
    $updatecong =$bdd->query("UPDATE demande SET etat_dem=$dec WHERE cod_dem=".$_GET['cod']."");
    $updatenotif = $bdd -> prepare("INSERT INTO notification (id_notif, type_notif, lib_notif, etat_notif, mat_emp, cod_dem) VALUES (?, ?, ?, ?, ?, ?) ");
    $updatenotif -> execute ( array(NULL, 'CONGE', $lib_notif, '0', 'A1A1A1', $_GET['cod']));
    header('location:../dashboard.php');
}
else{
    $er = "Definnissez l'etat du congé avant de valider";
    header("location:../dashboard.php?er=$er"); 
}
     
?>