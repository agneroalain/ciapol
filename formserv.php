<?php session_start(); 
		include('include/connectdb.php');
		if(isset($_SESSION['mat_emp']))
		{
			$getmat=intval($_SESSION['mat_emp']);
            include('include/header.php');
            //* INSERT DU FORMULAIRE */
 ?>


<div id="page_space"></div>
<div id="cont_reg">
    		<div id="page_reg">
                
                <form method="post" id="formService" class="colum" action="php/insertservice.php">
                <center><h3 class="titre">INSCRIPTION SERVICE</h3></center>
                    <p>
                        <label for="">Nom du service :</label><input type="text" name="lib_ser" placeholder="" />
                    </p>
                    <p>
                        <label for="">Direction du service :</label>
                        
                           
                            <select name="cod_dir" id="nationnalites">
                                 <?php
                            
                                $reqdir = $bdd->query("SELECT * FROM direction");
                                
                                while($donne = $reqdir->fetch()) {
                                    echo "<option value=".$donne["cod_dir"].">".$donne['lib_dir']."</option>";
                                }
                                
                                  ?>
                            </select>
                    </p>
                    
                    
                    <input type="submit" value="valider"/>
                </form>
               
            </div>
    </div>
	<?php include("include/footer.php");
        }
        else {
            echo"<br/><br/><center><h1> Vous devez etre connecté pour acceder à cette page !</h1><br /> <a href='index.php'>Cliquez ici pour acceder à la page de connexion ! </a></center>";
        }
     ?>
