<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <p> ERROR </p>
                <?php if (!empty($data->error)) : ?>
                    <p> <?php echo $data->error; ?></p>
                <?php else: ?>
                    <p> 404 - File not found</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
