<?php 
get_header();
?>


<div id='designfly-blogpage-container' class="designfly-content-container">
	<div id="designfly-main-post">
        <h1 id='designfly-blog-title'><?php the_archive_title(); ?></h1>
        <hr class='designfly-seperator'>
		<?php
		while ( have_posts() ) :
			the_post(); ?>
			
            <div id="designfly-blog-outter-box">
                <div class="designfly-blog-box designfly-blog-box1">
                    <p class="designfly-blog-innerbox designfly-blog-innerbox1"><?php echo get_the_date('d'); ?></p>
                    <p class="designfly-blog-innerbox designfly-blog-innerbox2"><?php echo strtoupper(get_the_date('M')); ?></p>
                </div
                ><div class="designfly-blog-box designfly-blog-box2">
                    <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                </div>
            </div>
            <div class="designfly-blogpost">
                <?php the_post_thumbnail(); ?>
                <div class="designfly-blogpost-content">
				    <?php
				    tangerine_posted_by();
				    tangerine_posted_on();
				    ?>
				    <a href='#comments' style='float: right;'><?php comments_number(); ?></a>
			        <hr class='designfly-seperator'>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>"><p>READ MORE</p></a>
                </div>
            </div>


		<?php endwhile; ?>
        
        <div id="designfly-pagination">

        <?php
        $big = 999999999; // need an unlikely integer
        
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'next_text' => '<div id="designfly-pagination-arrow-right"></div>',
            'prev_text' => '<div id="designfly-pagination-arrow-left"></div>',
        ) );

        echo '</div>';
		?>
	</div>
	<div id="designfly-sidebar">
		<?php get_sidebar(); ?> 
	</div>
</div>

<?php
get_footer();
?>