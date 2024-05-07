<h2><?= esc($title) ?></h2>

<?php if (! empty($blogs) && is_array($blogs)): ?>

    <?php foreach ($blogs as $blogs_item): ?>

        <h3><?= esc($blogs_item['title']) ?></h3>

        <div class="main">
            <?= esc($blogs_item['body']) ?>
        </div>
        <div class="main">
            <?= esc($blogs_item['date']) ?>
        </div>
        <p><a href="/blogs/<?= esc($blogs_item['slug'], 'url') ?>">View blogs</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Blogs</h3>

    <p>Unable to find any blogs for you.</p>

<?php endif ?>