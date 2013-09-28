		<div class="carSelector">
			<div class="carInputs">
				<input class="filterMake" list="makes" placeholder="Make">
				<datalist id="makes">
					<?php foreach ($makes as $make) { ?>
						<option value="<?= $make->name ?>">
					<? } ?>
				</datalist>
				<input class="filterModel" list="models" placeholder="Model">
				<datalist id="models">
					<?php foreach ($models as $model) { ?>
						<option value="<?= $model->name ?>">
					<? } ?>
				</datalist>
				<input class="filterYear" list="years" placeholder="Year">
				<datalist id="years">
					<option value="2000">
					<option value="2001">
					<option value="2002">
					<option value="2003">
					<option value="2004">
					<option value="2005">
					<option value="2006">
					<option value="2007">
					<option value="2008">
					<option value="2009">
					<option value="2010">
					<option value="2011">
					<option value="2012">
					<option value="2013">
					<option value="2014">
				</datalist>
			</div>
		</div>