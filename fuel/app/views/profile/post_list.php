		<div class="feed">
			<?php if (isset($articles)){ foreach($articles as $article){ ?>
			<a href="<?= Uri::create($article->user->username.'/article/'.$article->id) ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img("post_images/".$article->image, array('class' => 'articleImg')) ?>
				</div>
				<div class="content">
					<div class="likeNum">
						<?= Html::anchor($article->user->username.'/car/'.$article->car->make()."/".$article->car->model()."/".$article->car->year, $article->car->make() . " " . $article->car->model(), array('class'=>'postCar')) ?>
						<?= Asset::img('icons/tick.png') ?><p><?= $article->likes ?></p>
					</div>
					<h2><?= $article->title ?></h2>
					<p class="timestamp"><?= date("F j, g:i a", $article->created_at) ?></p>
					<p><?= $article->content_short(270) ?></p>
				</div>
			</div></a>
			<? }} ?>
		</div>