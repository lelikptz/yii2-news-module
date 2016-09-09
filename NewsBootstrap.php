<?php

namespace app\modules\news;

use yii\base\BootstrapInterface;

/**
 * News module bootstrap class.
 */
class NewsBootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $app->getUrlManager()->enablePrettyUrl = true;
        $app->getUrlManager()->showScriptName = false;
        $app->getUrlManager()->addRules([
            '<controller:(news|themes)>' => 'news/<controller>',
            '<controller:(news)>/<id:\d+>' => 'news/<controller>/index',
            '<controller:(news|themes)>/<action:(create|index)>' => 'news/<controller>/<action>',
            '<controller:(news|themes)>/<action:(view|update|delete)>/<id:\d+>' => 'news/<controller>/<action>',
        ]);
    }
}
