<?php
require "main.php";
define('ACTIVE_MENU_ITEM_ID', 0);


$controller = new MainController();

echo $controller->actionIndex();