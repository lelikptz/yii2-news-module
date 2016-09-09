<?php

use app\modules\news\widgets\NewsWidget;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\news\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">
    <div class="row">
        <div class="col-md-3">
            <?= NewsWidget::widget(); ?>
        </div>
        <div class="col-md-9">
            <?= $this->render('../menu'); ?>
            <h1><?= Html::encode($this->title) ?></h1>
            <?php if (!Yii::$app->user->isGuest) : ?>
            <p>
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Уверены что хотите удалить новость?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
            <?php endif; ?>
            <h5><b>Дата:</b> <?= $model->created; ?></h5>
            <h5><b>Категория:</b> <?= $model->theme ? $model->theme->name : 'Нет категории'; ?></h5>
            <p><?= $model->text ?></p>
        </div>
    </div>
</div>
