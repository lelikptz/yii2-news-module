<?php

namespace app\modules\news\models\themes;

use app\modules\news\models\news\News;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "themes".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property News[] $news
 */
class Themes extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'themes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Категория',
            'description' => 'Описание'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['theme_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ThemesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ThemesQuery(get_called_class());
    }
}
