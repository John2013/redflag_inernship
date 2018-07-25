<?
require __DIR__ . "/../main.php";
define('ACTIVE_MENU_ITEM_ID', $_SESSION['ACTIVE_MENU_ITEM_ID']);

$model_name = $_REQUEST['add']['class_name'];
$res = null;
if(count($_REQUEST['add']) > 1){
	/** @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model */
	$model = new $model_name($_REQUEST['add']);
	$res = $model->save();
}

$controller = new AdminController();
if($res){
	echo alert('Запись сохранена', 'success');
}
echo $controller->actionAdd($model_name);