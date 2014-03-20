<!DOCTYPE html>
<html>
    <head>
        <title>Raportit</title>
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
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="date" class="form-control">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            Valitse raportti <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#">Tilaukset</a></li>
                                            <li><a href="#">Toiveet</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of date selector -->
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Lento tunnus</th>
                                    <th>Lentokenttä</th>
                                    <th>Lähtöaika (paikallista aikaa)</th>
                                    <th>Lähtöportti</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>FI1234</td>
                                    <td>Suomi - HEL</td>
                                    <td>16:30</td>
                                    <td>Ei tiedossa</td>
                                </tr>
                                <tr>
                                    <td>FI1111</td>
                                    <td>Ruotsi - XWZ</td>
                                    <td>19:00</td>
                                    <td>Ei tiedossa</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap-checkbox.js"></script>
    </body>
</html>

