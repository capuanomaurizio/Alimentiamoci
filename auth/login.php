<?php
session_start();
try {
    require("../conn.php");
    $stmt = $conn->prepare('SELECT `username` FROM `utenti` WHERE `email` = ? AND `password` = ?');
    $stmt->execute([$_POST["email"], md5($_POST["password"])]);
    if($stmt->fetchColumn() != false) { //se si trova l'utente
        $stmt = $conn->prepare('SELECT `username` FROM `utenti` WHERE `email` = ? AND `password` = ?');
        $stmt->execute([$_POST["email"], md5($_POST["password"])]);
        $_SESSION["user"] = $stmt->fetch(PDO::FETCH_ASSOC)["username"];
        header("location: ../home.php");
    } else {
        $_SESSION["loginFallito"]=true;
        header("location: ./loginIndex.php");
    }
} catch(PDOException $ex){
    echo "Attenzione: ".$ex->getMessage();
}
?>