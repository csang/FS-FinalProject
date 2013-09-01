		<div class="poster">
			<?= Asset::img('poster.jpg') ?>
		</div>
		<div class="userId">
			<div class="top">
				<div class="idAvatarMask">
					<?= Asset::img($user->avatar_url(), array('class' => 'idAvatar')) ?>
				</div>
				<div class="mainInfo">
					<div class="left">
						<div class="names">
							<h2><?= $user->name ?> (<?= $user->username ?>)</h2>
							<?= Asset::img('icons/arrow-right.png') ?>
						</div>
					</div>
					<div class="right">
						<a href="<?= Uri::create('profile/car_list') ?>"><div class="carNum">
							<?= Asset::img('icons/car_icon.png') ?>
							<h2>3</h2>
						</div></a>
						<a href="<?= Uri::create('profile/user_list') ?>"><div class="followsNum">
							<?= Asset::img('icons/following.png') ?>
							<h2>257</h2>
						</div></a>
						<a href="<?= Uri::create('profile/user_list') ?>"><div class="followersNum">
							<?= Asset::img('icons/followers.png') ?>
							<h2>10K</h2>
						</div></a>
					</div>
				</div>
				<div class="hLine">
				</div>
				<div class="bio">
					<p><?= $user->bio ?></p>
					<?= Html::anchor('profile/profile.php', Asset::img('icons/down.png')) ?>
				</div>
			</div>
		</div>