		<div class="loginBox">
			<?= Form::open('user'); ?>
				<label>Username:</label>
				<input type="text" name="username" /></br>
				<label>Password:</label>
				<input type="text" name="password" /></br>
				<input type="submit" class="submit" value="Log in" />
			<?= Form::close() ?>
		</div>