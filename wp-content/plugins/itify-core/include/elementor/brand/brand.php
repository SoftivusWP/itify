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
class TP_Brand extends Widget_Base
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
        return 'tp-brand';
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
        return __('Brand', 'tpcore');
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
            'itify_gallery_slide_content',
            [
                'label' => esc_html__('Gallery', 'itify-core')
            ]
        );



        $this->add_control(
            'itify_gallery_slide_image',
            [
                'label' => esc_html__('Choose Image', 'itify-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
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
                $(".sponsor__slider")
                    .not(".slick-initialized")
                    .slick({
                        infinite: true,
                        autoplay: true,
                        focusOnSelect: true,
                        slidesToShow: 6,
                        speed: 1000,
                        autoplaySpeed: 3000,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false,
                        centerMode: true,
                        centerPadding: "0px",
                        responsive: [{
                                breakpoint: 1700,
                                settings: {
                                    slidesToShow: 4,
                                },
                            },
                            {
                                breakpoint: 1400,
                                settings: {
                                    slidesToShow: 3,
                                },
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 2,
                                },
                            },
                            {
                                breakpoint: 576,
                                settings: {
                                    slidesToShow: 1,
                                },
                            },
                        ],
                    });
            })
        </script>



        <div class="sponsor overflow-x-clip">
            <div class="sponsor__slider">

                <?php foreach ($settings['itify_gallery_slide_image'] as $item) : ?>
                    <?php if (!empty($item['url'])) :   ?>



                        <div class="sponsor__single text-center">
                            <?php if (!empty($item['url'])) : ?>
                                <img src="<?php echo esc_url($item['url']) ?>"alt="<?php echo esc_attr('image')?>">
                            <?php endif; ?>
                        </div>


                    <?php endif ?>
                <?php endforeach; ?>




            </div>
        </div>









<?php
    }
}

$widgets_manager->register(new TP_Brand());
