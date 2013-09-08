<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carsignite</title>
	<link rel="icon" type="image/gif" href="<?= Uri::create('assets/img/carsignite_icon.gif') ?>" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<?= Asset::css('screen.css') ?>
</head>
<body>
	<header>
		<?= Html::anchor('world/recent', Asset::img('carsignite.png', array('class' => 'logo'))) ?>
		<nav>
			<?= Html::anchor('world/recent', 'World') ?>
			<?= Html::anchor('friends/recent', 'Friends') ?>
		</nav>

		<?= isset($user_nav) ? $user_nav : null ?>

	</header>
	<div class="container">
		<?= isset($sub_nav) ? $sub_nav : null ?>

		<?= isset($sub_nav_cars) ? $sub_nav_cars : null ?>

		<?= isset($detail) ? $detail : null ?>

		<?= isset($body) ? $body : null ?>

	</div>
	<footer>
		<div class="copyright">
			<p>&copy;CARSIGNITE</p>
		</div>
		<div class="footerLinks">
			<p><?= Html::anchor('extra/about_us', 'About Us') ?> | <?= Html::anchor('extra/help', 'Help') ?> | <?= Html::anchor('extra/contact_us', 'Contact Us') ?></p>
		</div>
	</footer>
</body>
</html>
