<div class="container">
    <?php if (Session::get('success')) : ?>
        <div class="alert alert-success">
            <?php
            echo Session::get('success');
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif ?>
    <?php if (Session::get('alert')) : ?>
        <div class="alert alert-danger">
            <?php
            echo Session::get('alert');
            unset($_SESSION['alert']);
            ?>
        </div>
    <?php endif ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Tuoteryhmä<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= URL ?>yllapito">Kaikki Tuotteet</a></li>
                            <?php
                            foreach ($data->categories as $category) {
                                ?>
                                <li><a href="<?= URL ?>yllapito/tuoteryhma/<?php echo $category->getId(); ?>"><?php echo $category->getCategory_Name(); ?></a></li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                    <a href="<?= URL ?>yllapito/uusiTuote" ><button type="button" class="btn btn-default">Luo uusi tuote</button></a>
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
                        <th>Tuotetunnus</th>
                        <th>Nimi</th>
                        <th>Hinta</th>
                        <th>Tuoteryhmä</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($data->products as $product) {
                        ?>
                        <tr>
                            <td><?php
                                echo $product->getId();
                                ?></td>
                            <td><?php echo $product->getProduct_Name(); ?></td>
                            <td><?php echo $product->getPrice(); ?></td>
                            <td><?php echo $product->getCategory_name(); ?></td>
                            <td>
                                <a href="<?= URL ?>yllapito/muokkaa/<?php echo $product->getId(); ?>">
                                    <button type="button" class="btn btn-xs btn-default">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </a>
                                <a href="<?= URL ?>yllapito/poistaTuote/<?php echo $product->getId(); ?>">
                                    <button type="button" class="btn btn-xs btn-default">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </a>
                            </td>
                        </tr> 
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>