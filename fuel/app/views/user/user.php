		<div class="loggedIn">
			<?= Html::anchor('post', '+ Post', array('class' => 'postBtn')) ?>
			<a href="<?= Uri::create(Session::get('user.username')) ?>"><div class="profileAvatar"><?= Asset::img("icons/avatar.png") ?></div></a>
			<div class="dropdownBtn">
				<?= Asset::img("icons/down.png") ?>
				<div class="dropdown">
					<?= Html::anchor(Session::get('user.username'), 'Profile', array('class' => 'userBtns'))?>
					<?= Html::anchor('post', '+ Post', array('class' => 'userBtns'))?>
					<?= Html::anchor('settings', 'Settings', array('class' => 'userBtns')) ?>
					<?= Html::anchor('logout', 'Log out', array('class' => 'userBtns')) ?>
				</div>
			</div>
		</div>