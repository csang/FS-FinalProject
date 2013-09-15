		<div class="poster">
			<?= Asset::img('poster.jpg') ?>
		</div>
		<div class="carId">
			<div class="top">
				<div class="idAvatarMask">
					<a href="<?= $profile->profile_url() ?>"><?= Asset::img($profile->avatar_url(), array('class' => 'idAvatar')) ?></a>
				</div>
				<div class="mainInfo">
					<div class="left">
						<div class="names">
							<h2><?= $car->make()." ".$car->model()." ".$car->trim.", ".$car->year ?></h2>
							<!-- <select>
								<? foreach ($cars as $c){ ?>
									<option value="<?= $c->id ?>"><?= $c->make()." ".$c->model()." ".$c->trim.", ".$c->year ?></option>
								<? } ?>
							</select> -->
						</div>
					</div>
				</div>
				<div class="hLine">
				</div>
				<div class="bio">
					<p><?= $car->about ?></p>
					<?= Asset::img('icons/down.png') ?>
				</div>
			</div>
		</div>

		