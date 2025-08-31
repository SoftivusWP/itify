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
class TP_Casestudysix extends Widget_Base
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
        return 'tp-casestyudysix';
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
        return __('Casestudy Six', 'tpcore');
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
            'posts_per_page' => 2,
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
            'content',
            [
                'label' => esc_html__('Content', 'plugin-name')
            ]
        );


        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Similar Case Studies', 'plugin-name'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'services_category',
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
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'style_category',
             [
                'label' => esc_html__('Category', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spinner_typ',
                'selector' => '{{WRAPPER}} .category',
        
            ]
        );
        
        $this->add_control(
            'spinner_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'spinner_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'spinner_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
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
                    '{{WRAPPER}} .title a' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                'posts_per_page' => $settings['service_posts_per_page'],
                'orderby'        => $settings['service_template_order_by'],
                'order'          => $settings['service_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',
                'post__in'          => $settings['services_category'],
            )
        );

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



        <section class="pt-120 pb-120 c-study fade-wrapper">
            <div class="container">
                <div class="row">
                    <?php if (!empty($settings['heading'])) :   ?>
                        <div class="col-12 col-lg-9">
                            <h2 class="heading mt-8 title-anim fw-7 text-secondary mb-24"><?php echo esc_html($settings['heading']) ?></h2>
                        </div>
                    <?php endif ?>
                </div>
                <div class="row vertical-column-gap-lg">



                    <?php
                            $counter = 1; // Initialize counter outside the loop
                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    ?>




                            <div class="col-12 col-lg-6">
                                <div class="c-study-single fade-top">
                                    <div class="thumb mb-24">
                                        <a href="<?php the_permalink() ?>" class="w-100">
                                            <img src="<?php the_post_thumbnail_url() ?>" class="w-100 mh-300 "alt="<?php echo esc_attr('image')?>">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <?php
                                                        // Get the categories associated with the post
                                                        $categories = get_the_terms(get_the_ID(), 'casestudy-cat');

                                                        // Check if categories exist and if there is at least one category
                                                        if ($categories && !is_wp_error($categories)) {
                                                            $first_category = reset($categories); // Get the first category
                                                            $category_name = $first_category->name; // Get the name of the first category

                                                            // Output the category name
                                                            ?>
                                            <a href="<?php echo get_term_link($first_category); ?>" class="category mb-30 fw-6"><?php echo esc_html($category_name); ?></a>
                                        <?php } ?>



                                        <h4 class="title fw-6 mt-8 text-secondary">
                                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                        </h4>
                                    </div>
                                </div>
                            </div>


                    <?php
                                    $counter++; // Increment counter within the loop
                                }
                            }
                            wp_reset_postdata();
                            ?>






                </div>
            </div>
        </section>









<?php
    }
}

$widgets_manager->register(new TP_Casestudysix());
