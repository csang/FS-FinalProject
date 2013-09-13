		<div class="feed">
			<?php if (isset($articles)){ foreach($articles as $article){ ?>
			<a href="<?= Uri::create($article->user->username.'/article/'.$article->id) ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img("post_images/".$article->images, array('class' => 'articleImg')) ?>
				</div>
				<div class="content">
					<div class="likeNum">
						<?= Html::anchor('car/view.php', $article->car->make->name . " " . $article->car->model->name, array('class'=>'postCar')) ?>
						<?= Asset::img('icons/tick.png') ?><p><?= $article->likes ?></p>
					</div>
					<h2><?= $article->title ?></h2>
					<p><?= $article->content_short(290) ?></p>
				</div>
			</div></a>
			<? }} ?>
		</div>