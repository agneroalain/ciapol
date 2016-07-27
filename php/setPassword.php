<?php
session_start();
include('../include/connectdb.php');
var_dump($_POST);
$pwd1 = $_POST['new_pwd'];
$pwd2 = $_POST['new_pwd_conf'];
if($pwd1 == $pwd2){
    $reqSet = $bdd->query("UPDATE employe SET mdp_emp='$pwd1' WHERE mat_emp='".$_SESSION['mat_emp']."'");
    header('location:../parametre.php?err=2');
}
else {
    header('location:../parametre.php?err=1');
}
?>