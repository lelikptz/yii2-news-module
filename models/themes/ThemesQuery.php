<?php

namespace app\modules\news\models\themes;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Themes]].
 *
 * @see Themes
 */
class ThemesQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Themes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Themes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
