<link href="../css/navbar.css" rel="stylesheet">

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class ="navbar-brand" href="index.php">Ostoskassi</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?= echoActiveClassIfRequestMatches("index") ?>><a href="index.php">Tuotteet</a></li>
                <li <?= echoActiveClassIfRequestMatches("lennontiedot") ?>><a href="lennontiedot.php">Lennontiedot</a></li>
                <li <?= echoActiveClassIfRequestMatches("raportit") ?>><a href="#">Raportit</a></li>
                <li <?= echoActiveClassIfRequestMatches("tuotteet") ?>><a href="#">Tuotteiden ylläpito</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?= echoActiveClassIfRequestMatches("") ?>><a href="#">Ostoskori</a></li>
                <li <?= echoActiveClassIfRequestMatches("") ?>><a href="login.html">Kirjaudu sisään</a></li>      
            </ul>
        </div> <!-- /.nav-collapse -->
    </div>
</div>

<?php

function echoActiveClassIfRequestMatches($requestUri) {
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri) {
        echo 'class="active"';
    }
}
