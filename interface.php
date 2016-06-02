    <?php session_start();
		include('include/connectdb.php');
		if(isset($_SESSION['mat_emp']))
		{
			$getmat=intval($_SESSION['mat_emp']);
			$reqemp = $bdd->prepare('SELECT * FROM employe WHERE mat_emp=?');
            /* trouver un autre moyen en dehors de l'id pour recuperer les informations sur l'utilisateur */
			$reqemp->execute(array($getmat));
			$userinfo = $reqemp->fetch();
            /* recuperer toute les informations sur les utilisateur et les tables liées */
	?>
        <body>
            <?php include("include/header.php") ?>
            <div id="page_space"></div>
            <div id="page_content"><!-- debut page-content -->
                <div id="left"><!-- debut left -->
                    <div class="card"><!-- debut card -->
                        <img src="assets/images/profil_emp/<?php echo $_SESSION['photoprof_emp'] ?>" alt="" class="avatar card-user">
                        <span class="card-category">EMPLOYE</span>
                        <div class="card-description"><!-- debut card-description -->
                            <p><h3><?php echo $_SESSION['nom_emp']." ".$_SESSION['pnom_emp']; ?></h3></p>
                            
                            <p> <?php echo $_SESSION['mail_emp']; ?></p>
                            <p>  <?php echo $_SESSION['fonct_emp']; ?> </p>
                        </div><!-- fin card-description  -->
                    </div><!-- fin card  -->
                    <div id="fichier" class="s_left"><!-- debut fichier -->
                        <center><h3 class="titre">Fichier<h3></center>
                        <table class="tableau" align="center" width="400px">
                            <?php
                                // recuperation de toutes les information sur les fichiers de l'utilisateur
                                $reqfichier = $bdd->prepare("SELECT * FROM fichier WHERE mat_emp=?");
                                $reqfichier->execute(array($_SESSION['mat_emp']));
                                // $fichierinfo = $reqfichier->fetch();
                                // $nbfichier = $reqfichier->rowCount();
                                //  echo $nbfichier;
                                // echo $fichierinfo["nom"]["1"];
                                $i=1;
                                while ($fichierinfo = $reqfichier->fetch())
                                {
                                    echo "<tr><td align='center'><img class='ico' src='assets/ico/".substr($fichierinfo['ext_fichier'],1).".png' /><td align='center'>".$fichierinfo["type"]."</td></td><td align='center'><a href='liredoc.php?doc=".$fichierinfo['nom']."'>Cliquez ici pour consulter</a></td></tr>";
                                    $i++;
                                }
                            ?>
                        </table>
                        <div id="newfic" class="popup" onclick="showpop();">Importer un fichier</div>
                        <span>
                            <!-- le popup commence ici -->
                            <div id="overlay" onclick="hidepop();" class="hide"></div>
                                <div id="overlay_dialogue" class="hide" class="active"><!-- debut overlay_dialogue -->
                                    <p>
                                        <form action="php/fichier.php" method="POST" enctype="multipart/form-data">
                                            <label>Selectionnez votre fichier SVP </label>
                                            <select name="typefic" id="typefic">
                                                <option value="CV">CV</option>
                                                <option value="Carte nationnale">Carte nationnale</option>
                                                <option value="Extrait de naissance">Extrait de naissance</option>
                                            </select>
                                            <input type="file" name="fic"/>
                                            <input type="submit" value="Envoyer le fichier"/>
                                        </form> 
                                    </p>
                                    <div id="close_popup" class="popup"  onclick="hidepop();">fermer</div>
                                </div><!-- fin overlay_dialogue  -->
                        </span>
                    </div><!-- fin fichier  -->
                </div><!-- fin left-->
                    <div id="ecran"><!-- debut ecran -->
                        <div id="contecran"><!-- debut contecran -->
                                <div id="interface"><!-- debut interface -->
                                    <center>
                                        <h3 class="titre">INTERFACE</h3>
                                        <h3 class="rub"  onclick="return true" onmousedown="choix('div1');">DEMANDE DE DEPART EN CONGE </h3>
                                        <div class="bloc" id="div1" ><!-- debut div1 -->
                                            <form method="POST" action="php/conge.php" id="demandecong">
                                                <p> <label for="dat_dep_cong" class="labloc"/>Date de depart : </label> <input type="date" name="dat_dep_cong" id="dat_dep_cong"/>  </p>
                                                <p> <label for="dat_fin_cong" class="labloc"/>Date de retour : </label> <input type="date" name="dat_fin_cong" id="dat_fin_cong"/>  </p>
                                                <p> <label for="obs_cong" class="labloc"/>Motif : </label> <textarea name="obs_cong" id="obs_cong"></textarea> </p>                                
                                                <p> <label for="congadr" class="labloc"/>Adresse durant les congés : </label> <input type="text" name="congadr" id="congadr"/>  </p>
                                                <p> <label for="congint" class="labloc"/>Nom de la perssonne devant assurer l'interime : </label> 
                                                <select name="congint" id="congint">
                                                    <?php                 
                                                        $reqdir = $bdd->query("SELECT * FROM employe");                                  
                                                        while($donne = $reqdir->fetch()) {
                                                        echo "<option value=".$donne["mat_emp"].">".$donne['nom_emp']." ".$donne["pnom_emp"]."</option>";
                                                        }                                  
                                                    ?>    
                                                </select>  </p>
                                                <p><input type="submit" name="demandecong" value="Envoyer la demande"/></p>
                                            </form>
                                        </div><!-- fin div1  -->
                                        <h3 class="rub"  onclick="return false" onmousedown="choix('div2');">DEMANDE D'AUTORISATION D'ABSENCE</h3>
                                        <div class="bloc" id="div2" ><!-- debut div2 -->
                                            <form method="POST" action="php/absence.php" id="demandecong">
                                                <p> <label for="dat_dep_abs" class="labloc"/>Date de depart : </label> <input type="date" name="dat_dep_abs" id="dat_dep_abs"/>  </p>
                                                <p> <label for="dat_fin_abs" class="labloc"/>Date de retour : </label> <input type="date" name="dat_fin_abs" id="dat_fin_abs"/>  </p>
                                                <p> <label for="obs_abs" class="labloc"/>Motif : </label> <textarea name="obs_abs" id="obs_abs"></textarea> </p>
                                                <p> <label for="absint" class="labloc"/>Nom de la perssonne devant assurer l'interime : </label> 
                                                <select name="absint" id="absint">
                                                    <?php
                                                    
                                                        $reqdir = $bdd->query("SELECT * FROM employe");
                                                        
                                                        while($donne = $reqdir->fetch()) {
                                                            echo "<option value=".$donne["mat_emp"].">".$donne['nom_emp']." ".$donne["pnom_emp"]."</option>";
                                                        }
                                                        
                                                    ?>      
                                                </select>  </p>
                                                <p><input type="submit" name="demandeabs" value="Envoyer la demande"/></p>
                                            </form>
                                        </div><!-- fin div2  -->
                                        <h3 class="rub"  onclick="return false" onmousedown="choix('div3');">DEMANDE DE FORMATION</h3>
                                        <div class="bloc" id="div3" ><!-- debut div3 -->
                                           
                                        </div><!-- fin div3  -->
                                    </center>
                                </div><!-- fin interface  -->
                                <div id="bilan"><!-- debut bilan -->
                                    <center><h3 class="titre">BILAN</h3></center>       
                                    <div class="tab-panels"><!-- debut tab-panels -->
                                    <center> 
                                        <ul class="tabs">
                                                <li rel="panel1" class="active">Bilan des congés</li>
                                                <li rel="panel2">Bilan des absences</li>
                                                <li rel="panel3">Bilan des formations </li>
                                                <li rel="panel4">autre</li>
                                        </ul>
                                        </center>
                                        <div id="panel1" class="panel active"><!-- debut panel1 -->
                                        <table align="center">
                                            <tr>
                                                <td>N° Congé</td>
                                                <td>Date Congé</td>
                                                <td>Date depart</td>
                                                <td>Date retour</td>
                                                <td>Interimaire</td>
                                                <td>Motif</td>
                                            </tr>
                                            <?php 
                                                // recuperation de toutes les informations de conge de l'utilisateur
                                                $reqcong = $bdd->prepare("SELECT * FROM demande WHERE type_dem='CONGE' AND etat_dem=1");
                                                $reqcong->execute(array($_SESSION['mat_emp']));
                                                
                                                while ($conginfo = $reqcong->fetch()){
                                                            echo "<tr><td>".$conginfo["cod_dem"]."</td><td>".$conginfo["dat_dem"]."</td><td>".$conginfo["dat_deb_dem"]."</td><td>".$conginfo["dat_fin_dem"]."</td><td>".$conginfo["mat_int"]."</td><td>".$conginfo["lib_dem"]."</td></tr>";
                                                        }
                                                ?>
                                        </table>
                                        </div><!-- fin panel1 -->
                                        <div id="panel2" class="panel"><!-- debut panel2 -->
                                        <table align="center">
                                            <tr>
                                                <td>N° Absence</td>
                                                <td>Date Absence</td>
                                                <td>Date depart</td>
                                                <td>Date retour</td>
                                                <td>Interimaire</td>
                                                <td>Motif</td>
                                            </tr>
                                            <?php 
                                                    // recuperation de toutes lesinformation d'absence de l'utilisateur
                                                    $reqab = $bdd->prepare("SELECT * FROM demande WHERE type_dem='ABSENCE' AND etat_dem=1");
                                                    $reqab->execute(array($_SESSION['mat_emp']));
                                                    while ($abinfo = $reqab->fetch()){
                                                                echo "<tr><td>".$abinfo["cod_dem"]."</td><td>".$abinfo["dat_dem"]."</td><td>".$abinfo["dat_deb_dem"]."</td><td>".$abinfo["dat_fin_dem"]."</td><td>".$abinfo["mat_int"]."</td><td>".$abinfo["lib_dem"]."</td></tr>";
                                                            }
                                            ?>
                                        </table>
                                        </div><!-- fin panel2 -->
                                        <div id="panel3" class="panel"><!-- debut panel3 -->
                                            <table align="center">
                                            <tr>
                                                <td>Date depart</td>
                                                <td>Date retour</td>
                                                <td>Motif</td>
                                                <td>Nombre de jour restant</td>
                                                <td>Interimaire</td>
                                                <td>Solde droit à congé</td>
                                                <td>Solde droit à congé acquis</td>
                                                <td>Nombre de jour à deduire</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        </div><!-- fin panel3 -->
                                        <div id="panel4" class="panel"><!-- debut panel4 -->
                                                    <table align="center">
                                                        <tr>
                                                            <td>Date depart</td>
                                                            <td>Date retour</td>
                                                            <td>Motif</td>
                                                            <td>Nombre de jour restant</td>
                                                            <td>Interimaire</td>
                                                            <td>Solde droit à congé</td>
                                                            <td>Solde droit à congé acquis</td>
                                                            <td>Nombre de jour à deduire</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                        </div><!-- fin panel4 -->
                                        
                                    </div><!-- fin tab-panels -->
                                </div><!-- fin bilan -->
                        </div>	<!-- fin contecran -->
                    </div><!-- fin ecran  -->
            </div><!-- fin page-content -->
    <?php include("include/footer.php"); 
     }
     else{
         header("location:index.php");
     }
    ?>