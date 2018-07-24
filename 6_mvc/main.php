<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

require __DIR__ . '/components/main_menu.php';

require "config/config.php";
require "db/dbconn.php";

require __DIR__ . "/models/BaseModel.php";
require __DIR__ . "/models/HallRow.php";
require __DIR__ . "/models/Movie.php";
require __DIR__ . "/models/MovieHall.php";
require __DIR__ . "/models/Place.php";
require __DIR__ . "/models/Reservation.php";
require __DIR__ . "/models/Session.php";
require __DIR__ . "/models/Tariff.php";

require __DIR__ . "/controllers/BaseController.php";
require __DIR__ . "/controllers/MainController.php";