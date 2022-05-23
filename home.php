<?php 
    session_start();
    if(!isset($_SESSION["user"]))
        header("location: ./index.php");
    require_once("Utente.php");
    require("conn.php");
    $stmt = $conn->prepare("SELECT username, email, telefono, altezza, sedentarieta, peso, eta, fisicoattuale, fisicoideale FROM utenti WHERE username = ?");
    $stmt->execute([$_SESSION["user"]]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = new Utente($userData["username"], $userData["email"],  $userData["telefono"], $userData["altezza"], $userData["sedentarieta"],
                        $userData["peso"], $userData["eta"], $userData["fisicoattuale"], $userData["fisicoideale"]);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Home di <?php echo $_SESSION["user"]?></title>
    <style>@import url("./style.css");</style>
    <script src="https://kit.fontawesome.com/2df028aad7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="nav">
        <div id="navSx">
            <div id="logoContainer" onmouseover="showTitle();" onmouseout="hideTitle();">
                <div id="logo"></div>
                <span class="title">Alimentiamoci!</span>
            </div>
        </div>
        <div id="navDx">
            <div id="userDiv" onClick="toggleMenu();">&emsp;<i class="fa-solid fa-user icon"></i>&ensp;<?php echo $_SESSION["user"]?>&emsp;</div>
            <div id="burgerMenu" data-status="closed">
                <div id="uscita" class="burgers" onClick="openInfo();"><i class="fa-solid fa-circle-info"></i><div>&nbsp;&nbsp;Info</div></div>
                <div id="uscita" class="burgers" onClick="window.location.href = './uscita.php';"><i class="fa-solid fa-arrow-right-from-bracket"></i><div>&nbsp;&nbsp;Uscita</div></div>
            </div>
        </div>
    </div>
    <table id="table">
        <tr>
            <td>
                <div id="buttonTopSx" class="buttonDivs">
                    <div class="title">
                        <span class="title">Diete</span>
                    </div>
                    <div class="content">
                        <img src="./assets/diete.svg" alt="ricette" class="immaginiDiv">
                    </div>
                    <i class="fa-solid fa-arrow-right arrow"></i>
                </div>
            </td>
            <td>
                <div id="buttonTopDx" class="buttonDivs">
                    <div class="title">
                        <span class="title">Dispensa</span>
                    </div>
                    <div class="content">
                        <img src="./assets/dispensa.svg" alt="spesa" class="immaginiDiv">
                    </div>
                    <i class="fa-solid fa-arrow-right arrow"></i>
                </div>
            </td>
            <td rowspan="2">
                <div id="infoDiv">
                    <span class="title">Le tue info: </span><br><br>
                    <img src="./assets/user.svg" alt="utente" id="userImage"><br><br>
                    <span class="text">Email: <?php echo $user->getEmail(); ?></span><br><br>
                    <?php if(!empty($user->getTelefono())){ ?>
                        <span class="text">Telefono: <?php echo $user->getTelefono(); ?></span><br><br>
                    <?php } ?>
                    <br>
                    <span class="text">Altezza: <?php echo $user->getAltezza(); ?> cm</span><br><br>
                    <span class="text">Peso: <?php echo $user->getPeso(); ?> kg</span><br><br>
                    <span class="text">Indice di sedentarietà (da 1 a 4): <?php echo $user->getSedentarieta(); ?></span><br><br>
                    <br>
                    <span class="text">Situazione attuale: <?php echo $user->getFisicoAttuale(); ?></span><br><br>
                    <span class="text">Obiettivo preposto: <?php echo $user->getFisicoIdeale(); ?></span><br><br>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div id="buttonBotSx" class="buttonDivs">
                    <div class="title">
                        <span class="title">Le tue ricette</span>
                    </div>
                    <div class="content">
                        <img src="./assets/ricette.svg" alt="ricette" class="immaginiDiv">
                    </div>
                    <i class="fa-solid fa-arrow-right arrow"></i>
                </div>
            </td>
            <td>
                <div id="buttonBotDx" class="buttonDivs">
                    <div class="title">
                        <span class="title">Spesa</span>
                    </div>
                    <div class="content">
                        <img src="./assets/spesa.svg" alt="spesa" class="immaginiDiv">
                    </div>
                    <i class="fa-solid fa-arrow-right arrow"></i>
                </div>
            </td>
        </tr>
    </table>
    <div id="aboutContainer" data-status="hidden">
        <div id="about">
            <h1>MADE BY MAURIZIO CAPUANO</h1>
        </div>
    </div>
    <script>
        document.addEventListener('click', function(e) {
            if(e.target.matches('#aboutContainer')) {
                closeInfo();
            }
            if(!e.target.matches('#burgerMenu, #burgerMenu *, #userDiv, #userDiv *') && document.getElementById("burgerMenu").dataset.status == "open"){
                toggleMenu();
            }
        })
        function toggleMenu(){
            if(document.getElementById("burgerMenu").dataset.status != "open"){
                document.getElementById("burgerMenu").dataset.status = "open";
            } else {
                document.getElementById("burgerMenu").dataset.status = "closed";
            }
        }
        function openInfo(){
            document.getElementById("aboutContainer").dataset.status = "shown";
            document.getElementById("burgerMenu").dataset.status = "closed";
        }
        function closeInfo(){
            document.getElementById("aboutContainer").dataset.status = "hidden";
        }
    </script>
</body>
</html>