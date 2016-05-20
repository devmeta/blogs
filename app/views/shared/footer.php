
            <footer class="footer footer-color-black">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="/contact">
                                <?php print locale('contact');?>
                                </a>
                            </li>
                            <li>
                                <a href="/blog/tag/portfolio">
                                <?php print locale('portfolio');?>
                                </a>
                            </li>                            
                            <li>
                                <a target="_blank" href="http://blogs.devmeta.net">
                                <?php print locale('blogs');?>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="social-area pull-right">
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
                    </div>
                    <div class="copyright">
                        &copy; 2016 <a href="/"> Devmeta</a>, <?php print locale('page-made-with');?> <a target="_blank" href="http://bootie.devmeta.net">Bootie</a>
                    </div>
                </div>
            </footer>


