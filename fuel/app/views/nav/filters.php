		<div class="subNav">
			<? if(Uri::segment(1) == 'world'): ?>
				<?php if (Uri::segment(2) == 'recent'): ?>
				<?= Html::anchor('world/recent', 'Recent', array('class'=>'active')) ?>
				<?php else: ?>
				<?= Html::anchor('world/recent', 'Recent') ?>
				<?php endif; ?>

				<?php if (Uri::segment(2) == 'popular'): ?>
				<?= Html::anchor('world/popular', 'Popular', array('class'=>'active')) ?>
				<?php else: ?>
				<?= Html::anchor('world/popular', 'Popular') ?>
				<?php endif; ?>

				<?php if (Uri::segment(2) == 'featured'): ?>
				<?= Html::anchor('world/featured', 'Featured', array('class'=>'active')) ?>
				<?php else: ?>
				<?= Html::anchor('world/featured', 'Featured') ?>
				<?php endif; ?>

				<?php if (Uri::segment(2) == 'search'): ?>
				<?= Html::anchor('world/search', 'Search', array('class'=>'active')) ?>
				<?php else: ?>
				<?= Html::anchor('world/search', 'Search') ?>
			<?php endif; endif; ?>

			<? if(Uri::segment(1) == 'friends'): ?>
				<?php if(Uri::segment(2) == 'recent'): ?>
				<?= Html::anchor('friends/recent', 'Recent', array('class'=>'active')) ?>
				<?php else: ?>
				<?= Html::anchor('friends/recent', 'Recent') ?>
				<?php endif; ?>

				<?php if(Uri::segment(2) == 'popular'): ?>
				<?= Html::anchor('friends/popular', 'Popular', array('class'=>'active')) ?>
				<?php else: ?>
				<?= Html::anchor('friends/popular', 'Popular') ?>
				<?php endif; ?>

				<?php if(Uri::segment(2) == 'featured'): ?>
				<?= Html::anchor('friends/featured', 'Featured', array('class'=>'active')) ?>
				<?php else: ?>
				<?= Html::anchor('friends/featured', 'Featured') ?>
				<?php endif; ?>

				<?php if(Uri::segment(2) == 'search'): ?>
				<?= Html::anchor('friends/search', 'Search', array('class'=>'active')) ?>
				<?php else: ?>
				<?= Html::anchor('friends/search', 'Search') ?>
			<?php endif; endif; ?>
		</div>