		<?php if(isset($flash)): ?>
		<div class="flash-error"><?= $flash ?></div>
		<?php endif; ?>
		<div class="registerBox">
			<?= Form::open(array('action' => 'user/create', 'enctype' => 'multipart/form-data')); ?>
				<p>Username:</p>
				<input class="username" type="text" name="username" placeholder="minimum 6 characters" /></br>
				<p>Email:</p>
				<input class="email" type="email" name="email" placeholder="example@email.com" /></br>
				<p>Password:</p>
				<input class="password" type="password" name="password" placeholder="minimum 6 characters" /></br>
				<p>Repeat Password:</p>
				<input class="password_repeat" type="password" name="password_repeat" placeholder="repeat" /></br>
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