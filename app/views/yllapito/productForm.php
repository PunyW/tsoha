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
                <?php if (!empty($data->errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($data->errors as $error): ?>
                                <li><?= $error ?></li>	
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="<?= URL ?>yllapito/createProduct" class="form-horizontal">
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
                                          rows="3" placeholder="Tuotteen kuvaus" required><?php
                                              if (!empty($data->description)) {
                                                  echo trim($data->description);
                                              }
                                              ?></textarea>
                            </div>
                            <div class = "col-md-4"></div>
                            <div class = "form-group col-md-3">
                                <label class = "control-label" for = "price">Hinta</label>
                                <input type = "number" name = "price" class = "form-control" placeholder = "20.00" value = "<?php
                                if (!empty($data->price)) {
                                    echo $data->price;
                                }
                                ?>" required />
                            </div>
                            <div class = "form-group col-md-3">
                                <label class = "control-label" for = "id">Tuotetunnus</label>
                                <input type = "text" name = "id" class = "form-control" placeholder = "Tuotetunnus, 5 merkkiä pitkä" value = "<?php
                                if (!empty($data->id)) {
                                    echo $data->id;
                                }
                                ?>"required />
                            </div>
                            <div class = "form-group col-md-3">
                                <label class = "control-label" for = "category">Tuoteryhmä</label>
                                <select name = "category" required>
                                    <option value = "1" <?php if ($data->category == 1) : echo 'selected';
                                       endif; ?>>Kosketiikka</option>
                                    <option value = "2"  <?php if ($data->category == 2) : echo 'selected';
                                       endif; ?>>Alkoholi</option>
                                    <option value = "3"  <?php if ($data->category == 3) : echo 'selected';
                                       endif; ?>>Makeiset</option>
                                </select>
                            </div>
                            <div class = "form-group col-lg-12">
                                <button class = "btn btn-default" type = "submit">
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