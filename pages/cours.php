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
    <h1>Cours de la formation : <?php echo $_GET ['nom'] ?></h1>
    <div class="container-md">

    <?php
        $sql = "SELECT Cour.idCOur,cour.titre
            FROM Formation,cour
            WHERE Formation.nomFomration Like '". $_GET ['nom'] ."'".
                " AND Formation.idFormation = Cour.idFormation";
        //echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()) {
               ?> 
                    <div class ="row">
                        <div class="col-md-3">
                            <?php
                                $sql = "SELECT * From historique  Where idFormation = " .$row['idCOur']."  AND idVisiteur  = " .$_COOKIE['cookieLogin'];
                                // echo $sql;
                                // $result2 = $conn->query($sql);
                                // if($result2->num_rows > 0){
                                //     echo "lu";
                                // else {
                                //     echo "non lu";
                                // }
                            ?>
                        </div>
                        <div class="col-md-9">
                            <a href="./cour.php?id=<?php echo $row["idCOur"] ?>">
                                <?php echo $row["titre"] ?>
                            </a>
                        </div>
                    </div>
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