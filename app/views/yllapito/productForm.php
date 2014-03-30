<div class="container">
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php if ($data->edit) : ?>
                    <h3 class="panel-title">Tuotteen muokkaus</h3>
                <?php else: ?>
                    <h3 class="panel-title">Uuden tuotteen lisäys</h3>
                <?php endif; ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="<?= URL ?>yllapito/" class="form-horizontal">
                            <div class="col-md-4">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="../img/icons.png">
                                    </a>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="control-label" for="description">Tuotteen kuvaus</label>
                                <textarea name="description" class="form-control" 
                                          rows="3" placeholder="Tuotteen kuvaus" required autofocus> </textarea>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-3">
                                <label class="control-label" for="price">Hinta</label>
                                <input type="number" name="price" class="form-control" placeholder="20.00" required />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label" for="id">Tuotetunnus</label>
                                <input type="text" name="id" class="form-control" placeholder="Tuotetunnus, 5 merkkiä pitkä" required />
                            </div>
                            <div class="form-group col-lg-12">
                                <button class="btn btn-default" type="submit">
                                    <?php if ($data->edit) : ?>
                                        Päivitä
                                    <?php else: ?>
                                        Lisää tuote
                                    <?php endif; ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            