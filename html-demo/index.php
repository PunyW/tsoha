<!DOCTYPE html>
<html>
    <head>
        <title>Etusivu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/main.css" rel="stylesheet">
        <link href="../assets/css/navbar.css" rel="stylesheet">
    </head>
    <body>

        <?php include("NavBar.php"); ?> 

        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Hae tuotetta...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Hae</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kuva</th>
                                <th>Kuvaus</th>
                                <th>Hinta</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once '../libs/product.php';

                            $list = Product::getAllProducts();
                            $counter = 1;
                            foreach ($list as $value) {
                                ?>
                                <tr>
                                    <td><?php
                                        echo $value->getId();
                                        $counter++;
                                        ?></td>
                                    <td>Inc</td>
                                    <td><?php echo $value->getDesc(); ?></td>
                                    <td><?php echo $value->getPrice(); ?></td>
                                    <td><button type="button" class="btn btn-xs btn-default">
                                            <span class="glyphicon glyphicon-plus"></span></button>
                                        <button type="button" class="btn btn-xs btn-default">
                                            <span class="glyphicon glyphicon-minus"></span></button>
                                    </td>
                                </tr> 
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>


