<?php 
$dec=$_POST[$_GET['cod']];
$deduir = $_POST['ded'];
if(isset($dec) AND !empty($dec))
{
     if($dec == 1){
        $lib_notif = 'Votre demande de congé à été acceptée';
    }
    else{
        $lib_notif = 'Votre demande de congé à été refusée';
    }
    include("../include/connectdb.php");  
    $getmat = $bdd -> query("SELECT mat_emp FROM demande WHERE cod_dem='".$_GET['cod']."'");
    $getmat = $getmat -> fetch();
    $reqemp = $bdd -> prepare (" SELECT * FROM employe WHERE mat_emp=?");
    $empinfo = $reqemp->execute(array($getmat['mat_emp']));
    $empinfo = $reqemp->fetch();
    $reqcong = $bdd -> prepare ("SELECT * FROM demande WHERE cod_dem=?");
    $conginfo =  $reqcong -> execute(array($_GET['cod']));
    $conginfo = $reqcong->fetch() ;  
    // determiner le nombre de jour à rétrancher du solde de congé 
    $dat_deb = new dateTime($conginfo['dat_deb_dem']);
    $dat_fin = new dateTime($conginfo['dat_fin_dem']);
    $calendaire = $dat_fin->diff($dat_deb)->days;
    $nbJr =  $empinfo['sold_cong_emp'] - $calendaire;
    $updatecong =$bdd->query("UPDATE demande SET etat_dem=$dec WHERE cod_dem=".$_GET['cod']."");
    $updatenotif = $bdd -> prepare("INSERT INTO notification (id_notif, type_notif, lib_notif, etat_notif, mat_emp, cod_dem) VALUES (?, ?, ?, ?, ?, ?) ");
    $updatenotif -> execute ( array(NULL, 'CONGE', $lib_notif, '0', $getmat['mat_emp'], $_GET['cod']));
    if($deduir == true){
    $updateSoldeCong = $bdd->query("UPDATE employe SET sold_cong_emp=".$nbJr." WHERE mat_emp='$empinfo[mat_emp]'");
    }
    header('location:../dashboard.php');        
    
}
else{
    $er = "Definnissez l'etat du congé avant de valider";
    header("location:../dashboard.php?er=$er"); 
}
     
?>