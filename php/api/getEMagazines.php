<?php
if (isset($_COOKIE['isLoggedIn'])) {
    require_once("user.php");
    $user = new User;
    echo $user->getEMagazines();
} else {
    header('location: /');
}
