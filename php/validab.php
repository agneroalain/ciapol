<?php 
$dec=$_POST[$_GET['cod']];
if(isset($dec) AND !empty($dec))
{
    if($dec == 1){
        $lib_notif = 'Votre demande d\'absence à été acceptée';
    }
    else{
        $lib_notif = 'Votre demande d\'absence à été refusée';
    }
    include("../include/connectdb.php");   
    $reqab = $bdd -> prepare ("SELECT * FROM demande WHERE cod_dem=?");
    $abinfo =  $reqab -> execute(array($_GET['cod']));
    $abinfo = $reqab->fetch();
    $updateab = $bdd -> query ("UPDATE demande SET etat_dem=$dec WHERE cod_dem=".$_GET['cod']."");
    $updatenotif = $bdd -> prepare("INSERT INTO notification (id_notif, type_notif, lib_notif, etat_notif, mat_emp, cod_dem) VALUES (?, ?, ?, ?, ?, ?) ");
    $updatenotif -> execute ( array(NULL, 'ABSENCE', $lib_notif, '0', $abinfo['mat_emp'], $_GET['cod']));
    header('location:../dashboard.php'); 
}
else{
    $er1 = "Definnissez l'etat de l'absence avant de valider";
    header("location:../dashboard.php?er=$er1"); 
}
     
?>