<?php
session_start();
 if(isset($_POST['demandecong']))
 {
     include('include/connectdb.php');
     
     $datdeb = $_POST['congdep'];
     $datfin = $_POST['congret'];
     $obs = $_POST['congmot'];
     $mat = $_SESSION['mat_emp'];
     $interim = "ok";
     $todayh = getdate();
     $d = $todayh['mday'];
     $m = $todayh['mon'];
     $y = $todayh['year'];
     $dat = $d.'-'.$m.'-'.$y;
    //$q = "INSERT INTO 'conge'('dat_deb_cong', 'dat_fin_cong', 'obs_cong', 'mat_emp', 'interimaire', 'dat_cong') VALUES(:dat_deb_cong, :dat_fin_cong, :obs_cong, :mat_emp, :interimaire, :dat_cong);";
    //$query = $bdd->prepare($q);
    /*$result = $query->execute(array(
        ":dat_deb_cong" => $datdeb,
        ":dat_fin_cong" => $datfin,
        ":obs_cong" => $obs,
        ":mat_emp" => $mat,
        ":interimaire" => $interim,
        ":dat_cong" => $dat
    ));*/
    $sql = "INSERT INTO `conge` (`cod_cong`, `dat_deb_cong`, `dat_fin_cong`, `obs_cong`, `mat_emp`, `interimaire`, `dat_cong`) VALUES (NULL, \'2016-04-19\', \'2016-04-22\', \'azert\', \'A2A2A2\', \'zerezrez\', \'2016-04-20\')";
    $q = $bdd->query($sql);
    //$result = $q->execute();
    echo "abab";
}
?>