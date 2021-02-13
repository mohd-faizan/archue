<?php
    session_start();
    $post = $_POST;
    $_SESSION['name'] = $post['name'];
    $_SESSION['email'] = $post['email'];
    $_SESSION['number'] = $post['number'];
    $_SESSION['amount'] = $post['amount'];
    $_SESSION['description'] = $post['description'];
    $_SESSION['id'] = $post['id'];
    echo json_encode($post);
?>