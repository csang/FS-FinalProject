		<div class="loggedIn">
			<?= Html::anchor('post', '+ Post', array('class' => 'postBtn')) ?>
			<a href="<?= $user->profile_url() ?>"><div class="profileAvatar"><?= Asset::img($user->avatar_url()) ?></div></a>
			<div class="dropdownBtn">
				<?= Asset::img("icons/down.png") ?>
				<div class="dropdown">
					<?= Html::anchor($user->profile_url(), 'Profile', array('class' => 'userBtns'))?>
					<?= Html::anchor('post', '+ Post', array('class' => 'userBtns'))?>
					<?= Html::anchor('settings', 'Settings', array('class' => 'userBtns')) ?>
					<?= Html::anchor('logout', 'Log out', array('class' => 'userBtns')) ?>
				</div>
			</div>
		</div>