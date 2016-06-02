<?php 
    session_start();
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
?>
