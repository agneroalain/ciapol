<?php 
	session_start();

include('include/connectdb.php');
if(isset($_POST["formco"]))
{
	if(!empty($_POST['mail']))
	{
		if(!empty($_POST['mdp']))
		{
			$mail = htmlspecialchars($_POST['mail']);
			$mdp = $_POST['mdp']; // à acher aves sha1  sha1($_POST['mdp'])
			$reqemp = $bdd->prepare("SELECT * FROM employe WHERE mail_emp=? AND mdp_emp=?");
			$reqemp->execute(array($mail,$mdp));
			$userexist=$reqemp->rowCount();
			if($userexist==1)
			{
				$userinfo = $reqemp->fetch();
                $_SESSION['mat_emp'] = $userinfo['mat_emp'];
				$_SESSION['nom_emp'] = $userinfo['nom_emp'];
				$_SESSION['pnom_emp'] = $userinfo['pnom_emp'];
                $_SESSION['mail_emp'] = $userinfo['mail_emp'];
                $_SESSION['photoprof_emp'] = $userinfo['photoprof_emp'];
                $_SESSION['cont_emp'] = $userinfo['cont_emp'];
                $_SESSION['fonct_emp'] = $userinfo['fonct_emp'];
				$_SESSION['role_id'] = $userinfo['role_id'];
				header('location:interface.php');    
			}
			else
			{
				$erreur = "Mauvais mail ou mot de passe !";
			}
		}
		else
		{
			$erreur = " Il manque le mot de passe !";
		}
	}
	else
	{
		$erreur = " Il manque le mail !";
	}
}
?>
<body>
<?php include("include/header.php") ?>
	<div id="page">
		<?php if(isset($_SESSION['mat_emp']) AND !empty($_SESSION['mat_emp'])){ echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<center><h1><font color='white'>VOUS ETE CONNECTE A VOTRE ESPACE EMPLOYE CIAPOL</font></h1></center>";}else{ ?>
		<div id="contenu">
			<form method="POST" class="colum">
				<?php
					if(isset($erreur))
					{
						echo "<center><i><font color='red'>".$erreur."</font></i></center>";
					}
				?>
				<input type="text" id="mail" name="mail" placeholder="Votre mail ICI*" />
				<input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe ICI*" />
				<input type="submit" value="Se connecter" name="formco"/>
			</form>
		</div>
		<?php } ?>
		<?php include("include/footer.php"); ?>
	</div>
