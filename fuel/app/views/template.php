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
	<header class="clearfix">
		<?= Html::anchor('world/recent', Asset::img('carsignite.png', array('class' => 'logo'))) ?>
		<nav>
			<?php if (Uri::segment(1) == 'world'): ?>
				<?= Html::anchor('world/recent', 'World', array('class'=> 'active')) ?>
			<?php else: ?>
				<?= Html::anchor('world/recent', 'World') ?>
			<?php endif; ?>
			
			<?php if (Uri::segment(1) == 'friends'): ?>
				<?= Html::anchor('friends/recent', 'Friends', array('class'=> 'active')); ?>
			<?php else: ?>
				<?= Html::anchor('friends/recent', 'Friends') ?>
			<?php endif; ?>
		</nav>

		<?= isset($user_nav) ? $user_nav : null ?>

	</header>

	<?php if (isset($notice)): ?>
	<div class="flash-<?= $notice->type ?>"><?= $notice->message ?></div>
	<?php endif; ?>

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
			<p><?= Html::anchor('about_us', 'About Us') ?> | <?= Html::anchor('help', 'Help') ?> | <?= Html::anchor('contact_us', 'Contact Us') ?></p>
		</div>
	</footer>
	<?= Asset::js('jquery-1.10.2.min.js') ?>
	<?= Asset::js('lib.js') ?>
	<?= Asset::js('main.js') ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-32531852-2', 'carsignite.com');
		ga('send', 'pageview');

	</script>
</body>
</html>
