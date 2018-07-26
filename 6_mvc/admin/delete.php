<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 25.07.2018
 * Time: 17:01
 */
require __DIR__ . "/../main.php";
define('ACTIVE_MENU_ITEM_ID', $_SESSION['ACTIVE_MENU_ITEM_ID']);


//pprint($res);

$controller = new AdminController();

$controller->actionDelete();
