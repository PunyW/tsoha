<div class="container">
    <?php printNotices(); ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-9">
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
                <form class="form-inline" role="form" action="<?=URL?>yllapito/search" method="get">
                    <input type="text" name="product_search" class="form-control" placeholder="Hae tuotetta...">
                    <input type="submit" value="Hae" class="btn btn-default" >
                </form>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-striped" id="products">
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
                            <td><?php echo $product->getName(); ?></td>
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
