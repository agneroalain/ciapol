<center>
<?php
session_start();
include('include/header.php');
include('include/connectdb.php');
    if(isset($_SESSION['mat_emp']) AND isset($_GET['id'])){
        $resdem = $bdd -> prepare ("SELECT * FROM demande WHERE cod_dem=?");
        $res = $resdem -> execute (array($_GET['id']));
        $deminfo = $resdem->fetch();  
        echo "Demande faite le ".$deminfo['dat_dem']."<br /> par ".$deminfo['mat_emp']."<br /> de ".$deminfo['type_dem']."<br /> A partir du ".$deminfo['dat_deb_dem']." au ".$deminfo['dat_fin_dem']."<br /> avec comme motif : ".$deminfo['lib_dem'];
        $updatenotif = $bdd -> query ("UPDATE notification SET etat_notif=1 WHERE cod_dem='".$_GET['id']."'");
    }
    
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
        
        
        
    </div>
    N° ----- MINESUDD/CIAPOL/DIR/S/DAAF/SRH&F
    <div id="corps_notif">
        <center><h2>DEMANDE DE DEPART EN CONGE</h2></center>
        Nom et Prénoms : ................................................................... <br />
        Fonction: ............................................ Matricule: <?php echo $deminfo['mat_emp']; ?> <br />
        Service: .................................... Motif: <?php echo $deminfo['lib_dem']; ?> <br /> 
        Période de congé demandé: du <?php echo $deminfo['dat_deb_dem']; ?> au <?php echo $deminfo['dat_fin_dem']; ?> <br />
        Date de retour du dernier congé : .................................................. <br />
        Nombre de jours ouvrables : ................ soit ................ jours calendaires <br />
        Adresse durant les congés : ........................................................ <br />
        Nom de la personne devant assurer l'interim (éventuellement) : ..................... <br />
        .................................................................................... <br />
        Qualification : .............................. Fonction : .......................... <br />
        <center>(Partie réservée au Service Ressources Humaines et Administration)</center><br />
        Solde droit à congé : .............................................................. <br />
        Solde droit à congé acquis : ....................................................... <br />
        Nombre de jours déductibles des congés: ............................................ <br />
    </div>
</div>
