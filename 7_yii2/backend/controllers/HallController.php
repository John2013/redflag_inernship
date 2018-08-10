<?php

namespace backend\controllers;

use backend\models\Row;
use backend\models\SetPlacesCountForm;
use Yii;
use backend\models\Hall;
use backend\models\HallSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HallController implements the CRUD actions for Hall model.
 */
class HallController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::class,
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Hall models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new HallSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Hall model.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Hall model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Hall();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Hall model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Hall model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException
	 * @throws \Throwable
	 * @throws \yii\db\StaleObjectException
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Hall model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Hall the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Hall::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	/**
	 * Displays a single Hall model.
	 * @param integer $id
	 * @param string|null $action
	 * @return mixed
	 * @throws NotFoundHttpException
	 * @throws \Throwable
	 * @throws \yii\db\StaleObjectException
	 */
	public function actionPlaces($id, $action = null)
	{
		$hall = $this->findModel($id);
		/** @var Row[] $rows */

		if (isset($action)) {
			switch ($action) {
				case 'add-row':
					$hall->addRow();
					break;

				case 'delete-row':
					$hall->deleteRow();
			}

			$this->redirect(['places', 'id' => $id]);
		}

		$rows = $hall->getRows()->orderBy(['number' => SORT_ASC])->all();

		if (isset($rows)) {
			/** @var SetPlacesCountForm $form */
			$form = new SetPlacesCountForm();
			if (
				$form->load(Yii::$app->request->post())
				&& $form->validate()) {
				$form->setPlacesCount();
				return $this->refresh();
			}
		}

		return $this->render('places', [
			'hall' => $hall,
			'rows' => $rows,
			'places' => $hall->getPlaces($rows),
			'set_count_forms' => $hall->getSetCountForms($rows)
		]);
	}


}
