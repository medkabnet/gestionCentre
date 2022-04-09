<?php
    if(isset($_COOKIE['cookieLogin']))
        header("Location: http://localhost/gestioncentre/pages/formation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identification</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form action="../php/login.php" method="post" class="container-md rounded border border-2 p-3">
        <div class="row mt-2">
            <div class="col-md-3">
                <label for="email">Email : </label>
            </div>
            <div class="col-md-9">
                <input type="text" name="email" placeholder="Votre email" id="email" class="form-control" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <label for="pwd">Mot de pass : </label>
            </div>
            <div class="col-md-9">
                <input type="password" name="pwd" placeholder="Votre mot de pass" id="pwd" class="form-control" required>
            </div>
        </div>
        <div class="row mt-2">
            <input type="submit" class="btn btn-primary btn-lg" value="S'identifier">
        </div>
    </form>
</body>
</html>