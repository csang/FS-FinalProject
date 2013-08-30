		<div class="feed">
			<?php foreach($articles as $article){ ?>	
			<a href="<?= Uri::create('post_detail') ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img($article->images, array('class' => 'articleImg')) ?>
				</div>
				<div class="content">
					<span class="likeNum"><p>20</p><?= Asset::img('icons/tick.png') ?></span>
					<h2><?= $article->title ?></h2>
					<p><?= $article->content_short() ?></p>
					<div class="postUserInfo">
						<div class="postAvatarMask">
							<?= Html::anchor($article->user->profile_url(), Asset::img($article->user->avatar_url(), array('class' => 'postAvatar'))) ?>
						</div>
						<?= Html::anchor('car/view.php', $article->car->model->name . " " . $article->car->make->name . ", " . $article->car->year, array('class'=>'postCar')) ?>
					</div>
				</div>
			</div></a>
			<? } ?>
		</div>