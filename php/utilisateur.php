<?php
    require_once "./dbcon.php";
    if(isset($_GET['role']) && isset($_GET['idUtilisateur'])){
        $sql = "UPDATE utilisateur SET role = '".$_GET['role']."'  WHERE idUtilisateur = ".$_GET['idUtilisateur'];
        if($conn->query($sql) ===true)
            echo "Bien modifier";
        else {
            echo "Erreur";
        }
    }
    if(isset($_GET['idSupprimer'])){
        $sql = "DELETE utilisateur WHERE idUtilisateur = ".$_GET['idSupprimer'];
        if($conn->query($sql) ===true)
            echo "Bien Supprimer";
        else {
            echo "Erreur";
        }
    }