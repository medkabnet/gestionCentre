<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db_name="gestioncentre";

    // Create connection
    $conn = new mysqli($servername, $username, $password ,$db_name );
    // Check connection
    if ($conn->connect_error){
        die("Erreur de connexion: ". $conn->connect_error);
    }
    //echo "Connected";