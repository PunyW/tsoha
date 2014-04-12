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

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->


        <?php require $view; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?= URL ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= URL ?>assets/js/bootstrap-checkbox.min.js"></script>
    </body>
</html>

