<?php
require_once "config.php";
if (count($_POST) > 0) {
    $id = $_POST["idReceveur"];
    $mat = $_POST["matriculeBus"];
    $montant = $_POST["montant"];
    echo "mat:".$_POST['matriculeBus'].",id:".$_POST['idReceveur'].",montant:".$_POST['montant'];
    $sql = "INSERT INTO ticket (idReceveur, matriculeBus, montant) VALUES (?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iid", $id ,$mat ,$montant );
    if($stmt = mysqli_prepare($conn, $sql)){
        /* Bind les variables à la requette preparée */
        mysqli_stmt_bind_param($stmt, "iid", $id, $mat, $montant);
        
        
        
        /* executer la requette */
        if(mysqli_stmt_execute($stmt)){
            /* opération effectuée, retour */
            header("Location:home.php?id=".$id);
            exit();
        } else{
            header("Location:home.php?id=".$id);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>