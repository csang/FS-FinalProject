		<div class="poster">
			<?= Asset::img('poster.jpg') ?>
		</div>
		<div class="userId">
			<div class="top">
				<div class="idAvatarMask">
					<?= Asset::img('avatar.jpg', array('class' => 'idAvatar')) ?>
				</div>
				<div class="mainInfo">
					<div class="left">
						<div class="names">
							<h2><?= $user_profile->name ?> (<?= $user_profile->username ?>)</h2>
							<?= Asset::img('icons/arrow-right.png') ?>
						</div>
					</div>
					<div class="right">
						<a href="<?= Uri::create('profile/car_list') ?>"><div class="carNum">
							<?= Asset::img('icons/vinyl.png') ?>
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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. aspernatur aut odit aut fugit, qui ratione voluptatem sequi nesciunt...</p>
					<?= Html::anchor('profile/profile.php', Asset::img('icons/down.png')) ?>
				</div>
			</div>
		</div>