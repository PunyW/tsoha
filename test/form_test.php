<?php
require '../app/libs/Database.php';
require '../app/libs/Form.php';
require '../app/libs/FormValidator.php';

if (isset($_REQUEST['run'])) {
    $form = new Form();

    try {
        $form->post('name')->validate('minLength','nimi', 3)
                ->post('age')->validate('maxLength', 'ikä', 2)->post('gender');
        $form->submit();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

    
}
?>

<form method='post' action='?run'>
    Name <input type='text' name='name' />
    Age <input type='age' name='age' />
    Gender <select name='gender'>
        <option value='m'>male</option>
        <option value='f'>female</option>
    </select>
    <input type='submit' />
</form>



<?php if (Session::get('success')) : ?>
        <div class="alert alert-success">
            <?php
            echo Session::get('success');
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif ?>
    <?php if (Session::get('alert')) : ?>
        <div class="alert alert-danger">
            <?php
            echo Session::get('alert');
            unset($_SESSION['alert']);
            ?>
        </div>
    <?php endif ?>