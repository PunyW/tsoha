<div class="container">
    <?php printNotices(); 
        $passenger = $data->passenger;
    ?>
        <legend>Varaajan tiedot </legend>
        <div class="col-lg-4">
            <?php 
                echo 'Nimi: ' . $passenger->getName();
            ?>
        </div>
        <div class="col-lg-4">
        </div>
        
        <div class="col-lg-4">
            <?php 
                echo 'Lennonnumero: ' . $passenger->getFlight_id();
            ?>
        </div>
        <legend>Lennon tiedot</legend>
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
        <div class="col-lg-4">
            <?php 
                echo 'Varatut paikat: ' . $passenger->getSeats();
            ?>
        </div>
        <div class="col-lg-4">
            <?php 
                echo 'Määränpää: ' . $passenger->getDestination();
            ?>
        </div>
        <div class="col-lg-4">
            <?php 
            echo 'Arvioitu laskeutumisaika: ' ;
                if($passenger->getEstimatedArrival() == null) {
                    echo 'Ei tiedossa vielä';
                } else {
                    echo $passenger->getEstimatedArrival();
                }
            ?>
        </div>
        <div class="col-lg-4">
            <?php 
                echo 'Boarding time: ' . $passenger->getBoardingTime();
            ?>
        </div>
        <!-- END OF FLIGHT AND PASSENGER INFO -->
        
        <legend>Toiveita lennolle</legend>
        TODO TOIVEET
        
        <legend>Lennolle tilatut tuotteet</legend>
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
        <legend></legend>
        <div class="col-lg-8"></div>
        <div class="col-lg-2"><?php echo 'Yhteensä: ' . $price . ' €' ?></div>
</div>

