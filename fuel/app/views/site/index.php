		<div class="feed">
			<a href="<?= Uri::create('post_detail') ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img('car1.png', array('class' => 'postImg')) ?>
				</div>
				<div class="content">
					<span class="likeNum"><p>20</p><?= Asset::img('icons/tick.png') ?></span>
					<h2>Title</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. aspernatur aut odit aut fugit, qui ratione voluptatem sequi nesciunt...</p>
					<div class="postUserInfo">
						<div class="postAvatarMask">
							<?= Html::anchor('csang', Asset::img('avatar.jpg', array('class' => 'postAvatar'))) ?>
						</div>
						<?= Html::anchor('car/view.php', 'Honda Accord, 2008', array('class'=>'postCar')) ?>
					</div>
				</div>
			</div></a>
		</div>