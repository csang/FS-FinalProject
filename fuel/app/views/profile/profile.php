		<div class="poster">
			<?= Asset::img($profile->poster_url()) ?>
		</div>
		<div class="userId">
			<div class="top">
				<div class="idAvatarMask">
					<?= Asset::img($profile->avatar_url(), array('class' => 'idAvatar')) ?>
				</div>
				<div class="mainInfo">
					<div class="left">
						<div class="names">
							<h2><?= $profile->name ?> | <?= $profile->username ?></h2>
							<?php if($profile->site){ ?>
								<?= Html::anchor('http://' . $profile->site, $profile->site, array('class'=>'userSite')) ?>
							<?php } ?>
							<?php if($user->id != $profile->id):?>
							<button type="button" class="<?php if($following){ ?>followBtn following<? }else{ ?> followBtn <? } ?>"><?php if($following){ ?>Following<? }else{ ?> Follow <? } ?></button>
							<?php endif; ?>
							<span class="follow_id"><?= $profile->id ?></span>
						</div>
					</div>
					<div class="right">
						<a href="<?= Uri::create($profile->username.'/cars') ?>"><div class="carNum">
							<?= Asset::img('icons/car_icon.png') ?>
							<h2><?= $total_cars ?></h2>
						</div></a>
						<a href="<?= Uri::create($profile->username.'/friends') ?>"><div class="followsNum">
							<?= Asset::img('icons/following.png') ?>
							<h2><?= $total_followings ?></h2>
						</div></a>
						<a href="<?= Uri::create($profile->username.'/followers') ?>"><div class="followersNum">
							<?= Asset::img('icons/followers.png') ?>
							<h2><?= $total_followers ?></h2>
						</div></a>
					</div>
				</div>
				<div class="hLine">
				</div>
				<div class="bio">
					<p><?= $profile->bio ?></p>
				</div>
			</div>
		</div>
		<? if(isset($user)){ ?>
		<span class="user_id"><?= $user->id ?></span>
		<? } ?>