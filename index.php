<?php
include 'includes/db.php';
include 'includes/functions.php';

//pobranie postow z bazy/fetch posts from db
$posts=get_all_posts();

include 'includes/header.php';
?>

<div class="container">
    <h1>Blog</h1>

    <?php foreach ($posts as $post):?>
    <div class="post">
        <h2><a href="post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>

        <p><?=htmlspecialchars($post['content'])?></p>

        <?php if($post['image']):?>
            <img src="uploads/<?=htmlspecialchars($post['image'])?>"alt="Post Image">
        <?php endif;?>

        <p><em>Posted on <?=htmlspecialchars($post['created_at']) ?></em></p>

    </div>
    <?php endforeach;?>
</div>

<?php include 'includes/footer.php'; ?>
