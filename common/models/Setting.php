<?php

namespace cms\settings\common\models;

use Yii;
use yii\db\ActiveRecord;

class Setting extends ActiveRecord
{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Settings';
	}

	/**
	 * Find by name
	 * @param string $name 
	 * @return static|null
	 */
	public static function findByName($name)
	{
		return static::find()->andWhere(['name' => $name])->one();
	}

}
