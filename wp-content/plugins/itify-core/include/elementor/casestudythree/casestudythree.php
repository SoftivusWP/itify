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
class TP_Casestudythree extends Widget_Base
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
        return 'tp-casesudythree';
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
        return __('Services', 'tpcore');
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
            'posts_per_page' => 5,
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
            'service_one_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'services_category',
            [
                'label' => __('Select Services', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('services'),
                'default'     => $this->get_all_post_key('services'),
            ]
        );


        $this->add_control(
            'service_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'service_template_order_by',
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
            'service_template_order',
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


        $this->end_controls_section();





        // =======================Style=================================//


        $this->start_controls_section(
            'stydletitle',
            [
                'label' => esc_html__('Counter', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'titdle_typ',
                'selector' => '{{WRAPPER}} .op-text',

            ]
        );

        $this->add_control(
            'titlef_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .op-text' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_fmargin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .op-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_pfadding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .op-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'styletitle',
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
                'selector' => '{{WRAPPER}} .title-anim',

            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-anim' => 'color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .title-anim' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .title-anim' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'style_title',
            [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'des_typ',
                'selector' => '{{WRAPPER}} .tp-service__content p',

            ]
        );

        $this->add_control(
            'des_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-service__content p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'des_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tp-service__content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'des_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tp-service__content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'stylebutton',
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
                    '{{WRAPPER}} a.btn-anim.btn-anim-light' => 'color: {{VALUE}};border-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'button_hovujer_color',
            [
                'label' => esc_html__('Hover Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  a.btn-anim.btn-anim-light:hover' => 'color: {{VALUE}}!important ; border-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'hoverbutton_color',
            [
                'label' => esc_html__('Hover BG', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-anim-light span' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'button_border_width',
            [
                'label' => esc_html__('Button Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn-anim' => 'width: {{SIZE}}{{UNIT}}!important;min-width: {{SIZE}}{{UNIT}}!important;height: {{SIZE}}{{UNIT}} !important;',
                ],
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
                'post_type'      => 'services',
                'posts_per_page' => $settings['service_posts_per_page'],
                'orderby'        => $settings['service_template_order_by'],
                'order'          => $settings['service_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',
                'post__in'          => $settings['services_category'],
            )
        );

?>




        <section class="tp-service fade-wrapper" id="scroll-to">
            <div class="container">
                <?php
                $counter = 1; // Initialize counter outside the loop
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                ?>

                        <?php if ($counter % 2 === 0) { // If counter is even, display image on the left and content on the right 
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="service-hr pt-120 pb-120">
                                        <div class="row vertical-column-gap-md">

                                            <div class="col-12 col-lg-7">
                                                <div class="tp-service__content">
                                                    <span class="op-text mb-40 mt-8"><?php echo sprintf('%02d', $counter); ?></span>
                                                    <h2 class="mt-8 title-anim text-secondary fw-7 mb-30 text-capitalize"><?php the_title() ?></h2>
                                                    <div class="pl-100">
                                                        <p class="cur-lg"><?php the_excerpt() ?></p>
                                                        <div class="mt-60">
                                                            <a href="<?php the_permalink() ?>" class="btn-anim btn-anim-light">
                                                                <?php echo esc_html__('Read More', 'itify') ?>
                                                                <i class="fa-solid fa-arrow-trend-up"></i>
                                                                <span></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-5 col-xxl-4 offset-xxl-1">
                                                <div class="tp-service__thumb fade-top fade-img">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <a href="<?php the_permalink() ?>" class="w-100">
                                                            <img src="<?php the_post_thumbnail_url() ?>" class="w-100 mh-400 parallax-image" alt="<?php echo esc_attr('image') ?>">
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { // If counter is odd, display content on the left and image on the right 
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="service-hr pt-120 pb-120">
                                        <div class="row vertical-column-gap-md">
                                            <div class="col-12 col-lg-5 col-xxl-4">
                                                <div class="tp-service__thumb fade-top fade-img">
                                                    <a href="<?php the_permalink() ?>" class="w-100">
                                                        <img src="<?php the_post_thumbnail_url() ?>" class="w-100 mh-400 parallax-image" alt="<?php echo esc_attr('image') ?>">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-7 offset-xxl-1">
                                                <div class="tp-service__content">
                                                    <span class="op-text mb-40 mt-8"><?php echo sprintf('%02d', $counter); ?></span>
                                                    <h2 class="mt-8 title-anim text-secondary fw-7 mb-30 text-capitalize"><?php the_title() ?></h2>
                                                    <div class="pl-100">
                                                        <p class="cur-lg"><?php the_excerpt() ?></p>
                                                        <div class="mt-60">
                                                            <a href="<?php the_permalink() ?>" class="btn-anim btn-anim-light">
                                                                <?php echo esc_html__('Read More', 'itify') ?>
                                                                <i class="fa-solid fa-arrow-trend-up"></i>
                                                                <span></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                        $counter++; // Increment counter within the loop
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </section>









<?php
    }
}

$widgets_manager->register(new TP_Casestudythree());
