		<?php if(isset($cars)){foreach ($cars as $car) {?>
		<div class="carId carIdList">
			<div class="top">
				<!-- <div class="idAvatarMask">
					<a href="<?= $profile->profile_url() ?>"><?= Asset::img($profile->avatar_url(), array('class' => 'idAvatar')) ?></a>
				</div> -->
				<div class="mainInfo">
					<div class="left">
						<div class="names">
							<a href="<?= Uri::create($profile->username.'/car/'.$car->make().'/'.$car->model().'/'.$car->year) ?>"><h2><?= $car->make().' '.$car->model().' '.$car->trim.', '.$car->year ?></h2></a>
							<?php if($user->id == $profile->id): ?>
								<?= Html::anchor($profile->username.'/car/'.$car->make().'/'.$car->model().'/'.$car->year.'/edit', 'Edit', array('class'=>'userSite')) ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php if($car->about != ''):  ?>
				<div class="hLine hLineCarList">
				</div>
				<?php endif; ?>
				<div class="bio">
					<p><?= $car->about ?></p>
				</div>
			</div>
		</div>
		<?php }} ?>