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
class TP_Casestudytwo extends Widget_Base
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
        return 'tp-casestdytwo';
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
        return __('Case Study Two', 'tpcore');
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


    public function get_post_list_by_post_type($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => -1,
            'post_status'      => 'publish',
        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[get_the_ID()] = get_the_title();
        }
        wp_reset_query();
        return $return_val;
    }

    public function get_all_post_key($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => -1,
            'post_status'      => 'publish',

        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[] = get_the_ID();
        }
        wp_reset_query();
        return $return_val;
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
            'casestudy_one_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Case Studies', 'plugin-name'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'casestudy_category',
            [
                'label' => __('Select Casestudy', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('casestudy'),
                'default'     => $this->get_all_post_key('casestudy'),
            ]
        );


        $this->add_control(
            'casestudy_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'casestudy_template_order_by',
            [
                'label'   => esc_html__('Order By', 'corelaw-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'corelaw-core'),
                    'author'     => esc_html__('Post Author', 'corelaw-core'),
                    'title'      => esc_html__('Title', 'corelaw-core'),
                    'post_date'  => esc_html__('Date', 'corelaw-core'),
                    'rand'       => esc_html__('Random', 'corelaw-core'),
                    'menu_order' => esc_html__('Menu Order', 'corelaw-core'),
                ],
            ]
        );
        $this->add_control(
            'casestudy_template_order',
            [
                'label'   => esc_html__('Order', 'corelaw-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'corelaw-core'),
                    'desc' => esc_html__('Descending', 'corelaw-core')
                ],
                'default' => 'desc',
            ]
        );

        $this->add_control(
            'countershow',
            [
                'label' => esc_html__('Show Counter?', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'plugin-name'),
                'label_off' => esc_html__('Hide', 'plugin-name'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'more_ofptions',
            [
                'label' => esc_html__('Counter One', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'numberone',
            [
                'label' => esc_html__('Number', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('45', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'paraone',
            [
                'label' => esc_html__('Parameter', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('K', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'titleone',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Projects Completed', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'more_ofpftions',
            [
                'label' => esc_html__('Counter Two', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'numbertwo',
            [
                'label' => esc_html__('Number', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('25', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'paratwo',
            [
                'label' => esc_html__('Parameter', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('K', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'titletwo',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Happy Clients', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'more_ofpfftions',
            [
                'label' => esc_html__('Counter Three', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'numberthree',
            [
                'label' => esc_html__('Number', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('12', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'parathree',
            [
                'label' => esc_html__('Parameter', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'titlethree',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Years Of Exprience', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'more_ofgptions',
            [
                'label' => esc_html__('Counter Four', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'numberfour',
            [
                'label' => esc_html__('Number', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('70', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'parafour',
            [
                'label' => esc_html__('Parameter', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'titlefour',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Awards Achievement', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();





        // =======================Style=================================//


        $this->start_controls_section(
            'style_heading',
            [
                'label' => esc_html__('Heading', 'plugin-name'),
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
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
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
            'style_navigation',
            [
                'label' => esc_html__('Navigation', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'nav_colori',
            [
                'label'     => esc_html__('Icon Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-study-arrows button span' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label' => esc_html__('Background Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-study .tp-study-arrows button::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'nav_colorh',
            [
                'label' => esc_html__('Background Color Hover', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-study .tp-study-arrows button:hover::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'style_title',
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
                'selector' => '{{WRAPPER}} .title a',

            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title a' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_more',
            [
                'label' => esc_html__('View', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'style_more_typ',
                'selector' => '{{WRAPPER}} .view-more',

            ]
        );

        $this->add_control(
            'style_more_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-more' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .view-more::before,.view-more::after,.view-more span::before,.view-more span:after' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'style_more_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .view-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'style_more_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .view-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'style_counter',
            [
                'label' => esc_html__('Counter', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'more_sfofptions',
            [
                'label' => esc_html__('Number', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spinner_typ',
                'selector' => '{{WRAPPER}} .tp-study .counter__single h2 span',

            ]
        );

        $this->add_control(
            'spifnner_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-study .counter__single h2' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'more_optffdfions',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spinnfer_typ',
                'selector' => '{{WRAPPER}} p.text-tertiary',

            ]
        );

        $this->add_control(
            'spifnnfer_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p.text-tertiary' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'spindsner_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} p.text-tertiary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'spinnaaaer_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} p.text-tertiary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                'post_type'      => 'casestudy',
                'posts_per_page' => $settings['casestudy_posts_per_page'],
                'orderby'        => $settings['casestudy_template_order_by'],
                'order'          => $settings['casestudy_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',
                'post__in'          => $settings['casestudy_category'],
            )
        );

?>

        <script>
            jQuery(document).ready(function($) {
                $(".tp-study-slider")
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
                        prevArrow: $(".prev-study"),
                        nextArrow: $(".next-study"),
                        dots: false,
                        variableWidth: true,
                        centerMode: false,
                    });
                $(".odometer").appear(function(e) {
                    var odo = $(".odometer");
                    odo.each(function() {
                        var countNumber = $(this).attr("data-odometer-final");
                        $(this).html(countNumber);
                    });
                });
            })
        </script>






        <section class="tp-study pt-120 pb-120">
            <div class="container">
                <div class="row vertical-column-gap align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="tp-lp-title text-center text-lg-start">
                            <?php if (!empty($settings['title'])) :   ?>
                                <h2 class="heading mt-8 fw-7 text-secondary title-anim"><?php echo esc_html($settings['title']) ?></h2>

                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="tp-study-arrows d-flex justify-content-center justify-content-lg-end">
                            <button class="prev-study" aria-label="previous study">
                                <span class="material-symbols-outlined">
                                    <?php echo esc_html('west') ?>
                                </span>
                            </button>
                            <button class="next-study" aria-label="next study">
                                <span class="material-symbols-outlined">
                                    <?php echo esc_html('east') ?>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tp-study-slider-wrapper">
                            <div class="tp-study-slider">

                                <?php
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();

                                ?>



                                        <div class="tp-study-slider__single">
                                            <div class="thumb">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <img src="<?php the_post_thumbnail_url() ?>" class="w-100 mh-400" alt="<?php echo esc_attr('image') ?>">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="content text-center">
                                                <h5 class="title mt-8 mb-12 text-white fw-5 text-uppercase">
                                                    <a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), 1); ?></a>
                                                </h5>
                                                <a href="<?php the_permalink() ?>" class="btn-angle view-more">
                                                    <?php echo esc_html('View') ?>
                                                    <span></span>
                                                </a>
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

                <?php if (!empty($settings['countershow'] == 'yes')) : ?>

                    <div class="row pt-120 vertical-column-gap-lg">
                        <?php if (!empty($settings['numberone'])) : ?>
                            <div class="col-12 col-sm-6 col-xl-3">
                                <div class="counter__single text-center">
                                    <h2 class="fw-5 text-secondary mt-8 mb-16">
                                        <span class="odometer" data-odometer-final="<?php echo esc_attr($settings['numberone']) ?>"></span>
                                        <span><?php echo esc_html($settings['paraone']) ?></span>
                                    </h2>
                                    <?php if (!empty($settings['titleone'])) : ?>
                                        <p class="text-tertiary">
                                            <?php echo esc_html($settings['titleone']) ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['numbertwo'])) : ?>
                            <div class="col-12 col-sm-6 col-xl-3">
                                <div class="counter__single text-center">
                                    <h2 class="fw-5 text-secondary mt-8 mb-16">
                                        <span class="odometer" data-odometer-final="<?php echo esc_attr($settings['numbertwo']) ?>"></span>
                                        <span><?php echo esc_html($settings['paratwo']) ?></span>
                                    </h2>
                                    <?php if (!empty($settings['titletwo'])) : ?>
                                        <p class="text-tertiary">
                                            <?php echo esc_html($settings['titletwo']) ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['numberthree'])) : ?>
                            <div class="col-12 col-sm-6 col-xl-3">
                                <div class="counter__single text-center">
                                    <h2 class="fw-5 text-secondary mt-8 mb-16">
                                        <span class="odometer" data-odometer-final="<?php echo esc_attr($settings['numberthree']) ?>"></span>
                                        <span><?php echo esc_html($settings['parathree']) ?></span>
                                    </h2>
                                    <?php if (!empty($settings['titlethree'])) : ?>
                                        <p class="text-tertiary">
                                            <?php echo esc_html($settings['titlethree']) ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['numberfour'])) : ?>
                            <div class="col-12 col-sm-6 col-xl-3">
                                <div class="counter__single text-center border-0">
                                    <h2 class="fw-5 text-secondary mt-8 mb-16">
                                        <span class="odometer" data-odometer-final="<?php echo esc_attr($settings['numberfour']) ?>"></span>
                                        <span><?php echo esc_html($settings['parafour']) ?></span>
                                    </h2>
                                    <?php if (!empty($settings['titlefour'])) : ?>
                                        <p class="text-tertiary">
                                            <?php echo esc_html($settings['titlefour']) ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>



            </div>
        </section>






<?php
    }
}

$widgets_manager->register(new TP_Casestudytwo());
