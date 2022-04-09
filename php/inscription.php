<?php
    include 'dbcon.php';
    $options = [
        'cost' => 11,
    ];
    $hashPWD = password_hash($_POST["pwd"], PASSWORD_BCRYPT, $options);
        
    $sql = "INSERT INTO utilisateur (nom, prenom, email ,motdepass) VALUES ('".$_POST["nom"]."', '".$_POST["prenom"]."', '".$_POST["email"]."' ,'".$hashPWD ."')";
    if($conn->query($sql) === TRUE) {
        ?>

        <?php
    }
    else{
        echo "Erreur: " . $sql . "<br>". $conn->error;
    }
    $conn->close();                                                                               
