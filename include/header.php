<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<meta charset="UTF-8"/>
		<title>CIAPOL - Centre Ivoirien Anti Polution</title>
		<script src='js/jquery-1.12.2.min.js'></script>
		<script src="js/tab.js"></script>
		<script type="text/javascript" src="js/overlay.js">
		</script>
		<script type="text/javascript" src="js/demandecong.js">
		</script>
		<script type="text/javascript" src="js/divcouliss.js">
		</script>
	</head>
	<body>
		<header>
				<img id="logo" src="assets/images/logo.png"/>
				<?php if(isset($_SESSION['mat_emp']) AND !empty($_SESSION['mat_emp'])){ ?>
				<nav>
					<ul>
						<li><a href="interface.php">Mon compte</a></li>
						<?php
							if(isset($_SESSION['role_id'])){
								if($_SESSION['role_id']){
						?>
						<li><a href="dashboard.php">Tableau de bord</a></li><?php } } ?>
						<li><a onclick=" hidenot();">Notifications</a></li>
						<div id="notif" class='nothide'>
							<ul>
								    <?php
										include('connectdb.php');
										$req = $bdd->prepare('SELECT * FROM notification WHERE mat_emp="'.$_SESSION["mat_emp"].'" AND etat_notif=0');
									
										$req->execute();
										$i=0;
										while ($not = $req->fetch()) {
											$i++;
											if($not['type_notif'] == '1'){ $typ = 'absence';}else{ $col = 'conge';}
											echo "<a href='notification.php?id=".$not['cod_dem']."'><li class='not'><div class='notimg'></div><div class='notdesc'>".$not['lib_notif']."</div><div class='notdate'></div></li>";
										}
										
										?>
										<li><a href='#'> HOSTORIQUE DES NOTIFICATIONS </a></li>
							</ul>
						</div>
						<?php
						if($i != 0){
							echo"<span id='nbr_notif'>".$i."</span>";
						}
						  ?>
						<li><a href="parametre.php">Paramètres</a></li>
						<li><a href="php/deconnexion.php">Se déconnecter</a></li>
					</ul>
				</nav><?php } ?>
		</header>