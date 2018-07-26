<?php
require __DIR__ . "/../main.php";
define('ACTIVE_MENU_ITEM_ID', 14);
define('CLASS_NAME', Session::class);
$_SESSION['ACTIVE_MENU_ITEM_ID'] = ACTIVE_MENU_ITEM_ID;

$controller = new AdminController();

echo $controller->actionSessions();