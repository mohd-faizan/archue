<?php
if (isset($_COOKIE['isLoggedIn'])) {
    $id = $_GET['id'];
    require_once("user.php");
    $user = new User;
    echo $user->hasMagazineSubscription($id);
} else {
    header('location: /');
}
