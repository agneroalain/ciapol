<?php
session_start();
if(isset($_SESSION['mat_emp']))
		{
 include('include/header.php');
 ?>
    <div id="page_par">
        <div id="newmdp">
            <h3 class="titre">Modifier votre mot de passe</h3>
            <div id="newmdp_cont">
                <form action="#" method="post">
                    <label for="">Saisissez le nouveau mot de passe :</label>
                    <input type="password" name="new_pwd"/>
                    <label for="">Confirmez le nouveau mot de passe :</label>
                    <input type="password" name="new_pwd_conf"/>
                    <input type="submit" value="Modifier"/>
                </form>
            </div>
        </div>
        <div id="newmdp">
            <h3 class="titre">Supprimer une demande de congé</h3>
            <div id="newmdp_cont">
                <form action="#" method="post">
                    <label for="">Saisissez le nouveau mot de passe :</label>
                    <input type="password" name="new_pwd"/>
                    <label for="">Confirmez le nouveau mot de passe :</label>
                    <input type="password" name="new_pwd_conf"/>
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