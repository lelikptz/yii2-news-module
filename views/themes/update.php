<?php

use app\modules\news\widgets\NewsWidget;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\themes\Themes */

$this->title = 'Редактировать категорию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="themes-update">
    <div class="row">
        <div class="col-md-3">
            <?= NewsWidget::widget(); ?>
        </div>
        <div class="col-md-9">
            <?= $this->render('../menu'); ?>
            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
