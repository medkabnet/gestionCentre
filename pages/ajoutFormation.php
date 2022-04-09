<?php
if(!isset($_COOKIE['cookieLogin']))
    header("Location: ../pages/login.php");
include_once '../php/dbcon.php';
$nomComplet ;
$sql = "SELECT * FROM utilisateur WHERE idUtilisateur  =".$_COOKIE['cookieLogin'];
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
       if($row['role'] != 'admin')
        header("Location : ../pages/403.php");
        else{
            $nomComplet = $row["nom"]." ".$row["prenom"];
        }
    }
}else{
    header("Location : ../index.php");
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
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Ajouter une formation</title>
    <style>
        #header{
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <div class="container-fluid" id="header">
        <div class="row p-3">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <p class="text-center">
                    <?php 
                        echo $nomComplet;
                    ?>
                </p>
            </div>
            <div class="col-md-2">
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
    <form class="container-md rounded border border-2 p-2">
        <div class="row mt-2">
            <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                <label for="nomFormation" >Nom de formation</label>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9 col-12">
                <input type="text" class="form-control" id="nomFormation" name="nomFormation"/>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3 col-sm-6 col-12">
                <label for="idRes">Nom du responçable</label>
            </div>
            <div class="col-md-9 col-sm-6 col-12">
                <select name="idRes" id="idRes" class="form-select">
                    <?php
                        $sql = "SELECT idUtilisateur,nom ,prenom 
                                FROM utilisateur 
                                WHERE role LIKE 'res'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()) {
                                //echo "<option value=\"$row[idUtilisateur]\" > $row[nom] $row[prenom] </option>"
                                ?>
                                    <option value="<?php echo $row["idUtilisateur"] ?>">
                                        <?php echo $row["nom"]." ".$row["prenom"] ;?>
                                    </option>
                                <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <button class="btn btn-primary" id="sendDate">
                        Envoyer
                    </button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <p class="text-center" id="msgAjouter"></p>
                </div>
            </div>
        </div>
       
        
        
        <!-- <input type="button" id="sendData"value="envoyer"/> -->
    </form>
    <div class="container-fluid mt-5" id="listFormation">
        <div class="row px-1 px-sm-2">
            <div class="col-6 border border-dark border-2">
                <p class="text-center">Nom Formation</p>
            </div>
            <div class="col-6 border border-dark border-2">
                <p class="text-center">Nom res</p>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(()=>{
            $.ajax({
               url :"../php/ajtFormation.php",
               method :"post",
               data : {function : "listFormation"},
               success : (rep)=>{
                   let json  = JSON.parse(rep);
                   for (const key in json) {
                       let newLine = document.createElement("div");
                       let cellNomForm  = document.createElement("div");
                       let cellNomRes  = document.createElement("div");
                       let pNomFormation = document.createElement("p");
                       let pNomRes = document.createElement("p");

                    //cellule nom de formation
                       pNomFormation.setAttribute("class","text-center");
                       pNomFormation.innerHTML = json[key].nomFomration;
                       cellNomForm.setAttribute("class","col-6 border border-dark border-2")
                       cellNomForm.append(pNomFormation);
                        newLine.setAttribute("class","row px-1 px-sm-2");
                        newLine.append(cellNomForm);
                        
                    //Cellule nom responçable
                        pNomRes.setAttribute("class","text-center");
                       pNomRes.innerHTML = json[key].nom + " " +json[key].nom;
                       cellNomRes.setAttribute("class","col-6 border border-dark border-2")
                       cellNomRes.append(pNomRes);
                        newLine.append(cellNomRes);

                    //insertion a la page web
                        document.getElementById("listFormation").append(newLine);
                   }
               },
               error : (rep)=>{
                console.log(rep);
               }
            }); 
        })
        $("#sendData").on("click",()=>{
            let nomFo = $("#nomFormation").val();
            let idR  = $("#idRes").val();
            $.ajax({
               url :"../php/ajtFormation.php",
               method :"post",
               data : {function : "ajtFormation",
                        nomFormation : nomFo ,
                        idRes : idR },
               success : (rep)=>{
                $("#msgAjouter").html(rep);
               },
               error : (rep)=>{
                console.log(rep);
               }
            });
        })
        
    </script>
</body>
</html>