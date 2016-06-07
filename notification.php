<center>
<?php
session_start();
if(isset($_SESSION['mat_emp']))
		{
include('include/header.php');
include('include/connectdb.php');
    if(isset($_SESSION['mat_emp']) AND isset($_GET['id'])){
        $resdem = $bdd -> prepare ("SELECT * FROM demande WHERE cod_dem=?");
        $res = $resdem -> execute (array($_GET['id']));
        $deminfo = $resdem->fetch();  
        $updatenotif = $bdd -> query ("UPDATE notification SET etat_notif=1 WHERE cod_dem='".$_GET['id']."'");
    
    
?>
</center>
<div id="rapport_notif">
    <div class="entete_notif">
        <div id="gauche">
            <center>
            MINISTERE DE L'ENVIRONNEMENT, DE LA SALUBRITE URBAINE ET DU DEVELLOPEMENT DURABLE
            <hr/><hr/>
            <img src="assets/images/logo.png" class="ico"/><br />Centre Ivoirien Antipollution
            <hr/><hr/>
            Sous Direction des Affaires Administratives et Financières
            <hr/><hr/>
            Service Ressources Humaines et Administration
            <hr/><hr/>
        </div>
        <div id="droit">
            <center>
            REPUBLIQUE DE COTE D'IVOIRE
            <hr /><hr />
            Union - Discipline - Travail<br />
            <img src="assets/images/ivoir.png" class="ico"/></center><br /></center>
            Abidjan le , <?php echo $deminfo['dat_dem']; ?>
        </div>
        
        <?php 
            $reqemp = $bdd->prepare("SELECT * FROM employe WHERE mat_emp=?");
			$reqemp->execute(array($deminfo['mat_emp']));
			$userexist=$reqemp->rowCount();
			if($userexist==1)
			{
				$userinfo = $reqemp->fetch();
                $emp['mat_emp'] = $userinfo['mat_emp'];
				$emp['nom_emp'] = $userinfo['nom_emp'];
				$emp['pnom_emp'] = $userinfo['pnom_emp'];
                $emp['mail_emp'] = $userinfo['mail_emp'];
                $emp['cont_emp'] = $userinfo['cont_emp'];
                $emp['fonct_emp'] = $userinfo['fonct_emp'];
				$emp['role_id'] = $userinfo['role_id'];
			}
            $reqint = $bdd->prepare("SELECT nom_emp,pnom_emp,fonct_emp FROM employe WHERE mat_emp=?");
			$reqint->execute(array($deminfo['mat_int']));
            $reqint = $reqint -> fetch();
        ?>
        
    </div>
    N° ----- MINESUDD/CIAPOL/DIR/S/DAAF/SRH&F
    <div id="corps_notif">
        <center><h2>DEMANDE DE DEPART EN CONGE</h2></center>
        Nom et Prénoms : <?php echo $emp['nom_emp']." ".$emp['pnom_emp']; ?> <br />
        Fonction: <?php echo $emp['fonct_emp']; ?> Matricule: <?php echo $deminfo['mat_emp']; ?> <br />
        Service: .................................... Motif: <?php echo $deminfo['lib_dem']; ?> <br /> 
        Période de congé demandé: du <?php echo $deminfo['dat_deb_dem']; ?> au <?php echo $deminfo['dat_fin_dem']; ?> <br />
        Date de retour du dernier congé : .................................................. <br />
        Nombre de jours ouvrables : ................ soit ................ jours calendaires <br />
        Adresse durant les congés : ........................................................ <br />
        Nom de la personne devant assurer l'interim (éventuellement) : <?php echo $reqint['nom_emp']." ".$reqint['pnom_emp']; ?> <br />
        .................................................................................... <br />
        Qualification : .............................. Fonction :  <?php echo $reqint['fonct_emp']; ?> <br />
        <center>(Partie réservée au Service Ressources Humaines et Administration)</center><br />
        Solde droit à congé : .............................................................. <br />
        Solde droit à congé acquis : ....................................................... <br />
        Nombre de jours déductibles des congés: ............................................ <br />
    </div>
</div>


<?php 
    }
    else {
        
			echo "<div id='notif_page'><ul>";	
								 
										$req = $bdd->prepare('SELECT * FROM notification WHERE mat_emp="'.$_SESSION["mat_emp"].'"');
									
										$req->execute();
										$i=0;
										while ($not = $req->fetch()) {
											$i++;
											if($not['type_notif'] == '1'){ $typ = 'absence';}else{ $typ = 'conge';}
											echo "<a href='notification.php?id=".$not['cod_dem']."'><li class='not'><div class='notimg'></div><div class='notdesc'>".$not['lib_notif']."</div><div class='notdate'></div></li>";
										}
										if($i==0){
											echo "<div class='no_notif'/><center>Aucune notification pour l'instant !</center></div>";
										}
										
										
						
    }
    include("include/footer.php");
        }
        else {
             echo"<br/><br/><center><h1> Vous devez etre connecté pour acceder à cette page !</h1><br /> <a href='index.php'>Cliquez ici pour acceder à la page de connexion ! </a></center>";
        }
 ?>	</ul>
						</div>