<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 form-container">
            <form action="/blogs" method="post">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="input" name="title" class="form-control" value="<?= set_value('title') ?>">
                </div>

                <div class="form-group">
                    <label for="body">Text</label>
                    <textarea name="body" class="form-control" cols="45" rows="4"><?= set_value('body') ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create blog item</button>
            </form>
        </div>
    </div>
</div>