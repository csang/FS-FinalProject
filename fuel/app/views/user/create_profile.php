		<div class="registerBox profileCreateBox">
			<?= Form::open(array('action' => 'user/profile/update', 'enctype' => 'multipart/form-data')); ?>
				<p>Name:</p>
				<input type="text" name="name" /></br>
				<p>Avatar:</p>
				<input type="file" class="file" name="avatar" accept="image" /></br>
				<p>Site:</p>
				<input type="text" name="site" placeholder="http://www.example.com" /></br>
				<p>Bio:</p>
				<textarea name="bio" rows="7" cols="30" placeholder="Anything you would like to share to the world about yourself?"></textarea></br>
				<?= Html::anchor('world/recent', 'Skip', array('class' => 'skip')) ?>
				<input type="submit" class="submit" value="Finish" />
			<?= Form::close() ?>
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