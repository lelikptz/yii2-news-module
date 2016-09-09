
# Test task #

Install:
```
#!bash
composer global require "fxp/composer-asset-plugin:^1.2.0"
composer create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
cd basic
git clone https://github.com/lelikptz/yii2-news-module.git ./modules/news
./yii migrate --migrationPath=@app/modules/news/migrations

```

add to config/web.php
```
#!php
    'modules' => [
        'news' => [
            'class' => 'app\modules\news\Module',
        ],
    ],
    'bootstrap' => [
        'log',
        'app\modules\news\NewsBootstrap'
    ],    
```

Test database dump: @app/modules/news/yii2_dump.sql

News url: /news

Login for create/edit news