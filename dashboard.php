<?php session_start();
		include('include/connectdb.php');
		if(isset($_SESSION['mat_emp']))
		{
         include("include/header.php")
?>

<div id="page_space"></div>
<div id="cont_dash">
   <div id="dash"> <!-- Debut  dash -->
        <div class="flex"> <!-- debut flex -->
            <div class="col"> <!-- debut col 1 -->
                <div id="dash_400"><!-- debut dash emp -->
                    <center><h3 class="titre">EMPLOYE</h3></center>
                    <table>
                        <tr>
                            <td>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </td> 
                            <td>
                                <a href="register.php">Ajouter un employé </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </td>
                            <td>
                                <a href="recherche.php">Liste des employés  </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="assets/ico/editer.png" class="ico" />
                            </td> 
                            <td>
                                <a href="register.php">Editer les informations d'un employé </a>
                            </td>                              
                        </tr>
                    </table>
                </div><!-- fin dash emp -->
                <div id="dash_400"><!-- debut dash serv -->
                    <center><h3 class="titre">SERVICE</h3></center>
                    <table>
                        <tr>
                            <td>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </td>
                            <td>
                                <a href="formserv.php">Ajouter un service </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </td>
                            <td>
                                Retirer un service 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </td>
                            <td>
                                Editer les informations d'un service 
                            </td>
                        </tr>
                    </table>
                </div><!-- fin dash service -->
                <div id="dash_400"><!-- debut dash formation -->
                    <center><h3 class="titre">FORMATION</h3></center>
                    <table>
                        <tr>
                            <td>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </td> 
                            <td>
                                <a href="formFormation.php">Ajouter une formation </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </td>
                            <td>
                                <a href="listeFormation.php">Liste des formations  </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="assets/ico/editer.png" class="ico" />
                            </td> 
                            <td>
                                <a href="formFormation.php">Editer les informations sur une formation </a>
                            </td>                              
                        </tr>
                    </table>
                </div><!-- fin dash emp -->
            </div><!-- fin dash col 1 -->
            <div class="col"><!-- debut col 2 -->
                <div id="dash_cong"><!-- debut dash cong -->
                    <center><h3 class="titre">DEMMANDE DE CONGE</h3></center>
                    <center>
                        <i>
                            <font color="red"> 
                                <?php 
                                    if (isset($_GET['er'])){
                                        echo $_GET['er'];
                                    } 
                                ?>
                            </font>
                        </i>
                    </center>
                    <table width="95%" align="center">
                        <tr>
                            <td>
                                CODE
                            </td>
                            <td>
                                DATE
                            </td>
                            <td>
                                PERIODE
                            </td>
                            <!--
                            <td>
                                INTERIMAIRE
                            </td>
                            -->
                            <td>
                                MOTIF
                            </td>
                            <td>
                                A DEDUIR
                            </td>
                            <td>
                                A
                            </td>
                            <td>
                                R
                            </td>
                        </tr>
                        <?php 
                            include("include/connectdb.php");
                            // recuperation de toutes lesinformation de congé de l'utilisateur
                            $reqcong = $bdd->prepare("SELECT * FROM demande WHERE etat_dem=? AND type_dem=?");
                            $reqcong->execute(array(0,'CONGE'));
                            
                            while ($conginfo = $reqcong->fetch())
                            {
                                echo "<form method='post' action='php/validcong.php?cod=".$conginfo['cod_dem']."'><tr><td>".$conginfo["cod_dem"]."</td><td>".$conginfo["dat_dem"]."</td><td>".$conginfo["dat_deb_dem"]." au ".$conginfo["dat_fin_dem"]."</td><!-- <td>".$conginfo["mat_int"]."</td> --><td>".$conginfo["lib_dem"]."</td><td><input type='checkbox' name='ded'/></td><td><input type='radio' name=".$conginfo['cod_dem']." value='1'/></td><td><input type='radio' name=".$conginfo['cod_dem']." value='2'/></td><td><input type='submit' value='OK' name='dem_at_cong' class='sub   table_bt'/></td></tr></form>";
                            }
                        ?>         
                    </table>
                    <div class="lien_dem"><!-- debut lien demande -->
                        <p>
                            <a href="demande.php?type=CR"> 
                                Liste des congés réfusés 
                            </a>
                        </p>
                        <p>
                            <a href="demande.php?type=CA"> 
                                Liste des congés acceptés 
                            </a>
                        </p>
                        <p>
                            <a href="demande.php?type=ALLC"> 
                                Liste de tout les congés 
                            </a>
                        </p>
                    </div><!-- fin lien demande -->             
                </div><!-- fin dash cong -->
                <div id="dash_abs"><!-- debut dash absence -->
                    <center><h3 class="titre">DEMMANDE D'ABSENCE</h3></center>
                    <table width="95%" align="center">
                        <tr>
                            <td>
                                CODE
                            </td>
                            <td>
                                DATE
                            </td>
                            <td>
                                PERIODE
                            </td>
                            <!--
                            <td>
                                INTERIMAIRE
                            </td>
                            -->
                            <td>
                                MOTIF
                            </td>
                            <td>
                                ACCEPTER
                            </td>
                            <td>
                                REFUSER
                            </td>
                        </tr>
                        <?php 
                            include("include/connectdb.php");
                             // recuperation de toutes lesinformation d'absence de l'utilisateur
                             $reqab = $bdd->prepare("SELECT * FROM demande WHERE etat_dem=? AND type_dem=?");
                             $reqab->execute(array(0,'ABSENCE'));
                             while ($abinfo = $reqab->fetch())
                             {
                                echo "<form method='post' action='php/validab.php?cod=".$abinfo['cod_dem']."'><tr><td>".$abinfo["cod_dem"]."</td><td>".$abinfo["dat_dem"]."</td><td>".$abinfo["dat_deb_dem"]." - ".$abinfo["dat_fin_dem"]."</td><!-- <td>".$abinfo["mat_int"]."</td> --><td>".$abinfo["lib_dem"]."</td><td><input type='radio' name=".$abinfo['cod_dem']." value='1'/></td><td><input type='radio' name=".$abinfo['cod_dem']." value='2'/></td><td><input type='submit' value='OK' name='dem_at_cong' class='sub'/></td></tr></form> ";
                             }
                         ?>
                    </table>
                    <div class="lien_dem"><!-- debut lien demande absence -->
                        <p>
                            <a href="demande.php?type=AR"> 
                                Liste des absences réfusées 
                            </a>
                        </p>
                        <p>
                            <a href="demande.php?type=AA"> 
                                Liste des absences acceptées 
                            </a>
                        </p>
                        <p>
                            <a href="demande.php?type=ALLA"> 
                                Liste de tout les absences 
                            </a>
                        </p>
                    </div><!-- fin lien demande absence -->
                </div><!-- fin dash absence -->
            </div><!-- fin col 2 -->
        </div><!-- fin flex -->
   </div><!-- Fin Dash -->
</div>
<br />
<br />
<br />
<?php
        include("include/footer.php");
    }
    else {
            echo"<br/><br/><center><h1> Vous devez etre connecté pour acceder à cette page !</h1><br /> <a href='index.php'>Cliquez ici pour acceder à la page de connexion ! </a></center>";
    }
?>
	
