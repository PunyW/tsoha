<div class="container">
    <?php if (Session::get('greeting')) : ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    Tervetuloa!
                </div>
            </div>
        </div>
        <?php
    endif;
    Session::set('greeting', false);
    ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Tuoteryhmä<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Ryhmä 1</a></li>
                            <li><a href="#">Ryhmä 2</a></li>
                            <li><a href="#">Ryhmä 3</a></li>
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
                        <th>#</th>
                        <th>Kuva</th>
                        <th>Kuvaus</th>
                        <th>Hinta</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Inc</td>
                        <td>Kuvaus</td>
                        <td>Hinta</td>
                        <td><button type="button" class="btn btn-xs btn-default">
                                <span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn btn-xs btn-default">
                                <span class="glyphicon glyphicon-minus"></span></button>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
</div>