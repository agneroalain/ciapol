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
                
                <form method="post" id="formFormation" action="php/insertservice.php" class="colum">
                <center><h3 class="titre">INSCRIPTION SERVICE</h3></center>
                    <p>
                        <label for="">Theme de la formation :</label><input type="text" name="lib_ser" placeholder="" />
                    </p>
                    <p>
                        <label for="">Formateur :</label>
                        
                           
                           <input type="text" />
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
