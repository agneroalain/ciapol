<?php session_start(); 
    if(isset($_SESSION['mat_emp']))
		{
		include('include/connectdb.php');
		if(isset($_SESSION['mat_emp']))
		{
			$getmat=intval($_SESSION['mat_emp']);
            include("include/header.php");
?>
<div id="page_space"></div>
<div id="cont_reg">
    		<div id="page_reg">
                <center><h3 class="titre">INSCRIPTION</h3></center>
                <form method="post" action="" enctype="multipart/form-data">
                <div id="form_register">
                    <?php if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                    <div>
                    <p class="p_no_scroll_form">
                        <label for="">Matricule de l'employé :</label><input type="text" name="mat_emp"/>
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">Votre nom :</label><input type="text" placeholder="" name="nom_emp"/>
                    </p>
                     <p class="p_no_scroll_form">
                        <label for="">Vos prénoms :</label><input type="text" placeholder="" name="pnom_emp" />
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">Sexe :</label> M <input type="radio" name="sex_emp"/> F <input type="radio" name="sex_emp"/>
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">Votre contact :</label><input type="tel"  title='Phone Number (Format: +22599999999)' name="cont_emp" />
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">Photo de profil  :</label><input type="file" placeholder="" name="photo" />
                        <!--<div id="drop_zone" ondrop="drag_drop(event)" ondragover="return false"></div>-->
                    </p>
                    </div>
                    <div>
                    
                     <p class="p_no_scroll_form">
                        <label for="">Votre date de naissance :</label><input type="date" name="datnaiss_emp" />
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">Votre adresse émail :</label><input type="text" placeholder="" name="mail_emp" />
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">votre adresse postale :</label><input type="text" placeholder="" name="adrpost_emp" />
                    </p>
                     <p class="p_no_scroll_form">
                        <label for="">Numéro de votre carte CNI</label><input type="text" placeholder="" name="numcni_emp" />
                    </p>
                    </div>
                    <div>
                    <p class="p_no_scroll_form">
                        <label for="">votre nationnalité :</label>
                        <select name="nat_emp" id="nationnalites">
                            <option>	Afghan	</option>
                            <option>	Albanais	</option>
                            <option>	Algérien	</option>
                            <option>	Allemand	</option>
                            <option>	Américain	</option>
                            <option>	Angolais	</option>
                            <option>	Argentin	</option>
                            <option>	Arménien	</option>
                            <option>	Australien	</option>
                            <option>	Autrichien	</option>
                            <option>	Bangladais	</option>
                            <option>	Belge	</option>
                            <option>	Béninois	</option>
                            <option>	Bosniaque	</option>
                            <option>	Botswanais	</option>
                            <option>	Bhoutan	</option>
                            <option>	Brésilien	</option>
                            <option>	Britannique	</option>
                            <option>	Bulgare	</option>
                            <option>	Burkinabè	</option>
                            <option>	Cambodgien	</option>
                            <option>	Camerounais	</option>
                            <option>	Canadien	</option>
                            <option>	Chilien	</option>
                            <option>	Chinois	</option>
                            <option>	Colombien	</option>
                            <option>	Congolais	</option>
                            <option>	Cubain	</option>
                            <option>	Danois	</option>
                            <option>	Ecossais	</option>
                            <option>	Egyptien	</option>
                            <option>	Espagnol	</option>
                            <option>	Estonien	</option>
                            <option>	Européen	</option>
                            <option>	Finlandais	</option>
                            <option>	Français	</option>
                            <option>	Gabonais	</option>
                            <option>	Georgien	</option>
                            <option>	Grec	</option>
                            <option>	Guinéen	</option>
                            <option>	Haïtien	</option>
                            <option>	Hollandais	</option>
                            <option>	Hong-Kong	</option>
                            <option>	Hongrois	</option>
                            <option>	Indien	</option>
                            <option>	Indonésien	</option>
                            <option>	Irakien	</option>
                            <option>	Iranien	</option>
                            <option>	Irlandais	</option>
                            <option>	Islandais	</option>
                            <option>	Israélien	</option>
                            <option>	Italien	</option>
                            <option>	Ivoirien	</option>
                            <option>	Jamaïcain	</option>
                            <option>	Japonais	</option>
                            <option>	Kazakh	</option>
                            <option>	Kirghiz	</option>
                            <option>	Kurde	</option>
                            <option>	Letton	</option>
                            <option>	Libanais	</option>
                            <option>	Liechtenstein	</option>
                            <option>	Lituanien	</option>
                            <option>	Luxembourgeois	</option>
                            <option>	Macédonien	</option>
                            <option>	Madagascar	</option>
                            <option>	Malaisien	</option>
                            <option>	Malien	</option>
                            <option>	Maltais	</option>
                            <option>	Marocain	</option>
                            <option>	Mauritanien	</option>
                            <option>	Mauricien	</option>
                            <option>	Mexicain	</option>
                            <option>	Monégasque	</option>
                            <option>	Mongol	</option>
                            <option>	Néo-Zélandais	</option>
                            <option>	Nigérien	</option>
                            <option>	Nord Coréen	</option>
                            <option>	Norvégien	</option>
                            <option>	Pakistanais	</option>
                            <option>	Palestinien	</option>
                            <option>	Péruvien	</option>
                            <option>	Philippins	</option>
                            <option>	Polonais	</option>
                            <option>	Portoricain	</option>
                            <option>	Portugais	</option>
                            <option>	Roumain	</option>
                            <option>	Russe	</option>
                            <option>	Sénégalais	</option>
                            <option>	Serbe	</option>
                            <option>	Serbo-croate	</option>
                            <option>	Singapour	</option>
                            <option>	Slovaque	</option>
                            <option>	Soviétique	</option>
                            <option>	Sri-lankais	</option>
                            <option>	Sud-Africain	</option>
                            <option>	Sud-Coréen	</option>
                            <option>	Suédois	</option>
                            <option>	Suisse	</option>
                            <option>	Syrien	</option>
                            <option>	Tadjik	</option>
                            <option>	Taïwanais	</option>
                            <option>	Tchadien	</option>
                            <option>	Tchèque	</option>
                            <option>	Thaïlandais	</option>
                            <option>	Tunisien	</option>
                            <option>	Turc	</option>
                            <option>	Ukrainien	</option>
                            <option>	Uruguayen	</option>
                            <option>	Vénézuélien	</option>
                            <option>	Vietnamien	</option>

                        </select>
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="sitfam_emp">Votre situation familiale</label>
                        <select name="sitfam_emp" id="sitfam_emp">
                            <option value="C">Celibataire</option>
                            <option value="MSE">Marié sans enfant</option>
                            <option value="MAE">Marié avec enfant</option>
                        </select>
                    </p>
                    
                    <p class="p_no_scroll_form">
                        <label for="">Votre lieu de résidence :</label><input type="text" placeholder="" name="lieures_emp" />
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">La date de votre embauche :</label><input type="date" placeholder="" name="datemb_emp" />
                    </p>
                    </div>
                    <div>
                    <p class="p_no_scroll_form">
                        <label for="">Votre fonction :</label><input type="text" placeholder="" name="fonc_emp" />
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">Le service auquel vous ête afecté  :</label><select name="num_ser">
                        <?php
                            include("include/connectdb.php");
                            $reqser = $bdd->prepare('SELECT * FROM service');
			                $reqser->execute();
			                while($servinfo = $reqser->fetch())
                            {
                                echo "<option value=".$servinfo['num_ser'].">".$servinfo['lib_ser']."</option>";
                            }
                        ?>
                        </select>
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">votre categorie :</label>
                        <select name="cod_cat_emp" id="contrat">
                            <?php
                                $reqcat = $bdd->prepare('SELECT * FROM categorie');
                                $reqcat->execute();
                                while($catinfo = $reqcat->fetch())
                                {
                                    echo "<option value=".$catinfo['cod_cat_emp'].">".$catinfo['lib_cat_emp']."</option>";
                                }
                            ?>
                        </select>
                    </p>
                     
                    <p class="p_no_scroll_form">
                        <label for="">Role de l'employé :</label>
                        <select name="role_id">
<?php
    $reqrole = $bdd->prepare('SELECT * FROM role');
    $reqrole->execute();
    while($roleinfo = $reqrole->fetch())
    {
        echo "<option value=".$roleinfo['role_id'].">".$roleinfo['name']."</option>";
    }   
?>
                        </select>
                    </p>
                    <p class="p_no_scroll_form">
                        <label for="">Mot de passe de l'employé</label><input type="password" name="mdp_emp"/>
                    </p>
                    </div>
                    </div>
                    <input type="submit" value="valider"/>
                </form>
            </div>
    </div>
    <script src="js/drag.js"></script>
<?php include("include/footer.php");}
if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])){
    $tailleMax = 2097152;
    $extensionsValides = array('jpg','jpeg','png');
    if($_FILES['photo']['size'] < $tailleMax){
        $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'],'.'),1));
        if(in_array($extensionUpload,$extensionsValides)){
            $chemin = "assets/images/profil_emp/".$_SESSION['mat_emp'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$chemin);
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
if(isset($_POST['mat_emp']) AND !empty($_POST['mat_emp'])){
    $mat_emp = $_POST['mat_emp'];// Limiter le nombre de caratere pouvant etre inseré
    if(isset($_POST['nom_emp']) AND !empty($_POST['nom_emp'])){
        $nom_emp = $_POST['nom_emp'];
        if(isset($_POST['pnom_emp']) AND !empty($_POST['pnom_emp'])){
                $pnom_emp = $_POST['pnom_emp'];
                if(isset($_POST['datnaiss_emp']) AND !empty($_POST['datnaiss_emp'])){
                       $datnaiss_emp = $_POST['datnaiss_emp'];
                       if(isset($_POST['mail_emp']) AND !empty($_POST['mail_emp'])){
                               $mail_emp = $_POST['mail_emp'];
                               if(isset($_POST['sex_emp']) AND !empty($_POST['sex_emp'])){
                                         $sex_emp = $_POST['sex_emp'];
                                          if(isset($_POST['mdp_emp']) AND !empty($_POST['mdp_emp'])){
                                            $mdp_emp = $_POST['mdp_emp'];
                                            $adrpost_emp = $_POST['adrpost_emp'];
                                            $nat_emp = $_POST['nat_emp'];
                                            $cont_emp = $_POST['cont_emp'];
                                            $lieures_emp = $_POST['lieures_emp'];
                                            $datemb_emp = date("Y-m-d");
                                            $fonc_emp = $_POST['fonc_emp'];
                                            $sitfam_emp = $_POST['sitfam_emp'];
                                            $cod_cat_emp = $_POST['cod_cat_emp'];
                                            $num_ser = $_POST['num_ser'];
                                            $role_id = $_POST['role_id'];
                                             $requete = $bdd->prepare('INSERT INTO employe(mat_emp,nom_emp, pnom_emp, datnaiss_emp, mail_emp, adrpost_emp, nat_emp, cont_emp, lieures_emp, datemb_emp, fonct_emp, sitfam_emp, cod_cat_emp,mdp_emp,role_id,sex_emp) VALUES (?,?,?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?,?,?)');
                                            $requete->execute(array($mat_emp,$nom_emp,$pnom_emp,$datnaiss_emp,$mail_emp,$adrpost_emp,$nat_emp,$cont_emp,$lieures_emp,$datemb_emp,$fonc_emp,$sitfam_emp,$cod_cat_emp,$mdp_emp,$role_id,$sex_emp));
                                            $req2 = $bdd->prepare('INSERT INTO jointure_emp_serv(mat_emp,num_ser) VALUES (?,?)');
                                            $req2->execute(array($mat_emp,$num_ser));
                                            if($requete AND $req2){
                                                echo '<div id="cover">Inscription effectuée</div>'.$_FILES['photo']['tmp_name'];;
                                            }
                                          }
                                          else {
                                              $msg =" vous devez definir un mot de passe pour l'employé !";
                                          }
                               }
                               else {
                                   $msg = " vous devez definir le sexe de l'employé !";
                               }            
                       }
                       else{
                           $msg = " vous devez renseigner le champ mail de l'employé !";
                       }
                }
                else {
                    $msg = "vous devez renseigner le champ date de naissance de l'employé !";
                }
        }
        else {
            $msg = "vous devez renseigner le champ prenom de l'employé !";
        }
        
    }
    else {
        $msg = "Vous devez renseigner le champ nom de l'employé !";
    }
}
else {
    $msg = "Vous devez remplir le champ matricule de l'employé !";
}                                     
        }
        else {
             echo"<br/><br/><center><h1> Vous devez etre connecté pour acceder à cette page !</h1><br /> <a href='index.php'>Cliquez ici pour acceder à la page de connexion ! </a></center>";
        }?>