<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\filters\VerbFilter;

class ProfileController extends \yii\web\Controller
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

    public function actionChange()
    {
    	/** @var User $model */
	    $model = Yii::$app->user->identity;

	    if ($model->load(Yii::$app->request->post()) && $model->save()) {
		    return $this->redirect(['index']);
	    } else {
		    return $this->render('change', [
			    'model' => $model,
		    ]);
	    }
    }

    public function actionDelete()
    {
	    /** @var User $model */
	    $model = Yii::$app->user->identity;
	    $model->delete();
        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
    	$model = Yii::$app->user->identity;

        return $this->render('index', ['model' => $model]);
    }

}
