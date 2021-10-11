<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tangerine
 */

?>
	<footer id="colophon" class="site-footer designfly-content-container">
		<hr class='designfly-seperator'>
		<div id='designfly-footer1'>
			<div id="designfly-welcome-footer">
				<h1>
					Welcome to D'SIGN<span style='font-style: italic;'>fly</span>
				</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora voluptatem laborum cupiditate repudiandae illum placeat, natus possimus quaerat pariatur suscipit.</p>
				<p class='designfly-orange-text'>Read more...</p>
			</div>
			<div id="designfly-contact-footer">
				<h1>Contact Us</h1>
				<p>Street 21 planet, A-11, dapibus tritique. 123 551<br>
				Tel: 123 4567890; Fax: 123 456789;<br>
				Email: <span class='designfly-orange-text'>contactus@dsignfly.com</span></p>
				<img src="<?php bloginfo( 'template_url' ); ?>/assets/home/social.png" alt="">
			</div>
		</div>
		<hr class='designfly-seperator'>
		<div id='designfly-footer2'>
			<p>©2012 - D'SIGNfly | Designed by <span class='designfly-orange-text'>rtcamp</span></p>
		</div>
		<br>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
