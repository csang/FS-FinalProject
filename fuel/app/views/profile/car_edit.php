		<div class="registerBox profileCreateBox carDetail">
			<?= Form::open(array('action' => $user->username.'/car/'.$car->make().'/'.$car->model().'/'.$car->year.'/update', 'enctype' => 'multipart/form-data')); ?>

			<p>Make:</p>
			<input type="text" name="make" value="<?= $car->make()?>" /></br>
			<p>Model:</p>
			<input type="text" name="model" value="<?= $car->model()?>" /></br>
			<p>Trim:</p>
			<input type="text" name="trim" value="<?= $car->trim?>" /></br>
			<p>Year:</p>
			<input type="number" name="year" value="<?= $car->year?>"/></br>
			<p>About:</p>
			<textarea name="about" rows="7" cols="30" maxlength="200" placeholder="Anything you would like to share to the world about your car?"><?= $car->about?></textarea></br>
<!-- 			<input type="hidden" name="currentImg" value="<?= $car->image ?>" />
 -->
			<div class="postButtons postEditButtons">
				<input type="submit" class="submit" value="Save" />
				<?= Html::anchor($car->user->username.'/car/'.$car->make().'/'.$car->model().'/'.$car->year, 'Cancel', array('class'=>'cancelBtn button')) ?>
				<?= Html::anchor($car->user->username.'/car/'.$car->make().'/'.$car->model().'/'.$car->year.'/delete', 'Delete', array('class'=>'deleteBtn button')) ?>
			</div>

			<?= Form::close() ?>
		</div>

			
		