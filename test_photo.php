
<form method="POST" action="#" enctype="multipart/form-data">
    <input type="FILE" name="photo"/>
    <input type="submit"/>
</form>
<?php
echo 'ok'; 
session_start();
if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])){
    $tailleMax = 2097152;
    $extensionsValides = array('jpg','jpeg','png');
    if($_FILES['photo']['size'] < $tailleMax){
        $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'],'.'),1));
        if(in_array($extensionUpload,$extensionsValides)){
            $chemin = "assets/images/profil_emp/".$_SESSION['mat_emp'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$chemin);
            if($resultat){ 
                var_dump($_FILES);                        
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
else {
    echo'nana';
}

?>