<?php

include 'includes/db.php';
include 'includes/functions.php';

// Sprawdzenie, czy formularz został przesłany/check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];


    $image_name = upload_image($image);


    add_post($title, $content, $image_name);

    // Przekierowanie do strony głównej/redirect to the main page
    header('Location: index.php');
    exit;
}

include 'includes/header.php';
?>

<div class='container'>
    <h1>Add Post</h1>
    
    <form action="add_post.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="content" placeholder="Content" required></textarea><br>
        <input type="file" name="image"><br>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'includes/footer.php';?>
