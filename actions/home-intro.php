<?php
/*
*
* Home intro section for portfolix section
*
*
*/



function onia_intro_section_output()
{
  $onia_dfimgh = get_template_directory_uri() . '/assets/img/hero.png';
  $onia_intro_img = get_theme_mod('onia_intro_img', $onia_dfimgh);
  $onia_intro_subtitle = get_theme_mod('onia_intro_subtitle', __('WELCOME TO MY WORLD', 'onia'));
  $onia_intro_title = get_theme_mod('onia_intro_title', __('Hi, I\'m Jone Doe', 'onia'));
  $onia_intro_designation = get_theme_mod('onia_intro_designation', __('a Designer', 'onia'));
  $onia_intro_desc = get_theme_mod('onia_intro_desc');
  $onia_btn_text_one = get_theme_mod('onia_btn_text_one', __('Hire me', 'onia'));
  $onia_btn_url_one = get_theme_mod('onia_btn_url_one', '#');
  $onia_btn_text_two = get_theme_mod('onia_btn_text_two', __('github', 'onia'));
  $onia_btn_url_two = get_theme_mod('onia_btn_url_two', '#');
  $onia_btn_text_three = get_theme_mod('onia_btn_text_three', __('WordPress', 'onia'));
  $onia_btn_url_three = get_theme_mod('onia_btn_url_three', '#');
?>
  <!-- home -->
  <section class="home" id="home">
    <div class="container">
      <div class="home-all-content">
        <div class="row">
          <div class="col-lg-6">

            <div class="content">
              <?php if ($onia_intro_subtitle) : ?>
                <h5><?php echo esc_html($onia_intro_subtitle); ?></h5>
              <?php endif; ?>
              <?php if ($onia_intro_title) : ?>
                <h1><?php echo esc_html($onia_intro_title); ?> <br><span id="type1"><?php echo esc_html($onia_intro_designation); ?></span></h1>
              <?php endif; ?>
              <?php if ($onia_intro_desc) : ?>
                <p><?php echo esc_html($onia_intro_desc); ?></p>
              <?php endif; ?>
              <?php if ($onia_btn_url_one) : ?>
                <a href="<?php echo esc_url($onia_btn_url_one); ?>" class="btn btn-hero"><?php echo esc_html($onia_btn_text_one); ?></a>
              <?php endif; ?>
              <?php if ($onia_btn_url_two) : ?>
                <a href="<?php echo esc_url($onia_btn_url_two); ?>" class="btn btn-hero"><?php echo esc_html($onia_btn_text_two); ?></a>
              <?php endif; ?>
              <?php if ($onia_btn_url_three) : ?>
                <a href="<?php echo esc_url($onia_btn_url_three); ?>" class="btn btn-hero"><?php echo esc_html($onia_btn_text_three); ?></a>
              <?php endif; ?>
            </div>

          </div>

          <div class="col-lg-6">
            <?php if ($onia_intro_img) : ?>
              <div class="hero-img">
                <img src="<?php echo esc_url($onia_intro_img); ?>" alt="<?php esc_attr($onia_intro_title); ?>">
              <?php else : ?>
                <div class="hero-img px-noimg">
                <?php endif; ?>
                </div>

              </div>

          </div>
        </div>
      </div>
  </section>

<?php
}
add_action('onia_profile_intro', 'onia_intro_section_output');
