<?php
/**
 * @var Controller $this
 * @var string     $content
 */
?>

<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<main class="container" id="page">

	<header class="d-flex flex-wrap justify-content-left border-bottom" id="header">
		<img id="logo" class="ml-2" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Logo"/>
	</header>

	<nav class="navbar navbar-expand-lg bg-light">
		<a class="navbar-brand" href="#"><?= Yii::t('pls', 'Sample Application') ?></a>
		<div class="navbar-collapse">
			<ul class="navbar-nav nav nav-pills">
				<?php
				if (Yii::app()->user->isGuest) {
					?>
					<li class="nav-item"><a href="/site/login" class="nav-link"><?= Yii::t('pls', 'Login') ?></a></li>
					<?php
				}
				else {
					?>
					<li class="nav-item"><a href="/site/logout" class="nav-link"><?= Yii::t('pls', 'Logout') ?></a></li>
					<?php
				}
				?>
				<li class="nav-item"><a href="/site/about" class="nav-link"><?= Yii::t('pls', 'About') ?></a></li>
				<li class="nav-item"><a href="/help/updates" class="nav-link"><?= Yii::t('pls', 'Latest Updates') ?></a>
				</li>
				<li class="nav-item"><a href="/help/contact" class="nav-link"><?= Yii::t('pls', 'Contact') ?></a></li>
			</ul>
		</div>
	</nav>

	<main>
		<?php
		$this->widget('zii.widgets.CBreadcrumbs', [
			'links' => $this->breadcrumbs,
		]);
		?>
		<div class="row my-2">
			<?= $content ?>
		</div>
	</main>

	<footer>
		<?= Yii::app()->params['copyrightInfo'] ?>
	</footer>

</main>
</body>
</html>