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
class TP_Blog extends Widget_Base
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
        return 'tp-blog';
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
        return __('Blog', 'tpcore');
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

        //General Section
        $this->start_controls_section(
            'itify_blog_section_genaral',
            [
                'label' => esc_html__('General', 'itify-core')
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Latest Posts', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'buttontext',
            [
                'label' => esc_html__('Button Text', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('SEE ALL POSTS', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'buttonlink',
            [
                'label' => esc_html__('Button Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'trim_words_count',
            [
                'label' => esc_html__('Trim Words Title', 'finview-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('6', 'finview-core'),
                'placeholder' => esc_html__('Type your number here', 'finview-core'),
            ]
        );



        $this->add_control(
            'itify_blog_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'itify-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'itify_blog_template_orderby',
            [
                'label'   => esc_html__('Order By', 'itify-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'itify-core'),
                    'author'     => esc_html__('Post Author', 'itify-core'),
                    'title'      => esc_html__('Title', 'itify-core'),
                    'post_date'  => esc_html__('Date', 'itify-core'),
                    'rand'       => esc_html__('Random', 'itify-core'),
                    'menu_order' => esc_html__('Menu Order', 'itify-core'),
                ],
            ]
        );
        $this->add_control(
            'itify_blog_template_order',
            [
                'label'   => esc_html__('Order', 'itify-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'itify-core'),
                    'desc' => esc_html__('Descending', 'itify-core')
                ],
                'default' => 'desc',
            ]
        );
        $this->end_controls_section();





        // =======================Style=================================//


        $this->start_controls_section(
            'styletitile',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'title_typ',
                'selector' => '{{WRAPPER}} .heading',

            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
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
            'style_button',
            [
                'label' => esc_html__('Button', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-line' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .btn-line::before,.btn-line::after' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'button_hcolor',
            [
                'label' => esc_html__('Hover Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-line:hover' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .btn-line:hover::before,.btn-line:hover::after' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'styledes',
            [
                'label' => esc_html__('Meta', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'description_typ',
                'selector' => '{{WRAPPER}} .tp-latest-post .tp-lp-post__meta p',

            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-latest-post .tp-lp-post__meta p' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .tp-latest-post .tp-lp-post__meta span' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tp-latest-post .tp-lp-post__meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .tp-latest-post .tp-lp-post__meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'style_social',
            [
                'label' => esc_html__('Blog Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'socil_color',
            [
                'label' => esc_html__('Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content .text-secondary a' => 'color: {{VALUE}} !important',
                ],
            ]
        );



        $this->add_control(
            'socil_coflor',
            [
                'label' => esc_html__('Hover Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content .text-secondary a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_margin2',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content .text-secondary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_padding2',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .content .text-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
        $query = new \WP_Query(
            array(
                'post_type'      => 'post',
                'posts_per_page' => $settings['itify_blog_posts_per_page'],
                'orderby'        => $settings['itify_blog_template_orderby'],
                'order'          => $settings['itify_blog_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish'
            )
        );

?>

        <script>
            jQuery(document).ready(function($) {
                $(".tp-lp-slider").not(".slick-initialized").slick({
                    infinite: true,
                    autoplay: true,
                    focusOnSelect: false,
                    slidesToShow: 1,
                    speed: 1000,
                    autoplaySpeed: 4000,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: false,
                    variableWidth: true,
                    centerMode: false,
                });
            })
        </script>




        <section class="tp-latest-post pt-120 pb-120">
            <div class="container">
                <div class="row vertical-column-gap align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="tp-lp-title text-center text-lg-start">
                            <?php if (!empty($settings['heading'])) :   ?>
                                <h2 class="heading mt-8 fw-7 text-secondary title-anim"><?php echo esc_html($settings['heading']) ?></h2>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="tp-lp-cta text-center text-lg-end">
                            <?php if (!empty($settings['buttontext'])) :   ?>
                                <a href="<?php echo esc_url($settings['buttonlink']['url']) ?>" class="btn-line text-uppercase"><?php echo esc_html($settings['buttontext']) ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tp-lp-slider-wrapper mt-60">
                            <div class="tp-lp-slider">


                                <?php
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                ?>



                                        <div class="tp-lp-slider__single topy-tilt">
                                            <div class="thumb mb-24">
                                                <a href="<?php the_permalink() ?>" class="w-100 overflow-hidden">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <img src="<?php the_post_thumbnail_url() ?>" class="w-100 mh-220" alt="<?php echo esc_attr('image') ?>">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div class="tp-lp-post__meta mb-24 mt-8">
                                                    <p class="author text-xs text-tertiary"><?php echo get_the_author() ?></p>
                                                    <span></span>
                                                    <p class="date text-xs text-tertiary"><?php echo get_the_date() ?></p>
                                                </div>
                                                <h5 class="mt-8 fw-5 text-secondary">
                                                    <a href="<?php the_permalink() ?>">
                                                        <?php echo wp_trim_words(get_the_title(), (int)$settings['trim_words_count'], '...'); ?>
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>






                                <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>












<?php
    }
}

$widgets_manager->register(new TP_Blog());
