<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Onia
 */

$onia_blog_container = get_theme_mod( 'onia_blog_container', 'container' );
$onia_blog_layout = get_theme_mod( 'onia_blog_layout', 'fullwidth' );

if ( is_active_sidebar( 'sidebar-1' ) && $onia_blog_layout != 'fullwidth' ) {
	$onia_blog_column = 'col-lg-9';
}else{
	$onia_blog_column = 'col-lg-12';
}
get_header();
?>

		<div class="<?php echo esc_attr($onia_blog_container); ?> mt-5 mb-5 pt-5 pb-5">
			<div class="row">
			<?php if ( is_active_sidebar( 'sidebar-1' ) && $onia_blog_layout == 'leftside' ): ?>
				<div class="col-lg-3">
					<?php get_sidebar(); ?>
				</div>
				<?php endif; ?>
				<div class="<?php echo esc_attr($onia_blog_column); ?>">
					<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'onia' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'onia' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

				</main><!-- #main -->
		</div>
		<?php if ( is_active_sidebar( 'sidebar-1' ) && $onia_blog_layout == 'rightside' ): ?>
		<div class="col-lg-3">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
