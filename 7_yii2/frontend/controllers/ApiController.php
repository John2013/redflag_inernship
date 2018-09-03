<?php

namespace frontend\controllers;

use backend\models\Place;
use backend\models\Reservation;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class ApiController extends \yii\web\Controller
{
	public function actionSetPlaces(string $auth_key, array $place_ids, int $reservation_id)
	{
		$user = User::findOne(['auth_key' => $auth_key]);
		$reservation = Reservation::findOne($reservation_id);
		$errors = [];

		if (!isset($user))
			$errors[] = 'user is unauthorized';

		if (!isset($reservation))
			$errors[] = 'reservation with given id is not exists';
		elseif ($reservation->user_id != $user->id)
			$errors[] = 'reservation created by other user';

		if (!empty($errors))
			return Json::encode(['errors' => $errors, 'success' => false]);

		$reservation->place_ids = $place_ids;
		$success = $reservation->save(false);
		$result = [
			'reservation' => ArrayHelper::toArray($reservation),
			'places' => $reservation->getPlaces()->asArray()->all(),
			'success' => $success
		];
		return Json::encode($result);
	}

	public function actionCreateReservation(string $auth_key, int $session_id, array $place_ids, int $status_id)
	{
		$user = User::findOne(['auth_key' => $auth_key]);
		if (!isset($user))
			return Json::encode(['errors' => ['user is unauthorized']]);

		$new_reservation = new Reservation(
			[
				'user_id' => $user->id,
				'session_id' => $session_id,
				'place_ids' => $place_ids,
				'status_id' => $status_id
			]
		);
		$success = $new_reservation->save(false);
		$result = [
			'reservation' => ArrayHelper::toArray($new_reservation),
			'places' => $new_reservation->getPlaces()->asArray()->all(),
			'success' => $success
		];
		return Json::encode($result);
	}

	public function actionDeleteReservation(string $auth_key, int $id)
	{
		$user = User::findOne(['auth_key' => $auth_key]);
		$reservation = Reservation::findOne($id);
		$errors = [];

		if (!isset($user))
			$errors[] = 'user is unauthorized';

		if (!isset($reservation))
			$errors[] = 'reservation with given id is not exists';
		elseif ($reservation->user_id != $user->id)
			$errors[] = 'reservation created by other user';

		if (!empty($errors))
			return Json::encode(['errors' => $errors, 'success' => false]);

		$success = $reservation->delete();
		return Json::encode(['success' => $success]);
	}

//	public function actionGetPlaces(string $auth_key, int $session_id)
//	{
//		$user = User::findOne(['auth_key' => $auth_key]);
//		$session = Session::findOne($session_id);
//		if (!isset($user))
//			return Json::encode(['errors' => ['user is unauthorized']]);
//
//		if (!isset($session))
//			return Json::encode(['errors' => ['this session is not exists']]);
////
////		$reservation_ids = ArrayHelper::getColumn(
////			$session
////				->getReservations()
////				->select(['id'])
////				->where(['!=', 'user_id', $user->id])
////				->asArray()
////				->all(),
////			'id'
////		);
////
////		$places = Place::find()->where($condition)
////
////		/** @var User $user */
////		$user = \Yii::$app->user->identity;
////
////		$reservation = $user->getReservations()->orderBy(['created_at' => SORT_DESC])->limit(0)->one();
//
//
//	}

	public function actionPlaceIsFree(int $place_id, int $session_id)
	{
		$place = Place::findOne($place_id);
		return (int)$place->isFree($session_id);
	}

}
