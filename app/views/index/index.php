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
                            <li><a href="<?= URL ?>">Kaikki Tuotteet</a></li>
                            <?php
                            foreach ($data->categories as $category) {
                                ?>
                                <li><a href="<?= URL ?>index/tuoteryhma/<?php echo $category->getId(); ?>"><?php echo $category->getCategory_Name(); ?></a></li>
                            <?php }
                            ?>
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
                        <th>Kuva</th>
                        <th>Nimi</th>
                        <th>Hinta</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($data->products as $product) {
                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $product->getProduct_Name(); ?></td>
                            <td><?php echo $product->getPrice(); ?></td>
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