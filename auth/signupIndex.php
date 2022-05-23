<!DOCTYPE html>
<html lang="it">
<head>
    <title>Alimentiamoci!</title>
    <style>@import url("style.css");</style>
    <script src="https://kit.fontawesome.com/2df028aad7.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->
    <style>
        .logoContainer #img-tr{
            height: 100%;
            width: auto;
            background-image: url("./images/stairs3x3flipped.png");
            background-position: top right;
            background-size: 32%;
            background-repeat: no-repeat;
        }
        .logoContainer #img-bl{
            height: 100%;
            width: auto;
            background-image: url("./images/stairs4x4flipped.png");
            background-position: bottom left;
            background-size: 45%;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main">
            <div class="logoContainer">
                <div id="img-tr"></div>
                <div id="img-bl"></div>
            </div>
            <div class="loginContainer">
                <form action="questionario1.php" method="POST" id="loginForm" onSubmit="return validaDuplicati()">
                    <?php if(isset($_POST['nome'])) echo "<span class=\"title\">Benvenuto ".$_POST['nome']."!</span><br><br><br>";?>
                    <span class="inputField">* campo obbligatorio</span>
                    <?php session_start();?>
                    <div class="inputFieldDiv"><i class="fa-solid fa-user icon"></i><input type="text" name="username" class="inputField" placeholder="Username *" required pattern="[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]" title="Caratteri alfanumerici e simboli come punto, underscore e trattino. Minimo 5 caratteri e massimo 20."></div>
                    <?php
                        if(isset($_SESSION["usernameEsistente"]))
                            echo "<br><span class=\"inputField\">Lo username scelto non è disponinbile</span>";
                    ?>
                    <div class="inputFieldDiv emails" id="email1"><i class="fa-solid fa-envelope icon"></i><input type="email" name="email1" class="inputField" placeholder="Email *" required></div>
                    <div class="inputFieldDiv emails" id="email2"><i class="fa-solid fa-envelope icon"></i><input type="email" name="email2" class="inputField" placeholder="Ripeti email *"></div>
                    <?php
                        if(isset($_SESSION["emailInUso"]))
                            echo "<br><span class=\"inputField\">Esiste già un account che usa questa email</span>";
                        session_unset();
                        session_destroy();
                    ?>
                    <div class="inputFieldDiv passwords" id="password1"><i class="fa-solid fa-key icon"></i><input type="password" name="password1" class="inputField" placeholder="Password *" required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}" title="Almeno 8 caratteri, una lettera maiuscola, una minuscola ed un numero."></div>
                    <div class="inputFieldDiv passwords" id="password2"><i class="fa-solid fa-key icon"></i><input type="password" name="password2" class="inputField" placeholder="Ripeti assword *" required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}" title="Almeno 8 caratteri, una lettera maiuscola, una minuscola ed un numero."></div>
                    <div class="inputFieldDiv"><i class="fa-solid fa-phone icon"></i></i><input type="tel" name="tel" class="inputField" 
                        placeholder="Telefono (senza prefisso)" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"></div>
                    <br>
                    <div class="submitContainer"><input type="submit" value="Registrati" class="submitBtn"></div>
                </form>
            </div>
        </div>
        <script>
            function addErrorEmail() {
                document.getElementById('email1').classList.add('error1');
                document.getElementById('email1').style.borderBottom = '#be5f53 3px solid'; //bordo rosso inserito
                document.getElementsByName('email1')[0].style.color = '#be5f53'; //testo rosso inserito
                document.getElementById('email2').classList.add('error1');
                document.getElementById('email2').style.borderBottom = '#be5f53 3px solid';
                document.getElementsByName('email2')[0].style.color = '#be5f53';
                setTimeout(removeErrorEmail, 1000);
            }
            function addErrorPass() {
                document.getElementById('password1').classList.add('error2');
                document.getElementById('password1').style.borderBottom = '#be5f53 3px solid';
                document.getElementsByName('password1')[0].style.color = '#be5f53';
                document.getElementById('password2').classList.add('error2');
                document.getElementById('password2').style.borderBottom = '#be5f53 3px solid';
                document.getElementsByName('password2')[0].style.color = '#be5f53';
                setTimeout(removeErrorPass, 1000);
            }
            function removeErrorEmail(){
                document.getElementById('email1').classList.remove('error1');
                document.getElementById('email1').style.borderBottom = '#53BE9E 3px solid'; //bordo verde inserito
                document.getElementsByName('email1')[0].style.color = '#53BE9E'; //testo verde inserito
                document.getElementById('email2').classList.remove('error1');
                document.getElementById('email2').style.borderBottom = '#53BE9E 3px solid';
                document.getElementsByName('email2')[0].style.color = '#53BE9E';
            }
            function removeErrorPass(){
                document.getElementById('password1').classList.remove('error2');
                document.getElementById('password1').style.borderBottom = '#53BE9E 3px solid';
                document.getElementsByName('password1')[0].style.color = '#53BE9E';
                document.getElementById('password2').classList.remove('error2');
                document.getElementById('password2').style.borderBottom = '#53BE9E 3px solid';
                document.getElementsByName('password2')[0].style.color = '#53BE9E';
            }

            function validaDuplicati(){
                var validaEmailsValue = validaEmails();
                var validaPasswordsValue = validaPasswords();
                if(validaEmailsValue && validaPasswordsValue)
                    return true;
                else
                    return false;
            }
            function validaPasswords(){
                var pass1 = document.getElementsByName("password1")[0].value;
                var pass2 = document.getElementsByName("password2")[0].value;
                if(pass1 != pass2){
                    addErrorPass();
                    return false;
                }
                else
                    return true;
            }
            function validaEmails(){
                var email1 = document.getElementsByName("email1")[0].value;
                var email2 = document.getElementsByName("email2")[0].value;
                if(email1 != email2){
                    addErrorEmail();
                    return false;
                }
                else
                    return true;
            }
        </script>
    </div>
</body>
</html>