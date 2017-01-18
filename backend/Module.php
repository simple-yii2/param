<?php

namespace cms\settings\backend;

use Yii;

use cms\components\BackendModule;

/**
 * Settings backend module
 */
class Module extends BackendModule {


	/**
	 * @inheritdoc
	 */
	public static function moduleName()
	{
		return 'settings';
	}

	/**
	 * @inheritdoc
	 */
	protected static function cmsSecurity()
	{
		$auth = Yii::$app->getAuthManager();
		if ($auth->getRole('Settings') === null) {
			//role
			$role = $auth->createRole('Settings');
			$auth->add($role);
		}
	}

	/**
	 * @inheritdoc
	 */
	protected static function cmsMenu($base)
	{
		if (!Yii::$app->user->can('Settings'))
			return [];

		return [
			['label' => Yii::t('settings', 'Settings'), 'url' => ["$base/settings/setting/index"]],
		];
	}

}
