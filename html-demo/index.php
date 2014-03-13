<!DOCTYPE html>
<html>
    <head>
        <title>Etusivu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body>
        
        <?php include("NavBar.php"); ?> 
        
        <div class="container">
            <div class="centered">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                Tuoteryhmä<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Ryhmä 1</a></li>
                                <li><a href="#">Ryhmä 2</a></li>
                                <li><a href="#">Ryhmä 3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Hae tuotetta...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Hae</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h1>Tuotteita</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kuva</th>
                        <th>Kuvaus</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Inc</td>
                        <td>Hieno tuote osta nyt!</td>
                        <td><button type="button" class="btn btn-xs btn-default">
                                <span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn btn-xs btn-default">
                                <span class="glyphicon glyphicon-minus"></span></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>


