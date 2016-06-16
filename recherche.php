<?php
session_start();
    include("include/header.php");
    include("include/connectdb.php");
?>
<div id="rech">
    <div id="champ">
        <form action="#" method="post">
            <select id="list" name="table">
                <option>Employé</option>
                <option>Service</option>
                <option>Direction</option>
                <option>Congé</option>
                <option>Absence</option>
            </select>
            <select name="champ">
                <?php ?>
                <option>Identifiant</option>
                <option>Designation / Nom</option>
                <option>Date</option>
            </select>
            <input type="text" name="element"/>
            <input type="submit" value="rechercher"/>
        </form>
    </div>
</div>
<div id="resultat">
    <table>
    <?php
    // liste de tout les employés
    $req = $bdd->prepare("SELECT * FROM employe ");
   /* //DEFINIR L4ENTETE DANS UN TABLEAU EN FONCTION DE LA TABLE et l'afficher a l'aide d'une bouche 
    $ent1[] = ['nom & prenom', 'fonction', 'service d\'acceuil'];
    for($i=0;$i<=$ent1[].length;$i++){
        echo $ent1[$i];
    }*/
    $req->execute();
    while ($emp = $req->fetch()) {
        if($emp['sex_emp'] == 'M'){ $col = 'homme';}else{ $col = 'femme';}
        echo "<tr class='".$col."'><td class='".$col."'>".$emp['nom_emp']." ".$emp['pnom_emp']."</td><td class='".$col."'>".$emp['fonct_emp']."</td><td class='".$col."'>".$emp['cont_emp']."</td><td class='".$col."'>".$emp['mail_emp']."</td><td class='".$col."'>".$emp['nat_emp']."</td></tr>";
    }
    ?>
    </table>
</div>
<?php
    include("include/footer.php");
?>