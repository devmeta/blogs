    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-burger" role="navigation">
            <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
            <div class="container">
                <div class="navbar-header">
                    <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                    </button>
                    <a href="/" class="navbar-brand"><span class="typcn typcn-feather"></span> Devmeta</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-uppercase">
                        <li class="social-links">
                            <a target="_blank" href="https://twitter.com/devmeta_net">
                                <span class="typcn typcn-social-twitter"></span>
                            </a>
                            <a target="_blank" href="https://github.com/devmeta">
                                <span class="typcn typcn-social-github"></span>
                            </a>
                            <a target="_blank" href="skype:devmeta.net?call">
                                <span class="typcn typcn-social-skype"></span>
                            </a>
                            <a target="_blank" href="mailto:info@devmeta.net">
                                <span class="typcn typcn-mail"></span>
                            </a>
                            <?php if(session('user_id')):?>
                                <a href="/logout" title="<?php print locale('logout');?>" data-placement="right"><span class="typcn typcn-key-outline"></span></a>
                            <?php else:?>
                                <a href="/login" title="<?php print locale('login');?>" data-placement="right"><span class="typcn typcn-key"></span></a>
                            <?php endif;?>
                        </li>
                        <li>
                            <a class="<?php echo (segments(1) == 'blog' && segments(3) != 'portfolio' ? ' active' : '');?>" href="/blog"><?php print locale('blog');?></a>
                        </li>
                        <li>
                            <a class="<?php echo (segments(2) == 'tag' && segments(3) == 'portfolio' ? ' active' : '');?>" href="/blog/tag/portfolio"><?php print locale('portfolio');?></a>
                        </li>
                        <li>
                            <a class="<?php echo segments(1) == 'contact' ? ' active' : '';?>" href="/contact"><?php print locale('contact');?></a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <div class="group-control">&nbsp;</div>
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="typcn typcn-world"></span> <?php print locale(LOCALE);?></button>
                                <ul class="dropdown-menu nav-pills" aria-labelledby="dropdownMenu1">
                                <?php foreach(config()->languages as $lang):?>
                                    <li class="group-list-item"><a href="#" class="js-search" data-toggle="link" data-search="lang=<?php print $lang;?>"><?php print $lang == LOCALE ? '<span class="typcn typcn-tick-outline"></span>':'';?> <?php print locale($lang);?></a></li>
                                <?php endforeach;?>
                                </ul>
                            </div>
                        </li>
                    </ul>


                <!-- /.navbar-collapse -->
            </div>
        </nav>
