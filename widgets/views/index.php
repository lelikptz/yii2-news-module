<?php
/**
 * @var $arrThemes array
 * @var $arrDates array
 */
use yii\helpers\Url;

?>
<div class="list-group">
    <?php foreach ($arrThemes as $item): ?>
        <a href="<?= Url::to('/news/' . $item['id']) ?>" class="list-group-item">
            <span class="badge"><?= $item['count']; ?></span>
            <?= $item['name']; ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="list-group">
    <?php foreach ($arrDates as $year => $item): ?>
        <a href="<?= Url::to(['/news', 'year' => $year]); ?>" class="list-group-item">
            <span class="badge"><?= $item['count']; ?></span>
            <b>Новости за <?= $year; ?> год</b>
        </a>
        <div class="list-group">
            <?php if (is_array($item['months'])) : foreach ($item['months'] as $month => $count): ?>
                <a href="<?= Url::to(['/news', 'year' => $year, 'month' => $month]); ?>"
                    class="list-group-item text-center">
                    <span class="badge"><?= $count; ?></span>
                    <?= $this->context->getRuMonth($month - 1); ?>
                </a>
            <?php endforeach; endif; ?>
        </div>
    <?php endforeach; ?>
</div>
