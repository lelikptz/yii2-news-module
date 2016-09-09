<?php

use app\modules\news\widgets\NewsWidget;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;

$template = '{view}';
if (!Yii::$app->user->isGuest) {
    $template .= ' {update} {delete}';
}
?>
<div class="themes-index">
    <div class="row">
        <div class="col-md-3">
            <?= NewsWidget::widget(); ?>
        </div>
        <div class="col-md-9">
            <?= $this->render('../menu'); ?>
            <h1><?= Html::encode($this->title); ?></h1>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'name',
                    'description',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => $template
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>