<?php
require __DIR__ . "/../main.php";
define('ACTIVE_MENU_ITEM_ID', 13);
define('CLASS_NAME', Tariff::class);
$_SESSION['ACTIVE_MENU_ITEM_ID'] = ACTIVE_MENU_ITEM_ID;

$controller = new AdminController();

echo $controller->actionTariffs();