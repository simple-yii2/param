<?php

namespace cms\settings\frontend\helpers;

class Setting
{

	/**
	 * Return setting value by alias
	 * @param string $alias 
	 * @return string
	 */
	public static function get($alias, $default = '')
	{
		$object = \cms\settings\common\models\Setting::findByAlias($alias);

		return $object === null ? $default : $object->value;
	}

}
