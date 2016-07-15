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
                    <?php $photo = "assets/images/profil_emp/".$_SESSION['mat_emp'].".jpg";
                    if(file_exists($photo)){
                        // echo '<div style="background-image:url("'.$photo.'");" alt="" class="avatar card-user"></div>';
                        echo '<div style="background-image:url(\''.$photo.'\');background-size:100%;" alt="" class="avatar card-user"></div>';
                    }
                    else{
                        echo '<img src="assets/images/profil_emp/default.jpg" alt="" class="avatar card-user" />';
                    }
                    
                     ?>
                        
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
                                    if(substr($fichierinfo['ext_fichier'],1 || $fichierinfo['ext_fichier'],1) == 'PDF'){ $ico = " <i class=\"fa fa-file-pdf-o fa-2x\"></i>";}elseif (substr($fichierinfo['ext_fichier'],1) == 'docx' || substr($fichierinfo['ext_fichier'],1) == 'doc') {
                                       $ico = " <i class=\"fa fa-file-word-o fa-2x\"></i>";
                                    }
                                    else{
                                        $ico = " <i class=\"fa fa-file-image-o fa-2x\"></i>";
                                    }
                                    echo "<tr><td align='center'> ".$ico."<td align='center'>".$fichierinfo["type"]."</td></td><td class='bt_tab' align='center'><a href='liredoc.php?doc=".$fichierinfo['nom']."'>Cliquez ici pour consulter</a></td></tr>";
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
                                        <?php if(isset($_GET['errcong'])){
                                            echo "<span style='color:red'><i>".$_GET['errcong']."</i></span>";
                                        } ?>
                                        <h3 class="rub"  onclick="return true" onmousedown="choix('div1');">DEMANDE DE DEPART EN CONGE </h3>
                                        <div class="bloc" id="div1" ><!-- debut div1 -->
                                            <form method="POST" action="php/conge.php" id="demandecong">
                                                <?php 
                                                    $an = date('Y');
                                                    $mois = date('m');
                                                    $jour = date('d', strtotime("+3 days"));
                                                    $min = $an.'-'.$mois.'-'.$jour;
                                                    $max = $an.'-12-31';
                                                ?>
                                                <p> <label for="dat_dep_cong" class="labloc"/>Date de depart : </label> <input type="date" name="dat_dep_cong" max="<?php echo $max; ?>" min="<?php echo $min; ?>" id="dat_dep_cong"/>  </p>
                                                <p> <label for="dat_fin_cong" class="labloc"/>Date de retour : </label> <input type="date" name="dat_fin_cong" max="<?php echo $max; ?>" min="<?php echo $min; ?>" id="dat_fin_cong"/>  </p>
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
                                        <?php if(isset($_GET['errabs'])){
                                            echo "<span style='color:red'><i>".$_GET['errabs']."</i></span>";
                                        } ?>
                                        <h3 class="rub"  onclick="return false" onmousedown="choix('div2');">DEMANDE D'AUTORISATION D'ABSENCE</h3>
                                        <div class="bloc" id="div2" ><!-- debut div2 -->
                                            <form method="POST" action="php/absence.php" id="demandecong">
                                                <p> <label for="dat_dep_abs" class="labloc"/>Date de depart : </label> <input type="date" name="dat_dep_abs" max="<?php echo $max; ?>" min="<?php echo $min; ?>" id="dat_dep_abs"/>  </p>
                                                <p> <label for="dat_fin_abs" class="labloc"/>Date de retour : </label> <input type="date" name="dat_fin_abs" max="<?php echo $max; ?>" min="<?php echo $min; ?>" id="dat_fin_abs"/>  </p>
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
                                            <form action="">
                                                <table>
                                                    <tr>
                                                        <td>Date</td>
                                                        <td>Thème</td>
                                                        <td>Participer</td>
                                                    </tr>   
                                                       
                                                <?php
                                                $reqform = $bdd->prepare("SELECT * FROM formation WHERE etat_form=?");
                                                $reqform->execute(array(0));
                                                while($forminfo = $reqform -> fetch()){
                                                    $date = ucfirst(strftime('%A, le %d ',strtotime($forminfo["dat_deb_form"])));
                                                                $date .= ucfirst(strftime('%B %Y ',strtotime($forminfo["dat_deb_form"])));
                                                    echo utf8_decode("<tr><td>".$date."</td><td><label>".$forminfo['them_form']."</label></td><td><input type='checkbox' value='' name=''/></td></tr>");
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="3"><input type="submit" value="valider"/></td>
                                                </tr>
                                                </table>
                                            </form>
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
                                                <td>#</td>
                                                <td>Date Congé</td>
                                                <td>Date depart</td>
                                                <td>Date retour</td>
                                                <td>Motif</td>
                                                <td>Fiche</td>
                                            </tr>
                                            <?php 
                                                // recuperation de toutes les informations de conge de l'utilisateur
                                                $reqcong = $bdd->prepare("SELECT * FROM demande WHERE type_dem='CONGE' AND mat_emp=? AND etat_dem=?");
                                                $reqcong->execute(array($_SESSION['mat_emp'],1));
                                                while ($conginfo = $reqcong->fetch()){
                                                    
                                                                $date = ucfirst(strftime('%A, le %d ',strtotime($conginfo["dat_dem"])));
                                                                $date .= ucfirst(strftime('%B %Y ',strtotime($conginfo["dat_dem"])));
                                                                
                                                                $date1 = ucfirst(strftime('%A, le %d ',strtotime($conginfo["dat_deb_dem"])));
                                                                $date1 .= ucfirst(strftime('%B %Y ',strtotime($conginfo["dat_deb_dem"])));
                                                                
                                                                $date2 = ucfirst(strftime('%A, le %d ',strtotime($conginfo["dat_fin_dem"])));
                                                                $date2 .= ucfirst(strftime('%B %Y ',strtotime($conginfo["dat_fin_dem"])));
                                                    
                                                            echo "<tr><td>".$conginfo["cod_dem"]."</td><td>".$date."</td><td>".$date1."</td><td>".$date2."</td><td>".$conginfo["lib_dem"]."</td><td class='bt_tab'><a href='notification.php?id=".$conginfo['cod_dem']."'> <i class='fa fa-file-o' aria-hidden='true'></i></a></td></tr>";
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
                                                    $reqab = $bdd->prepare("SELECT * FROM demande WHERE type_dem='ABSENCE' AND mat_emp=? AND etat_dem=1");
                                                    $reqab->execute(array($_SESSION['mat_emp']));
                                                    while ($abinfo = $reqab->fetch()){
                                                                $date = ucfirst(strftime('%A, le %d ',strtotime($abinfo["dat_dem"])));
                                                                $date .= ucfirst(strftime('%B %Y ',strtotime($abinfo["dat_dem"])));
                                                                
                                                                $date1 = ucfirst(strftime('%A, le %d ',strtotime($abinfo["dat_deb_dem"])));
                                                                $date1 .= ucfirst(strftime('%B %Y ',strtotime($abinfo["dat_deb_dem"])));
                                                                
                                                                $date2 = ucfirst(strftime('%A, le %d ',strtotime($abinfo["dat_fin_dem"])));
                                                                $date2 .= ucfirst(strftime('%B %Y ',strtotime($abinfo["dat_fin_dem"])));
                                                                
                                                                echo "<tr><td>".$abinfo["cod_dem"]."</td><td>".$date."</td><td>".$date1."</td><td>".$date2."</td><td>".$abinfo["mat_int"]."</td><td>".$abinfo["lib_dem"]."</td></tr>";
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
         echo"<br/><br/><center><h1> Vous devez etre connecté pour acceder à cette page !</h1><br /> <a href='index.php'>Cliquez ici pour acceder à la page de connexion ! </a></center>";
     }
    ?>