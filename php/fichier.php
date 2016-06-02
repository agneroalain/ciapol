<?php
                                session_start();
                                if (!empty($_FILES)) {
                                    $nom_fichier = $_FILES['fic']['name'];
                                    $extension_fichier = strrchr($nom_fichier,'.');// recuperésans le point
                                    $fichiertemporaire = $_FILES['fic']['tmp_name'];
                                    $fichier_dest = '../files/'.$nom_fichier;
                                    $extension_autorise = array('.pdf','.PDF','.jpg','.JPG','.doc','.docx');
                                    $erreur_fichier = $_FILES['fic']['error'];
                                    $typ_doc = $_POST['typefic'];
                                    $id = $_SESSION['mat_emp'];
                                    if (in_array($extension_fichier,$extension_autorise)) {
                                        
                                        if(move_uploaded_file($fichiertemporaire,$fichier_dest) AND $erreur_fichier == 0 )
                                        {
                                            include('../include/connectdb.php');
                                            $req = $bdd->prepare('INSERT INTO fichier (nom, chemin, type, ext_fichier, mat_emp) VALUES (?, ?, ?, ?, ?)');
                                            $req->execute(array($nom_fichier,$fichier_dest,$typ_doc,$extension_fichier,$id));
                                            header("location:../interface.php");
                                        }
                                        else {
                                            echo "erreur lors de l'envoi du fichier";
                                        }
                                    }
                                    else {
                                        echo "<center><h1>ce format de fichier n'est pas autorisé<h1><br><a href='../interface.php'><h5>Retour à la page precedente!<h5></a></center>";
                                    }   
                                }
?>