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
                        <?php if ($data->edit) : ?>
                            <form method="post" action="<?= URL ?>yllapito/updateProduct/<?php echo $data->id ?>" class="form-horizontal">
                            <?php else: ?>
                                <form method="post" action="<?= URL ?>yllapito/createProduct" class="form-horizontal">
                                <?php endif ?>
                                <div class="col-md-4">
                                    <!--                                    <div class="media">
                                                                            <a class="pull-left" href="#">
                                                                                <img class="media-object" src="">
                                                                            </a>
                                                                        </div>-->
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="control-label" for="description">Tuotteen kuvaus</label>
                                    <textarea name="description" class="form-control" 
                                              rows="3" required><?php
                                                  if (!empty($data->description)) {
                                                      echo $data->description;
                                                  } else {
                                                      echo 'Tuotteen kuvaus';
                                                  }
                                                  ?></textarea>
                                </div>
                                <div class = "col-md-4"></div>
                                <div class = "form-group col-md-2">
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
                                    <label class = "control-label" for = "name">Tuotenimi</label>
                                    <input type = "text" name = "name" class = "form-control" placeholder = "Tuotenimi, min. 3 merkkiä" value = "<?php
                                    if (!empty($data->name)) {
                                        echo $data->name;
                                    }
                                    ?>"required />
                                </div>
                                <div class = "form-group col-md-3">
                                    <label class = "control-label" for = "category">Tuoteryhmä</label>
                                    <select name = "category" required>
                                        <?php
                                        foreach ($data->categories as $category) {
                                            ?>
                                            <option value="<?php echo $category->getId(); ?>" <?php
                                            if ($data->category == $category->getId()) : echo 'selected';
                                            endif;
                                            ?>><?php echo $category->getCategory_Name(); ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class = "form-group col-lg-12">
                                    <button class = "btn btn-default" type = "submit">
                                        <?php if ($data->edit) : ?>
                                            Päivitä </button>
                                    <?php else: ?>
                                        Lisää tuote</button>
                                    <?php endif; ?>
                                </div>
                            </form>
                            <?php if ($data->edit) : ?><a href="<?= URL ?>yllapito/poistaTuote/<?php echo $data->id ?>">
                                    <button class="btn btn-default">Poista</button></a>
                                <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            