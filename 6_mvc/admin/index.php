<?php
require __DIR__ . "/../main.php";
define('ACTIVE_MENU_ITEM_ID', 10);
define('CLASS_NAME', Movie::class);
$_SESSION['ACTIVE_MENU_ITEM_ID'] = ACTIVE_MENU_ITEM_ID;

$controller = new AdminController();

echo $controller->actionIndex();