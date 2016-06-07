<?php 
session_start();
if(isset($_SESSION['mat_emp']))
		{
    include("include/header.php");
?>
<br><br><br><br>

<?php
 phpinfo() ;
?>
<?php
    if(isset($table) AND isset($propriete)){
        $req = "SELECT * FROM ".$table." WHERE ".$propriete."=".$val."";
        echo $req;
    }
    
?>
<?php 
    include("include/footer.php");
        }
        else {
             echo"<br/><br/><center><h1> Vous devez etre connecté pour acceder à cette page !</h1><br /> <a href='index.php'>Cliquez ici pour acceder à la page de connexion ! </a></center>";
        }
?>