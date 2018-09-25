<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 	<div class="entry-thumbnail">
        <?php finazi_thumbnail('lage'); ?>
    </div>
    <div class="blog-list-coment">
		<div class="entry-content">

			<div class="date-time">
		    	<span class="days"> <?php echo get_the_time( 'd' ); ?> </span>
		    	<div class="mons"><?php echo get_the_time( 'M, Y' ); ?> </div>
	    	</div>
	    	<div class="blog-coment">
		    	<div class="comment"><i class="fa fa-comments-o" aria-hidden="true"></i><a href="<?php get_comments_number($post->ID);?>"><?php echo get_comments_number(); ?></a></div>
		    	<div class="ourth"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'display_name' ) ); ?>"><?php echo get_the_author_meta('nickname'); ?></a></div>
	    	</div>
	            
	    </div>
	    <div class="entry-header">
	    	<div class="list-category">
    			<?php echo get_the_category_list( ', ', '', '' ); ?>
    		</div>
	        <?php finazi_entry_header(); ?>
	        <?php finazi_entry_content(); ?>
	        <?php ( is_single() ? finazi_entry_tag() : '' ); ?>
	    </div>
	</div>
                
</article>