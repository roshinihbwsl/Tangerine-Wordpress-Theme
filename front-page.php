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
        <img src="<?php bloginfo( 'template_url' ); ?>/assets/home/image-1.png" alt="">
        <img src="<?php bloginfo( 'template_url' ); ?>/assets/home/image-2.png" alt="">
        <img src="<?php bloginfo( 'template_url' ); ?>/assets/home/image-3.png" alt="">
        <img src="<?php bloginfo( 'template_url' ); ?>/assets/home/image-4.png" alt="">
        <img src="<?php bloginfo( 'template_url' ); ?>/assets/home/image-5.png" alt="">
        <img src="<?php bloginfo( 'template_url' ); ?>/assets/home/image-6.png" alt="">

    </div>
</div>

<?php
get_footer();