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
    <title>Formation</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>Formation</h1>
    <?php
    $sql = "SELECT formation.idFormation,formation.nomFomration 
        From formation, 
            (SELECT inscription.idFormation as idF
            From inscription 
            WHERE inscription.idVisiteur = ".$_COOKIE['cookieLogin'].") as r1
        WHERE formation.idFormation <> r1.idF";
        $result1 = $conn->query($sql);
        if($result1->num_rows > 0):
            
            ?>
            <h3>S'inscrire a une nouvelle formation</h3>
            <form action="../php/insFrom.php" method="post" class="container-md rounded border border-2 p-3">
                <select name="formation">
            <?php
            while($row = $result1->fetch_assoc()) :
               ?> 
                    <option value="<?php echo $row['idFormation'] ?>">
                        <?php echo $row['nomFomration'] ?>
                    </option>
                <?php
            endwhile
            ?>
            </select>
            <input type="submit" value="S'inscrire"/>
            </form>
        <?php
        endif
    ?>
       
    <h3>Mes Formations</h3>
    <?php
        $sql = "SELECT Formation.nomFomration 
        FROM Formation, Inscription 
        WHERE Inscription.idVisiteur = ".$_COOKIE['cookieLogin']."   ".
        "AND Inscription.idFormation = Formation.idFormation";
        //echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
               ?> 
                    <div>
                        <a href="./cours.php?nom=<?php echo $row["nomFomration"]?>" >                                                                                                              "] ?>">
                            <?php echo $row["nomFomration"] ?>
                        </a>
                    </div>
                <?php
            }
        }
        else{
            echo "0 results";
        }
        $conn->close();
    ?>

</body>
</html>