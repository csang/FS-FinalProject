		<div class="poster">
			<?= Asset::img($profile->poster_url()) ?>
		</div>
		<div class="carId">
			<div class="top">
				<div class="idAvatarMask">
					<a href="<?= $profile->profile_url() ?>"><?= Asset::img($profile->avatar_url(), array('class' => 'idAvatar')) ?></a>
				</div>
				<div class="mainInfo">
					<div class="left">
						<div class="names">
							<h2><?= $car->make().' '.$car->model().' '.$car->trim.', '.$car->year ?></h2>
							<?= Asset::img('icons/down.png') ?>
							<?php if(isset($user) && $user->id == $profile->id): ?>
								<?= Html::anchor($profile->username.'/car/'.$car->make().'/'.$car->model().'/'.$car->year.'/edit', 'Edit', array('class'=>'userSite')) ?>
							<?php endif; ?>
							<div class="carDropdown">
								<? foreach ($cars as $c){ ?>
									<?= Html::anchor($profile->username.'/car/'.$c->make().'/'.$c->model().'/'.$c->year, $c->make() . ' ' . $c->model().' '.$c->trim.', '.$c->year, array('class'=>'postCar')) ?>
								<? } ?>
							</div>
						</div>
					</div>
				</div>
				<?php if($car->about != ''):  ?>
				<div class="hLine">
				</div>
				<?php endif; ?>
				<div class="bio">
					<p><?= $car->about ?></p>
				</div>
			</div>
		</div>

		