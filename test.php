<?php session_start(); ?>
<form method="post" action="" enctype="multipart/form-data">
    <label> Avatar : </label>
    <input type="file" name="avatar" />
    <input type="submit" value="envoyer" / >
</form>
<?php

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
    $tailleMax = 2097152;
    $extensionsValides = array('jpg','jpeg','png');
    if($_FILES['avatar']['size'] < $tailleMax){
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
        if(in_array($extensionUpload,$extensionsValides)){
            $chemin = "assets/images/profil_emp/".$_SESSION['mat_emp'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
            if($resultat){
                
            }
            else {
                $msg = "Erreur durant l'importation";
            }
        }
        else{
            $msg = 'votre photo de profil n\'est pas au bon format';
        }
    }
    else{
        $msg = 'VOtre photo de profil ne doit pas depasser 2Mo';
    }
}

?>