<div class="section section-we-made-3" id="projects">
    <div class="container">
        <div class="row">
            <div class="title add-animation">
                <h2><?php print locale('blog');?></h2>
                <div class="separator-container">
                    <div class="separator line-separator"><span class="typcn typcn-star-full-outline"></span></div>
                </div>
                <p><?php print locale('blog-caption');?><br><br></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if(count($posts)):?>

                    <?php foreach($posts as $i => $post):?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="project add-animation animation-1 animate">
                            <a class="img-class" href="/blog/<?php echo $post->slug;?>">
                               <img src="/upload/posts/sd/<?php echo count($post->files()) ? $post->files()[0]->name : 'default.png';?>" width="100">
                            </a>
                            <div class="over-area over-area-sm color-1">
                                <div class="content">
                                    <h5 class="text-gray"><span class="typcn typcn-time"></span> <?php echo timespan($post->created);?></h5>
                                    <h3><?php echo $post->{'title_' . LOCALE};?></h3>
                                    <p><?php echo words($post->{'caption_' . LOCALE},15);?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach;?>
                    <div class="clearfix"></div>
                <?php $posts[0]->paginator();?>

            <?php endif;?>
        </div>
    </div>
</div>

