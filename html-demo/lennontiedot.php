<!DOCTYPE html>
<html>
    <head>
        <title>Lennontiedot</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/main.css" rel="stylesheet">
        <link href="../assets/css/bootstrap-checkbox.css" rel="stylesheet">
    </head>
    <body>
        <?php include("NavBar.php"); ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Lennontiedot</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Nimi: Jaska Jokunen
                                </div>
                                <div class="col-md-4">
                                    Lähtömaa: Helsinki
                                </div>
                                <div class="col-md-4">
                                    Lähtöaika: 12.5.2014, 16:30 (paikallista aikaa)
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    Lennonnumero: FI123
                                </div>
                                <div class="col-md-4">
                                    Määränpää: Tukholma
                                </div>
                                <div class="col-md-4">
                                    Saapumisaika: 12.5.2014, 17:00 (paikallista aikaa)
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    Varatut paikat: A1, A2
                                </div>
                                <div class="col-md-4">
                                    Lähtöportti: Ei tiedossa
                                </div>
                                <div class="col-md-4">
                                    Boarding time: 15:45 alkaen
                                </div>
                            </div>
                        </div>
                    </div> <!-- End of lennontiedot panel -->

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Toiveita lennolle</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <form class="form-inline">
                                        <input type="checkbox" class="checkbox reset-data" data-default-enabled="false">
                                        <label class="control-label"><strong>Kasvisruoka</strong></label>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="form-inline">
                                        <input type="checkbox" class="checkbox reset-data" data-default-enabled="false">
                                        <label class="control-label"><strong>Toive 2</strong></label>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="form-inline">
                                        <input type="checkbox" class="checkbox reset-data" data-default-enabled="false">
                                        <label class="control-label"><strong>Toive 3</strong></label>
                                    </form>
                                </div>

                                <div class="col-md-4">
                                    <form class="form-inline">
                                        <input type="checkbox" class="checkbox reset-data" data-default-enabled="false">
                                        <label class="control-label"><strong>Toive 4</strong></label>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="form-inline">
                                        <input type="checkbox" class="checkbox reset-data" data-default-enabled="false">
                                        <label class="control-label"><strong>Ikkuna paikka</strong></label>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="form-inline">
                                        <input type="checkbox" class="checkbox reset-data" data-default-enabled="false">
                                        <label class="control-label"><strong>Käytävä paikka</strong></label>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="reset" class="btn btn-default">Tyhjennä valinnat</button>
                            <button class="btn btn-default">Valitse paikat</button>
                            <button class="btn btn-default">Tallenna</button>
                        </div>
                    </div> <!-- End of toiveita panel -->
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/bootstrap-checkbox.js"></script>
    </body>
</html>

