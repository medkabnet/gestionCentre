<?php
    include 'dbcon.php';
        
    $sql = "INSERT INTO inscription (idVisiteur, idFormation) 
        VALUES (".$_COOKIE['cookieLogin'].", ".$_POST["formation"].")";
        echo $sql;
    if($conn->query($sql) === TRUE) {
        header("Location: ../pages/formation.php");
    }
    else{
        echo "Erreur: " . $sql . "<br>". $conn->error;
    }
    $conn->close();  