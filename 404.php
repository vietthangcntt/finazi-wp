<?php get_header(); ?>
 
<section class="erro-content">
        <div class="container">
                        <?php
                                _e('<h2 class="erro-title">404</h2>', 'finazi');
                                _e('<h4>The requested page cannot be found!</h4>', 'finazi');
                                _e('<p>The page you are looking for was moved, removed, renamed or might never existed.</p>');
                                _e('<a href=""> HOME PAGE </a>');
                        ?>
                </div>
        </div>
</section>
<?php get_footer(); ?>