<?php 
session_start();
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
?>