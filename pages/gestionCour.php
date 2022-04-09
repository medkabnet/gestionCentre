<?php
    require_once "../php/dbcon.php";
    // if(!isset($_COOKIE['cookieLogin']))
    //     header("Location: ./login.php");
    // else{
    //    $sql = "SELECT role FROM utilisateur WHERE idUtilisateur = ".$_COOKIE['cookieLogin'];
    //    $result = $conn->query($sql);
    //    if($result->num_rows > 0){
    //        while($row = $result->fetch_assoc()){
    //            if($row['role'] !== "res"){
    //                 header("Location: ./403.php");
    //            }
    //        }
    //    }
    // }
    setCookie("cookieLogin",5,time()+(3600*24),"/gestioncentre/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.js"></script>
    <title>Gestion des cours</title>
</head>
<body>
    <!-- Debut block recherche -->
    <div class="container-md">
        <div class="row">
            <div class="col-md-4">
                <label for="">Nom de la formation</label>
            </div>
            <div class="col-md-4">
                <?php 
                    $sql="SELECT idFormation,nomFomration FROM formation WHERE idResponsable = ".$_COOKIE['cookieLogin'];
                    $result = $conn->query($sql);
                    if($result->num_rows >0){
                        ?>
                <select name="" id="formation"  class="form-select">        
                        <?php
                        while($row = $result->fetch_assoc()){
                    ?>
                        <option value="<?php echo $row['idFormation'];?>"><?php echo $row['nomFomration'];?></option>
                    <?php    
                        }
                        ?>
                </select>    
                    <?php
                        
                    }
                    else
                        echo "Désoler aucune formation n'est attribué pour vous";
                ?>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" id="afficher">Afficher</button>
            </div>
        </div>
    </div>
    <!-- Fin block recherche -->

    <!-- Debut block list des cours -->
    <div class="container-md" id="listcour">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    Selectioner un formation
                </p>
            </div>
        </div>
    </div>
    <!-- Fin block list des cours -->

    <!-- Debut block saisie -->
    <div class="container-md d-none" id="saisi">
        <div class="row">
            <div class="col-md-6">
                <label for="">Titre de cour</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="" class="form-control" id="titre">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="">Contenu du cour</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"> 
                <textarea class="form-control" name="" id="contenu" cols="120" rows="10">
                </textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"> 
                <button class="btn btn-success" id="ajouter">Ajouter</button>
                <button class="btn btn-primary d-none" id="modifier">Modifier</button>
            </div>
        </div>
    </div>
    <!-- Fin block saisie -->
    <script src="../js/gestioncour.js?v=0.0.3"></script>
</body>
</html>