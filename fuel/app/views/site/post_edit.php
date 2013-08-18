		<div class="postDetail">
			<div class="postDImgMask">
				<?= Asset::img('poster.jpg', array('class' => 'postDImg')) ?>
			</div>
			<div class="contentDetail postEdit">
				<span class="dLikeNum"><p>20</p><?= Asset::img('icons/tick.png') ?></span>
				<input type="text" class="title" name="title" value="Title" /></br>
				<textarea cols="70" rows="20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</textarea></br>
				<div class="postDUserInfo">
					<div class="postAvatarMask">
						<a href="profile.html"><?= Asset::img('avatar.jpg', array('class' => 'postAvatar')) ?></a>
					</div>
					<a href="carDetail.html"><h3 class="postCar">Honda Accord, 2008</h3></a>
				</div>
			</div>
			<div class="postButtons postEditButtons">
				<input type="submit" class="submit" value="Save" />
				<?= Html::anchor('site/post_detail.php', 'Cancel', array('class'=>'cancelBtn button')) ?>
			</div>
		</div>