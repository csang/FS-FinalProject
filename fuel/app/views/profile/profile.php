		<div class="poster">
			<?= Asset::img('poster.jpg') ?>
		</div>
		<div class="userId">
			<div class="top">
				<div class="idAvatarMask">
					<?= Asset::img($profile->avatar_url(), array('class' => 'idAvatar')) ?>
				</div>
				<div class="mainInfo">
					<div class="left">
						<div class="names">
							<h2><?= $profile->name ?> (<?= $profile->username ?>)</h2>
							<? if(isset($user->id) && $profile->id != $user->id){ ?>
							<button type="button" class="<? if($following){ ?>followBtn following<? }else{ ?> followBtn <? } ?>"><? if($following){ ?>Following<? }else{ ?> Follow <? } ?></button>
							<? } ?>
						</div>
					</div>
					<div class="right">
						<a href="<?= Uri::create('profile/car_list') ?>"><div class="carNum">
							<?= Asset::img('icons/car_icon.png') ?>
							<h2><?= $total_cars ?></h2>
						</div></a>
						<a href="<?= Uri::create('profile/user_list') ?>"><div class="followsNum">
							<?= Asset::img('icons/following.png') ?>
							<h2><?= $total_followings ?></h2>
						</div></a>
						<a href="<?= Uri::create('profile/user_list') ?>"><div class="followersNum">
							<?= Asset::img('icons/followers.png') ?>
							<h2><?= $total_followers ?></h2>
						</div></a>
					</div>
				</div>
				<div class="hLine">
				</div>
				<div class="bio">
					<p><?= $profile->bio ?></p>
					<?= Html::anchor('profile/profile.php', Asset::img('icons/down.png')) ?>
				</div>
			</div>
		</div>
		<? if(isset($user)){ ?>
		<span class="user_id"><?= $user->id ?></span>
		<? } ?>
		<span class="follow_id"><?= $profile->id ?></span>