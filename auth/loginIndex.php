<!DOCTYPE html>
<html lang="it">
<head>
    <title>Alimentiamoci!</title>
    <style>@import url("style.css");</style>
    <link href='https://fonts.googleapis.com/css?family=Arya' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/2df028aad7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="main">
            <div class="loginContainer">
                <form action="login.php" method="POST" id="loginForm">
                    <span class="title">Bentornato!</span><br>
                    <div class="inputFieldDiv"><i class="fa-solid fa-envelope icon"></i><input type="email" name="email" class="inputField" placeholder="Email" required></div>
                    <div class="inputFieldDiv"><i class="fa-solid fa-key icon"></i><input type="password" name="password" class="inputField" placeholder="Password" id="password" required></div>
                    <?php
                        session_start();
                        if(isset($_SESSION["loginFallito"]))
                            echo "<br><span class=\"inputField\">Credenziali non corrette, riprovare</span>";
                        session_unset();
                        session_destroy();
                        //setcookie("PHPSESSID", "",time()-3600);
                        //echo substr($_SERVER['HTTP_COOKIE'], 10);
                        //echo $_COOKIE["PHPSESSID"];
                    ?>
                    <br>
                    <div class="submitContainer"><input type="submit" value="Login" class="submitBtn"></div>
                </form>
                <form action="signupIndex.php" method="POST" id="registerForm">
                    <span class="title">Nuovo da queste parti?</span><br>
                    <div class="inputFieldDiv"><i class="fa-solid fa-user icon"></i><input type="text" name="nome" class="inputField" placeholder="Nome" required pattern="[a-zA-Z]{0,10}" title="Solo lettere, massimo 20 caratteri"></div>
                    <br>
                    <div class="submitContainer"><input type="submit" value="Registrati" class="submitBtn"></div>
                </form>
            </div>
            <div class="logoContainer">
                <div id="img-tl"></div>
                <div id="img-br"></div>
            </div>
        </div>
    </div>
</body>
</html>