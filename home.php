<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home di <?php echo $_SESSION["user"]?></title>
    <style>@import url("./style.css");</style>
    <script src="https://kit.fontawesome.com/2df028aad7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="nav">
        <div id="navSx">
            <div id="logo"></div>
        </div>
        <div id="navDx">
            <div id="userDiv">&emsp;<i class="fa-solid fa-user icon"></i>&ensp;<?php echo $_SESSION["user"]?>&emsp;</div>
        </div>
    </div>
    <div id="body">
        <div id="bodySx">
            <div id="bodyTopSx"></div>
            <div id="bodyBotSx"></div>
        </div>
        <div id="bodyDx">
            <div id="bodyTopDx"></div>
            <div id="bodyBotDx"></div>
        </div>
    </div>
</body>
</html>


<!-- <a href="./uscita.php">Termina sessione</a> -->