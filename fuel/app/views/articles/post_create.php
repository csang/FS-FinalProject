		<div class="postBox">
			<?= Form::open(array('action' => 'post/create', 'enctype' => 'multipart/form-data')); ?>
				
				<div class="addedCarForm">
					<p>Car:</p>
					<select class="selectCar" name="car">
						<option value="NULL">Select your car</option>
						<? foreach ($cars as $car) { ?>
						<option value="<?= $car->id ?>"><?= $car->make() . " " . $car->model() . ", " . $car->year ?></option>
						<? } ?>
					</select>
					<button type="button" class="addCarBtn" value="+ Car">+ Car</button>
				</div>

				<div class="addCarForm">
					<p>Make:</p>
					<input type="text" placeholder="Make" name="make">
					<button type="button" class="hideCarFormBtn" value="^ Car">^ Car</button>
					<p>Model:</p>
					<input type="text" placeholder="Model" name="model">
					<p>Trim:</p>
					<input type="text" placeholder="Trim" name="trim">
					<p>Year:</p>
					<input type="number" placeholder="Year" name="year">
				</div>
				
				<p>Mods:</p>
				<input type="text" class="mods" name="mods" placeholder="eg. spoiler, lip, engine, etc" /></br>
				<p>Title:</p>
				<input type="text" class="title" name="title" placeholder="Title" /></br>
				<p>Story:</p>
				<textarea cols="70" rows="20" placeholder="Tell us what you did" name="content"></textarea></br>
				<p>Images:</p>
				<input type="file" class="file" name="images" /></br>
				<input type="submit" class="submit" value="Post" />
			<?= Form::close() ?>
		</div>