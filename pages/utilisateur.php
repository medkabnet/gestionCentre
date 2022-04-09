<?php
    require_once "../php/dbcon.php";
    if(!isset($_COOKIE['cookieLogin']))
        header("Location: ./login.php");
    else{
       $sql = "SELECT role FROM utilisateur WHERE idUtilisateur = ".$_COOKIE['cookieLogin'];
       $result = $conn->query($sql);
       if($result->num_rows > 0){
           while($row = $result->fetch_assoc()){
               if($row['role'] !== "admin"){
                    header("Location: ./403.php");
               }
           }
       }
    }

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
    <title>Utilisateur</title>
</head>
<body>  
    <div class="container-md">
    <?php
        $sql = "SELECT idUtilisateur, nom , prenom ,role FROM utilisateur";
        $resulta = $conn->query($sql);
        if($resulta->num_rows > 0){
            while($row = $resulta->fetch_assoc()) {
                ?>
                <div class="row border border-dark" id="row_<?php echo $row["idUtilisateur"]; ?>">
                    <div class="col-2">
                      <?php echo $row["idUtilisateur"]; ?>  
                    </div>
                    <div class="col-2">
                        <?php echo $row["nom"]; ?>  
                    </div>
                    <div class="col-2">
                        <?php echo $row["prenom"]; ?> 
                    </div>
                    <div class="col-2">
                        <select name="" id="rol_<?php echo $row["idUtilisateur"]; ?>"></select>
                            <option value="" <?php if($row['role'] == "visiteur") echo "selected"; ?> >visiteur</option>
                            <option value="" <?php if($row['role'] == "admin") echo "selected"; ?> >admin</option>
                            <option value="" <?php if($row['role'] == "res") echo "selected"; ?> >res</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary modifier" id_utilisateur="<?php echo $row["idUtilisateur"]; ?>">Modifier</button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-danger supprimer" id_utilisateur="<?php echo $row["idUtilisateur"]; ?>">Supprimer</button>
                    </div>
                </div>
                <?php
            }
        }
        else 
            echo "0 Resulta";
    ?> 
    </div>
    <script>
        let bouttonModifier = document.getElementsByClassName("modifier");
        for(var i = 0 ; i < bouttonModifier.length ; i++){
            bouttonModifier[i].addEventListener("click",(e)=>{
                let btn = e.target;
                let id  = btn.getAttribute("id_utilisateur");
                let ro = document.getElementById("rol_"+id).value;
                $.ajax({
                    url : "../php/utilisateur.php",
                    method : "get",
                    data : {role : ro ,idUtilisateur : id },
                    success : (rep)=>{
                        alert(rep);
                    }
                })
            })
        }

        let bottonSupprimer = document.getElementsByClassName("supprimer");
        for(var i = 0 ; i < bottonSupprimer.length ; i++){
            bottonSupprimer[i].addEventListener('click',e=>{
                let btn = e.target;
                let id  = btn.getAttribute("id_utilisateur");
                $.ajax({
                    url : "../php/utilisateur.php",
                    method : "get",
                    data : {idSupprimer : id },
                    success : (rep)=>{
                        alert(rep);
                        if(rep === "Bien Supprimer"){
                            document.getElementById("row_"+id).remove();
                        }
                    }
                })
            })
        }
    </script>
</body>
</html>


