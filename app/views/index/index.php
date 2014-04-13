<div class="container">
    <?php printNotices(); ?>
    <ul class="nav nav-pills">
        <li>
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
        </li>
        <li>
            <form class="form-inline" role="form" action="<?= URL ?>index/search" method="get">
                <input type="text" name="product_search" class="form-control" placeholder="Hae tuotetta...">
                <input type="submit" value="Hae" class="btn btn-default" >
            </form>
        </li>
    </ul>
    <div class = "col-md-12">
        <h3>Tuotteet</h3>
        <div id="wrap">
            <?php foreach ($data->products as $product) { ?>
                <br>
                <div class="product col-md-12">
                    <form method="post" action="<?= URL ?>ostoskori/addToCart">
                        <div class="col-md-3">
                            <img src="<?= URL ?>assets/img/placeholder.png">
                        </div>
                        <div class="col-md-9">
                            <h3><?php echo $product->getName(); ?></h3>

                            <div class="product-description">
                                <?php echo $product->getDescription(); ?>
                            </div>
                            <div class="product-price">
                                Hinta: <?php echo $product->getPrice(); ?> €
                                <br>Määrä: 
                                <select name="productQuantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <button class="btn btn-xs btn-success ">
                                    <span class="glyphicon glyphicon-shopping-cart"></span></button>
                            </div>
                        </div>
                        <input type="hidden" name="productId" value="<?php echo $product->getId(); ?>" />
                        <input type="hidden" name="productName" value="<?php echo $product->getName(); ?>" />
                    </form>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>