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
        return 'settings';
    }

    /**
     * Find by alias
     * @param string $alias 
     * @return static|null
     */
    public static function findByAlias($alias)
    {
        return static::find()->andWhere(['alias' => $alias])->one();
    }

}
