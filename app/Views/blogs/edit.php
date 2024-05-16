<h2><?= esc($title) ?></h2>

<?= \Config\Services::validation()->listErrors() ?>

<form action="/blogs/update/<?= esc($blogs['id']) ?>" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?= esc($blogs['title']) ?>" /><br />

    <label for="body">Body</label>
    <textarea name="body"><?= esc($blogs['body']) ?></textarea><br />

    <input type="submit" name="submit" value="Update blogs item" />
</form>