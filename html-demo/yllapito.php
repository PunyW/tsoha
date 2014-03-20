<!DOCTYPE html>
<html>
    <head>
        <title>Tuotteiden ylläpito</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/main.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'NavBar.php'; ?>

        <div class="container">
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tuotteen muokkaus</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="../img/icons.png">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" placeholder="Tuote esittely"></textarea>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default">Vaihda esittelykuva</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default">Lisää kuva</button>
                            </div>
                            <div class="col-lg-12"></div>
                            <div class="col-lg-4"></div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="hinta">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default">Päivitä</button>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/bootstrap-checkbox.js"></script>
    </body>
</html>


