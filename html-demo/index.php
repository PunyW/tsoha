<!DOCTYPE html>
<html>
    <head>
        <title>Etusivu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body>
        <?php include("NavBar.php"); ?>

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
    </body>
</html>


