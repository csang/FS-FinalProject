		<div class="registerBox">
			<?= Form::open('user/create'); ?>
				<p>Username:</p>
				<input type="text" name="username" /></br>
				<p>Email:</p>
				<input type="email" name="email" /></br>
				<p>Password:</p>
				<input type="password" name="password" /></br>
				<p>Password:</p>
				<input type="password" name="password_repeat" placeholder="repeat" /></br>
				<input type="submit" class="submit" value="Next" />
			<?= Form::close(); ?>
			<div class="vLine"></div>
			<div class="features">
				<ul>
					<li>Show off your own cars</li>
					<li>Check a post to tell it's good</li>
					<li>Write your own posts</li>
					<li>Show others how it's done</li>
				</ul>
			</div>
		</div>