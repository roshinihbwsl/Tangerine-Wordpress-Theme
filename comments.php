<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tangerine
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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<hr class='designfly-seperator'>
		<h2 class="comments-title"><?php esc_html_e( 'Comments', 'tangerine' ); ?></h2><!-- .comments-title -->
		<hr class='designfly-seperator'>

		<?php the_comments_navigation(); ?>
		<br>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'avatar_size' => 20,
					'callback' => 'designflyCustomComments',
				)
			);
			?>
		</ol><!-- .comment-list -->
		<hr>
		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tangerine' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
