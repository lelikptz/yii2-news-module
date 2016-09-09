<?php
use yii\bootstrap\Html;

/**
 * @var $this yii\web\View
 */

$arrMenu = [
    ['title' => 'Все новости', 'url' => '/news', 'actions' => ['view', 'update', 'index'], 'guest' => true],
    ['title' => 'Добавить новость', 'url' => '/news/create', 'actions' => ['create'], 'guest' => false],
    ['title' => 'Все категории', 'url' => '/themes', 'actions' => ['view', 'update', 'index'], 'guest' => true],
    ['title' => 'Добавить категорию', 'url' => '/themes/create', 'actions' => ['create'], 'guest' => false]
];
$action = $this->context->action;
?>
<ul class="nav nav-pills">
    <?php
    foreach ($arrMenu as $item):
        if (Yii::$app->user->isGuest && !$item['guest']) {
            continue;
        }
        $checkAction = stripos($item['url'], $action->controller->id) && in_array($action->id, $item['actions'],
                true);
        ?>
        <li<?= $checkAction ? ' class="active"' : '' ?>>
            <?= Html::a($item['title'], [$item['url']]); ?>
        </li>
        <?php
    endforeach;
    ?>
</ul>