<style>
    .button {
        display: inline-block;
        background-color: #4CAF50;
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        padding: 10px 20px;
    }
</style>

<div class="m-5 p-5" style="text-align: center; background-color: #f2f2f2; display: inline-block; border-radius: 15px;">
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

        <?php endforeach ?>
        

    <?php else: ?>

        <h3>No Blogs</h3>

        <p>Unable to find any blogs for you.</p>

    <?php endif ?>
</div>

