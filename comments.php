<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<section id="coments">
<div class="coment-list">
	<blockquote><p>Our Finazi team is back with some crucial plugins and command line tricks to optimizing.</p></blockquote>
	<p>Our Finazi team is back with some crucial plugins and command line tricks to optimizing your hosting solution.</p>
	<p>1: Culpa delectus dolore nemo provident quaerat quos sed temporibus vitae. Autem ipsum nam tempore? Alias aliquid<br>
assumenda beatae corporis doloremque eveniet exercitationem ipsum repellendus reprehenderit similique soluta tempora,<br>
tenetur vitae!.</p>
	<table>
		<tbody>
			<tr>
			<th>P3 Profil</th>
			<th>Minimize</th>
			<th>APCu</th>
			<th>OpCache</th>
			</tr>
			<tr>
			<td>Enim</td>
			<td>Praesentium</td>
			<td>Aliquid</td>
			<td>Adipisci</td>
			</tr>
			<tr>
			<td>Enim</td>
			<td>Praesentium</td>
			<td>Aliquid</td>
			<td>Adipisci</td>
			</tr>
			<tr>
			<td>Enim</td>
			<td>Praesentium</td>
			<td>Aliquid</td>
			<td>Adipisci</td>
			</tr>
			<tr>
			<td>Enim</td>
			<td>Praesentium</td>
			<td>Aliquid</td>
			<td>Adipisci</td>
			</tr>
			<tr>
			<td>Enim</td>
			<td>Praesentium</td>
			<td>Aliquid</td>
			<td>Adipisci</td>
			</tr>
		</tbody>
	</table>
	<p>2: Cumque doloribus eveniet laborum nulla vel! Aliquid modi provident quaerat tenetur. Aperiam facere modi nihil saepe<br>
similique velit voluptatibus? Alias dignissimos esse eum maxime molestias pariatur quis saepe, ullam vitae?<br>
Adipisci asperiores autem delectus dolore explicabo fugit iure laboriosam ratione suscipit tenetur? Alias assumenda<br>
at culpa cum dolore exercitationem magni minima praesentium sequi vel? Enim inventore laudantium quae recusandae rem..</p>
	<div class="coment-share">
		<ul>
			<li class="fb"> <a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a> </li>
			<li class="tw"> <a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i> 	Twitter</a> </li>
			<li class="gg"> <a href="#"> <i class="fa fa-google-plus" aria-hidden="true"> Google+</i></a> </li>
			<li class="pr"> <a href="#"> <i class="fa fa-pinterest-p" aria-hidden="true"> Pinterset</i></a> </li>
			<li class="lk"> <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a> </li>
		</ul>
	</div>
</div>
<?php post_navigation(); ?>
<div id="comments" class="comments-area">


	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Comments &ldquo;%s&rdquo;', 'comments title', 'twentyseventeen' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'Comments',
						'Comments',
						$comments_number,
						'comments title',
						'twentyseventeen'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  =>  __( 'Reply', 'twentyseventeen' )
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'twentyseventeen' ) . '</span>',
		) );
	endif; // Check for have_comments().
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>
	<?php
	endif;
	comment_form();
	?>

</div><!-- #comments -->
</section>