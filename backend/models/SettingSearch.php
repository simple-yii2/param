<?php

namespace cms\settings\backend\models;

use Yii;
use yii\data\ActiveDataProvider;

use cms\settings\common\models\Setting;

class SettingSearch extends Setting
{

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'name' => Yii::t('settings', 'Name'),
			'value' => Yii::t('settings', 'Value'),
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'value'], 'string'],
		];
	}

	/**
	 * Search function.
	 * @param array $params Attributes array.
	 * @return yii\data\ActiveDataProvider
	 */
	public function search($params)
	{
		//ActiveQuery
		$query = static::find();

		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		//return data provider if no search
		if (!($this->load($params) && $this->validate())) return $dataProvider;

		//search
		$query->andFilterWhere(['like', 'name', $this->name]);
		$query->andFilterWhere(['like', 'value', $this->value]);

		return $dataProvider;
	}

}
