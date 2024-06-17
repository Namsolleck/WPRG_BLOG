<?php

include 'includes/db.php';
include 'includes/functions.php';



$post_id=$_GET['id'];

$post=get_post($post_id);

$comments=get_comments($post_id);

include 'includes/header.php';
?>

<div class='container'>

    <h1><?=htmlspecialchars($post['title'])?></h1>

    <p><?=htmlspecialchars($post['content'])?></p>

    <?php if($post['image']):?>
        <img src="uploads/<?=htmlspecialchars($post['image'])?>"alt="Post image">
    <?php endif; ?>

    <p><em>Posted on <?=htmlspecialchars($post['created_at'])?>/em></em></p>


    <h2>Comments</h2>

    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <p><?=htmlspecialchars($comment['content'])?></p>
            <p><em>By <?= htmlspecialchars($comment['author']) ?> on <?= htmlspecialchars($comment['created_at']) ?></em></p>
        </div>
    <?php endforeach;?>

    <h3>Add a comment</h3>
    <form action="add_comment.php" method="post">
        <input type="hidden" name="post_id" value"<?=$post_id ?>">
        <textarea name="content" required></textarea><br>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'includes/footer.php';?>
