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
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'onia' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'onia' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
				<?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf(esc_html__('%1$s by %2$s.', 'onia'), '<a href="https://wpthemespace.com/product/onia/">Onia</a>', 'Wp Theme Space');
                ?>
					
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
