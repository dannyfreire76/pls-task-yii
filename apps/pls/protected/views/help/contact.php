<?php
/**
 * @var HelpController $this
 * @var ContactForm    $model
 */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('pls', 'Contact Us');
$this->breadcrumbs = [
	Yii::t('pls', 'Contact'),
];
?>

<h1><?= Yii::t('pls', 'Contact Us') ?></h1>

<?php
if (Yii::app()->user->hasFlash('contact')) {
	?>
	<div class="flash-success">
		<?= Yii::app()->user->getFlash('contact') ?>
	</div>
	<?php
}
else {
	$form = $this->beginWidget('CActiveForm');
	?>
	<div class="row">
		<div class="col-md-6">
			<div class="contact-form form mx-4">
				<?= $form->errorSummary($model) ?>

				<div class="row">
					<div class="form-group form-group-lg">
						<?= $form->labelEx($model, 'name', ['class' => 'control-label']) ?>
						<?= $form->textField($model, 'name', ['class' => 'form-control']) ?>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<?= $form->labelEx($model, 'email', ['class' => 'control-label']) ?>
						<?= $form->textField($model, 'email', ['class' => 'form-control']) ?>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<?= $form->labelEx($model, 'subject', ['class' => 'control-label']) ?>
						<?= $form->textField($model, 'subject', ['size' => 60, 'maxlength' => 128, 'class' => 'form-control']) ?>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<?= $form->labelEx($model, 'body', ['class' => 'control-label']) ?>
						<?= $form->textArea($model, 'body', ['rows' => 6, 'cols' => 50, 'class' => 'form-control']) ?>
					</div>
				</div>
				<div class="row submit mt-3">
					<?= CHtml::submitButton('Submit', ['class' => 'btn btn-primary', 'onclick' => 'return false;']); ?>
				</div>

				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
	<?php
} ?>