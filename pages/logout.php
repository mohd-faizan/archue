<?php
if (isset($_COOKIE['user_id'])) {
    unset($_COOKIE['user_id']); 
    setcookie('user_id', null, -1, '/'); 
}
session_start();
session_destroy();
header('location: /');
