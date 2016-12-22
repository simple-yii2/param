<?php

namespace cms\settings\backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use cms\settings\backend\models\SettingForm;
use cms\settings\backend\models\SettingSearch;
use cms\settings\common\models\Setting;

class SettingController extends Controller
{

	/**
	 * Access control.
	 * @return array
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					['allow' => true, 'roles' => ['Settings']],
				],
			],
		];
	}

	/**
	 * List
	 * @return string
	 */
	public function actionIndex()
	{
		$model = new SettingSearch;

		return $this->render('index', [
			'dataProvider' => $model->search(Yii::$app->getRequest()->get()),
			'model' => $model,
		]);
	}

	/**
	 * Create
	 * @return string
	 */
	public function actionCreate()
	{
		$model = new SettingForm(new Setting);

		if ($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', Yii::t('settings', 'Changes saved successfully.'));
			return $this->redirect(['index']);
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Update
	 * @param integer $id
	 * @return string
	 */
	public function actionUpdate($id)
	{
		$object = Setting::findOne($id);
		if ($object === null)
			throw new BadRequestHttpException(Yii::t('settings', 'Setting not found.'));

		$model = new SettingForm($object);

		if ($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', Yii::t('settings', 'Changes saved successfully.'));
			return $this->redirect(['index']);
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Delete
	 * @param integer $id
	 * @return string
	 */
	public function actionDelete($id)
	{
		$item = Setting::findOne($id);
		if ($item === null)
			throw new BadRequestHttpException(Yii::t('settings', 'Setting not found.'));

		if ($item->delete()) {			
			Yii::$app->session->setFlash('success', Yii::t('settings', 'Setting deleted successfully.'));
		}

		return $this->redirect(['index']);
	}

}
