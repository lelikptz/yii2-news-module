<?php

use app\modules\news\widgets\NewsWidget;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\themes\Themes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="themes-view">
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
                        'confirm' => 'Вы уверены, что хотите удалить категорию?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
            <?php endif; ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'description'
                ],
            ]) ?>
        </div>
    </div>
</div>
