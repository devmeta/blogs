<div class="content-height">
	<div class="col-md-12 center-block">

		<div class="row">
			<div class="col-md-12">
				<h3>&nbsp;<span class="typcn typcn-pen"></span> Posts <a href="/account/posts/create" role="button" class="text-success" title="Create a new post" data-placement="right"><span class="typcn typcn-document-add"></span></a></h3>
				<?php echo messages();?>
			<?php if(count($entries)):?>
				<table class="table">
					<tr>
						<th width="80"><span class="typcn typcn-image"></span></th>
						<th>Title</th>
						<th>Files</th>
						<th>Updated</th>
						<th width="150"><span class="typcn typcn-cog"></span></th>
					</tr>
				<?php foreach($entries as $post):?>
					<tr>
						<td>
							<a href="<?php print site_url('/account/posts/' . $post->id);?>">
							<?php if(count($post->files())):?>
								<img src="<?php print site_url('/upload/posts/th-' . $post->files()[0]->name);?>" class="img-rounded" width="150">
							<?php else:?>
								<img src="<?php print site_asset('img/img2icns_icon.png');?>" class="img-rounded" width="60">
							<?php endif;?>
							</a>
						</td>
						<td><small><small class="text-success">/<?php print $post->slug;?></small></small><br><?php echo $post->{'title_' . LOCALE};?></td>
						<td><?php echo count($post->files());?></td>
						<td><?php echo timespan($post->updated);?></td>
						<td>
							<form action="/account/posts/delete/<?php echo $post->id;?>" method="post">
							<button type="submit" class="btn btn-danger" onclick="if(!confirm('Your are about to delete this post, are you sure?')) return false;" title="Delete"><span class="typcn typcn-times-outline"></span></button>
							<a href="/blog/<?php echo $post->slug;?>" class="btn btn-warning" target="_blank" title="See"><span class="typcn typcn-eye-outline"></span></a>
							<a href="/account/posts/<?php echo $post->id;?>" class="btn btn-success" title="Edit"><span class="typcn typcn-edit"></span></a>
							</form>
						</td>
					</tr>
				<?php endforeach;?>
				</table>
				<?php $entries[0]->paginator();?>
			<?php else:?>
					<a href="/account/posts/create" class="btn btn-lg btn-success"><i class="ion-battery-empty"></i> &nbsp; Posts badge is empty! You may create one.</a>
			<?php endif;?>
				<p> <a href="/" target="_blank">Go to Frontpage</a></p>
			</div>
		</div>
	</div>
</div>