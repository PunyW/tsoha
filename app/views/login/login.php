<link href="<?= URL ?>assets/css/signin.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <form class="form-signin" role="form" action="<?=URL?>login/login" method="post">
            <?php if (!empty($data->error)) { ?>
                <div class="alert alert-danger">Virhe! <?php echo $data->error; ?> </div>
            <?php } ?>
            <h2 class="form-signin-heading">Kirjaudu sisään</h2>
            <input type="text" name="surname" class="form-control" placeholder="Sukunimi" value="<?php echo $data->surname; ?>"required autofocus />
            <input type="text" name="resId" class="form-control" placeholder="Varausnumero" required />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Kirjaudu sisään</button>
        </form>
    </div>