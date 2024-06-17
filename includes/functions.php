<?php

//funckja pobierajaca posty z bazy danych

//pdo - PHP Data Objects
//stmt - statment/zapytanie do bazy
function get_all_posts(){
    global $pdo;

    $stmt=$pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_post($id){
    global $pdo;

    $stmt=$pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function add_post($title, $content, $image){
    global $pdo;

    $stmt = $pdo;
    $stmt=$pdo->prepare("INSERT INTO posts (title, content, image, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execte([$title, $content, $image]);
}

function update_post($id, $title, $content, $image){
    global $pdo;

    $stmt=$pdo->prepare("UPDATE posts SET title = ?, content = ?, image = ? WHERE id = ?");
    $stmt->execute([$title, $content, $image, $id]);
}

function delete_post($id){
    global $pdo;

    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$id]);
}

function get_comments($post_id){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
    $stmt->execute([$post_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function add_comment($post_id, $content, $author){
    global $pdo;

    $stmt=$pdo->prepare("INSERT INTO comments (post_id, content, author, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$post_id, $content, $author]);
}

function upload_image($image){
    $target_dir="upload/";

    $target_file=$target_dir.basename($image["name"]);

    move_uploaded_file($image["tmp_name"], $target_file);
    return basename($image["name"]);
}
