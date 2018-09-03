<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 14.08.2018
 * Time: 12:07
 */

namespace console\controllers;


use backend\models\Session;
use yii\console\ExitCode;

class AgentsController extends \yii\console\Controller
{
	function actionClearOldSessions(){

		Session::deleteNonActual();

		return ExitCode::OK;
	}
}