<?php
    require_once("app.php");
	App::addEMagazine($_FILES['magazine'], $_FILES['cover_image'], $_POST);
