<div class="container">
    <div class="col-lg-12">
        <div class="well bs-component">
            <form class="form-horizontal"  >
                <fieldset>
                    <legend>
                        <?php if ($data->edit) : ?>
                            Tuotteen muokkaus
                        <?php else: ?>
                            Uuden tuotteen lisäys
                        <?php endif; ?>
                    </legend>
                    <?php if (!empty($data->errors)): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($data->errors as $error): ?>
                                    <li><?= $error ?></li>	
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class = "form-group">
                        <label class = "col-lg-2 control-label" for = "name">Tuotenimi</label>
                        <div class="col-lg-10">
                            <input type = "text" name = "name" class = "form-control" placeholder = "Tuotenimi, min. 3 merkkiä" value = "<?php
                            if (!empty($data->name)) {
                                echo $data->name;
                            }
                            ?>"mouseev="true" keyev="true" clickev="true" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="description">Tuotteen kuvaus</label>
                        <div class="col-lg-10">
                            <textarea name="description" class="form-control" id="description" 
                                      mouseev="true" keyev="true" clickev="true" rows="3" required><?php
                                          if (!empty($data->description)) {
                                              echo $data->description;
                                          } else {
                                              echo 'Tuotteen kuvaus';
                                          }
                                          ?>
                            </textarea>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>