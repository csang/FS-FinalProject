		<div class="postBox">
			<!-- <form action="" method="post" enctype="multipart/form-data"> -->
			<?= Form::open(array('action' => 'post/create', 'enctype' => 'multipart/form-data')); ?>
				<p>Car:</p>
				<input list="cars" placeholder="Make:Model:Year" name="car">
				<datalist id="cars">
					<? foreach ($cars as $car) { ?>
						<option value="<?= $car->make() . ":" . $car->model() . ":" . $car->year ?>">
					<? } ?>
				</datalist></br>
				<p>Title:</p>
				<input type="text" class="title" name="title" placeholder="Title" /></br>
				<p>Mods:</p>
				<input type="text" class="mods" name="mods" placeholder="eg. spoiler, lip, engine, etc" /></br>
				<p>Story:</p>
				<textarea cols="70" rows="20" placeholder="Tell us what you did" name="content"></textarea></br>
				<p>Images:</p>
				<input type="file" class="file" name="images" /></br>
				<input type="submit" class="submit" value="Post" />
			<?= Form::close() ?>
		</div>