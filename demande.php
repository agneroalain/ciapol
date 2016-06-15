<?php
session_start(); 
      include('include/header.php');
      echo '<br/> <br/> <br/>';
      
      switch ($_GET['type']) { 
          case 'CR':?>
               <center><h3 class="titre">DEMMANDE DE CONGE REFUSE</h3></center>
                        <center><i><font color="red"> <?php if (isset($_GET['er'])){echo $_GET['er'];} ?></font></i></center>
                            <table align="center" width="95%" border="1px">
                                <tr>
                                        <td>CODE</td><td>DATE DEMANDE</td><td>PERIODE</td><td>INTERIMAIRE</td><td>MOTIF</td><td>ACCEPTER</td>
                                    </tr>
                                <?php 
                                    include("include/connectdb.php");
                                    // recuperation de toutes lesinformation de congé de l'utilisateur
                                    $reqcong = $bdd->prepare("SELECT * FROM demande WHERE etat_dem=? AND type_dem=? AND dat_deb_dem>2016-06-15");
                                    $reqcong->execute(array(2,'CONGE'));
                                    
                                    while ($conginfo = $reqcong->fetch())
                                    {
                                        echo "<form method='post' action='php/validcong.php?cod=".$conginfo['cod_dem']."'><tr><td>".$conginfo["cod_dem"]."</td><td>".$conginfo["dat_dem"]."</td><td>".$conginfo["dat_deb_dem"]." au ".$conginfo["dat_fin_dem"]."</td><td>".$conginfo["mat_int"]."</td><td>".$conginfo["lib_dem"]."</td><td><input type='radio' name=".$conginfo['cod_dem']." value='1'/></td><td><input type='submit' value='OK' name='dem_at_cong' class='sub'/></td></tr>";
                                    }
                                    ?>  
                                    </form>
                                    
                                  
                            </table> 
                            <div class="lien_dem"><p><a href="demande.php?type=CR"> Liste des congés réfusés </a></p><p><a href="demande.php?type=CA"> Liste des congés acceptés </a></p><p><a href="demande.php?type=ALLC"> Liste de tout les congés </a></p></div>
                            <br /> <br /> <br />
                            <?php
              break;
              case 'CA':?>
                    <center><h3 class="titre">DEMMANDE DE CONGE ACCEPTE</h3></center>
                        <center><i><font color="red"> <?php if (isset($_GET['er'])){echo $_GET['er'];} ?></font></i></center>
                            <table align="center" width="95%" border="1px">
                                <tr>
                                        <td>CODE</td><td>DATE DEMANDE</td><td>PERIODE</td><td>INTERIMAIRE</td><td>MOTIF</td><td>REFUSER</td>
                                    </tr>
                                <?php 
                                    include("include/connectdb.php");
                                    // recuperation de toutes lesinformation de congé de l'utilisateur
                                    $reqcong = $bdd->prepare("SELECT * FROM demande WHERE etat_dem=? AND type_dem=? AND dat_deb_dem>2016-06-15");
                                    $reqcong->execute(array(1,'CONGE'));
                                    
                                    while ($conginfo = $reqcong->fetch())
                                    {
                                        echo "<form method='post' action='php/validcong.php?cod=".$conginfo['cod_dem']."'><tr><td>".$conginfo["cod_dem"]."</td><td>".$conginfo["dat_dem"]."</td><td>".$conginfo["dat_deb_dem"]." au ".$conginfo["dat_fin_dem"]."</td><td>".$conginfo["mat_int"]."</td><td>".$conginfo["lib_dem"]."</td><td><input type='radio' name=".$conginfo['cod_dem']." value='2'/></td><td><input type='submit' value='OK' name='dem_at_cong' class='sub'/></td></tr></form>";
                                    }
                                    ?>  
                                    
                            </table>
                            <div class="lien_dem"><p><a href="demande.php?type=CR"> Liste des congés réfusés </a></p><p><a href="demande.php?type=CA"> Liste des congés acceptés </a></p><p><a href="demande.php?type=ALLC"> Liste de tout les congés </a></p></div>
                               <br /> <br /> <br />
              <?php
              break;
              case 'ALLC':?>
                    <center><h3 class="titre">DEMMANDE DE CONGE ACCEPTE</h3></center>
                        <center><i><font color="red"> <?php if (isset($_GET['er'])){echo $_GET['er'];} ?></font></i></center>
                            <table align="center" width="95%" border="1px">
                                <tr>
                                        <td>CODE</td><td>DATE DEMANDE</td><td>PERIODE</td><td>INTERIMAIRE</td><td>MOTIF</td>
                                    </tr>
                                <?php 
                                    include("include/connectdb.php");
                                    // recuperation de toutes lesinformation de congé de l'utilisateur
                                    $reqcong = $bdd->prepare("SELECT * FROM demande WHERE type_dem=?");
                                    $reqcong->execute(array('CONGE'));
                                    
                                    while ($conginfo = $reqcong->fetch())
                                    {
                                        echo "<form method='post' action='php/validcong.php?cod=".$conginfo['cod_dem']."'><tr><td>".$conginfo["cod_dem"]."</td><td>".$conginfo["dat_dem"]."</td><td>".$conginfo["dat_deb_dem"]." au ".$conginfo["dat_fin_dem"]."</td><td>".$conginfo["mat_int"]."</td><td>".$conginfo["lib_dem"]."</td></tr></form>";
                                    }
                                    ?>  
                            </table>
                            <div class="lien_dem"><p><a href="demande.php?type=CR"> Liste des congés réfusés </a></p><p><a href="demande.php?type=CA"> Liste des congés acceptés </a></p><p><a href="demande.php?type=ALLC"> Liste de tout les congés </a></p></div>
                            <br /> <br /> <br />
              <?php
              break;
              case 'AR':?>
                    <center><h3 class="titre">DEMMANDE DE CONGE ACCEPTE</h3></center>
                        <center><i><font color="red"> <?php if (isset($_GET['er'])){echo $_GET['er'];} ?></font></i></center>
                            <table align="center" width="95%" border="1px">
                                <tr>
                                        <td>CODE</td><td>DATE DEMANDE</td><td>PERIODE</td><td>INTERIMAIRE</td><td>MOTIF</td>
                                    </tr>
                                <?php 
                                    include("include/connectdb.php");
                                    // recuperation de toutes lesinformation de congé de l'utilisateur
                                    $reqcong = $bdd->prepare("SELECT * FROM demande WHERE type_dem=?");
                                    $reqcong->execute(array('CONGE'));
                                    
                                    while ($conginfo = $reqcong->fetch())
                                    {
                                        echo "<form method='post' action='php/validcong.php?cod=".$conginfo['cod_dem']."'><tr><td>".$conginfo["cod_dem"]."</td><td>".$conginfo["dat_dem"]."</td><td>".$conginfo["dat_deb_dem"]." au ".$conginfo["dat_fin_dem"]."</td><td>".$conginfo["mat_int"]."</td><td>".$conginfo["lib_dem"]."</td></tr></form>";
                                    }
                                    ?>  
                            </table>
                            <div class="lien_dem"><p><a href="demande.php?type=CR"> Liste des congés réfusés </a></p><p><a href="demande.php?type=CA"> Liste des congés acceptés </a></p><p><a href="demande.php?type=ALLC"> Liste de tout les congés </a></p></div>
                            <br /> <br /> <br />
              <?php
              break;
                          
          default:
              echo 'nono';
              break;
      }
      
      
      
      
      
     
      include('include/footer.php');
 ?>