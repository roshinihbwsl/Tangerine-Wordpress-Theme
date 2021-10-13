<?php 
get_header();
?>
    <div class='designfly-content-container'>
    <div id='designfly-portfolio-head'>
        <h1>DESIGN IS THE SOUL</h1>
        <button>Advertising</button>
        <button>Multimedia</button>
        <button>Photography</button>
    </div>
    <hr class='designfly-seperator'>
    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array( 
            'post_type' => 'post',
            'posts_per_page' => 6,
            'paged' => $paged,
        );

        $query = new WP_Query( $args ); ?>
        
        <div id="designfly-portfolio-grid">

        <?php
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
                <a href='#TB_inline?height=410&amp;width=480&amp;inlineId=examplePopup1<?php the_ID(); ?>'  class='thickbox'><div class='designfly-portfolio-div'><?php the_post_thumbnail(); ?></div></a>
                <div id="examplePopup1<?php the_ID(); ?>" style="display: none;">
                    <?php the_post_thumbnail(); ?>
                    <p style='text-align: center;'>Lorem ipsum dolor sit amet</P>
                </div>
            <?php endwhile; ?>

        </div>
            <div id="designfly-pagination">

            <?php
            $big = 999999999; // need an unlikely integer
            
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $query->max_num_pages,
                'next_text' => '<div id="designfly-pagination-arrow-right"></div>',
                'prev_text' => '<div id="designfly-pagination-arrow-left"></div>',
            ) );

            echo '</div>';
            wp_reset_postdata();
        endif; ?>
    
    </div>

<?php
get_footer();
?>