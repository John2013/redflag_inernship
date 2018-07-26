<?php
require __DIR__ . "/../main.php";
define('ACTIVE_MENU_ITEM_ID', 11);
define('CLASS_NAME', MovieHall::class);
$_SESSION['ACTIVE_MENU_ITEM_ID'] = ACTIVE_MENU_ITEM_ID;

$controller = new AdminController();

echo $controller->actionHalls();