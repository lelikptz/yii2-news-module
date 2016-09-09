<?php

namespace app\modules\news\assets;

use yii\web\AssetBundle;

class NewsAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/news/web';

    public $css = [
        'css/jquery.datetimepicker.css'
    ];
    public $js = [
        'js/jquery.datetimepicker.full.min.js',
        'js/site.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
