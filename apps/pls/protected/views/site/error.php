<?php
/**
 * @var Controller $this
 * @var int        $code
 * @var array      $message
 */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('pls', 'Error');
$this->breadcrumbs = [
	Yii::t('pls', 'Error'),
];
?>

<h2><?= Yii::t('pls', 'Error {n}', ['{n}' => $code]) ?></h2>

<div class="error">
	<?= CHtml::encode($message) ?>
</div>