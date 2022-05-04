<?php
session_start();
$_SESSION["quest2"] = $_POST;
try {
    //connessione al database
    require("../conn.php");
    $sql = 'INSERT INTO utenti VALUES (?,?,?,?,?,?,?,?,?,?)';
    if(isset($_POST["telefono"])){
        $conn->prepare($sql)->execute([$_SESSION["dati"]["username"], $_SESSION["dati"]["password1"], $_SESSION["dati"]["email1"], $_SESSION["dati"]["telefono"], 
    
        $_SESSION["quest1"]["altezza"], $_SESSION["quest2"]["lifeStyle"], $_SESSION["quest1"]["eta"], $_SESSION["quest1"]["peso"], $_SESSION["quest1"]["fisicoAttuale"],
        
        $_SESSION["quest2"]["fisicoIdeale"]]);
    }
    else{
        $conn->prepare($sql)->execute([$_SESSION["dati"]["username"], $_SESSION["dati"]["password1"], $_SESSION["dati"]["email1"], NULL, $_SESSION["quest1"]["altezza"],
        
        $_SESSION["quest2"]["lifeStyle"], $_SESSION["quest1"]["eta"], $_SESSION["quest1"]["peso"], $_SESSION["quest1"]["fisicoAttuale"], $_SESSION["quest2"]["fisicoIdeale"]]);
    }
    foreach ($_POST["intolleranze"] as $intolleranza) {
        $sql = 'INSERT INTO intolleranzeutenti(nomeintolleranza, username) VALUES (?,?)';
        $conn->prepare($sql)->execute([$intolleranza, $_SESSION["dati"]["username"]]);
    }
    $_SESSION["user"] = $_SESSION["dati"]["username"];
    header("location: ../home.php");
} catch(PDOException $e) {
    echo "Attenzione: ".$e->getMessage();
}
?>