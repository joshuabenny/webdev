<div class="m-5 p-5" style="text-align: center; background-color: #f2f2f2; display: inline-block; border-radius: 15px;">
    <a class="button" href="<?=base_url()?>blogs/new">Create Blog</a>

    <h1><?= esc($title) ?></h1>

    <?php if (! empty($blogs) && is_array($blogs)): ?>

        <?php foreach ($blogs as $blogs_item): ?>

            <h3><?= esc($blogs_item['title']) ?></h3>

            <div class="main">
                <?= esc($blogs_item['body']) ?>
            </div>
            <div class="main">
                <?= esc($blogs_item['date']) ?>
            </div>
            <a href="/blogs/<?= esc($blogs_item['slug'], 'url') ?>" class="button">View blogs</a>
            <a href="/blogs/edit/<?= esc($blogs_item['id']) ?>" class="button">Edit blogs</a>
            <form action="/blogs/delete/<?= esc($blogs_item['id']) ?>" method="post" style="display:inline">
                    <?= csrf_field() ?>
                    <button class="button del_button" type="submit" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                </form>

        <?php endforeach ?>
        

    <?php else: ?>

        <h3>No Blogs</h3>

        <p>Unable to find any blogs for you.</p>

    <?php endif ?>
</div>

