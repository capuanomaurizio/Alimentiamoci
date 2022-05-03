<?php 
    session_start();
    $_POST["password1"] = md5($_POST["password1"]);
    $_SESSION["dati"] = $_POST;
    require("../conn.php");
    $stmt = $conn->prepare('SELECT * FROM `utenti` WHERE `email` = ?');
    $stmt->execute([$_POST["email1"]]);
    if($stmt->fetchColumn() != false)
        $_SESSION["emailInUso"] = true;
    $stmt = $conn->prepare('SELECT * FROM `utenti` WHERE `username` = ?');
    $stmt->execute([$_POST["username"]]);
    if($stmt->fetchColumn() != false)
        $_SESSION["usernameEsistente"] = true;
    if(isset($_SESSION["usernameEsistente"]) || isset($_SESSION["usernameEsistente"]))
        header("location: ./signupIndex.php")
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Alimentiamoci!</title>
    <style>@import url("questionario1.css");</style>
    <script src="https://kit.fontawesome.com/2df028aad7.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->
</head>
<body>
    <div class="wrapper">
        <form class="main" action="questionario2.php" method="POST">
                <div id="headerDiv">
                    <span class="title">&nbsp&nbsp&nbsp&nbsp Questionario di primo accesso <span style="font-size:44px; color: #D8D8D8;">1/2</span>:</span><br>
                </div>
                <div id="bodyDiv">
                    <div class="questionDiv">
                        <div class="inputFieldDiv"><input type="number" name="altezza" id="altezza" class="inputField" min="100" max="250" placeholder="Altezza (centimetri)" onChange="calcolaIMC()" required></div>
                        <div class="inputFieldDiv"><input type="number" name="peso" id="peso" class="inputField" min="50" max="120" placeholder="Peso (chilogrammi)" onChange="calcolaIMC()" required></div>
                        <div class="inputFieldDiv"><input type="number" name="eta" id="eta" class="inputField" min="12" max="90" placeholder="Età (anni)" required></div>
                        <div id="IMCdiv">
                            <span class="bodyText">Indice di massa corporea:&nbsp&nbsp</span>
                            <span class="bodyText" id="IMC"></span>
                        </div>
                    </div>
                    <div class="questionDiv">
                        <span class="bodyText subtitle">Il tuo fisico attuale: </span>
                        <br>
                        <img src="./images/bodyType.jpg" alt="BodyType" id="bodyTypeImg">
                        <div id="radios">
                            <input type="radio" name="fisicoAttuale" id="0" value="sottopeso">
                            <input type="radio" name="fisicoAttuale" id="1" value="normopeso">
                            <input type="radio" name="fisicoAttuale" id="2" value="sovrappeso">
                        </div>
                    </div>
                </div>
                <div id="footerDiv">
                    <div class="questionDiv">
                        <div id="divCondizioniIMC">
                            <span class="bodyText condizioniIMC" id="fortementeSottopeso" style="color: #be5f53">Fortemente sottopeso</span>
                            <span class="bodyText condizioniIMC" id="sottopeso" style="color: #be9053">Sottopeso</span>
                            <span class="bodyText condizioniIMC" id="normopeso" style="color: #90be53">Normopeso</span>
                            <span class="bodyText condizioniIMC" id="sovrappeso" style="color: #be9053">Sovrappeso</span>
                            <span class="bodyText condizioniIMC" id="fortementeSovrappeso" style="color: #be5f53">Fortemente sovrappeso</span>
                        </div>
                    </div>
                    <div class="submitContainer"><input type="submit" value="Avanti" class="submitBtn"></div>
                </div>
        </form>
    </div>
    <script>
        function calcolaIMC(){
            var altezza = document.getElementById("altezza").value;
            var peso = document.getElementById("peso").value;
            if(altezza>=100 && peso>=50){
                altezza/=100;
                var IMC = peso/(altezza*altezza); 
                IMC = Math.round(IMC);
                spans = document.getElementsByClassName("condizioniIMC");
                for (const span of spans) {
                    span.style.display = "none";
                }
                if(IMC<16.5){
                    document.getElementById("fortementeSottopeso").style.display = "inline";
                    document.getElementById("0").checked = true;
                }else{
                    if(IMC<18.5){
                        document.getElementById("sottopeso").style.display = "inline";
                        document.getElementById("0").checked = true;
                    }else{
                        if(IMC<25){
                            document.getElementById("normopeso").style.display = "inline";
                            document.getElementById("1").checked = true;
                        }else{
                            if(IMC<30){
                                document.getElementById("sovrappeso").style.display = "inline";
                                document.getElementById("2").checked = true;
                            }else{
                                document.getElementById("fortementeSovrappeso").style.display = "inline";
                                document.getElementById("2").checked = true;
                            }
                        }
                    }
                }
                document.getElementById("IMC").innerHTML = IMC;
                document.getElementById("IMCdiv").style.opacity = 1;
                document.getElementById("divCondizioniIMC").style.opacity = 1;
            }
        }

        // $('form input').keydown(function (e) {
        //     if (e.keyCode == 13) {
        //         e.preventDefault();
        //         return false;
        //     }
        // });
    </script>
</body>
</html>