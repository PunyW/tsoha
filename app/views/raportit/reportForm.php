<div class="container">
    <?php
    printNotices();
    $passenger = $data->passenger;
    ?>
    <!-- Matkustajan tiedot -->
    <legend>Matkustajan tiedot</legend>
    <div class="col-lg-4">
        <?php
        echo 'Nimi: ' . $passenger->getName();
        ?>
    </div>
    <div class="col-lg-4">
        <?php
        echo 'Lennonnumero: ' . $passenger->getFlightNumber();
        ?>
    </div>
    <div class="col-lg-4">
        <?php
        echo 'Varatut paikat: ' . $passenger->getSeats();
        ?>
    </div>
    <div class="col-lg-4">
        <?php
        echo 'Lähtökenttä: ' . $passenger->getDepartureAirport();
        ?>
    </div>
    <div class="col-lg-4">
        <?php
        echo 'Lähtöaika: ' . $passenger->getDepartureTime();
        ?>
    </div>
    <!-- /Matkustajan tiedot -->

    <!-- Matkustajan toiveet lennolle -->
    <legend>Matkustajan tekemät toiveet lennolle </legend>
    
    <!-- /Matkustajan toiveet lennolle -->
    <?php 
        foreach ($data->wishes as $wish) {
            echo '<div class="col-lg-4">';
            echo $wish->getDescription() . '<br>';
            echo '</div>';
        }
    ?>
    <!-- Matkustajan tilaamat tuotteet -->
    <legend>Etukäteen tilatut tax-free tuotteet</legend>
    <?php
    $price = 0;
    foreach ($data->orders as $order) {
        echo '<div class="col-lg-4">';
        echo 'Tuote: ' . $order->getProduct_name();
        echo '</div>';

        echo '<div class="col-lg-4">';
        echo 'Määrä: ' . $order->getQuantity();
        echo '</div>';

        echo '<div class="col-lg-4">';
        echo 'Hinta: ' . $order->getPrice() . ' €';
        $price += $order->getPrice();
        echo '</div>';
    }
    ?>
    <!-- /Matkustajan tilaamata tuotteet -->
    <legend></legend>
    <div class="col-lg-8">
        <a href="<?= URL ?>raportit"<button class="btn btn-sm btn-success">Takaisin</button></a>
    </div>
    <div class="col-lg-2"><?php echo 'Yhteensä: ' . $price . ' €' ?></div>



</div>