		<div class="feed">
			<?php if (isset($articles)){ foreach($articles as $article){ ?>	
			<div class="post">
				<a href="<?= Uri::create($article->user->username.'/article/'.$article->id) ?>">
					<div class="postImgMask">
						<?= Asset::img("post_images/".$article->images, array('class' => 'articleImg')) ?>
					</div>
				</a>
				<div class="content">
					<div class="likeNum">
						<?= Html::anchor($article->user->username.'/car/'.$article->car->make()."/".$article->car->model()."/".$article->car->year, $article->car->make() . " " . $article->car->model(), array('class'=>'postCar')) ?>
						<?= Asset::img('icons/tick.png') ?><p><?= $article->likes ?></p>
					</div>
					<h2><?= $article->title ?></h2>
					<p class="timestamp"><?= date("F j, g:i a", $article->created_at) ?></p>
					<p><?= $article->content_short() ?></p>
					<div class="postUserInfo">
						<div class="postAvatarMask">
							<?= Html::anchor($article->user->profile_url(), Asset::img($article->user->avatar_url(), array('class' => 'postAvatar'))) ?>
						</div>
						<?= Html::anchor($article->user->profile_url(), $article->user->username, array('class'=>'postUser')) ?>
					</div>
				</div>
			</div>
			<?php }} ?>
		</div>