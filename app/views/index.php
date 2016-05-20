            <div class="section section-header">
                <div class="parallax pattern-image">
                <?php for($i=0; $i< 4; $i++):?>
                    <div class="page-bg" style="background-image:url(/assets/img/page-bg-<?php print $i;?>.jpg)">                    </div>
                <?php endfor;?>
                    <div class="container">
                        <div class="content">
                        <?php $icons=['thumbs-up','coffee','watch','heart'];for($i=0; $i< 4; $i++):?>
                            <h2 class="index-caption hide"><?php print locale('index_' . $i . '_caption');?></h2>
                            <h3 class="text-left"><span class="page-title"><span class="typcn typcn-<?php print $icons[$i];?>"></span> <?php print locale('index_' . $i . '_title');?></span></h3>
                        <?php endfor;?>
                            <h2 class="text-left"><span class="page-caption"></span></h2>
                        </div>
                    </div>
                </div>
                <a href="" data-scroll="true" data-id="#whatWeDo" class="scroll-arrow hidden-xs hidden-sm" data-external="true">
                <span class="typcn typcn-chevron-right"></span>
                </a>
            </div>

            <div class="section section-we-do-2" id="whatWeDo">
                <div class="container">
                    <div class="row">
                        <div class="title add-animation">
                            <h2><?php print locale('what-we-do');?></h2>
                            <div class="separator-container">
                                <div class="separator line-separator"><span class="typcn typcn-star-full-outline"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php $icons=['edit','gift','mortar-board'];for($i=1; $i< 4; $i++):?>
                        <div class="col-md-4">
                            <div class="card add-animation animation-<?php print $i;?>">
                                <div class="icon">
                                    <span class="typcn typcn-<?php print $icons[$i-1];?>"></span>
                                </div>
                                <h3><?php print locale('what-we-do-title-' . $i);?></h3>
                                <p><?php print locale('what-we-do-caption-' . $i);?></p>
                            </div>
                        </div>
                    <?php endfor;?>
 
                    </div>
                </div>
            </div>

            <div class="section section-header">
                <div class="parallax pattern-image">
                <div class="page-bg show" style="background-image:url(/assets/img/page-bg-31.jpg)">                    </div>
                    <div class="container">
                        <div class="content text-center">
                            <h2><?php print locale('index-grid-title');?></h2>
                            <h3><span><?php print locale('index-grid-caption');?></span></h3>
                        </div>
                    </div>
                </div>
                <a href="" data-scroll="true" data-id="#section2" class="scroll-arrow hidden-xs hidden-sm" data-external="true">
                <span class="typcn typcn-chevron-right"></span>
                </a>
            </div>
    
            <div class="section section-we-made-3 section-with-hover section-examples" id="section2">
                <div class="container">
                    <div class="text-area">   
                       <div class="title">  
                           <h5 class="text-muted"><?php print locale('index-news-title');?></h5>
                           <h2><?php print locale('index-news');?></h2>
                           <div class="separator-container">
                              <div class="separator line-separator"><span class="typcn typcn-star-full-outline"></span></div>
                           </div>
                           <p><?php print locale('index-news-caption');?></p>
                       </div>
                    </div>

                    <div class="row" id="projectsLine1">

                    <?php if(count($posts)):?>

                    <?php foreach($posts as $i => $post):?>
                        <div class="col-md-6">
                            <div class="project">
                                <img alt="..." src="/upload/posts/sd/<?php echo count($post->files()) ? $post->files()[0]->name : 'default.png';?>"/>
                                <a class="over-area color-presentation" href="/blog/<?php echo $post->slug;?>">
                                    <div class="content">
                                        <h5><?php echo $post->{'title_' . LOCALE};?></h5>
                                        <p><?php echo words($post->{'caption_' . LOCALE},15);?></p>
                                        <br>
                                        <p class="action">       
                                            <?php print locale('continue-reading');?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <?php endforeach;?>
                        <div class="clearfix"></div>
                    <?php endif;?>
                    </div>
                </div>
            </div>