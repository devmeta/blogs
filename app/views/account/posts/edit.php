<div class="section section-we-made-3" id="projects">
    <div class="container">
        <div class="row">
            <div class="title add-animation">
                <h2><span class="typcn typcn-edit"></span> <?php echo $entry->{'title_' . LOCALE};?></h2>
                <div class="separator-container">
                    <div class="separator line-separator"><span class="typcn typcn-cloud-storage"></span></div>
                </div>
				<input type="hidden" name="id" value="<?php echo $entry->id;?>">
				<form class="form" method="post" action="/account/posts/update/<?php echo $entry->id;?>">
					<div class="form-group">
					    <div class="input-group">
					      <span class="input-group-btn">
					        <button class="btn btn-sm disabled" type="button"><?php echo site_url('blog');?>/</button>
					      </span>
					      <input type="text" name="slug" class="form-control input-sm" placeholder="slug" value="<?php echo $entry->slug;?>" />
					    </div>
					</div>

				<div class="text-left tags">
					<h4> <span class="typcn typcn-tags"></span> Tags </h4>
				    <div class="input-group">
				      <input type="text" id="tags-add" class="form-control" placeholder="Sports, Health, Latest News, ..." />
				      <span class="input-group-btn">
				        <button type="button" class="btn btn-default btn-primary btn-tags-add"><span class="typcn typcn-tag"></span></button>
				      </span>
				    </div><hr>
					<div class="tags-included"></div>
					<div class="tags-excluded"></div>
				</div><hr>
				
				    <div class="progress summernote-progress hide">
				      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
				        <span class="sr-only"></span>
				      </div>
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
								<input type="text" class="form-control slugify" data-target="slug" name="title_<?php print $lang;?>" placeholder="<?php print locale('title');?>" value="<?php echo $entry->{'title_' . $lang};?>" required>
							</div>

							<div class="form-group">
								<textarea class="form-control" name="caption_<?php print $lang;?>" placeholder="<?php print locale('caption');?>"><?php echo $entry->{'caption_' . $lang};?></textarea>
							</div>

							<div class="form-group">
								<textarea class="form-control summernote" name="content_<?php print $lang;?>" placeholder="<?php print locale('content');?>"><?php echo $entry->{'content_' . $lang};?></textarea>
							</div><div class="clearfix"></div>
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

				<h4> <span class="typcn typcn-image"></span> Gallery </h4>
				<form 
					class="dropzone" 
					data-target="post" 
					data-message="Drop images here" 
					data-domain="posts" 
					data-url="/account/files/resize" 
					data-index="/blog/files/<?php echo $entry->id;?>" 
					data-id="<?php echo $entry->id;?>" data-max="10">
				</form>				
			</div>
		</div>
	</div>
</div>

<script>

	setTimeout(function(){
		tags();	
	},300)
	
</script>