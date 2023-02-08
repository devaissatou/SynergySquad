<?php
require_once "config.php";
if (count($_POST) > 0) {
    $isSuccess = 0;
    
    $userName = $_POST['login'];
    $sql = "SELECT * FROM receveur WHERE login= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $userName);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["password"];
            if ($_POST["password"]==$hashedPassword) {
                $isSuccess = $row["idReceveur"];
            }
        }
    }
    if ($isSuccess == 0) {
        header("Location:index.php");
    } else {
       
        header("Location:home.php?id=".$isSuccess);
    }
}

?>