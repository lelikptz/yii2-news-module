<?php

namespace app\modules\news\models\news;

use app\modules\news\models\themes\Themes;
use yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $theme_id
 * @property string $created
 *
 * @property Themes $theme
 */
class News extends ActiveRecord
{
    const DATE_FORMAT = 'Y-m-d H:i';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'theme_id'], 'required'],
            [['text'], 'string'],
            [['theme_id'], 'integer'],
            [['created'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'theme_id' => 'Категория',
            'created' => 'Дата публикации'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheme()
    {
        return $this->hasOne(Themes::className(), ['id' => 'theme_id']);
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    public function afterFind()
    {
        $this->created = date(self::DATE_FORMAT, strtotime($this->created));
        parent::afterFind();
    }

    /**
     * Массив фильтров
     * Ключи - входящий параметр
     * Значение - равное параметру значение в бд
     * @var array
     */
    protected static $arrFilters = [
        'id' => 'theme_id',
        'year' => 'YEAR(created)',
        'month' => 'MONTH(created)'
    ];

    /**
     * Применяем фильтры
     * @param NewsQuery $query
     * @return NewsQuery
     */
    public static function addFilters(NewsQuery $query)
    {
        foreach (self::$arrFilters as $filter => $cond) {
            $value = Yii::$app->request->get($filter, null);
            if ($value) {
                $query->andWhere($cond . ' = :' . $filter);
                $query->addParams([':' . $filter => $value]);
            }
        }
    }
}
