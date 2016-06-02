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
                <center><h3 class="titre">INSCRIPTION SERVICE</h3></center>
                <form method="post" action="php/insertservice.php">
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
     ?>
