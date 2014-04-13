<div class="container">
    <?php
    $sum = 0;
    printNotices();
    ?>
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4>Ostoskori</h4>
            </div>
            <div class="panel-body">

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nimi</th>
                            <th>Hinta</th>
                            <th>Määrä</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $purchase) {
                            ?>
                            <tr>
                                <td><?php echo $purchase->getProductName(); ?></td>
                                <td><?php echo $purchase->getProductPrice(); ?></td>
                                <td><?php echo $purchase->getAmount(); ?></td>
                                <td>
                                    <a href="<?PHP URL ?>ostoskori/removeFromCart/<?php echo $purchase->getProductId(); ?>" >
                                        <button type="button" class="btn btn-info">Poista ostoskorista</button>
                                    </a>
                                </td>
                            </tr> 
                            <?php
                            $sum += $purchase->getProductPrice() * $purchase->getAmount();
                        }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-8">
                        Ostosten hinta yhteensä: <?php echo $sum; ?> €
                    </div>
                    <div class="col-md-2">
                        <a href="<?PHP URL ?>ostoskori/confirmCart"><button class="button btn btn-sm btn-info">Vahvista tilaus</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>