<?php

namespace cms\settings\backend\models;

use Yii;
use yii\base\Model;

class SettingForm extends Model
{

	/**
	 * @var string Name.
	 */
	public $name;

	/**
	 * @var string Value.
	 */
	public $value;

	/**
	 * @var cms\settings\common\models\Setting
	 */
	private $_object;

	/**
	 * @inheritdoc
	 * @param cms\settings\common\models\Setting $object 
	 */
	public function __construct(\cms\settings\common\models\Setting $object, $config = [])
	{
		$this->_object = $object;

		//attributes
		$this->name = $object->name;
		$this->value = $object->value;

		parent::__construct($config);
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
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
			['name', 'string', 'max' => 50],
			['value', 'string', 'max' => 200],
			['name', 'required'],
		];
	}

	/**
	 * Save
	 * @return boolean
	 */
	public function save()
	{
		if (!$this->validate())
			return false;

		$object = $this->_object;

		$object->name = $this->name;
		$object->value = empty($this->value) ? null : $this->value;

		if (!$object->save(false))
			return false;

		return true;
	}

}
