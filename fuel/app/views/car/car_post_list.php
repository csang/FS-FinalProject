		<!-- <div class="feed">
			<a href="<?= Uri::create('profile/post_detail') ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img('car1.png', array('class' => 'postImg')) ?>
				</div>
				<div class="content">
					<span class="likeNum"><p>20</p><?= Asset::img('icons/tick.png') ?></span>
					<h2>Title</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. aspernatur aut odit aut fugit, qui ratione voluptatem sequi nesciunt...</p>
				</div>
			</div></a>
		</div> -->

		<div class="feed">
			<?php if (isset($articles)){ foreach($articles as $article){ ?>
			<a href="<?= Uri::create($article->user->username.'/article/'.$article->id) ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img("post_images/".$article->images, array('class' => 'articleImg')) ?>
				</div>
				<div class="content">
					<div class="likeNum">
						<?= Asset::img('icons/tick.png') ?><p><?= $article->likes ?></p>
					</div>
					<h2><?= $article->title ?></h2>
					<p class="timestamp"><?= date("F j, g:i a", $article->created_at) ?></p>
					<p><?= $article->content_short(270) ?></p>
				</div>
			</div></a>
			<? }} ?>
		</div>