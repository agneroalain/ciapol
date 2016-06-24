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
            <br />
            <hr/><hr/>
            <br />
            <img src="assets/images/logo.png" class="ico"/><br />Centre Ivoirien Antipollution
            <br />
            <hr/><hr/>
            <br />
            Sous Direction des Affaires Administratives et Financières
            <hr/><hr/>
            Service Ressources Humaines et Administration<br /><br />
            <hr/><hr/>
        </div>
        <div id="droit">
            <center>
            REPUBLIQUE DE COTE D'IVOIRE
            <br /><br />
            <hr /><hr /><br />
            
            <img src="assets/images/ivoir.png" class="ico"/><br /><br />
            Union - Discipline - Travail<br />
            </center><br /></center>
            <br /><br /><br /><br />
            <center>
            Abidjan le , <?php echo $deminfo['dat_dem']; ?>
            </center>
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
            
            $reqnumser = $bdd->prepare("SELECT num_ser FROM jointure_emp_serv WHERE mat_emp=?");
            $reqnumser -> execute (array($deminfo['mat_emp']));
            $reqnumser = $reqnumser -> fetch();
            
            $reqser = $bdd -> prepare("SELECT lib_ser FROM service WHERE num_ser=?");
            $reqser -> execute (array($reqnumser['num_ser']));
            $reqser = $reqser -> fetch();
        ?>
        
    </div>
    N° ----- MINESUDD/CIAPOL/DIR/S/DAAF/SRH&F
    <div id="corps_notif">
        <center><h2>DEMANDE DE DEPART EN CONGE</h2></center>
        <b>Nom et Prénoms :</b> <?php echo $emp['nom_emp']." ".$emp['pnom_emp']; ?> <br />
        <b>Fonction:</b> <?php echo $emp['fonct_emp']; ?> <b>Matricule:</b> <?php echo $deminfo['mat_emp']; ?> <br />
        <b>Service:</b> <?php echo $reqser['lib_ser']; ?> <b>Motif:</b> <?php echo $deminfo['lib_dem']; ?> <br /> 
        <b>Période de congé demandé:</b> du <?php echo $deminfo['dat_deb_dem']; ?> au <?php echo $deminfo['dat_fin_dem']; ?> <br />
        <b>Date de retour du dernier congé :</b> .................................................. <br />
        <b>Nombre de jours ouvrables :</b> ................ <b>soit</b> ................ <b>jours calendaires</b> <br />
        <b>Adresse durant les congés :</b> ........................................................ <br />
        <b>Nom de la personne devant assurer l'interim (éventuellement) :</b> <?php echo $reqint['nom_emp']." ".$reqint['pnom_emp']; ?> <br />
        .................................................................................... <br />
        <b>Qualification :</b> .............................. <b>Fonction :</b>  <?php echo $reqint['fonct_emp']; ?> <br />
        <center><b>(Partie réservée au Service Ressources Humaines et Administration)</b></center><br />
        <b>Solde droit à congé :</b> .............................................................. <br />
        <b>Solde droit à congé acquis :</b> ....................................................... <br />
        <b>Nombre de jours déductibles des congés:</b> ............................................ <br />
        <form>
  <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer cette page" />
</form>
<script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script>
    </div>
    
</div>


<?php 
    }
    else {
        
			echo "<div id='notif_page'><br/><ul>";	
								 
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