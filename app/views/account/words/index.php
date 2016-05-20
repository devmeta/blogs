<div class="content-height">
	<div class="col-md-12 center-block">
		<div class="col-md-2">
			<?php include SP . 'app/views/account/sidebar.php';?>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12">
					<h3>&nbsp;<span class="typcn typcn-world"></span> <?php print locale('words');?> <a href="/account/words/create" role="button" class="text-success" title="Create a new word" data-placement="right"><span class="typcn typcn-document-add"></span></a></h3>
					<?php echo messages();?>
				<?php if(count($entries)):?>
					<table class="table">
						<tr>
							<th><?php print locale('key');?></th>
							<th width="12%"><span class="typcn typcn-cog"></span></th>
						</tr>
					<?php foreach($entries as $word):?>
						<tr>
							<td><small><small class="text-success"><?php print $word->word_key;?></small></small><br><?php echo $word->{'word_' . LOCALE};?></td>
							<td>
								<form action="/account/words/delete/<?php echo $word->id;?>" method="post">
								<button type="submit" class="btn btn-danger" onclick="if(!confirm('Your are about to delete this word, are you sure?')) return false;" title="Delete"><span class="typcn typcn-times-outline"></span></button>
								<a href="/account/words/<?php echo $word->id;?>" class="btn btn-success" title="Edit"><span class="typcn typcn-edit"></span></a>
								</form>
							</td>
						</tr>
					<?php endforeach;?>
					</table>
					<?php $entries[0]->paginator();?>
				<?php else:?>
						<p> Words is empty! You may create one.</p>
				<?php endif;?>
					<p> <a href="/" target="_blank">Go to Frontpage</a></p>
				</div>
			</div>
		</div>
	</div>
</div>