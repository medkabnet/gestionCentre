<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire d'inscription</title>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/bootstrap.bundle.min.js"></script>
        <style>
            
        </style>
    </head>
    <body>

        <form action="./php/inscription.php" method="post" class="container-md rounded border border-2 p-3">
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="nom">Nom :</label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="nom" name="nom" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="prenom">Prénom :</label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="prenom" name="prenom" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="email">Email :</label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="pwd">Mot de pass :</label>
                </div>
                <div class="col-md-9">
                    <input type="password" id="pwd" name="pwd" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <input type="submit" class="btn btn-primary btn-lg" value="Envoyer">
            </div>
        </form>
       
    </body>
</html>