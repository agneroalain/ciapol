<?php 
    session_start();
		include('include/connectdb.php');
		if(isset($_SESSION['mat_emp']))
		{
            include('include/header.php');
?>
<div id="doc">
    <div id="message">
        <h1>TELECHARGEMENT DU FICHIER</h1>
    </div>
    <iframe
        src="files/<?php echo $_GET['doc'] ?>" width="100%" height="100%" align="middle">
    </iframe>
    
</div>
<?php 
    include('include/footer.php');
        }
        else {
            echo"<br/><br/><center><h1> Vous devez etre connecté pour acceder à cette page !</h1><br /> <a href='index.php'>Cliquez ici pour acceder à la page de connexion ! </a></center>";
        }
?>
