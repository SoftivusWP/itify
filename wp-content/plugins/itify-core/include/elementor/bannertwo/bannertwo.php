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
class TP_Bannertwo extends Widget_Base
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
        return 'tp-bannertwo';
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
        return __('Banner Two', 'tpcore');
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
                'label' => esc_html__('Content', 'plugin-name')
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('We Are Your Innovation And Growth Partner', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('We Support The Growth Of Startups And Innovators By Applying The Best Fitted Technologies And Sharing Our Expertise. We Strive To Improve Peoples Lives Through Cutting-Edge Products And Solutions.', 'plugin-name'),
            ]
        );

        $this->add_control(
            'buttontextone',
            [
                'label' => esc_html__('Button Text One', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore', 'plugin-name'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'buttontexttwo',
            [
                'label' => esc_html__('Button Text Two', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Services', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'buttonlink',
            [
                'label' => esc_html__('Link', 'plugin-name'),
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
            'image',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'facebook',
            [
                'label' => esc_html__('Facebook Link', 'plugin-name'),
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
            'twitter',
            [
                'label' => esc_html__('Twitter Link', 'plugin-name'),
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
            'linkedin',
            [
                'label' => esc_html__('Linkedin Link', 'plugin-name'),
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
            'instagram',
            [
                'label' => esc_html__('Instagram Link', 'plugin-name'),
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


        $this->end_controls_section();




        // =======================Style=================================//


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
                'selector' => '{{WRAPPER}} .title',

            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-banner__content .title' => 'color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'style_des',
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
                    '{{WRAPPER}} .description' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .btn-anim-light:hover' => 'color: {{VALUE}};border-color: {{VALUE}} !important',
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

        $this->start_controls_section(
            'style_social',
            [
                'label' => esc_html__('Social', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'style_social_color',
            [
                'label' => esc_html__('Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.social li a' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'style_social_colorh',
            [
                'label' => esc_html__('Hover Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-banner .social a:hover' => 'color: {{VALUE}} !important',
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

?>





        <section class="about-banner fix-top pb-120 position-relative overflow-x-clip">
            <div class="container">
                <div class="row vertical-column-gap">
                    <div class="col-12 col-lg-7 col-xxl-6">
                        <div class="about-banner__content">
                            <?php if (!empty($settings['title'])) : ?>
                                <h2 class="title text-xxl title-anim fw-7 text-secondary mt-8 mb-30">
                                    <?php echo esc_html($settings['title']) ?>
                                </h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['description'])) : ?>
                                <p class="description cur-lg"><?php echo esc_html($settings['description']) ?></p>
                            <?php endif; ?>
                            <div class="mt-60 foot-group">
                                <div class="anime d-none d-sm-flex">
                                    <span class="foot-fade"></span>
                                    <span class="foot-fade"></span>
                                    <span class="foot-fade"></span>
                                    <span class="foot-fade"></span>
                                    <span class="foot-fade"></span>
                                    <span class="foot-fade"></span>
                                </div>
                                <?php if (!empty($settings['buttonlink']['url']) && !empty($settings['buttontextone']) && !empty($settings['buttontexttwo'])) : ?>
                                    <a href="<?php echo esc_url($settings['buttonlink']['url']) ?>" class="alter-btn btn-anim btn-anim-light">
                                        <?php echo esc_html($settings['buttontextone']) ?>
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                        <?php echo esc_html($settings['buttontexttwo']) ?>
                                        <span></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 offset-xxl-1">
                        <div class="about-banner__thumb">
                            <?php if (!empty($settings['image']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['image']['url']) ?>" class="unset parallax-image mh-300" alt="<?php echo esc_attr('image') ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="social">
                <?php if (!empty($settings['facebook']['url'])) : ?>
                    <li>
                        <a href="<?php echo esc_url($settings['facebook']['url']) ?>" target="_blank" aria-label="share us on facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($settings['twitter']['url'])) : ?>
                    <li>
                        <a href="<?php echo esc_url($settings['twitter']['url']) ?>" target="_blank" aria-label="share us on twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($settings['linkedin']['url'])) : ?>
                    <li>
                        <a href="<?php echo esc_url($settings['linkedin']['url']) ?>" target="_blank" aria-label="share us on pinterest">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($settings['instagram']['url'])) : ?>
                    <li>
                        <a href="<?php echo esc_url($settings['instagram']['url']) ?>" target="_blank" aria-label="share us on instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </section>









<?php
    }
}

$widgets_manager->register(new TP_Bannertwo());
