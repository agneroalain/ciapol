<?php session_start();
		include('include/connectdb.php');
		if(isset($_SESSION['mat_emp']))
		{
         include("include/header.php")
?>

<div id="page_space"></div>
<div id="cont_dash">
    
    		<div id="dash">
                <!--<center><h3 class="titre">DASHBOARD</h3></center>-->
                <div class="flex">
                     <div id="dash_emp">
                    <center><h3 class="titre">EMPLOYE</h3></center>
                       <table>
                            <tr>
                                
                                <td><img src="assets/ico/ajouter.png" class="ico" /></td> <td><a href="register.php">Ajouter un employé </a></td>
                            </tr>
                            <tr>
                               <td><img src="assets/ico/retirer.png" class="ico" /></td><td><a href="recherche.php">Liste des employés  </a></td>
                                
                            </tr>
                            <!--<tr>
                               <td><img src="assets/ico/editer.png" class="ico" /></td> <td><a href="register.php">Editer les informations d'un employé </a></td>                              
                            </tr>-->
                       </table>
                </div>
                
                <div id="dash_cong">
                    <center><h3 class="titre">DEMMANDE DE CONGE</h3></center>
                        <center><i><font color="red"> <?php if (isset($_GET['er'])){echo $_GET['er'];} ?></font></i></center>
                            <table width="100%">
                                <tr>
                                        <td>code</td><td>date demande</td><td>periode</td><td>interimaire</td><td>motif</td><td>accepter</td><td>réfuser</td>
                                    </tr>
                                <?php 
                                    include("include/connectdb.php");
                                    // recuperation de toutes lesinformation de congé de l'utilisateur
                                    $reqcong = $bdd->prepare("SELECT * FROM demande WHERE etat_dem=? AND type_dem=?");
                                    $reqcong->execute(array(0,'CONGE'));
                                    
                                    while ($conginfo = $reqcong->fetch())
                                    {
                                        echo "<form method='post' action='php/validcong.php?cod=".$conginfo['cod_dem']."'><tr><td>".$conginfo["cod_dem"]."</td><td>".$conginfo["dat_dem"]."</td><td>".$conginfo["dat_deb_dem"]." au ".$conginfo["dat_fin_dem"]."</td><td>".$conginfo["mat_int"]."</td><td>".$conginfo["lib_dem"]."</td><td><input type='radio' name=".$conginfo['cod_dem']." value='1'/></td><td><input type='radio' name=".$conginfo['cod_dem']." value='2'/></td><td><input type='submit' value='OK' name='dem_at_cong' class='sub'/></td></tr>";
                                    }
                                    ?>  
                                    </form>
                                    
                            </table>
                             <div class="liste">  <a href=""> Listes des demmandes refusées </a> <a href="">Listes des demmandes acceptées</a></div>
                                 
                </div>
            </div>
                <div class="flex">
               <div id="dash_emp">
                    <center><h3 class="titre">SERVICE</h3></center>
                       <table>
                            <tr>
                                <td><img src="assets/ico/ajouter.png" class="ico" /></td> <td><a href="formserv.php">Ajouter un service </a></td>
                                
                            </tr>
                            <tr>
                               
                                <td><img src="assets/ico/retirer.png" class="ico" /></td><td>Retirer un service </td>
                            </tr>
                            <tr>
                               <td><img src="assets/ico/editer.png" class="ico" /></td> <td>Editer les informations d'un service </td>
                                
                            </tr>
                       </table>
                </div>
                <div id="dash_abs">
                    <center><h3 class="titre">DEMMANDE D'ABSENCE</h3></center>
                        <table width="100%">
                           <tr>
                                <td>code</td><td>date demande</td><td>periode</td><td>interimaire</td><td>motif</td><td>accepter</td><td>réfuser</td>
                            </tr>
                           <?php 
                            include("include/connectdb.php");
                            echo "";
                             // recuperation de toutes lesinformation d'absence de l'utilisateur
                             $reqab = $bdd->prepare("SELECT * FROM demande WHERE etat_dem=? AND type_dem=?");
                             $reqab->execute(array(0,'ABSENCE'));
            
                             while ($abinfo = $reqab->fetch())
                               {
                                   echo "<form method='post' action='php/validab.php?cod=".$abinfo['cod_dem']."'><tr><td>".$abinfo["cod_dem"]."</td><td>".$abinfo["dat_dem"]."</td><td>".$abinfo["dat_deb_dem"]." - ".$abinfo["dat_fin_dem"]."</td><td>".$abinfo["mat_int"]."</td><td>".$abinfo["lib_dem"]."</td><td><input type='radio' name=".$abinfo['cod_dem']." value='1'/></td><td><input type='radio' name=".$abinfo['cod_dem']." value='2'/></td><td><input type='submit' value='OK' name='dem_at_cong' class='sub'/></td></tr></form> ";
                               }
                              ?>
                       </table>
                              <div class="liste">  <a href=""> Listes des demmandes refusées </a> <a href="">Listes des demmandes acceptées</a></div>   
                </div>
               </div>
            </div>
    </div>
    <br>
    <br>
    <br>
    <?php
        if(isset($_POST['dem_at_congdemcong']))
        {
            
        }
    ?>
	<?php include("include/footer.php");} ?>
