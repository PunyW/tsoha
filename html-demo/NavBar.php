<div id="sign-in" style="position:fixed; top:0; right:0; ">
    <button onclick="window.location.href = 'login.html'" 
            type="button" class="btn-default">Sign in</button>
</div>

<ul class="nav nav-tabs">
    <li <?= echoActiveClassIfRequestMatches("index") ?>><a href="index.php">Etusivu</a></li>
    <li <?= echoActiveClassIfRequestMatches("lennontiedot") ?>><a href="lennontiedot.php">Lennontiedot</a></li>
    <li <?= echoActiveClassIfRequestMatches("raportit") ?>><a href="#">Raportit</a></li>
    <li <?= echoActiveClassIfRequestMatches("tuotteet") ?>><a href="#">Tuotteiden ylläpito</a></li>
    <li <?= echoActiveClassIfRequestMatches("ostoskori") ?>><a href="#">Ostoskori</a></li>
</ul>

<?php

function echoActiveClassIfRequestMatches($requestUri) {
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri) {
        echo 'class="active"';
    }
}

