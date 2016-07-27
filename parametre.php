<?php
session_start();
if(isset($_SESSION['mat_emp']))
		{
 include('include/header.php');
 ?>
    <div id="page_par">
        <div id="newmdp">
            <h3 class="titre">Modifier votre mot de passe</h3>
            <?php 
                if(isset($_GET['err']) AND $_GET['err'] == 1){
                    echo "<center><span style='color:red'><i>Les mots de passe doivent correspondre !</i></span></center>";
                }
                elseif (isset($_GET['err']) AND $_GET['err'] == 2) {
                    echo "<center><span style='color:lightgreen'><i>Mot de passe modifié avec succes !</i></span></center>";
                }
            ?>
            <div id="newmdp_cont">
                <form action="php/setPassword.php" method="post">
                    <p>
                        <label for="">Ancien mot de passe :</label>
                        <input type="password" name="last_pwd"/>
                    </p>
                    <p>
                        <label for="">Nouveau mot de passe :</label>
                        <input type="password" name="new_pwd"/>
                    </p>
                    <p>
                        <label for="">Confirmez le nouveau mot de passe :</label>
                        <input type="password" name="new_pwd_conf"/>
                    </p>
                    <input type="submit" value="Modifier"/>
                </form>
            </div>
        </div>
        
    </div>
 <?php
 include('include/footer.php');
 }
 else {
     echo"<br/><br/><center><h1> Vous devez etre connecté pour acceder à cette page !</h1><br /> <a href='index.php'>Cliquez ici pour acceder à la page de connexion ! </a></center>";

 }
 ?>