<?php
/**
 * @var Controller $this
 * @var string     $content
 */
?>
<?php $this->beginContent('/layouts/main'); ?>
	<div class="container">
		<div id="content">
			<?= $content ?>
		</div>
	</div>
<?php $this->endContent(); ?>