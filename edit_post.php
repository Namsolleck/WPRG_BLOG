<?php

include 'includes/db.php';
include 'includes/functions.php';

$post_id=$_GET['id'];

$post=get_post($post_id);

if($_SERVER['REQUEST_METHOD']==='POST')
{
    $title = $_POST['title'];
    $content=$_POST['content'];
    $image=$_FILES['image'];

    //przeslanie nowego obrazka/uploading new image
    if($image['name']) {
        $image_name = upload_image($image);
    }
    else
    {
        $image_name=$post['image'];
    }

    update_post($post_id, $title, $content, $image_name);

    //przekierowanie do strony z psotem/redirect to post
    header('Location: post.php?id='.$post_id);
    exit;
}

include 'includes/header.php';
?>


<div class="container">
    <h1>Edit Post</h1>

    <form action="edit_post.php?id=<?=$post_id ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="<?=htmlspecialchars($post['title'])?>" required><br>
        <textarea name="content" required><?=htmlspecialchars($post['content'])?></textarea><br>
        <input type="file" name="image"><br>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'includes/footer.php';?>
