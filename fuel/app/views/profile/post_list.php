		<div class="feed">
			<a href="<?= Uri::create('profile/post_detail') ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img('car1.png', array('class' => 'postImg')) ?>
				</div>
				<div class="content">
					<span class="likeNum"><p>20</p><?= Asset::img('icons/tick.png') ?></span>
					<h2>Title</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. aspernatur aut odit aut fugit, qui ratione voluptatem sequi nesciunt...</p>
					<div class="postUserInfo">
						<?= Html::anchor('car/view.php', 'Honda Accord, 2008', array('class'=>'postCar')) ?>
					</div>
				</div>
			</div></a>
		</div>

		<!-- <div class="feed">
			<?php /*foreach($articles as $article){ ?>	
			<a href="<?= Uri::create('post_detail') ?>"><div class="post">
				<div class="postImgMask">
					<?= Asset::img($article->images, array('class' => 'articleImg')) ?>
				</div>
				<div class="content">
					<span class="likeNum"><p>20</p><?= Asset::img('icons/tick.png') ?></span>
					<h2><?= $article->title ?></h2>
					<p><?= $article->content_short() ?></p>
					<div class="postUserInfo">
						<?= Html::anchor('car/view.php', $article->car->make->name . " " . $article->car->model->name . ", " . $article->car->year, array('class'=>'postCar')) ?>
					</div>
				</div>
			</div></a>
			<? } */?>
		</div> -->