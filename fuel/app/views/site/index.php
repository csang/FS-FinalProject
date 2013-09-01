		<div class="feed">
			<?php if (isset($articles)){ foreach($articles as $article){ ?>	
			<a href="<?= Uri::create('post_detail') ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img("post_images/".$article->images, array('class' => 'articleImg')) ?>
				</div>
				<div class="content">
					<div class="likeNum">
						<?= Html::anchor('car/view.php', $article->car->make->name . " " . $article->car->model->name, array('class'=>'postCar')) ?>
						<?= Asset::img('icons/tick.png') ?><p>20</p>
					</div>
					<h2><?= $article->title ?></h2>
					<p><?= $article->content_short() ?></p>
					<div class="postUserInfo">
						<div class="postAvatarMask">
							<?= Html::anchor($article->user->profile_url(), Asset::img($article->user->avatar_url(), array('class' => 'postAvatar'))) ?>
						</div>
						<?= Html::anchor($article->user->profile_url(), $article->user->username, array('class'=>'postUser')) ?>
					</div>
				</div>
			</div></a>
			<? }}else if(Uri::segment(1) == "friends"){;?>
			<h2>In here you'll see articles from the users you follow. Check out for cars you like and follow it's owner!</h2></br>
			<div class="poster">
				<?= Asset::img('poster.jpg'); ?>
			</div></br>
			<? } ?>
		</div>