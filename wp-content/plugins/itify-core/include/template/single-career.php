<?php

/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tpcore
 */
get_header();

?>

<section class="services__details sec-mar fix-top">
    <div class="container-fluid px-3 px-lg-0">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>


                <?php the_content() ?>



        <?php
            endwhile;
            wp_reset_query();
        endif;
        ?>
    </div>
</section>


<?php get_footer();  ?>