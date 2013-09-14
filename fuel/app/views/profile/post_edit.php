		<div class="postDetail">
			<?= Form::open(array('action' => $article->user->username.'/article/'.$article->id.'/update', 'enctype' => 'multipart/form-data')); ?>
			<div class="postDImgMask">
				<?= Asset::img("post_images/".$article->images, array('class' => 'postDImg')) ?>
			</div>
			<input type="file" class="file" name="poster" accept="image" />
			<div class="contentDetail postEdit">
				<div class="dLikeNum">
					<p class="postCar"><?=$article->car->make->name . " " . $article->car->model->name ?></p>
					<?= Asset::img('icons/tick.png') ?><p><?= $article->likes ?></p>
				</div>
				<input type="text" class="title" name="title" value="<?= $article->title ?>" /></br>
				<p class="timestamp"><?= date("F j, g:i a", $article->created_at) ?></p>
				<textarea cols="70" rows="20" name="content"><?= $article->content ?></textarea></br>
				<div class="postDUserInfo">
					<div class="postAvatarMask">
						<?= Asset::img($article->user->avatar_url(), array('class' => 'postAvatar')) ?>
					</div>
					<p class="postUser"><?= $article->user->username ?></p>
				</div>
			</div>
			<div class="postButtons postEditButtons">
				<input type="submit" class="submit" value="Save" />
				<?= Html::anchor($article->user->username.'/article/'.$article->id, 'Cancel', array('class'=>'cancelBtn button')) ?>
				<?= Html::anchor($article->user->username.'/article/'.$article->id.'/delete', 'Delete', array('class'=>'deleteBtn button')) ?>
			</div>
			<?= Form::close(); ?>
		</div>