    <h3>Devmeta</h3>
    <blockquote><em><?php print locale('institutional_title');?></em></blockquote>
    <p><?php print locale('institutional_text');?></p>
    <a class="" href="/contact">Want to hire us, know more?</a>
    <hr>
    <div class="">
        <h3>Tags</h3>
    <?php foreach($tags as $tag2):?>
        <a href="/blog/tag/<?php echo $tag2->tag;?>" class="label label-<?php echo isset($tag) && $tag == $tag2->tag ? 'info' : 'danger';?> label-badge btn-tag-included"><?php echo $tag2->tag;?></a>
    <?php endforeach;?>
    </div>