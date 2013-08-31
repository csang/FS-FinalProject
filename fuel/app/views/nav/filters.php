		<div class="subNav">
			<? if(Uri::segment(1) == 'world'){ ?>
			<? if(Uri::segment(2) == 'recent'){ ?>
			<?= Html::anchor('world/recent', 'Recent', array('class'=>'active')) ?>
			<? }else{ ?>
			<?= Html::anchor('world/recent', 'Recent') ?>
			<? } ?>

			<? if(Uri::segment(2) == 'popular'){ ?>
			<?= Html::anchor('world/popular', 'Popular', array('class'=>'active')) ?>
			<? }else{ ?>
			<?= Html::anchor('world/popular', 'Popular') ?>
			<? } ?>

			<? if(Uri::segment(2) == 'featured'){ ?>
			<?= Html::anchor('world/featured', 'Featured', array('class'=>'active')) ?>
			<? }else{ ?>
			<?= Html::anchor('world/featured', 'Featured') ?>
			<? } ?>

			<? if(Uri::segment(2) == 'search'){ ?>
			<?= Html::anchor('world/search', 'Search', array('class'=>'active')) ?>
			<? }else{ ?>
			<?= Html::anchor('world/search', 'Search') ?>
			<? }} ?>

			<? if(Uri::segment(1) == 'friends'){ ?>
			<? if(Uri::segment(2) == 'recent'){ ?>
			<?= Html::anchor('friends/recent', 'Recent', array('class'=>'active')) ?>
			<? }else{ ?>
			<?= Html::anchor('friends/recent', 'Recent') ?>
			<? } ?>

			<? if(Uri::segment(2) == 'popular'){ ?>
			<?= Html::anchor('friends/popular', 'Popular', array('class'=>'active')) ?>
			<? }else{ ?>
			<?= Html::anchor('friends/popular', 'Popular') ?>
			<? } ?>

			<? if(Uri::segment(2) == 'featured'){ ?>
			<?= Html::anchor('friends/featured', 'Featured', array('class'=>'active')) ?>
			<? }else{ ?>
			<?= Html::anchor('friends/featured', 'Featured') ?>
			<? } ?>

			<? if(Uri::segment(2) == 'search'){ ?>
			<?= Html::anchor('friends/search', 'Search', array('class'=>'active')) ?>
			<? }else{ ?>
			<?= Html::anchor('friends/search', 'Search') ?>
			<? }} ?>
		</div>