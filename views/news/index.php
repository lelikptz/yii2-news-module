<?php

use app\modules\news\widgets\NewsWidget;
use yii\helpers\Html;
use yii\widgets\LinkPager;

/**
 * @var $this yii\web\View
 * @var app\modules\news\models\news\News[] $arrNews
 * @var yii\data\Pagination $objPages
 */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">
    <div class="row">
        <div class="col-md-3">
            <?= NewsWidget::widget(); ?>
        </div>
        <div class="col-md-9">
            <?= $this->render('../menu'); ?>
            <h1><?= Html::encode($this->title) ?></h1>
            <br>
            <?php foreach ($arrNews as $objNews): ?>
                <ul class="media-list">
                    <li class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><?= $objNews->title; ?></h4>
                            <h5 class="media-heading">
                                <?= $objNews->theme ? $objNews->theme->name : 'Нет категории'; ?>

                                <h6 class="media-heading"><?= $objNews->created; ?></h6>
                                <p><?= mb_substr($objNews->text, 0, 255) . '...'; ?></p>
                                <p><?= Html::a('Подробнее', ['view', 'id' => $objNews->id],
                                        ['class' => 'btn btn-primary']) ?></p>
                        </div>
                    </li>
                </ul>
            <?php endforeach; ?>
            <?= LinkPager::widget([
                'pagination' => $objPages,
            ]);
            ?>
        </div>
    </div>
</div>
