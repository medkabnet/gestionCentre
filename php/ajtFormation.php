<?php
    include_once './dbcon.php';
    if(isset($_POST['function']) ){
        if( $_POST['function'] == "ajtFormation"){
            $titreFromation = $_POST['nomFormation'];
            $idRes = $_POST["idRes"];
            $titreFromation = str_replace("'","\'",$titreFromation);
            $titreFromation = str_replace('"','\"',$titreFromation);
            $sql = "INSERT INTO formation (nomFomration, idResponsable)
            VALUES ('".$titreFromation."', ".$idRes.")";
            if($conn->query($sql) === TRUE) {
                echo "Bien ajouter";
            }
            else{
                echo "Erreur: " . $sql . "<br>". $conn->error;
            }
            $conn->close();
        } 
        if( $_POST['function'] == "listFormation"){
            $sql = "SELECT nomFomration , nom , prenom FROM utilisateur, formation
            WHERE idResponsable = idUtilisateur";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $list[] = $row;
                }
                echo json_encode($list);
            }
            $conn->close();
        }
    }
