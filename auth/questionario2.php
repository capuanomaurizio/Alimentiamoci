<?php 
    session_start();
    $_SESSION["quest1"] = $_POST;
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Alimentiamoci!</title>
    <style>@import url("questionario2.css");</style>
    <script src="https://kit.fontawesome.com/2df028aad7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <form class="main" action="signup.php" method="POST">
                <div id="headerDiv">
                    <span class="title">&nbsp&nbsp&nbsp&nbsp Questionario di primo accesso <span style="font-size:44px; color: #D8D8D8;">2/2</span>:</span><br>
                </div>
                <div id="bodyDiv">
                    <div class="questionDiv">
                        <span class="bodyText subtitle">Hai qualche allergia/intolleranza?</span>
                        <table id="intolleranzeTable">
                            <tr>
                                <td>
                                    <input type="checkbox" name="intolleranze[]" id="pesce" value="pesce" name="intolleranze">
                                    <label for="pesce" class="bodyText">Pesce</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="intolleranze[]" id="uova" value="uova" name="intolleranze">
                                    <label for="uova" class="bodyText">Uova</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="intolleranze[]" id="latte" value="latte" name="intolleranze">
                                    <label for="latte" class="bodyText">Latte</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="intolleranze[]" id="grano" value="grano" name="intolleranze">
                                    <label for="grano" class="bodyText">Grano</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="intolleranze[]" id="noci" value="noci" name="intolleranze">
                                    <label for="noci" class="bodyText">Noci</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="intolleranze[]" id="arachidi" value="arachidi" name="intolleranze">
                                    <label for="arachidi" class="bodyText">Arachidi</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="intolleranze[]" id="molluschi" value="molluschi" name="intolleranze">
                                    <label for="molluschi" class="bodyText">Molluschi</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="intolleranze[]" id="soia" value="soia" name="intolleranze">
                                    <label for="soia" class="bodyText">Soia</label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="questionDiv">
                        <span class="bodyText subtitle">Il tuo obiettivo: </span>
                        <br>
                        <img src="./images/bodyType.jpg" alt="BodyType" id="bodyTypeImg">
                        <div id="radios">
                            <input type="radio" name="fisicoIdeale" id="0" value="dimagrimento" required>
                            <input type="radio" name="fisicoIdeale" id="1" value="mantenimento">
                            <input type="radio" name="fisicoIdeale" id="2" value="massa">
                        </div>
                    </div>
                </div>
                <div id="footerDiv">
                    <div id="lifeStyleDiv">
                        <span class="bodyText subtitle">Quanto sei sedentario? </span>
                        <br>
                        <div id="inputRangeDiv">
                            <input type="range" name="lifeStyle" min="0" max="3" value="0" list="lifeStyleList" required>
                            <datalist id="lifeStyleList">
                                <option value="1" label="Atletico"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4" label="Sedentario"></option>
                            </datalist>
                        </div>
                    </div>
                    <div class="submitContainer"><input type="submit" value="Fine" class="submitBtn"></div>
                </div>
        </form>
    </div>
</body>
</html>