<?php
/**
 * The file for header all actions
 *
 *
 * @package Onia
 */

function onia_header_menu_output(){
?>
		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'onia-menu',
					'menu_class'        => 'onia-menu',
				) );
			?>
		</nav><!-- #site-navigation -->	
<?php
}
add_action('onia_main_menu','onia_header_menu_output');


function onia_header_logo_output(){
	$onia_site_tagline_show = get_theme_mod('onia_site_tagline_show');

?>

					<?php if(has_custom_logo()): ?>
						<div class="site-branding brand-logo">
							<?php
								the_custom_logo();
							?>
						</div>
					<?php endif; ?>
					<?php
				if(display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
					<div class="site-branding brand-text">
							<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
								$onia_description = get_bloginfo( 'description', 'display' );
								if( ($onia_description || is_customize_preview()) && empty($onia_site_tagline_show) ) :
									?>
									<p class="site-description"><?php echo $onia_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; ?>	
							<?php endif; ?>	

					</div><!-- .site-branding -->
					<?php endif; ?>

<?php
}
add_action('onia_header_logo','onia_header_logo_output');



// header style 
function onia_header_style_two(){
	
?>
	<div class="onia-logo-section">
		<div class="container">
			<div class="head-logo-sec">
				<?php do_action('onia_header_logo'); ?>
			</div>
		</div>
	</div>

	<div class="menu-bar text-center">
		<div class="container">
			<div class="onia-container menu-inner">
				<?php do_action( 'onia_main_menu'); ?>
			</div>
		</div>
	</div>
<?php
}
add_action('onia_header_style_two','onia_header_style_two');


