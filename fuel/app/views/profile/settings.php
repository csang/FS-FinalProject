		<div class="registerBox profileCreateBox">
			<?= Form::open(array('action' => 'user/profile/update', 'enctype' => 'multipart/form-data')); ?>
				<p>Name:</p>
				<input type="text" name="name" value="<?= $profile->name?>" /></br>
				<p>Email:</p>
				<input type="text" name="email" value="<?= $profile->email?>" /></br>
				<p>Avatar:</p>
				<input type="file" class="file" name="avatar" accept="image" /></br>
				<p>Site:</p>
				<input type="text" name="site" placeholder="http://www.example.com" value="<?= $profile->site?>"/></br>
				<p>Bio:</p>
				<textarea name="bio" rows="7" cols="30" maxlength="200" placeholder="Anything you would like to share to the world about yourself?"><?= $profile->bio?></textarea></br>
				<input type="hidden" name="currentAvatar" value="<?= $profile->avatar ?>" />
				<input type="submit" class="submit" value="Save" />
			<?= Form::close() ?>
		</div>