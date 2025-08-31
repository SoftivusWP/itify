<?php

namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_imagesingle extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'tp-imagesingle';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Image', 'tpcore');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'tp-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['tpcore'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['tpcore'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        // ======================Content================================//


        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__('Image', 'plugin-name')
            ]
        );


        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();








        // =======================Style=================================//


    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>


        <script>
            jQuery(document).ready(function($) {
            var imageParallax = document.querySelectorAll(".parallax-image");
            if (imageParallax.length > 0) {
                $(".parallax-image").each(function() {
                    $(this).wrap(
                        '<div class="parallax-image-wrap"><div class="parallax-image-inner"></div></div>'
                    );
                    $(".parallax-image-wrap").css({
                        overflow: "hidden",
                    });

                    var $animImageParallax = $(this);
                    var $aipWrap = $animImageParallax.parents(".parallax-image-wrap");
                    var $aipInner = $aipWrap.find(".parallax-image-inner");

                    let tl_ImageParallax = gsap.timeline({
                        scrollTrigger: {
                            trigger: $aipWrap,
                            start: "top bottom",
                            end: "bottom top",
                            scrub: true,
                            onEnter: () => animImgParallaxRefresh(),
                        },
                    });
                    tl_ImageParallax.to($animImageParallax, {
                        yPercent: 30,
                        ease: "none",
                    });

                    function animImgParallaxRefresh() {
                        tl_ImageParallax.scrollTrigger.refresh();
                    }

                    let tl_aipZoomIn = gsap.timeline({
                        scrollTrigger: {
                            trigger: $aipWrap,
                            start: "top 99%",
                        },
                    });
                    tl_aipZoomIn.from($aipInner, {
                        duration: 1.5,
                        autoAlpha: 0,
                        scale: 1.2,
                        ease: Power2.easeOut,
                        clearProps: "all",
                    });
                });
            }
        })
        </script>


        <?php if (!empty($settings['image']['url'])) :   ?>
            <img src="<?php echo esc_url($settings['image']['url']) ?>" class="w-100 parallax-image mh-300"alt="<?php echo esc_attr('image')?>">
        <?php endif ?>


<?php
    }
}

$widgets_manager->register(new TP_imagesingle());
