<div class="container">
    <?php printNotices(); ?>
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4>Ostoskori</h4>
            </div>

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
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>