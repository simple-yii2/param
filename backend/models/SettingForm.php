<?php

namespace cms\settings\backend\models;

use Yii;
use yii\base\Model;

class SettingForm extends Model
{

	/**
	 * @var string Alias.
	 */
	public $alias;

	/**
	 * @var string Title.
	 */
	public $title;

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
		$this->alias = $object->alias;
		$this->title = $object->title;
		$this->value = $object->value;

		parent::__construct($config);
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'alias' => Yii::t('settings', 'Alias'),
			'title' => Yii::t('settings', 'Title'),
			'value' => Yii::t('settings', 'Value'),
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['alias', 'string', 'max' => 50],
			['title', 'string', 'max' => 100],
			['value', 'string', 'max' => 200],
			['alias', 'required'],
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

		$object->alias = $this->alias;
		$object->title = empty($this->title) ? null : $this->title;
		$object->value = empty($this->value) ? null : $this->value;

		if (!$object->save(false))
			return false;

		return true;
	}

}
