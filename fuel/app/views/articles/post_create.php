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
					<button type="button" class="addCarBtn" value="Add New Car">Add New Car</button>
				</div>

				<div class="addCarForm">
					<p>Make:</p>
					<input type="text" placeholder="Make" name="make" class="make" list="makes">
					<datalist id="makes">
						<?php foreach ($makes as $make) { ?>
							<option value="<?= $make->name ?>">
						<? } ?>
					</datalist>
					<button type="button" class="hideCarFormBtn" value="Select Existing Car">Select Existing Car</button>
					<p>Model:</p>
					<input type="text" placeholder="Model" name="model" class="model" list="models">
					<datalist id="models">
						<?php foreach ($models as $model) { ?>
							<option value="<?= $model->name ?>">
						<? } ?>
					</datalist>
					<p>Trim:</p>
					<input type="text" placeholder="Trim" name="trim" class="trim">
					<p>Year:</p>
					<input type="number" placeholder="Year" name="year" class="year">
				</div>
				
				<!-- <p>Mods:</p>
				<input type="text" class="mods" name="mods" placeholder="eg. spoiler, lip, engine, etc" /></br> -->
				<p>Title:</p>
				<input type="text" class="title" name="title" placeholder="Title" /></br>
				<p>Story:</p>
				<textarea cols="70" rows="20" placeholder="Tell us what you did" name="content"></textarea></br>
				<p>Image: ( &lt; 10MB )</p>
				<input type="file" class="file" name="image" /></br>
				<input type="submit" class="submit" value="Post" />
			<?= Form::close() ?>
		</div>