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
        
        //requete pour l'avant dernier congé
        $resdemAv = $bdd -> prepare ("SELECT * FROM demande WHERE mat_emp=?");
        $resAv = $resdemAv -> execute (array($deminfo['mat_emp']));
        $row = $resdemAv->rowCount() - 1;
    
    
?>
</center>

<div id="rapport_notif"> <!-- Debut rapport_notif -->
    <?php 
    $i=1;
    while($deminfoAv = $resdemAv->fetch()){
        if($i == $row){
            $dernier_cong = $deminfoAv['dat_fin_dem'];
        }else{
                $dernier_cong = "Premier Congé";
            }
            $i++;
    }
    $dat_deb = new dateTime($deminfo['dat_deb_dem']);
    $dat_fin = new dateTime($deminfo['dat_fin_dem']);
    $calendaire = $dat_fin->diff($dat_deb)->days;
?>
        <div class="entete_notif"><!-- Debut entete_notif -->
          <div id="gauche"><!-- Debut gauche -->
                <div class="col">
                    <img src="assets/images/logo.png" class="ico"/>
                </div>
                <div class="col">
                    <center>
                    MINISTERE DE L'ENVIRONNEMENT, DE LA SALUBRITE URBAINE ET DU DEVELLOPEMENT DURABLE
                    <br />
                    <center/>= = = = = = = = = = =</center>Centre Ivoirien Antipollution
                    <center/>= = = = = = = = = = =</center>
                    Sous Direction des Affaires Administratives et Financières
                    <center/>= = = = = = = = = = =</center>
                    Service Ressources Humaines et Administration<br />
                    <center/>= = = = = = = = = = =</center>
                </div>
        </div>
        <div id="droit"><!-- Debut droit -->
            <center>
            REPUBLIQUE DE COTE D'IVOIRE
            <center/>= = = = = = = = = = =</center>
            
            <img src="assets/images/ivoir.png" class="ico"/><br />
            Union - Discipline - Travail<br />
            </center><br /></center>
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
 <?php   
        $nbDay = 0;
    foreach( new DatePeriod(
            $dat_deb,
            new DateInterval('P1D'),
            $dat_fin
        ) as $oDT)
    {
        //http://www.php.net/manual/fr/datetime.format.php
        //http://www.php.net/manual/fr/function.date.php
        $numCurrentDay = $oDT -> format('N');
        if (($numCurrentDay != '6') &&
            ($numCurrentDay != '7'))
        {
            ++ $nbDay;
        }
    }
    
?>
    
    <div id="filigrane">
        CIAPOL
    </div>
    <div id="corps_notif"><!-- Debut corps_notif -->
        <br />
        <u><center><h2 class='titre_dem'>DEMANDE DE DEPART EN CONGE</h2></center></u>
        <b>Nom et Prénoms :&ensp;</b> <?php echo $emp['nom_emp']." ".$emp['pnom_emp']; ?> <br />
        <b>Fonction:&ensp;</b> <?php echo $emp['fonct_emp']; ?> &ensp;&ensp; <b>Matricule:&ensp;</b> <?php echo $deminfo['mat_emp']; ?> <br />
        <b>Service:&ensp;</b> <?php echo $reqser['lib_ser']; ?> &ensp;&ensp;<b>Motif:</b> <?php echo $deminfo['lib_dem']; ?> <br /> 
        <b>Période de congé demandé: &ensp;</b> du <?php echo $deminfo['dat_deb_dem']; ?> au <?php echo $deminfo['dat_fin_dem']; ?> <br />
        <b>Date de retour du dernier congé :&ensp;</b> <?php echo $dernier_cong; ?><br />
        <b>Nombre de jours ouvrables :&ensp;</b><?php echo $nbDay;  ?><b>&ensp;soit&ensp;</b> <?php echo $calendaire;  ?> <b>&ensp;jours calendaires</b> <br />
        <b>Adresse durant les congés :&ensp;</b><?php echo $deminfo['adr_cong']; ?><br />
        <b>Nom de la personne devant assurer l'interim (éventuellement) :&ensp;</b> <?php echo $reqint['nom_emp']." ".$reqint['pnom_emp']; ?> <br />
        <b>Qualification :&ensp;</b> .............................. &ensp;&ensp;<b>Fonction :&ensp;</b>  <?php echo $reqint['fonct_emp']; ?> <br />
        <center><b>(Partie réservée au Service Ressources Humaines et Administration)</b></center><br />
        <b>Solde droit à congé :&ensp;</b> .............................................................. <br />
        <b>Solde droit à congé acquis :&ensp;</b> ....................................................... <br />
        <b>Nombre de jours déductibles des congés:&ensp;</b> ............................................ <br />
        <div class="footer_demmande"><!-- Debut footer_demmande -->
            <div class="row_foot">
                <div class="col_foot">
                    <p><center>Date et signature du demandeur</center></p>
                    <p><center>Date et signature du Chef des Ressources Humaines et Formation</center></p>
                </div>
                <div class="col_foot">
                    <p><center>Date et Signature du Supérieur Hiérarchique</center></p>
                    <p><center>Date et signature du Sous Directeur des Affaires Administratives et Financière</center></p>
                </div>
            </div>
        </div>
        <div class="bt_imprim"></div>
        <form>
            <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer cette page" />
        </form>
        <br/><br/><br/><br/>
    </div>

</div> <!-- fi -->
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
                        <script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script>