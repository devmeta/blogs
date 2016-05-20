<div class="content-height">
	<div class="col-md-12 center-block">
		<div class="col-md-2">
			<?php include SP . 'app/views/account/sidebar.php';?>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-9">
					<h3>&nbsp;<span class="typcn typcn-world"></span> <?php echo $entry->{'word_' . LOCALE};?></h3>
					<input type="hidden" name="id" value="<?php echo $entry->id;?>">
					<form class="form" method="post" action="/account/words/update/<?php echo $entry->id;?>">
						<div class="form-group">
							<input type="text" name="word_key" class="form-control input-sm" placeholder="slug" value="<?php echo $entry->word_key;?>" />
						</div>
					    <ul class="nav nav-tabs">
					<?php foreach(config()->languages as $i => $lang):?>
							 <li class="<?php print (!$i?'active':'');?>"><a data-toggle="tab" href="#<?php print $lang;?>"><?php print locale($lang);?></a></li>
					<?php endforeach;?>
						</ul>
						<div class="tab-content">
					<?php foreach(config()->languages as $i => $lang):?>
	 						<div id="<?php print $lang;?>" class="tab-pane fade <?php print (!$i?'in active':'');?>">
								<div class="form-group">
									<textarea class="form-control" data-target="slug" name="word_<?php print $lang;?>" placeholder="<?php print locale('title');?>" required><?php echo $entry->{'word_' . $lang};?></textarea>
								</div>
							</div>
					<?php endforeach;?>
						</div>
						<div class="form-actions form-group text-center">
							<button type="submit" class="btn btn-lg btn-success"> <span class="typcn typcn-tick-outline"></span> &nbsp;<?php print locale('save');?> </button>
						</div><div class="clearfix"></div>
					</form>
				</div>
				<div class="col-md-3">
					<div class="group-control">&nbsp;</div>

				</div>
			</div>
		</div>
	</div>
</div>