<?php

namespace app\modules\news\widgets;

use app\modules\news\models\news\News;
use app\modules\news\models\themes\Themes;
use yii\base\Widget;

class NewsWidget extends Widget
{
    public $arrThemes = [];
    public $arrDates = [];

    public function init()
    {
        parent::init();
        $this->arrThemes = Themes::find()
            ->asArray()
            ->select(['themes.id', 'themes.name', 'count(news.id) as count'])
            ->leftJoin('news', 'themes.id = news.theme_id')
            ->groupBy('themes.id')->all();

        $this->arrDates = $this->getDatesArray();
    }

    protected function getDatesArray()
    {
        $arrDates = News::find()
            ->asArray()
            ->select('YEAR(created) as year, MONTH(created) as month')
            ->orderBy('year DESC, month DESC')
            ->all();

        $arr = [];
        array_walk($arrDates, function ($dates) use (&$arr) {
            $count = &$arr[$dates['year']]['count'];
            $count ? $count++ : $count = 1;

            $key = &$arr[$dates['year']]['months'][$dates['month']];
            $key ? $key++ : $key = 1;
        });
        return $arr;
    }

    public function getRuMonth($key)
    {
        return [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ][$key];
    }

    public function run()
    {
        return $this->render('index', ['arrThemes' => $this->arrThemes, 'arrDates' => $this->arrDates]);
    }
}