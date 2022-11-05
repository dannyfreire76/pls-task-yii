<?php
/**
 * @var LoginForm $model
 */
?>

<div class="row justify-content-center text-center">
	<h2><?= Yii::t('pls', 'Welcome Back!') ?></h2>
	<h3><?= Yii::t('pls', 'Thanks for being a part of our online platform!') ?></h3>
</div>

<div class="form">
	<?php
	$form = $this->beginWidget('CActiveForm', [
		'id'                   => 'login-form',
		'enableAjaxValidation' => FALSE,
	]);
	?>
	<div class="form-group">
		<?= $form->labelEx($model, 'username', ['class' => 'control-label']) ?>
		<?= $form->textField($model, 'username', ['class' => 'form-control']) ?>
		<?= $form->error($model, 'username') ?>
	</div>

	<div class="form-group">
		<?= $form->labelEx($model, 'password', ['class' => 'control-label']) ?>
		<?= $form->passwordField($model, 'password', ['class' => 'form-control']) ?>
		<?= $form->error($model, 'password') ?>
	</div>

	<div class="row justify-content-center">
		<?= CHtml::submitButton('Sign In', ['class' => 'btn btn-primary centered', 'onClick' => 'return false;']) ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
