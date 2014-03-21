<link href="<?= URL ?>assets/css/signin.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <form class="form-signin" role="form" action="elogin/login" method="post">
            <?php if (!empty($data->error)) { ?>
                <div class="alert alert-danger">Virhe! <?php echo $data->error; ?> </div>
            <?php } ?>
            <h2 class="form-signin-heading">Kirjaudu sisään</h2>
            <input type="text" name="username" class="form-control" placeholder="Käyttäjätunnus" required autofocus />
            <input type="password" name="pw" class="form-control" placeholder="Salasana" required />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Kirjaudu sisään</button>
        </form>
    </div>

