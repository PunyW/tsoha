<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>
            <?= $this->title; ?>
        </title>

        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->

        <!-- Optional theme -->
        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href="<?= URL ?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/navbar.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/bootstrap-checkbox.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/main.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/popup.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrap">
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class ="navbar-brand" href="<?= URL ?>">Ostoskassi</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <?php if (Session::get('user') != 'employee') : ?>
                                <li <?= echoActiveClassIfRequestMatches("index") ?>><a href="<?= URL ?>index">Tuotteet</a></li>
                            <?php endif ?>
                            <?php if (Session::get('user') == 'passenger') : ?>
                                <li <?= echoActiveClassIfRequestMatches("lennontiedot") ?>><a href="<?= URL ?>lennontiedot">Lennontiedot</a></li>    
                            <?php endif ?>

                            <?php if (Session::get('user') == 'employee') : ?>
                                <li <?= echoActiveClassIfRequestMatches("raportit") ?>><a href="<?= URL ?>raportit">Raportit</a></li>
                                <li <?= echoActiveClassIfRequestMatches("yllapito") ?>><a href="<?= URL ?>yllapito">Tuotteiden ylläpito</a></li>
                            <?php endif ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (Session::get('user') != 'employee') : ?>
                                <li <?= echoActiveClassIfRequestMatches("ostoskori") ?>><a href="<?= URL ?>ostoskori">
                                        Ostoskori <span class="badge" ><?php echo sizeOfShoppingCart() ?></span></a></li>
                            <?php endif ?>
                            <?php if (Session::get('loggedIn')) : ?>
                                <li><a href="<?= URL ?>logout">Kirjaudu ulos</a></li>   
                            <?php else : ?>
                                <li><a href="#passengerLogin" data-toggle="modal">Kirjaudu sisään</a></li>      
                            <?php endif ?>
                        </ul>
                    </div> <!-- /.nav-collapse -->
                </div>
            </div>

            <?php require $view; ?>

        </div>

        <div class="container">
            <div id="footer">
                <div class="row">
                    <div class="col-md-9">
                        <p class="muted credit">&copy; Ostoskassi 2014 </p>
                    </div>
                    <?php if (!Session::get('loggedIn')) : ?>
                        <div class="col-md-3">
                            <p class="muted credit"> <a class="right" href="<?= URL ?>elogin">Työntekijöiden kirjautuminen</a> </p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <!-- Login -->
        <div class="modal fade" id="passengerLogin" tabindex="-1" role="dialog" aria-labelledby="passengerLoginLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="passengerLoginLabel">Kirjaudu sisään</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" role="form" action="<?= URL ?>login/login" method="post">
                            <?php if (!empty($data->error)) { ?>
                                <div class="alert alert-danger">Virhe! <?php echo $data->error; ?> </div>
                            <?php } ?>
                            <p><input type="text" name="surname" class="form-control" placeholder="Sukunimi" required autofocus /></p>
                            <p><input type="text" name="resId" class="form-control" placeholder="Varausnumero" required /></p>
                            <p><button class="btn btn-success" type="submit">Kirjaudu sisään</button></p>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- / Login -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
        <script src="<?= URL ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= URL ?>assets/js/bootstrap-checkbox.min.js"></script>
    </body>
</html>


