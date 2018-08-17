<?php

namespace frontend\controllers;

use backend\models\Movie;
use backend\models\Session;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'only' => ['logout', 'signup'],
				'rules' => [
					[
						'actions' => ['signup'],
						'allow' => true,
						'roles' => ['?'],
					],
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::class,
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return mixed
	 */
	public function actionIndex()
	{
		$sessions = Session::find()
			->select("movie_id, MIN(time) as time")
			->where(['>=', 'session.time', date("Y-m-d H:i:s")])
//		    ->andWhere(['<=', 'session.time', date("Y-m-d H:i:s", time() + 14 * 24 * 3600)])
			->groupBy('movie_id')
			->with('movie')
			->with('movie.genres')
			->with('movie.options')
			->all();

		$sessionsNow = array_filter($sessions, function ($session) {
			/** @var $session Session */
			$sessionTime = strtotime($session->time);

			return ($sessionTime <= time() + 14 * 24 * 3600);
		});

		$sessionsSoon = array_filter($sessions, function ($session) {
			/** @var $session Session */
			$sessionTime = strtotime($session->time);

			return ($sessionTime > time() + 14 * 24 * 3600);
		});

		$moviesNow = array_map(function ($session) {
			/** @var $session Session */
			return $session->movie;
		}, $sessionsNow);
		$moviesSoon = array_map(function ($session) {
			/** @var $session Session */
			return $session->movie;
		}, $sessionsSoon);

		return $this->render('index', ['moviesNow' => $moviesNow, 'moviesSoon' => $moviesSoon]);
	}

	/**
	 * Logs in a user.
	 *
	 * @return mixed
	 */
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		} else {
			$model->password = '';

			return $this->render('login', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	/**
	 * Displays contact page.
	 *
	 * @return mixed
	 */
	public function actionContact()
	{
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
				Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
			} else {
				Yii::$app->session->setFlash('error', 'There was an error sending your message.');
			}

			return $this->refresh();
		} else {
			return $this->render('contact', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Displays about page.
	 *
	 * @return mixed
	 */
	public function actionAbout()
	{
		return $this->render('about');
	}

	/**
	 * Signs user up.
	 *
	 * @return mixed
	 * @throws \yii\base\Exception
	 */
	public function actionSignup()
	{
		$model = new SignupForm();
		if ($model->load(Yii::$app->request->post())) {
			if ($user = $model->signup()) {
				if (Yii::$app->getUser()->login($user)) {
					return $this->goHome();
				}
			}
		}

		return $this->render('signup', [
			'model' => $model,
		]);
	}

	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 */
	public function actionRequestPasswordReset()
	{
		$model = new PasswordResetRequestForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->sendEmail()) {
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

				return $this->goHome();
			} else {
				Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
			}
		}

		return $this->render('requestPasswordResetToken', [
			'model' => $model,
		]);
	}

	/**
	 * Resets password.
	 *
	 * @param string $token
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
	public function actionResetPassword($token)
	{
		try {
			$model = new ResetPasswordForm($token);
		} catch (InvalidArgumentException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}

		if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
			Yii::$app->session->setFlash('success', 'New password saved.');

			return $this->goHome();
		}

		return $this->render('resetPassword', [
			'model' => $model,
		]);
	}

	public function actionSessions()
	{
		$sessions = Session::find()
			->with('movie')
			->where(['>=', 'time', date('Y-m-d H:i:s')])
			->all();
		return $this->render('sessions', ['sessions' => $sessions]);
	}

	public function actionMovie($id)
	{
		$movie = Movie::findOne($id);
		return $this->render('movie', ['movie' => $movie]);
	}

	public function actionMovieSessions($movie_id)
	{
		$sessions = Session::find()
			->where(['>=', 'time', date('Y-m-d H:i:s')])
			->andWhere(['movie_id' => $movie_id])
			->all();

		$sessionsByDates = [];
		foreach ($sessions as $session){
			$sessionsByDates[date('Y-m-d', $session->time)][] = $session;
		}

		return $this->render('movie-sessions', ['sessions' => $sessions]);
	}
}
