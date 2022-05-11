<?php session_start();?>
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
            <div id="logoContainer">
                <div id="logo"></div>
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
    <div id="body">
        <div id="bodySx">
            <div id="bodyTopSx" class="bodyDivs"></div>
            <div id="bodyBotSx" class="bodyDivs"></div>
        </div>
        <div id="bodyDx">
            <div id="bodyTopDx" class="bodyDivs"></div>
            <div id="bodyBotDx" class="bodyDivs"></div>
        </div>
    </div>
    <div id="aboutContainer">
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
            document.getElementById("aboutContainer").style.display = "flex";
            document.getElementById("burgerMenu").dataset.status = "closed";
        }
        function closeInfo(){
            document.getElementById("aboutContainer").style.display = "none";
        }
    </script>
</body>
</html>