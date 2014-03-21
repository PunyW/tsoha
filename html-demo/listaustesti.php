<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Joel Järvinen">

        <title>
            Listaussivu
        </title>

        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
        <link href="../assets/css/main.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-12">Listaus testi</div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Tuote ID</th>
                                <th>Määrä</th>
                                <th>Lennon lähtöaika</th>
                                <th>Lennon ID</th>
                                <th>Matkustaja ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            define('DB_DSN', 'pgsql:');
                            define('DB_USERNAME', null);
                            define('DB_PASSWORD', null);

                            require_once '../app/libs/Common.php';
                            require_once '../app/libs/Model.php';
                            require '../app/models/orderModel.php';

                            $model = new OrderModel();

                            $results = $model->getOrders();

                            foreach ($results as $order) {
                                ?>
                                <tr>
                                    <td><?php echo $order->id; ?></td>
                                    <td><?php echo $order->quantity; ?></td>
                                    <td><?php echo $order->flight_dep_time; ?></td>
                                    <td><?php echo $order->flight_id; ?></td>
                                    <td><?php echo $order->passenger_id; ?></td>
                                </tr> 
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script src="../assets/js/bootstrap.js"></script>
    </body>
</html>