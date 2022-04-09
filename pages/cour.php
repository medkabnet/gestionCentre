<?php
    if(!isset($_COOKIE['cookieLogin']))
        header("Location: http://localhost/gestioncentre/pages/login.php");
    include '../php/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cours</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="container-md">

    <?php
        $sql = "SELECT *
            FROM cour
            WHERE  Cour.idCOur = ".$_GET['id'];
        //echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()) {
               ?> 
                    <h1>Titre du cour : 
                        <?php echo $row['titre'] ?>
                    </h1>

                    <p>
                        <?php echo $row['contenuCour'] ?>
                    </p>
                    
               <?php
            }
        }
        else{
            echo "0 results";
        }
        $conn->close();
    ?>
    </div>
</body>
</html>