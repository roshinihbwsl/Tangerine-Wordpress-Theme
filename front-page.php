<?php
get_header();
?>
<div class="designfly-content-container">
    <div style="position: relative;">
        <h1 id="front-portfolio-title">
            D'SIGN IS THE SOUL
        </h1>
        <a href="<?php echo home_url('/portfolio'); ?>"><button id="front-portfolio-button">view all</button></a>
    </div>
    <div id="front-portfolio-grid">
        
    <?php

        $args = array( 
            'post_type' => 'post',
            'posts_per_page' => 6,
            'paged' => $paged,
        );

        $query = new WP_Query( $args ); 

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
                <a href='<?php the_permalink(); ?>'><div class='designfly-portfolio-div'><?php the_post_thumbnail(); ?></div></a>
            <?php endwhile; 
        endif;
    ?>

    </div>
</div>

<?php
get_footer();