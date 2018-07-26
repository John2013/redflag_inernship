<?
require __DIR__ . "/../main.php";
define('ACTIVE_MENU_ITEM_ID', $_SESSION['ACTIVE_MENU_ITEM_ID']);



$controller = new AdminController();
echo $controller->actionDetail();