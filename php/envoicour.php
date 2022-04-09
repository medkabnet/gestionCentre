<?php
    require_once "./dbcon.php";
    try{
        if(isset($_GET['function'])){
            if($_GET['function'] == "affichercour"){
                $sql = "SELECT * FROM cour WHERE idFormation = ".$_GET['idFormation'];
                //echo $sql;
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $list = array();
                    while($row = $result->fetch_assoc()){
                        $list[]=$row; 
                    }
                    //json_encoder 
                    echo json_encode($list);
                }
                else 
                    echo 0;
            }
            if($_GET["function"] == "ajouterCour"){
                $sql = "INSERT INTO cour (titre,contenuCour,idFormation) 
                    VALUES('".$_GET["titreF"]."','".$_GET["contenuF"]."',".$_GET["idFormation"].")";
                
                if($conn->query($sql) === true){
                    //$conn->insert_id donne le dernier ID enregister par la base de donné  
                    echo $conn->insert_id;
                }else
                    echo "error";
            }
            if($_GET["function"]=="supprimerCour"){
                $sql="DELETE FROM cour WHERE idCour=".$_GET["id"];
                if($conn->query($sql)===true){
                    echo "ok";
                }
                else
                    echo "error";
            }
        }
    }
    catch (Exception $ex){
        echo"Ex";
        print_r( $ex);
    }
    catch (\Exception $ex){
        echo"Ex/";
        print_r( $ex);
    }
    catch (\Error  $ex){
        echo"Err";
        print_r( $ex);
    }
    catch (\Throwable  $ex){
        echo"Th";
        print_r( $ex);
    }
