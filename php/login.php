<?php
    include 'dbcon.php';

    try {
        $sql = "SELECT * FROM utilisateur WHERE email LIKE '".$_POST['email']."'";
        //echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                //echo "Valide";
                if (password_verify($_POST["pwd"], $row['motDePass'])) {
                    //echo "Valide";
                    setCookie("cookieLogin",$row['idUtilisateur'],time()+(3600*24),"/gestioncentre/");
                    $_SESSION["idUs"] = $row['idUtilisateur'];
                    header("Location: http://localhost/gestioncentre/pages/formation.php");
                } 
                else{
                    echo "non valide";
                }
                
                //echo "id: " . $row["id"]. " - Name: " . $row["nom"]. " " . $row["pre"]. "<br>";
            }
        }
        else{
            echo "0 results";
        }
        $conn->close();
    } catch (Throwable $th) {
        echo $th;
    }
   