<?php
require __DIR__ . "/../main.php";
define('ACTIVE_MENU_ITEM_ID', 12);
define('CLASS_NAME', Place::class);
$_SESSION['ACTIVE_MENU_ITEM_ID'] = ACTIVE_MENU_ITEM_ID;

$controller = new AdminController();

echo $controller->actionPlaces();