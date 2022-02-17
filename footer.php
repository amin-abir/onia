<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onia
 */

?>

<div class="scroll-up">
        <a href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Scroll to top -->

	<footer id="colophon" class="site-footer pt-3 pb-3">
		<div class="container">
			<div class="site-info text-center">

			<?php
                    /* translator: Theme name */
                    printf(esc_html__('%1$s', 'onia'), 'Onia');
                ?>
				<span class="sep"> | </span>
				
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Powered by %s', 'onia' ), 'WordPress' );
					?>
				
				
			
					
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
