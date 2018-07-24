<?php
require "main.php";
define('ACTIVE_MENU_ITEM_ID', 1);


$controller = new MainController();

echo $controller->actionSessions($_REQUEST['movie_id']);