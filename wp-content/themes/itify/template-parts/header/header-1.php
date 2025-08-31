<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itify
 */

// info
$itify_btn_switch = get_theme_mod('itify_btn_switch', false);
$itify_social_switch = get_theme_mod('itify_social_switch', false);



// contact button
$itify_button_text = get_theme_mod('itify_btn_text', __('Lets Talk', 'itify'));
$itify_button_link = get_theme_mod('itify_btn_link', __('#', 'itify'));



// header right
$itify_header_right = get_theme_mod('itify_header_right', false);
$itify_menu_col = $itify_header_right ? 'col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xxl-10 col-xl-10 col-lg-9 d-none d-lg-block text-end';

?>

<!-- header area start -->



<!-- Social -->

<?php 

$facebook_link = get_theme_mod('facebook_link', __('#', 'itify'));
$twitter_link = get_theme_mod('twitter_link', __('#', 'itify'));
$linkedin_link = get_theme_mod('linkidin_link', __('#', 'itify'));
$instagram_link = get_theme_mod('instagram_link', __('#', 'itify'));


?>




<header class="tp-header tp-header--light">
   <div class="primary-navbar">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav class="navbar p-0 px-3 px-lg-0">
                  <div class="navbar__logo">
                     <?php itify_header_logo(); ?>
                  </div>
                  <div class="navbar__options">
                     <?php if (!empty($itify_btn_switch)) : ?>
                        <a href="<?php echo esc_url($itify_button_link) ?>" class="d-none d-sm-flex"><?php echo esc_html($itify_button_text) ?></a>
                     <?php endif; ?>
                     <button class="open-offcanvas-nav" aria-label="toggle mobile menu" title="open offcanvas menu">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                     </button>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- ==== / header end ==== -->
<!-- ==== offcanvas nav start ==== -->
<div class="offcanvas-nav">
   <div class="offcanvas-menu">
      <nav class="offcanvas-menu__wrapper" data-lenis-prevent>
         <div class="offcanvas-menu__header nav-fade">
            <div class="logo">
               <?php itify_header_logo(); ?>
            </div>
            <button aria-label="close offcanvas menu" class="close-offcanvas-menu">
               <i class="fa-solid fa-xmark"></i>
            </button>
         </div>
         <div class="offcanvas-menu__list">
            <div class="navbar__menu">
               <?php itify_header_menu(); ?>
            </div>
         </div>
      </nav>
      <?php if (!empty($itify_social_switch)) : ?>
      <ul class=" social nav-fade">
         <li>
            <a href="<?php echo esc_url($facebook_link)?>" target="_blank" aria-label="share us on facebook">
               <i class="fa-brands fa-facebook-f"></i>
            </a>
         </li>
         <li>
            <a href="<?php echo esc_url($twitter_link)?>" target="_blank" aria-label="share us on twitter">
               <i class="fa-brands fa-twitter"></i>
            </a>
         </li>
         <li>
            <a href="<?php echo esc_url($linkedin_link)?>" target="_blank" aria-label="share us on pinterest">
               <i class="fa-brands fa-linkedin-in"></i>
            </a>
         </li>
         <li>
            <a href="<?php echo esc_url($instagram_link)?>" target="_blank" aria-label="share us on instagram">
               <i class="fa-brands fa-instagram"></i>
            </a>
         </li>
      </ul>
      <?php endif;?>
      <div class="anime">
         <span class="nav-fade"></span>
         <span class="nav-fade"></span>
         <span class="nav-fade"></span>
         <span class="nav-fade"></span>
         <span class="nav-fade"></span>
         <span class="nav-fade"></span>
      </div>
   </div>
</div>






<!-- header area end -->