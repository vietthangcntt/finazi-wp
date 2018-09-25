<?php get_header(); ?>
<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php if (have_posts()) : while (have_posts()) : the_post() ; ?>
                    <?php get_template_part('content',get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php comments_template(); ?>
                    <?php else : ?>
                        <?php get_template_part('content','none'); ?>
                <?php endif ?>
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>