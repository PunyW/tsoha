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
                <form class="form-inline" role="form" action="<?= URL ?>index/search" method="get">
                    <input type="text" name="product_search" class="form-control" placeholder="Hae tuotetta...">
                    <input type="submit" value="Hae" class="btn btn-default" >
                </form>
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
                            <td><?php echo $product->getName(); ?></td>
                            <td><?php echo $product->getPrice(); ?></td>
                            <td><a href="<?= URL ?>ostoskori/addToCart/<?php echo $product->getId(); ?>/<?php echo $product->getName(); ?>"><button type="button" class="btn btn-xs btn-default">
                                        <span class="glyphicon glyphicon-plus"></span></button></a>
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