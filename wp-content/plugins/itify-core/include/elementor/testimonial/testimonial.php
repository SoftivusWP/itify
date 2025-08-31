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
class TP_Testimonial extends Widget_Base
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
        return 'tp-testimonial';
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
        return __('Testimonial', 'tpcore');
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
            'testimonial_general_content',
            [
                'label' => esc_html__('Testimonial', 'plugin-name')
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What Our Clients Say About Us', 'plugin-name'),
                'label_block' => true,
            ]
        );




        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_general_content_image',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'testimonial_general_title',
            [
                'label' => esc_html__('Name', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Amilino', 'plugin-name'),
                'placeholder' => esc_html__('Type your name here', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'testimonial_general_designation',
            [
                'label' => esc_html__('Designation', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('CTO & Co-Founder, Granular AI', 'plugin-name'),
                'placeholder' => esc_html__('Type your designation here', 'plugin-name'),
                'label_block' => true,
            ]
        );

        // Number Control
        $repeater->add_control(
            'rating',
            [
                'label' => esc_html__('Price', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $repeater->add_control(
            'testimonial_general_description',
            [
                'label' => esc_html__('Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur. Elementum nec auctor diam tincidunt nisl malesuada pharetra pulvinar ac. Tellus gravida vestibulum nullam rutrum arcu risus. Tellus nulla volutpat mollis at egestas at to milo congue condimentum, mollis at egestas at to milo congue condimentum.', 'plugin-name'),
                'placeholder' => esc_html__('Type your description here', 'plugin-name'),
            ]
        );


        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Testimonial List', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testimonial_general_title' => esc_html__('Expert Team', 'plugin-name'),
                    ],
                ],
                'title_field' => '{{{ testimonial_general_title }}}',
            ]
        );



        $this->end_controls_section();




        // =======================Style=================================//

        $this->start_controls_section(
             'style_heading',
             [
                'label' => esc_html__('Heding', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'heading_typ',
                'selector' => '{{WRAPPER}} .heading',
        
            ]
        );
        
        $this->add_control(
            'heading_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'heading_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'heading_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'style_name',
             [
                'label' => esc_html__('Name', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'name_typ',
                'selector' => '{{WRAPPER}} .name',
        
            ]
        );
        
        $this->add_control(
            'name_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .name' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'name_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'name_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'style_des',
             [
                'label' => esc_html__('Designation', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'designation_typ',
                'selector' => '{{WRAPPER}} .designation',
        
            ]
        );
        
        $this->add_control(
            'designation_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .designation' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'designation_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'style_rating',
             [
                'label' => esc_html__('Rating', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'rating_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button.review i' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'style_description',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'description_typ',
                'selector' => '{{WRAPPER}} .description',
        
            ]
        );
        
        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'description_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        $this->end_controls_section();





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
                // Array to store image URLs
                var imageUrls = [];

                // Fetch the image URLs dynamically using PHP (assuming $settings['list_repeater'] contains image data)
                <?php foreach ($settings['list_repeater'] as $item) : ?>
                    <?php if (!empty($item['testimonial_general_content_image']['url'])) : // Replace 'image_field' with the actual field name containing the image URL 
                                    ?>
                        imageUrls.push("<?php echo esc_url($item['testimonial_general_content_image']['url']); ?>");
                    <?php endif; ?>
                <?php endforeach; ?>

                // Initialize the Slick slider with dynamic image URLs
                $(".tp-testimonial-slider")
                    .not(".slick-initialized")
                    .slick({
                        infinite: true,
                        autoplay: true,
                        focusOnSelect: false,
                        slidesToShow: 1,
                        speed: 1000,
                        autoplaySpeed: 4000,
                        slidesToScroll: 1,
                        arrows: true,
                        prevArrow: $(".prev-testimonial"),
                        nextArrow: $(".next-testimonial"),
                        dots: true,
                        appendDots: $(".tp-testimonial-pagination"),
                        centerMode: false,
                        customPaging: function(slider, i) {
                            // Return the dynamically generated image URLs for dots
                            return '<img src="' + imageUrls[i] + '" alt="Dot ' + i + '">';
                        },
                    });
            });
        </script>




        <section class="pt-120 tp-testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-testimonial-inner pb-120">
                            <?php if (!empty($settings['heading'])) :   ?>
                                <h2 class="heading fw-7 text-secondary mt-8 title-anim"><?php echo esc_html($settings['heading']) ?></h2>
                            <?php endif ?>

                            <div class="tp-testimonial-slider mt-60">

                                <?php foreach ($settings['list_repeater'] as $item) : ?>
                                    <div class="tp-testimonial-single">
                                        <div class="tp-testimonial__meta">
                                            <div class="thumb">
                                                <?php if (!empty($item['testimonial_general_content_image']['url'])) : ?>
                                                    <img src="<?php echo esc_url($item['testimonial_general_content_image']['url']) ?>"alt="<?php echo esc_attr('image')?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="content">
                                                <?php if (!empty($item['testimonial_general_title'])) : ?>
                                                    <h5 class="name fw-5 text-secondary mt-8"><?php echo esc_html($item['testimonial_general_title']) ?></h5>
                                                <?php endif; ?>
                                                <?php if (!empty($item['testimonial_general_designation'])) : ?>
                                                    <p class="designation text-xs text-tertiary mb-12"><?php echo esc_html($item['testimonial_general_designation']) ?></p>
                                                <?php endif; ?>
                                                <button class="review">
                                                    <?php
                                                                if (!empty($item['rating'])) {
                                                                    for ($x = 1; $x <= $item['rating']; $x++) {
                                                                        echo '<i class="fa-solid fa-star"></i>';
                                                                    }
                                                                }
                                                                ?>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="description text-xl cur-lg mt-40">
                                            <?php if (!empty($item['testimonial_general_description'])) : ?>
                                                <q><?php echo esc_html($item['testimonial_general_description']) ?></q>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>





                            </div>


                            <div class="tp-testimonial-arrow">
                                <button class="prev-testimonial" aria-label="previous testimonial">
                                    <span class="material-symbols-outlined">
                                        <?php echo esc_html('west') ?>
                                    </span>
                                </button>
                                <span class="current-slide">1</span>
                                <span class="divider"></span>
                                <span class="total-slide"></span>
                                <button class="next-testimonial" aria-label="next testimonial">
                                    <span class="material-symbols-outlined">
                                        <?php echo esc_html('east') ?>
                                    </span>
                                </button>
                            </div>
                            <div class="tp-testimonial-pagination mt-60"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>









<?php
    }
}

$widgets_manager->register(new TP_Testimonial());
