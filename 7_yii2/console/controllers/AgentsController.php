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

		\Yii::info('clear-old-sessions start', '\console\controllers\AgentsController');
		Session::deleteNonActual();
		\Yii::info('clear-old-sessions end', '\console\controllers\AgentsController');

		return ExitCode::OK;
	}
}