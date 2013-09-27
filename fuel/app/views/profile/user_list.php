		<?php if(isset($profiles)){foreach ($profiles as $profile) {?>
		<div class="userId userIdList">
			<div class="top">
				<div class="idAvatarMask">
					<?= Asset::img($profile->avatar_url(), array('class' => 'idAvatar')) ?>
				</div>
				<div class="mainInfo">
					<div class="left">
						<div class="names">
							<a href="<?= Uri::create($profile->username)?>"><h2><?= $profile->name ?> (<?= $profile->username ?>)</h2></a>
							<?php if($profile->site){ ?>
								<?= Html::anchor('http://' . $profile->site, $profile->site, array('class'=>'userSite')) ?>
							<? } ?>
							<?php if($user->id != $profile->id){ ?>
								<button type="button" class="<?php if($profile->check_follow($user->id)){ ?>followBtn following<? }else{ ?> followBtn <? } ?>"><?php if($profile->check_follow($user->id)){ ?>Following<? }else{ ?> Follow <? } ?></button>
							<?php } ?>
							<span class="follow_id"><?= $profile->id ?></span>
						</div>
					</div>
					<div class="right">
						<a href="<?= Uri::create($profile->username.'/cars') ?>"><div class="carNum">
							<?= Asset::img('icons/car_icon.png') ?>
							<h2><?= $profile->total_cars() ?></h2>
						</div></a>
						<a href="<?= Uri::create($profile->username.'/friends') ?>"><div class="followsNum">
							<?= Asset::img('icons/following.png') ?>
							<h2><?= $profile->total_followings() ?></h2>
						</div></a>
						<a href="<?= Uri::create($profile->username.'/followers') ?>"><div class="followersNum">
							<?= Asset::img('icons/followers.png') ?>
							<h2><?= $profile->total_followers() ?></h2>
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
		<?php }} ?>
		<? if(isset($user)){ ?>
		<span class="user_id"><?= $user->id ?></span>
		<? } ?>