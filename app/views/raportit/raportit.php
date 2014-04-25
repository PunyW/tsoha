<div class="container">
    <?php printNotices(); ?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Matkustaja</th>
                <th>Lento</th>
                <th>Lähtöaika</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data->reports)) {
                foreach ($data->reports as $key => $report) {
                    ?>
                    <tr>
                        <td><?php echo $report->getPassengerName(); ?></td>
                        <td><?php echo $report->getFlightNumber(); ?></td>
                        <td><?php echo $report->getFlightTime(); ?></td>
                        <td>
                            <form action="<?= URL ?>raportit/view" method="POST">
                                <input type="hidden" name="flightId" value="<?php echo $report->getFlightId(); ?>" />
                                <input type="hidden" name="passengerId" value="<?php echo $report->getPassengerId(); ?>" />
                                <input type="hidden" name="departureTime" value="<?php echo $report->getFlightTime(); ?>" />
                                <button class="btn btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>